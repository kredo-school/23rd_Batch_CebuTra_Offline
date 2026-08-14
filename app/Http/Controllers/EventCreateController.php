<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class EventCreateController extends Controller
{
    /**
     * 複数ステップで使用するSessionキー
     */
    protected string $sessionKey = 'event';


    /**
     * ========================================
     * Step1
     * 基本情報
     * ========================================
     */

    /**
     * Step1画面表示
     */
    public function step1(): View
    {
        return view('events.create.step1', [
            'old' => session("{$this->sessionKey}.step1", []),
        ]);
    }

    /**
     * Step1入力保存
     */
    public function storeStep1(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'meeting_place' => [
                'required',
                'string',
                'max:255',
            ],

            'start_date' => [
                'required',
                'date',
            ],

            'end_date' => [
                'required',
                'date',
                'after_or_equal:start_date',
            ],
        ]);

        session([
            "{$this->sessionKey}.step1" => $validated,
        ]);

        return redirect()->route('events.create.step2');
    }


    /**
     * ========================================
     * Step2
     * 募集設定
     * ========================================
     */

    /**
     * Step2画面表示
     */
    public function step2(): View
    {
        return view('events.create.step2', [
            'tags' => Tag::orderBy('id')->get(),

            'old' => session(
                "{$this->sessionKey}.step2",
                []
            ),
        ]);
    }

    /**
     * Step2入力保存
     */
    public function storeStep2(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'capacity' => [
                'required',
                'integer',
                Rule::in([2, 3, 4, 5, 6, 8, 10]),
            ],

            /*
             * budgetはDBに保存するカラムがないため、
             * 今回は受け取らずDBにも保存しない。
             */

            'tags' => [
                'nullable',
                'array',
            ],

            'tags.*' => [
                'integer',
                'exists:tags,id',
            ],
        ]);

        session([
            "{$this->sessionKey}.step2" => $validated,
        ]);

        return redirect()->route('events.create.step3');
    }


    /**
     * ========================================
     * Step3
     * 旅程を添付
     * ========================================
     */

    /**
     * Step3画面表示
     */
    public function step3(): View
    {
        $itineraries = auth()->user()
            ->trips()
            ->with('itineraryItems')
            ->latest()
            ->get();

        return view('events.create.step3', [
            'itineraries' => $itineraries,

            'old' => session(
                "{$this->sessionKey}.step3",
                []
            ),
        ]);
    }

    /**
     * Step3入力保存
     */
    public function storeStep3(Request $request): RedirectResponse
    {
        /*
         * 「旅程を添付しない」の場合は
         * trip_idをnullとして扱う。
         */
        $tripId = $request->input('trip_id');

        if ($tripId === '') {
            $tripId = null;
        }

        /*
         * 自分が所有している旅程だけ選択可能にする。
         */
        $request->merge([
            'trip_id' => $tripId,
        ]);

        $validated = $request->validate([
            'trip_id' => [
                'nullable',
                'integer',
                Rule::exists('trips', 'id')
                    ->where(function ($query) {
                        $query->where(
                            'user_id',
                            auth()->id()
                        );
                    }),
            ],
        ]);

        session([
            "{$this->sessionKey}.step3" => $validated,
        ]);

        return redirect()->route('events.create.step4');
    }


    /**
     * ========================================
     * Step4
     * 説明・投稿
     * ========================================
     */

    /**
     * Step4画面表示
     */
    public function step4(): View
    {
        return view('events.create.step4', [
            'data' => session(
                $this->sessionKey,
                []
            ),
        ]);
    }

    /**
     * 最終保存
     */
    public function store(Request $request): RedirectResponse
    {
        /*
         * Step4の説明をバリデーション
         */
        $validated = $request->validate([
            'description' => [
                'required',
                'string',
                'max:2000',
            ],
        ]);

        /*
         * Step4のデータをSessionに保存
         */
        session([
            "{$this->sessionKey}.step4" => $validated,
        ]);

        /*
         * 各StepのSessionを取得
         */
        $step1 = session(
            "{$this->sessionKey}.step1",
            []
        );

        $step2 = session(
            "{$this->sessionKey}.step2",
            []
        );

        $step3 = session(
            "{$this->sessionKey}.step3",
            []
        );

        $step4 = session(
            "{$this->sessionKey}.step4",
            []
        );

        /*
         * 全Stepのデータをまとめる
         */
        $data = array_merge(
            $step1,
            $step2,
            $step3,
            $step4
        );

        /*
         * タグはeventsテーブルには保存しない。
         * 後でevent_tagsへ保存する。
         */
        $tagIds = $data['tags'] ?? [];

        unset($data['tags']);

        /*
         * eventsテーブルへ保存する項目だけを取り出す。
         */
        $eventData = [
            'host_id' => auth()->id(),
            'trip_id' => $data['trip_id'] ?? null,
            'title' => $data['title'],
            'description' => $data['description'],
            'meeting_place' => $data['meeting_place'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'capacity' => $data['capacity'],
        ];

        /*
         * Eventとタグをまとめて保存
         */
        $event = DB::transaction(function () use (
            $eventData,
            $tagIds
        ) {
            $event = Event::create($eventData);

            if (!empty($tagIds)) {
                $event->tags()->sync($tagIds);
            }

            return $event;
        });

        /*
         * 作成途中のSessionを削除
         */
        session()->forget($this->sessionKey);

        /*
         * イベント詳細へ移動
         */
        return redirect()
            ->route('events.show', $event)
            ->with(
                'success',
                '募集を作成しました'
            );
    }
}


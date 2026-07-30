<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use View;

class EventCreateController extends Controller
{
    protected string $sessionKey = 'event_create';

    // ---- Step1: 基本情報 ----
    public function step1(): View
    {
        return view('events.create.step1', [
            'old' => session("{$this->sessionKey}.step1", []),
        ]);
    }

    public function storeStep1(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'meeting_place' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
        ]);

        session(["{$this->sessionKey}.step1" => $validated]);

        return redirect()->route('events.create.step2');
    }

    // ---- Step2, Step3も同様のパターンで追加 ----
    // public function step2() { ... }
    public function step2(): View
    {
        return view('events.create.step2', [
            'tags' => Tag::all(),
            'old' => session("{$this->sessionKey}.step2", []),
        ]);
    }

    public function storeStep2(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'capacity' => ['required', 'integer', 'min:2', 'max:10'],
            'budget' => ['required', 'string', 'max:255'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['exists:tags,id'],
        ]);

        session(["{$this->sessionKey}.step2" => $validated]);

        return redirect()->route('events.create.step3');
    }

    public function step3(): View
{
    return view('events.create.step3', [
        'itineraries' => auth()->user()->trips, // ログインユーザーが作成した旅程一覧
        'old'         => session("{$this->sessionKey}.step3", []),
    ]);
}

public function storeStep3(Request $request): RedirectResponse
{
    $validated = $request->validate([
        'trip_id' => ['nullable', 'exists:trips,id'],
    ]);

    session(["{$this->sessionKey}.step3" => $validated]);

    return redirect()->route('events.create.step4');
}

public function step4(): View
{
    return view('events.create.step4', [
        'data' => session($this->sessionKey, []), // 全ステップ分のプレビュー表示用
    ]);
}

public function store(Request $request): RedirectResponse
{
    $validated = $request->validate([
        'description' => ['required', 'string', 'max:2000'],
    ]);


    // public function storeStep2(Request $request) { ... }

    // ---- 最終ステップでDBに保存 ----
    public function storeFinal(Request $request): RedirectResponse
    {
        $data = array_merge(
            session("{$this->sessionKey}.step1", []),
            session("{$this->sessionKey}.step2", []),
            session("{$this->sessionKey}.step3", []),
            // step4のバリデーション結果もここに追加
        );

        $event = $request->user()->hostedEvents()->create([
            ...$data,
            'host_id' => $request->user()->id, // hostメソッド未定義なら auth()->id() でもOK
        ]);

        // タグ・参加者の中間テーブルはここでattach
        // $event->tags()->attach($request->input('tag_ids', []));

        session()->forget($this->sessionKey);

        return redirect()->route('events.show', $event)->with('success', '募集を作成しました');
    }

}

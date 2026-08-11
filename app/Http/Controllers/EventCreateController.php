<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Tag;
use App\Models\Event;

class EventCreateController extends Controller
{
    protected string $sessionKey = 'event';

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
            'trip_title' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
        ]);

        // Map form fields to DB column equivalents
        $validated['title'] = $validated['trip_title'];
        $validated['meeting_place'] = $validated['location'];

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
    if ($request->input('trip_id') === 'checked') {
        $request->merge(['trip_id' => null]);
    }

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
    if ($request->has('trip_description') && !$request->has('description')) {
        $request->merge(['description' => $request->input('trip_description')]);
    }

    $validated = $request->validate([
        'description' => ['required', 'string', 'max:2000'],
    ]);

    session(["{$this->sessionKey}.step4" => $validated]);

    return $this->storeFinal($request);
}

// ---- 最終ステップでDBに保存 ----
public function storeFinal(Request $request): RedirectResponse
{
    $step1 = session("{$this->sessionKey}.step1", []);
    $step2 = session("{$this->sessionKey}.step2", []);
    $step3 = session("{$this->sessionKey}.step3", []);
    $step4 = session("{$this->sessionKey}.step4", []);

    $data = array_merge(
        $step1,
        $step2,
        $step3,
        $step4
    );

    // Save and remove tags array
    $tagIds = $data['tags'] ?? [];
    unset($data['tags']);

    if (isset($data['trip_id']) && $data['trip_id'] === 'checked') {
        $data['trip_id'] = null;
    }

    // Filter to only Event fillable fields
    $fillableData = array_intersect_key($data, array_flip([
        'trip_id',
        'title',
        'description',
        'image',
        'meeting_place',
        'start_date',
        'end_date',
        'capacity'
    ]));

    $event = Event::create([
        ...$fillableData,
        'host_id' => $request->user()->id,
    ]);

    if (!empty($tagIds)) {
        $event->tags()->attach($tagIds);
    }

    session()->forget($this->sessionKey);

    return redirect()->route('events.show', $event)->with('success', '募集を作成しました');
}
}


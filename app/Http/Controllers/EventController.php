<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    <?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * 一覧表示
     */
    public function index()
    {
        $events = Event::with(['host', 'tags'])->latest()->get();

        return view('events.index', compact('events'));
    }

    /**
     * 新規作成フォーム表示
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * 新規登録処理
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'trip_id'     => 'nullable|exists:trips,id',
            //カラムに合わせて調整要
        ]);

        $validated['host_id'] = auth()->id();

        $event = Event::create($validated);

        return redirect()->route('events.show', $event)
            ->with('success', 'イベントを作成しました');
    }

    /**
     * 詳細表示
     */
    public function show(Event $event)
    {
        $event->load(['host', 'tags', 'participants']);

        return view('events.show', compact('event'));
    }

    /**
     * 編集フォーム表示
     */
    public function edit(Event $event)
    {
        $this->authorizeHost($event);

        return view('events.edit', compact('event'));
    }

    /**
     * 更新処理
     */
    public function update(Request $request, Event $event)
    {
        $this->authorizeHost($event);

        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'trip_id'     => 'nullable|exists:trips,id',
        ]);

        $event->update($validated);

        return redirect()->route('events.show', $event)
            ->with('success', 'イベントを更新しました');
    }

    /**
     * 削除処理
     */
    public function destroy(Event $event)
    {
        $this->authorizeHost($event);

        $event->delete();

        return redirect()->route('events.index')
            ->with('success', 'イベントを削除しました');
    }

    /**
     * 参加登録(event_participants)
     */
    public function join(Event $event)
    {
        $event->participants()->syncWithoutDetaching(auth()->id());

        return back()->with('success', 'イベントに参加登録しました');
    }

    /**
     * 参加取消(event_participants)
     */
    public function leave(Event $event)
    {
        $event->participants()->detach(auth()->id());

        return back()->with('success', 'イベントの参加を取り消しました');
    }

    /**
     * タグ付け(event_tags)
     */
    public function syncTags(Request $request, Event $event)
    {
        $this->authorizeHost($event);

        $validated = $request->validate([
            'tags'   => 'array',
            'tags.*' => 'exists:tags,id',
        ]);

        $event->tags()->sync($validated['tags'] ?? []);

        return back()->with('success', 'タグを更新しました');
    }

    /**
     * イベント主催者本人かどうかをチェック
     */
    private function authorizeHost(Event $event)
    {
        abort_if($event->host_id !== auth()->id(), 403);
    }
}
}

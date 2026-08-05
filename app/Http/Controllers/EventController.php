<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * イベント詳細ページ表示
     */
    public function show(Event $event)
    {
        // Eventモデルに定義したリレーションをまとめて取得
        $event->load([
            'user',
            'tags',
            'participants',
            'itinerary'
        ]);

        // 現在ログインしているユーザー
        $user = Auth::user();

        // このイベントをお気に入り登録しているか
        $isFavorite = false;

        if ($user) {
            $isFavorite = Favorite::where('user_id', $user->id)
                ->where('event_id', $event->id)
                ->exists();
        }

        // 参加人数
        $participantCount = $event->participants()->count();

        // このユーザーが参加済みか
        $isJoined = false;

        if ($user) {
            $isJoined = EventParticipant::where('user_id', $user->id)
                ->where('event_id', $event->id)
                ->exists();
        }

        return view('events.show', compact(
            'event',
            'participantCount',
            'isFavorite',
            'isJoined'
        ));
    }

    /**
     * お気に入り切り替え
     */
    public function toggleFavorite(Event $event)
    {
        $favorite = Favorite::where('user_id', Auth::id())
            ->where('event_id', $event->id)
            ->first();

        if ($favorite) {

            $favorite->delete();

        } else {

            Favorite::create([
                'user_id' => Auth::id(),
                'event_id' => $event->id
            ]);

        }

        return back();
    }

    /**
     * イベント参加
     */
    public function join(Event $event)
    {
        // 定員チェック
        if ($event->participants()->count() >= $event->capacity) {

            return back()->with('error', '定員に達しています。');

        }

        // 重複参加防止
        $alreadyJoined = EventParticipant::where(
            'user_id',
            Auth::id()
        )->where(
            'event_id',
            $event->id
        )->exists();

        if ($alreadyJoined) {

            return back()->with('error', 'すでに参加済みです。');

        }

        EventParticipant::create([

            'user_id' => Auth::id(),

            'event_id' => $event->id

        ]);

        return back()->with('success', '参加しました。');
    }

    /**
     * 参加キャンセル
     */
    public function cancel(Event $event)
    {

        EventParticipant::where(
            'user_id',
            Auth::id()
        )->where(
            'event_id',
            $event->id
        )->delete();

        return back()->with(
            'success',
            '参加をキャンセルしました。'
        );
    }
}

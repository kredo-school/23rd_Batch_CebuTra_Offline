<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventParticipant;
use App\Models\Favorite;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * イベント一覧ページ
     */
    public function index(Request $request)
    {
        // イベントの基本クエリ
        $query = Event::with([
            'host',
            'tags',
            'participants',
        ]);


        // -------------------------
        // キーワード検索
        // -------------------------
        if ($request->filled('keyword')) {

            $keyword = $request->keyword;

            $query->where(function ($q) use ($keyword) {

                $q->where(
                    'title',
                    'like',
                    "%{$keyword}%"
                )
                ->orWhere(
                    'meeting_place',
                    'like',
                    "%{$keyword}%"
                )
                ->orWhere(
                    'description',
                    'like',
                    "%{$keyword}%"
                );

            });
        }


        // -------------------------
        // タグによる絞り込み
        // -------------------------
        if ($request->filled('tag')) {

            $tagId = $request->tag;

            $query->whereHas('tags', function ($q) use ($tagId) {

                $q->where('tags.id', $tagId);

            });
        }


        // -------------------------
        // イベント取得
        // -------------------------
        $events = $query->get();


        // -------------------------
        // タグ一覧取得
        // -------------------------
        $tags = Tag::orderBy('id')->get();


        // -------------------------
        // Viewへ渡す
        // -------------------------
        return view(
            'events.index',
            compact(
                'events',
                'tags'
            )
        );
    }


    /**
     * イベント詳細ページ
     */
    public function show(Event $event)
    {
        $event->load([
            'host',
            'tags',
            'participants',
            'trip',
        ]);

        $user = Auth::user();

        $isFavorite = false;

        if ($user) {

            $isFavorite = Favorite::where(
                'user_id',
                $user->id
            )
            ->where(
                'event_id',
                $event->id
            )
            ->exists();
        }


        $participantCount = $event->participants()->count();

        $isJoined = false;

        if ($user) {

            $isJoined = EventParticipant::where(
                'user_id',
                $user->id
            )
            ->where(
                'event_id',
                $event->id
            )
            ->exists();
        }


        return view(
            'events.show',
            compact(
                'event',
                'participantCount',
                'isFavorite',
                'isJoined'
            )
        );
    }


    /**
     * お気に入り切り替え
     */
    public function toggleFavorite(Event $event)
    {
        $favorite = Favorite::where(
            'user_id',
            Auth::id()
        )
        ->where(
            'event_id',
            $event->id
        )
        ->first();


        if ($favorite) {

            $favorite->delete();

        } else {

            Favorite::create([
                'user_id' => Auth::id(),
                'event_id' => $event->id,
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
        if (
            $event->participants()->count()
            >=
            $event->capacity
        ) {

            return back()->with(
                'error',
                '定員に達しています。'
            );
        }


        // 重複参加防止
        $alreadyJoined = EventParticipant::where(
            'user_id',
            Auth::id()
        )
        ->where(
            'event_id',
            $event->id
        )
        ->exists();


        if ($alreadyJoined) {

            return back()->with(
                'error',
                'すでに参加済みです。'
            );
        }


        EventParticipant::create([
            'user_id' => Auth::id(),
            'event_id' => $event->id,
        ]);


        return back()->with(
            'success',
            '参加しました。'
        );
    }


    /**
     * 参加キャンセル
     */
    public function cancel(Event $event)
    {
        EventParticipant::where(
            'user_id',
            Auth::id()
        )
        ->where(
            'event_id',
            $event->id
        )
        ->delete();


        return back()->with(
            'success',
            '参加をキャンセルしました。'
        );
    }
}

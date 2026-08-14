@extends('layouts.event')

{{--@section('activeNav', 'explore')--}}

@section('content')

<div class="p-6 bg-[#F7F3ED] min-h-screen">

    {{-- ページタイトル --}}
    <h1 class="text-[36px] font-bold mb-6">
        旅行を探す
    </h1>

    {{-- 検索ボックス --}}
    <form
        action="{{ route('events.index') }}"
        method="GET"
        class="flex items-center bg-[#EEE7DF] rounded-full px-5 py-4 gap-3"
    >
        <i class="fa-solid fa-magnifying-glass"></i>

        <input
            type="text"
            name="keyword"
            value="{{ request('keyword') }}"
            placeholder="行き先・キーワードで検索"
            class="border-none bg-transparent w-full outline-none"
        >
    </form>

    {{-- =========================
        カテゴリー / タグ
    ========================== --}}
    <div class="flex gap-3 overflow-x-auto my-6">

        {{-- すべて --}}

        <a    href="{{ route('events.index') }}"
            class="border border-[#dddddd] bg-green rounded-full px-[18px] py-[10px] whitespace-nowrap no-underline
                   {{ !request('tag') ? 'bg-[#008E8A] text-white border-[#008E8A]' : '' }}"
        >
            すべて
        </a>

        {{-- タグ一覧 --}}
        @foreach($tags as $tag)

            <a    href="{{ route('events.index', [
                    'tag' => $tag->id,
                    'keyword' => request('keyword')
                ]) }}"
                class="border border-[#dddddd] bg-white rounded-full px-[18px] py-[10px] whitespace-nowrap no-underline
                       {{ request('tag') == $tag->id ? 'bg-[#008E8A] text-white border-[#008E8A]' : '' }}"
            >
                {{ $tag->name }}
            </a>
        @endforeach

    </div>

    {{-- 検索結果件数 --}}
    <p class="mb-4">
        {{ $events->count() }}件の旅行が見つかりました
    </p>

    {{-- イベント一覧 --}}
    <div>

        @forelse($events as $event)

            <article class="bg-white rounded-3xl overflow-hidden mb-6">

                {{-- イベント画像 --}}
                <div class="relative">

                    @if($event->image)
                        <img
                            src="{{ asset($event->image) }}"
                            alt="{{ $event->title }}"
                            class="w-full h-[240px] object-cover"
                        >
                    @else
                        <div class="w-full h-[240px] flex items-center justify-center bg-gray-100">
                            <i class="fa-regular fa-image text-3xl text-gray-400"></i>
                        </div>
                    @endif

                    <button
                        type="button"
                        class="absolute top-4 right-4 w-9 h-9 rounded-full bg-white/90 flex items-center justify-center"
                        aria-label="お気に入り"
                    >
                        <i class="fa-regular fa-heart"></i>
                    </button>

                </div>

                {{-- イベント本文 --}}
                <div class="p-6">

                    <h2 class="text-xl font-bold">
                        {{ $event->title }}
                    </h2>

                    {{-- 開催情報 --}}
                    <div class="flex gap-4 my-3 text-sm text-gray-600">

                        <span>
                            <i class="fa-solid fa-location-dot"></i>
                            {{ $event->meeting_place }}
                        </span>

                        <span>
                            <i class="fa-regular fa-calendar"></i>
                            {{ $event->start_date->format('n月j日') }}
                        </span>

                        <span class="text-[#FF4D2D] font-semibold">
                            残り{{ max(0, $event->capacity - $event->participants->count()) }}名
                        </span>

                    </div>

                    {{-- タグ --}}
                    @if($event->tags->count() > 0)
                        <div class="flex gap-2 my-4 flex-wrap">
                            @foreach($event->tags as $tag)
                                <span class="bg-[#E6F5F5] text-[#008E8A] rounded-full px-[14px] py-[6px] text-sm">
                                    {{ $tag->name }}
                                </span>
                            @endforeach
                        </div>
                    @endif

                    {{-- ホスト --}}
                    <div class="flex justify-between items-center">

                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-[#008E8A] text-white rounded-full flex items-center justify-center font-bold">
                                {{ mb_substr($event->host->name ?? '？', 0, 1) }}
                            </div>
                            <span class="font-medium">
                                {{ $event->host->name ?? '不明' }}
                            </span>
                        </div>

                        <a href="{{ route('events.show', $event) }}" class="text-[#008E8A] font-semibold">
                            詳細を見る
                        </a>

                    </div>

                </div>

            </article>

        @empty

            <div class="text-center py-12 text-gray-500">
                <p>現在、募集中の旅行はありません。</p>
            </div>

        @endforelse

    </div>

</div>

@endsection

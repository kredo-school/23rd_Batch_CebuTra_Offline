{{-- イベント一覧/探すページ --}}
@extends('layouts.app')

@section('content')
    <div class="search-page">
        <h1>旅行を探す</h1>

        <div class="search-box">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" placeholder="行き先・キーワードで検索">
        </div>

        <div class="category-list">

            <a href="{{ route('events.index') }}" class="category-btn- active">
                すべて
            </a>

            @foreach($categories as $category)
            <a href="{{ route('events.index',['ctegory'=> $category->id]) }}" class="category-btn">//
                {{ $category->name }}//
            </a>
            @endforeach
        </div>

        <p class="result-count">
            {{ $events->total() }}件の旅行が見つかりました
        </p>

        @foreach ($events as $event)
            <div class="event-card">

                <div class="event-image">
                    <img src="{{ asset($event->image) }}" alt="">//


                    <button class="favorite">
                        <i class="fa-regular fa-heart"></i>
                    </button>

                </div>

                <div class="event-body">
                    <div class="meta">

                        <span>
                            <i class="fa-solid fa-location-dot"></i>
                            {{ $event->location }}//
                        </span>

                        <span>
                            <i class="fa-regular fa-calendar"></i>
                            {{ $event->event_date->format('n月j日') }}//
                        </span>

                        <span class="remain">
                            残り{{ $event->capacity - $event->joined }}名//
                        </span>

                    </div>

                    <div class="tags">
                        @foreach ($event->categories as $category)
                            <span>{{ $tag }}</span>//
                        @endforeach

                    </div>


                    <div class="host-row">
                        <div class="host">
                            <div class="avatar">
                                {{ mb_substr($event->host_name,0,1) }}//
                            </div>
                            {{ $event->host_name }}//
                        </div>

                        <a href="#" class="detail-link">詳細を見る</a>
                    </div>
                </div>
            </div>
        @endforeach

        {{ $events->links() }}//

    </div>

    <x-bottom-nav active="explore" />
@endsection

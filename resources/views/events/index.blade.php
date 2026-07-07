@extends('layouts.app')

@section('content')
    <div class="search-page">
        <h1>旅行を探す</h1>

        <div class="search-box">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" placeholder="行き先・キーワードで検索">
        </div>

        <div class="category-list">

            <a href="{{  }}" class="category-btn- active">
                すべて
            </a>

            @foreach($categories as $category)
            <a href="{{  }}" class="category-btn">//
                {{  }}//
            </a>
            @endforeach
        </div>

        <p class="result-count">
            {{ }}件の旅行が見つかりました
        </p>

        @foreach ($events as $event)
            <div class="event-card">

                <div class="event-image">
                    <img src="{{ }}" alt="">//


                    <button class="favorite">
                        <i class="fa-regular fa-heart"></i>
                    </button>

                </div>

                <div class="event-body">
                    <div class="meta">

                        <span>
                            <i class="fa-solid fa-location-dot"></i>
                            {{ }}//
                        </span>

                        <span>
                            <i class="fa-regular fa-calendar"></i>
                            {{ }}//
                        </span>

                        <span class="remain">
                            残り{{ }}名//
                        </span>

                    </div>

                    <div class="tags">
                        @foreach ($event->categories as $category)
                            <span>{{ }}</span>//
                        @endforeach

                    </div>


                    <div class="host-row">
                        <div class="host">
                            <div class="avatar">
                                {{ }}//
                            </div>
                            {{ }}//
                        </div>

                        <a href="" class="">詳細を見る</a>
                    </div>
                </div>
            </div>
        @endforeach

        {{ }}//

    </div>

    <x-bottom-nav active="explore" />
@endsection

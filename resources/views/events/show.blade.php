@extends('layouys.app')

@section('content')

{{-- @php
    $joined = $event->participants->count();
    $remaining = $event->capacity - $joined;
@endphp --}}

    <div class="event-show">
        {{-- Hero --}}
        <div class="event-hero">
            <img src="" alt="">

            <a href="" class="close-button">
                <i class="fa-solid fa-xmark"></i>
            </a>
            <button class="favorite-button">
                <i class="fa-regular fa-heart"></i>
            </button>

            <div class="hero-content">
                <div class="tag-group">
                    @foreach ($event->tags as $tag)
                        <span class="event-tag">
                            {{ }}//
                        </span>
                    @endforeach
                </div>

                <h1>
                    {{ }}//
                </h1>

            </div>
        </div>
    </div>

    {{-- 基本情報 --}}
    <div class="event-meta">
        <span>
            <i class="fa-solid fa-location-dot"></i>
            {{ }}//
        </span>

        <span class="remaining">
            <i class="fa-solid fa-user-group"></i>
            残り{{ }}名 //
        </span>

    </div>
    {{-- 主催者 --}}
    <div class="organizer-card">
        <div class="avatar">
            {{ }}//
        </div>

        <div>
            <h3{{ }}>
                </h3>//

                <p>主催者</p>

        </div>
        <i class="fa-solid fa-chevron-right"></i>
    </div>

    {{-- 概要 --}}
    <section class="section">
        <h2>概要</h2>

        <p>{{ }}</p>//

    </section>

    {{-- 集合場所 --}}
    <section class="meeting-place">
        <div class="meeting-title">
            <i class="fa-solid fa-location-dot"></i>
            集合場所
        </div>

        <p>{{ }}</p>//

    </section>

    {{-- 当日の旅程 --}}
    <section class="section">
        <h2>当日の旅程</h2>

        @foreach ($event->tripplan->items as $item)
            <div class="timeline-item">

                <div class="timeline-icon">
                    {{ }}/
                </div>

                <span class="timeline-time">
                    {{ }}//
                </span>

                <p>{{ }}</p>//

            </div>
        @endforeach
    </section>

    {{-- 旅行の概要 --}}
        <section class="section">

        <h2>旅行の概要</h2>

        <p>
            {{  }}
        </p>

    </section>

    {{-- 参加状況 --}}
    <section class="section">
        <div class="participation-header">
            <h2>参加状況</h2>

            <span>
                残り{{  }}名
            </span>
        </div>

        <div class="progress-group">
            @for ()//
            <div class="progress-item{{  }}">
            </div>
            @endfor
        </div>

        <p>{{  }}名参加済み</p>//
    </section>

    {{-- 参加申請ボタン --}}
    <div class="bottom-action">
        <form action="" method="POST">//
            @csrf
            <button type="submit" class="join-button">
                参加申請する
            </button>
        </form>
    </div>
@endsection

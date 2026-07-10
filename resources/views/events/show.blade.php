@extends('layouys.app')

@section('content')

{{-- @php
    $joined = $event->participants->count();
    $remaining = $event->capacity - $joined;
@endphp --}}

    <div class="event-show">
        {{-- Hero --}}
        <div class="event-hero">
            <img src="{{ asset('storage/'.$event->image_path) }}" alt="{{ $event->title }}">//

            <a href="{{ route('events.index') }}" class="close-button">
                <i class="fa-solid fa-xmark"></i>
            </a>
            <button class="favorite-button">
                <i class="fa-regular fa-heart"></i>
            </button>

            <div class="hero-content">
                <div class="tag-group">
                    @foreach ($event->tags as $tag)
                        <span class="event-tag">
                            {{ $tag->name }}//
                        </span>
                    @endforeach
                </div>

                <h1>
                    {{ $event->title }}//
                </h1>

            </div>
        </div>
    </div>

    {{-- 基本情報 --}}
    <div class="event-meta">
        <span>
            <i class="fa-solid fa-location-dot"></i>
            {{ $event->location }}//
        </span>

        <span class="remaining">
            <i class="fa-solid fa-user-group"></i>
            残り{{ $remaining }}名 //
        </span>

    </div>
    {{-- 主催者 --}}
    <div class="organizer-card">
        <div class="avatar">
            {{ $event->rating }}//
        </div>

        <div>
            <h3{{ $event->user->name }}>
                </h3>//

                <p>主催者</p>

        </div>
        <i class="fa-solid fa-chevron-right"></i>
    </div>

    {{-- 概要 --}}
    <section class="section">
        <h2>概要</h2>

        <p>{{ $event->description }}</p>//

    </section>

    {{-- 集合場所 --}}
    <section class="meeting-place">
        <div class="meeting-title">
            <i class="fa-solid fa-location-dot"></i>
            集合場所
        </div>

        <p>{{ $event->meeting_place }}</p>//

    </section>

    {{-- 当日の旅程 --}}
    <section class="section">
        <h2>当日の旅程</h2>

        @foreach ($event->tripplan->items as $item)
            <div class="timeline-item">

                <div class="timeline-icon">
                    {{ $item->icon }}/
                </div>

                <span class="timeline-time">
                    {{ $item->time }}//
                </span>

                <p>{{ $item->description }}</p>//

            </div>
        @endforeach
    </section>

    {{-- 旅行の概要 --}}
        <section class="section">

        <h2>旅行の概要</h2>

        <p>
            {{ $item->name }}//
        </p>

    </section>

    {{-- 参加状況 --}}
    <section class="section">
        <div class="participation-header">
            <h2>参加状況</h2>

            <span>
                残り{{ $remaining }}名
            </span>
        </div>

        <div class="progress-group">
            @for ($i = 1; $i <= $event->capacity;$i++)//
            <div class="progress-item{{ $i <= $joined ? 'active' : '' }}">
            </div>
            @endfor
        </div>

        <p>{{ $joined }}/{{ $event->capacity }}名参加済み</p>//
    </section>

    {{-- 参加申請ボタン --}}
    <div class="bottom-action">
        <form action="{{ route('events.join',$event) }}" method="POST">//
            @csrf
            <button type="submit" class="join-button">
                参加申請する
            </button>
        </form>
    </div>
@endsection

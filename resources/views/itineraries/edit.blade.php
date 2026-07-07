@extends('layouts.app')

@section('title', '旅程作成')

@section('content')

    <div class="itinerary-editor">

        {{-- 戻る --}}
        <div class="editor-header">

            <a href="{{ }}" class="back-btn">
                <i class="fa-solid fa-chevron-left"></i>
            </a>


            <div class="trip-title">
                <input type="text" value="{{ }}" class="title-input">//

                <p>タップして名前を編集</p>

            </div>
        </div>

        {{-- Dayタブ --}}
        @include('partials.day-tabs')

        {{-- タイムライン --}}
        <div class="timeline">
            @foreach ($trip->items as $item)
                @include('partials.timeline-item')
            @endforeach

        </div>

        {{-- ボタン --}}
        <div class="bottom-button">
            <button id="openActivityModal" class="add-button">
                <i class="fa-solid fa-plus"></i>
                追加
            </button>

            <button class="save-button">
                保存する
            </button>

        </div>
    </div>

@endsection

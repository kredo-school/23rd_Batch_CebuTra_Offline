{{-- 旅程一覧ページ --}}
@extends('layouts.app')

@section('title','旅程ストック')

@section('content')

<div class="itinerary-page">
    <div class="page-header">
        <div>
            <h1>旅程ストック</h1>

            <p>作成した旅程を保存して、募集投稿に添付できます</p>
        </div>

        <button class="create-btn" id="openModal">新規作成</button>
    </div>

    <div class="trip-list">
        @forelse ($trips as $trip)

        @include('partials.trip-card')

        @empty

        <p class="empty">まだ旅程がありません</p>

        @endforelse
    </div>

    @include('partials.create-trip-modal')

@endsection
</div>

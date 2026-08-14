@extends('layouts.event')

@section('title', '旅程ストック')

@section('content')

<div class="container py-4">

    {{-- ページタイトル --}}
    <div class="mb-4">

        {{-- タイトル ＋ 新規作成ボタン --}}
        <div class="d-flex justify-content-between align-items-center">

            <h1 class="fw-bold mb-0">
                旅程ストック
            </h1>

            <a href="{{ route('itineraries.create') }}"
               class="btn btn-primary rounded-pill px-3">

                <span class="me-1">＋</span>
                新規作成

            </a>

        </div>

        {{-- 説明文 --}}
        <p class="text-muted mt-2 mb-0">
            作成した旅程を保存して、募集投稿に添付できます
        </p>

    </div>


    {{-- 旅程がない場合 --}}
    @if ($trips->isEmpty())

        <div class="text-center py-5">

            <p class="text-muted mb-3">
                まだ旅程がありません。
            </p>

        </div>


    {{-- 旅程がある場合 --}}
    @else

        @foreach ($trips as $trip)

            {{-- 旅程カードを読み込む --}}
            @include('trippartials.trip-card', [
                'trip' => $trip
            ])

        @endforeach

    @endif

</div>

@endsection

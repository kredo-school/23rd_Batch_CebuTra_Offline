{{--@extends('layouts.app')

@section('title', '旅程ストック')

@section('content')--}}

<div class="trip-card">
    <div class="trip-card-top"></div>

    <div class="trip-card-body">

    <div class="trip-header">
        <div>

            <h2>{{ $trip->title }}</h2>//

            <p>
                {{ $trip->days }}日間
                {{ $trip->items->count() }}件
                {{ $trip->created_at->format('n月j日') }}作成
            </p>

        </div>

        <div class="trip-action">
            <a href="{{ route('itineraries.edit',$trip) }}"><i class="fa-solid fa-pen"></i></a>
            <form action="{{ route('itineraries.destroy',$trip) }}" method="POST">

                @csrf
                @method('DELETE')

                <button><i class="fa-regular fa-trash-can"></i></button>
            </form>
        </div>
    </div>

    @foreach ($trip->items->groupBy('day') as $day=>$items)

    <div class="day-row">
        <span class="day-badge">

            Day{{ $day }}//

        </span>

        @foreach ($items->take(3) as $item)

        <span class="tag">
            {{ $item->icon }}//
            {{ $item->title }}//
        </span>

        @endforeach

        @if ($items->count()->3)

        <span class="tag">
            +{{ $items->count()-3 }}//
        </span>

        @endif

    </div>

    @endforeach
</div>
</div>

{{--@endsection--}}

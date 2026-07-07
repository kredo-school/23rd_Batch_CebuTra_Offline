{{--@extends('layouts.app')

@section('title', '旅程ストック')

@section('content')--}}

<div class="trip-card">
    <div class="trip-card-top"></div>

    <div class="trip-card-body">

    <div class="trip-header">
        <div>

            <h2>{{  }}</h2>//

            <p>
                {{  }}日間
                {{  }}件
                {{  }}作成
            </p>

        </div>

        <div class="trip-action">
            <a href="{{  }}"><i class="fa-solid fa-pen"></i></a>
            <form action="{{  }}" method="POST">

                @csrf
                @method('DELETE')

                <button><i class="fa-regular fa-trash-can"></i></button>
            </form>
        </div>
    </div>

    @foreach ($trip->items->groupBy('day') as $day=>$items)

    <div class="day-row">
        <span class="day-badge">

            Day{{  }}//

        </span>

        @foreach ($items->take(3) as $item)

        <span class="tag">
            {{  }}//
            {{  }}//
        </span>

        @endforeach

        @if ($items->count()->3)

        <span class="tag">
            +{{  }}//
        </span>

        @endif

    </div>

    @endforeach
</div>
</div>

{{--@endsection--}}

@extends('layouts.event')

@section('title', '旅行を募集する')

@section('progress')
    <div class="steps">
        <div class="active"></div>
        <div class="active"></div>
        <div class="active"></div>
        <div></div>
    </div>
@endsection

@section('content')

<form method="POST"
      action="{{ route('events.create.step3.store') }}">

    @csrf


    <div class="form-group">

        <div class="section-title">
            保存済みの旅程を添付
            <span>任意</span>
        </div>


        {{-- 旅程を添付しない --}}
        <label class="itinerary-option">

            <input
                type="radio"
                name="trip_id"
                value=""
                {{ old(
                    'trip_id',
                    $old['trip_id'] ?? ''
                ) === null ||
                old(
                    'trip_id',
                    $old['trip_id'] ?? ''
                ) === ''
                    ? 'checked'
                    : '' }}
            >

            <div>
                旅程を添付しない
            </div>

        </label>


        {{-- 保存済み旅程 --}}
        @foreach ($itineraries as $itinerary)

            <label class="itinerary-card">

                <input
                    type="radio"
                    name="trip_id"
                    value="{{ $itinerary->id }}"
                    {{ (string) old(
                        'trip_id',
                        $old['trip_id'] ?? ''
                    ) === (string) $itinerary->id
                        ? 'checked'
                        : '' }}
                >

                <div class="itinerary-content">

                    <h3>
                        {{ $itinerary->title }}
                    </h3>

                    <p>
                        {{ $itinerary->days }}日間・
                        {{ $itinerary->itineraryItems->count() }}件のアクティビティ・
                        {{ $itinerary->created_at->format('n月j日') }}作成
                    </p>


                    @if ($itinerary->itineraryItems->isNotEmpty())

                        <div class="itinerary-items">

                            @foreach (
                                $itinerary->itineraryItems->take(3)
                                as $item
                            )

                                <span>
                                    {{ $item->icon }}
                                    {{ $item->title }}
                                </span>

                            @endforeach

                            @if ($itinerary->itineraryItems->count() > 3)

                                <span>
                                    +{{ $itinerary->itineraryItems->count() - 3 }}件
                                </span>

                            @endif

                        </div>

                    @endif

                </div>

            </label>

        @endforeach


        @error('trip_id')
            <p class="error">{{ $message }}</p>
        @enderror

    </div>


    <div class="button-group">

        <a
            href="{{ route('events.create.step2') }}"
            class="btn-outline"
        >
            戻る
        </a>

        <button
            type="submit"
            class="btn-primary"
        >
            次へ進む
        </button>

    </div>

</form>

@endsection

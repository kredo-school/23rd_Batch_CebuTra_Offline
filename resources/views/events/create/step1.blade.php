@extends('layouts.event')

@section('title', '旅行を募集する')

@section('progress')
    <div class="steps">
        <div class="active"></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
@endsection

@section('content')

<form method="POST"
      action="{{ route('events.create.step1.store') }}">

    @csrf

    {{-- 旅行タイトル --}}
    <div class="form-group">
        <label for="title">
            旅行タイトル *
        </label>

        <input
            type="text"
            id="title"
            name="title"
            value="{{ old('title', $old['title'] ?? '') }}"
            placeholder="例：スミロン島日帰りトリップ"
            required
        >

        @error('title')
            <p class="error">{{ $message }}</p>
        @enderror
    </div>


    {{-- 行き先 --}}
    <div class="form-group">
        <label for="meeting_place">
            行き先 *
        </label>

        <input
            type="text"
            id="meeting_place"
            name="meeting_place"
            value="{{ old('meeting_place', $old['meeting_place'] ?? '') }}"
            placeholder="例：スミロン島、モアルボアル"
            required
        >

        @error('meeting_place')
            <p class="error">{{ $message }}</p>
        @enderror
    </div>


    {{-- 日付 --}}
    <div class="date-grid">

        <div class="form-group">

            <label for="start_date">
                出発日 *
            </label>

            <input
                type="date"
                id="start_date"
                name="start_date"
                value="{{ old('start_date', $old['start_date'] ?? '') }}"
                required
            >

            @error('start_date')
                <p class="error">{{ $message }}</p>
            @enderror

        </div>


        <div class="form-group">

            <label for="end_date">
                帰着日 *
            </label>

            <input
                type="date"
                id="end_date"
                name="end_date"
                value="{{ old('end_date', $old['end_date'] ?? '') }}"
                required
            >

            @error('end_date')
                <p class="error">{{ $message }}</p>
            @enderror

        </div>

    </div>


    <button
        type="submit"
        class="btn-primary"
    >
        次へ進む
    </button>

</form>

@endsection

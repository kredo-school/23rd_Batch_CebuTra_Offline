@extends('layouts.event_create')

@section('progress')

<div class="steps">
    <div class="active"></div>
    <div></div>
    <div></div>
    <div></div>
</div>

@endsection

@section('form')
<form method="POST"
action="{{ route('events.create.step1') }}"> //route
    @csrf
    <label for="trip_title">旅行タイトル</label>
    <input type="text" id="trip_title" name="trip_title" placeholder="例：スミロン島日帰りトリップ">

    <br>

    <label for="location">行き先</label>
    <input type="text" id="location" name="location" placeholder="例：スミロン島、モアルボアル"> //行き先選択

    <br>

    <div class="date-grid">

    <div>
    <label for="start_date">出発日</label>
    <input type="date" id="start_date" name="start_date">
    </div>

    <br>

    <div>
    <label for="end_date">帰着日</label>
    <input type="date" id="end_date" name="end_date">
    </div>

    </div>

    <button class="btn-primary">次へ進む</button>


</form>
@endsection

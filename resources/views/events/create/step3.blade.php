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
<form method="POST" action="{{ route('events.create.step3') }}">
@csrf
<label for="attach">

    <input type="radio" name="trip_id" value="checked">
    旅程を添付しない
</label>

@foreach ($itineraries as $itinerary)
<label for="itinerary">
<input type="radio" name="trip_id" value="{{ $itinerary->id }}"> //

{{ $itinerary->title }} //
</label>

@endforeach

<div class="button-group">
<a href="{{ route('events.create.step2') }}">戻る</a>

<button class="btn-primary">次へ進む</button>

</div>
</form>

@endsection

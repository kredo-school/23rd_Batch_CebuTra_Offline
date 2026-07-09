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
<form method="POST" action="{{ route('events.store') }}">//route
    @csrf
    <label for="trip_description">旅行の説明</label>
    <textarea name="trip_description" rows="6" placeholder="旅行の内容、持ち物、集合場所など詳しく書きましょう"></textarea>

    <div class="preview-card">
        <h3>{{ session('event.step1.title') }}</h3> //

        <p>{{ session('event.step1.location') }}</p>//

        <small>{{ session('event.step2.capacity') }}名募集</small>//
    </div>

    <div class="button-group">
        <a href="{{ route('events.create.step3') }}">戻る</a>//

        <button class="btn-submit">投稿する</button>
    </div>
</form>

@endsection

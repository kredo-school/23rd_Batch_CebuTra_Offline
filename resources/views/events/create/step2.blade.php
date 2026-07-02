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
<form action=""> //route
@csrf

<h3>募集人数</h3>
<div class="member-grid">
    @foreach ([2,3,4,5,6,7,8,9,10] as $member)

    <label for="capacity">
        <input type="radio" name="capacity" value="{{ $member }}">

        {{ $member }}名
    </label>
    @endforeach
</div>

<label for="budget">予算の目安</label>
<input type="text" id="budget" name="budget" placeholder="例：１５００～２０００ペソ">

<label for="tags">タグ（複数選択可）</label>

<div class="tags">
    @foreach ($tags as $tag)

    <label for="tag_item">
        <input type="checkbox" name="tags[]" value="{{ $tag->id }}">

        {{ $tag->name }}
    </label>
    @endforeach
</div>

<div class="button-group">
    <a href="" class="btn-outline">戻る</a> //route
    <button class="btn-primary">次へ進む</button>
</div>

</form>
@endsection

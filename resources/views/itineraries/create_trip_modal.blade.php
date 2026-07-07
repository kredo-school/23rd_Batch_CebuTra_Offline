{{-- @extends('layouts.app')

@section('title', '旅程ストック')

@section('content') --}}
<div class="modal" id="createModal">
    <div class="modal-content">
        <h2>旅程の名前を入力</h2>

        <p>後から変更できます</p>

        <form action="{{ }}" method="POST">

            @csrf

            <input type="text" name="title" placeholder="スミロン島2日間プラン" required>

            <button class="submit-btn">作成する</button>
        </form>
        
    </div>
</div>

{{-- @endsection --}}

{{-- resources/views/layouts/event-create.blade.php --}}

@extends('layouts.app')

@section('content')

<div class="container">

    <h1 class="page-title">
        旅行を募集する
    </h1>

    <p class="subtitle">
        一緒に旅する仲間を見つけましょう
    </p>

    @yield('progress')

    @yield('form')

</div>

@endsection

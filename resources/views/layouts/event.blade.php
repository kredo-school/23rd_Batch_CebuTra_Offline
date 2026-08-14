<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    >

    <title>
        {{ config('app.name', 'CebuTra') }}
    </title>


    {{-- Font Awesome --}}
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >


    {{-- Laravel / Vite --}}
    @vite([
        'resources/sass/app.scss',
        'resources/css/app.css',
        'resources/js/app.js'
    ])


    @stack('styles')

</head>


<body class="bg-[#f8f4ee] text-[#252337]">

    <div class="w-full min-h-screen bg-[#f8f4ee]">

        {{-- メインコンテンツ --}}
        <main class="w-full pb-24 md:pb-6 box-border">

            @yield('content')

        </main>

        {{-- 共通下部ナビゲーション(スマホサイズのみ表示) --}}
        @php
            $activeNav = trim($__env->yieldContent('activeNav'));
        @endphp

        <nav class="hidden max-md:flex
                    fixed left-1/2 bottom-0 -translate-x-1/2 z-[1000]
                    w-full max-w-[430px] h-[72px]
                    bg-white border-t border-[#eeeeee]
                    rounded-t-[18px]
                    shadow-[0_-3px_15px_rgba(0,0,0,0.08)]
                    items-center justify-around
                    px-2 pb-[env(safe-area-inset-bottom)] box-border">

            {{-- ホーム --}}
            <a href="{{ Route::has('home') ? route('home') : url('/') }}"
               class="relative w-1/5 h-[58px] flex flex-col items-center justify-center gap-0.5
                      rounded-lg no-underline hover:no-underline focus:no-underline visited:no-underline
                      [text-decoration:none] transition-colors duration-200
                      {{ $activeNav === 'home'
                          ? 'text-[#008f8c] bg-white border-2 border-[#75c9c7]'
                          : 'text-[#77716c]' }}">
                <i class="fa-solid fa-house text-[19px] leading-none no-underline"></i>
                <span class="text-[10px] font-semibold leading-tight whitespace-nowrap no-underline">ホーム</span>
            </a>

            {{-- 探す --}}
            <a href="{{ route('events.index') }}"
               class="relative w-1/5 h-[58px] flex flex-col items-center justify-center gap-0.5
                      rounded-lg no-underline hover:no-underline focus:no-underline visited:no-underline
                      [text-decoration:none] transition-colors duration-200
                      {{ $activeNav === 'explore'
                          ? 'text-[#008f8c] bg-white border-2 border-[#75c9c7]'
                          : 'text-[#77716c]' }}">
                <i class="fa-solid fa-magnifying-glass text-[19px] leading-none no-underline"></i>
                <span class="text-[10px] font-semibold leading-tight whitespace-nowrap no-underline">探す</span>
            </a>

            {{-- 募集(中央の＋ボタン) --}}
            <a href="{{ Route::has('events.create.step1') ? route('events.create.step1') : '#' }}"
               class="relative w-1/5 h-[58px] flex flex-col items-center justify-center gap-0.5
                      -mt-2 text-[#ff6045]
                      no-underline hover:no-underline focus:no-underline visited:no-underline
                      [text-decoration:none]">
                <span class="w-[52px] h-[52px] flex items-center justify-center
                             bg-[#ff5b3d] text-white rounded-[18px]
                             shadow-[0_5px_14px_rgba(255,91,61,0.30)]">
                    <i class="fa-solid fa-plus text-[24px] no-underline"></i>
                </span>
                <span class="text-[#ff5b3d] text-[10px] font-bold leading-none whitespace-nowrap no-underline">募集</span>
            </a>

            {{-- 旅程 --}}
            <a href="{{ Route::has('trips.index') ? route('trips.index') : '#' }}"
               class="relative w-1/5 h-[58px] flex flex-col items-center justify-center gap-0.5
                      rounded-lg no-underline hover:no-underline focus:no-underline visited:no-underline
                      [text-decoration:none] transition-colors duration-200
                      {{ $activeNav === 'trip'
                          ? 'text-[#008f8c] bg-white border-2 border-[#75c9c7]'
                          : 'text-[#77716c]' }}">
                <i class="fa-regular fa-map text-[19px] leading-none no-underline"></i>
                <span class="text-[10px] font-semibold leading-tight whitespace-nowrap no-underline">旅程</span>
            </a>

            {{-- プロフィール --}}
            <a href="{{ Route::has('profile') ? route('profile') : '#' }}"
               class="relative w-1/5 h-[58px] flex flex-col items-center justify-center gap-0.5
                      rounded-lg no-underline hover:no-underline focus:no-underline visited:no-underline
                      [text-decoration:none] transition-colors duration-200
                      {{ $activeNav === 'profile'
                          ? 'text-[#008f8c] bg-white border-2 border-[#75c9c7]'
                          : 'text-[#77716c]' }}">
                <i class="fa-regular fa-user text-[19px] leading-none no-underline"></i>
                <span class="text-[10px] font-semibold leading-tight whitespace-nowrap no-underline">プロフィール</span>
            </a>

        </nav>

    </div>

    @stack('scripts')

</body>

</html>
{{--<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/css/app.css','resources/js/app.js',])

</head>
<body>
    <div id="app">

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>--}}


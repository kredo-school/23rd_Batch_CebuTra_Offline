@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CebuTra - Cebu Travel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/your-code.js" crossorigin="anonymous"></script>
</head>
<body class="bg-amber-50 text-slate-800 font-sans pb-24"> <header class="flex justify-between items-center p-4 bg-transparent">
        <div class="flex items-center space-x-2">
            <div class="bg-teal-600 text-white p-2 rounded-xl font-bold text-xl">C</div>
            <div>
                <h1 class="text-xl font-black text-teal-600 tracking-tight">Cebu<span class="text-orange-500">Tra</span></h1>
                <p class="text-xs text-gray-400 font-bold">CEBU TRAVEL</p>
            </div>
        </div>
        <button class="relative bg-white p-2 rounded-full shadow-sm">
            <i class="fa-regular fa-bell text-xl"></i>
            <span class="absolute top-1 right-1 bg-orange-500 w-2 h-2 rounded-full"></span>
        </button>
    </header>

    <main class="px-4 space-y-6">

        <div class="bg-gradient-to-br from-teal-500 to-cyan-600 rounded-3xl p-5 text-white shadow-lg relative overflow-hidden">
            <p class="text-sm opacity-90">セブ島・今日</p>
            <div class="flex items-baseline space-x-2 my-1">
                <span class="text-5xl font-black">32°</span>
                <span class="text-xl opacity-70">/ 26°</span>
            </div>
            <p class="text-sm font-bold">晴れ</p>
            <div class="flex space-x-4 mt-3 text-xs opacity-80">
                <span><i class="fa-solid fa-droplet"></i> 湿度 78%</span>
                <span><i class="fa-solid fa-wind"></i> 風 12km/h</span>
            </div>
            <div class="absolute right-6 top-6 text-6xl text-amber-400 animate-pulse">☀️</div>
        </div>

        <div>
            <h2 class="text-lg font-bold mb-2">Spot Map</h2>
            <div class="bg-sky-200 h-32 rounded-3xl relative overflow-hidden flex items-center justify-center border border-white shadow-sm">
                <p class="text-sky-700 font-bold z-10"><i class="fa-solid fa-location-dot"></i> タップしてマップを開く</p>
                <div class="absolute inset-0 opacity-40 bg-cover" style="background-image: url('map-placeholder.png')"></div>
            </div>
        </div>

        <div>
            <div class="flex justify-between items-center mb-3">
                <h2 class="text-lg font-bold">Upcoming Trips</h2>
                <span class="bg-teal-100 text-teal-700 px-2 py-0.5 rounded-full text-xs font-bold">{{ $upcomingTrips->count() }}</span>
            </div>

            <div class="space-y-3">
                @foreach($upcomingTrips as $trip)
                <div class="bg-gradient-to-r from-teal-600 to-teal-500 text-white p-4 rounded-2xl shadow-md flex justify-between items-center">
                    <div class="space-y-1">
                        <span class="text-xs opacity-70">In {{ \Carbon\Carbon::parse($trip->trip_date)->diffInDays(now()) }} days</span>
                        <h3 class="font-bold text-lg">{{ $trip->title }}</h3>
                        <div class="flex space-x-3 text-xs opacity-90 pt-1">
                            <span><i class="fa-regular fa-calendar"></i> {{ $trip->trip_date }}</span>
                            <span><i class="fa-solid fa-users"></i> {{ $trip->approvedParticipantsCount() }}/{{ $trip->max_participants }}名</span>
                            <span><i class="fa-solid fa-location-dot"></i> {{ $trip->location }}</span>
                        </div>
                    </div>
                    <i class="fa-solid fa-chevron-right opacity-70"></i>
                </div>
                @endforeach
            </div>
        </div>

    </main>

    <nav class="fixed bottom-0 left-0 right-0 bg-white border-t border-gray-100 shadow-xl px-4 py-2 flex justify-between items-center z-50">
        <a href="{{ route('home') }}" class="flex flex-col items-center text-teal-600">
            <i class="fa-solid fa-house text-xl"></i>
            <span class="text-[10px] font-bold mt-1">Home</span>
        </a>
        <a href="{{ route('trips.search') }}" class="flex flex-col items-center text-gray-400 hover:text-teal-600">
            <i class="fa-solid fa-magnifying-glass text-xl"></i>
            <span class="text-[10px] font-bold mt-1">Search</span>
        </a>
        
        <div class="relative -top-5">
            <button onclick="togglePostModal()" class="bg-orange-500 text-white w-14 h-14 rounded-full flex items-center justify-center shadow-lg shadow-orange-500/40 border-4 border-white focus:outline-none">
                <i class="fa-solid fa-plus text-2xl"></i>
            </button>
            <span class="absolute -bottom-5 left-1/2 transform -translate-x-1/2 text-[10px] font-bold text-orange-500">Post</span>
        </div>

        <a href="#" class="flex flex-col items-center text-gray-400 hover:text-teal-600">
            <i class="fa-solid fa-map text-xl"></i>
            <span class="text-[10px] font-bold mt-1">Plan</span>
        </a>
        <a href="{{ route('profile.edit') }}" class="flex flex-col items-center text-gray-400 hover:text-teal-600">
            <i class="fa-solid fa-user text-xl"></i>
            <span class="text-[10px] font-bold mt-1">Profile</span>
        </a>
    </nav>

    <div id="postModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-end justify-center">
        </div>

    <script>
        function togglePostModal() {
            // モーダルの開閉ロジック
            alert("ここに募集作成フォームを表示します！");
        }
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'CebuTra')</title>
  
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  
  <!-- Fonts & Icons -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght=400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <style>
    body {
      font-family: 'Plus Jakarta Sans', 'Helvetica Neue', Arial, sans-serif;
      background-color: #f3f4f6;
    }
    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
  </style>
  @yield('styles')
</head>
<body class="flex justify-center items-center min-h-screen bg-gray-100 p-0 sm:p-4">

  <!-- Mobile Screen Frame Container -->
  <div class="w-full max-w-[412px] bg-[#FFFBF3] h-screen sm:h-[840px] shadow-2xl relative flex flex-col justify-between overflow-hidden sm:rounded-[40px]">
    
    <!-- Top Status Bar Mock -->
    <div class="flex justify-between items-center absolute top-3 left-6 right-6 text-xs font-semibold text-gray-800 z-30">
      <div>9:41</div>
      <div class="flex items-center space-x-1">
        <i class="fa-solid fa-signal text-[10px]"></i>
        <i class="fa-solid fa-water text-[10px]"></i>
        <i class="fa-solid fa-battery-three-quarters"></i>
      </div>
    </div>

    <!-- Header Section -->
    @yield('header')

    <!-- Scrollable Content Section -->
    <div class="@yield('main-class', 'flex-1 overflow-y-auto no-scrollbar p-5 space-y-6 pb-28')">
      @yield('content')
    </div>

    <!-- Footer Section -->
    @hasSection('footer')
      @yield('footer')
    @else
      @if(!isset($hideFooter) || !$hideFooter)
        <div class="absolute bottom-0 left-0 right-0 bg-white border-t border-gray-100 px-4 py-2 flex justify-between items-center sm:rounded-b-[40px] shadow-[0_-4px_12px_rgba(0,0,0,0.04)] z-30 flex-shrink-0">
          <a href="{{ route('home') }}" class="flex flex-col items-center justify-center w-14 py-1 {{ Route::is('home') ? 'text-[#008080] font-bold' : 'text-gray-400' }}">
            <i class="fa-solid fa-house text-lg"></i>
            <span class="text-[10px] {{ Route::is('home') ? 'font-bold' : 'font-medium' }} mt-0.5">Home</span>
          </a>
          <a href="{{ route('trips.search') }}" class="flex flex-col items-center justify-center w-14 py-1 {{ Route::is('trips.search') ? 'text-[#008080] font-bold' : 'text-gray-400' }}">
            <i class="fa-solid fa-magnifying-glass text-lg"></i>
            <span class="text-[10px] {{ Route::is('trips.search') ? 'font-bold' : 'font-medium' }} mt-0.5">Explore</span>
          </a>
          <div class="relative -top-5 flex flex-col items-center">
            <button class="w-14 h-14 bg-[#FF6347] rounded-full flex items-center justify-center text-white border-4 border-white shadow-md">
              <i class="fa-solid fa-plus text-xl"></i>
            </button>
            <span class="text-[10px] text-[#FF6347] font-bold mt-1">Recruit</span>
          </div>
          <a href="{{ route('itineraries.index') }}" class="flex flex-col items-center justify-center w-14 py-1 {{ Route::is('itineraries.*') ? 'text-[#008080] font-bold' : 'text-gray-400' }}">
            <i class="fa-solid fa-map text-lg"></i>
            <span class="text-[10px] {{ Route::is('itineraries.*') ? 'font-bold' : 'font-medium' }} mt-0.5">Itinerary</span>
          </a>
          <a href="{{ route('profile.show') }}" class="flex flex-col items-center justify-center w-14 py-1 {{ Route::is('profile.*') ? 'text-[#008080] font-bold' : 'text-gray-400' }}">
            <i class="fa-solid fa-user text-lg"></i>
            <span class="text-[10px] {{ Route::is('profile.*') ? 'font-bold' : 'font-medium' }} mt-0.5">Profile</span>
          </a>
        </div>
      @endif
    @endhasSection

  </div>

  @yield('scripts')
</body>
</html>

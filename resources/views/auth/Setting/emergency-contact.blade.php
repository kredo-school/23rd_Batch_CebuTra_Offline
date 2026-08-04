<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CebuTra - {{ __('messages.emergency.title') }}</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght=400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      font-family: 'Plus Jakarta Sans', 'Helvetica Neue', Arial, sans-serif;
      background-color: #f3f4f6;
    }
    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
  </style>
</head>
<body class="flex justify-center items-center min-h-screen bg-gray-100 p-0 sm:p-4">

  <div class="w-full max-w-[412px] bg-[#FFFBF3] h-screen sm:h-[840px] shadow-2xl relative flex flex-col justify-between overflow-hidden sm:rounded-[40px]">

    <!-- ヘッダー -->
    <div class="bg-white pt-10 pb-4 px-4 border-b border-gray-100 z-20 flex-shrink-0 relative">
      <div class="flex justify-between items-center absolute top-3 left-6 right-6 text-xs font-semibold text-gray-800">
        <div>9:41</div>
        <div class="flex items-center space-x-1">
          <i class="fa-solid fa-signal text-[10px]"></i>
          <i class="fa-solid fa-water text-[10px]"></i>
          <i class="fa-solid fa-battery-three-quarters"></i>
        </div>
      </div>

      <div class="flex justify-between items-center mt-2">
        <a href="{{ route('profile') }}" class="text-gray-500 hover:text-gray-800 transition-all text-sm font-bold flex items-center gap-1">
          <i class="fa-solid fa-chevron-left text-xs"></i> {{ __('messages.profile.title') }}
        </a>
        <h1 class="text-base font-bold text-gray-800">{{ __('messages.emergency.title') }}</h1>
        <div class="w-10"></div> <!-- レイアウト調整用 -->
      </div>
    </div>

    <!-- メインコンテンツ領域 -->
    <div class="flex-1 overflow-y-auto no-scrollbar p-5 space-y-5 pb-28">

      <!-- サブタイトル説明カード -->
      <div class="bg-red-500 text-white rounded-[24px] p-5 shadow-lg shadow-red-500/20 space-y-2">
        <div class="flex items-center gap-2">
          <i class="fa-solid fa-kit-medical text-xl"></i>
          <h2 class="text-sm font-bold">{{ __('messages.emergency.title') }}</h2>
        </div>
        <p class="text-xs text-red-100 leading-relaxed">
          {{ __('messages.emergency.subtitle') }}
        </p>
      </div>

      <!-- 1. 総合緊急ダイヤル -->
      <div class="space-y-3">
        <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider px-1">
          {{ __('messages.emergency.cat_general') }}
        </h3>

        <!-- 911 -->
        <div class="bg-white rounded-[24px] p-4 shadow-sm border border-gray-100/50 flex justify-between items-center">
          <div class="space-y-1">
            <h4 class="text-xs font-bold text-slate-800">{{ __('messages.emergency.police_fire') }}</h4>
            <p class="text-[10px] text-gray-400">{{ __('messages.emergency.police_fire_desc') }}</p>
            <span class="inline-block text-sm font-extrabold text-[#FF6347]">911</span>
          </div>
          <a href="tel:911" class="flex items-center gap-1.5 bg-[#FF6347] text-white px-3.5 py-2 rounded-xl text-xs font-bold shadow-sm active:scale-95 transition-transform">
            <i class="fa-solid fa-phone text-xs"></i>
            {{ __('messages.emergency.call') }}
          </a>
        </div>

        <!-- 観光警察 -->
        <div class="bg-white rounded-[24px] p-4 shadow-sm border border-gray-100/50 flex justify-between items-center">
          <div class="space-y-1">
            <h4 class="text-xs font-bold text-slate-800">{{ __('messages.emergency.tourist_police') }}</h4>
            <p class="text-[10px] text-gray-400">{{ __('messages.emergency.tourist_police_desc') }}</p>
            <span class="inline-block text-xs font-bold text-slate-700">+63 (32) 233-2178</span>
          </div>
          <a href="tel:+63322332178" class="flex items-center gap-1.5 bg-[#008080] text-white px-3.5 py-2 rounded-xl text-xs font-bold shadow-sm active:scale-95 transition-transform">
            <i class="fa-solid fa-phone text-xs"></i>
            {{ __('messages.emergency.call') }}
          </a>
        </div>
      </div>

      <!-- 2. 大使館・領事館 -->
      <div class="space-y-3">
        <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider px-1">
          {{ __('messages.emergency.cat_embassy') }}
        </h3>

        <div class="bg-white rounded-[24px] p-4 shadow-sm border border-gray-100/50 flex justify-between items-center">
          <div class="space-y-1">
            <h4 class="text-xs font-bold text-slate-800">{{ __('messages.emergency.japan_consulate') }}</h4>
            <p class="text-[10px] text-gray-400">{{ __('messages.emergency.japan_consulate_desc') }}</p>
            <span class="inline-block text-xs font-bold text-slate-700">+63 (32) 231-7321</span>
          </div>
          <a href="tel:+63322317321" class="flex items-center gap-1.5 bg-[#008080] text-white px-3.5 py-2 rounded-xl text-xs font-bold shadow-sm active:scale-95 transition-transform">
            <i class="fa-solid fa-phone text-xs"></i>
            {{ __('messages.emergency.call') }}
          </a>
        </div>
      </div>

      <!-- 3. 主要病院 -->
      <div class="space-y-3">
        <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider px-1">
          {{ __('messages.emergency.cat_hospital') }}
        </h3>

        <div class="bg-white rounded-[24px] p-4 shadow-sm border border-gray-100/50 flex justify-between items-center">
          <div class="space-y-1">
            <h4 class="text-xs font-bold text-slate-800">{{ __('messages.emergency.chung_hua') }}</h4>
            <p class="text-[10px] text-gray-400">{{ __('messages.emergency.chung_hua_desc') }}</p>
            <span class="inline-block text-xs font-bold text-slate-700">+63 (32) 255-8000</span>
          </div>
          <a href="tel:+63322558000" class="flex items-center gap-1.5 bg-[#008080] text-white px-3.5 py-2 rounded-xl text-xs font-bold shadow-sm active:scale-95 transition-transform">
            <i class="fa-solid fa-phone text-xs"></i>
            {{ __('messages.emergency.call') }}
          </a>
        </div>
      </div>

      <!-- 注記 -->
      <p class="text-[10px] text-gray-400 leading-relaxed px-2">
        {{ __('messages.emergency.notice') }}
      </p>

    </div>

    <!-- ボトムナビゲーション共通コンポーネント -->
    @include('components.bottom-nav')

  </div>

</body>
</html>
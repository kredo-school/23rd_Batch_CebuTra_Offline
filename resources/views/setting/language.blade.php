<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CebuTra - {{ __('messages.language_settings') }}</title>
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

  <!-- 💡 JSなしで送信するため、フォーム全体で包みます -->
  <form action="{{ route('setting.language.update') }}" method="POST" class="w-full max-w-[412px] bg-[#FFFBF3] h-screen sm:h-[840px] shadow-2xl relative flex flex-col justify-between overflow-hidden sm:rounded-[40px]">
    @csrf

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
        <a href="{{ route('all-settings') }}" class="text-gray-500 hover:text-gray-800 transition-all text-sm font-bold flex items-center gap-1">
          <i class="fa-solid fa-chevron-left text-xs"></i> {{ __('messages.back_settings') }}
        </a>
        <h1 class="text-base font-bold text-gray-800">{{ __('messages.language') }}</h1>
        
        <!-- 💡 JS不要：submitボタンでフォームをPOST送信します -->
        <button type="submit" class="text-[#008080] hover:text-[#0D7880] transition-all text-sm font-bold cursor-pointer">
          {{ __('messages.done') }}
        </button>
      </div>
    </div>

    
    <!-- デバッグ用：画面の上部に貼り付けて確認 -->
    {{-- <div class="bg-yellow-200 p-2 text-xs text-black font-mono">
    現在のLocale: {{ app()->getLocale() }} <br>
    セッションのLocale: {{ session('locale', 'なし') }}
    </div> --}}


    <!-- メイン領域 -->
    <div class="flex-1 overflow-y-auto no-scrollbar p-5 space-y-5 pb-28">
      
      <div class="space-y-2">
        <div class="bg-white rounded-[24px] shadow-sm border border-gray-100/50 overflow-hidden divide-y divide-gray-50">
          
          <!-- English -->
          <label class="flex justify-between items-center p-4 cursor-pointer hover:bg-gray-50/40 transition-colors">
            <div class="flex flex-col">
              <span class="text-sm font-bold text-slate-800">English</span>
              <span class="text-[10px] text-gray-400 font-medium">English</span>
            </div>
            <input type="radio" name="locale" value="english" 
                   {{ App::getLocale() === 'english' ? 'checked' : '' }} 
                   class="w-4 h-4 text-[#008080] border-gray-300 focus:ring-[#008080] accent-[#008080]">
          </label>

          <!-- 日本語 -->
          <label class="flex justify-between items-center p-4 cursor-pointer hover:bg-gray-50/40 transition-colors">
            <div class="flex flex-col">
              <span class="text-sm font-bold text-slate-800">日本語</span>
              <span class="text-[10px] text-gray-400 font-medium">Japanese</span>
            </div>
            <input type="radio" name="locale" value="japanese" 
                   {{ App::getLocale() === 'japanese' ? 'checked' : '' }} 
                   class="w-4 h-4 text-[#008080] border-gray-300 focus:ring-[#008080] accent-[#008080]">
          </label>

          <!-- 简体中文 -->
          <label class="flex justify-between items-center p-4 cursor-pointer hover:bg-gray-50/40 transition-colors">
            <div class="flex flex-col">
              <span class="text-sm font-bold text-slate-800">简体中文</span>
              <span class="text-[10px] text-gray-400 font-medium">Chinese (Simplified)</span>
            </div>
            <input type="radio" name="locale" value="chinese" 
                   {{ App::getLocale() === 'chinese' ? 'checked' : '' }} 
                   class="w-4 h-4 text-[#008080] border-gray-300 focus:ring-[#008080] accent-[#008080]">
          </label>

        </div>
      </div>

    </div>

    <!-- ボトムナビ -->
    @include('components.bottom-nav')
    {{-- <div class="absolute bottom-0 left-0 right-0 bg-white border-t border-gray-100 px-4 py-2 flex justify-between items-center sm:rounded-b-[40px] shadow-[0_-4px_12px_rgba(0,0,0,0.04)] z-30 flex-shrink-0">
      <a href="{{ route('home') }}" class="flex flex-col items-center justify-center w-14 py-1 text-gray-400 hover:text-gray-600"><i class="fa-solid fa-house text-lg"></i><span class="text-[10px] font-medium mt-0.5">Home</span></a>
      <a href="#" class="flex flex-col items-center justify-center w-14 py-1 text-gray-400 hover:text-gray-600"><i class="fa-solid fa-magnifying-glass text-lg"></i><span class="text-[10px] font-medium mt-0.5">Explore</span></a>
      <div class="relative -top-5 flex flex-col items-center">
        <a href="#" class="w-14 h-14 bg-[#FF6347] rounded-full flex items-center justify-center text-white border-4 border-white shadow-lg shadow-orange-500/30"><i class="fa-solid fa-plus text-xl"></i></a>
        <span class="text-[10px] text-[#FF6347] font-bold mt-1">Recruit</span>
      </div>
      <a href="#" class="flex flex-col items-center justify-center w-14 py-1 text-gray-400 hover:text-gray-600"><i class="fa-solid fa-map text-lg"></i><span class="text-[10px] font-medium mt-0.5">Itinerary</span></a>
      <a href="{{ route('profile') }}" class="flex flex-col items-center justify-center w-14 py-1 text-[#008080]"><i class="fa-solid fa-user text-lg"></i><span class="text-[10px] font-bold mt-0.5">Profile</span></a>
    </div> --}}

  </form>

</body>
</html>
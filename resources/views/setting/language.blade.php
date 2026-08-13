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

  <!-- 外枠コンテナ (sm:h-[720px]) -->
  <form action="{{ route('setting.language.update') }}" method="POST" class="w-full max-w-[412px] bg-[#FFFBF3] h-screen sm:h-[720px] shadow-2xl relative flex flex-col justify-between overflow-hidden sm:rounded-[36px]">
    @csrf

    <!-- ヘッダー -->
    <div class="bg-white pt-9 pb-3.5 px-4 border-b border-gray-100 z-20 flex-shrink-0 relative">
      <div class="flex justify-between items-center absolute top-2.5 left-5 right-5 text-xs font-semibold text-gray-800">
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
        
        <button type="submit" class="text-[#008080] hover:text-[#0D7880] transition-all text-sm font-bold cursor-pointer">
          {{ __('messages.done') }}
        </button>
      </div>
    </div>

    <!-- メイン領域（フォント・リスト項目の余白を拡大） -->
    <div class="flex-1 overflow-y-auto no-scrollbar p-5 space-y-5 pb-28">
      
      <div class="space-y-2">
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100/50 overflow-hidden divide-y divide-gray-50">
          
          <!-- English -->
          <label class="flex justify-between items-center p-4.5 cursor-pointer hover:bg-gray-50/40 transition-colors">
            <div class="flex flex-col space-y-0.5">
              <span class="text-base font-bold text-slate-800">English</span>
              <span class="text-xs text-gray-400 font-medium">English</span>
            </div>
            <input type="radio" name="locale" value="english" 
                   {{ App::getLocale() === 'english' ? 'checked' : '' }} 
                   class="w-5 h-5 text-[#008080] border-gray-300 focus:ring-[#008080] accent-[#008080]">
          </label>

          <!-- 日本語 -->
          <label class="flex justify-between items-center p-4.5 cursor-pointer hover:bg-gray-50/40 transition-colors">
            <div class="flex flex-col space-y-0.5">
              <span class="text-base font-bold text-slate-800">日本語</span>
              <span class="text-xs text-gray-400 font-medium">Japanese</span>
            </div>
            <input type="radio" name="locale" value="japanese" 
                   {{ App::getLocale() === 'japanese' ? 'checked' : '' }} 
                   class="w-5 h-5 text-[#008080] border-gray-300 focus:ring-[#008080] accent-[#008080]">
          </label>

          <!-- 简体中文 -->
          <label class="flex justify-between items-center p-4.5 cursor-pointer hover:bg-gray-50/40 transition-colors">
            <div class="flex flex-col space-y-0.5">
              <span class="text-base font-bold text-slate-800">简体中文</span>
              <span class="text-xs text-gray-400 font-medium">Chinese (Simplified)</span>
            </div>
            <input type="radio" name="locale" value="chinese" 
                   {{ App::getLocale() === 'chinese' ? 'checked' : '' }} 
                   class="w-5 h-5 text-[#008080] border-gray-300 focus:ring-[#008080] accent-[#008080]">
          </label>

        </div>
      </div>

    </div>

    <!-- ボトムナビ -->
    @include('components.bottom-nav')

  </form>

</body>
</html>
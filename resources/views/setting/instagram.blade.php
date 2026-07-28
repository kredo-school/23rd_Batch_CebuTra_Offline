<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CebuTra - {{ __('messages.instagram.title') }}</title>
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

  <!-- スマホ外枠コンテナ -->
  <div class="w-full max-w-[412px] bg-[#FFFBF3] h-screen sm:h-[840px] shadow-2xl relative flex flex-col justify-between overflow-hidden sm:rounded-[40px]">
    
    <!-- 💡 JS非依存フォーム（全体をformで囲む） -->
    <form action="{{ route('setting.instagram.update') }}" method="POST" class="flex flex-col h-full justify-between">
      @csrf

      <!-- 1. ヘッダー（上部固定） -->
      <div class="bg-white pt-10 pb-4 px-4 border-b border-gray-100 z-20 flex-shrink-0 relative">
        <!-- ステータスバー（擬似） -->
        <div class="flex justify-between items-center absolute top-3 left-6 right-6 text-xs font-semibold text-gray-800">
          <div>9:41</div>
          <div class="flex items-center space-x-1">
            <i class="fa-solid fa-signal text-[10px]"></i>
            <i class="fa-solid fa-water text-[10px]"></i>
            <i class="fa-solid fa-battery-three-quarters"></i>
          </div>
        </div>

        <!-- タイトルと戻るボタン・保存ボタン -->
        <div class="flex justify-between items-center mt-2">
          <a href="{{ route('all-settings') }}" class="text-gray-500 hover:text-gray-800 transition-all text-sm font-bold flex items-center gap-1">
            <i class="fa-solid fa-chevron-left text-xs"></i> {{ __('messages.settings.back') }}
          </a>
          <h1 class="text-base font-bold text-gray-800">{{ __('messages.instagram.title') }}</h1>
          <button type="submit" class="text-[#008080] hover:text-[#0D7880] transition-all text-sm font-bold cursor-pointer">
            {{ __('messages.instagram.save') }}
          </button>
        </div>
      </div>

      <!-- 2. メイン領域（スクロールエリア） -->
      <div class="flex-1 overflow-y-auto no-scrollbar p-5 space-y-5 pb-28">
        
        <!-- 安全のためのヒント -->
        <div class="bg-gradient-to-br from-purple-50 to-pink-50 border border-purple-100/50 rounded-[24px] p-4 space-y-1.5">
          <div class="flex items-center gap-2 text-purple-600">
            <i class="fa-brands fa-instagram text-base"></i>
            <h3 class="text-xs font-bold">{{ __('messages.instagram.safety_tip_title') }}</h3>
          </div>
          <p class="text-[10px] text-gray-600 font-medium leading-relaxed">
            {{ __('messages.instagram.safety_tip_desc') }}
          </p>
        </div>

        <!-- 項目 1: Instagram ID入力欄 -->
        <div class="space-y-2">
          <h3 class="text-[11px] font-bold text-slate-400 tracking-wider uppercase px-1">
            {{ __('messages.instagram.section_account') }}
          </h3>
          <div class="bg-white rounded-[24px] shadow-sm border border-gray-100/50 p-4">
            <label class="text-[10px] font-bold text-slate-600 block mb-1.5">{{ __('messages.instagram.username') }}</label>
            <div class="relative flex items-center">
              <span class="absolute left-4 text-xs font-bold text-gray-400">@</span>
              <input type="text" 
                     name="instagram_username" 
                     value="{{ old('instagram_username', auth()->user()->instagram_username ?? '') }}" 
                     placeholder="cebutra_user" 
                     class="w-full bg-gray-50 border border-gray-100 rounded-xl py-2.5 pl-8 pr-3 text-xs font-medium focus:outline-none focus:border-[#008080]/50 transition-colors">
            </div>
          </div>
        </div>

        <!-- 項目 2: 公開タイミングの設定（常時 or 確定メンバーのみ） -->
        <div class="space-y-2">
          <h3 class="text-[11px] font-bold text-slate-400 tracking-wider uppercase px-1">
            {{ __('messages.instagram.section_visibility') }}
          </h3>
          <div class="bg-white rounded-[24px] shadow-sm border border-gray-100/50 p-4 space-y-3">
            
            <!-- 常時公開 -->
            <label class="flex items-start gap-3 cursor-pointer">
              <input type="radio" 
                     name="visibility_timing" 
                     value="always" 
                     {{ old('visibility_timing', auth()->user()->instagram_visibility ?? 'always') === 'always' ? 'checked' : '' }} 
                     class="mt-1 accent-[#008080]">
              <div class="space-y-0.5">
                <span class="text-xs font-bold text-slate-800 block">{{ __('messages.instagram.vis_always_title') }}</span>
                <span class="text-[10px] text-gray-400 font-medium leading-normal">{{ __('messages.instagram.vis_always_desc') }}</span>
              </div>
            </label>

            <hr class="border-gray-50 my-1">

            <!-- 確定メンバーのみ公開 -->
            <label class="flex items-start gap-3 cursor-pointer">
              <input type="radio" 
                     name="visibility_timing" 
                     value="matched" 
                     {{ old('visibility_timing', auth()->user()->instagram_visibility ?? 'always') === 'matched' ? 'checked' : '' }} 
                     class="mt-1 accent-[#008080]">
              <div class="space-y-0.5">
                <span class="text-xs font-bold text-slate-800 block">{{ __('messages.instagram.vis_matched_title') }}</span>
                <span class="text-[10px] text-gray-400 font-medium leading-normal">{{ __('messages.instagram.vis_matched_desc') }}</span>
              </div>
            </label>

          </div>
        </div>

      </div>

    </form>

    <!-- 3. ボトムナビゲーションバー（共通コンポーネント読み込み） -->
    @include('components.bottom-nav')

  </div>

</body>
</html>
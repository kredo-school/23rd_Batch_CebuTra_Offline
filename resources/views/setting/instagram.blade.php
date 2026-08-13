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

  <!-- 外枠コンテナ (sm:h-[720px]) -->
  <div class="w-full max-w-[412px] bg-[#FFFBF3] h-screen sm:h-[720px] shadow-2xl relative flex flex-col justify-between overflow-hidden sm:rounded-[36px]">
    
    <!-- JS非依存フォーム（全体をformで包む） -->
    <form action="{{ route('setting.instagram.update') }}" method="POST" class="flex flex-col h-full justify-between">
      @csrf

      <!-- 1. ヘッダー -->
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
            <i class="fa-solid fa-chevron-left text-xs"></i> {{ __('messages.settings.back') }}
          </a>
          <h1 class="text-base font-bold text-gray-800">{{ __('messages.instagram.title') }}</h1>
          <button type="submit" class="text-[#008080] hover:text-[#0D7880] transition-all text-sm font-bold cursor-pointer">
            {{ __('messages.instagram.save') }}
          </button>
        </div>
      </div>

      <!-- 2. メイン領域（文字サイズ・余白を大きめに調整） -->
      <div class="flex-1 overflow-y-auto no-scrollbar p-5 space-y-6 pb-28">
        
        <!-- 安全のためのヒント -->
        <div class="bg-gradient-to-br from-purple-50 to-pink-50 border border-purple-100/50 rounded-3xl p-4.5 space-y-2">
          <div class="flex items-center gap-2.5 text-purple-600">
            <i class="fa-brands fa-instagram text-lg"></i>
            <h3 class="text-xs font-bold">{{ __('messages.instagram.safety_tip_title') }}</h3>
          </div>
          <p class="text-xs text-gray-600 font-medium leading-relaxed">
            {{ __('messages.instagram.safety_tip_desc') }}
          </p>
        </div>

        <!-- 項目 1: Instagram ID入力欄 -->
        <div class="space-y-2.5">
          <h3 class="text-xs font-bold text-slate-400 tracking-wider uppercase px-1">
            {{ __('messages.instagram.section_account') }}
          </h3>
          <div class="bg-white rounded-3xl shadow-sm border border-gray-100/50 p-4.5">
            <label class="text-xs font-bold text-slate-600 block mb-2">{{ __('messages.instagram.username') }}</label>
            <div class="relative flex items-center">
              <span class="absolute left-4 text-sm font-bold text-gray-400">@</span>
              <input type="text" 
                     name="instagram_username" 
                     value="{{ old('instagram_username', auth()->user()->instagram_username ?? '') }}" 
                     placeholder="cebutra_user" 
                     class="w-full bg-gray-50 border border-gray-100 rounded-2xl py-3 pl-9 pr-4 text-sm font-medium focus:outline-none focus:border-[#008080]/50 transition-colors">
            </div>
          </div>
        </div>

        <!-- 項目 2: 公開タイミングの設定 -->
        <div class="space-y-2.5">
          <h3 class="text-xs font-bold text-slate-400 tracking-wider uppercase px-1">
            {{ __('messages.instagram.section_visibility') }}
          </h3>
          <div class="bg-white rounded-3xl shadow-sm border border-gray-100/50 p-4.5 space-y-4">
            
            <!-- 常時公開 -->
            <label class="flex items-start gap-3.5 cursor-pointer">
              <input type="radio" 
                     name="visibility_timing" 
                     value="always" 
                     {{ old('visibility_timing', auth()->user()->instagram_visibility ?? 'always') === 'always' ? 'checked' : '' }} 
                     class="mt-1 w-4 h-4 accent-[#008080]">
              <div class="space-y-1">
                <span class="text-sm font-bold text-slate-800 block">{{ __('messages.instagram.vis_always_title') }}</span>
                <span class="text-xs text-gray-400 font-medium leading-relaxed block">{{ __('messages.instagram.vis_always_desc') }}</span>
              </div>
            </label>

            <hr class="border-gray-50 my-1">

            <!-- 確定メンバーのみ公開 -->
            <label class="flex items-start gap-3.5 cursor-pointer">
              <input type="radio" 
                     name="visibility_timing" 
                     value="matched" 
                     {{ old('visibility_timing', auth()->user()->instagram_visibility ?? 'always') === 'matched' ? 'checked' : '' }} 
                     class="mt-1 w-4 h-4 accent-[#008080]">
              <div class="space-y-1">
                <span class="text-sm font-bold text-slate-800 block">{{ __('messages.instagram.vis_matched_title') }}</span>
                <span class="text-xs text-gray-400 font-medium leading-relaxed block">{{ __('messages.instagram.vis_matched_desc') }}</span>
              </div>
            </label>

          </div>
        </div>

      </div>

    </form>

    <!-- 3. ボトムナビゲーションバー -->
    @include('components.bottom-nav')

  </div> 

</body>
</html>




{{-- <!DOCTYPE html>
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
</html> --}}



{{-- 

<!-- 💡 CSSのみで開閉を制御するダミーチェックボックス -->
<input type="checkbox" id="instagram-toggle" class="peer hidden" @if($errors->has('instagram_username')) checked @endif>

<!-- 💡 モーダルを開くトリガーボタン（必要に応じて設置・デザイン調整してください） -->
<label for="instagram-toggle" class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-[#833ab4] via-[#fd1d1d] to-[#fcb045] text-white text-xs font-bold rounded-xl shadow cursor-pointer hover:opacity-90 transition-all">
  <i class="fa-brands fa-instagram"></i>
  <span>{{ __('messages.instagram.title') }}</span>
</label>

<!-- モーダル背景＆枠組み -->
<div class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm opacity-0 pointer-events-none transition-all duration-300 peer-checked:opacity-100 peer-checked:pointer-events-auto">
  
  <!-- モーダル本体 -->
  <div class="bg-white w-[90%] max-w-[380px] rounded-3xl shadow-2xl overflow-hidden transform scale-95 opacity-0 transition-all duration-300 peer-checked:scale-100 peer-checked:opacity-100">
    
    <!-- モーダルヘッダー -->
    <div class="bg-gradient-to-r from-[#833ab4] via-[#fd1d1d] to-[#fcb045] p-5 text-white relative">
      <label for="instagram-toggle" class="absolute top-4 right-4 w-8 h-8 rounded-full bg-white/20 flex items-center justify-center text-white hover:bg-white/30 transition-colors cursor-pointer">
        <i class="fa-solid fa-xmark"></i>
      </label>

      <div class="flex items-center space-x-3">
        <div class="w-10 h-10 rounded-2xl bg-white/20 backdrop-blur-md flex items-center justify-center text-2xl">
          <i class="fa-brands fa-instagram"></i>
        </div>
        <div>
          <h3 class="font-bold text-lg leading-tight">{{ __('messages.instagram.title') }}</h3>
          <p class="text-[11px] opacity-80 mt-0.5">{{ __('messages.instagram.section_account') }}</p>
        </div>
      </div>
    </div>

    <!-- フォーム領域 -->
    <form action="{{ route('setting.instagram.update') }}" method="POST" class="p-5 space-y-5">
      @csrf
      @method('PATCH')

      <!-- 1. ユーザー名 (ID) 入力欄 -->
      <div class="space-y-1.5">
        <label for="modal_instagram_username" class="block text-xs font-bold text-gray-700">
          {{ __('messages.instagram.username') }}
        </label>
        <div class="relative flex items-center">
          <span class="absolute left-3.5 text-gray-400 font-bold text-sm">@</span>
          <input 
            type="text" 
            id="modal_instagram_username" 
            name="instagram_username" 
            value="{{ old('instagram_username', auth()->user()?->instagram_username) }}"
            placeholder="sakura_cebu" 
            class="w-full pl-8 pr-3 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm font-medium focus:outline-none focus:border-[#fd1d1d] focus:bg-white transition-all"
          >
        </div>
        
        @error('instagram_username')
          <p class="text-xs text-red-500 font-medium mt-1">{{ $message }}</p>
        @enderror
      </div>

      <!-- 2. 公開タイミングの設定 (ラジオボタンUI) -->
      <div class="space-y-2">
        <label class="block text-xs font-bold text-gray-700">
          {{ __('messages.instagram.section_visibility') }}
        </label>

        @php
          $currentVisibility = old('visibility_timing', auth()->user()?->instagram_visibility ?? 'always');
        @endphp

        <div class="space-y-3 bg-gray-50/50 p-3 rounded-2xl border border-gray-100">
          
          <!-- 常時公開 -->
          <label class="flex items-start gap-3 cursor-pointer">
            <input 
              type="radio" 
              name="visibility_timing" 
              value="always"
              {{ $currentVisibility === 'always' ? 'checked' : '' }}
              class="mt-1 accent-[#fd1d1d]"
            >
            <div class="space-y-0.5">
              <span class="text-xs font-bold text-slate-800 block">
                {{ __('messages.instagram.vis_always_title') }}
              </span>
              <span class="text-[10px] text-gray-400 font-medium leading-normal block">
                {{ __('messages.instagram.vis_always_desc') }}
              </span>
            </div>
          </label>

          <hr class="border-gray-100 my-1">

          <!-- 確定メンバーのみ公開 -->
          <label class="flex items-start gap-3 cursor-pointer">
            <input 
              type="radio" 
              name="visibility_timing" 
              value="matched"
              {{ $currentVisibility === 'matched' ? 'checked' : '' }}
              class="mt-1 accent-[#fd1d1d]"
            >
            <div class="space-y-0.5">
              <span class="text-xs font-bold text-slate-800 block">
                {{ __('messages.instagram.vis_matched_title') }}
              </span>
              <span class="text-[10px] text-gray-400 font-medium leading-normal block">
                {{ __('messages.instagram.vis_matched_desc') }}
              </span>
            </div>
          </label>

        </div>
      </div>

      <!-- 3. 安全のためのヒント（安全枠） -->
      <div class="bg-amber-50/80 border border-amber-200/60 rounded-2xl p-3 flex items-start gap-2.5">
        <i class="fa-solid fa-shield-halved text-amber-500 text-sm mt-0.5 shrink-0"></i>
        <div class="space-y-0.5">
          <span class="text-[11px] font-bold text-amber-900 block leading-tight">
            {{ __('messages.instagram.safety_tip_title') }}
          </span>
          <p class="text-[10px] text-amber-700/90 leading-tight">
            {{ __('messages.instagram.safety_tip_desc') }}
          </p>
        </div>
      </div>

      <!-- ボタンエリア -->
      <div class="pt-2 flex space-x-2">
        <label 
          for="instagram-toggle" 
          class="w-1/3 py-2.5 rounded-xl border border-gray-200 text-xs font-bold text-gray-600 hover:bg-gray-50 active:scale-95 transition-all text-center cursor-pointer"
        >
          キャンセル
        </label>
        
        <button 
          type="submit" 
          class="w-2/3 py-2.5 rounded-xl bg-gradient-to-r from-[#833ab4] via-[#fd1d1d] to-[#fcb045] text-white text-xs font-bold shadow-md hover:opacity-95 active:scale-95 transition-all"
        >
          {{ __('messages.instagram.save') }}
        </button>
      </div>

    </form>

  </div>

</div>


{{-- <!DOCTYPE html>
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


  <!-- 💡 CSSのみで開閉を制御するダミーチェックボックス -->
<input type="checkbox" id="instagram-toggle" class="peer hidden" @if($errors->has('instagram_username')) checked @endif>

<!-- モーダル背景＆枠組み -->
<div class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm opacity-0 pointer-events-none transition-all duration-300 peer-checked:opacity-100 peer-checked:pointer-events-auto">
  
  <!-- モーダル本体 -->
  <div class="bg-white w-[90%] max-w-[380px] rounded-3xl shadow-2xl overflow-hidden transform scale-95 opacity-0 transition-all duration-300 peer-checked:scale-100 peer-checked:opacity-100">
    
    <!-- モーダルヘッダー -->
    <div class="bg-gradient-to-r from-[#833ab4] via-[#fd1d1d] to-[#fcb045] p-5 text-white relative">
      <label for="instagram-toggle" class="absolute top-4 right-4 w-8 h-8 rounded-full bg-white/20 flex items-center justify-center text-white hover:bg-white/30 transition-colors cursor-pointer">
        <i class="fa-solid fa-xmark"></i>
      </label>

      <div class="flex items-center space-x-3">
        <div class="w-10 h-10 rounded-2xl bg-white/20 backdrop-blur-md flex items-center justify-center text-2xl">
          <i class="fa-brands fa-instagram"></i>
        </div>
        <div>
          <h3 class="font-bold text-lg leading-tight">{{ __('messages.instagram.title') }}</h3>
          <p class="text-[11px] opacity-80 mt-0.5">{{ __('messages.instagram.section_account') }}</p>
        </div>
      </div>
    </div>

    <!-- フォーム領域 -->
    <form action="{{ route('setting.instagram.update') }}" method="POST" class="p-5 space-y-5">
      @csrf
      @method('PATCH')

      <!-- 1. ユーザー名 (ID) 入力欄 -->
      <div class="space-y-1.5">
        <label for="modal_instagram_username" class="block text-xs font-bold text-gray-700">
          {{ __('messages.instagram.username') }}
        </label>
        <div class="relative flex items-center">
          <span class="absolute left-3.5 text-gray-400 font-bold text-sm">@</span>
          <input 
            type="text" 
            id="modal_instagram_username" 
            name="instagram_username" 
            value="{{ old('instagram_username', auth()->user()->instagram_username) }}"
            placeholder="sakura_cebu" 
            class="w-full pl-8 pr-3 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm font-medium focus:outline-none focus:border-[#fd1d1d] focus:bg-white transition-all"
          >
        </div>
        
        @error('instagram_username')
          <p class="text-xs text-red-500 font-medium mt-1">{{ $message }}</p>
        @enderror
      </div>

      <!-- 2. 公開タイミングの設定 (ラジオボタンUI) -->
      <div class="space-y-2">
        <label class="block text-xs font-bold text-gray-700">
          {{ __('messages.instagram.section_visibility') }}
        </label>

        @php
          $currentVisibility = old('visibility_timing', auth()->user()->instagram_visibility ?? 'always');
        @endphp

        <div class="space-y-3 bg-gray-50/50 p-3 rounded-2xl border border-gray-100">
          
          <!-- 常時公開 -->
          <label class="flex items-start gap-3 cursor-pointer">
            <input 
              type="radio" 
              name="visibility_timing" 
              value="always"
              {{ $currentVisibility === 'always' ? 'checked' : '' }}
              class="mt-1 accent-[#fd1d1d]"
            >
            <div class="space-y-0.5">
              <span class="text-xs font-bold text-slate-800 block">
                {{ __('messages.instagram.vis_always_title') }}
              </span>
              <span class="text-[10px] text-gray-400 font-medium leading-normal block">
                {{ __('messages.instagram.vis_always_desc') }}
              </span>
            </div>
          </label>

          <hr class="border-gray-100 my-1">

          <!-- 確定メンバーのみ公開 -->
          <label class="flex items-start gap-3 cursor-pointer">
            <input 
              type="radio" 
              name="visibility_timing" 
              value="matched"
              {{ $currentVisibility === 'matched' ? 'checked' : '' }}
              class="mt-1 accent-[#fd1d1d]"
            >
            <div class="space-y-0.5">
              <span class="text-xs font-bold text-slate-800 block">
                {{ __('messages.instagram.vis_matched_title') }}
              </span>
              <span class="text-[10px] text-gray-400 font-medium leading-normal block">
                {{ __('messages.instagram.vis_matched_desc') }}
              </span>
            </div>
          </label>

        </div>
      </div>

      <!-- 3. 安全のためのヒント（安全枠） -->
      @if(isset($translation['instagram']['safety_tip_title']))
      <div class="bg-amber-50/80 border border-amber-200/60 rounded-2xl p-3 flex items-start gap-2.5">
        <i class="fa-solid fa-shield-halved text-amber-500 text-sm mt-0.5 shrink-0"></i>
        <div class="space-y-0.5">
          <span class="text-[11px] font-bold text-amber-900 block leading-tight">
            {{ __('messages.instagram.safety_tip_title') }}
          </span>
          <p class="text-[10px] text-amber-700/90 leading-tight">
            {{ __('messages.instagram.safety_tip_desc') }}
          </p>
        </div>
      </div>
      @endif

      <!-- ボタンエリア -->
      <div class="pt-2 flex space-x-2">
        <label 
          for="instagram-toggle"
          class="w-1/3 py-2.5 rounded-xl border border-gray-200 text-xs font-bold text-gray-600 hover:bg-gray-50 active:scale-95 transition-all text-center cursor-pointer"
        >
          キャンセル
        </label>
        
        <button 
          type="submit" 
          class="w-2/3 py-2.5 rounded-xl bg-gradient-to-r from-[#833ab4] via-[#fd1d1d] to-[#fcb045] text-white text-xs font-bold shadow-md hover:opacity-95 active:scale-95 transition-all"
        >
          {{ __('messages.instagram.save') }}
        </button>
      </div>

    </form>

  </div>

</div> --}}




  {{-- <!-- スマホ外枠コンテナ -->
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
          <h3 class="text-[11px] font-bold text-slate-400 tracking-wider px-1">
            {{ __('messages.instagram.section_account') }}
          </h3>
          <div class="bg-white rounded-[24px] shadow-sm border border-gray-100/50 p-4">
            <label class="text-[10px] font-bold text-slate-600 block mb-1.5">{{ __('messages.instagram.username') }}</label>
            <div class="relative flex items-center">
              <span class="absolute left-4 text-xs font-bold text-gray-400">@</span>
              <input type="text"
                     id="modal_instagram_username"
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
</html> --}} --}}
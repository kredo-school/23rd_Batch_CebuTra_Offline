<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CebuTra - {{ __('messages.terms.title') }}</title>
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
        <h1 class="text-base font-bold text-gray-800">{{ __('messages.terms.title') }}</h1>
        <div class="w-10"></div> <!-- レイアウト調整用スペース -->
      </div>
    </div>

    <!-- メインコンテンツ領域（スクロール可能） -->
    <div class="flex-1 overflow-y-auto no-scrollbar p-5 space-y-6 pb-28">

      <!-- タイトル ＆ 最終更新日 -->
      <div class="bg-white rounded-[24px] p-5 shadow-sm border border-gray-100/50 space-y-3">
        <div class="flex items-center gap-2 text-[#008080]">
          <i class="fa-solid fa-shield-halved text-lg"></i>
          <span class="text-xs font-bold uppercase tracking-wider">CebuTra Policies</span>
        </div>
        <p class="text-[11px] text-gray-400 font-medium">{{ __('messages.terms.last_updated') }}</p>
        <p class="text-xs text-slate-600 leading-relaxed pt-1">
          {{ __('messages.terms.intro') }}
        </p>
      </div>

      <!-- 各条項リスト -->
      <div class="bg-white rounded-[24px] p-5 shadow-sm border border-gray-100/50 space-y-5">

        <!-- 第1条 -->
        <div class="space-y-1.5">
          <h2 class="text-xs font-bold text-slate-800 flex items-center gap-2">
            <span class="w-1.5 h-1.5 rounded-full bg-[#008080]"></span>
            {{ __('messages.terms.sec1_title') }}
          </h2>
          <p class="text-xs text-slate-600 leading-relaxed pl-3.5">
            {{ __('messages.terms.sec1_desc') }}
          </p>
        </div>

        <hr class="border-gray-100">

        <!-- 第2条 -->
        <div class="space-y-1.5">
          <h2 class="text-xs font-bold text-slate-800 flex items-center gap-2">
            <span class="w-1.5 h-1.5 rounded-full bg-[#008080]"></span>
            {{ __('messages.terms.sec2_title') }}
          </h2>
          <p class="text-xs text-slate-600 leading-relaxed pl-3.5">
            {{ __('messages.terms.sec2_desc') }}
          </p>
        </div>

        <hr class="border-gray-100">

        <!-- 第3条（重要） -->
        <div class="space-y-1.5 bg-amber-50/50 p-3.5 rounded-2xl border border-amber-100">
          <h2 class="text-xs font-bold text-amber-900 flex items-center gap-2">
            <i class="fa-solid fa-triangle-exclamation text-amber-500"></i>
            {{ __('messages.terms.sec3_title') }}
          </h2>
          <p class="text-xs text-amber-800/90 leading-relaxed pl-5">
            {{ __('messages.terms.sec3_desc') }}
          </p>
        </div>

        <hr class="border-gray-100">

        <!-- 第4条 -->
        <div class="space-y-1.5">
          <h2 class="text-xs font-bold text-slate-800 flex items-center gap-2">
            <span class="w-1.5 h-1.5 rounded-full bg-[#008080]"></span>
            {{ __('messages.terms.sec4_title') }}
          </h2>
          <p class="text-xs text-slate-600 leading-relaxed pl-3.5">
            {{ __('messages.terms.sec4_desc') }}
          </p>
        </div>

        <hr class="border-gray-100">

        <!-- 第5条 -->
        <div class="space-y-1.5">
          <h2 class="text-xs font-bold text-slate-800 flex items-center gap-2">
            <span class="w-1.5 h-1.5 rounded-full bg-[#008080]"></span>
            {{ __('messages.terms.sec5_title') }}
          </h2>
          <p class="text-xs text-slate-600 leading-relaxed pl-3.5">
            {{ __('messages.terms.sec5_desc') }}
          </p>
        </div>

      </div>

      <!-- サポート問合せリンク -->
      <div class="text-center pt-2 pb-4 space-y-2">
        <p class="text-[11px] text-gray-400">{{ __('messages.terms.agree_contact') }}</p>
        <a href="mailto:support@cebutra.com" class="inline-flex items-center gap-2 text-xs font-bold text-[#008080] bg-white px-4 py-2.5 rounded-xl border border-teal-100 shadow-sm hover:bg-teal-50 transition-colors">
          <i class="fa-regular fa-envelope"></i>
          {{ __('messages.terms.contact_support') }}
        </a>
      </div>

    </div>

    <!-- ボトムナビゲーション -->
    @include('components.bottom-nav')

  </div>

</body>
</html>
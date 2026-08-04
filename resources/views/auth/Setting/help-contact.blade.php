<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CebuTra - {{ __('messages.help.title') }}</title>
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
        <h1 class="text-base font-bold text-gray-800">{{ __('messages.help.title') }}</h1>
        <div class="w-10"></div> <!-- レイアウト調整用 -->
      </div>
    </div>

    <!-- メインコンテンツ領域 -->
    <div class="flex-1 overflow-y-auto no-scrollbar p-5 space-y-6 pb-28">

      <!-- よくある質問（FAQ） -->
      <div class="space-y-3">
        <h2 class="text-xs font-bold text-gray-400 uppercase tracking-wider px-1">
          {{ __('messages.help.popular_faq') }}
        </h2>

        <div class="bg-white rounded-[24px] shadow-sm border border-gray-100/50 overflow-hidden divide-y divide-gray-50">
          
          <!-- Q1 -->
          <details class="group p-4 [&_summary::-webkit-details-marker]:hidden cursor-pointer">
            <summary class="flex justify-between items-center text-xs font-bold text-slate-800">
              <span class="flex items-center gap-2">
                <i class="fa-solid fa-circle-question text-[#008080]"></i>
                {{ __('messages.help.faq1_q') }}
              </span>
              <i class="fa-solid fa-chevron-down text-[10px] text-gray-300 transition-transform group-open:rotate-180"></i>
            </summary>
            <p class="text-xs text-slate-600 leading-relaxed pt-3 pl-6 border-t border-gray-50 mt-3">
              {{ __('messages.help.faq1_a') }}
            </p>
          </details>

          <!-- Q2 -->
          <details class="group p-4 [&_summary::-webkit-details-marker]:hidden cursor-pointer">
            <summary class="flex justify-between items-center text-xs font-bold text-slate-800">
              <span class="flex items-center gap-2">
                <i class="fa-solid fa-circle-question text-[#008080]"></i>
                {{ __('messages.help.faq2_q') }}
              </span>
              <i class="fa-solid fa-chevron-down text-[10px] text-gray-300 transition-transform group-open:rotate-180"></i>
            </summary>
            <p class="text-xs text-slate-600 leading-relaxed pt-3 pl-6 border-t border-gray-50 mt-3">
              {{ __('messages.help.faq2_a') }}
            </p>
          </details>

          <!-- Q3 -->
          <details class="group p-4 [&_summary::-webkit-details-marker]:hidden cursor-pointer">
            <summary class="flex justify-between items-center text-xs font-bold text-slate-800">
              <span class="flex items-center gap-2">
                <i class="fa-solid fa-circle-question text-[#008080]"></i>
                {{ __('messages.help.faq3_q') }}
              </span>
              <i class="fa-solid fa-chevron-down text-[10px] text-gray-300 transition-transform group-open:rotate-180"></i>
            </summary>
            <p class="text-xs text-slate-600 leading-relaxed pt-3 pl-6 border-t border-gray-50 mt-3">
              {{ __('messages.help.faq3_a') }}
            </p>
          </details>

          <!-- Q4 -->
          <details class="group p-4 [&_summary::-webkit-details-marker]:hidden cursor-pointer">
            <summary class="flex justify-between items-center text-xs font-bold text-slate-800">
              <span class="flex items-center gap-2">
                <i class="fa-solid fa-circle-question text-[#008080]"></i>
                {{ __('messages.help.faq4_q') }}
              </span>
              <i class="fa-solid fa-chevron-down text-[10px] text-gray-300 transition-transform group-open:rotate-180"></i>
            </summary>
            <p class="text-xs text-slate-600 leading-relaxed pt-3 pl-6 border-t border-gray-50 mt-3">
              {{ __('messages.help.faq4_a') }}
            </p>
          </details>

        </div>
      </div>

      <!-- お問い合わせカード -->
      <div class="bg-white rounded-[24px] p-5 shadow-sm border border-gray-100/50 space-y-3 text-center">
        <div class="w-10 h-10 bg-teal-50 text-[#008080] rounded-full flex items-center justify-center mx-auto text-base">
          <i class="fa-solid fa-headset"></i>
        </div>
        <h3 class="text-xs font-bold text-slate-800">{{ __('messages.help.contact_us') }}</h3>
        <p class="text-[11px] text-gray-400 leading-relaxed">
          {{ __('messages.help.contact_desc') }}
        </p>
        <a href="mailto:support@cebutra.com" class="inline-block w-full py-2.5 bg-[#008080] text-white text-xs font-bold rounded-xl shadow-sm hover:bg-[#0D7880] transition-colors">
          {{ __('messages.help.send_inquiry') }}
        </a>
      </div>

    </div>

    <!-- ボトムナビゲーション共通コンポーネント -->
    @include('components.bottom-nav')

  </div>

</body>
</html>
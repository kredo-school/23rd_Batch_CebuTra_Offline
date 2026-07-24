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



// 質問バーありのページ

{{-- <!DOCTYPE html>
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
    <div class="flex-1 overflow-y-auto no-scrollbar p-5 space-y-5 pb-28">

      <!-- 検索バー -->
      <div class="relative">
        <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
        <input type="text" 
               placeholder="{{ __('messages.help.search_placeholder') }}" 
               class="w-full bg-white pl-10 pr-4 py-3 rounded-2xl border border-gray-100 text-xs text-slate-800 focus:outline-none focus:border-[#008080] shadow-sm">
      </div>

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
</html> --}}



{{-- <!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CebuTra - Help & Contact</title>
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
    
    /* 💡 HTML標準の三角形矢印マークを消すための設定 */
    details summary::-webkit-details-marker { display: none; }
    details summary { list-style: none; }
    
    /* 💡 開閉時にアイコンを回転させるCSS効果 */
    details[open] .faq-icon { transform: rotate(180deg); }
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
        <!-- 💡 設定画面ルートへ戻る -->
        <a href="{{ route('all-settings') }}" class="text-gray-500 hover:text-gray-800 transition-all text-sm font-bold flex items-center gap-1">
          <i class="fa-solid fa-chevron-left text-xs"></i> Settings
        </a>
        <h1 class="text-base font-bold text-gray-800">Help Center</h1>
        <div class="w-12"></div>
      </div>
    </div>

    <!-- メイン領域 -->
    <div class="flex-1 overflow-y-auto no-scrollbar p-5 space-y-6 pb-28">
      
      <!-- カスタマーサポート窓口 -->
      <div class="bg-white rounded-2xl p-4 shadow-sm border border-gray-100/50 text-center space-y-3">
        <div class="w-10 h-10 bg-teal-50 text-[#008080] rounded-xl flex items-center justify-center text-base mx-auto">
          <i class="fa-regular fa-envelope"></i>
        </div>
        <div class="space-y-1">
          <h3 class="text-xs font-bold text-slate-800">Still need help?</h3>
          <p class="text-[10px] text-gray-400 font-medium">If you can't find the answer below, please contact us.</p>
        </div>
        <a href="mailto:support@cebutra.com?subject=CebuTra%20Inquiry" class="block w-full bg-[#008080] hover:bg-[#0D7880] text-white text-xs font-bold py-2.5 px-4 rounded-xl transition-all shadow-sm">
          Contact Support
        </a>
      </div>

      <!-- FAQ（よくある質問）セクション ※JSを一切使わずdetails/summaryタグで制御 -->
      <div class="space-y-2.5">
        <h3 class="text-[11px] font-bold text-slate-400 tracking-wider uppercase px-1">Frequently Asked Questions</h3>
        
        <!-- FAQ 1 -->
        <details class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden transition-all group">
          <summary class="p-4 flex justify-between items-center cursor-pointer hover:bg-gray-50/40 select-none outline-none">
            <div class="flex items-center gap-2.5">
              <span class="text-xs font-bold text-[#008080]">Q.</span>
              <h4 class="text-xs font-bold text-gray-700">Is this app free to use?</h4>
            </div>
            <i class="fa-solid fa-chevron-down text-[10px] text-gray-300 transition-transform duration-200 faq-icon"></i>
          </summary>
          <div class="px-4 pb-4 pt-1 border-t border-gray-50 bg-gray-50/30 text-[11px] text-slate-600 leading-relaxed font-medium pl-8">
            Yes, basic features including creating itineraries and matching with other students/travelers are completely free.[cite: 3]<br>
            <span class="text-[10px] text-gray-400">【料金について】基本的な機能（旅程の作成、マッチングなど）はすべて無料でご利用いただけます。</span>[cite: 3]
          </div>
        </details>

        <!-- FAQ 2 -->
        <details class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden transition-all group">
          <summary class="p-4 flex justify-between items-center cursor-pointer hover:bg-gray-50/40 select-none outline-none">
            <div class="flex items-center gap-2.5">
              <span class="text-xs font-bold text-[#008080]">Q.</span>
              <h4 class="text-xs font-bold text-gray-700">How do I split tour costs with others?</h4>
            </div>
            <i class="fa-solid fa-chevron-down text-[10px] text-gray-300 transition-transform duration-200 faq-icon"></i>
          </summary>
          <div class="px-4 pb-4 pt-1 border-t border-gray-50 bg-gray-50/30 text-[11px] text-slate-600 leading-relaxed font-medium pl-8">
            Cost-sharing rules must be agreed upon via chat before the trip. We highly recommend using cash (PHP) or local banking apps (GCash) on-site.[cite: 3]<br>
            <span class="text-[10px] text-gray-400">【割り勘について】ツアー代の精算方法は事前にチャットで合意してください。現地での現金（ペソ）や、現地決済アプリ（GCash）の利用をおすすめします。</span>[cite: 3]
          </div>
        </details>

        <!-- FAQ 3 -->
        <details class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden transition-all group">
          <summary class="p-4 flex justify-between items-center cursor-pointer hover:bg-gray-50/40 select-none outline-none">
            <div class="flex items-center gap-2.5">
              <span class="text-xs font-bold text-[#008080]">Q.</span>
              <h4 class="text-xs font-bold text-gray-700">Can non-students use this application?</h4>
            </div>
            <i class="fa-solid fa-chevron-down text-[10px] text-gray-300 transition-transform duration-200 faq-icon"></i>
          </summary>
          <div class="px-4 pb-4 pt-1 border-t border-gray-50 bg-gray-50/30 text-[11px] text-slate-600 leading-relaxed font-medium pl-8">
            Absolutely! While many users are language school students, CebuTra is open to all travelers, backpackers, and digital nomads visiting Cebu.[cite: 3]<br>
            <span class="text-[10px] text-gray-400">【利用資格】どなたでもご利用いただけます！語学留学生のユーザーが多いですが、一般の旅行者やバックパッカーも大歓迎です。</span>[cite: 3]
          </div>
        </details>

        <!-- FAQ 4 -->
        <details class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden transition-all group">
          <summary class="p-4 flex justify-between items-center cursor-pointer hover:bg-gray-50/40 select-none outline-none">
            <div class="flex items-center gap-2.5">
              <span class="text-xs font-bold text-[#008080]">Q.</span>
              <h4 class="text-xs font-bold text-gray-700">How do I report a malicious user?</h4>
            </div>
            <i class="fa-solid fa-chevron-down text-[10px] text-gray-300 transition-transform duration-200 faq-icon"></i>
          </summary>
          <div class="px-4 pb-4 pt-1 border-t border-gray-50 bg-gray-50/30 text-[11px] text-slate-600 leading-relaxed font-medium pl-8">
            You can report users by tapping the "Report" button on their profile or chat screen. Our team will review and take action immediately.[cite: 3]<br>
            <span class="text-[10px] text-gray-400">【通報について】悪質なユーザーを発見した場合は、相手のプロフィールやチャット画面にある「通報ボタン」から運営に報告してください。</span>[cite: 3]
          </div>
        </details>

      </div>

    </div>

    <!-- ボトムナビ（各ルート適用） -->
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

  </div>

</body>
</html> --}}
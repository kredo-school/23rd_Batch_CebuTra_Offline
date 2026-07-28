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

    <!-- ボトムナビゲーション（共通コンポーネント） -->
    @include('components.bottom-nav')

  </div>

</body>
</html>


{{-- <!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CebuTra - Terms & Disclaimers</title>
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
        <!-- 💡 設定画面へ戻るリンクをLaravelルートに変更 -->
        <a href="{{ route('all-settings') }}" class="text-gray-500 hover:text-gray-800 transition-all text-sm font-bold flex items-center gap-1">
          <i class="fa-solid fa-chevron-left text-xs"></i> {{ __('messages.back_settings') }}
        </a>
        <h1 class="text-base font-bold text-gray-800">{{ __('messages.terms_title') }}</h1>
        <div class="w-12"></div> 
      </div>
    </div>

    <!-- メイン領域 -->
    <div class="flex-1 overflow-y-auto no-scrollbar p-5 space-y-5 pb-28">
      
      <div class="px-1">
        <p class="text-xs text-slate-500 leading-relaxed font-medium">
          Please read these Terms & Disclaimers carefully before using CebuTra. By using this application, you agree to comply with and be bound by the following terms.[cite: 4]
        </p>
        <p class="text-[10px] text-gray-400 mt-1">Last updated: July 2026</p>
      </div>

      <!-- Section 1 -->
      <div class="bg-white rounded-2xl p-4 shadow-sm border border-gray-100/50 space-y-2">
        <div class="flex items-center gap-2 text-[#008080] font-bold text-xs">
          <span class="w-5 h-5 rounded-lg bg-teal-50 flex items-center justify-center text-[10px]">1</span>
          <h3>Purpose of the Service</h3>
        </div>
        <div class="text-[11px] leading-relaxed text-slate-600 font-medium space-y-1 pl-7">
          <p>CebuTra is a platform built to help language school students and travelers in Cebu connect and plan itineraries together.[cite: 4]</p>
          <p class="text-gray-400 text-[10px]">【サービスの目的】当アプリは、セブ島の語学学校の生徒や旅行者同士が繋がり、一緒に旅程を計画・共有するためのプラットフォームです。</p>[cite: 4]
        </div>
      </div>

      <!-- Section 2 -->
      <div class="bg-white rounded-2xl p-4 shadow-sm border border-gray-100/50 space-y-2">
        <div class="flex items-center gap-2 text-[#008080] font-bold text-xs">
          <span class="w-5 h-5 rounded-lg bg-teal-50 flex items-center justify-center text-[10px]">2</span>
          <h3>User Responsibility & Interactions</h3>
        </div>
        <div class="text-[11px] leading-relaxed text-slate-600 font-medium space-y-1 pl-7">
          <p>You are solely responsible for your interactions with other users. CebuTra does not conduct background checks on its users and is not responsible for any disputes, accidents, damages, or harm arising from your meetups or joint trips.[cite: 4]</p>
          <p class="text-gray-400 text-[10px]">【自己責任原則】ユーザー同士の交流や実際の出会い・旅行中に発生したトラブル、事故、損害について、当アプリは一切の責任を負いません。すべて自己責任で行動してください。</p>[cite: 4]
        </div>
      </div>

      <!-- Section 3 -->
      <div class="bg-white rounded-2xl p-4 shadow-sm border border-gray-100/50 space-y-2">
        <div class="flex items-center gap-2 text-[#008080] font-bold text-xs">
          <span class="w-5 h-5 rounded-lg bg-teal-50 flex items-center justify-center text-[10px]">3</span>
          <h3>Financial & Cost Sharing Disputes</h3>
        </div>
        <div class="text-[11px] leading-relaxed text-slate-600 font-medium space-y-1 pl-7">
          <p>Any cost-sharing arrangements (e.g., splitting tour fees, transportation, or meals) are strictly between the participating users. CebuTra does not manage transactions and will not intervene in any financial disputes or unpaid expenses.[cite: 4]</p>
          <p class="text-gray-400 text-[10px]">【金銭トラブルの免責】ツアー代金の割り勘、交通費、食事代などの金銭的なやり取りはユーザー間で完結させてください。運営は一切関与せず、未払い等のトラブルへの仲裁も行いません。</p>[cite: 4]
        </div>
      </div>

      <!-- Section 4 -->
      <div class="bg-white rounded-2xl p-4 shadow-sm border border-gray-100/50 space-y-2">
        <div class="flex items-center gap-2 text-[#008080] font-bold text-xs">
          <span class="w-5 h-5 rounded-lg bg-teal-50 flex items-center justify-center text-[10px]">4</span>
          <h3>No Guarantee of Information</h3>
        </div>
        <div class="text-[11px] leading-relaxed text-slate-600 font-medium space-y-1 pl-7">
          <p>While we strive to provide helpful travel and local info, CebuTra does not guarantee the accuracy, completeness, or safety of any user-generated itineraries, schedules, or external tour links posted on the platform.[cite: 4]</p>
          <p class="text-gray-400 text-[10px]">【情報の無保証】アプリ内に掲載されるユーザー発信の旅程や外部ツアーのリンク、各種情報の正確性や安全性について、運営はその完全性を保証するものではありません。</p>[cite: 4]
        </div>
      </div>

      <div class="text-center text-[10px] text-gray-400 pt-2 font-medium">
        &copy; 2026 CebuTra App. All Rights Reserved.[cite: 4]
      </div>

    </div>

    <!-- ボトムナビ（Laravelルート適用） -->
    <div class="absolute bottom-0 left-0 right-0 bg-white border-t border-gray-100 px-4 py-2 flex justify-between items-center sm:rounded-b-[40px] shadow-[0_-4px_12px_rgba(0,0,0,0.04)] z-30 flex-shrink-0">
      <a href="{{ route('home') }}" class="flex flex-col items-center justify-center w-14 py-1 text-gray-400 hover:text-gray-600"><i class="fa-solid fa-house text-lg"></i><span class="text-[10px] font-medium mt-0.5">Home</span></a>
      <a href="#" class="flex flex-col items-center justify-center w-14 py-1 text-gray-400 hover:text-gray-600"><i class="fa-solid fa-magnifying-glass text-lg"></i><span class="text-[10px] font-medium mt-0.5">Explore</span></a>
      <div class="relative -top-5 flex flex-col items-center">
        <a href="#" class="w-14 h-14 bg-[#FF6347] rounded-full flex items-center justify-center text-white border-4 border-white shadow-lg shadow-orange-500/30"><i class="fa-solid fa-plus text-xl"></i></a>
        <span class="text-[10px] text-[#FF6347] font-bold mt-1">Recruit</span>
      </div>
      <a href="#" class="flex flex-col items-center justify-center w-14 py-1 text-gray-400 hover:text-gray-600"><i class="fa-solid fa-map text-lg"></i><span class="text-[10px] font-medium mt-0.5">Itinerary</span></a>
      <a href="{{ route('profile') }}" class="flex flex-col items-center justify-center w-14 py-1 text-[#008080]"><i class="fa-solid fa-user text-lg"></i><span class="text-[10px] font-bold mt-0.5">Profile</span></a>
    </div>

  </div>

</body>
</html> --}}
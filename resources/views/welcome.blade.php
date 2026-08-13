<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome to CebuTra</title>
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

  <!-- 💡 全体枠を他画面と統一して sm:h-[720px] に短縮設定 -->
  <form action="{{ route('login.view') }}" method="GET" class="w-full max-w-[412px] bg-[#FFFBF3] h-screen sm:h-[720px] shadow-2xl relative flex flex-col justify-between overflow-hidden sm:rounded-[36px] p-5 pt-10 pb-5">
    
    <!-- ステータスバー -->
    <div class="flex justify-between items-center absolute top-2.5 left-5 right-5 text-xs font-semibold text-gray-800 z-20">
      <div>9:41</div>
      <div class="flex items-center space-x-1">
        <i class="fa-solid fa-signal text-[10px]"></i>
        <i class="fa-solid fa-water text-[10px]"></i>
        <i class="fa-solid fa-battery-three-quarters"></i>
      </div>
    </div>

    <!-- 💡 ロゴ・タイトル領域（コンパクト化） -->
    <div class="text-center space-y-2 mt-2 flex-shrink-0">
      <div class="w-12 h-12 bg-[#008080] rounded-2xl flex items-center justify-center shadow-md mx-auto">
        <span class="text-white font-bold text-2xl">C</span>
      </div>
      <div class="space-y-0.5">
        <h1 class="text-xl font-bold tracking-tight text-gray-800">
          Welcome to <span class="text-[#008080]">Cebu</span><span class="text-[#FF6347]">Tra</span>
        </h1>
        <p class="text-[10px] text-gray-400 font-semibold uppercase tracking-wider">Cebu Travel Community</p>
      </div>
    </div>

    <!-- 💡 利用規約スクロールエリア（縦幅を最適化） -->
    <div class="flex-1 my-3.5 bg-white rounded-2xl p-4 border border-gray-100 shadow-inner overflow-y-auto space-y-3 text-gray-600 text-xs leading-relaxed no-scrollbar">
      <h2 class="text-xs font-bold text-gray-800 flex items-center gap-1.5 border-b border-gray-100 pb-2">
        <i class="fa-solid fa-circle-exclamation text-[#FF6347]"></i> Important Notice & Disclaimer
      </h2>
      
      <p class="font-medium text-gray-700 text-[11px]">
        Please read and agree to the following conditions before using CebuTra to ensure a safe community experience.
      </p>

      <div class="space-y-1">
        <h3 class="font-bold text-gray-800 flex items-center gap-1 text-[11px]">
          <span class="w-1.5 h-1.5 bg-[#008080] rounded-full"></span> 1. No Travel Agency Affiliation
        </h3>
        <p class="pl-2.5 text-gray-500 text-[11px]">
          CebuTra is a matching platform for students and travelers to find travel companions. We are not a travel agency, do not arrange or operate tours, and do not act as an intermediary for any travel agencies.
        </p>
      </div>

      <div class="space-y-1">
        <h3 class="font-bold text-gray-800 flex items-center gap-1 text-[11px]">
          <span class="w-1.5 h-1.5 bg-[#008080] rounded-full"></span> 2. Personal Responsibility
        </h3>
        <p class="pl-2.5 text-gray-500 text-[11px]">
          Any exchange of contact information, personal social media, or messaging outside of the application is done entirely at your own risk. Please exercise caution when sharing personal details with other users.
        </p>
      </div>

      <div class="space-y-1">
        <h3 class="font-bold text-gray-800 flex items-center gap-1 text-[11px]">
          <span class="w-1.5 h-1.5 bg-[#008080] rounded-full"></span> 3. Liability for Incidents
        </h3>
        <p class="pl-2.5 text-gray-500 text-[11px]">
          CebuTra assumes absolute no responsibility or liability for any issues, accidents, financial losses, injuries, or disputes that may occur during actual trips, gatherings, or individual matchings arranged through this platform.
        </p>
      </div>

      <p class="text-[10px] text-gray-400 font-medium pt-2 border-t border-gray-50">
        By checking the box below and clicking "Accept & Continue", you acknowledge that you have read, understood, and agreed to be bound by these terms.
      </p>
    </div>

    <!-- 💡 同意チェック・ボタン領域（CSS連動） -->
    <div class="space-y-3 flex-shrink-0">
      <label class="flex items-center gap-2.5 px-1 cursor-pointer group select-none">
        <div class="relative flex items-center">
          <input type="checkbox" id="agreeCheckbox" required class="peer appearance-none w-4.5 h-4.5 border border-gray-300 rounded-md bg-white checked:bg-[#008080] checked:border-[#008080] transition-all cursor-pointer">
          <i class="fa-solid fa-check absolute text-white text-[9px] left-1 opacity-0 peer-checked:opacity-100 transition-opacity pointer-events-none"></i>
        </div>
        <span class="text-[11px] font-bold text-gray-700 leading-tight group-hover:text-gray-900 transition-colors">
          I read and accept the terms and disclaimers above.
        </span>
      </label>

      <!-- 💡 未チェック時はグレーアウト、チェックでオレンジ色の送信ボタンへ切り替わる処理 -->
      <button type="submit" class="w-full bg-[#FF6347] text-white font-bold py-3.5 px-4 rounded-xl text-xs transition-all shadow-md active:scale-[0.99] cursor-pointer disabled:bg-gray-300 disabled:text-gray-500 disabled:cursor-not-allowed">
        Accept & Continue
      </button>
    </div>

  </form>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CebuTra - Help & Contact</title>
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <!-- Google Fonts & FontAwesome -->
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

      <!-- タイトルと戻るボタン -->
      <div class="flex justify-between items-center mt-2">
        <a href="settings-all.html" class="text-gray-500 hover:text-gray-800 transition-all text-sm font-bold flex items-center gap-1">
          <i class="fa-solid fa-chevron-left text-xs"></i> Settings
        </a>
        <h1 class="text-base font-bold text-gray-800">Help Center</h1>
        <div class="w-12"></div> <!-- バランス用 -->
      </div>
    </div>

    <!-- 2. メイン領域 -->
    <div class="flex-1 overflow-y-auto no-scrollbar p-5 space-y-6 pb-28">
      
      <!-- カスタマーサポートへの導線（最上部または最下部が一般的ですが、親切さを出すため上に配置） -->
      <div class="bg-white rounded-2xl p-4 shadow-sm border border-gray-100/50 text-center space-y-3">
        <div class="w-10 h-10 bg-teal-50 text-[#008080] rounded-xl flex items-center justify-center text-base mx-auto">
          <i class="fa-regular fa-envelope"></i>
        </div>
        <div class="space-y-1">
          <h3 class="text-xs font-bold text-slate-800">Still need help?</h3>
          <p class="text-[10px] text-gray-400 font-medium">If you can't find the answer below, please contact us.</p>
        </div>
        <!-- mailtoリンクでスマホのメールアプリを起動（またはGoogleフォーム等のURLでも可） -->
        <a href="mailto:support@cebutra.com?subject=CebuTra%20Inquiry" class="block w-full bg-[#008080] hover:bg-[#0D7880] text-white text-xs font-bold py-2.5 px-4 rounded-xl transition-all shadow-sm">
          Contact Support
        </a>
      </div>

      <!-- FAQ（よくある質問）セクション -->
      <div class="space-y-2.5">
        <h3 class="text-[11px] font-bold text-slate-400 tracking-wider uppercase px-1">Frequently Asked Questions</h3>
        
        <!-- FAQ 1 -->
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden transition-all">
          <div onclick="toggleFAQ('faq1')" class="p-4 flex justify-between items-center cursor-pointer hover:bg-gray-50/40 select-none">
            <div class="flex items-center gap-2.5">
              <span class="text-xs font-bold text-[#008080]">Q.</span>
              <h4 class="text-xs font-bold text-gray-700">Is this app free to use?</h4>
            </div>
            <i id="icon-faq1" class="fa-solid fa-chevron-down text-[10px] text-gray-300 transition-transform"></i>
          </div>
          <div id="answer-faq1" class="hidden px-4 pb-4 pt-1 border-t border-gray-50 bg-gray-50/30 text-[11px] text-slate-600 leading-relaxed font-medium pl-8">
            Yes, basic features including creating itineraries and matching with other students/travelers are completely free.<br>
            <span class="text-[10px] text-gray-400">【料金について】基本的な機能（旅程の作成、マッチングなど）はすべて無料でご利用いただけます。</span>
          </div>
        </div>

        <!-- FAQ 2 -->
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden transition-all">
          <div onclick="toggleFAQ('faq2')" class="p-4 flex justify-between items-center cursor-pointer hover:bg-gray-50/40 select-none">
            <div class="flex items-center gap-2.5">
              <span class="text-xs font-bold text-[#008080]">Q.</span>
              <h4 class="text-xs font-bold text-gray-700">How do I split tour costs with others?</h4>
            </div>
            <i id="icon-faq2" class="fa-solid fa-chevron-down text-[10px] text-gray-300 transition-transform"></i>
          </div>
          <div id="answer-faq2" class="hidden px-4 pb-4 pt-1 border-t border-gray-50 bg-gray-50/30 text-[11px] text-slate-600 leading-relaxed font-medium pl-8">
            Cost-sharing rules must be agreed upon via chat before the trip. We highly recommend using cash (PHP) or local banking apps (GCash) on-site.<br>
            <span class="text-[10px] text-gray-400">【割り勘について】ツアー代の精算方法は事前にチャットで合意してください。現地での現金（ペソ）や、現地決済アプリ（GCash）の利用をおすすめします。</span>
          </div>
        </div>

        <!-- FAQ 3 -->
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden transition-all">
          <div onclick="toggleFAQ('faq3')" class="p-4 flex justify-between items-center cursor-pointer hover:bg-gray-50/40 select-none">
            <div class="flex items-center gap-2.5">
              <span class="text-xs font-bold text-[#008080]">Q.</span>
              <h4 class="text-xs font-bold text-gray-700">Can non-students use this application?</h4>
            </div>
            <i id="icon-faq3" class="fa-solid fa-chevron-down text-[10px] text-gray-300 transition-transform"></i>
          </div>
          <div id="answer-faq3" class="hidden px-4 pb-4 pt-1 border-t border-gray-50 bg-gray-50/30 text-[11px] text-slate-600 leading-relaxed font-medium pl-8">
            Absolutely! While many users are language school students, CebuTra is open to all travelers, backpackers, and digital nomads visiting Cebu.<br>
            <span class="text-[10px] text-gray-400">【利用資格】どなたでもご利用いただけます！語学留学生のユーザーが多いですが、一般の旅行者やバックパッカーも大歓迎です。</span>
          </div>
        </div>

        <!-- FAQ 4 -->
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden transition-all">
          <div onclick="toggleFAQ('faq4')" class="p-4 flex justify-between items-center cursor-pointer hover:bg-gray-50/40 select-none">
            <div class="flex items-center gap-2.5">
              <span class="text-xs font-bold text-[#008080]">Q.</span>
              <h4 class="text-xs font-bold text-gray-700">How do I report a malicious user?</h4>
            </div>
            <i id="icon-faq4" class="fa-solid fa-chevron-down text-[10px] text-gray-300 transition-transform"></i>
          </div>
          <div id="answer-faq4" class="hidden px-4 pb-4 pt-1 border-t border-gray-50 bg-gray-50/30 text-[11px] text-slate-600 leading-relaxed font-medium pl-8">
            You can report users by tapping the "Report" button on their profile or chat screen. Our team will review and take action immediately.<br>
            <span class="text-[10px] text-gray-400">【通報について】悪質なユーザーを発見した場合は、相手のプロフィールやチャット画面にある「通報ボタン」から運営に報告してください。</span>
          </div>
        </div>

      </div>

    </div>

    <!-- 3. ボトムナビゲーションバー（下部固定） -->
    <div class="absolute bottom-0 left-0 right-0 bg-white border-t border-gray-100 px-4 py-2 flex justify-between items-center sm:rounded-b-[40px] shadow-[0_-4px_12px_rgba(0,0,0,0.04)] z-30 flex-shrink-0">
      <button class="flex flex-col items-center justify-center w-14 py-1 text-gray-400"><i class="fa-solid fa-house text-lg"></i><span class="text-[10px] font-medium mt-0.5">Home</span></button>
      <button class="flex flex-col items-center justify-center w-14 py-1 text-gray-400"><i class="fa-solid fa-magnifying-glass text-lg"></i><span class="text-[10px] font-medium mt-0.5">Explore</span></button>
      <div class="relative -top-5 flex flex-col items-center">
        <button class="w-14 h-14 bg-[#FF6347] rounded-full flex items-center justify-center text-white border-4 border-white"><i class="fa-solid fa-plus text-xl"></i></button>
        <span class="text-[10px] text-[#FF6347] font-bold mt-1">Recruit</span>
      </div>
      <button class="flex flex-col items-center justify-center w-14 py-1 text-gray-400"><i class="fa-solid fa-map text-lg"></i><span class="text-[10px] font-medium mt-0.5">Itinerary</span></button>
      <button class="flex flex-col items-center justify-center w-14 py-1 text-[#008080]"><i class="fa-solid fa-user text-lg"></i><span class="text-[10px] font-bold mt-0.5">Profile</span></button>
    </div>

  </div>

  <!-- FAQ開閉用簡易スクリプト -->
  <script>
    function toggleFAQ(faqId) {
      const answer = document.getElementById('answer-' + faqId);
      const icon = document.getElementById('icon-' + faqId);
      
      if(answer.classList.contains('hidden')) {
        answer.classList.remove('hidden');
        icon.classList.add('rotate-180');
      } else {
        answer.classList.add('hidden');
        icon.classList.remove('rotate-180');
      }
    }
  </script>
</body>
</html>
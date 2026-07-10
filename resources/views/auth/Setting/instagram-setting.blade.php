<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CebuTra - Instagram Visibility Settings</title>
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
        <h1 class="text-base font-bold text-gray-800">Instagram Settings</h1>
        <button onclick="saveSettings()" class="text-[#008080] hover:text-[#0D7880] transition-all text-sm font-bold cursor-pointer">
          Save
        </button>
      </div>
    </div>

    <!-- 2. メイン領域（スクロールエリア） -->
    <div class="flex-1 overflow-y-auto no-scrollbar p-5 space-y-5 pb-28">
      
      <!-- 💡 安全のためのヒント（ここにサブアカ推奨の案内を集約） -->
      <div class="bg-gradient-to-br from-purple-50 to-pink-50 border border-purple-100/50 rounded-[24px] p-4 space-y-1.5">
        <div class="flex items-center gap-2 text-purple-600">
          <i class="fa-brands fa-instagram text-base"></i>
          <h3 class="text-xs font-bold">Safety Tip</h3>
        </div>
        <p class="text-[10px] text-gray-600 font-medium leading-relaxed">
          プライバシーを守るため、普段お使いのメインアカウントではなく、**「連絡用のサブアカウント」**を作成して登録することを推奨しています。
        </p>
      </div>

      <!-- 項目 1: Instagram ID入力欄 -->
      <div class="space-y-2">
        <h3 class="text-[11px] font-bold text-slate-400 tracking-wider uppercase px-1">Instagram Account</h3>
        <div class="bg-white rounded-[24px] shadow-sm border border-gray-100/50 p-4">
          <label class="text-[10px] font-bold text-slate-600 block mb-1.5">Username</label>
          <div class="relative flex items-center">
            <span class="absolute left-4 text-xs font-bold text-gray-400">@</span>
            <input type="text" placeholder="cebutra_user" class="w-full bg-gray-50 border border-gray-100 rounded-xl py-2.5 pl-8 pr-3 text-xs font-medium focus:outline-none focus:border-[#008080]/50 transition-colors">
          </div>
        </div>
      </div>

      <!-- 項目 2: 公開タイミングの設定 -->
      <div class="space-y-2">
        <h3 class="text-[11px] font-bold text-slate-400 tracking-wider uppercase px-1">Visibility Timing</h3>
        <div class="bg-white rounded-[24px] shadow-sm border border-gray-100/50 p-4 space-y-3">
          
          <label class="flex items-start gap-3 cursor-pointer">
            <input type="radio" name="visibility_timing" value="always" checked class="mt-1 accent-[#008080]">
            <div class="space-y-0.5">
              <span class="text-xs font-bold text-slate-800 block">プロフィール上で常に公開する</span>
              <span class="text-[10px] text-gray-400 font-medium leading-normal">他のユーザーがあなたを検索した際、いつでもプロフィールからInstagramを確認できます。</span>
            </div>
          </label>

          <hr class="border-gray-50 my-1">

          <label class="flex items-start gap-3 cursor-pointer">
            <input type="radio" name="visibility_timing" value="matched" class="mt-1 accent-[#008080]">
            <div class="space-y-0.5">
              <span class="text-xs font-bold text-slate-800 block">旅行メンバー確定時のみ公開する</span>
              <span class="text-[10px] text-gray-400 font-medium leading-normal">募集・検索段階では非公開です。一緒に行くメンバーとしてお互いに確定した相手にのみ自動公開されます。</span>
            </div>
          </label>

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

  <script>
    function saveSettings() {
      alert("Instagram settings saved successfully!");
      window.location.href = "settings-all.html";
    }
  </script>
</body>
</html>
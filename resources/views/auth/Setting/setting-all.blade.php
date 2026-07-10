<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CebuTra - Settings</title>
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
        <a href="profile-main.html" class="text-gray-500 hover:text-gray-800 transition-all text-sm font-bold flex items-center gap-1">
          <i class="fa-solid fa-chevron-left text-xs"></i> Profile
        </a>
        <h1 class="text-base font-bold text-gray-800">Settings</h1>
        <div class="w-12"></div> </div>
    </div>

    <div class="flex-1 overflow-y-auto no-scrollbar p-5 space-y-6 pb-28">
      
      <div class="space-y-2">
        <h3 class="text-[11px] font-bold text-slate-400 tracking-wider uppercase px-1">Account & Security</h3>
        <div class="bg-white rounded-[24px] shadow-sm border border-gray-100/50 overflow-hidden divide-y divide-gray-50">
          
          <a href="linked-sns.html" class="flex justify-between items-center p-4 hover:bg-gray-50/50 transition-colors">
            <div class="flex items-center gap-3">
              <div class="w-8 h-8 rounded-xl bg-indigo-50 text-indigo-500 flex items-center justify-center text-sm"><i class="fa-solid fa-share-nodes"></i></div>
              <span class="text-xs font-bold text-slate-800">Linked SNS Accounts</span>
            </div>
            <div class="flex items-center gap-1.5 text-gray-300">
              <span class="text-[9px] font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded">Connected</span>
              <i class="fa-solid fa-chevron-right text-[10px]"></i>
            </div>
          </a>

          <a href="language-settings.html" class="flex justify-between items-center p-4 hover:bg-gray-50/50 transition-colors">
            <div class="flex items-center gap-3">
              <div class="w-8 h-8 rounded-xl bg-teal-50 text-[#008080] flex items-center justify-center text-sm"><i class="fa-solid fa-language"></i></div>
              <span class="text-xs font-bold text-slate-800">Language</span>
            </div>
            <div class="flex items-center gap-1.5 text-gray-300">
              <span class="text-[10px] text-gray-400 font-medium">English</span>
              <i class="fa-solid fa-chevron-right text-[10px]"></i>
            </div>
          </a>

        </div>
      </div>

      <div class="space-y-2">
        <h3 class="text-[11px] font-bold text-slate-400 tracking-wider uppercase px-1">Support & Legal</h3>
        <div class="bg-white rounded-[24px] shadow-sm border border-gray-100/50 overflow-hidden divide-y divide-gray-50">
          
          <a href="emergency-contacts.html" class="flex justify-between items-center p-4 hover:bg-gray-50/50 transition-colors">
            <div class="flex items-center gap-3">
              <div class="w-8 h-8 rounded-xl bg-red-50 text-red-500 flex items-center justify-center text-sm"><i class="fa-solid fa-phone-flip"></i></div>
              <span class="text-xs font-bold text-slate-800">Emergency Contacts</span>
            </div>
            <i class="fa-solid fa-chevron-right text-[10px] text-gray-300"></i>
          </a>

          <a href="help-contact.html" class="flex justify-between items-center p-4 hover:bg-gray-50/50 transition-colors">
            <div class="flex items-center gap-3">
              <div class="w-8 h-8 rounded-xl bg-purple-50 text-purple-500 flex items-center justify-center text-sm"><i class="fa-regular fa-circle-question"></i></div>
              <span class="text-xs font-bold text-slate-800">Help Center & Contact</span>
            </div>
            <i class="fa-solid fa-chevron-right text-[10px] text-gray-300"></i>
          </a>

          <a href="terms-disclaimers.html" class="flex justify-between items-center p-4 hover:bg-gray-50/50 transition-colors">
            <div class="flex items-center gap-3">
              <div class="w-8 h-8 rounded-xl bg-gray-50 text-gray-500 flex items-center justify-center text-sm"><i class="fa-regular fa-file-lines"></i></div>
              <span class="text-xs font-bold text-slate-800">Terms & Disclaimers</span>
            </div>
            <i class="fa-solid fa-chevron-right text-[10px] text-gray-300"></i>
          </a>

        </div>
      </div>

      <div class="space-y-4 pt-2">
        <button onclick="logout()" class="w-full bg-white border border-gray-100 text-red-500 text-xs font-bold py-3.5 px-4 rounded-[20px] shadow-sm hover:bg-red-50/30 active:scale-[0.99] transition-all cursor-pointer">
          Log Out
        </button>

        <div class="text-center">
          <button onclick="deleteAccount()" class="text-[11px] font-semibold text-gray-400 hover:text-red-500 underline transition-colors cursor-pointer">
            Delete Account (Unregister)
          </button>
        </div>
      </div>

    </div>

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
    // ログアウト処理
    function logout() {
      if(confirm("Are you sure you want to log out?")) {
        alert("Logged out successfully.");
        window.location.href = "welcome.html"; 
      }
    }

    // アカウント削除（退会）処理：2段階の警告ダイアログ
    function deleteAccount() {
      const confirm1 = confirm("Are you sure you want to delete your account?\nThis action will hide your profile and itineraries immediately.");
      if (confirm1) {
        const confirm2 = confirm("FINAL WARNING:\nAll your personal data will be deactivated. This cannot be undone. Proceed with deletion?");
        if (confirm2) {
          alert("Your account has been successfully deleted. Thank you for using CebuTra.");
          window.location.href = "welcome.html"; 
        }
      }
    }
  </script>
</body>
</html>
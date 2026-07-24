<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CebuTra - Profile</title>
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
    
    /* detailsタグの矢印（デフォルトのマーカー）を消すスタイル */
    details summary::-webkit-details-marker { display: none; }
    details summary { list-style: none; }
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
      <div class="text-center mt-2">
        <h1 class="text-base font-bold text-gray-800">{{ __('messages.profile.title') }}</h1>
      </div>
    </div>

    <!-- メイン領域 -->
    <div class="flex-1 overflow-y-auto no-scrollbar p-5 space-y-6 pb-28">
      
      <!-- プロフィール基本情報 ＆ 編集ボタン -->
      <div class="bg-white rounded-3xl p-5 shadow-sm border border-gray-100/50 flex flex-col items-center text-center space-y-4">
        <div class="relative">
          <div class="w-20 h-20 bg-[#2E9AA4] rounded-3xl flex items-center justify-center border-4 border-[#FFFBF3] shadow-md text-4xl">🌺</div>
          <div class="absolute -bottom-1 -right-1 bg-amber-500 text-white w-5 h-5 rounded-lg flex items-center justify-center border border-white text-[9px]"><i class="fa-solid fa-clock"></i></div>
        </div>
        <div class="space-y-1">
          <h2 class="text-lg font-bold text-gray-800">{{ $user->name ?? 'Guest' }}</h2>
          <p class="text-xs text-gray-400 font-bold tracking-wide uppercase">22, Female • Japan</p>
        </div>
        <!-- 💡 aタグの遷移先をLaravelルートに変更 -->
        <a href="{{ route('profile.edit') }}" class="w-full bg-[#008080]/5 hover:bg-[#008080]/10 text-[#008080] font-bold py-2.5 px-4 rounded-xl text-xs transition-all flex items-center justify-center gap-1.5 border border-[#008080]/10">
          <i class="fa-regular fa-pen-to-square"></i>{{ __('messages.profile.edit_profile') }}
        </a>
        <p class="text-xs text-gray-600 leading-relaxed pt-2 border-t border-gray-50 w-full text-left font-medium">
            {{ $user->bio ?? 'NO bio yet.' }}
          {{-- Studying English in Cebu! Enjoying island trips on weekends 🌴 Looking for friendly companions to go to Oslob and Moalboal! --}}
        </p>
      </div>

      <!-- STUDY & STAY INFO セクション -->
      <div class="space-y-2">
        <h3 class="text-[11px] font-bold text-slate-400 tracking-wider uppercase px-1">{{ __('messages.profile.study_info') }}</h3>
        <div class="bg-white rounded-[24px] p-5 shadow-sm border border-gray-100/50 space-y-4 text-xs">
          <div class="flex justify-between items-center">
            <span class="text-slate-400 font-semibold">{{__('messages.edit_profile.school')}}</span>
            <span class="text-slate-800 font-bold">EV Academy</span>
          </div>
          <div class="flex justify-between items-center">
            <span class="text-slate-400 font-semibold">{{__('messages.edit_profile.english_level')}}</span>
            <span class="text-[#008080] bg-teal-50/60 px-2.5 py-1 rounded-lg font-bold text-[11px]">Intermediate (B1)</span>
          </div>
          <div class="flex justify-between items-center">
            <span class="text-slate-400 font-semibold">{{__('messages.edit_profile.current_area')}}</span>
            <span class="text-slate-800 font-bold">Around IT Park</span>
          </div>
        </div>
      </div>

      <!-- Connected Links -->
      <div class="space-y-2">
        <h3 class="text-[11px] font-bold text-slate-400 tracking-wider uppercase px-1">{{ __('messages.profile.con_link') }}</h3>
        <a href="https://instagram.com" target="_blank" class="bg-white hover:bg-gray-50/50 border border-gray-100/50 rounded-2xl p-4 flex items-center justify-between shadow-sm transition-all">
          <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-xl bg-gradient-to-tr from-yellow-500 via-pink-500 to-purple-600 text-white flex items-center justify-center text-sm flex-shrink-0">
              <i class="fa-brands fa-instagram"></i>
            </div>
            <div class="flex flex-col">
              <span class="text-[9px] text-gray-400 font-bold uppercase tracking-wider">Instagram</span>
              <span class="text-xs font-bold text-gray-700">@sakura_cebu</span>
            </div>
          </div>
          <i class="fa-solid fa-arrow-up-right-from-square text-[10px] text-gray-300"></i>
        </a>
      </div>

      <!-- Trip History セクション -->
      <div class="space-y-2">
        <h3 class="text-[11px] font-bold text-slate-400 tracking-wider uppercase px-1">{{ __('messages.profile.trip_history') }}</h3>
        <div class="space-y-2.5">
          
          <!-- 💡 JS不要：HTML標準のdetailsタグを使用したアコーディオン 1 -->
          <details class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden transition-all group">
            <summary class="p-4 flex justify-between items-center cursor-pointer hover:bg-gray-50/40 select-none">
              <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl bg-orange-50 text-[#FF6347] flex items-center justify-center text-sm"><i class="fa-solid fa-umbrella-beach"></i></div>
                <div>
                  <h4 class="text-xs font-bold text-gray-800">Oslob Whale Shark Tour</h4>
                  <p class="text-[10px] text-gray-400 font-bold mt-0.5">June 15, 2026</p>
                </div>
              </div>
              <!-- 開閉で自動回転する矢印アイコン -->
              <i class="fa-solid fa-chevron-down text-xs text-gray-300 transition-transform group-open:rotate-180"></i>
            </summary>
            <div class="px-4 pb-4 pt-1 border-t border-gray-50 bg-gray-50/30 space-y-2.5 text-[11px]">
              <div class="grid grid-cols-2 gap-2 text-gray-600 pt-2">
                <div><span class="font-bold text-gray-400 block mb-0.5">Itinerary</span>Early morning departure, Whale Shark watching & Tumalog Falls.</div>
                <div><span class="font-bold text-gray-400 block mb-0.5">Companions</span>4 Members (EV & CIA students)</div>
              </div>
              <div class="flex justify-between items-center text-gray-500 pt-1">
                <span>Total Cost: <strong class="text-gray-700">~2,500 PHP</strong></span>
                <span class="text-emerald-600 font-bold bg-emerald-50 px-2 py-0.5 rounded-md text-[9px]"><i class="fa-solid fa-circle-check mr-0.5"></i> Completed</span>
              </div>
            </div>
          </details>

          <!-- 💡 JS不要：HTML標準のdetailsタグを使用したアコーディオン 2 -->
          <details class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden transition-all group">
            <summary class="p-4 flex justify-between items-center cursor-pointer hover:bg-gray-50/40 select-none">
              <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl bg-teal-50 text-[#008080] flex items-center justify-center text-sm"><i class="fa-solid fa-shuttle-space"></i></div>
                <div>
                  <h4 class="text-xs font-bold text-gray-800">Mactan Island Island Hopping</h4>
                  <p class="text-[10px] text-gray-400 font-bold mt-0.5">May 24, 2026</p>
                </div>
              </div>
              <i class="fa-solid fa-chevron-down text-xs text-gray-300 transition-transform group-open:rotate-180"></i>
            </summary>
            <div class="px-4 pb-4 pt-1 border-t border-gray-50 bg-gray-50/30 space-y-2.5 text-[11px]">
              <div class="grid grid-cols-2 gap-2 text-gray-600 pt-2">
                <div><span class="font-bold text-gray-400 block mb-0.5">Itinerary</span>Nalusuan & Pandanon island hopping, BBQ lunch on boat.</div>
                <div><span class="font-bold text-gray-400 block mb-0.5">Companions</span>6 Members</div>
              </div>
              <div class="flex justify-between items-center text-gray-500 pt-1">
                <span>Total Cost: <strong class="text-gray-700">~1,800 PHP</strong></span>
                <span class="text-emerald-600 font-bold bg-emerald-50 px-2 py-0.5 rounded-md text-[9px]"><i class="fa-solid fa-circle-check mr-0.5"></i> Completed</span>
              </div>
            </div>
          </details>

        </div>
      </div>

      <!-- 設定メニューへの導線 -->
      <div class="space-y-2">
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100/50 overflow-hidden">
          <a href="{{ route('all-settings') }}" class="flex justify-between items-center p-4 hover:bg-gray-50/50 transition-colors">
            <div class="flex items-center gap-3 text-gray-700">
              <div class="w-8 h-8 rounded-xl bg-gray-50 text-gray-500 flex items-center justify-center text-sm"><i class="fa-solid fa-gear"></i></div>
              <span class="text-sm font-bold">{{ __('messages.profile.setting_privacy') }}</span>
            </div>
            <i class="fa-solid fa-chevron-right text-xs text-gray-300"></i>
          </a>
        </div>
      </div>

    </div>

    <!-- ボトムナビ -->
    @include('components.bottom-nav')
    {{-- <div class="absolute bottom-0 left-0 right-0 bg-white border-t border-gray-100 px-4 py-2 flex justify-between items-center sm:rounded-b-[40px] shadow-[0_-4px_12px_rgba(0,0,0,0.04)] z-30">
      <a href="{{ route('home') }}" class="flex flex-col items-center justify-center w-14 py-1 text-gray-400 hover:text-gray-600"><i class="fa-solid fa-house text-lg"></i><span class="text-[10px] font-medium mt-0.5">Home</span></a>
      <a href="#" class="flex flex-col items-center justify-center w-14 py-1 text-gray-400 hover:text-gray-600"><i class="fa-solid fa-magnifying-glass text-lg"></i><span class="text-[10px] font-medium mt-0.5">Explore</span></a>
      <div class="relative -top-5 flex flex-col items-center">
        <a href="#" class="w-14 h-14 bg-[#FF6347] rounded-full flex items-center justify-center text-white border-4 border-white shadow-lg shadow-orange-500/30 transition-transform active:scale-95"><i class="fa-solid fa-plus text-xl"></i></a>
        <span class="text-[10px] text-[#FF6347] font-bold mt-1">Recruit</span>
      </div>
      <a href="#" class="flex flex-col items-center justify-center w-14 py-1 text-gray-400 hover:text-gray-600"><i class="fa-solid fa-map text-lg"></i><span class="text-[10px] font-medium mt-0.5">Itinerary</span></a>
      <a href="{{ route('profile') }}" class="flex flex-col items-center justify-center w-14 py-1 text-[#008080]"><i class="fa-solid fa-user text-lg"></i><span class="text-[10px] font-bold mt-0.5">Profile</span></a>
    </div> --}}
  </div>

</body>
</html>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CebuTra - Profile</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght=400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      font-family: 'Plus Jakarta Sans', 'Helvetica Neue', Arial, sans-serif;
      background-color: #f3f4f6;
    }
    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    
    details summary::-webkit-details-marker { display: none; }
    details summary { list-style: none; }
  </style>
</head>
<body class="flex justify-center items-center min-h-screen bg-gray-100 p-0 sm:p-4">

  <!-- 外枠コンテナ（ sm:h-[720px] 内でスクロール処理 ） -->
  <div class="w-full max-w-[412px] bg-[#FFFBF3] h-screen sm:h-[720px] shadow-2xl relative flex flex-col justify-between overflow-hidden sm:rounded-[36px]">
    
    <!-- ヘッダー -->
    <div class="bg-white pt-9 pb-3.5 px-4 border-b border-gray-100 z-20 flex-shrink-0 relative">
      <div class="flex justify-between items-center absolute top-2.5 left-5 right-5 text-xs font-semibold text-gray-800">
        <div>9:41</div>
        <div class="flex items-center space-x-1">
          <i class="fa-solid fa-signal text-[10px]"></i>
          <i class="fa-solid fa-water text-[10px]"></i>
          <i class="fa-solid fa-battery-three-quarters"></i>
        </div>
      </div>
      <div class="text-center mt-2">
        <h1 class="text-lg font-bold text-gray-800">{{ __('messages.profile.title') }}</h1>
      </div>
    </div>

    <!-- メイン領域（文字サイズ・余白・アイコンサイズをひと回り大きく拡大） -->
    <div class="flex-1 overflow-y-auto no-scrollbar p-5 space-y-6 pb-28">
      
      <!-- プロフィール基本情報 ＆ 編集ボタン -->
      <div class="bg-white rounded-3xl p-5 shadow-sm border border-gray-100/50 flex flex-col items-center text-center space-y-4">
        <div class="relative">
          <div class="w-22 h-22 bg-[#2E9AA4] rounded-3xl flex items-center justify-center border-4 border-[#FFFBF3] shadow-md text-4xl overflow-hidden">
            @if(isset($user->avatar_url) && $user->avatar_url)
            <img src="{{ asset('storage/' . $user->avatar_url) }}" alt="{{ $user->name }}" class="w-full h-full object-cover">
            @else
            🌺
            @endif
          </div>
          <div class="absolute -bottom-1 -right-1 bg-amber-500 text-white w-6 h-6 rounded-lg flex items-center justify-center border border-white text-xs">
            <i class="fa-solid fa-clock"></i>
          </div>
        </div>

        <div class="space-y-1">
          <h2 class="text-xl font-bold text-gray-800">{{ $user->name ?? 'Guest' }}</h2>
    
          <p class="text-sm text-gray-400 font-bold tracking-wide uppercase">
           @php
           $details = array_filter([
              $user->age ? $user->age : null,
              $user->gender,
              $user->nationality,
           ]);
           @endphp

          @if(!empty($details))
            {{ implode(' • ', $details) }}
          @else
           No profile info
          @endif
         </p>
       </div>

        <!-- 編集ボタン -->
        <a href="{{ route('profile.edit') }}" class="w-full bg-[#008080]/5 hover:bg-[#008080]/10 text-[#008080] font-bold py-3 px-4 rounded-xl text-sm transition-all flex items-center justify-center gap-2 border border-[#008080]/10">
          <i class="fa-regular fa-pen-to-square"></i>{{ __('messages.profile.edit_profile') }}
        </a>
        <p class="text-sm text-gray-600 leading-relaxed pt-3 border-t border-gray-50 w-full text-left font-medium">
            {{ $user->bio ?? 'No bio yet.' }}
        </p>
      </div>

      <!-- STUDY & STAY INFO セクション -->
      <div class="space-y-2.5">
        <h3 class="text-xs font-bold text-slate-400 tracking-wider uppercase px-1">{{ __('messages.profile.study_info') }}</h3>
        <div class="bg-white rounded-3xl p-5 shadow-sm border border-gray-100/50 space-y-4 text-sm">
    
          <!-- 学校名 -->
          <div class="flex justify-between items-center">
           <span class="text-slate-400 font-semibold">{{ __('messages.edit_profile.school') }}</span>
           <span class="text-slate-800 font-bold">{{ $user->school ?? '-' }}</span>
          </div>

          <!-- 英語レベル -->
          <div class="flex justify-between items-center">
           <span class="text-slate-400 font-semibold">{{ __('messages.edit_profile.english_level') }}</span>
            <span class="text-slate-800 font-bold">
             @if($user->english_level)
               @switch($user->english_level)
               @case('Beginner')
                 Beginner (A1-A2)
                @break
               @case('Intermediate')
                 Intermediate (B1)
                @break
               @case('Upper-Intermediate')
                 Upper-Intermediate (B2)
                @break
               @case('Advanced')
                 Advanced (C1-C2)
                @break
               @default
                 {{ $user->english_level }}
               @endswitch
             @else
               -
             @endif
          </span>
        </div>

        <!-- 現在の滞在エリア -->
          <div class="flex justify-between items-center">
            <span class="text-slate-400 font-semibold">{{ __('messages.edit_profile.current_area') }}</span>
            <span class="text-slate-800 font-bold">
          @if($user->current_area)
            @switch($user->current_area)
              @case('IT Park')
                Around IT Park
                @break
              @case('Cebu City Center')
                Cebu City Center
                @break
              @case('Mactan')
                Mactan Island
                @break
              @case('Mandaue')
                Mandaue City
                @break
              @default
                {{ $user->current_area }}
            @endswitch
          @else
            -
          @endif
          </span>
        </div>

        </div>
      </div>

      <!-- Connected Links セクション -->
      <div class="space-y-2.5">
        <h4 class="text-xs font-bold text-slate-400 tracking-wider uppercase px-1">
          {{ __('messages.instagram.public_accounts') ?? '公開するアカウント' }}
        </h4>

        @if(!empty(auth()->user()->instagram_username))
          <a 
            href="https://www.instagram.com/{{ auth()->user()->instagram_username }}/" 
            target="_blank" 
            rel="noopener noreferrer" 
            class="flex items-center justify-between p-4.5 bg-white rounded-2xl shadow-sm border border-gray-100/80 hover:shadow-md transition-all active:scale-[0.99] group"
          >
            <div class="flex items-center space-x-4">
              <div class="w-11 h-11 rounded-2xl bg-gradient-to-tr from-[#f09433] via-[#dc2743] to-[#bc1888] flex items-center justify-center text-white text-2xl shadow-sm group-hover:scale-105 transition-transform">
                <i class="fa-brands fa-instagram"></i>
              </div>
              
              <div class="flex flex-col">
                <span class="text-xs font-extrabold tracking-wider text-gray-400 uppercase">
                  INSTAGRAM
                </span>
                <span class="text-base font-bold text-slate-800 group-hover:text-pink-600 transition-colors">
                  {{ '@' . auth()->user()->instagram_username }}
                </span>
              </div>
            </div>

            <div class="text-gray-300 group-hover:text-gray-500 transition-colors">
              <i class="fa-solid fa-arrow-up-right-from-square text-base"></i>
            </div>
          </a>
        @else
          <div class="p-4.5 bg-gray-50/50 rounded-2xl border border-dashed border-gray-200 text-center">
            <p class="text-sm text-gray-400 font-medium">
              {{ __('messages.instagram.no_instagram') ?? 'Instagramアカウントは未連携です' }}
            </p>
          </div>
        @endif
      </div>

      <!-- Trip History セクション -->
      <div class="space-y-2.5">
        <h3 class="text-xs font-bold text-slate-400 tracking-wider uppercase px-1">{{ __('messages.profile.trip_history') }}</h3>
        <div class="space-y-3">
          
          <details class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden transition-all group">
            <summary class="p-4.5 flex justify-between items-center cursor-pointer hover:bg-gray-50/40 select-none">
              <div class="flex items-center gap-3.5">
                <div class="w-10 h-10 rounded-xl bg-orange-50 text-[#FF6347] flex items-center justify-center text-base"><i class="fa-solid fa-umbrella-beach"></i></div>
                <div>
                  <h4 class="text-sm font-bold text-gray-800">Oslob Whale Shark Tour</h4>
                  <p class="text-xs text-gray-400 font-bold mt-0.5">June 15, 2026</p>
                </div>
              </div>
              <i class="fa-solid fa-chevron-down text-xs text-gray-300 transition-transform group-open:rotate-180"></i>
            </summary>
            <div class="px-4.5 pb-4.5 pt-1 border-t border-gray-50 bg-gray-50/30 space-y-3 text-xs">
              <div class="grid grid-cols-2 gap-2 text-gray-600 pt-2">
                <div><span class="font-bold text-gray-400 block mb-0.5">Itinerary</span>Early morning departure, Whale Shark watching & Tumalog Falls.</div>
                <div><span class="font-bold text-gray-400 block mb-0.5">Companions</span>4 Members (EV & CIA students)</div>
              </div>
              <div class="flex justify-between items-center text-gray-500 pt-1">
                <span>Total Cost: <strong class="text-gray-700">~2,500 PHP</strong></span>
                <span class="text-emerald-600 font-bold bg-emerald-50 px-2 py-0.5 rounded-md text-xs"><i class="fa-solid fa-circle-check mr-0.5"></i> Completed</span>
              </div>
            </div>
          </details>

          <details class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden transition-all group">
            <summary class="p-4.5 flex justify-between items-center cursor-pointer hover:bg-gray-50/40 select-none">
              <div class="flex items-center gap-3.5">
                <div class="w-10 h-10 rounded-xl bg-teal-50 text-[#008080] flex items-center justify-center text-base"><i class="fa-solid fa-shuttle-space"></i></div>
                <div>
                  <h4 class="text-sm font-bold text-gray-800">Mactan Island Island Hopping</h4>
                  <p class="text-xs text-gray-400 font-bold mt-0.5">May 24, 2026</p>
                </div>
              </div>
              <i class="fa-solid fa-chevron-down text-xs text-gray-300 transition-transform group-open:rotate-180"></i>
            </summary>
            <div class="px-4.5 pb-4.5 pt-1 border-t border-gray-50 bg-gray-50/30 space-y-3 text-xs">
              <div class="grid grid-cols-2 gap-2 text-gray-600 pt-2">
                <div><span class="font-bold text-gray-400 block mb-0.5">Itinerary</span>Nalusuan & Pandanon island hopping, BBQ lunch on boat.</div>
                <div><span class="font-bold text-gray-400 block mb-0.5">Companions</span>6 Members</div>
              </div>
              <div class="flex justify-between items-center text-gray-500 pt-1">
                <span>Total Cost: <strong class="text-gray-700">~1,800 PHP</strong></span>
                <span class="text-emerald-600 font-bold bg-emerald-50 px-2 py-0.5 rounded-md text-xs"><i class="fa-solid fa-circle-check mr-0.5"></i> Completed</span>
              </div>
            </div>
          </details>

        </div>
      </div>

      <!-- 設定メニューへの導線 -->
      <div class="space-y-2.5">
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100/50 overflow-hidden">
          <a href="{{ route('all-settings') }}" class="flex justify-between items-center p-4.5 hover:bg-gray-50/50 transition-colors">
            <div class="flex items-center gap-3.5 text-gray-700">
              <div class="w-9 h-9 rounded-xl bg-gray-50 text-gray-500 flex items-center justify-center text-base"><i class="fa-solid fa-gear"></i></div>
              <span class="text-base font-bold">{{ __('messages.profile.setting_privacy') }}</span>
            </div>
            <i class="fa-solid fa-chevron-right text-xs text-gray-300"></i>
          </a>
        </div>
      </div>

    </div>

    <!-- ボトムナビ -->
    @include('components.bottom-nav')
  </div>

</body>
</html>
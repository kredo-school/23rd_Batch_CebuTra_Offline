<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CebuTra - {{ __('messages.emergency.title') }}</title>
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
        <h1 class="text-base font-bold text-gray-800">{{ __('messages.emergency.title') }}</h1>
        <div class="w-10"></div> <!-- レイアウト調整用 -->
      </div>
    </div>

    <!-- メインコンテンツ領域 -->
    <div class="flex-1 overflow-y-auto no-scrollbar p-5 space-y-5 pb-28">

      <!-- サブタイトル説明カード -->
      <div class="bg-red-500 text-white rounded-[24px] p-5 shadow-lg shadow-red-500/20 space-y-2">
        <div class="flex items-center gap-2">
          <i class="fa-solid fa-kit-medical text-xl"></i>
          <h2 class="text-sm font-bold">{{ __('messages.emergency.title') }}</h2>
        </div>
        <p class="text-xs text-red-100 leading-relaxed">
          {{ __('messages.emergency.subtitle') }}
        </p>
      </div>

      <!-- 1. 総合緊急ダイヤル -->
      <div class="space-y-3">
        <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider px-1">
          {{ __('messages.emergency.cat_general') }}
        </h3>

        <!-- 911 -->
        <div class="bg-white rounded-[24px] p-4 shadow-sm border border-gray-100/50 flex justify-between items-center">
          <div class="space-y-1">
            <h4 class="text-xs font-bold text-slate-800">{{ __('messages.emergency.police_fire') }}</h4>
            <p class="text-[10px] text-gray-400">{{ __('messages.emergency.police_fire_desc') }}</p>
            <span class="inline-block text-sm font-extrabold text-[#FF6347]">911</span>
          </div>
          <a href="tel:911" class="flex items-center gap-1.5 bg-[#FF6347] text-white px-3.5 py-2 rounded-xl text-xs font-bold shadow-sm active:scale-95 transition-transform">
            <i class="fa-solid fa-phone text-xs"></i>
            {{ __('messages.emergency.call') }}
          </a>
        </div>

        <!-- 観光警察 -->
        <div class="bg-white rounded-[24px] p-4 shadow-sm border border-gray-100/50 flex justify-between items-center">
          <div class="space-y-1">
            <h4 class="text-xs font-bold text-slate-800">{{ __('messages.emergency.tourist_police') }}</h4>
            <p class="text-[10px] text-gray-400">{{ __('messages.emergency.tourist_police_desc') }}</p>
            <span class="inline-block text-xs font-bold text-slate-700">+63 (32) 233-2178</span>
          </div>
          <a href="tel:+63322332178" class="flex items-center gap-1.5 bg-[#008080] text-white px-3.5 py-2 rounded-xl text-xs font-bold shadow-sm active:scale-95 transition-transform">
            <i class="fa-solid fa-phone text-xs"></i>
            {{ __('messages.emergency.call') }}
          </a>
        </div>
      </div>

      <!-- 2. 大使館・領事館 -->
      <div class="space-y-3">
        <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider px-1">
          {{ __('messages.emergency.cat_embassy') }}
        </h3>

        <div class="bg-white rounded-[24px] p-4 shadow-sm border border-gray-100/50 flex justify-between items-center">
          <div class="space-y-1">
            <h4 class="text-xs font-bold text-slate-800">{{ __('messages.emergency.japan_consulate') }}</h4>
            <p class="text-[10px] text-gray-400">{{ __('messages.emergency.japan_consulate_desc') }}</p>
            <span class="inline-block text-xs font-bold text-slate-700">+63 (32) 231-7321</span>
          </div>
          <a href="tel:+63322317321" class="flex items-center gap-1.5 bg-[#008080] text-white px-3.5 py-2 rounded-xl text-xs font-bold shadow-sm active:scale-95 transition-transform">
            <i class="fa-solid fa-phone text-xs"></i>
            {{ __('messages.emergency.call') }}
          </a>
        </div>
      </div>

      <!-- 3. 主要病院 -->
      <div class="space-y-3">
        <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider px-1">
          {{ __('messages.emergency.cat_hospital') }}
        </h3>

        <div class="bg-white rounded-[24px] p-4 shadow-sm border border-gray-100/50 flex justify-between items-center">
          <div class="space-y-1">
            <h4 class="text-xs font-bold text-slate-800">{{ __('messages.emergency.chung_hua') }}</h4>
            <p class="text-[10px] text-gray-400">{{ __('messages.emergency.chung_hua_desc') }}</p>
            <span class="inline-block text-xs font-bold text-slate-700">+63 (32) 255-8000</span>
          </div>
          <a href="tel:+63322558000" class="flex items-center gap-1.5 bg-[#008080] text-white px-3.5 py-2 rounded-xl text-xs font-bold shadow-sm active:scale-95 transition-transform">
            <i class="fa-solid fa-phone text-xs"></i>
            {{ __('messages.emergency.call') }}
          </a>
        </div>
      </div>

      <!-- 注記 -->
      <p class="text-[10px] text-gray-400 leading-relaxed px-2">
        {{ __('messages.emergency.notice') }}
      </p>

    </div>

    <!-- ボトムナビゲーション共通コンポーネント -->
    @include('components.bottom-nav')

  </div>

</body>
</html>


{{-- 
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CebuTra - Emergency Contacts</title>
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
    <div class="bg-white pt-10 pb-4 px-4 border-b border-red-100 z-20 flex-shrink-0 relative">
      <div class="flex justify-between items-center absolute top-3 left-6 right-6 text-xs font-semibold text-gray-800">
        <div>9:41</div>
        <div class="flex items-center space-x-1">
          <i class="fa-solid fa-signal text-[10px]"></i>
          <i class="fa-solid fa-water text-[10px]"></i>
          <i class="fa-solid fa-battery-three-quarters"></i>
        </div>
      </div>

      <div class="flex justify-between items-center mt-2">
        <!-- 💡 戻るリンクをLaravelの設定画面ルートへ紐付け -->
        <a href="{{ route('all-settings') }}" class="text-gray-500 hover:text-gray-800 transition-all text-sm font-bold flex items-center gap-1">
          <i class="fa-solid fa-chevron-left text-xs"></i> Settings
        </a>
        <h1 class="text-base font-bold text-red-600 flex items-center gap-1.5">
          <i class="fa-solid fa-triangle-exclamation text-sm"></i> Emergency Info
        </h1>
        <div class="w-12"></div> 
      </div>
    </div>

    <!-- メイン領域 -->
    <div class="flex-1 overflow-y-auto no-scrollbar p-5 space-y-5 pb-28">
      
      <div class="bg-red-50 border border-red-100 rounded-2xl p-3.5 flex gap-3 items-start">
        <i class="fa-solid fa-circle-info text-red-500 text-sm mt-0.5"></i>
        <div class="text-[11px] text-red-700 leading-relaxed font-medium">
          Tap any card below to make an immediate call. For medical assistance, please check your travel insurance details beforehand.
        </div>
      </div>

      <!-- Local Hotline (Cebu) -->
      <div class="space-y-2">
        <h3 class="text-[11px] font-bold text-slate-400 tracking-wider uppercase px-1">Local Hotline (Cebu)</h3>
        <div class="space-y-2.5">
          
          <a href="tel:911" class="block bg-white rounded-2xl p-4 shadow-sm border border-gray-100/50 hover:bg-red-50/20 active:scale-[0.99] transition-all">
            <div class="flex justify-between items-center">
              <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-red-50 text-red-600 flex items-center justify-center text-base"><i class="fa-solid fa-phone-volume"></i></div>
                <div>
                  <h4 class="text-xs font-bold text-slate-800">National Emergency Hotline</h4>
                  <p class="text-[10px] text-gray-400 font-medium mt-0.5">Police, Fire, Ambulance (All Regions)</p>
                </div>
              </div>
              <span class="text-base font-extrabold text-red-600 pr-1">911</span>
            </div>
          </a>

          <a href="tel:0322332178" class="block bg-white rounded-2xl p-4 shadow-sm border border-gray-100/50 hover:bg-gray-50/50 active:scale-[0.99] transition-all">
            <div class="flex justify-between items-center">
              <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-base"><i class="fa-solid fa-shield-halved"></i></div>
                <div>
                  <h4 class="text-xs font-bold text-slate-800">Cebu City Police Office</h4>
                  <p class="text-[10px] text-gray-400 font-medium mt-0.5">Direct line for crime or accidents in Cebu City</p>
                </div>
              </div>
              <span class="text-xs font-bold text-slate-600 pr-1">(032) 233-2178</span>
            </div>
          </a>

        </div>
      </div>

      <!-- Japanese Support -->
      <div class="space-y-2">
        <h3 class="text-[11px] font-bold text-slate-400 tracking-wider uppercase px-1">Japanese Support</h3>
        <div class="space-y-2.5">
          
          <a href="tel:0322317321" class="block bg-white rounded-2xl p-4 shadow-sm border border-gray-100/50 hover:bg-gray-50/50 active:scale-[0.99] transition-all">
            <div class="flex justify-between items-center">
              <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-gray-50 text-gray-700 flex items-center justify-center text-base"><i class="fa-solid fa-building-flag"></i></div>
                <div>
                  <h4 class="text-xs font-bold text-slate-800">Consulate-General of Japan in Cebu</h4>
                  <p class="text-[10px] text-gray-400 font-medium mt-0.5">Passport loss, serious legal trouble, safety support</p>
                </div>
              </div>
              <i class="fa-solid fa-chevron-right text-xs text-gray-300 pr-1"></i>
            </div>
            <div class="mt-3 pt-2.5 border-t border-gray-50 flex justify-between text-[10px] text-gray-400 font-semibold">
              <span><i class="fa-regular fa-clock mr-1"></i>8:30 AM - 12:30 PM / 1:30 PM - 5:15 PM</span>
              <span class="text-slate-600 font-bold">(032) 231-7321</span>
            </div>
          </a>

        </div>
      </div>

      <!-- Medical (Japanese Help Desk) -->
      <div class="space-y-2">
        <h3 class="text-[11px] font-bold text-slate-400 tracking-wider uppercase px-1">Medical (Japanese Help Desk)</h3>
        <p class="text-[9px] text-gray-400 px-1 font-medium -mt-1">セブの主要病院内にある、日本人通訳・キャッシュレス診療対応の窓口です。</p>
        <div class="space-y-2.5">
          
          <a href="tel:0322533121" class="block bg-white rounded-2xl p-4 shadow-sm border border-gray-100/50 hover:bg-gray-50/50 active:scale-[0.99] transition-all">
            <div class="flex justify-between items-start">
              <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-base"><i class="fa-solid fa-hospital"></i></div>
                <div>
                  <h4 class="text-xs font-bold text-slate-800">Cebu Doctors' Hospital (Help Desk)</h4>
                  <p class="text-[10px] text-gray-400 font-medium mt-0.5">Located in Cebu City (Osmeña Blvd)</p>
                </div>
              </div>
            </div>
            <div class="mt-3 pt-2.5 border-t border-gray-50 flex justify-between text-[10px] text-gray-400 font-semibold">
              <span class="text-emerald-600 bg-emerald-50/50 px-1.5 py-0.5 rounded"><i class="fa-solid fa-language mr-1"></i>Japanese Speaker Available</span>
              <span class="text-slate-600 font-bold">(032) 253-3121</span>
            </div>
          </a>

          <a href="tel:0323490000" class="block bg-white rounded-2xl p-4 shadow-sm border border-gray-100/50 hover:bg-gray-50/50 active:scale-[0.99] transition-all">
            <div class="flex justify-between items-start">
              <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-base"><i class="fa-solid fa-hospital"></i></div>
                <div>
                  <h4 class="text-xs font-bold text-slate-800">UCMED Japanese Help Desk</h4>
                  <p class="text-[10px] text-gray-400 font-medium mt-0.5">Located in Mandaue (Near Parkmall)</p>
                </div>
              </div>
            </div>
            <div class="mt-3 pt-2.5 border-t border-gray-50 flex justify-between text-[10px] text-gray-400 font-semibold">
              <span class="text-emerald-600 bg-emerald-50/50 px-1.5 py-0.5 rounded"><i class="fa-solid fa-language mr-1"></i>Japanese Speaker Available</span>
              <span class="text-slate-600 font-bold">(032) 349-0000</span>
            </div>
          </a>

        </div>
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
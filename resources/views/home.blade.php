<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CebuTra - Home</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght=400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <!-- 💡 無料インタラクティブマップ Leaflet.js -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

  <style>
    body {
      font-family: 'Plus Jakarta Sans', 'Helvetica Neue', Arial, sans-serif;
      background-color: #f3f4f6;
    }
    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

    /* Mapポップアップのカスタムスタイル */
    #map .leaflet-popup-content-wrapper {
      border-radius: 12px;
      font-size: 11px;
      font-weight: bold;
      padding: 0px;
    }
  </style>
</head>
<body class="flex justify-center items-center min-h-screen bg-gray-100 p-0 sm:p-4">

  <!-- 全体枠（sm:h-[720px]）は維持 -->
  <div class="w-full max-w-[412px] bg-[#FFFBF3] h-screen sm:h-[720px] shadow-2xl relative flex flex-col justify-between overflow-hidden sm:rounded-[36px]">
    
    <!-- 1. ヘッダー -->
    <div class="bg-[#FFFBF3] pt-2.5 px-4 pb-1.5 z-20 flex-shrink-0 space-y-2">
      <div class="flex justify-between items-center text-xs font-semibold text-gray-800">
        <div>9:41</div>
        <div class="flex items-center space-x-1">
          <i class="fa-solid fa-signal text-[10px]"></i>
          <i class="fa-solid fa-water text-[10px]"></i>
          <i class="fa-solid fa-battery-three-quarters"></i>
        </div>
      </div>

      <div class="flex justify-between items-center">
        <div class="flex items-center space-x-2">
          <div class="w-9 h-9 bg-[#008080] rounded-xl flex items-center justify-center shadow-sm">
            <span class="text-white font-bold text-xl">C</span>
          </div>
          <div>
            <h1 class="text-lg font-bold tracking-tight text-[#333] flex items-center">
              <span class="text-[#008080]">Cebu</span><span class="text-[#FF6347]">Tra</span>
            </h1>
            <p class="text-[9px] text-gray-400 font-bold tracking-wider -mt-1 uppercase">Cebu Travel</p>
          </div>
        </div>
        <button class="w-9 h-9 bg-white rounded-full flex items-center justify-center shadow-sm border border-gray-100 relative">
          <i class="fa-regular fa-bell text-gray-700 text-base"></i>
          <span class="absolute top-2 right-2 w-2 h-2 bg-[#FF6347] rounded-full"></span>
        </button>
      </div>
    </div>

    <!-- 2. メインコンテンツ -->
    <div class="flex-1 overflow-y-auto no-scrollbar p-4 pt-1 space-y-4 pb-20">
      
      <!-- 💡 今日のメイン天気カード（サイズアップ） -->
      @php $todayWeather = $forecasts[0] ?? null; @endphp
      @if($todayWeather)
        <div class="bg-gradient-to-br from-[#007A87] to-[#0193A1] text-white rounded-2xl p-4.5 shadow-md relative overflow-hidden">
          <p class="text-xs font-medium opacity-90">{{ __('messages.home.cebu_today') }}</p>
          <div class="flex items-baseline mt-1">
            <span class="text-5xl font-bold tracking-tighter">{{ $todayWeather['temp_max'] }}°</span>
            <span class="text-xl opacity-70 ml-1.5">/ {{ $todayWeather['temp_min'] }}°</span>
          </div>
          <p class="text-xs font-medium mt-1">{{ __($todayWeather['condition']['key']) }}</p>
          
          <div class="flex space-x-4 mt-3 text-xs opacity-90">
            <span class="flex items-center gap-1"><i class="fa-solid fa-droplet text-[10px]"></i> {{ __('messages.home.humidity') }} 78%</span>
            <span class="flex items-center gap-1"><i class="fa-solid fa-wind text-[10px]"></i> {{ __('messages.home.wind') }} 12km/h</span>
            <span class="flex items-center gap-1"><i class="fa-solid fa-wave-square text-[10px]"></i> {{ __('messages.home.wave') }} 0.5m</span>
          </div>

          <div class="absolute right-5 top-5 text-6xl text-[#FFB03A] drop-shadow-md">
            <i class="fa-solid {{ $todayWeather['condition']['icon'] }}"></i>
          </div>
        </div>
      @endif

      <!-- 💡 週間予報リスト（サイズアップ） -->
      <div class="flex space-x-2.5 overflow-x-auto no-scrollbar py-1 flex-shrink-0">
        @foreach($forecasts ?? [] as $forecast)
          <div class="min-w-[58px] bg-white rounded-2xl p-2 text-center shadow-sm flex flex-col items-center justify-between {{ $forecast['is_today'] ? 'border border-[#008080]/40 ring-1 ring-[#008080]/20' : 'border border-gray-100' }}">
            <p class="text-[11px] {{ $forecast['is_today'] ? 'text-[#008080] font-bold' : 'text-gray-500 font-medium' }}">
              {{ $forecast['is_today'] ? __('messages.home.today') : $forecast['day_name'] }}
            </p>
            <i class="fa-solid {{ $forecast['condition']['icon'] }} my-1.5 text-lg"></i>
            <p class="text-sm font-bold text-gray-800">{{ $forecast['temp_max'] }}°</p>
            <p class="text-[10px] text-gray-400">{{ $forecast['temp_min'] }}°</p>
            <p class="text-[10px] text-[#3B82F6] font-medium mt-1">
              <i class="fa-solid fa-cloud-rain text-[8px]"></i> {{ $forecast['pop'] }}%
            </p>
          </div>
        @endforeach
      </div>

      <!-- 💡 スポットマップエリア（地図エリアを拡大） -->
      <div class="space-y-2">
        <div class="flex justify-between items-center px-0.5">
          <h2 class="text-base font-bold text-[#2C3E50]">{{ __('messages.home.spot_map') }}</h2>
          <span class="text-xs text-gray-400 flex items-center gap-1"><i class="fa-solid fa-location-dot"></i> Philippines</span>
        </div>
      
        <!-- エリア切り替えボタン -->
        <div class="flex space-x-1.5 overflow-x-auto no-scrollbar py-0.5">
          <button type="button" onclick="zoomToLocation(10.3168, 123.9911, 12)" class="flex items-center gap-1 bg-white px-3 py-1.5 rounded-full text-[11px] font-bold text-gray-700 shadow-sm border border-gray-100 whitespace-nowrap active:scale-95 transition-transform">
            {{ __('messages.home.spots.mactan') }}
          </button>
          <button type="button" onclick="zoomToLocation(10.3157, 123.8854, 12)" class="flex items-center gap-1 bg-white px-3 py-1.5 rounded-full text-[11px] font-bold text-gray-700 shadow-sm border border-gray-100 whitespace-nowrap active:scale-95 transition-transform">
            {{ __('messages.home.spots.cebu_city') }}
          </button>
          <button type="button" onclick="zoomToLocation(10.2683, 124.0608, 12)" class="flex items-center gap-1 bg-white px-3 py-1.5 rounded-full text-[11px] font-bold text-gray-700 shadow-sm border border-gray-100 whitespace-nowrap active:scale-95 transition-transform">
            {{ __('messages.home.spots.olango') }}
          </button>
          <button type="button" onclick="zoomToLocation(10.6811, 124.3411, 11)" class="flex items-center gap-1 bg-white px-3 py-1.5 rounded-full text-[11px] font-bold text-gray-700 shadow-sm border border-gray-100 whitespace-nowrap active:scale-95 transition-transform">
            {{ __('messages.home.spots.camotes') }}
          </button>
          <button type="button" onclick="zoomToLocation(10.5517, 123.9142, 12)" class="flex items-center gap-1 bg-white px-3 py-1.5 rounded-full text-[11px] font-bold text-gray-700 shadow-sm border border-gray-100 whitespace-nowrap active:scale-95 transition-transform">
            {{ __('messages.home.spots.cebu_safari') }}
          </button>
          <button type="button" onclick="zoomToLocation(9.9397, 123.3992, 12)" class="flex items-center gap-1 bg-white px-3 py-1.5 rounded-full text-[11px] font-bold text-gray-700 shadow-sm border border-gray-100 whitespace-nowrap active:scale-95 transition-transform">
            {{ __('messages.home.spots.moalboal') }}
          </button>
          <button type="button" onclick="zoomToLocation(9.8048, 123.3742, 13)" class="flex items-center gap-1 bg-white px-3 py-1.5 rounded-full text-[11px] font-bold text-gray-700 shadow-sm border border-gray-100 whitespace-nowrap active:scale-95 transition-transform">
            {{ __('messages.home.spots.kawasan') }}
          </button>
          <button type="button" onclick="zoomToLocation(9.4812, 123.3644, 13)" class="flex items-center gap-1 bg-white px-3 py-1.5 rounded-full text-[11px] font-bold text-gray-700 shadow-sm border border-gray-100 whitespace-nowrap active:scale-95 transition-transform">
            {{ __('messages.home.spots.tumalog') }}
          </button>
          <button type="button" onclick="zoomToLocation(9.4623, 123.3800, 12)" class="flex items-center gap-1 bg-white px-3 py-1.5 rounded-full text-[11px] font-bold text-gray-700 shadow-sm border border-gray-100 whitespace-nowrap active:scale-95 transition-transform">
            {{ __('messages.home.spots.oslob') }}
          </button>

          <!-- 周辺の島々 -->
          <button type="button" onclick="zoomToLocation(9.4310, 123.3931, 13)" class="flex items-center gap-1 bg-white px-3 py-1.5 rounded-full text-[11px] font-bold text-gray-700 shadow-sm border border-gray-100 whitespace-nowrap active:scale-95 transition-transform">
            {{ __('messages.home.spots.sumilon') }}
          </button>
          <button type="button" onclick="zoomToLocation(11.1620, 123.7319, 11)" class="flex items-center gap-1 bg-white px-3 py-1.5 rounded-full text-[11px] font-bold text-gray-700 shadow-sm border border-gray-100 whitespace-nowrap active:scale-95 transition-transform">
            {{ __('messages.home.spots.bantayan') }}
          </button>
          <button type="button" onclick="zoomToLocation(9.8500, 124.1435, 10)" class="flex items-center gap-1 bg-white px-3 py-1.5 rounded-full text-[11px] font-bold text-gray-700 shadow-sm border border-gray-100 whitespace-nowrap active:scale-95 transition-transform">
            {{ __('messages.home.spots.bohol') }}
          </button>
          <button type="button" onclick="zoomToLocation(9.1891, 123.5859, 11)" class="flex items-center gap-1 bg-white px-3 py-1.5 rounded-full text-[11px] font-bold text-gray-700 shadow-sm border border-gray-100 whitespace-nowrap active:scale-95 transition-transform">
            {{ __('messages.home.spots.siquijor') }}
          </button>

          <!-- 遠方の人気リゾート -->
          <button type="button" onclick="zoomToLocation(11.9674, 121.9248, 11)" class="flex items-center gap-1 bg-white px-3 py-1.5 rounded-full text-[11px] font-bold text-gray-700 shadow-sm border border-gray-100 whitespace-nowrap active:scale-95 transition-transform">
            {{ __('messages.home.spots.boracay') }}
          </button>
          <button type="button" onclick="zoomToLocation(9.8349, 126.0494, 10)" class="flex items-center gap-1 bg-white px-3 py-1.5 rounded-full text-[11px] font-bold text-gray-700 shadow-sm border border-gray-100 whitespace-nowrap active:scale-95 transition-transform">
            {{ __('messages.home.spots.siargao') }}
          </button>
          <button type="button" onclick="zoomToLocation(9.8349, 118.7384, 8)" class="flex items-center gap-1 bg-white px-3 py-1.5 rounded-full text-[11px] font-bold text-gray-700 shadow-sm border border-gray-100 whitespace-nowrap active:scale-95 transition-transform">
            {{ __('messages.home.spots.palawan') }}
          </button>
        </div>

        <!-- 💡 地図の縦幅を h-48 (192px) に広げて範囲を大きく確保 -->
        <div id="map" class="w-full h-48 rounded-2xl shadow-inner border border-gray-100 overflow-hidden z-10"></div>
      </div>

      <!-- 参加予定の旅 -->
      <div class="space-y-2">
        <div class="flex justify-between items-center px-0.5">
          <h2 class="text-base font-bold text-[#2C3E50]">{{ __('messages.home.upcoming_trips') }}</h2>
          <span class="bg-[#E0F2F1] text-[#008080] text-[10px] font-bold px-2 py-0.5 rounded-full">2</span>
        </div>

        <div class="bg-gradient-to-r from-[#14939B] to-[#0D7880] text-white p-3 rounded-xl shadow-sm relative flex items-center justify-between cursor-pointer">
          <div class="space-y-0.5">
            <span class="text-[9px] opacity-75 block font-medium">{{ __('messages.home.in_days', ['days' => 6]) }}</span>
            <h3 class="text-sm font-bold">スミロン島 日帰りトリップ</h3>
            <div class="flex items-center space-x-2 text-[10px] opacity-90 pt-0.5">
              <span><i class="fa-regular fa-calendar text-[9px]"></i> 6月28日 (土)</span>
              <span><i class="fa-solid fa-users text-[9px]"></i> {{ __('messages.home.members', ['current' => 5, 'max' => 6]) }}</span>
              <span><i class="fa-solid fa-location-dot text-[9px]"></i> スミロン島</span>
            </div>
          </div>
          <div class="flex items-center space-x-1.5">
            <div class="w-7 h-7 bg-white/10 rounded-full flex items-center justify-center">
              <i class="fa-solid fa-anchor text-xs"></i>
            </div>
            <i class="fa-solid fa-chevron-right text-[10px] opacity-70"></i>
          </div>
        </div>

        <div class="bg-gradient-to-r from-[#14939B] to-[#0D7880] text-white p-3 rounded-xl shadow-sm relative flex items-center justify-between cursor-pointer">
          <div class="space-y-0.5">
            <span class="text-[9px] opacity-75 block font-medium">{{ __('messages.home.in_days', ['days' => 13]) }}</span>
            <h3 class="text-sm font-bold">バンタヤン島 週末旅</h3>
            <div class="flex items-center space-x-2 text-[10px] opacity-90 pt-0.5">
              <span><i class="fa-regular fa-calendar text-[9px]"></i> 7月5日 (土)</span>
              <span><i class="fa-solid fa-users text-[9px]"></i> {{ __('messages.home.members', ['current' => 3, 'max' => 4]) }}</span>
              <span><i class="fa-solid fa-location-dot text-[9px]"></i> バンタヤン島</span>
            </div>
          </div>
          <div class="flex items-center space-x-1.5">
            <div class="w-7 h-7 bg-[#ffffff1a] rounded-full flex items-center justify-center">
              <i class="fa-solid fa-anchor text-xs"></i>
            </div>
            <i class="fa-solid fa-chevron-right text-[10px] opacity-70"></i>
          </div>
        </div>
      </div>

      <!-- 募集中の旅 -->
      <div class="space-y-2">
        <div class="flex justify-between items-center px-0.5">
          <h2 class="text-base font-bold text-[#2C3E50]">{{ __('messages.home.my_posted_trips') }}</h2>
          <a href="#" class="text-[11px] text-[#008080] font-bold">{{ __('messages.home.new_post') }} <i class="fa-solid fa-chevron-right text-[9px]"></i></a>
        </div>
        <div class="bg-white p-3 rounded-xl shadow-sm border border-gray-100 flex justify-between items-center opacity-95">
          <h3 class="text-xs font-bold text-gray-800">オスロブ ジンベエザメ体験</h3>
          <span class="bg-[#FFF3CD] text-[#856404] text-[10px] font-bold px-2 py-0.5 rounded-full">{{ __('messages.home.status_open') }}</span>
        </div>
      </div>

    </div>

    <!-- 3. ボトムナビゲーション -->
    @include('components.bottom-nav')

  </div>

  <!-- 💡 マップ制御スクリプト -->
  <script>
  let map;

  document.addEventListener("DOMContentLoaded", function() {
    const locations = [
      { title: "{{ __('messages.home.spots.cebu_city') }}",   lat: 10.3157, lng: 123.8854 },
      { title: "{{ __('messages.home.spots.mactan') }}",      lat: 10.3168, lng: 123.9911 },
      { title: "{{ __('messages.home.spots.olango') }}",      lat: 10.2683, lng: 124.0608 },
      { title: "{{ __('messages.home.spots.camotes') }}",     lat: 10.6811, lng: 124.3411 },
      { title: "{{ __('messages.home.spots.cebu_safari') }}", lat: 10.5517, lng: 123.9142 },
      { title: "{{ __('messages.home.spots.moalboal') }}",    lat: 9.9397,  lng: 123.3992 },
      { title: "{{ __('messages.home.spots.kawasan') }}",     lat: 9.8048,  lng: 123.3742 },
      { title: "{{ __('messages.home.spots.tumalog') }}",     lat: 9.4812,  lng: 123.3644 },
      { title: "{{ __('messages.home.spots.oslob') }}",       lat: 9.4623,  lng: 123.3800 },
      { title: "{{ __('messages.home.spots.sumilon') }}",     lat: 9.4310,  lng: 123.3931 },
      { title: "{{ __('messages.home.spots.bantayan') }}",    lat: 11.1620, lng: 123.7319 },
      { title: "{{ __('messages.home.spots.bohol') }}",       lat: 9.8500,  lng: 124.1435 },
      { title: "{{ __('messages.home.spots.siquijor') }}",    lat: 9.1891,  lng: 123.5859 },
      { title: "{{ __('messages.home.spots.boracay') }}",     lat: 11.9674, lng: 121.9248 },
      { title: "{{ __('messages.home.spots.siargao') }}",     lat: 9.8349,  lng: 126.0494 },
      { title: "{{ __('messages.home.spots.palawan') }}",     lat: 9.8349,  lng: 118.7384 },
    ];

    // 地図の初期化（セブシティ中心）
    map = L.map('map', { zoomControl: false }).setView([10.3157, 123.8854], 9);

    // OpenStreetMap タイル読み込み
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 18,
      attribution: '&copy; OpenStreetMap'
    }).addTo(map);

    // カスタムピンの生成と配置
    locations.forEach(loc => {
      const customIcon = L.divIcon({
        className: 'custom-pin',
        html: `<div class="w-6.5 h-6.5 bg-[#008080] text-white rounded-full flex items-center justify-center shadow-lg border-2 border-white transition-transform hover:scale-110">
                 <i class="fa-solid fa-location-dot text-[10px]"></i>
               </div>`,
        iconSize: [26, 26],
        iconAnchor: [13, 26]
      });

      L.marker([loc.lat, loc.lng], { icon: customIcon })
       .addTo(map)
       .bindPopup(`<div class="p-1 text-center font-bold text-slate-800">${loc.title}</div>`);
    });
  });

  // カメラアニメーション移動
  function zoomToLocation(lat, lng, zoomLevel) {
    if (map) {
      map.flyTo([lat, lng], zoomLevel, {
        duration: 1.5,
        easeLinearity: 0.25
      });
    }
  }
</script>
</body>
</html>




{{-- <!-- Weather Forecast Widget -->
<div class="bg-gradient-to-br from-[#007A87] to-[#0193A1] text-white rounded-3xl p-5 shadow-md relative overflow-hidden">
  <p class="text-sm font-medium opacity-90">セブ島 · 今日</p>
  <div class="flex items-baseline mt-1">
    <span class="text-5xl font-bold tracking-tighter">32°</span>
    <span class="text-xl opacity-70 ml-1">/ 26°</span>
  </div>
  <p class="text-base font-medium mt-1">晴れ</p>
  
  <div class="flex space-x-4 mt-4 text-xs opacity-90">
    <span class="flex items-center gap-1"><i class="fa-solid fa-droplet text-[10px]"></i> 湿度 78%</span>
    <span class="flex items-center gap-1"><i class="fa-solid fa-wind text-[10px]"></i> 風 12km/h</span>
    <span class="flex items-center gap-1"><i class="fa-solid fa-wave-square text-[10px]"></i> 波高 0.5m</span>
  </div>

  <div class="absolute right-6 top-6 text-6xl text-[#FFB03A] drop-shadow-md">
    <i class="fa-solid fa-sun"></i>
  </div>
</div>

<div class="flex space-x-3 overflow-x-auto no-scrollbar py-1 flex-shrink-0">
  <div class="min-w-[56px] bg-white rounded-2xl p-2 text-center shadow-sm flex flex-col items-center justify-between border border-[#008080]/30">
    <p class="text-[11px] text-[#008080] font-bold">今日</p>
    <i class="fa-solid fa-sun text-[#FFB03A] my-2 text-lg"></i>
    <p class="text-sm font-bold text-gray-800">32°</p>
    <p class="text-[10px] text-gray-400">26°</p>
    <p class="text-[10px] text-[#3B82F6] font-medium mt-1"><i class="fa-solid fa-cloud-rain text-[8px]"></i> 5%</p>
  </div>
  <div class="min-w-[56px] bg-white rounded-2xl p-2 text-center shadow-sm flex flex-col items-center justify-between">
    <p class="text-[11px] text-gray-500 font-medium">明日</p>
    <i class="fa-solid fa-cloud-sun text-[#FFB03A] my-2 text-lg"></i>
    <p class="text-sm font-bold text-gray-800">31°</p>
    <p class="text-[10px] text-gray-400">25°</p>
    <p class="text-[10px] text-[#3B82F6] font-medium mt-1"><i class="fa-solid fa-cloud-rain text-[8px]"></i> 10%</p>
  </div>
  <div class="min-w-[56px] bg-white rounded-2xl p-2 text-center shadow-sm flex flex-col items-center justify-between">
    <p class="text-[11px] text-gray-500 font-medium">水</p>
    <i class="fa-solid fa-cloud-sun-rain text-amber-500 my-2 text-lg"></i>
    <p class="text-sm font-bold text-gray-800">29°</p>
    <p class="text-[10px] text-gray-400">25°</p>
    <p class="text-[10px] text-[#3B82F6] font-medium mt-1"><i class="fa-solid fa-cloud-rain text-[8px]"></i> 30%</p>
  </div>
  <div class="min-w-[56px] bg-white rounded-2xl p-2 text-center shadow-sm flex flex-col items-center justify-between">
    <p class="text-[11px] text-gray-500 font-medium">木</p>
    <i class="fa-solid fa-cloud-showers-heavy text-blue-400 my-2 text-lg"></i>
    <p class="text-sm font-bold text-gray-800">27°</p>
    <p class="text-[10px] text-gray-400">24°</p>
    <p class="text-[10px] text-[#3B82F6] font-medium mt-1"><i class="fa-solid fa-cloud-rain text-[8px]"></i> 80%</p>
  </div>
  <div class="min-w-[56px] bg-white rounded-2xl p-2 text-center shadow-sm flex flex-col items-center justify-between">
    <p class="text-[11px] text-gray-500 font-medium">金</p>
    <i class="fa-solid fa-cloud-rain text-blue-400 my-2 text-lg"></i>
    <p class="text-sm font-bold text-gray-800">28°</p>
    <p class="text-[10px] text-gray-400">24°</p>
    <p class="text-[10px] text-[#3B82F6] font-medium mt-1"><i class="fa-solid fa-cloud-rain text-[8px]"></i> 50%</p>
  </div>
</div>

<!-- Spot Map Widget -->
<div class="space-y-3">
  <div class="flex justify-between items-center px-1">
    <h2 class="text-lg font-bold text-[#2C3E50]">Spot Map</h2>
    <span class="text-xs text-gray-400 flex items-center gap-1"><i class="fa-solid fa-location-dot"></i> Cebu</span>
  </div>
  
  <div class="flex space-x-2 overflow-x-auto no-scrollbar py-1">
    <button onclick="zoomToLocation(10.3168, 123.9911, 12)" class="flex items-center gap-1 bg-white px-4 py-2 rounded-full text-xs font-bold text-gray-700 shadow-sm border border-gray-100 whitespace-nowrap cursor-pointer">
      🏖️ マクタン島
    </button>
    <button onclick="zoomToLocation(10.3157, 123.8854, 12)" class="flex items-center gap-1 bg-white px-4 py-2 rounded-full text-xs font-bold text-gray-700 shadow-sm border border-gray-100 whitespace-nowrap cursor-pointer">
      🏙️ セブシティ
    </button>
    <button onclick="zoomToLocation(11.1620, 123.7319, 11)" class="flex items-center gap-1 bg-white px-4 py-2 rounded-full text-xs font-bold text-gray-700 shadow-sm border border-gray-100 whitespace-nowrap cursor-pointer">
      🌴 バンタヤン島
    </button>
  </div>

  <div id="map" class="w-full h-52 rounded-2xl shadow-inner border border-gray-100 overflow-hidden z-10">
    <div class="w-full h-full bg-gray-200 flex flex-col items-center justify-center text-gray-500 p-4 text-center text-xs">
      <i class="fa-solid fa-map-marked-alt text-3xl mb-2 text-gray-400"></i>
      <p class="font-bold">Google Maps を読み込み中...</p>
      <p class="opacity-75 mt-1">※APIキーを設定するとマップが有効になります</p>
    </div>
  </div>
</div>

<!-- Upcoming Trips Widget -->
<div class="space-y-3">
  <div class="flex justify-between items-center px-1">
    <h2 class="text-lg font-bold text-[#2C3E50]">Upcoming Trips</h2>
    <span class="bg-[#E0F2F1] text-[#008080] text-xs font-bold px-2.5 py-0.5 rounded-full">{{ $upcomingTrips->count() }}</span>
  </div>

  <div class="space-y-3">
    @foreach($upcomingTrips as $trip)
    <div onclick="window.location.href='{{ route('itineraries.show', $trip->id ?? 1) }}'" class="bg-gradient-to-r from-[#14939B] to-[#0D7880] text-white p-4 rounded-2xl shadow-sm relative flex items-center justify-between cursor-pointer active:scale-[0.99] transition-transform">
      <div class="space-y-1">
        <span class="text-[10px] opacity-75 block font-medium">In {{ \Carbon\Carbon::parse($trip->trip_date)->diffInDays(now()) }} days</span>
        <h3 class="text-base font-bold">{{ $trip->title }}</h3>
        <div class="flex items-center space-x-3 text-[11px] opacity-90 pt-1">
          <span><i class="fa-regular fa-calendar text-[10px]"></i> {{ \Carbon\Carbon::parse($trip->trip_date)->format('n月j日 (土)') }}</span>
          <span><i class="fa-solid fa-users text-[10px]"></i> {{ $trip->approvedParticipantsCount() }}/{{ $trip->max_participants }}名</span>
          <span><i class="fa-solid fa-location-dot text-[10px]"></i> {{ $trip->location }}</span>
        </div>
      </div>
      <div class="flex items-center space-x-2">
        <div class="w-8 h-8 bg-white/10 rounded-full flex items-center justify-center">
          <i class="fa-solid fa-anchor text-sm"></i>
        </div>
        <i class="fa-solid fa-chevron-right text-xs opacity-70"></i>
      </div>
    </div>
    @endforeach
  </div>
</div>

<!-- My Posted Trips Widget -->
<div class="space-y-3">
  <div class="flex justify-between items-center px-1">
    <h2 class="text-lg font-bold text-[#2C3E50]">My Posted Trips</h2>
    <a href="#" class="text-xs text-[#008080] font-bold">New Post <i class="fa-solid fa-chevron-right text-[10px]"></i></a>
  </div>
  <div class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100 flex justify-between items-center opacity-95">
    <h3 class="text-sm font-bold text-gray-800">オスロブ ジンベエザメ体験</h3>
    <span class="bg-[#FFF3CD] text-[#856404] text-[11px] font-bold px-2.5 py-0.5 rounded-full">Open</span>
  </div>
</div> --}}


{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CebuTra - Home</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght=400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <!-- 💡 無料マップ（Leaflet.js）のCSS/JS -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

  <style>
    body {
      font-family: 'Plus Jakarta Sans', 'Helvetica Neue', Arial, sans-serif;
      background-color: #f3f4f6;
    }
    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

    /* Leafletのタイル・ポップアップスタイルの微調整 */
    #map .leaflet-popup-content-wrapper {
      border-radius: 12px;
      font-size: 12px;
      font-weight: bold;
    }
  </style>
</head>
<body class="flex justify-center items-center min-h-screen bg-gray-100 p-0 sm:p-4">

  <div class="w-full max-w-[412px] bg-[#FFFBF3] h-screen sm:h-[840px] shadow-2xl relative flex flex-col justify-between overflow-hidden sm:rounded-[40px]">
    
    <!-- 1. ヘッダー -->
    <div class="bg-[#FFFBF3] pt-3 px-5 pb-2 z-20 flex-shrink-0 space-y-3">
      <div class="flex justify-between items-center text-xs font-semibold text-gray-800">
        <div>9:41</div>
        <div class="flex items-center space-x-1">
          <i class="fa-solid fa-signal text-[10px]"></i>
          <i class="fa-solid fa-water text-[10px]"></i>
          <i class="fa-solid fa-battery-three-quarters"></i>
        </div>
      </div>

      <div class="flex justify-between items-center">
        <div class="flex items-center space-x-2">
          <div class="w-10 h-10 bg-[#008080] rounded-xl flex items-center justify-center shadow-sm">
            <span class="text-white font-bold text-2xl">C</span>
          </div>
          <div>
            <h1 class="text-xl font-bold tracking-tight text-[#333] flex items-center">
              <span class="text-[#008080]">Cebu</span><span class="text-[#FF6347]">Tra</span>
            </h1>
            <p class="text-[10px] text-gray-400 font-bold tracking-wider -mt-1 uppercase">Cebu Travel</p>
          </div>
        </div>
        <button class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-sm border border-gray-100 relative">
          <i class="fa-regular fa-bell text-gray-700 text-lg"></i>
          <span class="absolute top-2 right-2.5 w-2 h-2 bg-[#FF6347] rounded-full"></span>
        </button>
      </div>
    </div>

    <!-- 2. メインスクロールエリア -->
    <div class="flex-1 overflow-y-auto no-scrollbar p-5 pt-1 space-y-6 pb-28">
      
      <!-- 💡 今日のメイン天気カード（APIデータ連動） -->
      @php $todayWeather = $forecasts[0] ?? null; @endphp
      @if($todayWeather)
        <div class="bg-gradient-to-br from-[#007A87] to-[#0193A1] text-white rounded-3xl p-5 shadow-md relative overflow-hidden">
          <p class="text-sm font-medium opacity-90">セブ島 · {{ __('messages.weather.today') ?? '今日' }}</p>
          <div class="flex items-baseline mt-1">
            <span class="text-5xl font-bold tracking-tighter">{{ $todayWeather['temp_max'] }}°</span>
            <span class="text-xl opacity-70 ml-1">/ {{ $todayWeather['temp_min'] }}°</span>
          </div>
          <p class="text-base font-medium mt-1">{{ __($todayWeather['condition']['key']) }}</p>
          
          <div class="flex space-x-4 mt-4 text-xs opacity-90">
            <span class="flex items-center gap-1"><i class="fa-solid fa-droplet text-[10px]"></i> 湿度 {{ $todayWeather['humidity'] ?? 78 }}%</span>
            <span class="flex items-center gap-1"><i class="fa-solid fa-wind text-[10px]"></i> 風 {{ $todayWeather['wind_speed'] ?? 12 }}km/h</span>
            <span class="flex items-center gap-1"><i class="fa-solid fa-wave-square text-[10px]"></i> 波高 0.5m</span>
          </div>

          <div class="absolute right-6 top-6 text-6xl text-[#FFB03A] drop-shadow-md">
            <i class="fa-solid {{ $todayWeather['condition']['icon'] }}"></i>
          </div>
        </div>
      @endif

      <!-- 💡 5日間の週間予報リスト（APIデータ連動） -->
      <div class="flex space-x-3 overflow-x-auto no-scrollbar py-1 flex-shrink-0">
        @foreach($forecasts ?? [] as $index => $forecast)
          <div class="min-w-[56px] bg-white rounded-2xl p-2 text-center shadow-sm flex flex-col items-center justify-between {{ $forecast['is_today'] ? 'border border-[#008080]/30' : '' }}">
            <p class="text-[11px] {{ $forecast['is_today'] ? 'text-[#008080] font-bold' : 'text-gray-500 font-medium' }}">
              {{ $forecast['is_today'] ? '今日' : $forecast['day_name'] }}
            </p>
            <i class="fa-solid {{ $forecast['condition']['icon'] }} my-2 text-lg"></i>
            <p class="text-sm font-bold text-gray-800">{{ $forecast['temp_max'] }}°</p>
            <p class="text-[10px] text-gray-400">{{ $forecast['temp_min'] }}°</p>
            <p class="text-[10px] text-[#3B82F6] font-medium mt-1">
              <i class="fa-solid fa-cloud-rain text-[8px]"></i> {{ $forecast['pop'] ?? 10 }}%
            </p>
          </div>
        @endforeach
      </div>

      <!-- 💡 スポットマップエリア（Leaflet.jsで完全リアル化） -->
      <div class="space-y-3">
        <div class="flex justify-between items-center px-1">
          <h2 class="text-lg font-bold text-[#2C3E50]">Spot Map</h2>
          <span class="text-xs text-gray-400 flex items-center gap-1"><i class="fa-solid fa-location-dot"></i> Cebu</span>
        </div>
        
        <!-- エリア切り替えボタン -->
        <div class="flex space-x-2 overflow-x-auto no-scrollbar py-1">
          <button type="button" onclick="zoomToLocation(10.3168, 123.9911, 12)" class="flex items-center gap-1 bg-white px-4 py-2 rounded-full text-xs font-bold text-gray-700 shadow-sm border border-gray-100 whitespace-nowrap active:scale-95 transition-transform">
            🏖️ マクタン島
          </button>
          <button type="button" onclick="zoomToLocation(10.3157, 123.8854, 12)" class="flex items-center gap-1 bg-white px-4 py-2 rounded-full text-xs font-bold text-gray-700 shadow-sm border border-gray-100 whitespace-nowrap active:scale-95 transition-transform">
            🏙️ セブシティ
          </button>
          <button type="button" onclick="zoomToLocation(11.1620, 123.7319, 11)" class="flex items-center gap-1 bg-white px-4 py-2 rounded-full text-xs font-bold text-gray-700 shadow-sm border border-gray-100 whitespace-nowrap active:scale-95 transition-transform">
            🌴 バンタヤン島
          </button>
        </div>

        <!-- 地図表示コンテナ -->
        <div id="map" class="w-full h-52 rounded-2xl shadow-inner border border-gray-100 overflow-hidden z-10"></div>
      </div>

      <!-- Upcoming Trips -->
      <div class="space-y-3">
        <div class="flex justify-between items-center px-1">
          <h2 class="text-lg font-bold text-[#2C3E50]">Upcoming Trips</h2>
          <span class="bg-[#E0F2F1] text-[#008080] text-xs font-bold px-2.5 py-0.5 rounded-full">2</span>
        </div>

        <div class="bg-gradient-to-r from-[#14939B] to-[#0D7880] text-white p-4 rounded-2xl shadow-sm relative flex items-center justify-between cursor-pointer">
          <div class="space-y-1">
            <span class="text-[10px] opacity-75 block font-medium">In 6 days</span>
            <h3 class="text-base font-bold">スミロン島 日帰りトリップ</h3>
            <div class="flex items-center space-x-3 text-[11px] opacity-90 pt-1">
              <span><i class="fa-regular fa-calendar text-[10px]"></i> 6月28日 (土)</span>
              <span><i class="fa-solid fa-users text-[10px]"></i> 5/6名</span>
              <span><i class="fa-solid fa-location-dot text-[10px]"></i> スミロン島</span>
            </div>
          </div>
          <div class="flex items-center space-x-2">
            <div class="w-8 h-8 bg-white/10 rounded-full flex items-center justify-center">
              <i class="fa-solid fa-anchor text-sm"></i>
            </div>
            <i class="fa-solid fa-chevron-right text-xs opacity-70"></i>
          </div>
        </div>

        <div class="bg-gradient-to-r from-[#14939B] to-[#0D7880] text-white p-4 rounded-2xl shadow-sm relative flex items-center justify-between cursor-pointer">
          <div class="space-y-1">
            <span class="text-[10px] opacity-75 block font-medium">In 13 days</span>
            <h3 class="text-base font-bold">バンタヤン島 週末旅</h3>
            <div class="flex items-center space-x-3 text-[11px] opacity-90 pt-1">
              <span><i class="fa-regular fa-calendar text-[10px]"></i> 7月5日 (土)</span>
              <span><i class="fa-solid fa-users text-[10px]"></i> 3/4名</span>
              <span><i class="fa-solid fa-location-dot text-[10px]"></i> バンタヤン島</span>
            </div>
          </div>
          <div class="flex items-center space-x-2">
            <div class="w-8 h-8 bg-white/10 rounded-full flex items-center justify-center">
              <i class="fa-solid fa-anchor text-sm"></i>
            </div>
            <i class="fa-solid fa-chevron-right text-xs opacity-70"></i>
          </div>
        </div>
      </div>

      <!-- My Posted Trips -->
      <div class="space-y-3">
        <div class="flex justify-between items-center px-1">
          <h2 class="text-lg font-bold text-[#2C3E50]">My Posted Trips</h2>
          <a href="#" class="text-xs text-[#008080] font-bold">New Post <i class="fa-solid fa-chevron-right text-[10px]"></i></a>
        </div>
        <div class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100 flex justify-between items-center opacity-95">
          <h3 class="text-sm font-bold text-gray-800">オスロブ ジンベエザメ体験</h3>
          <span class="bg-[#FFF3CD] text-[#856404] text-[11px] font-bold px-2.5 py-0.5 rounded-full">Open</span>
        </div>
      </div>

    </div>

    <!-- 3. ボトムナビゲーション -->
    @include('components.bottom-nav')

  </div>

  <!-- 💡 マップ動的制御スクリプト -->
  <script>
    let map;

    document.addEventListener("DOMContentLoaded", function() {
      const locations = [
        { title: "セブシティ", lat: 10.3157, lng: 123.8854 },
        { title: "マクタン島", lat: 10.3168, lng: 123.9911 },
        { title: "バンタヤン島", lat: 11.1620, lng: 123.7319 },
        { title: "スミロン島", lat: 9.4310, lng: 123.3931 }
      ];

      // 地図の初期化（セブシティ中心）
      map = L.map('map', { zoomControl: false }).setView([10.3157, 123.8854], 10);

      // OpenStreetMap タイル読み込み
      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
        attribution: '&copy; OpenStreetMap'
      }).addTo(map);

      // カスタムピン作成
      const customIcon = L.divIcon({
        className: 'custom-pin',
        html: `<div class="w-7 h-7 bg-[#008080] text-white rounded-full flex items-center justify-center shadow-lg border-2 border-white"><i class="fa-solid fa-location-dot text-xs"></i></div>`,
        iconSize: [28, 28],
        iconAnchor: [14, 28]
      });

      // マーカーの追加
      locations.forEach(loc => {
        L.marker([loc.lat, loc.lng], { icon: customIcon })
         .addTo(map)
         .bindPopup(`<div class="p-1 text-center font-bold text-slate-800">${loc.title}</div>`);
      });
    });

    // ボタンタップ時のマップ移動処理
    function zoomToLocation(lat, lng, zoomLevel) {
      if (map) {
        map.flyTo([lat, lng], zoomLevel, { duration: 1.2 });
      }
    }
  </script>
</body>
</html> --}}




{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CebuTra - Home</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght=400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <!-- 💡 Leaflet.js (無料オープンソースマップ) の読み込み -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

  <style>
    body {
      font-family: 'Plus Jakarta Sans', 'Helvetica Neue', Arial, sans-serif;
      background-color: #f3f4f6;
    }
    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

    /* マップ背景の丸み・z-index制御 */
    #cebu-map {
      width: 100%;
      height: 260px;
      border-radius: 20px;
      z-index: 10;
    }
    /* Leafletのポインターポップアップのカスタマイズ */
    .leaflet-popup-content-wrapper {
      border-radius: 16px;
      padding: 0;
      overflow: hidden;
      box-shadow: 0 4px 20px rgba(0,0,0,0.12);
    }
    .leaflet-popup-content {
      margin: 0 !important;
      line-height: 1.4;
    }
  </style>
</head>
<body class="flex justify-center items-center min-h-screen bg-gray-100 p-0 sm:p-4">

  <!-- スマホ外枠コンテナ -->
  <div class="w-full max-w-[412px] bg-[#FFFBF3] h-screen sm:h-[840px] shadow-2xl relative flex flex-col justify-between overflow-hidden sm:rounded-[40px]">
    
    <!-- 1. ヘッダー -->
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
        <div class="flex items-center gap-2">
          <div class="w-8 h-8 rounded-full bg-[#008080] text-white flex items-center justify-center font-bold text-xs">C</div>
          <span class="font-extrabold text-slate-800 tracking-tight text-base">CebuTra</span>
        </div>
        <a href="{{ route('profile') }}" class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-gray-200 transition-colors">
          <i class="fa-regular fa-user text-xs"></i>
        </a>
      </div>
    </div>

    <!-- 2. メインコンテンツ（スクロール可能領域） -->
    <div class="flex-1 overflow-y-auto no-scrollbar p-5 space-y-6 pb-28">

      <!-- マップセクション Header -->
      <div class="space-y-1">
        <div class="flex items-center gap-2 text-[#008080]">
          <i class="fa-solid fa-location-dot text-sm"></i>
          <h2 class="text-xs font-bold uppercase tracking-wider">{{ __('messages.home.map_title') }}</h2>
        </div>
        <p class="text-[11px] text-gray-400 font-medium">{{ __('messages.home.map_subtitle') }}</p>
      </div>

      <!-- マップ表示エリア（Leaflet Container） -->
      <div class="relative shadow-sm border border-gray-100 rounded-[20px] overflow-hidden">
        <div id="cebu-map"></div>
      </div>

      <!-- スポットカード一覧（横スクロール） -->
      <div class="space-y-2">
        <h3 class="text-xs font-bold text-slate-800 px-1">Featured Spots</h3>
        <div class="flex gap-3 overflow-x-auto no-scrollbar pb-2">
          @foreach($spots ?? [] as $spot)
            <div class="flex-shrink-0 w-44 bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
              <img src="{{ $spot['image'] }}" class="w-full h-24 object-cover" alt="{{ $spot['name'] }}">
              <div class="p-2.5 space-y-1">
                <h4 class="text-xs font-bold text-slate-800 truncate">{{ $spot['name'] }}</h4>
                <p class="text-[10px] text-gray-400 flex items-center gap-1 truncate">
                  <i class="fa-solid fa-location-arrow text-[9px] text-[#008080]"></i>
                  {{ $spot['location'] }}
                </p>
              </div>
            </div>
          @endforeach
        </div>
      </div>

    </div>

    <!-- 3. ボトムナビゲーション -->
    @include('components.bottom-nav')

  </div>

  <!-- 💡 マップの初期化＆マーカー描画スクリプト -->
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      // 1. セブ島中心座標（セブシティ付近: [10.3157, 123.8854]）でマップを初期化
      const map = L.map('cebu-map', {
        zoomControl: false // スマホ表示のため標準ズームボタンは非表示
      }).setView([10.1500, 123.8500], 9);

      // 2. OpenStreetMap のタイル（地図デザイン）を読み込み
      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
        attribution: '&copy; OpenStreetMap'
      }).addTo(map);

      // 3. PHP側から渡された $spots 配列を JS でパース
      const spots = @json($spots ?? []);

      // 4. カスタムピンアイコン定義
      const customIcon = L.divIcon({
        className: 'custom-pin',
        html: `<div class="w-7 h-7 bg-[#008080] text-white rounded-full flex items-center justify-center shadow-lg border-2 border-white"><i class="fa-solid fa-location-dot text-xs"></i></div>`,
        iconSize: [28, 28],
        iconAnchor: [14, 28]
      });

      // 5. スポットごとにマップ上へピンを立てる
      spots.forEach(spot => {
        const marker = L.marker([spot.lat, spot.lng], { icon: customIcon }).addTo(map);

        // ピンタップ時に表示されるカード風ポップアップ
        const popupContent = `
          <div class="w-40 text-left">
            <img src="${spot.image}" class="w-full h-20 object-cover">
            <div class="p-2">
              <p class="text-[11px] font-bold text-slate-800 leading-tight">${spot.name}</p>
              <p class="text-[9px] text-gray-400 mt-0.5">${spot.location}</p>
            </div>
          </div>
        `;

        marker.bindPopup(popupContent);
      });
    });
  </script>
</body>
</html> --}}



{{-- <!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CebuTra - Home</title>
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

  @php
    // クエリパラメータから現在選択中のマップ座標を取得（デフォルトはセブシティ）
    $currentLat = request()->query('lat', '10.3157');
    $currentLng = request()->query('lng', '123.8854');
    $currentZoom = request()->query('zoom', '10');
  @endphp

  <div class="w-full max-w-[412px] bg-[#FFFBF3] h-screen sm:h-[840px] shadow-2xl relative flex flex-col justify-between overflow-hidden sm:rounded-[40px]">
    
    <!-- ヘッダー -->
    <div class="bg-[#FFFBF3] pt-3 px-5 pb-2 z-20 flex-shrink-0 space-y-3">
      <div class="flex justify-between items-center text-xs font-semibold text-gray-800">
        <div>9:41</div>
        <div class="flex items-center space-x-1">
          <i class="fa-solid fa-signal text-[10px]"></i>
          <i class="fa-solid fa-water text-[10px]"></i>
          <i class="fa-solid fa-battery-three-quarters"></i>
        </div>
      </div>

      <div class="flex justify-between items-center">
        <div class="flex items-center space-x-2">
          <div class="w-10 h-10 bg-[#008080] rounded-xl flex items-center justify-center shadow-sm">
            <span class="text-white font-bold text-2xl">C</span>
          </div>
          <div>
            <h1 class="text-xl font-bold tracking-tight text-[#333] flex items-center">
              <span class="text-[#008080]">Cebu</span><span class="text-[#FF6347]">Tra</span>
            </h1>
            <p class="text-[10px] text-gray-400 font-bold tracking-wider -mt-1 uppercase">Cebu Travel</p>
          </div>
        </div>
        <a href="#" class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-sm border border-gray-100 relative">
          <i class="fa-regular fa-bell text-gray-700 text-lg"></i>
          <span class="absolute top-2 right-2.5 w-2 h-2 bg-[#FF6347] rounded-full"></span>
        </a>
      </div>
    </div>

    <!-- メインコンテンツ領域 -->
    <div class="flex-1 overflow-y-auto no-scrollbar p-5 pt-1 space-y-6 pb-28">
      
      <!-- お天気カード -->
      <div class="bg-gradient-to-br from-[#007A87] to-[#0193A1] text-white rounded-3xl p-5 shadow-md relative overflow-hidden">
        <p class="text-sm font-medium opacity-90">セブ島 · 今日</p>
        <div class="flex items-baseline mt-1">
          <span class="text-5xl font-bold tracking-tighter">32°</span>
          <span class="text-xl opacity-70 ml-1">/ 26°</span>
        </div>
        <p class="text-base font-medium mt-1">晴れ</p>
        
        <div class="flex space-x-4 mt-4 text-xs opacity-90">
          <span class="flex items-center gap-1"><i class="fa-solid fa-droplet text-[10px]"></i> 湿度 78%</span>
          <span class="flex items-center gap-1"><i class="fa-solid fa-wind text-[10px]"></i> 風 12km/h</span>
          <span class="flex items-center gap-1"><i class="fa-solid fa-wave-square text-[10px]"></i> 波高 0.5m</span>
        </div>

        <div class="absolute right-6 top-6 text-6xl text-[#FFB03A] drop-shadow-md">
          <i class="fa-solid fa-sun"></i>
        </div>
      </div>

      <!-- 5日間予報 -->
      <div class="flex space-x-3 overflow-x-auto no-scrollbar py-1 flex-shrink-0">
        <div class="min-w-[56px] bg-white rounded-2xl p-2 text-center shadow-sm flex flex-col items-center justify-between border border-[#008080]/30">
          <p class="text-[11px] text-[#008080] font-bold">今日</p>
          <i class="fa-solid fa-sun text-[#FFB03A] my-2 text-lg"></i>
          <p class="text-sm font-bold text-gray-800">32°</p>
          <p class="text-[10px] text-gray-400">26°</p>
          <p class="text-[10px] text-[#3B82F6] font-medium mt-1"><i class="fa-solid fa-cloud-rain text-[8px]"></i> 5%</p>
        </div>
        <div class="min-w-[56px] bg-white rounded-2xl p-2 text-center shadow-sm flex flex-col items-center justify-between">
          <p class="text-[11px] text-gray-500 font-medium">明日</p>
          <i class="fa-solid fa-cloud-sun text-[#FFB03A] my-2 text-lg"></i>
          <p class="text-sm font-bold text-gray-800">31°</p>
          <p class="text-[10px] text-gray-400">25°</p>
          <p class="text-[10px] text-[#3B82F6] font-medium mt-1"><i class="fa-solid fa-cloud-rain text-[8px]"></i> 10%</p>
        </div>
        <div class="min-w-[56px] bg-white rounded-2xl p-2 text-center shadow-sm flex flex-col items-center justify-between">
          <p class="text-[11px] text-gray-500 font-medium">水</p>
          <i class="fa-solid fa-cloud-sun-rain text-amber-500 my-2 text-lg"></i>
          <p class="text-sm font-bold text-gray-800">29°</p>
          <p class="text-[10px] text-gray-400">25°</p>
          <p class="text-[10px] text-[#3B82F6] font-medium mt-1"><i class="fa-solid fa-cloud-rain text-[8px]"></i> 30%</p>
        </div>
        <div class="min-w-[56px] bg-white rounded-2xl p-2 text-center shadow-sm flex flex-col items-center justify-between">
          <p class="text-[11px] text-gray-500 font-medium">木</p>
          <i class="fa-solid fa-cloud-showers-heavy text-blue-400 my-2 text-lg"></i>
          <p class="text-sm font-bold text-gray-800">27°</p>
          <p class="text-[10px] text-gray-400">24°</p>
          <p class="text-[10px] text-[#3B82F6] font-medium mt-1"><i class="fa-solid fa-cloud-rain text-[8px]"></i> 80%</p>
        </div>
        <div class="min-w-[56px] bg-white rounded-2xl p-2 text-center shadow-sm flex flex-col items-center justify-between">
          <p class="text-[11px] text-gray-500 font-medium">金</p>
          <i class="fa-solid fa-cloud-rain text-blue-400 my-2 text-lg"></i>
          <p class="text-sm font-bold text-gray-800">28°</p>
          <p class="text-[10px] text-gray-400">24°</p>
          <p class="text-[10px] text-[#3B82F6] font-medium mt-1"><i class="fa-solid fa-cloud-rain text-[8px]"></i> 50%</p>
        </div>
      </div>

      <!-- スポットマップ -->
      <div class="space-y-3">
        <div class="flex justify-between items-center px-1">
          <h2 class="text-lg font-bold text-[#2C3E50]">{{ __('messages.home.spot_map') }}</h2>
          <span class="text-xs text-gray-400 flex items-center gap-1"><i class="fa-solid fa-location-dot"></i> {{ __('messages.home.cebu') }}</span>
        </div>
        
        <!-- 💡 JSを使わないため、クエリパラメータつきのリンク（aタグ）で座標とズームを切り替えます -->
        <div class="flex space-x-2 overflow-x-auto no-scrollbar py-1">
          <a href="?lat=10.3168&lng=123.9911&zoom=12" class="flex items-center gap-1 bg-white px-4 py-2 rounded-full text-xs font-bold text-gray-700 shadow-sm border {{ $currentLat == '10.3168' ? 'border-[#008080] text-[#008080]' : 'border-gray-100' }} whitespace-nowrap">
            🏖️ マクタン島
          </a>
          <a href="?lat=10.3157&lng=123.8854&zoom=12" class="flex items-center gap-1 bg-white px-4 py-2 rounded-full text-xs font-bold text-gray-700 shadow-sm border {{ $currentLat == '10.3157' ? 'border-[#008080] text-[#008080]' : 'border-gray-100' }} whitespace-nowrap">
            🏙️ セブシティ
          </a>
          <a href="?lat=11.1620&lng=123.7319&zoom=11" class="flex items-center gap-1 bg-white px-4 py-2 rounded-full text-xs font-bold text-gray-700 shadow-sm border {{ $currentLat == '11.1620' ? 'border-[#008080] text-[#008080]' : 'border-gray-100' }} whitespace-nowrap">
            🌴 バンタヤン島
          </a>
        </div>

        <div id="map" class="w-full h-52 rounded-2xl shadow-inner border border-gray-100 overflow-hidden z-10">
          @if(env('GOOGLE_MAPS_API_KEY'))
            <!-- Google Maps APIキーが設定されている場合は、セキュアな埋め込みマップをインクルードします -->
            <iframe 
              class="w-full h-full border-0"
              loading="lazy"
              allowfullscreen
              src="https://www.google.com/maps/embed/v1/view?key={{ env('GOOGLE_MAPS_API_KEY') }}&center={{ $currentLat }},{{ $currentLng }}&zoom={{ $currentZoom }}">
            </iframe>
          @else
            <!-- 未設定の場合のプレースホルダー -->
            <div class="w-full h-full bg-gray-200 flex flex-col items-center justify-center text-gray-500 p-4 text-center text-xs">
              <i class="fa-solid fa-map-marked-alt text-3xl mb-2 text-gray-400"></i>
              <p class="font-bold">Google Maps を読み込み中...</p>
              <p class="opacity-75 mt-1">※.envに GOOGLE_MAPS_API_KEY を設定するとマップが有効になります</p>
              <p class="text-[10px] text-gray-400 mt-2">表示中の座標: {{ $currentLat }}, {{ $currentLng }}</p>
            </div>
          @endif
        </div>
      </div>

      <!-- 旅行スケジュール -->
      <div class="space-y-3">
        <div class="flex justify-between items-center px-1">
          <h2 class="text-lg font-bold text-[#2C3E50]">{{ __('messages.home.upcoming_trips') }}</h2>
          <span class="bg-[#E0F2F1] text-[#008080] text-xs font-bold px-2.5 py-0.5 rounded-full">2</span>
        </div>

        <!-- 💡 aタグで画面遷移用のリンクに変更 -->
        <a href="#" class="block bg-gradient-to-r from-[#14939B] to-[#0D7880] text-white p-4 rounded-2xl shadow-sm relative flex items-center justify-between active:scale-[0.99] transition-transform">
          <div class="space-y-1">
            <span class="text-[10px] opacity-75 block font-medium">In 6 days</span>
            <h3 class="text-base font-bold">スミロン島 日帰りトリップ</h3>
            <div class="flex items-center space-x-3 text-[11px] opacity-90 pt-1">
              <span><i class="fa-regular fa-calendar text-[10px]"></i> 6月28日 (土)</span>
              <span><i class="fa-solid fa-users text-[10px]"></i> 5/6名</span>
              <span><i class="fa-solid fa-location-dot text-[10px]"></i> スミロン島</span>
            </div>
          </div>
          <div class="flex items-center space-x-2">
            <div class="w-8 h-8 bg-white/10 rounded-full flex items-center justify-center">
              <i class="fa-solid fa-anchor text-sm"></i>
            </div>
            <i class="fa-solid fa-chevron-right text-xs opacity-70"></i>
          </div>
        </a>

        <a href="#" class="block bg-gradient-to-r from-[#14939B] to-[#0D7880] text-white p-4 rounded-2xl shadow-sm relative flex items-center justify-between active:scale-[0.99] transition-transform">
          <div class="space-y-1">
            <span class="text-[10px] opacity-75 block font-medium">In 13 days</span>
            <h3 class="text-base font-bold">バンタヤン島 週末旅</h3>
            <div class="flex items-center space-x-3 text-[11px] opacity-90 pt-1">
              <span><i class="fa-regular fa-calendar text-[10px]"></i> 7月5日 (土)</span>
              <span><i class="fa-solid fa-users text-[10px]"></i> 3/4名</span>
              <span><i class="fa-solid fa-location-dot text-[10px]"></i> バンタヤン島</span>
            </div>
          </div>
          <div class="flex items-center space-x-2">
            <div class="w-8 h-8 bg-white/10 rounded-full flex items-center justify-center">
              <i class="fa-solid fa-anchor text-sm"></i>
            </div>
            <i class="fa-solid fa-chevron-right text-xs opacity-70"></i>
          </div>
        </a>
      </div>

      <!-- 自分が募集している旅 -->
      <div class="space-y-3">
        <div class="flex justify-between items-center px-1">
          <h2 class="text-lg font-bold text-[#2C3E50]">{{ __('messages.home.posted_trips') }}</h2>
          <a href="#" class="text-xs text-[#008080] font-bold">{{ __('messages.home.new_post') }} <i class="fa-solid fa-chevron-right text-[10px]"></i></a>
        </div>
        <div class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100 flex justify-between items-center opacity-95">
          <h3 class="text-sm font-bold text-gray-800">オスロブ ジンベエザメ体験</h3>
          <span class="bg-[#FFF3CD] text-[#856404] text-[11px] font-bold px-2.5 py-0.5 rounded-full">{{ __('messages.home.open') }}</span>
        </div>
      </div>

    </div>

    <!-- フッターナビゲーション (すべてBladeでルートに繋げられるリンクに再構築) -->
    @include('components.bottom-nav')
    {{-- <div class="absolute bottom-0 left-0 right-0 bg-white border-t border-gray-100 px-4 py-2 flex justify-between items-center sm:rounded-b-[40px] shadow-[0_-4px_12px_rgba(0,0,0,0.04)] z-30 flex-shrink-0">
      
      <a href="{{ route('home') }}" class="flex flex-col items-center justify-center w-14 py-1 text-[#008080]">
        <i class="fa-solid fa-house text-lg"></i>
        <span class="text-[10px] font-bold mt-0.5">ホーム</span>
      </a>

      <a href="#" class="flex flex-col items-center justify-center w-14 py-1 text-gray-400 hover:text-gray-600">
        <i class="fa-solid fa-magnifying-glass text-lg"></i>
        <span class="text-[10px] font-medium mt-0.5">探す</span>
      </a>

      <div class="relative -top-5 flex flex-col items-center">
        <a href="#" class="w-14 h-14 bg-[#FF6347] rounded-full flex items-center justify-center text-white shadow-lg shadow-orange-500/30 border-4 border-white transition-transform active:scale-95">
          <i class="fa-solid fa-plus text-xl"></i>
        </a>
        <span class="text-[10px] text-[#FF6347] font-bold mt-1">募集</span>
      </div>

      <a href="#" class="flex flex-col items-center justify-center w-14 py-1 text-gray-400 hover:text-gray-600">
        <i class="fa-solid fa-map text-lg"></i>
        <span class="text-[10px] font-medium mt-0.5">旅程</span>
      </a>

      <a href="{{ route('profile') }}" class="flex flex-col items-center justify-center w-14 py-1 text-gray-400 hover:text-gray-600">
        <i class="fa-regular fa-user text-lg"></i>
        <span class="text-[10px] font-medium mt-0.5">プロフィール</span>
      </a>

    </div> --}}

  </div>

</body>
</html>


{{-- @extends('layouts.mobile')

@section('title', 'CebuTra - Home')

@section('main-class', 'flex-1 overflow-y-auto no-scrollbar p-5 pt-1 space-y-6 pb-28')

@section('header')
<div class="bg-[#FFFBF3] pt-10 px-5 pb-2 z-20 flex-shrink-0">
  <div class="flex justify-between items-center">
    <div class="flex items-center space-x-2">
      <div class="w-10 h-10 bg-[#008080] rounded-xl flex items-center justify-center shadow-sm">
        <span class="text-white font-bold text-2xl">C</span>
      </div>
      <div>
        <h1 class="text-xl font-bold tracking-tight text-[#333] flex items-center">
          <span class="text-[#008080]">Cebu</span><span class="text-[#FF6347]">Tra</span>
        </h1>
        <p class="text-[10px] text-gray-400 font-bold tracking-wider -mt-1 uppercase">Cebu Travel</p>
      </div>
    </div>
    <button class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-sm border border-gray-100 relative">
      <i class="fa-regular fa-bell text-gray-700 text-lg"></i>
      <span class="absolute top-2 right-2.5 w-2 h-2 bg-[#FF6347] rounded-full"></span>
    </button>
  </div>
</div>
@endsection

@section('content')
   <div class="flex-1 overflow-y-auto no-scrollbar p-5 pt-1 space-y-6 pb-28">
      
      <!-- 💡 今日のメイン天気カード（動的 API ＆ 3言語対応） -->
      @php $todayWeather = $forecasts[0] ?? null; @endphp
      @if($todayWeather)
        <div class="bg-gradient-to-br from-[#007A87] to-[#0193A1] text-white rounded-3xl p-5 shadow-md relative overflow-hidden">
          <p class="text-sm font-medium opacity-90">{{ __('messages.home.cebu_today') }}</p>
          <div class="flex items-baseline mt-1">
            <span class="text-5xl font-bold tracking-tighter">{{ $todayWeather['temp_max'] }}°</span>
            <span class="text-xl opacity-70 ml-1">/ {{ $todayWeather['temp_min'] }}°</span>
          </div>
          <p class="text-base font-medium mt-1">{{ __($todayWeather['condition']['key']) }}</p>
          
          <div class="flex space-x-4 mt-4 text-xs opacity-90">
            <span class="flex items-center gap-1"><i class="fa-solid fa-droplet text-[10px]"></i> {{ __('messages.home.humidity') }} 78%</span>
            <span class="flex items-center gap-1"><i class="fa-solid fa-wind text-[10px]"></i> {{ __('messages.home.wind') }} 12km/h</span>
            <span class="flex items-center gap-1"><i class="fa-solid fa-wave-square text-[10px]"></i> {{ __('messages.home.wave') }} 0.5m</span>
          </div>

          <div class="absolute right-6 top-6 text-6xl text-[#FFB03A] drop-shadow-md">
            <i class="fa-solid {{ $todayWeather['condition']['icon'] }}"></i>
          </div>
        </div>
      @endif

      <!-- 💡 週間予報リスト（3言語対応） -->
      <div class="flex space-x-3 overflow-x-auto no-scrollbar py-1 flex-shrink-0">
        @foreach($forecasts ?? [] as $forecast)
          <div class="min-w-[56px] bg-white rounded-2xl p-2 text-center shadow-sm flex flex-col items-center justify-between {{ $forecast['is_today'] ? 'border border-[#008080]/30' : '' }}">
            <p class="text-[11px] {{ $forecast['is_today'] ? 'text-[#008080] font-bold' : 'text-gray-500 font-medium' }}">
              {{ $forecast['is_today'] ? __('messages.home.today') : $forecast['day_name'] }}
            </p>
            <i class="fa-solid {{ $forecast['condition']['icon'] }} my-2 text-lg"></i>
            <p class="text-sm font-bold text-gray-800">{{ $forecast['temp_max'] }}°</p>
            <p class="text-[10px] text-gray-400">{{ $forecast['temp_min'] }}°</p>
            <p class="text-[10px] text-[#3B82F6] font-medium mt-1">
              <i class="fa-solid fa-cloud-rain text-[8px]"></i> {{ $forecast['pop'] }}%
            </p>
          </div>
        @endforeach
      </div>

      <!-- 💡 スポットマップエリア -->
  <div class="space-y-3">
    <div class="flex justify-between items-center px-1">
      <h2 class="text-lg font-bold text-[#2C3E50]">{{ __('messages.home.spot_map') }}</h2>
      <span class="text-xs text-gray-400 flex items-center gap-1"><i class="fa-solid fa-location-dot"></i> Philippines</span>
    </div>
  
      <!-- 💡 横スクロール対応 エリア切り替えボタン（全16スポット） -->
    <div class="flex space-x-2 overflow-x-auto no-scrollbar py-1">
      <!-- セブ島近郊・主要スポット -->
      <button type="button" onclick="zoomToLocation(10.3168, 123.9911, 12)" class="flex items-center gap-1 bg-white px-3.5 py-1.5 rounded-full text-xs font-bold text-gray-700 shadow-sm border border-gray-100 whitespace-nowrap active:scale-95 transition-transform">
        {{ __('messages.home.spots.mactan') }}
      </button>
      <button type="button" onclick="zoomToLocation(10.3157, 123.8854, 12)" class="flex items-center gap-1 bg-white px-3.5 py-1.5 rounded-full text-xs font-bold text-gray-700 shadow-sm border border-gray-100 whitespace-nowrap active:scale-95 transition-transform">
        {{ __('messages.home.spots.cebu_city') }}
      </button>
      <button type="button" onclick="zoomToLocation(10.2683, 124.0608, 12)" class="flex items-center gap-1 bg-white px-3.5 py-1.5 rounded-full text-xs font-bold text-gray-700 shadow-sm border border-gray-100 whitespace-nowrap active:scale-95 transition-transform">
        {{ __('messages.home.spots.olango') }}
      </button>
      <button type="button" onclick="zoomToLocation(10.6811, 124.3411, 11)" class="flex items-center gap-1 bg-white px-3.5 py-1.5 rounded-full text-xs font-bold text-gray-700 shadow-sm border border-gray-100 whitespace-nowrap active:scale-95 transition-transform">
        {{ __('messages.home.spots.camotes') }}
      </button>
      <button type="button" onclick="zoomToLocation(10.5517, 123.9142, 12)" class="flex items-center gap-1 bg-white px-3.5 py-1.5 rounded-full text-xs font-bold text-gray-700 shadow-sm border border-gray-100 whitespace-nowrap active:scale-95 transition-transform">
        {{ __('messages.home.spots.cebu_safari') }}
      </button>
      <button type="button" onclick="zoomToLocation(9.9397, 123.3992, 12)" class="flex items-center gap-1 bg-white px-3.5 py-1.5 rounded-full text-xs font-bold text-gray-700 shadow-sm border border-gray-100 whitespace-nowrap active:scale-95 transition-transform">
        {{ __('messages.home.spots.moalboal') }}
      </button>
      <button type="button" onclick="zoomToLocation(9.8048, 123.3742, 13)" class="flex items-center gap-1 bg-white px-3.5 py-1.5 rounded-full text-xs font-bold text-gray-700 shadow-sm border border-gray-100 whitespace-nowrap active:scale-95 transition-transform">
        {{ __('messages.home.spots.kawasan') }}
      </button>
      <button type="button" onclick="zoomToLocation(9.4812, 123.3644, 13)" class="flex items-center gap-1 bg-white px-3.5 py-1.5 rounded-full text-xs font-bold text-gray-700 shadow-sm border border-gray-100 whitespace-nowrap active:scale-95 transition-transform">
        {{ __('messages.home.spots.tumalog') }}
      </button>
      <button type="button" onclick="zoomToLocation(9.4623, 123.3800, 12)" class="flex items-center gap-1 bg-white px-3.5 py-1.5 rounded-full text-xs font-bold text-gray-700 shadow-sm border border-gray-100 whitespace-nowrap active:scale-95 transition-transform">
        {{ __('messages.home.spots.oslob') }}
      </button>

      <!-- 周辺の島々 -->
      <button type="button" onclick="zoomToLocation(9.4310, 123.3931, 13)" class="flex items-center gap-1 bg-white px-3.5 py-1.5 rounded-full text-xs font-bold text-gray-700 shadow-sm border border-gray-100 whitespace-nowrap active:scale-95 transition-transform">
        {{ __('messages.home.spots.sumilon') }}
      </button>
      <button type="button" onclick="zoomToLocation(11.1620, 123.7319, 11)" class="flex items-center gap-1 bg-white px-3.5 py-1.5 rounded-full text-xs font-bold text-gray-700 shadow-sm border border-gray-100 whitespace-nowrap active:scale-95 transition-transform">
        {{ __('messages.home.spots.bantayan') }}
      </button>
      <button type="button" onclick="zoomToLocation(9.8500, 124.1435, 10)" class="flex items-center gap-1 bg-white px-3.5 py-1.5 rounded-full text-xs font-bold text-gray-700 shadow-sm border border-gray-100 whitespace-nowrap active:scale-95 transition-transform">
        {{ __('messages.home.spots.bohol') }}
      </button>
      <button type="button" onclick="zoomToLocation(9.1891, 123.5859, 11)" class="flex items-center gap-1 bg-white px-3.5 py-1.5 rounded-full text-xs font-bold text-gray-700 shadow-sm border border-gray-100 whitespace-nowrap active:scale-95 transition-transform">
        {{ __('messages.home.spots.siquijor') }}
      </button>

      <!-- 遠方の人気リゾート -->
      <button type="button" onclick="zoomToLocation(11.9674, 121.9248, 11)" class="flex items-center gap-1 bg-white px-3.5 py-1.5 rounded-full text-xs font-bold text-gray-700 shadow-sm border border-gray-100 whitespace-nowrap active:scale-95 transition-transform">
        {{ __('messages.home.spots.boracay') }}
      </button>
      <button type="button" onclick="zoomToLocation(9.8349, 126.0494, 10)" class="flex items-center gap-1 bg-white px-3.5 py-1.5 rounded-full text-xs font-bold text-gray-700 shadow-sm border border-gray-100 whitespace-nowrap active:scale-95 transition-transform">
        {{ __('messages.home.spots.siargao') }}
      </button>
      <button type="button" onclick="zoomToLocation(9.8349, 118.7384, 8)" class="flex items-center gap-1 bg-white px-3.5 py-1.5 rounded-full text-xs font-bold text-gray-700 shadow-sm border border-gray-100 whitespace-nowrap active:scale-95 transition-transform">
        {{ __('messages.home.spots.palawan') }}
      </button>
    </div>

    <!-- 地図領域 -->
    <div id="map" class="w-full h-52 rounded-2xl shadow-inner border border-gray-100 overflow-hidden z-10"></div>
  </div>

      <!-- 参加予定の旅 -->
      <div class="space-y-3">
        <div class="flex justify-between items-center px-1">
          <h2 class="text-lg font-bold text-[#2C3E50]">{{ __('messages.home.upcoming_trips') }}</h2>
          <span class="bg-[#E0F2F1] text-[#008080] text-xs font-bold px-2.5 py-0.5 rounded-full">2</span>
        </div>

        <div class="bg-gradient-to-r from-[#14939B] to-[#0D7880] text-white p-4 rounded-2xl shadow-sm relative flex items-center justify-between cursor-pointer">
          <div class="space-y-1">
            <span class="text-[10px] opacity-75 block font-medium">{{ __('messages.home.in_days', ['days' => 6]) }}</span>
            <h3 class="text-base font-bold">スミロン島 日帰りトリップ</h3>
            <div class="flex items-center space-x-3 text-[11px] opacity-90 pt-1">
              <span><i class="fa-regular fa-calendar text-[10px]"></i> 6月28日 (土)</span>
              <span><i class="fa-solid fa-users text-[10px]"></i> {{ __('messages.home.members', ['current' => 5, 'max' => 6]) }}</span>
              <span><i class="fa-solid fa-location-dot text-[10px]"></i> スミロン島</span>
            </div>
          </div>
          <div class="flex items-center space-x-2">
            <div class="w-8 h-8 bg-white/10 rounded-full flex items-center justify-center">
              <i class="fa-solid fa-anchor text-sm"></i>
            </div>
            <i class="fa-solid fa-chevron-right text-xs opacity-70"></i>
          </div>
        </div>

        <div class="bg-gradient-to-r from-[#14939B] to-[#0D7880] text-white p-4 rounded-2xl shadow-sm relative flex items-center justify-between cursor-pointer">
          <div class="space-y-1">
            <span class="text-[10px] opacity-75 block font-medium">{{ __('messages.home.in_days', ['days' => 13]) }}</span>
            <h3 class="text-base font-bold">バンタヤン島 週末旅</h3>
            <div class="flex items-center space-x-3 text-[11px] opacity-90 pt-1">
              <span><i class="fa-regular fa-calendar text-[10px]"></i> 7月5日 (土)</span>
              <span><i class="fa-solid fa-users text-[10px]"></i> {{ __('messages.home.members', ['current' => 3, 'max' => 4]) }}</span>
              <span><i class="fa-solid fa-location-dot text-[10px]"></i> バンタヤン島</span>
            </div>
          </div>
          <div class="flex items-center space-x-2">
            <div class="w-8 h-8 bg-[#ffffff1a] rounded-full flex items-center justify-center">
              <i class="fa-solid fa-anchor text-sm"></i>
            </div>
            <i class="fa-solid fa-chevron-right text-xs opacity-70"></i>
          </div>
        </div>
      </div>

      <!-- 募集中の旅 -->
      <div class="space-y-3">
        <div class="flex justify-between items-center px-1">
          <h2 class="text-lg font-bold text-[#2C3E50]">{{ __('messages.home.my_posted_trips') }}</h2>
          <a href="#" class="text-xs text-[#008080] font-bold">{{ __('messages.home.new_post') }} <i class="fa-solid fa-chevron-right text-[10px]"></i></a>
        </div>
        <div class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100 flex justify-between items-center opacity-95">
          <h3 class="text-sm font-bold text-gray-800">オスロブ ジンベエザメ体験</h3>
          <span class="bg-[#FFF3CD] text-[#856404] text-[11px] font-bold px-2.5 py-0.5 rounded-full">{{ __('messages.home.status_open') }}</span>
        </div>
      </div>

    </div>
{{-- @endsection --}}

{{-- @section('scripts') --}}
{{-- <script>
  let map;

  document.addEventListener("DOMContentLoaded", function() {
    // 全16スポットの位置情報とアイコン設定
    const locations = [
      { title: "{{ __('messages.home.spots.cebu_city') }}",   lat: 10.3157, lng: 123.8854 },
      { title: "{{ __('messages.home.spots.mactan') }}",      lat: 10.3168, lng: 123.9911 },
      { title: "{{ __('messages.home.spots.olango') }}",      lat: 10.2683, lng: 124.0608 },
      { title: "{{ __('messages.home.spots.camotes') }}",     lat: 10.6811, lng: 124.3411 },
      { title: "{{ __('messages.home.spots.cebu_safari') }}", lat: 10.5517, lng: 123.9142 },
      { title: "{{ __('messages.home.spots.moalboal') }}",    lat: 9.9397,  lng: 123.3992 },
      { title: "{{ __('messages.home.spots.kawasan') }}",     lat: 9.8048,  lng: 123.3742 },
      { title: "{{ __('messages.home.spots.tumalog') }}",     lat: 9.4812,  lng: 123.3644 },
      { title: "{{ __('messages.home.spots.oslob') }}",       lat: 9.4623,  lng: 123.3800 },
      { title: "{{ __('messages.home.spots.sumilon') }}",     lat: 9.4310,  lng: 123.3931 },
      { title: "{{ __('messages.home.spots.bantayan') }}",    lat: 11.1620, lng: 123.7319 },
      { title: "{{ __('messages.home.spots.bohol') }}",       lat: 9.8500,  lng: 124.1435 },
      { title: "{{ __('messages.home.spots.siquijor') }}",    lat: 9.1891,  lng: 123.5859 },
      { title: "{{ __('messages.home.spots.boracay') }}",     lat: 11.9674, lng: 121.9248 },
      { title: "{{ __('messages.home.spots.siargao') }}",     lat: 9.8349,  lng: 126.0494 },
      { title: "{{ __('messages.home.spots.palawan') }}",     lat: 9.8349,  lng: 118.7384 },
    ];

    // 地図の初期化（セブシティ中心）
    map = L.map('map', { zoomControl: false }).setView([10.3157, 123.8854], 9);

    // OpenStreetMap タイル読み込み
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 18,
      attribution: '&copy; OpenStreetMap'
    }).addTo(map);

    // カスタムピンの生成と配置
    locations.forEach(loc => {
      const customIcon = L.divIcon({
        className: 'custom-pin',
        html: `<div class="w-7 h-7 bg-[#008080] text-white rounded-full flex items-center justify-center shadow-lg border-2 border-white transition-transform hover:scale-110">
                 <i class="fa-solid fa-location-dot text-xs"></i>
               </div>`,
        iconSize: [28, 28],
        iconAnchor: [14, 28]
      });

      L.marker([loc.lat, loc.lng], { icon: customIcon })
       .addTo(map)
       .bindPopup(`<div class="p-1.5 text-center font-bold text-slate-800">${loc.title}</div>`);
    });
  });

  // カメラアニメーション移動
  function zoomToLocation(lat, lng, zoomLevel) {
    if (map) {
      map.flyTo([lat, lng], zoomLevel, {
        duration: 1.5,
        easeLinearity: 0.25
      });
    }
  }
</script>
@endsection
 --}}

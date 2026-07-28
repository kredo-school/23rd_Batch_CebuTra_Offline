@extends('layouts.mobile')

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
@endsection

@section('scripts')
<script>
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

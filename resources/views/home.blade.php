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
<!-- Weather Forecast Widget -->
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
</div>
@endsection

@section('scripts')
<script>
  let map;
  const locations = [
    { title: "セブシティ", lat: 10.3157, lng: 123.8854 },
    { title: "マクタン島", lat: 10.3168, lng: 123.9911 },
    { title: "バンタヤン島", lat: 11.1620, lng: 123.7319 },
    { title: "スミロン島", lat: 9.4310, lng: 123.3931 }
  ];

  function initMap() {
    const centerLatLng = { lat: 10.3157, lng: 123.8854 }; 
    map = new google.maps.Map(document.getElementById("map"), {
      zoom: 10,
      center: centerLatLng,
      mapTypeControl: false,
      streetViewControl: false,
      fullscreenControl: false
    });

    locations.forEach(loc => {
      const marker = new google.maps.Marker({
        position: { lat: loc.lat, lng: loc.lng },
        map: map,
        title: loc.title,
        animation: google.maps.Animation.DROP
      });
      const infoWindow = new google.maps.InfoWindow({
        content: `<div style="color:#333; font-size:12px; font-weight:bold; padding:2px;">${loc.title}</div>`
      });
      marker.addListener("click", () => { infoWindow.open(map, marker); });
    });
  }

  function zoomToLocation(lat, lng, zoomLevel) {
    if (map) {
      map.panTo({ lat: lat, lng: lng });
      map.setZoom(zoomLevel);
    }
  }
</script>
@endsection

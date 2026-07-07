<!DOCTYPE html>
<html lang="en">
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

  <div class="w-full max-w-[412px] bg-[#FFFBF3] h-screen sm:h-[840px] shadow-2xl relative flex flex-col justify-between overflow-hidden sm:rounded-[40px]">
    
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

    <div class="flex-1 overflow-y-auto no-scrollbar p-5 pt-1 space-y-6 pb-28">
      
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

      <div class="space-y-3">
        <div class="flex justify-between items-center px-1">
          <h2 class="text-lg font-bold text-[#2C3E50]">Spot Map</h2>
          <span class="text-xs text-gray-400 flex items-center gap-1"><i class="fa-solid fa-location-dot"></i> Cebu</span>
        </div>
        
        <div class="flex space-x-2 overflow-x-auto no-scrollbar py-1">
          <button onclick="zoomToLocation(10.3168, 123.9911, 12)" class="flex items-center gap-1 bg-white px-4 py-2 rounded-full text-xs font-bold text-gray-700 shadow-sm border border-gray-100 whitespace-nowrap">
            🏖️ マクタン島
          </button>
          <button onclick="zoomToLocation(10.3157, 123.8854, 12)" class="flex items-center gap-1 bg-white px-4 py-2 rounded-full text-xs font-bold text-gray-700 shadow-sm border border-gray-100 whitespace-nowrap">
            🏙️ セブシティ
          </button>
          <button onclick="zoomToLocation(11.1620, 123.7319, 11)" class="flex items-center gap-1 bg-white px-4 py-2 rounded-full text-xs font-bold text-gray-700 shadow-sm border border-gray-100 whitespace-nowrap">
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

    <div class="absolute bottom-0 left-0 right-0 bg-white border-t border-gray-100 px-4 py-2 flex justify-between items-center sm:rounded-b-[40px] shadow-[0_-4px_12px_rgba(0,0,0,0.04)] z-30 flex-shrink-0">
      
      <button class="flex flex-col items-center justify-center w-14 py-1 text-[#008080]">
        <i class="fa-solid fa-house text-lg"></i>
        <span class="text-[10px] font-bold mt-0.5">ホーム</span>
      </button>

      <button class="flex flex-col items-center justify-center w-14 py-1 text-gray-400 hover:text-gray-600">
        <i class="fa-solid fa-magnifying-glass text-lg"></i>
        <span class="text-[10px] font-medium mt-0.5">探す</span>
      </button>

      <div class="relative -top-5 flex flex-col items-center">
        <button class="w-14 h-14 bg-[#FF6347] rounded-full flex items-center justify-center text-white shadow-lg shadow-orange-500/30 border-4 border-white transition-transform active:scale-95">
          <i class="fa-solid fa-plus text-xl"></i>
        </button>
        <span class="text-[10px] text-[#FF6347] font-bold mt-1">募集</span>
      </div>

      <button class="flex flex-col items-center justify-center w-14 py-1 text-gray-400 hover:text-gray-600">
        <i class="fa-solid fa-map text-lg"></i>
        <span class="text-[10px] font-medium mt-0.5">旅程</span>
      </button>

      <button class="flex flex-col items-center justify-center w-14 py-1 text-gray-400 hover:text-gray-600">
        <i class="fa-regular fa-user text-lg"></i>
        <span class="text-[10px] font-medium mt-0.5">プロフィール</span>
      </button>

    </div>

  </div>

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
  </body>
</html>
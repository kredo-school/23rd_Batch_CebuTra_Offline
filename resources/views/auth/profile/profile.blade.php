@extends('layouts.mobile')

@section('title', 'CebuTra - Profile')

@section('main-class', 'flex-1 overflow-y-auto no-scrollbar p-5 space-y-6 pb-28')

@section('header')
<div class="bg-white pt-10 pb-4 px-4 border-b border-gray-100 z-20 flex-shrink-0 relative">
  <div class="text-center mt-2">
    <h1 class="text-base font-bold text-gray-800">My Profile</h1>
  </div>
</div>
@endsection

@section('content')
<!-- Basic Profile Information -->
<div class="bg-white rounded-3xl p-5 shadow-sm border border-gray-100/50 flex flex-col items-center text-center space-y-4">
  <div class="relative">
    <div class="w-20 h-20 bg-[#2E9AA4] rounded-3xl flex items-center justify-center border-4 border-[#FFFBF3] shadow-md text-4xl">🌺</div>
    <div class="absolute -bottom-1 -right-1 bg-amber-500 text-white w-5 h-5 rounded-lg flex items-center justify-center border border-white text-[9px]"><i class="fa-solid fa-clock"></i></div>
  </div>
  <div class="space-y-1">
    <h2 class="text-lg font-bold text-gray-800">{{ $user->name }}</h2>
    <p class="text-xs text-gray-400 font-bold tracking-wide uppercase">
      {{ $user->age ?? 22 }}, {{ $user->gender ?? 'Female' }} • {{ $user->nationality ?? 'Japan' }}
    </p>
  </div>
  <a href="{{ route('profile.edit') }}" class="w-full bg-[#008080]/5 hover:bg-[#008080]/10 text-[#008080] font-bold py-2.5 px-4 rounded-xl text-xs transition-all flex items-center justify-center gap-1.5 border border-[#008080]/10 cursor-pointer">
    <i class="fa-regular fa-pen-to-square"></i> Edit Profile
  </a>
  <p class="text-xs text-gray-600 leading-relaxed pt-2 border-t border-gray-50 w-full text-left font-medium">
    {{ $user->bio }}
  </p>
</div>

<!-- Study & Stay Info Section -->
<div class="space-y-2">
  <h3 class="text-[11px] font-bold text-slate-400 tracking-wider uppercase px-1">Study & Stay Info</h3>
  <div class="bg-white rounded-[24px] p-5 shadow-sm border border-gray-100/50 space-y-4 text-xs">
    <div class="flex justify-between items-center">
      <span class="text-slate-400 font-semibold">School</span>
      <span class="text-slate-800 font-bold">{{ $user->school }}</span>
    </div>
    <div class="flex justify-between items-center">
      <span class="text-slate-400 font-semibold">English Level</span>
      <span class="text-[#008080] bg-teal-50/60 px-2.5 py-1 rounded-lg font-bold text-[11px]">{{ $user->english_level }}</span>
    </div>
    <div class="flex justify-between items-center">
      <span class="text-slate-400 font-semibold">Current Area</span>
      <span class="text-slate-800 font-bold">{{ $user->current_area }}</span>
    </div>
  </div>
</div>

<!-- Connected Links (Instagram) -->
@if(!empty($user->instagram))
<div class="space-y-2">
  <h3 class="text-[11px] font-bold text-slate-400 tracking-wider uppercase px-1">Connected Links</h3>
  <a href="https://instagram.com/{{ $user->instagram }}" target="_blank" class="bg-white hover:bg-gray-50/50 border border-gray-100/50 rounded-2xl p-4 flex items-center justify-between shadow-sm transition-all cursor-pointer">
    <div class="flex items-center gap-3">
      <div class="w-8 h-8 rounded-xl bg-gradient-to-tr from-yellow-500 via-pink-500 to-purple-600 text-white flex items-center justify-center text-sm flex-shrink-0">
        <i class="fa-brands fa-instagram"></i>
      </div>
      <div class="flex flex-col">
        <span class="text-[9px] text-gray-400 font-bold uppercase tracking-wider">Instagram</span>
        <span class="text-xs font-bold text-gray-700">@{{ $user->instagram }}</span>
      </div>
    </div>
    <i class="fa-solid fa-arrow-up-right-from-square text-[10px] text-gray-300"></i>
  </a>
</div>
@endif

<!-- Trip History Section -->
<div class="space-y-2">
  <h3 class="text-[11px] font-bold text-slate-400 tracking-wider uppercase px-1">Trip History</h3>
  <div class="space-y-2.5">
    
    <!-- Trip 1 -->
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden transition-all">
      <div onclick="toggleTripDetails('trip1')" class="p-4 flex justify-between items-center cursor-pointer hover:bg-gray-50/40">
        <div class="flex items-center gap-3">
          <div class="w-9 h-9 rounded-xl bg-orange-50 text-[#FF6347] flex items-center justify-center text-sm"><i class="fa-solid fa-umbrella-beach"></i></div>
          <div>
            <h4 class="text-xs font-bold text-gray-800">Oslob Whale Shark Tour</h4>
            <p class="text-[10px] text-gray-400 font-bold mt-0.5">June 15, 2026</p>
          </div>
        </div>
        <i id="icon-trip1" class="fa-solid fa-chevron-down text-xs text-gray-300 transition-transform"></i>
      </div>
      <div id="details-trip1" class="hidden px-4 pb-4 pt-1 border-t border-gray-50 bg-gray-50/30 space-y-2.5 text-[11px]">
        <div class="grid grid-cols-2 gap-2 text-gray-600 pt-2">
          <div><span class="font-bold text-gray-400 block mb-0.5">Itinerary</span>Early morning departure, Whale Shark watching & Tumalog Falls.</div>
          <div><span class="font-bold text-gray-400 block mb-0.5">Companions</span>4 Members (EV & CIA students)</div>
        </div>
        <div class="flex justify-between items-center text-gray-500 pt-1">
          <span>Total Cost: <strong class="text-gray-700">~2,500 PHP</strong></span>
          <span class="text-emerald-600 font-bold bg-emerald-50 px-2 py-0.5 rounded-md text-[9px]"><i class="fa-solid fa-circle-check mr-0.5"></i> Completed</span>
        </div>
      </div>
    </div>

    <!-- Trip 2 -->
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden transition-all">
      <div onclick="toggleTripDetails('trip2')" class="p-4 flex justify-between items-center cursor-pointer hover:bg-gray-50/40">
        <div class="flex items-center gap-3">
          <div class="w-9 h-9 rounded-xl bg-teal-50 text-[#008080] flex items-center justify-center text-sm"><i class="fa-solid fa-shuttle-space"></i></div>
          <div>
            <h4 class="text-xs font-bold text-gray-800">Mactan Island Island Hopping</h4>
            <p class="text-[10px] text-gray-400 font-bold mt-0.5">May 24, 2026</p>
          </div>
        </div>
        <i id="icon-trip2" class="fa-solid fa-chevron-down text-xs text-gray-300 transition-transform"></i>
      </div>
      <div id="details-trip2" class="hidden px-4 pb-4 pt-1 border-t border-gray-50 bg-gray-50/30 space-y-2.5 text-[11px]">
        <div class="grid grid-cols-2 gap-2 text-gray-600 pt-2">
          <div><span class="font-bold text-gray-400 block mb-0.5">Itinerary</span>Nalusuan & Pandanon island hopping, BBQ lunch on boat.</div>
          <div><span class="font-bold text-gray-400 block mb-0.5">Companions</span>6 Members</div>
        </div>
        <div class="flex justify-between items-center text-gray-500 pt-1">
          <span>Total Cost: <strong class="text-gray-700">~1,800 PHP</strong></span>
          <span class="text-emerald-600 font-bold bg-emerald-50 px-2 py-0.5 rounded-md text-[9px]"><i class="fa-solid fa-circle-check mr-0.5"></i> Completed</span>
        </div>
      </div>
    </div>

  </div>
</div>

<!-- Settings Link -->
<div class="space-y-2">
  <div class="bg-white rounded-3xl shadow-sm border border-gray-100/50 overflow-hidden">
    <a href="{{ route('settings.all') }}" class="flex justify-between items-center p-4 hover:bg-gray-50/50 transition-colors cursor-pointer">
      <div class="flex items-center gap-3 text-gray-700">
        <div class="w-8 h-8 rounded-xl bg-gray-50 text-gray-500 flex items-center justify-center text-sm"><i class="fa-solid fa-gear"></i></div>
        <span class="text-sm font-bold">Settings & Privacy</span>
      </div>
      <i class="fa-solid fa-chevron-right text-xs text-gray-300"></i>
    </a>
  </div>
</div>
@endsection

@section('scripts')
<script>
  function toggleTripDetails(tripId) {
    const details = document.getElementById('details-' + tripId);
    const icon = document.getElementById('icon-' + tripId);
    
    if(details.classList.contains('hidden')) {
      details.classList.remove('hidden');
      icon.classList.add('rotate-180');
    } else {
      details.classList.add('hidden');
      icon.classList.remove('rotate-180');
    }
  }
</script>
@endsection
@extends('layouts.mobile')

@section('content')
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
            <a href="{{ route('settings.all') }}" class="text-gray-500 hover:text-gray-800 transition-all text-sm font-bold flex items-center gap-1">
                <i class="fa-solid fa-chevron-left text-xs"></i> Settings
            </a>
            <h1 class="text-base font-bold text-gray-800 flex items-center gap-1.5">Help Center</h1>
            <div class="w-12"></div>
        </div>
    </div>
    <div class="flex-1 overflow-y-auto no-scrollbar p-5 space-y-5 pb-28">
        <!-- Placeholder for help content. Add actual FAQ or contact options here. -->
        <p class="text-sm text-gray-700">Help content goes here. Update this section with relevant FAQs or contact information.</p>
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
@endsection
@extends('layouts.mobile')

@section('content')
<div class="w-full max-w-[412px] bg-[#FFFBF3] h-screen sm:h-[840px] shadow-2xl relative flex flex-col justify-between overflow-hidden sm:rounded-[40px]">
    <!-- Header -->
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
            <a href="{{ route('settings.all') }}" class="text-gray-500 hover:text-gray-800 transition-all text-sm font-bold flex items-center gap-1">
                <i class="fa-solid fa-chevron-left text-xs"></i> Settings
            </a>
            <h1 class="text-base font-bold text-red-600 flex items-center gap-1.5">
                <i class="fa-solid fa-triangle-exclamation text-sm"></i> Emergency Info
            </h1>
            <div class="w-12"></div>
        </div>
    </div>
    <div class="flex-1 overflow-y-auto no-scrollbar p-5 space-y-5 pb-28">
        <div class="bg-red-50 border border-red-100 rounded-2xl p-3.5 flex gap-3 items-start">
            <i class="fa-solid fa-circle-info text-red-500 text-sm mt-0.5"></i>
            <div class="text-[11px] text-red-700 leading-relaxed font-medium">
                Tap any card below to make an immediate call. For medical assistance, please check your travel insurance details beforehand.
            </div>
        </div>
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
                <a href="tel:0322533121" class="block bg-white rounded-2xl p-4 shadow-sm border border-gray-100/50 hover:bg-gray-50/50 active:scale-[0.99] transition-all">
                    <div class="flex justify-between items-start">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-base"><i class="fa-solid fa-hospital"></i></div>
                            <div>
                                <h4 class="text-xs font-bold text-slate-800">Cebu Doctors' Hospital (Help Desk)</h4>
                                <p class="text-[10px] text-gray-400 font-medium mt-0.5">Located in Cebu City (Osmeña Blvd)</p>
                            </div>
                        </div>
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
                        <span class="text-emerald-600 bg-emerald-50/50 px-1.5 py-0.5 rounded"><i class="fa-solid fa-language mr-1"></i>Japanese Speaker Available</span>
                        <span class="text-slate-600 font-bold">(032) 349-0000</span>
                    </div>
                </a>
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
@endsection
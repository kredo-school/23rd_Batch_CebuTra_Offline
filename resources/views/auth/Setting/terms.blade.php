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
            <h1 class="text-base font-bold text-gray-800">Terms &amp; Disclaimers</h1>
            <div class="w-12"></div>
        </div>
    </div>
    <div class="flex-1 overflow-y-auto no-scrollbar p-5 space-y-5 pb-28">
        <div class="px-1">
            <p class="text-xs text-slate-500 leading-relaxed font-medium">
                Please read these Terms &amp; Disclaimers carefully before using CebuTra. By using this application, you agree to comply with and be bound by the following terms.
            </p>
            <p class="text-[10px] text-gray-400 mt-1">Last updated: July 2026</p>
        </div>
        <div class="bg-white rounded-2xl p-4 shadow-sm border border-gray-100/50 space-y-2">
            <div class="flex items-center gap-2 text-[#008080] font-bold text-xs">
                <span class="w-5 h-5 rounded-lg bg-teal-50 flex items-center justify-center text-[10px]">1</span>
                <h3>Purpose of the Service</h3>
            </div>
            <div class="text-[11px] leading-relaxed text-slate-600 font-medium space-y-1 pl-7">
                <p>CebuTra is a platform built to help language school students and travelers in Cebu connect and plan itineraries together.</p>
                <p class="text-gray-400 text-[10px]">【サービスの目的】当アプリは、セブ島の語学学校の生徒や旅行者同士が繋がり、一緒に旅程を計画・共有するためのプラットフォームです。</p>
            </div>
        </div>
        <div class="bg-white rounded-2xl p-4 shadow-sm border border-gray-100/50 space-y-2">
            <div class="flex items-center gap-2 text-[#008080] font-bold text-xs">
                <span class="w-5 h-5 rounded-lg bg-teal-50 flex items-center justify-center text-[10px]">2</span>
                <h3>User Responsibility &amp; Interactions</h3>
            </div>
            <div class="text-[11px] leading-relaxed text-slate-600 font-medium space-y-1 pl-7">
                <p>You are solely responsible for your interactions with other users. CebuTra does not conduct background checks on its users and is not responsible for any disputes, accidents, damages, or harm arising from your meetups or joint trips.</p>
                <p class="text-gray-400 text-[10px]">【自己責任原則】ユーザー同士の交流や実際の出会い・旅行中に発生したトラブル、事故、損害について、当アプリは一切の責任を負いません。すべて自己責任で行動してください。</p>
            </div>
        </div>
        <div class="bg-white rounded-2xl p-4 shadow-sm border border-gray-100/50 space-y-2">
            <div class="flex items-center gap-2 text-[#008080] font-bold text-xs">
                <span class="w-5 h-5 rounded-lg bg-teal-50 flex items-center justify-center text-[10px]">3</span>
                <h3>Financial &amp; Cost Sharing Disputes</h3>
            </div>
            <div class="text-[11px] leading-relaxed text-slate-600 font-medium space-y-1 pl-7">
                <p>Any cost‑sharing arrangements (e.g., splitting tour fees, transportation, or meals) are strictly between the participating users. CebuTra does not manage transactions and will not intervene in any financial disputes or unpaid expenses.</p>
                <p class="text-gray-400 text-[10px]">【金銭トラブルの免責】ツアー代金の割り勘、交通費、食事代などの金銭的なやり取りはユーザー間で完結させてください。運営は一切関与せず、未払い等のトラブルへの仲裁も行いません。</p>
            </div>
        </div>
        <div class="bg-white rounded-2xl p-4 shadow-sm border border-gray-100/50 space-y-2">
            <div class="flex items-center gap-2 text-[#008080] font-bold text-xs">
                <span class="w-5 h-5 rounded-lg bg-teal-50 flex items-center justify-center text-[10px]">4</span>
                <h3>No Guarantee of Information</h3>
            </div>
            <div class="text-[11px] leading-relaxed text-slate-600 font-medium space-y-1 pl-7">
                <p>While we strive to provide helpful travel and local info, CebuTra does not guarantee the accuracy, completeness, or safety of any user‑generated itineraries, schedules, or external tour links posted on the platform.</p>
                <p class="text-gray-400 text-[10px]">【情報の無保証】アプリ内に掲載されるユーザー発信の旅程や外部ツアーのリンク、各種情報の正確性や安全性について、運営はその完全性を保証するものではありません。</p>
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
        <button class="flex flex-col items-center justify-center w-14 py-1 text-[#008080]"><i class="fa-solid fa-user text-lg"></i><span class="text-[10px] font-bold mt-0.5">Profile</span></button>
    </div>
</div>
@endsection
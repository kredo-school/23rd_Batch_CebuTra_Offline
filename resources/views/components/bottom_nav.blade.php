<nav class="bottom-nav">
    <a href="{{ }}">//
        <i class="fa-regular fa-house"></i>
        <span>ホーム</span>
    </a>

    <a href="{{ }}">//
        <i class="fa-solid fa-magnifying-glass"></i>
        <span>探す</span>
    </a>

    <a href="{{ }}">//
        <i class="fa-solid fa-magnifying-glass"></i>
        <span>探す</span>
    </a>

    <a href="{{}}">//
        <i class="fa-solid fa-plus"></i>
        <span>募集</span>
    </a>

    <a href="{{}}">//
        <i class="fa-solid fa-map"></i>
        <span>旅程</span>
    </a>

    <a href="{{}}">//
        <i class="fa-solid fa-user"></i>
        <span>プロフィール</span>
    </a>
</nav>


<!-- resources/views/components/bottom-nav.blade.php -->
{{-- <div class="absolute bottom-0 left-0 right-0 bg-white border-t border-gray-100 px-4 py-2 flex justify-between items-center sm:rounded-b-[40px] shadow-[0_-4px_12px_rgba(0,0,0,0.04)] z-30 flex-shrink-0">
  
  <!-- Home -->
  <a href="{{ route('home') }}" class="flex flex-col items-center justify-center w-14 py-1 {{ Route::is('home') ? 'text-[#008080] font-bold' : 'text-gray-400 hover:text-gray-600' }}">
    <i class="fa-solid fa-house text-lg"></i>
    <span class="text-[10px] {{ Route::is('home') ? 'font-bold' : 'font-medium' }} mt-0.5">{{ __('messages.nav_home') }}</span>
  </a>

  <!-- Explore -->
  <a href="#" class="flex flex-col items-center justify-center w-14 py-1 {{ Route::is('explore') ? 'text-[#008080] font-bold' : 'text-gray-400 hover:text-gray-600' }}">
    <i class="fa-solid fa-magnifying-glass text-lg"></i>
    <span class="text-[10px] {{ Route::is('explore') ? 'font-bold' : 'font-medium' }} mt-0.5">{{ __('messages.nav_explore') }}</span>
  </a>

  <!-- Recruit (+ボタン) -->
  <div class="relative -top-5 flex flex-col items-center">
    <a href="#" class="w-14 h-14 bg-[#FF6347] rounded-full flex items-center justify-center text-white border-4 border-white shadow-lg shadow-orange-500/30 active:scale-95 transition-transform">
      <i class="fa-solid fa-plus text-xl"></i>
    </a>
    <span class="text-[10px] text-[#FF6347] font-bold mt-1">{{ __('messages.nav_recruit') }}</span>
  </div>

  <!-- Itinerary -->
  <a href="#" class="flex flex-col items-center justify-center w-14 py-1 {{ Route::is('itinerary') ? 'text-[#008080] font-bold' : 'text-gray-400 hover:text-gray-600' }}">
    <i class="fa-solid fa-map text-lg"></i>
    <span class="text-[10px] {{ Route::is('itinerary') ? 'font-bold' : 'font-medium' }} mt-0.5">{{ __('messages.nav_itinerary') }}</span>
  </a>

  <!-- Profile (アクティブ判定付き) -->
  <a href="{{ route('profile') }}" class="flex flex-col items-center justify-center w-14 py-1 {{ Route::is('profile*') ? 'text-[#008080] font-bold' : 'text-gray-400 hover:text-gray-600' }}">
    <i class="fa-solid fa-user text-lg"></i>
    <span class="text-[10px] {{ Route::is('profile*') ? 'font-bold' : 'font-medium' }} mt-0.5">{{ __('messages.nav_profile') }}</span>
  </a>

</div> --}}

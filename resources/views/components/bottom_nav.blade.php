@props(['active' => ''])

<nav class="bottom-nav">
    <a href="{{ route('home') }}" class="{{ $active === 'home' ? 'active' : '' }}">
        <i class="fa-regular fa-house"></i>
        <span>ホーム</span>
    </a>

    <a href="{{ route('events.index') }}" class="{{ $active === 'explore' ? 'active' : '' }}">
        <i class="fa-solid fa-magnifying-glass"></i>
        <span>探す</span>
    </a>

    <a href="{{ route('events.create.step1') }}" class="{{ $active === 'post' ? 'active' : '' }}">
        <i class="fa-solid fa-plus"></i>
        <span>募集</span>
    </a>

    <a href="{{ route('itinerary.index') }}" class="{{ $active === 'itinerary' ? 'active' : '' }}">
        <i class="fa-solid fa-map"></i>
        <span>旅程</span>
    </a>

    <a href="{{}}" class="{{ $active === 'profile' ? 'active' : '' }}">
        <i class="fa-solid fa-user"></i>
        <span>プロフィール</span>
    </a>
</nav>

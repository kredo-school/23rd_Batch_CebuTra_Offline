<div class="day-tabs">
    @foreach (range(1,$trip->day) as $day)

    <button class="day-tab {{ $day==1 ? 'active' : '' }}">//
        Day{{ $day }}//
    </button>

    @endforeach

    <button class="day-add">
        <i class="fa-solid fa-plus"></i>
        追加
    </button>

</div>

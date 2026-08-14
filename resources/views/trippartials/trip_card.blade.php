<div class="card mb-4 shadow-sm">

    <div class="card-body">

        {{-- 旅程タイトル --}}
        <div class="d-flex justify-content-between align-items-center mb-3">

            <div>

                <h2 class="h5 fw-bold mb-1">
                    {{ $trip->title }}
                </h2>

                <p class="text-muted mb-0">
                    {{ $trip->days }}日間
                </p>

            </div>


            {{-- 編集ボタン --}}
            <a href="{{ route('itineraries.edit', $trip->id) }}"
               class="btn btn-outline-primary btn-sm">
                編集
            </a>

        </div>


        {{-- 日ごとの予定 --}}
        @for ($day = 1; $day <= $trip->days; $day++)

            <div class="mb-4">

                <h3 class="h6 fw-bold">
                    Day {{ $day }}
                </h3>


                @php
                    $dayItems = $trip->itineraryItems
                        ->where('day', $day);
                @endphp


                {{-- その日の予定がない場合 --}}
                @if ($dayItems->isEmpty())

                    <p class="text-muted small">
                        予定はありません。
                    </p>


                {{-- その日の予定がある場合 --}}
                @else

                    @foreach ($dayItems as $item)

                        <div class="mb-3">

                            {{-- 予定タイトル --}}
                            <div class="fw-semibold">
                                {{ $item->title }}
                            </div>


                            {{-- 時間 --}}
                            @if ($item->time)

                                <div class="text-muted small">
                                    {{ $item->time }}
                                </div>

                            @endif


                            {{-- 場所 --}}
                            @if ($item->place)

                                <div class="text-muted small">
                                    {{ $item->place }}
                                </div>

                            @endif

                        </div>

                    @endforeach

                @endif

            </div>

        @endfor


        {{-- 旅程編集 --}}
        <div class="text-end">

            <a href="{{ route('itineraries.edit', $trip->id) }}"
               class="btn btn-primary">
                旅程を編集
            </a>

        </div>

    </div>

</div>

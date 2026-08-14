@extends('layouts.event')

@section('title', '旅行を募集する')

@section('progress')
    <div class="steps">
        <div class="active"></div>
        <div class="active"></div>
        <div></div>
        <div></div>
    </div>
@endsection

@section('content')

<form method="POST"
      action="{{ route('events.create.step2.store') }}">

    @csrf


    {{-- 募集人数 --}}
    <div class="form-group">

        <label>
            募集人数
        </label>

        <div class="member-grid">

            @foreach ([2, 3, 4, 5, 6, 8, 10] as $member)

                <label class="member-option">

                    <input
                        type="radio"
                        name="capacity"
                        value="{{ $member }}"
                        {{ (int) old(
                            'capacity',
                            $old['capacity'] ?? 0
                        ) === $member ? 'checked' : '' }}
                    >

                    <span>
                        {{ $member }}名
                    </span>

                </label>

            @endforeach

        </div>

        @error('capacity')
            <p class="error">{{ $message }}</p>
        @enderror

    </div>


    {{-- 予算 --}}
    <div class="form-group">

        <label for="budget">
            予算の目安
        </label>

        <input
            type="text"
            id="budget"
            placeholder="例：1500ペソ〜2000ペソ"
        >

        <small>
            ※予算は現在のDB設計では保存されません
        </small>

    </div>


    {{-- タグ --}}
    <div class="form-group">

        <label>
            タグ（複数選択可）
        </label>

        <div class="tags">

            @foreach ($tags as $tag)

                <label class="tag-option">

                    <input
                        type="checkbox"
                        name="tags[]"
                        value="{{ $tag->id }}"
                        {{ in_array(
                            $tag->id,
                            old(
                                'tags',
                                $old['tags'] ?? []
                            )
                        ) ? 'checked' : '' }}
                    >

                    <span>
                        {{ $tag->name }}
                    </span>

                </label>

            @endforeach

        </div>

        @error('tags')
            <p class="error">{{ $message }}</p>
        @enderror

        @error('tags.*')
            <p class="error">{{ $message }}</p>
        @enderror

    </div>


    <div class="button-group">

        <a
            href="{{ route('events.create.step1') }}"
            class="btn-outline"
        >
            戻る
        </a>

        <button
            type="submit"
            class="btn-primary"
        >
            次へ進む
        </button>

    </div>

</form>

@endsection

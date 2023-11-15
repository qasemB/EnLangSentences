@extends('layouts._main')

@section('content')
    {{-- <h3 class="text-center mt-4"> <span class="text_pink">Learn</span> English words, every day </h3>
    <h3 class="text-center mt-3"> By <span class="text_pink">your own sentences</span> </h3> --}}
    <h3 class="text-center mt-4">
        کلمات انگلیسی رو
        <span class="text_pink">
            به خاطر بسپار
        </span>
    </h3>
    <h3 class="text-center mt-3">
        با
        <span class="text_pink">جملات</span>
        خودت
    </h3>

    <livewire:typing-sentence-box />

    <livewire:answer-input />

    {{-- <h3 class="text-center mt-3 mb-4">And <br /> You can add</h3> --}}

    <livewire:add-sentence />
@endsection


@section('pageJS')
    <script src="/{{env("ASSETS_FOLDER")}}/js/index.js"></script>
@endsection

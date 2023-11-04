@extends('layouts._main')

@section('content')
    <h3 class="text-center mt-4"> <span class="text_pink">Learn</span> English words, every day </h3>
    <h3 class="text-center mt-3"> By <span class="text_pink">your own sentences</span> </h3>

    <div id="typing_box" class="w-100 w-md-50 bg_dark text-white p-3 rounded shadow mt-3 transition_300">
    </div>

    <div class="w-100 w-md-50 p-3 rounded shadow mt-4">
        <label>Now it's your turn, write the above</label>
        <textarea id="typing_input" class="form-control" style="height: 60px"></textarea>
    </div>

    <div class="text-end mt-3 w-100 w-md-50">
        <span class="hoverable_text pointer p-3">Next</span>
    </div>

    <h3 class="text-center mt-3 mb-4">And <br /> You can add</h3>

    <livewire:add-sentence />
@endsection


@section('pageJS')
    <script src="{{ asset('js/index.js') }}"></script>
@endsection

<div class="row col-12 justify-content-center align-items-center px-0">
    @if ($isLoading)
        <div class="d-flex justify-content-center align-items-center" style="background: rgba(128, 128, 128, 0.459); position: fixed; width: 100%; height: 100vh; top: 0; left: 0; z-index: 1000000;">
            <div class="spinner-border text-light" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
        </div>
    @endif
    <div wire:ignore id="translation_box" class="text-center mt-4">

    </div>
    <div class="w-100 w-md-50 p-3 rounded shadow mt-4 position-relative">
        {{-- <label>Now it's your turn, write the above</label> --}}
        <label style="direction: rtl" class="d-block">
            الان نوبت توئه، جمله رو
            {{-- @if ($isEven) --}}
            <span class="text_pink">بگو</span>
            {{-- @else --}}
            {{-- @endif --}}
            یا
            <span class="text_pink">تایپ کن</span>
        </label>
        <textarea wire:ignore wire:focusin="handleFocus(1)" wire:focusout="handleFocus(0)" onpaste="return false;" id="typing_input"
            class="form-control" style="height: 60px;color: transparent;caret-color: black;"></textarea>

        <div wire:ignore id="answer_box" style="
        position: absolute;
        top: 47px;
        left: 29px;
        pointer-events: none;
        "></div>

        <div id="speech_record_btn_box" class="position-relative mt-3">
            <span style="position: absolute; left: 5px">
                <i id="listen_button" class="fa-brands fa-teamspeak text_dark fa-2x mx-2 pointer" title="Listen"></i>
                <i id="translate_button" class="fa-solid fa-language text_dark fa-2x mx-2 pointer" title="Translate"></i>
            </span>
            <button id="speech_record_btn"
                class="btn btn-primary rounded-circle btn-lg pointer
                {{-- {{ $isEven ? '' : 'd-none' }} --}}
                ">
                <i class="fas fa-microphone text-white" style="position: relative; top: 4px"></i>
            </button>
            @if (Auth::check())
                <span style="position: absolute; right: 5px">کل امتیاز: {{ Auth::user()->practicing_score }}</span>
            @endif
        </div>
    </div>

    <div class="text-end mt-3 w-100 w-md-50 d-flex justify-content-between mb-4">
        @if (Auth::check())
            <span class="text_pink pointer" wire:click="submitAndGoNext(false)">
                یاد نگرفتم! بعدی
            </span>

            <span class="{{ $currentScore > 5 ? 'text-success' : '' }}">{{ $currentScore }}</span>

            <span class="text_blue pointer" wire:click="submitAndGoNext(true)">
                یاد گرفتم! بعدی
            </span>
        @else
            <a href="/login" class="text_pink pointer" wire:click="submitAndGoNext(false)">
                یاد نگرفتم! بعدی
            </a>

            <a href="/login" class="text_blue pointer" wire:click="submitAndGoNext(true)">
                یاد گرفتم! بعدی
            </a>
        @endif
    </div>
</div>

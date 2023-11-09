<div class="row col-12 justify-content-center align-items-center px-0">
    <div class="w-100 w-md-50 p-3 rounded shadow mt-4">
        {{-- <label>Now it's your turn, write the above</label> --}}
        <label style="direction: rtl" class="d-block">الان نوبت توئه، جمله رو <span class="text_pink">بگو</span> یا <span
                class="text_pink">تایپ کن</span></label>
        <textarea wire:ignore onpaste="return false;" id="typing_input" class="form-control" style="height: 60px"></textarea>

        <div id="speech_record_btn_box" class="position-relative mt-3">
            <button id="speech_record_btn" class="btn btn-primary rounded-circle btn-lg pointer">
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

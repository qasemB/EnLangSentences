    <div>
        <div class="w-100 w-md-50 text-start m-auto">
            <span class="pointer hoverable_text badge bg-primary pt-2 {{$isTranslated ? "bg-info" : "bg-secondary"}} " wire:click="$toggle('isTranslated')">{{$isTranslated ? "FA" : "EN"}}</span>
        </div>
        <div
        class="position-relative d-flex flex-column align-items-center justify-content-center {{$isTranslated || $focused ? 'is_blur' : '' }}"
        >
            @if ($oneSentence != null)
                <div wire:ignore wire:init="handleTyping" id="typing_box"
                    class="w-100 w-md-50 bg_dark text-white p-3 rounded shadow mt-3 transition_300 position-relative {{ $oneSentence->description != null ? 'has_tag' : '' }}"
                    wire:click="handleShowDescription">
                </div>
                @if ($showDescription)
                    <small class="d-block text-center mt-2 text_blue">{{ $oneSentence->description }}</small>
                @endif
            @else
                <div class="text-center text-primary my-2">
                    دکمه پایین را بزنید و جمله اول خود را ایجاد کنید و سپس
                    <a href="/" class="btn btn-light text_blue shadow mx-1">Refresh</a>
                    کنید
                </div>
            @endif
        </div>
    </div>

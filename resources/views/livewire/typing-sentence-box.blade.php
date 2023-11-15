    <div class="position-relative d-flex flex-column align-items-center justify-content-center {{$focused ? "is_blur" : ""}}">
        <div wire:ignore wire:init="handleTyping" title="{{$oneSentence->description}}" id="typing_box" class="w-100 w-md-50 bg_dark text-white p-3 rounded shadow mt-3 transition_300 {{$oneSentence->description != null ? "has_tag" : ""}}" wire:click="handleShowDescription">
        </div>
        @if ($showDescription)
            <small class="d-block text-center mt-2 text_blue">{{$oneSentence->description}}</small>
        @endif
    </div>

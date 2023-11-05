<div>
    <div class="text-center mb-4">
        @if (Auth::check())
            <button class="btn btn-light text_blue shadow" data-bs-toggle="offcanvas"
                data-bs-target="#addSentenceOffCanvas" aria-controls="addSentenceOffCanvas">Your own sentence</button>
        @else
            <a href="{{ route('login') }}" class="btn btn-light text_blue shadow">Your own sentence</a>
        @endif
    </div>

    <div class="min_w_100 offcanvas offcanvas-start " data-bs-backdrop="static" tabindex="-1" id="addSentenceOffCanvas"
        aria-labelledby="addSentenceOffCanvasLabel" wire:ignore.self>
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="addSentenceOffCanvasLabel">Add your own sentence</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div>
                <form wire:submit.prevent="handleSubmitForm">
                    <div class="form-floating" data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-custom-class="custom-tooltip" data-bs-title="Write your own sentence">
                        <textarea class="form-control @error('sentence') is-invalid  @enderror" placeholder="Write your own sentence"
                            id="add_sentence_sentence" style="height: 70px" wire:model.blur="sentence"></textarea>
                        <label for="add_sentence_sentence">Sentence</label>
                        @error('sentence')
                            <small class="text-secondary">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-floating my-3" data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-custom-class="custom-tooltip" data-bs-title="EX: Word1,word2,...">
                        <input type="text" class="form-control @error('target_words') is-invalid  @enderror"
                            id="add_sentence_target_words" placeholder="EX: Word1,word2,..."
                            wire:model.blur="target_words">
                        <label for="add_sentence_target_words">Target words</label>
                        @error('target_words')
                            <small class="text-secondary">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-floating" data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-custom-class="custom-tooltip" data-bs-title="What does focus on?">
                        <select class="form-select @error('category_id') is-invalid  @enderror"
                            id="add_sentence_category" wire:model.change="category_id">
                            <option selected>Select a category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                        <label for="add_sentence_category">Category</label>
                        @error('category_id')
                            <small class="text-secondary">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="my-3 rounded border px-3 py-1" data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-custom-class="custom-tooltip" data-bs-title="what level is it?">
                        <label for="sentence_lavel" class="form-label">Level {{ $level }}</label>
                        <input type="range" class="form-range" min="1" max="6" id="sentence_lavel"
                            wire:model.blur="level">
                        <div class="d-flex justify-content-between">
                            <small class="text-secondary">Beginner</small>
                            <small class="text-secondary">Professional</small>
                        </div>
                        @error('level')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-floating" data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-custom-class="custom-tooltip" data-bs-title="Describe if needed (EX: Grammar note)">
                        <textarea class="form-control @error('description') is-invalid  @enderror"
                            placeholder="Describe if needed (EX: Grammar note)" id="add_sentence_description" style="height: 60px"
                            wire:model.blur="description"></textarea>
                        <label for="add_sentence_description">Description</label>
                        @error('description')
                            <small class="text-secondary">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-check form-switch mt-4 d-flex justify-content-start align-items-center"
                        data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                        data-bs-title="Just show it to me">
                        <input class="form-check-input me-2 @error('hide_for_others') is-invalid  @enderror"
                            type="checkbox" role="switch" id="add_sentence_for_me" wire:model.blur="hide_for_others">
                        <label class="form-check-label" for="add_sentence_for_me">Just for me</label>
                        @error('hide_for_others')
                            <small class="text-secondary ms-2">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn_blue hoverable">submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", (event) => {
        document.addEventListener('livewire:initialized', () => {
            @this.on('successed-add-sentence', (message) => {
                Toastify({
                    text: message,
                    className: "alert-success",
                    gravity: "bottom", // `top` or `bottom`
                    position: "center", // `left`, `center` or `right`
                    style: {
                        background: "linear-gradient(to right, #00b09b, #96c93d)",
                    },
                }).showToast();
            });
        });
    });
</script>

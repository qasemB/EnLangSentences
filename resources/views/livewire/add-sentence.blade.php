<div>
    <div class="text-center mb-4">
        <button class="btn btn-light text_blue shadow" {{-- wire:click="$toggle('showAddModal')" --}} data-bs-toggle="offcanvas"
            data-bs-target="#addSentenceOffCanvas" aria-controls="addSentenceOffCanvas">Your own sentence</button>
    </div>

    <div class="min_w_100 offcanvas offcanvas-start " data-bs-backdrop="static" tabindex="-1" id="addSentenceOffCanvas"
        aria-labelledby="addSentenceOffCanvasLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="addSentenceOffCanvasLabel">Add your own sentence</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div>
                <form wire:submit.prevent="">

                    <div class="form-floating" data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-custom-class="custom-tooltip" data-bs-title="Write your own sentence">
                        <textarea class="form-control" placeholder="Write your own sentence" id="add_sentence_sentence" style="height: 70px"></textarea>
                        <label for="add_sentence_sentence">Sentence</label>
                    </div>

                    <div class="form-floating my-3" data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-custom-class="custom-tooltip" data-bs-title="EX: Word1,word2,...">
                        <input type="text" class="form-control" id="add_sentence_target_words"
                            placeholder="EX: Word1,word2,...">
                        <label for="add_sentence_target_words">Target words</label>
                    </div>

                    <div class="form-floating" data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-custom-class="custom-tooltip" data-bs-title="What does focus on?">
                        <select class="form-select" id="add_sentence_category">
                            <option selected>Select a category</option>
                            <option value="1">Word/Phrase meaning</option>
                            <option value="2">Word/Phrase Using</option>
                            <option value="3">Idiom using</option>
                        </select>
                        <label for="add_sentence_category">Category</label>
                    </div>

                    <div class="my-3 rounded border px-3 py-1" data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-custom-class="custom-tooltip" data-bs-title="what level is it?">
                        <label for="sentence_lavel" class="form-label">Level</label>
                        <input type="range" class="form-range" min="1" max="6" id="sentence_lavel">
                        <div class="d-flex justify-content-between">
                            <small class="text-secondary">Beginner</small>
                            <small class="text-secondary">Professional</small>
                        </div>
                    </div>

                    <div class="form-floating" data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-custom-class="custom-tooltip" data-bs-title="Describe if needed (EX: Grammar note)">
                        <textarea class="form-control" placeholder="Describe if needed (EX: Grammar note)" id="add_sentence_description"
                            style="height: 60px"></textarea>
                        <label for="add_sentence_description">Description</label>
                    </div>

                    <div class="form-check form-switch mt-4 d-flex justify-content-start align-items-center" data-bs-toggle="tooltip" data-bs-placement="top"
                    data-bs-custom-class="custom-tooltip" data-bs-title="Just show it to me">
                        <input class="form-check-input me-2" type="checkbox" role="switch" id="add_sentence_for_me">
                        <label class="form-check-label" for="add_sentence_for_me">Just for me</label>
                    </div>

                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn_blue hoverable">submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

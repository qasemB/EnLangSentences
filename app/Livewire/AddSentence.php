<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Sentence;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class AddSentence extends Component
{
    #[Rule('required|regex:'. ALL_LEGAL_LATHIN_CHAR .'|min:20|max:500')]
    public $sentence;

    #[Rule('nullable|regex:'. ALL_LEGAL_CHAR .'|max:500')]
    public $target_words;

    #[Rule('required|numeric')]
    public $category_id;

    #[Rule('required|numeric|max:6')]
    public $level = 2;

    #[Rule('nullable|regex:'. ALL_LEGAL_CHAR .'|max:500')]
    public $description;

    #[Rule('required')]
    public $hide_for_others = false;

    public $categories = [];

    public function handleSubmitForm(){
        $this->validate();
        $userId = Auth::user()->id;
        $newSentence = new Sentence();
        $newSentence->author_id = $userId;
        $newSentence->sentence = $this->sentence;
        $newSentence->target_words = $this->target_words;
        $newSentence->category_id = $this->category_id;
        $newSentence->level = $this->level;
        $newSentence->description = $this->description;
        $newSentence->hide_for_others = $this->hide_for_others;
        $newSentence->save();

        $this->dispatch("successed-add-sentence",["Your sentence added sucessfully"]);
        $this->reset('sentence', 'target_words', 'category_id', 'description');
    }

    public function mount(){
        $this->categories = Category::all();
    }

    public function render()
    {
        return view('livewire.add-sentence');
    }
}

<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class AnswerInput extends Component
{

    public $currentScore= 0;
    public $totalScore = 0;

    #[On("increase-score-res")]
    public function increaseScore($ok, $bySpeech, $byWrite){
        if ($bySpeech) $this->currentScore += SPEAK_SCORE;
        if ($byWrite) $this->currentScore += WRITE_SCORE;
        if ($ok) $this->currentScore += SUCCESS_SCORE;
    }

    #[On("reset-score")]
    public function resetScore(){
        $this->currentScore = 0;
    }

    public function submitAndGoNext($iKnow){
        if($iKnow) $this->currentScore += KNOW_SCORE;
        $this->dispatch("submit-and-next-sentence", currentScore: $this->currentScore, iKnow: $iKnow);
        $this->currentScore = 0;
    }

    #[On("changed-total-practice-score")]
    public function changedTotalPracticeScore($score){
        $this->totalScore = $score;
    }

    public function mount(){
        if(Auth::check()){
            $this->totalScore = Auth::user()->practicing_score;
        }
    }

    public function render()
    {
        return view('livewire.answer-input');
    }
}

<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class AnswerInput extends Component
{

    public $currentScore= 0;
    public $totalScore = 0;
    public $isLoading = false;
    // public $isEven;

    #[On("handle-set-loading")]
    public function handleSetLoading($status){
        $this->isLoading = $status;
    }

    #[On("increase-score-res")]
    public function increaseScore($ok, $bySpeech, $byWrite){
        // if ($bySpeech) $this->currentScore += SPEAK_SCORE;
        // if ($byWrite) $this->currentScore += WRITE_SCORE;
        if ($ok > 0) {
            $total = round((EACH_SUCCESS_WORD * $ok)/2);
            $this->currentScore += $total;
        }
    }

    #[On("reset-score")]
    public function resetScore(){
        $this->currentScore = 0;
    }

    public function submitAndGoNext($iKnow){
        // $this->getIsEvenRandom();
        if($iKnow) $this->currentScore += KNOW_SCORE;
        $this->dispatch("submit-and-next-sentence", currentScore: $this->currentScore, iKnow: $iKnow);
        $this->currentScore = 0;
    }

    #[On("changed-total-practice-score")]
    public function changedTotalPracticeScore($score){
        $this->totalScore = $score;
    }

    public function handleFocus($statusKey){
        $this->dispatch("handle-focus", statusKey: $statusKey);
    }

    // public function getIsEvenRandom(){
    //     $randomNumber = rand(1, 100);
    //     $isEven = $randomNumber % 2 === 0;
    //     $this->isEven = $isEven;
    // }

    public function mount(){
        // $this->getIsEvenRandom();
        if(Auth::check()){
            $this->totalScore = Auth::user()->practicing_score;
        }
    }

    public function render()
    {
        return view('livewire.answer-input');
    }
}

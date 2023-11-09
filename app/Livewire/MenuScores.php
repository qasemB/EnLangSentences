<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MenuScores extends Component
{
    public $colabrateScore;
    public $practiceScore;

    public function calculateScores(){
        $this->colabrateScore = Auth::user()->adding_score + Auth::user()->editing_score;
        $this->practiceScore = Auth::user()->practicing_score;
    }

    public function mount(){
        $this->calculateScores();
    }

    public function render()
    {
        return view('livewire.menu-scores');
    }
}
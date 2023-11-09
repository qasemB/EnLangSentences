<?php

namespace App\Livewire;

use App\Models\Phrase;
use App\Models\Sentence;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class TypingSentenceBox extends Component
{
    public $oneSentence;

    private function getOeSentence()
    {
        $user = User::where('id', Auth::user()->id)->first();

        if ($user->see_all == 1) {
            $sentense = Sentence::whereDoesntHave('users', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->inRandomOrder()->first();

            if ($sentense == null) {
                $sentense = Sentence::select('sentences.*')
                    ->join('sentence_user', 'sentences.id', '=', 'sentence_user.sentence_id')
                    ->orderBy('sentence_user.count', 'asc')
                    ->first();
            }
        }elseif($user->see_all == 2){
            $sentense = Sentence::where('author_id', $user->id)->whereDoesntHave('users', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->inRandomOrder()->first();

            if ($sentense == null) {
                $sentense = Sentence::where('author_id', $user->id)->select('sentences.*')
                    ->join('sentence_user', 'sentences.id', '=', 'sentence_user.sentence_id')
                    ->orderBy('sentence_user.count', 'asc')
                    ->first();
            }
        }elseif($user->see_all == 3){
            $sentense = Sentence::where('author_id',"!=", $user->id)->whereDoesntHave('users', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->inRandomOrder()->first();

            if ($sentense == null) {
                $sentense = Sentence::where('author_id',"!=", $user->id)->select('sentences.*')
                    ->join('sentence_user', 'sentences.id', '=', 'sentence_user.sentence_id')
                    ->orderBy('sentence_user.count', 'asc')
                    ->first();
            }
        }

        return $sentense;
    }

    public function mount()
    {
        if (Auth::check()) $firsSentence = $this->getOeSentence();
        else $firsSentence = Sentence::with("phrases")->first();

        $this->oneSentence = $firsSentence;
    }

    public function handleTyping()
    {
        if ($this->oneSentence != null) {
            foreach ($this->oneSentence->phrases as $phrase) {
                $this->oneSentence->sentence = str_replace($phrase->title, "+$phrase->title+", $this->oneSentence->sentence);
            }
        }else{
            $this->oneSentence = ["sentence" => STATIC_SENTENCE_NOT_FOUND];
        }
        $this->dispatch("typing-one-sentence", $this->oneSentence, "typing_box");
    }


    #[On('submit-and-next-sentence')]
    public function handleSubmitAndGoNext($currentScore, $iKnow)
    {
        $user = User::where('id', Auth::user()->id)->first();
        if ($iKnow) {
            $user->practicing_score += $currentScore;
            $user->last_practice_at = Carbon::now();
            $user->save();
            $this->dispatch("changed-total-practice-score", score: $user->practicing_score);
            $phrases = $this->oneSentence->phrases;

            foreach ($phrases as $phrase) {
                $pivotRecord = $user->phrases()->where('phrase_id', $phrase->id)->first();
                if ($pivotRecord) {
                    $pivotRecord->pivot->count += 1;
                    $pivotRecord->pivot->save();
                } else {
                    $user->phrases()->attach($phrase, ['count' => 1]);
                }
            }

            $sentencePivot = $user->sentences()->where('sentence_id', $this->oneSentence->id)->first();
            if ($sentencePivot) {
                $sentencePivot->pivot->count += 1;
                $sentencePivot->pivot->save();
            } else {
                $user->sentences()->attach($this->oneSentence, ['count' => 1]);
            }
        }

        $this->oneSentence = $this->getOeSentence();

        $this->handleTyping();
    }

    public function render()
    {
        return view('livewire.typing-sentence-box');
    }
}

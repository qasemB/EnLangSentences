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
    public $focused = 0;
    public $showDescription = false;

    #[On("handle-focus")]
    public function handleFcouse($statusKey)
    {
        $this->focused = $statusKey;
    }

    public function handleShowDescription()
    {
        if ($this->oneSentence->description != null) {
            $this->showDescription = !$this->showDescription;
        }
    }

    private function getOeSentence()
    {
        $user = User::where('id', Auth::user()->id)->first();

        if ($user->see_all == 1) {
            $sentense = Sentence::whereDoesntHave('users', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->inRandomOrder()->first();

            if ($sentense == null) {
                $sentense = $user->sentences()->orderBy("count", 'asc')->first();
                // $sentense = Sentence::with("users")->where('users', function ($query) use ($user) {
                //     $query->where('user_id', $user->id);
                // })->select('sentences.*')
                //     ->join('sentence_user', 'sentences.id', '=', 'sentence_user.sentence_id')
                //     ->orderBy('sentence_user.count', 'asc')
                //     ->first();
            }
        } elseif ($user->see_all == 2) {
            $sentense = Sentence::where('author_id', $user->id)->whereDoesntHave('users', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->inRandomOrder()->first();

            if ($sentense == null) {
                $sentense = $user->sentences()->where('author_id', $user->id)->orderBy("count", 'asc')->first();
            }
        } elseif ($user->see_all == 3) {
            $sentense = Sentence::where('author_id', "!=", $user->id)->whereDoesntHave('users', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->inRandomOrder()->first();

            if ($sentense == null) {
                $sentense = $user->sentences()->where('author_id', "!=", $user->id)->orderBy("count", 'asc')->first();
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
                $ph = trim($phrase->title);
                if (strpos($this->oneSentence->sentence, $ph)) {
                    $this->oneSentence->sentence = str_replace($ph, "+$ph+", $this->oneSentence->sentence);
                }else{
                    $ph = strtolower($ph);
                    $this->oneSentence->sentence = str_replace($ph, "+$ph+", $this->oneSentence->sentence);
                }
            }
        } else {
            $this->oneSentence = ["sentence" => STATIC_SENTENCE_NOT_FOUND, "description" => null];
        }
        $this->dispatch("typing-one-sentence", $this->oneSentence, "typing_box");
    }


    #[On('submit-and-next-sentence')]
    public function handleSubmitAndGoNext($currentScore, $iKnow)
    {
        $user = User::where('id', Auth::user()->id)->first();
        if ($iKnow) {
            $c = new Carbon(Auth::user()->last_practice_at);
            if (Carbon::now()->format("Y-m-d") != $c->format("Y-m-d")) {
                $user->practice_days += 1;
            }
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

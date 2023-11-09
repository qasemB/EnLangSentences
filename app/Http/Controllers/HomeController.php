<?php

namespace App\Http\Controllers;

use App\Models\Sentence;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $randomSentences = Sentence::inRandomOrder()->take(10)->get();
        return view('index', compact("randomSentences"));
    }
}

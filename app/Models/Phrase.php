<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phrase extends Model
{
    use HasFactory;

    public function sentences(){
        return $this->belongsToMany('App\Models\Sentence');
    }

    public function categories(){
        return $this->belongsToMany('App\Models\Category');
    }

}

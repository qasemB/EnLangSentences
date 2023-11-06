<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function phrases(){
        return $this->belongsToMany('App\Models\Phrase');
    }

    public function sentences(){
        return $this->hasMany('App\Models\Sentence');
    }
}

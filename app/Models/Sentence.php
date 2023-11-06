<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sentence extends Model
{
    use HasFactory;
    protected $fillable = ['*'];

    public function phrases(){
        return $this->belongsToMany('App\Models\Phrase');
    }
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
}

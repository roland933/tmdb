<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{

    protected $table="movies";

    protected $fillable=["title","release_date","overview","poster_path","vote_count","vote_average"];

    public function genre() {
        return $this->belongsToMany(Genre::class);
    }
}

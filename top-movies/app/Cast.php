<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Cast extends Model
{

    protected $table = "casts";

    protected $fillable = ["name","imdb_id","biography","date_of_birth"];



}

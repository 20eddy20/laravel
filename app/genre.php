<?php

namespace Cinema;

use Illuminate\Database\Eloquent\Model;

class genre extends Model
{
    protected $table =  "genres";
    protected $fillable = ["genre"];
}

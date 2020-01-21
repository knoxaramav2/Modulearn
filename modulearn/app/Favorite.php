<?php

namespace Modulearn;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    //fields
    protected $fillable = [
        'userId', 'tutorialId'
    ];

    public $timestamps = false;
}

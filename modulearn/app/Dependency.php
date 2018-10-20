<?php

namespace Modulearn;

use Illuminate\Database\Eloquent\Model;

class Dependency extends Model
{
    //
    protected $fillable = [
        'dependency_id', 'dependent_id'
    ];

    public $timestamps = false;
}

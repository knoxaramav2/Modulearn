<?php

namespace Modulearn;

use Illuminate\Database\Eloquent\Model;

class Dependency extends Model
{
    /**
     * Entry dependency joint object
     */
    protected $fillable = [
        'depends_id', 'dependant_id'
    ];
}

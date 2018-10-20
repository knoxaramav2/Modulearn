<?php

namespace Modulearn;

use Illuminate\Database\Eloquent\Model;

class MarkupEntry extends Model
{
    //
    protected $fillable = [
        'content', 'dependents'
    ];
}

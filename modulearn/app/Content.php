<?php

namespace Modulearn;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    //
    protected $fillable = [
        'title', 'content', 'dependents', 'owner_id', 'diff_level'
    ];
}

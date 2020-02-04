<?php

namespace Modulearn;

use Illuminate\Database\Eloquent\Model;

class TagJoint extends Model
{
    //
    protected $fillable = [
        'tag_id', 'post_id'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $guarded = [];

    public function group()
    {
        return $this->belongsTo(Group::class,'group_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $guarded = [];

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

    public function plans()
    {
        return $this->hasMany(Plan::class);
    }
}

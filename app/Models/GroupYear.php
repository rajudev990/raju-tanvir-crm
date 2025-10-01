<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupYear extends Model
{
    protected $guarded = [];

    public function packages()
    {
        return $this->hasMany(Package::class);
    }
    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

    
}

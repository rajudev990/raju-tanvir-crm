<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpenEvent extends Model
{
    protected $guarded = [];

    public function items()
    {
        return $this->hasMany(OpenEventItem::class,'open_events_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpenEventItem extends Model
{
    protected $guarded = [];

    public function openevent(){
        return $this->belongsTo(OpenEvent::class,'open_events_id');
    }
}

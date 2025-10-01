<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdditionalSubject extends Model
{
    protected $guarded = [];

    public function qualification()
    {
        return $this->belongsTo(Qualification::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    
}

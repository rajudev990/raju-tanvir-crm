<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseFee extends Model
{
    protected $guarded = [];

    public function groupyear()
    {
        return $this->belongsTo(GroupYear::class,'group_year_id');
    }

    public function qualification()
    {
        return $this->belongsTo(Qualification::class,'qualification_id');
    }
}

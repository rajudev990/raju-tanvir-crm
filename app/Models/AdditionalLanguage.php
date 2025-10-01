<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdditionalLanguage extends Model
{
    protected $guarded = [];

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}

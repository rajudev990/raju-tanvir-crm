<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    protected $guarded = [];


    public function coreSubjects()
    {
        return $this->hasMany(CoreSubject::class);
    }

    public function additionalSubjects()
    {
        return $this->hasMany(AdditionalSubject::class);
    }
    public function additionalIslamic()
    {
        return $this->hasMany(AdditionalIslamicSubject::class);
    }
    public function additionalLanguages()
    {
        return $this->hasMany(AdditionalLanguage::class);
    }

    public function groupYear()
    {
        return $this->belongsTo(GroupYear::class, 'group_year_id');
    }

    
}

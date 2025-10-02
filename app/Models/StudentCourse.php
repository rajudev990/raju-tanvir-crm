<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentCourse extends Model
{
    protected $guarded = [];

    public function group()
    {
        return $this->belongsTo(StudentGroup::class,'group_id');
    }

    public function year()
    {
        return $this->belongsTo(StudentYear::class,'year_id');
    }
    public function package()
    {
        return $this->belongsTo(StudentPackage::class,'package_id');
    }

    protected $casts = [
        'language'   => 'array',
        'core_subject'       => 'array',
        'islamic_subject'    => 'array',
        'additional_subject' => 'array',
        'hifdh_subject'      => 'array',
    ];
}

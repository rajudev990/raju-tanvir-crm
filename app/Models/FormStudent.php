<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormStudent extends Model
{
    protected $guarded = [];
    
    public function submission()
    {
        return $this->belongsTo(FormSubmission::class, 'form_submission_id');
    }

    public function group()
    {
        return $this->belongsTo(StudentGroup::class, 'group_id');
    }


    public function course()
    {
        return $this->belongsTo(StudentCourse::class,'package_id');
    }

    protected $casts = [
        'core_subjects' => 'array',
        'islamic_subjects' => 'array',
        'additional_subjects' => 'array',
        'language_subjects' => 'array',
        'hifdh_subjects' => 'array',
    ];

}

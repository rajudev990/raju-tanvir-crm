<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormSubmission extends Model
{
    protected $guarded = [];

    public function students()
    {
        return $this->hasMany(FormStudent::class, 'form_submission_id');
    }


    protected $casts = [
        // 'students' => 'array',
        'packages' => 'array',
    ];
}

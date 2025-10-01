<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [];

    public function qualification()
    {
        return $this->belongsTo(Qualification::class);
    }

    public function user()
    {
        return $this->belongsTo(Guardiant::class);
    }

    public function groupyear()
    {
        return $this->belongsTo(GroupYear::class, 'group_year_id');
    }


    public function coreSubjects()
    {
        return $this->belongsToMany(Subject::class, 'core_subject_student', 'student_id', 'subject_id');
    }

    public function additionalSubjects()
    {
        return $this->belongsToMany(Subject::class, 'additional_subject_student', 'student_id', 'subject_id');
    }
    public function additionalIslamic()
    {
        return $this->belongsToMany(Subject::class, 'additional_subject_student_islamic', 'student_id', 'subject_id');
    }
    
    public function additionalHifdh()
    {
        return $this->belongsToMany(Qualification::class, 'additional_hifdh_programme_student', 'student_id', 'qualification_id');
    }

    public function additionalLanguages()
    {
        return $this->belongsToMany(Language::class, 'language_student', 'student_id', 'language_id');
    }


}

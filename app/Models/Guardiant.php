<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guardiant extends Model
{
    protected $guarded = [];

    public function students()
    {
        return $this->hasMany(Student::class,'user_id');
    }

    public function courseFee()
    {
        return $this->belongsTo(CourseFee::class, 'course_fee_id');
    }
    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }
}

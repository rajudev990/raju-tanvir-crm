<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentYear extends Model
{
     protected $guarded = [];

     public function group(){
          return $this->belongsTo(StudentGroup::class,'group_id');
     }
}

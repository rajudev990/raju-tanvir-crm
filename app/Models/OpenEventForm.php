<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpenEventForm extends Model
{
    protected $guarded = [];

    protected $casts = [
        'time' => 'array', // for multiple checkbox values
    ];
}

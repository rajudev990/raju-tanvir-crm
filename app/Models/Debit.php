<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Debit extends Model
{
    protected $guarded = [];

    public function debitstudent()
    {
        return $this->hasMany(DebitStudent::class,'debit_id');
    }
}

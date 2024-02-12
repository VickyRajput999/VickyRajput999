<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendace extends Model
{
    use HasFactory;

    public function attendace() {
        return $this->hasMany(Salary::class, 'id');
    }



}

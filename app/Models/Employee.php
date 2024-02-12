<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function country() {
        return $this->belongsTo(Country::class, 'countryId');
    }
    public function state() {
        return $this->belongsTo(State::class, 'stateId');
    }
    public function city() {
        return $this->belongsTo(city::class, 'cityId');
    }

    
}

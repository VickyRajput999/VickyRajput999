<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class country extends Model
{
    use HasFactory;

    protected $primarykey = "country_id";

    public function employee() {
        return $this->hasMany(Employee::class, 'countryId');
    }

}

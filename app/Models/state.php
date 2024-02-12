<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class state extends Model
{
    use HasFactory;

    protected $primarykey = "state_id";

    public function employee() {
        return $this->hasMany(Employee::class, 'stateId');
    }

}

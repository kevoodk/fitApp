<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FitnessPlanExcercise extends Model
{
    use HasFactory;

    public function fitness {
        return $this->belongsTo('App\Models\FitnessPlan', 'workout_id', 'id');
    }

    public function excercise() {
        return $this->belongsTo('App\Models\Excercise')
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FitnessPlanExcercise extends Model
{
    use HasFactory;

    protected $fillable = ['reps', 'sets', 'workout_id', 'excercise_id'];

    public function fitness() {
        return $this->belongsTo('App\Models\FitnessPlan', 'workout_id', 'id');
    }

    public function excercise() {
        return $this->belongsTo('App\Models\Excercise', 'excercise_id', 'id');
    }
}

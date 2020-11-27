<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FitnessPlan extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'workout_day'];
}

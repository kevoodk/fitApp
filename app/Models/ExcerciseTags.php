<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExcerciseTags extends Model
{
    use HasFactory;

    protected $fillable = ['excercise_id', 'tag_id'];


}

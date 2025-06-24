<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudySystem extends Model
{
    protected $fillable = [
        'name',
        'code',
        'description',
        'is_active',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class StudyProgram extends Model
{
    protected $fillable = [
        'code',
        'name',
        'level',
        'quota',
        'accreditation',
        'is_active',
    ];

    public function concentrations(): HasMany
    {
        return $this->hasMany(Concentration::class);
    }
}

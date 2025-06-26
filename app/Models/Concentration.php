<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concentration extends Model
{
    protected $fillable = [
        'study_program_id',
        'code',
        'name',
        'short_name',
        'quota',
        'description',
        'min_grade',
        'is_active',
    ];

    public function studyProgram()
    {
        return $this->belongsTo(StudyProgram::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'school_type_id',
        'city_id',
        'name',
        'level',
        'npsn',
        'address',
        'is_active',
    ];

    public function schoolType()
    {
        return $this->belongsTo(SchoolType::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}

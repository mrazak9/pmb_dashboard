<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'province_id',
        'code',
        'name',
        'type',
    ];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function districts()
{
    return $this->hasMany(District::class);
}
}

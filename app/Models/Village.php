<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    protected $fillable = [
        'district_id',
        'code',
        'name',
        'type',
    ];

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waves extends Model
{
    protected $table = 'waves_tabel'; // karena nama tabel tidak pakai bentuk jamak Laravel standar

    protected $fillable = [
        'period_id',
        'registration_path_id',
        'name',
        'start_date',
        'end_date',
        'quota',
        'is_active',
    ];

    public function period()
    {
        return $this->belongsTo(Period::class);
    }

    public function registrationPath()
    {
        return $this->belongsTo(RegistrationPath::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaundrySetting extends Model
{
    protected $fillable = [
        'jenis_pakaian',
        'bahan',
        'timer_minutes'
    ];
} 
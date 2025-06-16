<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SensorData extends Model
{
    use HasFactory;

    protected $primaryKey = 'sensor_id';
    public $incrementing = true;
    protected $fillable = ['suhu', 'humidity'];
    const UPDATED_AT = null;
} 
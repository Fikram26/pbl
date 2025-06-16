<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SensorData extends Model
{
    use HasFactory;

    protected $table = 'sensor_data'; // Sesuaikan jika nama tabel Anda berbeda
    protected $primaryKey = 'sensor_id'; // Sesuaikan jika primary key Anda berbeda
    public $incrementing = true;
    protected $fillable = ['suhu', 'humidity'];
    // Jika kolom 'created_at' dan 'updated_at' ada di tabel Anda,
    // dan Anda hanya ingin 'created_at' diupdate secara otomatis oleh Laravel
    // atau Anda hanya menyimpan 'created_at', ini sudah benar.
    // Jika Anda ingin Laravel mengelola kedua timestamp, hapus baris ini:
}
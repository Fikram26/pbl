<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Login;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_pakaian',
        'bahan_pakaian',
        'banyak',
        'account_id',
        'status',
        'payment_status',
        'timer_duration',
        'started_at'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'started_at' => 'datetime'
    ];

    /**
     * Get the account that owns the order.
     */
    public function account()
    {
        return $this->belongsTo(Login::class);
    }
} 
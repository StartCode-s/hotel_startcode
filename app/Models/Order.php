<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';

    protected $fillable = [
        'user_id',
        'guest_name',
        'payment_method',
        'payment_status',
        'transaction_id',
        'transaction_time',
        'status',
        'order_code',
        'check_in',
        'check_out',
        'total_harga',
        'kamar_id',
        'status',
    ];

    use HasFactory;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';

    protected $fillable = [
        'user_id',
        'order_code',
        'check_in',
        'check_out',
        'total_harga',
        'kamar_id',
        'status',
    ];

    use HasFactory;
}

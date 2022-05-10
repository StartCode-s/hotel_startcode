<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $table = 'kamar';
    protected $fillable = ['id', 'tipe_id', 'nama', 'harga', 'jumlah_kamar', 'jumlah_kamar_mandi', 'fasilitas', 'max', 'status', 'thumb' ];
    use HasFactory;
}

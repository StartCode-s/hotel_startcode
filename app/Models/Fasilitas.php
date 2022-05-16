<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{ 
    protected $table = 'fasilitas';
    protected $fillable = ['name','desc'];
    use HasFactory;
}

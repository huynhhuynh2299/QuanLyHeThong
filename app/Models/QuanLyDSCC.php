<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuanLyDSCC extends Model
{
    use HasFactory;
    public $timestamps = false; // turn off laravel create update_at and create_at
    protected $table = "danhsachchungchi";
}

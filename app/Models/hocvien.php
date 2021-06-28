<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hocvien extends Model
{
    use HasFactory;
    protected $table = "hocvien";
    public $timestamps = false;

    public function getAll()
    {
        return hocvien::all();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hocvien extends Model
{
    use HasFactory;
    protected $table = "hocvien";
    public $timestamps = false;

    // lấy một
    public function thuoc_doituong(){
        return $this->belongsTo("App\\Models\\doituong","id_DOITUONG","id");
    }

    // lấy chuỗi
    public function lay_lop(){
        return $this->hasMany("App\\Models\\lop","id_HOCVIEN","id");
    }

    public function lay_nguoiquen(){
        return $this->hasMany("App\\Models\\nguoiquen","id_HOCVIEN","id");
    }

    public function lay_cutruhv(){
        return $this->hasMany("App\\Models\\cutruhv","id_HOCVIEN","id");
    }

    public function lay_diem(){
        return $this->hasMany("App\\Models\\diem","id_HOCVIEN","id");
    }

    public function lay_congviec(){
        return $this->hasMany("App\\Models\\diem","id_HOCVIEN","id");
    }

    public function lay_dscc(){
        return $this->hasMany("App\\Models\\danhsachchungchi","id_HOCVIEN","id");
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cutruhv extends Model
{
    use HasFactory;
    protected $table = "cutruhv";
    public $timestamps = false;

    public function getAll()
    {
        return cutruhv::all();
    }

    // truy vấn bằng id của bảng
    public function getByID(int $id)
    {
        return cutruhv::all()->where("id", $id);
    }

    // truy vấn theo giá trị một cột bất kỳ
    public function getByCol(String $col, String $value)
    {
        return cutruhv::all()->where($col, $value);
    }

    // truy vấn theo giá trị 2 cột bất kỳ
    public function getBy2Col(
        String $col1,
        String $value1,
        String $col2,
        String $value2
    ) {
        return cutruhv::all()
            ->where($col1, $value1)
            ->where($col2, $value2);
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\QuanLyDayNghe;
use Illuminate\Http\Request;

class DayNgheController extends Controller
{
    public function insert(string $GV_MASO, string $NN_MASO){
        $new_row = new QuanLyDayNghe();
        $new_row->GV_MASO = $GV_MASO;
        $new_row->NN_MASO = $NN_MASO;
        $new_row->save();
    }

    public function update(int $stt, string $ten){
        $edit_row = QuanLyDayNghe::find($stt);
        $edit_row->ten = $ten;
        $edit_row->save();
    }

    public function delete(int $stt){
        $del_row = QuanLyDayNghe::find($stt);
        $del_row->delete();
    }

    public function getAll(){
        return QuanLyDayNghe::all();
    }

    public function get(int $value){ // Truy vấn theo stt bất kỳ
        return QuanLyDayNghe::all()->where("STT",$value);
    }
}

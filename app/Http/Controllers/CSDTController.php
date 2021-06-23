<?php

namespace App\Http\Controllers;

use App\Models\QuanLyCSDT;

use Illuminate\Http\Request;

class CSDTController extends Controller
{
    public function insert(string $CS_MASO, string $TEN_TINH, string $TEN_HUYEN, string $TEN_XA, string $CS_TEN, string $CS_SO_DUONG)
    {
        $new_row = new QuanLyCSDT();
        $new_row->CS_MASO = $CS_MASO;
        $new_row->TEN_TINH = $TEN_TINH;
        $new_row->TEN_HUYEN = $TEN_HUYEN;
        $new_row->TEN_XA = $TEN_XA;
        $new_row->CS_TEN = $CS_TEN;
        $new_row->CS_SO_DUONG = $CS_SO_DUONG;
        $new_row->save();
    }

    public function update(string $CS_MASO, string $TEN_TINH, string $TEN_HUYEN, string $TEN_XA, string $CS_TEN, string $CS_SO_DUONG)
    {
        $edit_row = QuanLyCSDT::find($CS_MASO);
        $edit_row->CS_TEN = $CS_TEN;
        $edit_row->TEN_TINH = $TEN_TINH;
        $edit_row->TEN_HUYEN = $TEN_HUYEN;
        $edit_row->TEN_XA = $TEN_XA;
        $edit_row->CS_SO_DUONG = $CS_SO_DUONG;
        $edit_row->save();
    }

    public function delete(string $CS_MASO)
    {
        $del_row = QuanLyCSDT::find($CS_MASO);
        $del_row->delete();
    }

    public function getAll()
    {
        return QuanLyCSDT::all();
    }

    public function get(int $value)
    { // Truy vấn theo maso- bất kỳ
        return QuanLyCSDT::all()->where("CS_MASO", $value);
    }
}

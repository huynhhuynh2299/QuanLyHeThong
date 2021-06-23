<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuanLyDoiTuong;
use App\Models\QuanLyGiaoVien;
use App\Models\QuanLyHuyen;
use App\Models\QuanLyTinh;
use App\Models\QuanLyXa;
use Illuminate\Support\Facades\Redirect;

class GiaoVienController extends Controller
{
    // Danh sach
    public function getDanhSach()
    {
        $hocvien_all = QuanLyGiaoVien::all();

        $tinh_all = QuanLyTinh::all();
        $huyen_all = QuanLyHuyen::all();
        $xa_all = QuanLyXa::all();


        return view(
            'Admin.QuanLyGiaoVien.DanhSach',
            [
                'quanlygiaovien' => $hocvien_all,
                'tinh_all' => $tinh_all,
                'huyen_all' => $huyen_all,
                'xa_all' => $xa_all,
                ]
        );
    }

    public function getThem()
    {
        $hocvien_all = QuanLyGiaoVien::all();

        $tinh_all = QuanLyTinh::all();
        $huyen_all = QuanLyHuyen::all();
        $xa_all = QuanLyXa::all();
        
        return view(
            'Admin.QuanLyGiaoVien.Them',
            [
                'quanlygiaovien' => $hocvien_all,
                'tinh_all' => $tinh_all,
                'huyen_all' => $huyen_all,
                'xa_all' => $xa_all,
            ]
        );
    }
}

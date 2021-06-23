<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuanLyHocVien;
use App\Models\QuanLyDoiTuong;
use App\Models\QuanLyHuyen;
use App\Models\QuanLyTinh;
use App\Models\QuanLyXa;

class HocVienController extends Controller
{
    //




    public function getDanhSach()
    {
        $hocvien_all = QuanLyHocVien::all();

        $tinh_all = QuanLyTinh::all();
        $huyen_all = QuanLyHuyen::all();
        $xa_all = QuanLyXa::all();

        $doituong_all = QuanLyDoiTuong::all();

        return view(
            'Admin.QuanLyHocVien.DanhSach',
            [
                'quanlyhocvien' => $hocvien_all,
                'tinh_all' => $tinh_all,
                'huyen_all' => $huyen_all,
                'xa_all' => $xa_all,
                'doituong_all' => $doituong_all,
            ]
        );
    }

    public function getThem()
    {

        return view('Admin/QuanLyHocVien/Them');
    }


    public function postThem(Request $request)
    {

        $hocvien = new QuanLyHocVien;

        $hocvien->HV_MASO = $request->maso;
        $hocvien->HV_CMND = $request->cmnd;
        $hocvien->TEN_TINH = $request->tinh;
        $hocvien->TEN_HUYEN = $request->huyen;
        $hocvien->TEN_XA = $request->xa;
        $hocvien->DT_MASO = $request->madoituong;
        $hocvien->HV_HOTEN = $request->tenhv;
        $hocvien->HV_SDT = $request->sodienthoai;
        $hocvien->HV_NGAYSINH = $request->ngaysinh;
        $hocvien->HV_GIOITINH = $request->gioitinh;
        $hocvien->save();
        return view('Admin/QuanLyHocVien/Them');
    }

    public function getXoa($id)
    {
        $quanlyhocvien = QuanLyHocVien::find($id);
        $quanlyhocvien->delete();
        return view('Admin/QuanLyHocVien/DanhSach');
    }


    public function getById($id)
    {
        $getById = QuanLyHocVien::where('HV_MASO', $id)->get();
        return response()->json($getById, 200);
    }
}

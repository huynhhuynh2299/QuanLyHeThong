<?php

namespace App\Http\Controllers;

use App\Models\cutruhv;
use App\Models\doituong;
use App\Models\hocvien;
use App\Models\huyen;
use App\Models\tinh;
use App\Models\xa;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

class HocVienController extends Controller
{
    // CÁC PHƯƠNG THỨC TRUY VẤN //

    // truy vấn toàn bộ bảng
    public function getAll()
    {
        return hocvien::all();
    }

    // truy vấn bằng id của bảng
    public function getByID(int $id)
    {
        $hocvien = hocvien::find($id);
        $cutru = hocvien::find($id)->lay_cutruhv;
        foreach ($cutru as $key) :
            if ($key->THUONG_TRU == "YES") {

                $dcThuongTru = $key;

                $xa_tr = xa::find($key->id_XA);
                $huyen_tr = xa::find($key->id_XA)->lay_huyen;
                $tinh_tr = huyen::find($huyen_tr->id)->lay_tinh;

                $dcThuongTru->XA = $xa_tr->TEN_XA;
                $dcThuongTru->HUYEN = $huyen_tr->TEN_HUYEN;
                $dcThuongTru->TINH = $tinh_tr->TEN_TINH;
            }
            if ($key->THUONG_TRU == "NO") {
                $dcNguyenQuan = $key;

                $xa_nq = xa::find($key->id_XA);
                $huyen_nq = xa::find($key->id_XA)->lay_huyen;
                $tinh_nq = huyen::find($huyen_nq->id)->lay_tinh;

                $dcNguyenQuan->XA = $xa_nq->TEN_XA;
                $dcNguyenQuan->HUYEN = $huyen_nq->TEN_HUYEN;
                $dcNguyenQuan->TINH = $tinh_nq->TEN_TINH;
            }
        endforeach;

        $response = $hocvien;

        $response->THUONG_TRU = $dcThuongTru;
        $response->NGUYEN_QUAN = $dcNguyenQuan;

        return $response;
    }

    // truy vấn theo giá trị một cột bất kỳ
    public function getByCol(String $col, String $value)
    {
        return hocvien::all()->where($col, $value);
    }

    // truy vấn theo giá trị 2 cột bất kỳ
    public function getBy2Col(
        String $col1,
        String $value1,
        String $col2,
        String $value2
    ) {
        return hocvien::all()
            ->where($col1, $value1)
            ->where($col2, $value2);
    }
    // truy vấn theo n cột bất kỳ dựa theo code mẫu ở trên tự edit theo từng trường hợp

    //***************************************************************

    // CÁC PHƯƠNG THỨC XỬ LÝ BẢNG //

    // thao tác insert
    public function insert(
        String $HV_CMND,
        String $HV_HOTEN,
        String $HV_SDT,
        String $HV_NGAYSINH,
        String $HV_GIOITINH,
        String $HV_TTVIECLAM,
        String $HV_DANTOC,
        String $HV_HOCVAN,
        String $HV_CHUANDAURA,
        String $HV_NOILAMVIECDUKIEN,
        int $id_DOITUONG
    ) {
        $NEW_ROW = new hocvien();
        $NEW_ROW->HV_CMND = $HV_CMND;
        $NEW_ROW->HV_HOTEN = $HV_HOTEN;
        $NEW_ROW->HV_SDT = $HV_SDT;
        $NEW_ROW->HV_NGAYSINH = $HV_NGAYSINH;
        $NEW_ROW->HV_GIOITINH = $HV_GIOITINH;
        $NEW_ROW->HV_TTVIECLAM = $HV_TTVIECLAM;
        $NEW_ROW->HV_DANTOC = $HV_DANTOC;
        $NEW_ROW->HV_HOCVAN = $HV_HOCVAN;
        $NEW_ROW->HV_CHUANDAURA = $HV_CHUANDAURA;
        $NEW_ROW->HV_NOILAMVIECDUKIEN = $HV_NOILAMVIECDUKIEN;
        $NEW_ROW->id_DOITUONG = $id_DOITUONG;
        $NEW_ROW->save();
    }

    // thao tác update
    public function update(
        int $id,
        String $HV_CMND,
        String $HV_HOTEN,
        String $HV_SDT,
        String $HV_NGAYSINH,
        String $HV_GIOITINH,
        String $HV_TTVIECLAM,
        String $HV_DANTOC,
        String $HV_HOCVAN,
        String $HV_CHUANDAURA,
        String $HV_NOILAMVIECDUKIEN,
        int $id_DOITUONG
    ) {
        $NEW_ROW = hocvien::find($id);
        $NEW_ROW->HV_CMND = $HV_CMND;
        $NEW_ROW->HV_HOTEN = $HV_HOTEN;
        $NEW_ROW->HV_SDT = $HV_SDT;
        $NEW_ROW->HV_NGAYSINH = $HV_NGAYSINH;
        $NEW_ROW->HV_GIOITINH = $HV_GIOITINH;
        $NEW_ROW->HV_TTVIECLAM = $HV_TTVIECLAM;
        $NEW_ROW->HV_DANTOC = $HV_DANTOC;
        $NEW_ROW->HV_HOCVAN = $HV_HOCVAN;
        $NEW_ROW->HV_CHUANDAURA = $HV_CHUANDAURA;
        $NEW_ROW->HV_NOILAMVIECDUKIEN = $HV_NOILAMVIECDUKIEN;
        $NEW_ROW->id_DOITUONG = $id_DOITUONG;
        $NEW_ROW->save();
    }

    // thao tác delete

    /*
    public function delete(int $id){
        hocvien::find($id)->delete();
    }
    */

    //***************************************************************

    // CÁC TRIGGER 

    //**************************************************************
    public function getDanhSach()
    {
        $hocvien_all = hocvien::all();
        $cutruhv = new cutruhv();

        $tinh_all = tinh::all();
        $huyen_all = huyen::all();
        $xa_all = xa::all();

        $doituong_all = doituong::all();

        return view(
            'Admin.QuanLyHocVien.DanhSach',
            [
                'cutruhv_all' => $cutruhv->getAll(),
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
        $hocvien_all = hocvien::all();

        $tinh_all = tinh::all();
        $huyen_all = huyen::all();
        $xa_all = xa::all();

        $doituong_all = doituong::all();

        return view(
            'Admin.QuanLyHocVien.Them',
            [
                'quanlyhocvien' => $hocvien_all,
                'tinh_all' => $tinh_all,
                'huyen_all' => $huyen_all,
                'xa_all' => $xa_all,
                'doituong_all' => $doituong_all,
            ]
        );
    }


    public function postThem(Request $request)
    {

        $hocvien = new hocvien();

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
        $quanlyhocvien = hocvien::find($id);
        $quanlyhocvien->delete();
        return view('Admin/QuanLyHocVien/DanhSach');
    }



    public function add(Request $request)
    {
        // validation

        $request->validate([
            'madoituong' => 'required',

            'nguyenquan_tinh' => 'required',
            'nguyenquan_huyen' => 'required',
            'nguyenquan_xa' => 'required',

            'ngaysinh' => 'required',
            'tenhv' => 'required|max:50',
            'cmnd' => 'required',
            'gioitinh' => 'required',
            'sodienthoai' => 'required|numeric',
        ], [
            'required' => ':attribute không được để trống',
            'max' => ':attribute không được quá :max kí tự',
            'numeric' => ':attribute phải nhập chỉ số',
            'unique' => ':attribute đã tồn tại ',
        ], [
            'tenhv' => 'Họ tên học viên',
            'cmnd' => 'CMDN/CCCD',
            'nguyenquan_tinh' => 'Tỉnh/Thành phố',
            'nguyenquan_huyen' => 'Quận/Huyện',
            'nguyenquan_xa' => 'Phường/Xã',
            'ngaysinh' => 'Ngày sinh',
            'gioitinh' => 'Giới tính',
            'sodienthoai' => 'Số điện thoại',
        ]);

        // $hocvien = QuanLyHocVien::where('HV_MASO', $request->maso)->update([
        //     'HV_CMND' => $request->cmnd,
        //     'TEN_TINH' => $request->nguyenquan_tinh,
        //     'TEN_HUYEN' => $request->nguyenquan_huyen,
        //     'TEN_XA' => $request->nguyenquan_xa,
        //     'DT_MASO' => $request->madoituong,
        //     'HV_HOTEN' => $request->tenhv,
        //     'HV_SDT' => $request->sodienthoai,
        //     'HV_NGAYSINH' => $request->ngaysinh,
        //     'HV_GIOITINH' => $request->gioitinh,
        // ]);

        $hocvien = new hocvien();
        $hocvien->HV_MASO = $request->cmnd;
        $hocvien->HV_CMND = $request->cmnd;
        $hocvien->TEN_TINH  = $request->nguyenquan_tinh;
        $hocvien->TEN_HUYEN = $request->nguyenquan_huyen;
        $hocvien->TEN_XA = $request->nguyenquan_xa;
        $hocvien->DT_MASO = $request->madoituong;
        $hocvien->HV_HOTEN  = $request->tenhv;
        $hocvien->HV_SDT  = $request->sodienthoai;
        $hocvien->HV_NGAYSINH  = $request->ngaysinh;
        $hocvien->HV_GIOITINH  = $request->gioitinh;

        $hocvien->save();

        return Redirect::to('danhsachhocvien');
    }

    public function edit(Request $request)
    {
        // validation

        $request->validate([
            'maso' => 'required',
            'madoituong' => 'required',

            'nguyenquan_tinh' => 'required',
            'nguyenquan_huyen' => 'required',
            'nguyenquan_xa' => 'required',

            'ngaysinh' => 'required',
            'tenhv' => 'required|max:50',
            'cmnd' => 'required',
            'gioitinh' => 'required',
            'sodienthoai' => 'required|numeric',
        ], [
            'required' => ':attribute không được để trống',
            'max' => ':attribute không được quá :max kí tự',
            'numeric' => ':attribute phải nhập chỉ số',
            'unique' => ':attribute đã tồn tại ',
        ], [
            'tenhv' => 'Họ tên học viên',
            'cmnd' => 'CMDN/CCCD',
            'nguyenquan_tinh' => 'Tỉnh/Thành phố',
            'nguyenquan_huyen' => 'Quận/Huyện',
            'nguyenquan_xa' => 'Phường/Xã',
            'ngaysinh' => 'Ngày sinh',
            'gioitinh' => 'Giới tính',
            'sodienthoai' => 'Số điện thoại',
        ]);

        $hocvien = hocvien::where('HV_MASO', $request->maso)->update([
            'HV_CMND' => $request->cmnd,
            'TEN_TINH' => $request->nguyenquan_tinh,
            'TEN_HUYEN' => $request->nguyenquan_huyen,
            'TEN_XA' => $request->nguyenquan_xa,
            'DT_MASO' => $request->madoituong,
            'HV_HOTEN' => $request->tenhv,
            'HV_SDT' => $request->sodienthoai,
            'HV_NGAYSINH' => $request->ngaysinh,
            'HV_GIOITINH' => $request->gioitinh,
        ]);

        return Redirect::to('danhsachhocvien');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuanLyHocVien;
use App\Models\QuanLyDoiTuong;
class HocVienController extends Controller
{
    //


 

   public function getDanhSach(){
    
     
         $quanlyhocvien = QuanLyHocVien::all();
         return view('Admin.QuanLyHocVien.DanhSach',['quanlyhocvien'=>$quanlyhocvien]);
    }

     public function getThem(){

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

public function getXoa($id){
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

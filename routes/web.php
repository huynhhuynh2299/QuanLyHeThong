<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



// code phần học viên nữa sẽ đưa vào nhóm học viên sau nha <3
//Route::group(['prefix' => 'hocvien'], function () {
Route::get('themhocvien','HocVienController@getThem');
Route::post('themhocvien','HocVienController@postThem');
Route::get('danhsachhocvien','HocVienController@getDanhSach');
Route::get('xoa/{id}','HocVienController@getXoa');    
Route::get('show/{id}', 'HocVienController@getById');
//  });
// end hoc vien
















// code tạm

Route::get('themgiaovien',function(){
    return view('Admin.QuanLyGiaoVien.Them');
});

Route::get('danhsachgiaovien',function(){
    return view('Admin.QuanLyGiaoVien.DanhSach');
});
Route::get('giaodiengiaovien',function(){
    return view('Admin.QuanLyGiaoVien.GiaoDien');
});

Route::get('tongquan',function(){
    return view('Admin.TongQuan.DanhSach');
});
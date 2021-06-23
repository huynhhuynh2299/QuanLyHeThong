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
Route::get('themhocvien', 'HocVienController@getThem');
Route::get('danhsachhocvien', 'HocVienController@getDanhSach');
Route::get('xoa/{id}', 'HocVienController@getXoa');
Route::get('hocvien/{id}', 'HocVienController@show');
Route::post('hocvien/edit', 'HocVienController@edit');
Route::post('hocvien/add', 'HocVienController@add');
//  });
// end hoc vien
// Load location
Route::get('location', 'LocationController@load');

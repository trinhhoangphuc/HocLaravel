<?php

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

Route::get('/chude', 'ChudeController@index');
Route::post('/chude', 'ChudeController@store');
Route::get('/chude/{id}', 'ChudeController@show');
Route::put('/chude/{id}', 'ChudeController@update');
Route::delete('/chude/{id}', 'ChudeController@destroy');

Route::get('/quyen', 'QuyenController@index');
Route::post('/quyen', 'QuyenController@store');
Route::get('/quyen/{id}', 'QuyenController@show');
Route::put('/quyen/{id}', 'QuyenController@update');
Route::delete('/quyen/{id}', 'QuyenController@destroy');

Route::get('/loai', 'LoaiController@index');
Route::post('/loai', 'LoaiController@store');
Route::get('/loai/{id}', 'LoaiController@show');
Route::put('/loai/{id}', 'LoaiController@update');
Route::delete('/loai/{id}', 'LoaiController@destroy');

Route::get('/nhanvien', 'NhanvienController@index');
Route::post('/nhanvien', 'NhanvienController@store');
Route::get('/nhanvien/{id}', 'NhanvienController@show');
Route::put('/nhanvien/{id}', 'NhanvienController@update');
Route::delete('/nhanvien/{id}', 'NhanvienController@destroy');

Route::get('/khachhang', 'KhachhangController@index');
Route::post('/khachhang', 'KhachhangController@store');
Route::get('/khachhang/{id}', 'KhachhangController@show');
Route::put('/khachhang/{id}', 'KhachhangController@update');
Route::delete('/khachhang/{id}', 'KhachhangController@destroy');
Route::get('/getTotalKH', 'KhachhangController@getTotal');
Route::get('/getRangeKH/{skip}/{take}', 'KhachhangController@getRange');

Route::get('/sanpham', 'SanphamController@index');
Route::post('/sanpham', 'SanphamController@store');
Route::get('/sanpham/{id}', 'SanphamController@show');
Route::put('/sanpham/{id}', 'SanphamController@update');
Route::delete('/sanpham/{id}', 'SanphamController@destroy');
Route::get('/ktsanpham/{value}', 'SanphamController@checkExit_ten');
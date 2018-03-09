<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nhanvien extends Model
{
    const CREATE_AT = 'nv_taoMoi';
    const UPDATE_AT = 'nv_capNhat';

    protected $table = 'nhanvien';
    protected $primaryKey = 'nv_ma';
    protected $guarded = ['nv_ma', 'nv_taiKhoan', 'nv_email'];
    protected $fillable = ['nv_matKhau', 'nv_hoTen', 'nv_gioiTinh', 'nv_ngaySinh', 'nv_diaChi', 'nv_diaThoai', 'nv_taoMoi', 'nv_capNhat', 'nv_trangThai', 'q_ma'];
    protected $dates = 'nv_ngaySinh';
    protected $dateformat = 'Y-m-d H:i:s';
}

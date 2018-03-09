<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class khachhang extends Model
{
    const CREATE_AT = 'kh_taoMoi';
    const UPDATE_AT = 'kh_capNhat';

    protected $table = 'khachhang';
    protected $guarded = ['kh_ma', 'kh_taiKhoan'];
    protected $primaryKey = 'kh_ma';

    protected $fillable = ['kh_matKhau','kh_hoTen','kh_gioiTinh','kh_ngaySinh', 'kh_diaChi', 'kh_taoMoi', 'kh_capNhat', 'kh_trangThai'];
    protected $dates = 'kh_ngaySinh';
    protected $dateFormat = 'Y-m-d H:i:s';
}

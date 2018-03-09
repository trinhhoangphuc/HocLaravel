<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
    const CREATE_AT = 'sp_taoMoi';
    const UPDATE_AT = 'sp_capNhat';

    protected $table = 'sanpham';
    protected $primaryKey = 'sp_ma';
    protected $gaurded = ['sp_ma'];
    protected $fillable = [
    	'sp_ten', 
    	'sp_giaGoc', 
    	'sp_giaBan', 
    	'sp_hinh', 
    	'sp_thongTin', 
    	'sp_danhGia',
    	'sp_taoMoi',
    	'sp_capNhat',
    	'sp_trangThai',
    	'l_ma'
    ]; 
}

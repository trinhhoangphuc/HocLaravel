<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loai extends Model
{
    const CREATE_AT = 'l_taoMoi';
    const UPDATE_AT = 'l_capNhat';

    protected $table = 'loai';
    protected $primaryKey = 'l_ma';
    protected $guarded = ['l_ma'];
    protected $fillable = ['l_ten', 'l_taoMoi', 'l_capNhat', 'l_trangThai'];
    protected $dates = ['l_taoMoi', 'l_capNhat'];
    protected $dateFormat = 'Y-m-d H:i:s';
}

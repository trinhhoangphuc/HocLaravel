<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class thanhtoan extends Model
{
    const CREATE_AT = 'tt_taoMoi';
    const UPDATE_AT = 'tt_capNhat';

    protected $table = 'thanhtoan';
    protected $primaryKey = 'tt_ma';
    protected $guarded = ['tt_ma'];
    protected $fillable = ['tt_ten', 'tt_dienGiai', 'tt_taoMoi', 'tt_capNhat', 'tt_trangThai'];
    protected $dates = ['tt_taoMoi', 'tt_capNhat'];
    protected $dateFormat = 'Y-m-d H:i:s';
}

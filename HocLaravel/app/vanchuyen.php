<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vanchuyen extends Model
{
    const CREATE_AT = 'vc_taoMoi';
    const UPDATE_AT = 'vc_capNhat';

    protected $table = 'vanchuyen';
    protected $primaryKey = 'vc_ma';
    protected $guarded = ['vc_ma'];
    protected $fillable = ['vc_ten', 'vc_chiPhi', 'vc_dienGiai', 'vc_taoMoi', 'vc_capNhat', 'vc_trangThai'];
    protected $dates = ['vc_taoMoi', 'vc_capNhat'];
    protected $dateFormat = 'Y-m-d H:i:s';
}

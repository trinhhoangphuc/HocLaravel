<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chude extends Model
{
    const CREATE_AT = 'cd_taoMoi';
    const UPDATE_AT = 'cd_capNhat';

    protected $table = 'chude';
    protected $fillable = ['cd_ten', 'cd_taoMoi', 'cd_capNhat', 'cd_trangThai'];
    protected $guarded = ['cd_ma'];
    protected $primaryKey = 'cd_ma';
    protected $dates = ['cd_taoMoi', 'cd_capNhat'];
    protected $dateFormat = 'Y-m-d H:i:s'; 
}

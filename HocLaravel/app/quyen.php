<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class quyen extends Model
{
    const CREATE_AT = 'q_taoMoi';
    const UPDATE_AT = 'q_capNhat';

    protected $table = 'quyen';
    protected $primaryKey = 'q_ma';
    protected $guarded = ['q_ma'];
    protected $fillable = ['q_ten', 'q_dienGiai', 'q_taoMoi', 'q_capNhat', 'q_trangThai'];
    protected $dates = ['q_taoMoi', 'q_caNhat'];
    protected $dateFormat = 'Y-m-d H:i:s';
}

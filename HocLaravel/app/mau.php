<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mau extends Model
{
    const CREATE_AT = 'm_taoMoi';
    const UPDATE_AT = 'm_capNhat';

    protected $table = 'mau';
    protected $primaryKey = 'm_ma';
    protected $guarded = ['m_ma'];
    protected $fillable = ['m_ten', 'm_taoMoi', 'm_capNhat', 'm_trangThai'];
    protected $dates = ['m_taoMoi', 'm_capNhat'];
    protected $dateFormat = 'Y-m-d H:i:s';
}

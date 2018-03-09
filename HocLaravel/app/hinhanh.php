<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hinhanh extends Model
{
    protected $table = 'hinhanh';
    protected $fillable = ['sp_ma', 'ha_stt', 'ha_ten'];
    protected $guarded      = [];
    protected $primaryKey   = ;
    public    $timestamps   = false;
    public    $incrementing = false;
}

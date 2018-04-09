<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietHDNhap extends Model
{
    //
    protected $table = 'ct_hd_nhap';

    public $timestamps = false;

    protected $primaryKey = 'ma_cthd';
}

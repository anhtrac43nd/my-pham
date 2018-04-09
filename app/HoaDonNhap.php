<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoaDonNhap extends Model
{
    //
    protected $table = 'hoa_don_nhap';

    public $timestamps = false;

    protected $primaryKey = 'ma_hdn';
}

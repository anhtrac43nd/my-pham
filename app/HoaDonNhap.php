<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoaDonNhap extends Model
{
    //
    protected $table = 'hoa_don_nhap';

    public $timestamps = false;

	protected $fillable = ['ngay_nhap', 'tong_tien_nhap'];
    
    protected $primaryKey = 'ma_hdn';
}

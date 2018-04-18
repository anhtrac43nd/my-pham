<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoaDonBan extends Model
{
    //
    protected $table = 'hoa_don_ban';

    public $timestamps = false;

    protected $primaryKey = 'ma_hd';

    protected $fillable = [
        'ma_nd', 'ngay_dat_hang', 'tong_tien','trang_thai_chuyen_tien','trang_thai_nhan'
    ];

    public function nguoiDung(){
    	return $this->belongsTo('App\NguoiDung','ma_nd');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietHDNhap extends Model
{
    //
    protected $table = 'ct_hd_nhap';

    public $timestamps = false;
    protected $fillable = ['ma_hdn', 'ma_sp', 'so_luong', 'gia_nhap', 'thanh_tien'];
    protected $primaryKey = 'ma_cthd';

    public function sanPham(){
    	return $this->belongsTo('App\SanPham','ma_sp');
    }
}

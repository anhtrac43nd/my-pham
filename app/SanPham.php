<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    //
    protected $table = 'san_pham';

    public $timestamps = false;

    protected $primaryKey = 'ma_sp';

    public function loaiSanPham(){
    	return $this->belongsTo('App\LoaiSanPham','ma_loai');
    }

    public function thuongHieu(){
    	return $this->belongsTo('App\ThuongHieu','ma_thuong_hieu');
    }
}

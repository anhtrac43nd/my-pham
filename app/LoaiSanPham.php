<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model
{
    //
    protected $table = 'loai_sp';

    public $timestamps = false;

    protected $primaryKey = 'ma_loai';

    // public function sanPham(){
    
    // 	return $this->hasMany('App\SanPham','ma_loai','ma_sp');
    // }
}

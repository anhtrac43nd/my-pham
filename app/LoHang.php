<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoHang extends Model
{
    //
    protected $table = 'lo_hang';

    public $timestamps = false;

    protected $fillable = ['ma_sp', 'so_luong', 'gia_nhap', 'thanh_tien', 'ngay_sx', 'thanh_ly'];

    public function sanPham(){
        return $this->belongsTo('App\SanPham','ma_sp');
    }

    protected $primaryKey = 'ma_lo';
}

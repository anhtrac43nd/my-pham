<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietHDBan extends Model
{
    //
    protected $table = 'ct_hd_ban';

    public $timestamps = false;

    protected $primaryKey = 'ma_ct_hdb';

    protected $fillable = ['ma_hdb', 'ma_sp', 'so_luong_ban', 'gia_sp', 'thanh_tien'];

    public function sanPham(){
    	return $this->belongsTo('App\SanPham','ma_sp');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoaDonBan extends Model
{
    //
    protected $table = 'hoa_don_ban';

    public $timestamps = false;

    protected $primaryKey = 'ma_sp';

    public function nguoiDung(){
    	return $this->belongsTo('App\NguoiDung','ma_nd');
    }
}

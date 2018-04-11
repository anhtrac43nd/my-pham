<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\NguoiDung as Authenticatable;

class NguoiDung extends Model
{
    //
    protected $table = 'nguoi_dung';

    public $timestamps = false;

    protected $primaryKey = 'ma_nd';

    protected $fillable = [
        'ten_nd', 'sdt', 'dia_chi','ten_tk','mat_khau','ma_quyen'
    ];

    public function quyen(){
    	return $this->belongsTo('App\Quyen','ma_quyen');
    }

}

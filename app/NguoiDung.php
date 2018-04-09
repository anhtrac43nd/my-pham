<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NguoiDung extends Model
{
    //
    protected $table = 'nguoi_dung';

    public $timestamps = false;

    protected $primaryKey = 'ma_nd';

    public function quyen(){
    	return $this->belongsTo('App\Quyen','ma_quyen');
    }

}

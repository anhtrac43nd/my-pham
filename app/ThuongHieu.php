<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThuongHieu extends Model
{
    //
    protected $table = 'thuong_hieu';

    public $timestamps = false;

    protected $primaryKey = 'ma_thuong_hieu';
    
}

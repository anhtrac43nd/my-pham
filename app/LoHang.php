<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoHang extends Model
{
    //
    protected $table = 'lo_hang';

    public $timestamps = false;

    protected $primaryKey = 'ma_lo';
}

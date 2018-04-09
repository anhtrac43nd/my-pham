<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoaDonBan extends Model
{
    //
    protected $table = 'hoa_don_ban';

    public $timestamps = false;

    protected $primaryKey = 'ma_sp';
}

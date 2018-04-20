<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LoHang;

class LoHangController extends Controller
{
    //
    public function  getDanhSach(){
        $lo_hang = LoHang::all();
        return view('admin.pages.lo_hang.danh_sach', compact('lo_hang'));
    }
}

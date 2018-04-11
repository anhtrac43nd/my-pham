<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HoaDonBan;
use App\ChiTietHDBan;
class HoaDonBanController extends Controller
{
    //
    public function getDanhSach(){
    	$hoa_don = HoaDonBan::all();
    	return view('admin.pages.hoa_don_ban.danh_sach', compact('hoa_don'));
    }

    public function getChiTietHD($id){
    	// dd('a');
    	$chi_tiet_hd = ChiTietHDBan::where('ma_hdb',$id)->get();
    	return view('admin.pages.hoa_don_ban.chi_tiet_hd.danh_sach', compact('chi_tiet_hd'));
    }
}

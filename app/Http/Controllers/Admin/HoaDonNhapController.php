<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HoaDonNhap;
use App\ChiTietHDNhap;
class HoaDonNhapController extends Controller
{
    //
    public function getDanhSach(){
    	$hoa_don = HoaDonNhap::all();
    	return view('admin.pages.hoa_don_nhap.danh_sach', compact('hoa_don'));
    }

    public function getChiTietHD($id){
    	$chi_tiet_hd = ChiTietHDNhap::where('ma_hdn', $id)->get();
    	// dd($chi_tiet_hd);
    	return view('admin.pages.hoa_don_nhap.chi_tiet_hd.danh_sach', compact('chi_tiet_hd'));
    }
}

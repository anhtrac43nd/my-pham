<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HoaDonBan;
use App\HoaDonNhap;
use App\ChiTietHDBan;
use App\ChiTietHDNhap;
use Illuminate\Support\Facades\Session;

class InHoaDonController extends Controller
{
    //
    public function inHDB($id){
        $hoa_don = HoaDonBan::find($id);
        $chi_tiet_hd = ChiTietHDBan::where('ma_hdb', $id)->get();
        $ten_nv = Session::get('nguoi_dung.ten_nd');
        $date = Date('h:i:s y-m-d');
//        dd($chi_tiet_hd);
        return view('admin.pages.in_hoa_don.hoa_don_ban',compact('hoa_don','chi_tiet_hd', 'ten_nv', 'date'));
    }

    public function inHDN($id){
        $hoa_don = HoaDonNhap::find($id);
        $chi_tiet_hd = ChiTietHDNhap::where('ma_hdn', $id)->get();
        $ten_nv = Session::get('nguoi_dung.ten_nd');
        $date = Date('h:i:s y-m-d');
        return view('admin.pages.in_hoa_don.hoa_don_nhap',compact('hoa_don','chi_tiet_hd', 'ten_nv', 'date'));
    }
}

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
    	$hoa_don = HoaDonBan::where('trang_thai_chuyen_tien', 1)->get();
    	return view('admin.pages.hoa_don_ban.danh_sach', compact('hoa_don'));
    }

    public function getChiTietHD($id){
    	// dd('a');
    	$chi_tiet_hd = ChiTietHDBan::where('ma_hdb',$id)->get();
    	return view('admin.pages.hoa_don_ban.chi_tiet_hd.danh_sach', compact('chi_tiet_hd'));
    }

    public function dsDuyetHD(){
        $hoa_don = HoaDonBan::where('trang_thai_chuyen_tien', 0)->get();
        return view('admin.pages.hoa_don_ban.danh_sach_chua_duyet', compact('hoa_don'));
    }

    public function duyetHD($id){
        $hoa_don = HoaDonBan::find($id);
        $hoa_don->trang_thai_chuyen_tien = 1;
        $hoa_don->save();
        return redirect()->route('dsDuyetHoaDon')->with('thongbao', 'Duyệt thành công');
    }

    public function suaHD($id){
        $hoa_don = HoaDonBan::find($id);
        return view('admin.pages.hoa_don_ban.sua_hoa_don', compact('hoa_don'));
    }

    public function postSuaHD(Request $request, $id){
        $hoa_don = HoaDonBan::find($id);
        $trang_thai_nhan = $request->trang_thai_nhan;
        $hoa_don->trang_thai_nhan = $trang_thai_nhan;
        $hoa_don->save();
        return redirect()->route('hoaDonBan')->with('thongbao','Cập nhật đơn hàng thành công');
    }
}

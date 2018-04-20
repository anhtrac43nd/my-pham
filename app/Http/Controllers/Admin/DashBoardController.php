<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\NguoiDung;
use App\HoaDonBan;
use App\SanPham;
use App\HoaDonNhap;

class DashBoardController extends Controller
{
    //
    public function index(){
        $user = NguoiDung::count();
        $hoa_don_duyet = HoaDonBan::where('trang_thai_chuyen_tien', 1)->count();
        $hoa_don_chua_duyet = HoaDonBan::where('trang_thai_chuyen_tien', 0)->count();
        $san_pham = SanPham::count();
        $hang_ton = SanPham::sum('so_luong');
        $tong_doanh_thu = HoaDonBan::sum('tong_tien');
        $tong_tien_nhap = HoaDonNhap::sum('tong_tien_nhap');
    	return view('admin.pages.dashboard', compact('user',
            'hoa_don_duyet',
            'hoa_don_chua_duyet',
            'san_pham','hang_ton',
            'tong_doanh_thu',
            'tong_tien_nhap')
        );
    }
}

<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SanPham;
use App\ThuongHieu;
use App\LoaiSanPham;
use App\NguoiDung;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    //
    public function trangChu(){
        $san_pham = SanPham::orderby('ma_sp','desc')->limit(6)->get();
        $thuong_hieu_1 = ThuongHieu::limit(8)->get();
        foreach($thuong_hieu_1 as $row){
            $row->san_pham = SanPham::where('ma_thuong_hieu', $row->ma_thuong_hieu)->limit(6)->get();
        }
        $san_pham_random = SanPham::get()->random(3);
    	return view('user.pages.trang_chu', compact('san_pham', 'thuong_hieu_1','san_pham_random'));
    }

    public function getThuongHieu($name){
    	$ten_thuong_hieu = ThuongHieu::where('ten_khong_dau', $name)->first();
    	$san_pham = SanPham::where('ma_thuong_hieu', $ten_thuong_hieu->ma_thuong_hieu)->paginate(9);
    	return view('user.pages.thuong_hieu', compact('ten_thuong_hieu','san_pham'));
    }

    public function getLoaiSanPham($name){
    	$lsp = LoaiSanPham::where('ten_khong_dau', $name)->first();
    	$san_pham = SanPham::where('ma_loai', $lsp->ma_loai)->paginate(9);
    	return view('user.pages.loai_san_pham', compact('lsp','san_pham'));
    }

    public function getChiTietSP($name){
        $san_pham_random = SanPham::get()->random(3);
        $san_pham = SanPham::where('ten_khong_dau', $name)->first();
        return view('user.pages.chi_tiet_sp', compact('san_pham','san_pham_random'));
    }

    public function getDangNhap(){
        if(Session::get('nguoi_dung')){
            return redirect()->route('trangChu');
        }

        return view('user.pages.dang_nhap');
    }

    public function postDangNhap(Request $request){
        $this->validate($request, [
            'ten_tk' => 'min:3|max:12',

        ],[
            'ten_tk.min' => 'Tài khoản từ 3 đến 12 ký tự',
            'ten_tk.max' => 'Tài khoản từ 3 đến 12 ký tự'
        ]);

        $ten_tk = $request->ten_tk;
        $mat_khau = md5($request->mat_khau);
        $nguoi_dung = NguoiDung::where('ten_tk',$ten_tk)->where('mat_khau',$mat_khau)->first();
        if(count($nguoi_dung) > 0 ){
            Session::put('nguoi_dung', $nguoi_dung);
            return redirect()->route('trangChu');
        }else{
            return redirect()->route('dangNhap')->with('thongbao','Đăng nhập không thành công');
        }
    }

    public function getDangKy(){
        if(Session::get('nguoi_dung')){
            return redirect()->route('trangChu');
        }
        return view('user.pages.dang_ky');
    }

    public function postDangKy(Request $request){
        $this->validate($request,[
            'sdt' => 'numeric',
            'ten_tk' => 'min:3|max:12|unique:nguoi_dung,ten_tk',
            'nhac_mat_khau' => 'same:mat_khau'
        ],
            [
                'sdt.numeric' => 'Vui lòng nhập lại số điện thoại',
                'ten_tk.min' => 'Tài khoản phải từ 3-12 chữ số ',
                'ten_tk.max' => 'Tài khoản phải từ 3-12 chữ số ',
                'ten_tk.unique' => 'Tài khoản đã tồn tại',
                'nhac_mat_khau.same' => 'Mật khẩu phải trùng nhau'
            ]
        );

        $nguoi_dung = new NguoiDung;
        $nguoi_dung->ten_nd = $request->ho_ten;
        $nguoi_dung->sdt = $request->sdt;
        $nguoi_dung->dia_chi = $request->dia_chi;
        $nguoi_dung->ten_tk = $request->ten_tk;
        $nguoi_dung->mat_khau = md5($request->mat_khau);
        $nguoi_dung->ma_quyen = 3;
        $nguoi_dung->save();
        return redirect()->route('dangNhap')->with('thongbao','Tạo tài khoản thành công, vui lòng đăng nhập');
    }

    public function dangXuat(){
        Session::forget('nguoi_dung');
        return redirect()->route('trangChu');
    }

    public function timKiem(Request $request){
        $key = $request->key;
        $san_pham = SanPham::where('ten_sp','like', '%' . $key . '%')->paginate(9);
        return view('user.pages.tim_kiem',compact('san_pham'));
    }
}

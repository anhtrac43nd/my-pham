<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\NguoiDung;
use App\Quyen;
class NguoiDungController extends Controller
{
    //
    public function getDanhSach(){
    	$nguoi_dung = NguoiDung::all();
    	return view('admin.pages.nguoi_dung.danh_sach', compact('nguoi_dung'));
    }

    public function getThem(){
    	$quyen = Quyen::all();
    	return view('admin.pages.nguoi_dung.them', compact('quyen'));
    }

    public function postThem(Request $request){
    	/*
    		Kiểm tra input
    	*/
    	$this->validate($request,[
				'sdt' => 'numeric',
				'ten_tai_khoan' => 'min:3|max:12|unique:nguoi_dung,ten_tk',
				'nhac_mat_khau' => 'same:mat_khau'
			],
			[
				'sdt.numeric' => 'Vui lòng nhập lại số điện thoại',
				'ten_tai_khoan.min' => 'Tài khoản phải từ 3-12 chữ số ',
				'ten_tai_khoan.max' => 'Tài khoản phải từ 3-12 chữ số ',
				'ten_tai_khoan.unique' => 'Tài khoản đã tồn tại',
				'nhac_mat_khau.same' => 'Mật khẩu phải trùng nhau'
			]
		);

    	$nguoi_dung = new NguoiDung;
    	$nguoi_dung->ten_nd = $request->ten_nguoi_dung;
    	$nguoi_dung->sdt = $request->sdt;
    	$nguoi_dung->dia_chi = $request->dia_chi;
    	$nguoi_dung->ten_tk = $request->ten_tai_khoan;
    	$nguoi_dung->mat_khau = md5($request->mat_khau);
    	$nguoi_dung->ma_quyen = $request->ma_quyen;
    	$nguoi_dung->save();
    	return redirect()->route('nguoiDung')->with('thongbao','Thêm Thành Công');
    }

    public function getSua($id){
    	$nguoi_dung = NguoiDung::find($id);
    	$quyen = Quyen::all();
    	return view('admin.pages.nguoi_dung.sua',compact('nguoi_dung', 'quyen'));
    }

    public function postSua(Request $request , $id){
    	$nguoi_dung = NguoiDung::find($id);

    	if($request->mat_khau || $request->nhac_mat_khau){
    		$this->validate($request,[
					'nhac_mat_khau' => 'same:mat_khau'
				],
				[
					'nhac_mat_khau.same' => 'Mật khẩu phải trùng nhau'
				]
			);	
    		$nguoi_dung->mat_khau = md5($request->mat_khau);

    	}

    	$nguoi_dung->ten_nd = $request->ten_nguoi_dung;
    	$nguoi_dung->dia_chi = $request->dia_chi;
    	$nguoi_dung->ma_quyen = $request->ma_quyen;
    	$nguoi_dung->save();
    	return redirect()->route('nguoiDung')->with('thongbao','Update Thành Công');
    }

    public function getXoa($id){
    	$nguoi_dung = NguoiDung::find($id);
    	$nguoi_dung->delete();
    	return redirect()->route('nguoiDung')->with('thongbao','Xóa Thành Công');
    }
}

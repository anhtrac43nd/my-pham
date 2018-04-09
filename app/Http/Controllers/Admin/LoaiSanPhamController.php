<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LoaiSanPham;
class LoaiSanPhamController extends Controller
{
    //
    public function getDanhSach(){
    	$loai_san_pham = LoaiSanPham::all();
    	return view('admin.pages.loai_san_pham.danh_sach',compact('loai_san_pham'));
    }

    public function getThem(){
    	return view('admin.pages.loai_san_pham.them');
    }

    public function postThem(Request $request){
    	
    	$this->validate($request,[
				'loai_san_pham' => 'unique:loai_sp,ten_loai'
			],
			[
				'loai_san_pham.unique' => 'Tên đã tồn tại'
    		]);
    	$ten_loai_san_pham = $request->loai_san_pham;
    	$loai_san_pham = new LoaiSanPham;
    	$loai_san_pham->ten_loai = $ten_loai_san_pham;
    	$loai_san_pham->save();
    	return redirect()->route('loaiSanPham')->with('thongbao','Thêm thành công');
    }

    public function getSua($id){
    	$loai_san_pham = LoaiSanPham::find($id);
    	return view('admin.pages.loai_san_pham.sua',compact('loai_san_pham'));
    }

    public function postSua(Request $request, $id){
    	$this->validate($request,[
				'loai_san_pham' => 'unique:loai_sp,ten_loai,'.$id.',ma_loai'
			],
			[
				'loai_san_pham.unique' => 'Tên đã tồn tại'
    	]);
    	$ten_loai_san_pham = $request->loai_san_pham;
    	$loai_san_pham = LoaiSanPham::find($id);
    	$loai_san_pham->ten_loai = $ten_loai_san_pham;
    	$loai_san_pham->save();
    	return redirect()->route('loaiSanPham')->with('thongbao','Sửa thành công');
    }

    public function getXoa($id){
    	$loai_san_pham = LoaiSanPham::find($id);
    	$loai_san_pham->delete();
    	return redirect()->route('loaiSanPham')->with('thongbao','Xóa thành công');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ThuongHieu;
class ThuongHieuController extends Controller
{
    //
    //-----danh sach thuong hieu-----
    public function getDanhSach(){
    	$thuong_hieu = ThuongHieu::all();
    	return view('admin.pages.thuong_hieu.danh_sach',compact('thuong_hieu'));
    }
    //-----them thuong hieu------
    public function getThem(){
    	return view('admin.pages.thuong_hieu.them');
    }

    public function postThem(Request $request){
    	$this->validate($request,[
    			'thuong_hieu' => 'unique:thuong_hieu,ten_thuong_hieu'
    		],
    		[
    			'thuong_hieu.unique' => 'Tên đã tồn tại'
    		]);
    	$ten_thuong_hieu = $request->thuong_hieu;
    	$thuong_hieu = new ThuongHieu;
    	$thuong_hieu->ten_thuong_hieu = $ten_thuong_hieu;
        $thuong_hieu->ten_khong_dau = changeTitle($ten_thuong_hieu);
    	$thuong_hieu->save();
    	return redirect()->route('thuongHieu')->with('thongbao','Thêm thành công');
    }

    //---sua thuong hieu-----------
    public function getSua($id){
    	$thuong_hieu = ThuongHieu::find($id);
    	return view('admin.pages.thuong_hieu.sua',compact('thuong_hieu'));
    }

    public function postSua(Request $request, $id){
		$this->validate($request,[
			'thuong_hieu' => 'unique:thuong_hieu,ten_thuong_hieu,'.$id.',ma_thuong_hieu'
		],
		[
			'thuong_hieu.unique' => 'Tên đã tồn tại'
		]);
    	$ten_thuong_hieu = $request->thuong_hieu;
    	$thuong_hieu = ThuongHieu::find($id);
    	$thuong_hieu->ten_thuong_hieu = $ten_thuong_hieu;
        $thuong_hieu->ten_khong_dau = changeTitle($ten_thuong_hieu);
    	$thuong_hieu->save();
    	return redirect()->route('thuongHieu')->with('thongbao','Sửa thành công');
    }

    // ----xoa thuong hieu-------
    public function getXoa($id){
    	$thuong_hieu = ThuongHieu::find($id);
    	$thuong_hieu->delete();
    	return redirect()->route('thuongHieu')->with('thongbao','Xóa thành công');
    }
}

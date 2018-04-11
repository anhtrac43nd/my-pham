<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Quyen;

class QuyenController extends Controller
{
    //
    public function getDanhSach(){
    	$quyen = Quyen::all();
    	return view('admin.pages.quyen.danh_sach',compact('quyen'));
    }

    public function getThem(){
    	return view('admin.pages.quyen.them');
    }

    public function postThem(Request $request){
    	$this->validate($request,[
				'ten_quyen' => 'unique:quyen,ten_quyen'
			],
			[
				'ten_quyen.unique' => 'Tên đã tồn tại'
    		]);
    	$quyen = new Quyen;
    	$quyen->ten_quyen = $request->ten_quyen;
    	$quyen->save();
    	return redirect()->route('quyen')->with('thongbao','Thêm thành công');
    }

    public function getSua($id){
    	$quyen = Quyen::find($id);
    	return view('admin.pages.quyen.sua',compact('quyen'));
    }

    public function postSua(Request $request, $id){
    	$this->validate($request,[
				'ten_quyen' => 'unique:quyen,ten_quyen,'.$id.',ma_quyen'
			],
			[
				'ten_quyen.unique' => 'Tên đã tồn tại'
    		]);
    	$quyen = Quyen::find($id);
    	$quyen->ten_quyen = $request->ten_quyen;
    	$quyen->save();
    	return redirect()->route('quyen')->with('thongbao','Thêm thành công');
    }
}

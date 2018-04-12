<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SanPham;
use App\LoaiSanPham;
use App\ThuongHieu;
class SanPhamController extends Controller
{
    public function getDanhSach(){
    	$san_pham = SanPham::all();
    	return view('admin.pages.san_pham.danh_sach',compact('san_pham'));
    }

    public function getThem(){
    	$loai_san_pham = LoaiSanPham::all();
    	$thuong_hieu = ThuongHieu::all();
		return view('admin.pages.san_pham.them',compact('loai_san_pham','thuong_hieu'));    	
    }

    public function postThem(Request $request){
    	/*
    		Kiểm tra input
    	*/
    	$this->validate($request,[
				'ten_san_pham' => 'unique:san_pham,ten_sp',
				'gia' => 'numeric'
			],
			[
				'ten_san_pham.unique' => 'Tên đã tồn tại',
				'gia.numeric' => 'Giá phải là chữ số'
			]
		);

		/*
			Lấy giá trị từ input
		*/
		$ten_san_pham = $request->ten_san_pham;
		$ma_loai_sp = $request->loai_sp;
		$ma_thuong_hieu = $request->thuong_hieu;
		$gia = $request->gia;
		if($request->file('hinh_anh')) {
			/*
				Kiểm tra định dạng, size
			*/
			if($_FILES['hinh_anh']['error'] != 0){
				return redirect()->route('themSanPham')->with('error','Upload file không thành công');
			}
            $duoi = strtolower($request->file('hinh_anh')->getClientOriginalExtension());
            $ten = $_FILES['hinh_anh']['name'];
            if ($duoi == 'jpg' || $duoi == 'png' || $duoi == 'jpeg' || $duoi == 'gif'){
            	$size = $_FILES['hinh_anh']['size'];
            	if ($size > 2*2048*2048 ){
            		return redirect()->route('themSanPham')->with('error','Dung lượng file vượt quá 2mb');
            	}
            	$ten_url = date('H-i-s-Y-m-d').'-'.$ten;
            	$request->file('hinh_anh')->move(public_path().'/upload/hinh_anh',$ten_url);
            } else {
            	return redirect()->route('themSanPham')->with('error','Sai định dạng file');
            }

        } else {
        	return redirect()->route('themSanPham')->with('error','Vui lòng chọn file');
        }
        $mo_ta = $request->mo_ta;

        /*
        	Lưu sản phẩm
        */
        $san_pham = new SanPham;
        $san_pham->ten_sp = $ten_san_pham;
        $san_pham->ten_khong_dau = changeTitle($ten_san_pham);
        $san_pham->ma_loai = $ma_loai_sp;
        $san_pham->ma_thuong_hieu = $ma_thuong_hieu;
        $san_pham->don_gia = $gia;
        $san_pham->anh = $ten_url;
        $san_pham->mo_ta = $mo_ta;
        $san_pham->save();

        return redirect()->route('sanPham')->with('thongbao','Thêm sản phẩm thành công');
    } 

    public function getSua($id){
    	$san_pham = SanPham::find($id);
    	$loai_san_pham = LoaiSanPham::all();
    	$thuong_hieu = ThuongHieu::all();
    	return view('admin.pages.san_pham.sua',compact('san_pham','thuong_hieu','loai_san_pham'));
    } 

    public function postSua(Request $request, $id){
    	/*
    		Kiểm tra input
    	*/
    	$this->validate($request,[
				'ten_san_pham' => 'unique:san_pham,ten_sp,'.$id.',ma_sp',
				'gia' => 'numeric'
			],
			[
				'ten_san_pham.unique' => 'Tên đã tồn tại',
				'gia.numeric' => 'Giá phải là chữ số'
			]
		);

        $san_pham = SanPham::find($id);

		/*
			Lấy giá trị từ input
		*/
		$ten_san_pham = $request->ten_san_pham;
		$ma_loai_sp = $request->loai_sp;
		$ma_thuong_hieu = $request->thuong_hieu;
		$gia = $request->gia;
		if($request->file('hinh_anh')) {
			/*
				Kiểm tra định dạng, size
			*/
			if($_FILES['hinh_anh']['error'] != 0){
				return redirect()->route('themSanPham')->with('error','Upload file không thành công');
			}
            $duoi = strtolower($request->file('hinh_anh')->getClientOriginalExtension());
            $ten = $_FILES['hinh_anh']['name'];
            if ($duoi == 'jpg' || $duoi == 'png' || $duoi == 'jpeg' || $duoi == 'gif'){
            	$size = $_FILES['hinh_anh']['size'];
            	if ($size > 2*2048*2048 ){
            		return redirect()->route('themSanPham')->with('error','Dung lượng file vượt quá 2mb');
            	}
            	$ten_url = date('H-i-s-Y-m-d').'-'.$ten;
            	$request->file('hinh_anh')->move(public_path().'/upload/hinh_anh',$ten_url);
            	unlink('upload/hinh_anh/'.$san_pham->anh);
		        $san_pham->anh = $ten_url;
            } else {
            	return redirect()->route('themSanPham')->with('error','Sai định dạng file');
            }

        } 

        $mo_ta = $request->mo_ta;

        /*
        	Lưu sản phẩm
        */
        $san_pham->ten_sp = $ten_san_pham;
        $san_pham->ten_khong_dau = changeTitle($ten_san_pham);
        $san_pham->ma_loai = $ma_loai_sp;
        $san_pham->ma_thuong_hieu = $ma_thuong_hieu;
        $san_pham->don_gia = $gia;
        $san_pham->mo_ta = $mo_ta;
        $san_pham->save();

        return redirect()->route('sanPham')->with('thongbao','Cập nhật sản phẩm thành công');
    } 

    public function getXoa($id){
    	$san_pham = SanPham::find($id);
    	$san_pham->delete();
        unlink('upload/hinh_anh/'.$san_pham->anh);
    	return redirect()->route('sanPham')->with('thongbao','Xóa thành công');
    }
}

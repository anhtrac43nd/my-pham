<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slide;

class SlideController extends Controller
{
    //
    public function getDanhSach(){
        $slide = Slide::all();
        return view('admin.pages.slide.danh_sach', compact('slide'));
    }

    public function getThem(){
        return view('admin.pages.slide.them');
    }

    public function postThem(Request $request){
        $this->validate($request,[
            'ten_slide' => 'unique:slide,ten_slide'
        ],
            [
                'ten_slide.unique' => 'Tên đã tồn tại'
            ]
        );

        if($request->file('hinh_anh')) {
            /*
                Kiểm tra định dạng, size
            */
            if($_FILES['hinh_anh']['error'] != 0){
                return redirect()->route('themSlide')->with('error','Upload file không thành công');
            }
            $duoi = strtolower($request->file('hinh_anh')->getClientOriginalExtension());
            $ten = $_FILES['hinh_anh']['name'];
            if ($duoi == 'jpg' || $duoi == 'png' || $duoi == 'jpeg' || $duoi == 'gif'){
                $size = $_FILES['hinh_anh']['size'];
                if ($size > 2*2048*2048 ){
                    return redirect()->route('themSlide')->with('error','Dung lượng file vượt quá 2mb');
                }
                $ten_url = date('H-i-s-Y-m-d').'-'.$ten;
                $request->file('hinh_anh')->move(public_path().'/upload/slide',$ten_url);
            } else {
                return redirect()->route('themSlide')->with('error','Sai định dạng file');
            }

        } else {
            return redirect()->route('themSlide')->with('error','Vui lòng chọn file');
        }

        $slide = new Slide;
        $slide->ten_slide = $request->ten_slide;
        $slide->anh = $ten_url;
        $slide->noi_dung = $request->mo_ta;
        $slide->save();
        return redirect()->route('slide')->with('thongbao', 'Thêm thành công');
    }

    public function getSua($id){
        $slide = Slide::find($id);
        return view('admin.pages.slide.sua', compact('slide'));
    }

    public function postSua(Request $request , $id){
        $this->validate($request,[
                'ten_slide' => 'unique:slide,ten_slide,'.$id.',ma_slide',
            ],
            [
                'ten_slide.unique' => 'Tên đã tồn tại'
            ]
        );
        $slide = Slide::find($id);
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
                $request->file('hinh_anh')->move(public_path().'/upload/slide',$ten_url);
                $url = public_path().'/upload/slide/'.$slide->anh;
                if(file_exists($url)){
                    unlink('upload/slide/'.$slide->anh);
                }
                $slide->anh = $ten_url;
            } else {
                return redirect()->route('themSanPham')->with('error','Sai định dạng file');
            }

        } 

        $slide->ten_slide = $request->ten_slide;
        $slide->noi_dung = $request->mo_ta;
        $slide->save();
        return redirect()->route('slide')->with('thongbao', 'Sửa thành công');
    }

    public function xoa($id){
        $slide = Slide::find($id);
        $url = public_path().'/upload/slide/'.$slide->anh;
        if(file_exists($url)){
            unlink('upload/slide/'.$slide->anh);
        }
        $slide->delete();
        return redirect()->route('slide')->with('thongbao', 'Xóa thành công');
    }
}

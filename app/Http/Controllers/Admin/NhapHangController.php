<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SanPham;
use App\HoaDonNhap;
use App\ChiTietHDNhap;
use App\LoHang;

class NhapHangController extends Controller
{
    //
    public function nhapHang(){
    	if(!isset($_SESSION['nhap_hang'])){
   			$_SESSION['nhap_hang'] = array();
   		}
   		$hang = $_SESSION['nhap_hang'];
    	return view('admin.pages.nhap_hang.nhap_hang', compact('hang'));
    }

    public function getThem(){
    	$san_pham = SanPham::all();
    	return view('admin.pages.nhap_hang.them', compact('san_pham'));
    }

    public function postThem(Request $request){
        $this->validate($request,[
                'gia_nhap' => 'numeric',
                'so_luong' => 'numeric',
                'ngay_sx' => 'required'
            ],
            [
                'gia_nhap.numeric' => 'Giá phải là chữ số',
                'so_luong.numeric' => 'Số lượng phải là chữ số',
                'ngay_sx.required' => 'Bạn chưa nhập ngày sản xuất'
            ]
        );
    	$ma_san_pham = $request->san_pham;
    	$san_pham = SanPham::find($ma_san_pham);
    	$so_luong = $request->so_luong;
    	$ngay_sx = $request->ngay_sx;
    	if(isset($request->thanh_ly)){
    	    $thanh_ly = 1;
        }else{
    	    $thanh_ly = 0;
        }
    	$gia = $request->gia_nhap;
    	$thanh_tien = (int)$so_luong * (int)$gia;
    	$arr = [
    		'ma_sp' => $ma_san_pham,
    		'ten_sp' => $san_pham->ten_sp,
    		'gia_nhap' => $gia,
            'ngay_sx' => $ngay_sx,
            'thanh_ly' => $thanh_ly,
    		'so_luong' => $so_luong,
    		'thanh_tien' => $thanh_tien
   		];
   		if(!isset($_SESSION['nhap_hang'])){
   			$_SESSION['nhap_hang'] = array();
   		}
   		array_push($_SESSION['nhap_hang'], $arr);
   		
   		return redirect()->route('nhapHang')->with('thongbao','Thêm Thành Công');
    	// dd($_SESSION['nhap_hang']);
    }

    public function apiNhapHang(){
      if(!isset($_SESSION['nhap_hang'])){
        $_SESSION['nhap_hang'] = array();
      }
      $hang = $_SESSION['nhap_hang'];
      $result = '';
      $tong_tien = 0;
      foreach ($hang as $key => $row){
        $result = $result.'
            <tr>
                <td>'.$row['ten_sp'].'</td>
                <td>'.$row['gia_nhap'].'</td>
                <td>'.$row['so_luong'].'</td>
                <td>'.$row['thanh_tien'].'</td>
                <td>
                    <a href="'.route('suaHang', $key).'">Sửa</a>|
                    <a href="'.route('xoaHang', $key).'">Xóa Hàng</a>
                </td>
            </tr>
        ';
        $tong_tien = $tong_tien + $row['thanh_tien'];
      }

      $result = $result.'
            <tr>
                <td>Tổng Tiền</td>
                <td></td>
                <td></td>
                <td>'.$tong_tien.'</td>
                <td></td>
            </tr>';
      return $result;
    }

    public function getSua($id){
        if(!isset($_SESSION['nhap_hang'])){
            return redirect()->route('nhapHang');
        }
        $hang = $_SESSION['nhap_hang'][$id];
        $san_pham = SanPham::all();
        return view('admin.pages.nhap_hang.sua', compact('san_pham','hang','id'));
    }

    public function postSua(Request $request, $id){
        $this->validate($request,[
                'gia_nhap' => 'numeric',
                'so_luong' => 'numeric'
            ],
            [
                'gia_nhap.numeric' => 'Giá phải là chữ số',
                'so_luong.numeric' => 'Số lượng phải là chữ số'
            ]
        );

        $_SESSION['nhap_hang'][$id]['gia_nhap'] = (int)($request->gia_nhap);
        $_SESSION['nhap_hang'][$id]['so_luong'] = (int)($request->so_luong);
        $_SESSION['nhap_hang'][$id]['thanh_tien'] = (int)($request->so_luong) * (int)($request->gia_nhap);
        return redirect()->route('nhapHang')->with('thongbao','Sửa thành công');
    }

    public function xoaHang($id){
        if(!isset($_SESSION['nhap_hang'])){
            $_SESSION['nhap_hang'] = array();
        }
        unset($_SESSION['nhap_hang'][$id]);
        return redirect()->route('nhapHang');
    }

    public function thanhToan(){
//        dd($_SESSION['nhap_hang']);
        if(!isset($_SESSION['nhap_hang']) || count($_SESSION['nhap_hang']) == 0){
            return redirect()->route('nhapHang')->with('thongbao','Bạn chưa có hàng mới');
        }
        $hang = $_SESSION['nhap_hang'];
        $tong_tien = 0;
        foreach($hang as $row){
            $tong_tien = $tong_tien + ((int)($row['gia_nhap']) * (int)($row['so_luong'])); 
        }
        $hoa_don_nhap = HoaDonNhap::create([
                            'ngay_nhap' => date('Y-m-d'),
                            'tong_tien_nhap' => $tong_tien,
                        ]);
        foreach($hang as $row){
            $ct_hdn = ChiTietHDNhap::create([
                'ma_hdn' => $hoa_don_nhap->ma_hdn,
                'ma_sp' =>  $row['ma_sp'],
                'so_luong' => $row['so_luong'],
                'gia_nhap' => $row['gia_nhap'],
                'thanh_tien' => $row['thanh_tien'],
            ]);

            $lo_hang = LoHang::create([
                'ma_sp' =>  $row['ma_sp'],
                'so_luong' => $row['so_luong'],
                'gia_nhap' => $row['gia_nhap'],
                'thanh_tien' => $row['thanh_tien'],
                'ngay_sx' => $row['ngay_sx'],
                'thanh_ly' => $row['thanh_ly'],
            ]);

            $san_pham = SanPham::find($row['ma_sp']);
            $san_pham->so_luong = $san_pham->so_luong + (int)$row['so_luong'];
            $san_pham->save();

        }

        $_SESSION['nhap_hang'] = array();

        return redirect()->route('nhapHang');
    }

}







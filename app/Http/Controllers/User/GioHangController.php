<?php

namespace App\Http\Controllers\User;

use App\ChiTietHDNhap;
use App\HoaDonBan;
use App\ChiTietHDBan;
use App\HoaDonNhap;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\SanPham;
class GioHangController extends Controller
{
    //
    public function gioHang(){
//        session_destroy();
//        dd($_SESSION['gio_hang']);
        if(!isset($_SESSION['gio_hang'])){
            $_SESSION['gio_hang'] = array();
        }
        $gio_hang = $_SESSION['gio_hang'];
        $tong_tien = 0;
        foreach($gio_hang as $row){
            $tong_tien = $tong_tien + $row['thanh_tien'];
        }
        return view('user.pages.gio_hang', compact('gio_hang','tong_tien'));
    }

    public function themHang($id, $so_luong){
        $so_luong = (int)$so_luong;
        $san_pham = SanPham::find($id);
        if(!isset($_SESSION['gio_hang'])){
            $_SESSION['gio_hang'] = array();
        }
        if($san_pham->so_luong < $so_luong){
            return 0;
        }
        $d = 0;
        if(count($_SESSION['gio_hang']) > 0){
            foreach($_SESSION['gio_hang'] as $key => $row){
                if($row['ma_sp'] == $id){
                    $quantity = $_SESSION['gio_hang'][$key]['so_luong'];
                    if($san_pham->so_luong < $quantity + $so_luong){
                        return -1;
                    }
                    $_SESSION['gio_hang'][$key]['so_luong'] = $quantity + $so_luong;
                    $_SESSION['gio_hang'][$key]['thanh_tien'] = ($quantity + $so_luong) * $_SESSION['gio_hang'][$key]['gia'];
                    $d = 1;
                }
            }
        }
        if($d == 0){
            $row['ma_sp'] = $id;
            $row['ten_sp'] = $san_pham->ten_sp;
            $row['so_luong'] = $so_luong;
            $row['anh'] = $san_pham->anh;
            $row['gia'] = $san_pham->don_gia;
            $row['thanh_tien'] = $row['so_luong'] * $row['gia'];
            array_push($_SESSION['gio_hang'], $row);
        }
        return 1;
    }

    public function themGioHang($id){
        $san_pham = SanPham::find($id);
        if(!isset($_SESSION['gio_hang'])){
            $_SESSION['gio_hang'] = array();
        }
        if($san_pham->so_luong == 0){
            return 0;
        }
        $d = 0;
        if(count($_SESSION['gio_hang']) > 0){
            foreach($_SESSION['gio_hang'] as $key => $row){
                if($row['ma_sp'] == $id){
                    $so_luong = $_SESSION['gio_hang'][$key]['so_luong'];
                    if($san_pham->so_luong < $so_luong + 1){
                        return -1;
                    }
                    $_SESSION['gio_hang'][$key]['so_luong'] = $so_luong + 1;
                    $_SESSION['gio_hang'][$key]['thanh_tien'] = $so_luong * $_SESSION['gio_hang'][$key]['gia'];
                    $d = 1;
                }
            }
        }
        if($d == 0){
            $row['ma_sp'] = $id;
            $row['ten_sp'] = $san_pham->ten_sp;
            $row['so_luong'] = 1;
            $row['anh'] = $san_pham->anh;
            $row['gia'] = $san_pham->don_gia;
            $row['thanh_tien'] = $row['so_luong'] * $row['gia'];
            array_push($_SESSION['gio_hang'], $row);
        }
        return 1;
    }

    public function xoaGioHang($id){
        if(!isset($_SESSION['gio_hang'])){
            $_SESSION['gio_hang'] = array();
        }
        unset($_SESSION['gio_hang'][$id]);
        $result = '';
        $tong_tien = 0;
        foreach($_SESSION['gio_hang'] as $key => $row){
            $result = $result.'
                <tr>
                    <td class="cart_product">
                        <a href=""><img width="100px" src="'.asset('').'upload/hinh_anh/'.$row['anh'].'" alt=""></a>
                    </td>
                    <td class="cart_description">
                        <h4><a href="">'.$row['ten_sp'].'</a></h4>
                        <p>Mã sản phẩm: '.$row['ma_sp'].'</p>
                    </td>
                    <td class="cart_price">
                        <p>'.$row['gia'].'</p>
                    </td>
                    <td class="cart_quantity">
                        <div class="cart_quantity_button">
                            <a class="cart_quantity_up" href="" data-id="'.$key.'"> + </a>
                            <input class="cart_quantity_input" data-id="'.$key.'" type="text" name="quantity" value="'.$row['so_luong'].'" autocomplete="off" size="2">
                            <a class="cart_quantity_down" data-id="'.$key.'" href=""> - </a>
                        </div>
                    </td>
                    <td class="cart_total">
                        <p class="cart_total_price">'.$row['thanh_tien'].' VNĐ</p>
                    </td>
                    <td class="cart_delete">
                        <a data-id="'.$key.'" class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                    </td>
                </tr>
            ';
            $tong_tien = $tong_tien + $row['thanh_tien'];
        }
        $result = $result.'
             <tr>
                <td class="cart_product">
                    
                </td>
                <td class="cart_description">
                    
                </td>
                <td class="cart_price">
                </td>
                <td class="cart_quantity">
                    <h4>Tổng tiền</h4>
                </td>
                <td class="cart_total">
                    <p class="cart_total_price">'.$tong_tien.' VND</p>
                </td>
                <td class="cart_delete">
                </td>
            </tr>
        ';
        return $result;
    }

    public function capNhatGioHang($id, $so_luong){
//        dd($_SESSION['gio_hang']);
        $ma_sp = $_SESSION['gio_hang'][$id]['ma_sp'];
//        dd($ma_sp);
        $san_pham = SanPham::where('ma_sp', $ma_sp)->first();
//        dd($san_pham);
        if($san_pham->so_luong < $so_luong){
            return 0; //số lượng đa
        }
        $_SESSION['gio_hang'][$id]['so_luong'] = (int)$so_luong;
        $_SESSION['gio_hang'][$id]['thanh_tien'] = $_SESSION['gio_hang'][$id]['gia'] * (int)$so_luong;
        $result = '';
        $tong_tien = 0;
        foreach($_SESSION['gio_hang'] as $key => $row){
            $result = $result.'
                <tr>
                    <td class="cart_product">
                        <a href=""><img width="100px" src="'.asset('').'upload/hinh_anh/'.$row['anh'].'" alt=""></a>
                    </td>
                    <td class="cart_description">
                        <h4><a href="">'.$row['ten_sp'].'</a></h4>
                        <p>Mã sản phẩm: '.$row['ma_sp'].'</p>
                    </td>
                    <td class="cart_price">
                        <p>'.$row['gia'].'</p>
                    </td>
                    <td class="cart_quantity">
                        <div class="cart_quantity_button">
                            <a class="cart_quantity_up" href="" data-id="'.$key.'"> + </a>
                            <input class="cart_quantity_input" data-id="'.$key.'" type="text" name="quantity" value="'.$row['so_luong'].'" autocomplete="off" size="2">
                            <a class="cart_quantity_down" data-id="'.$key.'" href=""> - </a>
                        </div>
                    </td>
                    <td class="cart_total">
                        <p class="cart_total_price">'.$row['thanh_tien'].' VNĐ</p>
                    </td>
                    <td class="cart_delete">
                        <a data-id="'.$key.'" class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                    </td>
                </tr>
            ';
            $tong_tien = $tong_tien + $row['thanh_tien'];
        }
        $result = $result.'
             <tr>
                <td class="cart_product">
                    
                </td>
                <td class="cart_description">
                    
                </td>
                <td class="cart_price">
                </td>
                <td class="cart_quantity">
                    <h4>Tổng tiền</h4>
                </td>
                <td class="cart_total">
                    <p class="cart_total_price">'.$tong_tien.' VND</p>
                </td>
                <td class="cart_delete">
                </td>
            </tr>
        ';
//        dd($_SESSION['gio_hang']);
        return $result;
    }

    public function datHang(){
        if(!Session::get('nguoi_dung')){
            return 0;
        }
        $ma_nd = Session::get('nguoi_dung.ma_nd');
        $gio_hang = $_SESSION['gio_hang'];
        $tong_tien = 0;
        foreach($gio_hang as $row){
            $san_pham = SanPham::find($row['ma_sp']);
            $san_pham->so_luong = $san_pham->so_luong - (int)$row['so_luong'];
            $san_pham->save();
            $tong_tien = $tong_tien + $row['thanh_tien'];
        }
        $hoa_don_ban = HoaDonBan::create([
            'ma_nd' => $ma_nd,
            'ngay_dat_hang' =>  date('y-m-d'),
            'tong_tien' => $tong_tien,
        ]);
        foreach ($gio_hang as $row){
            $ct_hoa_don_ban = ChiTietHDBan::create([
                'ma_hdb' => $hoa_don_ban->ma_hd,
                'ma_sp' =>  $row['ma_sp'],
                'so_luong_ban' => $row['so_luong'],
                'gia_sp' => $row['gia'],
                'thanh_tien' => $row['thanh_tien'],
            ]);
        }
        $_SESSION['gio_hang'] = [];
        return 1;
    }
}













<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\SanPham;
class GioHangController extends Controller
{
    //
    public function gioHang(){
        if(!isset($_SESSION['gio_hang'])){
            $_SESSION['gio_hang'] = array();
        }
        $gio_hang = $_SESSION['gio_hang'];
        return view('user.pages.gio_hang', compact('gio_hang'));
    }

    public function themGioHang($id){
        $san_pham = SanPham::find($id);
        if(!isset($_SESSION['gio_hang'])){
            $_SESSION['gio_hang'] = array();
        }
        $d = 0;
        if(count($_SESSION['gio_hang']) > 0){
            foreach($_SESSION['gio_hang'] as $key => $row){
                if($row['ma_sp'] == $id){
                    $_SESSION['gio_hang'][$key]['so_luong'] = $_SESSION['gio_hang'][$key]['so_luong'] + 1;
                    $_SESSION['gio_hang'][$key]['thanh_tien'] = $_SESSION['gio_hang'][$key]['so_luong'] * $_SESSION['gio_hang'][$key]['gia'];
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
        dd($_SESSION['gio_hang']);
        return 1;
    }
}

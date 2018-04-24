<?php

namespace App\Http\Controllers\Crawler;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yangqi\Htmldom\Htmldom;
use App\SanPham;
use App\LoaiSanPham;
use App\ThuongHieu;

class ShopavietnamController extends Controller
{
    //
    public function updateData(){
        $arr_cate = [
            'Trang Điểm Mắt' => 'https://www.shopavietnam.com/vi-vn/trang-diem-mat.html',
            'Trang Điểm Da Mặt' => 'https://www.shopavietnam.com/vi-vn/trang-diem-da-mat.html',
            'Trang Điểm Môi' => 'https://www.shopavietnam.com/vi-vn/trang-diem-moi.html',
            'Tẩy Trang' => 'https://www.shopavietnam.com/vi-vn/tay-trang-rua-mat.html',
            'Sơn Móng Tay' => 'https://www.shopavietnam.com/vi-vn/son-mong-tay.html',
            'Dưỡng Trắng Da' => 'https://www.shopavietnam.com/vi-vn/duong-trang-da.html',
            'Chăm Sóc Da' => 'https://www.shopavietnam.com/vi-vn/cham-soc-da.html'
        ];

        foreach($arr_cate as $key => $row){
            $cate = $key;
            for($i=1; $i<=10 ;$i++){
                echo $row."?page=".$i."\n";
                $html = new Htmldom();
                $row = $row."?page=".$i;
                $html = $html->file_get_html($row);
                if(!$html->find('.product-wrapper')){
                    break;
                }
                echo "dang-tien hanh-update-trang-".$i."\n";
                foreach ($html->find('.product-wrapper') as $row1){
                    $src = $row1->children(0)->href;
                    echo $src."\n";
                    $data = $this->getData($src);
                    if($data == 0){
                        continue;
                    }
                    $title = $data['title'];
                    $product = SanPham::where('ten_sp',$title)->first();
                    if(empty($product)){
                        $product =  new SanPham();
                        $product->ten_sp = $title;
                        $product->ten_khong_dau = changeTitle($title);
                        $product->ma_loai = $this->checkCategory($cate);
                        $product->ma_thuong_hieu = $this->checkBrand($data['brand']);
                        $product->don_gia = (int)$data['price'];
                        $product->anh = $this->checkImage($data['img'], $title);
                        $product->mo_ta = $data['details'];
                        $product->save();
                        echo "luu-thanh-cong-".$title."\n";
                    }else{
                        if($product->don_gia !== (int)$data['price']){
                            $product->don_gia = (int)$data['price'];
                            $product->save();
                            echo "cap-nhat-thanh-cong-gia-sp-".$title."\n";
                        }

                    }

                }
            }

        }
    }

    public function getData($url){
        $html = new Htmldom();
        $html = $html->file_get_html($url);
        $title = $html->find('.product-detail-name h1', 0)->innertext;
        $brand = $html->find('.manufacturer-name',0)->innertext;
        if(trim($brand) == ''){
            return 0;
        }
        if($html->find('.detail-priceroot-sale')) {
            $price = $html->find('.detail-priceroot-sale',0)->innertext;

        }else if($html->find('.detail-priceroot')){
            $price = $html->find('.detail-priceroot',0)->innertext;

        }else{
            return 0;
        }
        $filter = ['.',' ','VND'];
        $price = str_replace($filter,'', $price);
        if($html->find('#pd-summary')){
            $details = $html->find('#pd-summary', 0)->innertext;

        }else{
            $details = '';
        }
        $details_img = $html->find('.product-detail-description', 0)->innertext;
        $details = $details.$details_img;
        $details = $this->fixDetails($details);
        $img = $html->find('.lazy-disable',0)->srcset;
        $img = explode(',', $img);
        $img = explode(' ', $img[0])[0];
        return [
            'title' => $title,
            'brand' => $brand,
            'price' => $price,
            'details' => $details,
            'img' => $img
        ];
    }

    public function checkCategory($name){
        $category = LoaiSanPham::where('ten_loai', $name)->first();
        if(count($category) > 0){
            return $category->ma_loai;
        }
        $category = LoaiSanPham::create([
            'ten_loai' => $name,
    		'ten_khong_dau' => changeTitle($name)
        ]);

        return $category->ma_loai;
    }

    public function checkBrand($name){
        $brand = ThuongHieu::where('ten_thuong_hieu', $name)->first();
        if(count($brand) > 0){
            return $brand->ma_thuong_hieu;
        }
        $brand = ThuongHieu::create([
            'ten_thuong_hieu' => $name,
    		'ten_khong_dau' => changeTitle($name)
        ]);

        return $brand->ma_thuong_hieu;
    }

    public function checkProduct($name){
        $product = SanPham::where('ten_sp', $name)->first();
        if(count($product) > 0){
            return 1;
        }else{
            return 0;
        }
    }

    public function checkImage($url, $name){
        $src = changeTitle($name).'-'.date('Hisymd').'.jpg';
        $arrContextOptions=array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        );

        file_put_contents('public/upload/hinh_anh/'.$src, file_get_contents($url, false, stream_context_create($arrContextOptions)));
        return $src;
    }

    public function fixDetails($str){
        $count_img = substr_count($str, 'img');
        $count_http = substr_count($str, 'http');
        if($count_img == $count_http){
            return $str;
        }
        $str = str_replace('src="', 'src="https://www.shopavietnam.com/', $str);
        return $str;
    }
}

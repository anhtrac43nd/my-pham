<?php

namespace App\Http\Controllers\Crawler;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yangqi\Htmldom\Htmldom;
use Yangqi\Htmldom\Htmldomnode;
use App\SanPham;
use App\LoaiSanPham;
use App\ThuongHieu;

class BeautyGardenController extends Controller
{
    //
    public function updateData(){
       // $str ='Kem dưỡng da tay Q10 hãng Kose Nhật';
       // dd(mb_strtolower($str));
//        dd(changeTitle(html_entity_encode(html_entity_decode($str, ENT_NOQUOTES))));
    	$arr_url = [
    		'https://beautygarden.vn/danh-muc/trang-diem.html'

    	];

    	$arrContextOptions=array(
		    "ssl"=>array(
		        "verify_peer"=>false,
		        "verify_peer_name"=>false,
		    ),
		);  

    	foreach($arr_url as $row){
    		$html = new Htmldom();
    		$html = $html->file_get_html($row, false, stream_context_create($arrContextOptions));
    		foreach($html->find('.product-item-photo') as $row){
    			$img = $row->find('img',0)->attr['data-src'];
    			$img = 'https://beautygarden.vn'.explode("?", $img)[0];
    			$link_item = $row->find('a',0)->attr['href'];
    			$link_item = 'https://beautygarden.vn'.$link_item;
    			echo $img."\n".$link_item."\n";
    			$data = $this->getInfo($link_item);
    			if($data == 0){
    			    continue;
                }
    			if($this->checkProduct($data['title']) == 0){
                    echo "dang-tien-hanh-luu-san-pham:".$data['title']."\n";
                    $product = new SanPham();
                    $product->ten_sp = $data['title'];
                    echo $product->ten_sp."\n";
                    // $product->ten_khong_dau = changeTitle(mb_strtolower($data['title']));
                    // echo $product->ten_sp."\n";
                    echo $product->ten_khong_dau."\n";
                    $product->ma_loai = $this->checkCategory($data['category']);
                    $product->ma_thuong_hieu = $this->checkBrand($data['brand']);
                    $product->don_gia = $data['price'];
                    $product->anh = $this->checkImage($img, $data['title']);
                    $product->mo_ta = $data['desc'];
                    // dd($product->mo_ta);
                    $product->save();
                    echo "luu-thanh-cong-san-pham:".$data['title']."\n";
                }else{
    			    $product = SanPham::where('ten_sp', $data['title'])->first();
    			    if($product->don_gia != $data['price']){
    			        $product->don_gia = $data['price'];
    			        $product->save();
                    }

                }
    		}
    	}
    }

    public function getInfo($url){
//    	$arrContextOptions=array(
//		    "ssl"=>array(
//		        "verify_peer"=>false,
//		        "verify_peer_name"=>false,
//		    ),
//		);
//    	$html = new Htmldom();
//		$html = $html->file_get_html($url, false, stream_context_create($arrContextOptions));
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.7; rv:7.0.1) Gecko/20100101 Firefox/7.0.1');
        $html = new Htmldom(curl_exec($ch));
        curl_close($ch);
		$category = $html->find('.breadcrumb',0)->children(1)->children(0)->title;
		if($html->find('.product-condition',1)){
            $brand = $html->find('.product-condition',1)->innertext;
            $brand = trim(explode(":", $brand)[1]);
            echo $brand;
        }else{
            return 0;

        }

		$title = trim($html->find('h1.page-title', 0)->innertext);
		echo html_entity_decode($title, ENT_QUOTES, 'UTF-8')."\n";
		$price = $html->find('span.price',0)->innertext;
		$price = str_replace(",", "", $price);
		$price = (int)(str_replace("₫", "", $price));
		$desc = $html->find('#description .block-content', 0)->innertext;
		$desc = str_replace('data-src="/', 'src="https://beautygarden.vn/', $desc);
		$desc = str_replace('<a href="/', '<a href="https://beautygarden.vn/', $desc);
		return [
			'category' => html_entity_decode($category, ENT_QUOTES, 'UTF-8'),
			'brand' => html_entity_decode($brand, ENT_QUOTES, 'UTF-8'),
			'title' => html_entity_decode($title, ENT_QUOTES, 'UTF-8'),
			'price' => html_entity_decode($price, ENT_QUOTES, 'UTF-8'),
			'desc' => html_entity_decode($desc, ENT_QUOTES, 'UTF-8')
		];
    }
    // Mặt nạ ngủ m&#244;i Laneige Lip Sleeping Mask Mini
    //ma?-t-na?-ngu?-m-244-i-laneige-lip-sleeping-mask-mini

    //Mặt nạ ngủ môi Laneige Lip Sleeping Mask Mini
    //ma?-t-na?-ngu?-moi-laneige-lip-sleeping-mask-mini
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

}







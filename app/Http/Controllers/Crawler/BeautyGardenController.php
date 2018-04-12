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
    	// dd('aa');
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
    		// dd($html);
    		foreach($html->find('.product-item-photo') as $row){
    			// dd($row->);
    			$img = $row->find('img',0)->attr['data-src'];
    			$img = 'https://beautygarden.vn'.explode("?", $img)[0];
    			$link_item = $row->find('a',0)->attr['href'];
    			$link_item = 'https://beautygarden.vn'.$link_item;
    			echo $img."\n".$link_item."\n";
    			$data = $this->getInfo($link_item);
    			dd($data);
    		}
    		dd('a');
    	}
    }

    public function getInfo($url){
    	$arrContextOptions=array(
		    "ssl"=>array(
		        "verify_peer"=>false,
		        "verify_peer_name"=>false,
		    ),
		);  
    	$html = new Htmldom();
		$html = $html->file_get_html($url, false, stream_context_create($arrContextOptions));
		$category = $html->find('.breadcrumb',0)->children(1)->children(0)->title;
		$brand = $html->find('.product-condition',1)->innertext;
		$brand = trim(explode(":", $brand)[1]);
		$title = trim($html->find('h1.page-title', 0)->innertext);
		$price = $html->find('span.price',0)->innertext;
		$price = str_replace(",", "", $price);
		$price = (int)(str_replace("₫", "", $price));
		$desc = $html->find('#description .block-content', 0)->innertext;
		$desc = str_replace('data-src="/', 'src="https://beautygarden.vn/', $desc);
		$desc = str_replace('<a href="/', '<a href="https://beautygarden.vn/', $desc);
		return [
			'category' => $category,
			'brand' => $brand,
			'title' => $title,
			'price' => $price,
			'desc' => $desc
		];
    }

    public function checkCategory($name){
    	$category = LoaiSanPham::where('ten_loai', $name)->first();
    	if(count($category) > 0){
    		return $category->ma_loai;
    	}
    	$category = LoaiSanPham::create([
    		'ten_loai' => $name,
    		'ten_khong_dau' => changeTitle($name),
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
    		'ten_khong_dau' => changeTitle($name),
    	]);

    	return $brand->ma_thuong_hieu;
    }

    public function getImage($url){
    	dd('a');
    }

}







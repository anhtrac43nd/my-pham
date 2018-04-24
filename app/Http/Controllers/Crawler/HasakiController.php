<?php

namespace App\Http\Controllers\Crawler;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yangqi\Htmldom\Htmldom;
use App\SanPham;
use App\LoaiSanPham;
use App\ThuongHieu;

class HasakiController extends Controller
{
    //
    public function updateData(){
        $url = 'https://hasaki.vn/san-pham/sua-rua-mat-cho-moi-loai-da-senka-16635.html?id=3799';
        $data = $this->getinfo($url);
    }

    public function getinfo($link){

//        $opts = array('http'=>array('header' => "User-Agent:MyAgent/1.0\r\n"));
//        $context = stream_context_create($opts);
//        $html = new Htmldom();
//        $html = $html->file_get_html($link,false,$context);
//        $title = $html->find('.col_tb_info_sp bg_info_sp',0)->innertext;

        $url = $link;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.7; rv:7.0.1) Gecko/20100101 Firefox/7.0.1');
        curl_setopt($ch, CURLOPT_HEADER, 1);
        $html = new Htmldom(curl_exec($ch));
        curl_close($ch);

        foreach ($html->find('.page-title') as $key => $row){
            var_dump($row->innertext);
        };
//        dd($title);
    }

}

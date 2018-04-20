<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Session;
use App\LoaiSanPham;
use App\ThuongHieu;
use App\Slide;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    function __construct()
    {
    	if (session_status() == PHP_SESSION_NONE) {
		    session_start();
		}

        $loai_san_pham = LoaiSanPham::limit(10)->get();
        view()->share('loai_san_pham', $loai_san_pham);

        $thuong_hieu = ThuongHieu::limit(10)->get();
        view()->share('thuong_hieu', $thuong_hieu);

        $slide = Slide::all();
        view()->share('slide', $slide);

    }
}

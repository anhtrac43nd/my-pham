<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SanPham;
class IndexController extends Controller
{
    //
    public function index(){
    	return view('user.pages.trang_chu');
    }
}

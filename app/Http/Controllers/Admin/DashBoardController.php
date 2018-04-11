<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DashBoardController extends Controller
{
    //
    public function index(){
    	return view('admin.pages.dashboard');
    }
}

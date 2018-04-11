<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\NguoiDung;
class LoginController extends Controller
{
    //
    public function login(){
    	return view('admin.login');
    }

    public function postLogin(Request $request){
    	$this->validate($request, [
    		'ten_tk' => 'min:3|max:12',

    	],[
    		'ten_tk.min' => 'Tài khoản từ 3 đến 12 ký tự',
    		'ten_tk.max' => 'Tài khoản từ 3 đến 12 ký tự'
    	]);

    	$ten_tk = $request->ten_tk;
    	$mat_khau = md5($request->mat_khau);
    	$nguoi_dung = NguoiDung::where('ten_tk',$ten_tk)->where('mat_khau',$mat_khau)->first();
    	// dd($nguoi_dung);
    	if(count($nguoi_dung) > 0 ){
    		Session::put('nguoi_dung', $nguoi_dung);
    		// dd($request->session()->get('nguoi_dung'));
    		return redirect()->route('dashboard');
    	}else{
    		return redirect()->route('adminLogin');
    	}
    }

    public function logout(){
    	Session::forget('nguoi_dung');
    	return redirect()->route('adminLogin');
    }
}

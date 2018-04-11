<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('admin.master');
});
Route::get('admin/login', ['as' => 'adminLogin', 'uses' => 'Admin\LoginController@login']);
Route::post('admin/login', ['as' => 'postAdminLogin', 'uses' => 'Admin\LoginController@postLogin']);

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'adminLogin'], function(){
	Route::get('logout', ['as' => 'adminLogout', 'uses' => 'LoginController@logout']);
	//----------------------------------------------------------------------
	Route::get('', ['as' => 'dashboard', 'uses' => 'DashBoardController@index']);
	//------------thuong hieu-----------------------------------------------
	Route::get('thuong-hieu', ['as' => 'thuongHieu', 'uses' => 'ThuongHieuController@getDanhSach']);
	Route::get('thuong-hieu/them', ['as' => 'themThuongHieu', 'uses' => 'ThuongHieuController@getThem']);
	Route::post('thuong-hieu/them', ['as' => 'postThemThuongHieu', 'uses' => 'ThuongHieuController@postThem']);
	Route::get('thuong-hieu/sua/{id}', ['as' => 'suaThuongHieu', 'uses' => 'ThuongHieuController@getSua']);
	Route::post('thuong-hieu/sua/{id}', ['as' => 'postSuaThuongHieu', 'uses' => 'ThuongHieuController@postSua']);
	Route::get('thuong-hieu/xoa/{id}', ['as' => 'xoaThuongHieu', 'uses' => 'ThuongHieuController@getXoa']);

	//-------------loai san pham--------------------------------------------
	Route::get('loai-san-pham', ['as' => 'loaiSanPham', 'uses' => 'LoaiSanPhamController@getDanhSach']);
	Route::get('loai-san-pham/them', ['as' => 'themLoaiSanPham', 'uses' => 'LoaiSanPhamController@getThem']);
	Route::post('loai-san-pham/them', ['as' => 'postThemLoaiSanPham', 'uses' => 'LoaiSanPhamController@postThem']);
	Route::get('loai-san-pham/sua/{id}', ['as' => 'suaLoaiSanPham', 'uses' => 'LoaiSanPhamController@getSua']);
	Route::post('loai-san-pham/sua/{id}', ['as' => 'postSuaLoaiSanPham', 'uses' => 'LoaiSanPhamController@postSua']);
	Route::get('loai-san-pham/xoa/{id}', ['as' => 'xoaLoaiSanPham', 'uses' => 'LoaiSanPhamController@getXoa']);

	//------------san-pham--------------------------------------------------
	Route::get('san-pham', ['as' => 'sanPham', 'uses' => 'SanPhamController@getDanhSach']);
	Route::get('san-pham/them', ['as' => 'themSanPham', 'uses' => 'SanPhamController@getThem']);
	Route::post('san-pham/them', ['as' => 'postThemSanPham', 'uses' => 'SanPhamController@postThem']);
	Route::get('san-pham/sua/{id}', ['as' => 'suaSanPham', 'uses' => 'SanPhamController@getSua']);
	Route::post('san-pham/sua/{id}', ['as' => 'postSuaSanPham', 'uses' => 'SanPhamController@postSua']);
	Route::get('san-pham/xoa/{id}', ['as' => 'xoaSanPham', 'uses' => 'SanPhamController@getXoa']);

	//-----------quyen----------------------------------------------------
	Route::get('quyen', ['as' => 'quyen', 'uses' => 'QuyenController@getDanhSach']);
	Route::get('quyen/them', ['as' => 'themQuyen', 'uses' => 'QuyenController@getThem']);
	Route::post('quyen/them', ['as' => 'postThemQuyen', 'uses' => 'QuyenController@postThem']);
	Route::get('quyen/sua/{id}', ['as' => 'suaQuyen', 'uses' => 'QuyenController@getSua']);
	Route::post('quyen/sua/{id}', ['as' => 'postSuaQuyen', 'uses' => 'QuyenController@postSua']);
	Route::get('quyen/xoa/{id}', ['as' => 'xoaQuyen', 'uses' => 'QuyenController@getXoa']);

	//----------nguoi-dung-------------------------------------------------
	Route::get('nguoi-dung', ['as' => 'nguoiDung', 'uses' => 'NguoiDungController@getDanhSach']);
	Route::get('nguoi-dung/them', ['as' => 'themNguoiDung', 'uses' => 'NguoiDungController@getThem']);
	Route::post('nguoi-dung/them', ['as' => 'postThemNguoiDung', 'uses' => 'NguoiDungController@postThem']);
	Route::get('nguoi-dung/sua/{id}', ['as' => 'suaNguoiDung', 'uses' => 'NguoiDungController@getSua']);
	Route::post('nguoi-dung/sua/{id}', ['as' => 'postSuaNguoiDung', 'uses' => 'NguoiDungController@postSua']);
	Route::get('nguoi-dung/xoa/{id}', ['as' => 'xoaNguoiDung', 'uses' => 'NguoiDungController@getXoa']);

	//----------hoa-don----------------------------------------------------
	Route::group(['prefix' => 'hoa-don-ban'], function(){
		Route::get('', ['as' => 'hoaDonBan', 'uses' => 'HoaDonBanController@getDanhSach']);
		Route::get('chi-tiet/{id}', ['as' => 'ctHoaDonBan', 'uses' => 'HoaDonBanController@getChiTietHD']);

	});

	Route::group(['prefix' => 'hoa-don-nhap'], function(){
		Route::get('', ['as' => 'hoaDonNhap', 'uses' => 'HoaDonNhapController@getDanhSach']);
		Route::get('chi-tiet/{id}', ['as' => 'ctHoaDonNhap', 'uses' => 'HoaDonNhapController@getChiTietHD']);

	});

	Route::get('nhap-hang', ['as' => 'nhapHang', 'uses' => 'NhapHangController@nhapHang']);
	Route::get('them-hang', ['as' => 'themHang', 'uses' => 'NhapHangController@getThem']);
	Route::post('them-hang', ['as' => 'postThemHang', 'uses' => 'NhapHangController@postThem']);
	Route::get('sua-hang/{id}', ['as' => 'suaHang', 'uses' => 'NhapHangController@getSua']);
	Route::post('sua-hang/{id}', ['as' => 'postSuaHang', 'uses' => 'NhapHangController@postSua']);
	Route::get('api/nhap-hang', ['uses' => 'NhapHangController@apiNhapHang']);
	Route::get('xoa-hang/{id}', ['as' => 'xoaHang', 'uses' => 'NhapHangController@xoaHang']);
	Route::get('nhap-hang/thanh-toan', ['as' => 'thanhToan', 'uses' => 'NhapHangController@thanhToan']);
});










Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

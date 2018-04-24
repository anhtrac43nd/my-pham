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

Route::group(['namespace' => 'User'], function(){
    Route::get('dang-nhap',['as' => 'dangNhap', 'uses' => 'IndexController@getDangNhap']);
    Route::post('dang-nhap',['as' => 'postDangNhap', 'uses' => 'IndexController@postDangNhap']);
    Route::get('dang-ky',['as' => 'dangKy', 'uses' => 'IndexController@getDangKy']);
    Route::post('dang-ky',['as' => 'postDangKy', 'uses' => 'IndexController@postDangKy']);
    Route::get('dang-xuat',['as' => 'dangXuat', 'uses' => 'IndexController@dangXuat']);

	Route::get('/', ['as' => 'trangChu', 'uses' => 'IndexController@trangChu'] );
	Route::get('thuong-hieu/{name}/{id}', ['as' => 'thuong_hieu', 'uses' => 'IndexController@getThuongHieu']);
	Route::get('loai-san-pham/{name}/{id}', ['as' => 'loai_sp', 'uses' => 'IndexController@getLoaiSanPham']);
	Route::get('chi-tiet-san-pham/{name}/{id}', ['as' => 'chi_tiet_sp', 'uses' => 'IndexController@getChiTietSP']);
    Route::get('tim-kiem', ['as' => 'timKiem', 'uses' => 'IndexController@timKiem']);

    Route::get('gio-hang', ['as' => 'gioHang', 'uses' => 'GioHangController@gioHang']);
    Route::get('them-gio-hang/{id}', ['as' => 'themGioHang', 'uses' => 'GioHangController@themGioHang']);
    Route::get('them-hang/{id_sp}/{so_luong}', ['uses' => 'GioHangController@themHang']);
    Route::get('cap-nhat-hang/{id}/{so_luong}', ['as' => 'capNhat', 'uses' => 'GioHangController@capNhatGioHang']);
    Route::get('xoa-gio-hang/{id}', ['as' => 'xoaGioHang', 'uses' => 'GioHangController@xoaGioHang']);
    Route::get('dat-hang', ['as' => 'datHang', 'uses' => 'GioHangController@datHang']);
});

//-----------------Admin-------------------------------------------------------------------
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
    //-----------slide-----------------------------------------------------
    Route::get('slide', ['as' => 'slide', 'uses' => 'SlideController@getDanhSach']);
    Route::get('slide/them', ['as' => 'themSlide', 'uses' => 'SlideController@getThem']);
    Route::post('slide/them', ['as' => 'postThemSlide', 'uses' => 'SlideController@postThem']);
    Route::get('slide/sua/{id}', ['as' => 'suaSlide', 'uses' => 'SlideController@getSua']);
    Route::post('slide/sua/{id}', ['as' => 'postSuaSlide', 'uses' => 'SlideController@postSua']);
    Route::get('slide/xoa/{id}', ['as' => 'xoaSlide', 'uses' => 'SlideController@getXoa']);

    Route::get('lo-hang',['as' => 'loHang', 'uses' => 'LoHangController@getDanhSach']);
	//----------hoa-don----------------------------------------------------
	Route::group(['prefix' => 'hoa-don-ban'], function(){
		Route::get('', ['as' => 'hoaDonBan', 'uses' => 'HoaDonBanController@getDanhSach']);
		Route::get('chi-tiet/{id}', ['as' => 'ctHoaDonBan', 'uses' => 'HoaDonBanController@getChiTietHD']);
        Route::get('duyet/danh-sach', ['as' => 'dsDuyetHoaDon', 'uses' => 'HoaDonBanController@dsDuyetHD']);
        Route::get('duyet-hoa-don/{id}', ['as' => 'duyetHD', 'uses' => 'HoaDonBanController@duyetHD']);
        Route::get('sua-hoa-don/{id}', ['as' => 'suaHoaDon', 'uses' => 'HoaDonBanController@suaHD']);
        Route::post('sua-hoa-don/{id}', ['as' => 'postSuaHoaDon', 'uses' => 'HoaDonBanController@postSuaHD']);

        Route::get('in/{id}', ['as' => 'inHDB', 'uses' => 'InHoaDonController@inHDB']);
	});

	Route::group(['prefix' => 'hoa-don-nhap'], function(){
		Route::get('', ['as' => 'hoaDonNhap', 'uses' => 'HoaDonNhapController@getDanhSach']);
		Route::get('chi-tiet/{id}', ['as' => 'ctHoaDonNhap', 'uses' => 'HoaDonNhapController@getChiTietHD']);
        Route::get('in/{id}', ['as' => 'inHDN', 'uses' => 'InHoaDonController@inHDN']);
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

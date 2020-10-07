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

Auth::routes();

/*Route::get('/', function () {
    return view('pages.trangchu');
});*/
Route::get('/redirect', 'PageController@redirectToProvider');

Route::get('auth/callback', 'PageController@handleProviderCallback');

Route::get('/auth/redirect/{provider}', 'PageController@redirect');
  Route::get('/callback/{provider}', 'PageController@callback');


Route::get('admin','UserController@getDangnhapAdmin');

Route::post('admin','UserController@postDangnhapAdmin');

Route::get('admin/logout','UserController@getDangxuatAdmin');

Route::get('timkiem', 'PageController@getTimKiem');

Route::get('timkiemvideo', 'PageController@getTimKiemVideo');



Route::get('admin/doimatkhau','PageController@getAdminNguoidung');

Route::post('admin/doimatkhau','PageController@postAdminNguoidung');



Route::group(['prefix'=>'admin','middleware' =>['qlus']],function()
{
    Route::get('/dashboard', 'AdminController@getIndex');

	Route::group(['prefix'=>'theloai','middleware' => [ 'qltl&lt']],function(){
		//admin/theloai/danhsach
		Route::get('/danhsach','TheLoaiController@getDanhSach');

		Route::get('sua/{id}','TheLoaiController@getSua');
		Route::post('sua/{id}','TheLoaiController@postSua');

		Route::get('them','TheLoaiController@getThem');
		Route::post('them','TheLoaiController@postThem');

		Route::get('xoa/{id}','TheLoaiController@getXoa');
	});

		Route::group(['prefix'=>'loaitin','middleware' => [ 'qltl&lt']],function(){
		//admin/loaitin/danhsach
		Route::get('danhsach','LoaiTinController@getDanhSach');

		Route::get('sua/{id}','LoaiTinController@getSua');
		Route::post('sua/{id}','LoaiTinController@postSua');

		Route::get('them','LoaiTinController@getThem');
		Route::post('them','LoaiTinController@postThem');

		Route::get('xoa/{id}','LoaiTinController@getXoa');
	});

	Route::group(['prefix'=>'tintuc','middleware' => ['qltt']],function(){

		//admin/tintuc/danhsach
		Route::get('danhsach','TinTucController@getDanhSach');

		Route::get('sua/{id}','TinTucController@getSua');
		Route::post('sua/{id}','TinTucController@postSua');

		Route::get('them','TinTucController@getThem');
		Route::post('them','TinTucController@postThem');




		Route::get('xoa/{id}','TinTucController@getXoa');

		Route::get('kichhoat/{id}', 'TinTucController@getTinTucKichHoat');
		Route::get('noibat/{id}', 'TinTucController@getTinTucNoiBat');
	});

	Route::group(['prefix'=>'video','middleware' => ['qlvd']],function(){

		//admin/tintuc/danhsach
		Route::get('danhsach','VideoController@getDanhSach');

		Route::get('sua/{id}','VideoController@getSua');
		Route::post('sua/{id}','VideoController@postSua');

		Route::get('them','VideoController@getThem');
		Route::post('them','VideoController@postThem');




		Route::get('xoa/{id}','VideoController@getXoa');

		Route::get('kichhoat/{id}', 'VideoController@getVideoKichHoat');
		Route::get('noibat/{id}', 'VideoController@getVideoNoiBat');
	});

		Route::group(['prefix'=>'binhluan','middleware' => ['qlbltt']],function(){
		Route::get('danhsach','BinhLuanController@getDanhSach');

		Route::get('xoa/{id}','BinhLuanController@getXoa');

		Route::get('kichhoat/{id}', 'BinhLuanController@getBinhLuanKichHoat');

	});
		Route::group(['prefix'=>'binhluanvideo','middleware' => ['qlblvd']],function(){
		Route::get('danhsach','BinhLuanVideoController@getDanhSach');

		Route::get('xoa/{id}','BinhLuanVideoController@getXoa');

		Route::get('kichhoat/{id}', 'BinhLuanVideoController@getBinhLuanKichHoat');

	});

	Route::group(['prefix'=>'user','middleware' => ['qlau']],function(){

		//admin/user/danhsach
		Route::get('danhsach','UserController@getDanhSach');

		Route::get('sua/{id}','UserController@getSua');
		Route::post('sua/{id}','UserController@postSua');

		Route::get('them','UserController@getThem');
		Route::post('them','UserController@postThem');

		Route::get('xoa/{id}','UserController@getXoa');

		Route::get('kichhoat/{id}', 'UserController@getUserKichHoat');
	});

	Route::group(['prefix'=>'slide','middleware' => ['qlsl']],function(){

		//admin/slide/danhsach
		Route::get('danhsach','SlideController@getDanhSach');

		Route::get('sua/{id}','SlideController@getSua');
		Route::post('sua/{id}','SlideController@postSua');

		Route::get('them','SlideController@getThem');
		Route::post('them','SlideController@postThem');

		Route::get('xoa/{id}','SlideController@getXoa');
	});
	Route::group(['prefix'=>'lienhe','middleware' => ['qlau']],function(){

		
		Route::get('danhsach','LienHeController@getDanhSach');

		Route::get('xoa/{id}','LienHeController@getXoa');
	});



	Route::group(['prefix'=>'ajax'],function(){

		//admin/loaitin/danhsach
		Route::get('loaitin/{idTheLoai}','AjaxController@getLoaiTin');


    });

});
/*
Route::get('/admin/comment/kichhoat/{id}', 'CommentController@getCommentKichHoat');

Route::get('/admin/user/kichhoat/{id}', 'UserController@getUserKichHoat');

Route::get('/admin/tintuc/kichhoat/{id}', 'TinTucController@getTinTucKichHoat');

Route::get('/admin/tintuc/noibat/{id}', 'TinTucController@getTinTucNoiBat');
*/
Route::get('trangchu','IndexController@trangchu');

Route::get('/','IndexController@trangchu');

Route::get('trangchuvideo','IndexController@tatcavideo');

Route::get('theloaivideo/{id}/{TenKhongDau}.html','IndexController@theloaivideo');

Route::get('tintucnoibat','IndexController@tintucnoibat');

Route::get('lienhe','IndexController@lienhe');

Route::get('loaitin/{id}/{TenKhongDau}.html','IndexController@loaitin');

Route::get('theloai/{id}/{TenKhongDau}.html','IndexController@theloai');

Route::get('tintuc/{id}/{TenKhongDau}.html','IndexController@tintuc');

Route::get('video/{id}/{TenKhongDau}.html','IndexController@video');

Route::post('binhluan/{id}','BinhLuanController@postbinhluan');

Route::post('binhluanvideo/{id}','BinhLuanVideoController@postbinhluanvideo');



Route::get('dangnhap','PageController@getDangnhap');

Route::post('dangnhap','PageController@postDangnhap');

Route::get('dangxuat','PageController@getDangxuat');

Route::get('doimatkhau','PageController@getDoiMatKhau');

Route::post('doimatkhau','PageController@postDoiMatKhau');

Route::get('dangky','PageController@getDangky');

Route::post('dangky','PageController@postDangky');

Route::get('lienhe','pageController@getLienHe');

Route::post('lienhe','PageController@postLienHe');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

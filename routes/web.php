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



Route::get('quantri','QuanTriAuth@getLogin')->middleware('loginmiddleware');

Route::post('quantri/logon','QuanTriAuth@postLogin');

Route::group(['middleware'=>'logoutmiddleware'], function(){

	Route::get('quantri/quanli','QuanTriController@getQuanLi')->middleware('quantrimiddleware');

	Route::get('quantri/hoso/doimatkhau','QuanTriController@getChangePassword')->middleware('quantrimiddleware');

	Route::get('quantri/doiemail/checkpassforchangeemail','QuanTriController@getCheckPassChangeEmail')->middleware('quantrimiddleware');

	Route::get('quantri/hoso/doiemail','QuanTriController@getDoiEmail')->middleware('quantrimiddleware');

	Route::get('quantri/logout','QuanTriController@getLogout')->middleware('quantrimiddleware');

	Route::get('quantri/resetpassword','QuanTriController@getPassReset');

	Route::get('quantri/quanliuser/danhsachuser','QuanTriController@getDanhSachUser')->middleware('quantrimiddleware');

	Route::get('quantri/quanliuser/usercaphuyen','QuanTriController@getUserCapHuyen')->middleware('quantrimiddleware');
 });
////-----------------Route  Tat Ca Thanh Vien-----------------------------
/* Login member*/
Route::get('/', 'MemberController@getMemberLogin')->middleware('memberloginmiddleware');

Route::post('/member/login','MemberAuth@postLogin');
/* End Login Mneber */

// Chnage Password And Change Email OF member :001
Route::post('member/hosocanhan/doimatkhau','MemberAuth@doiMatKhau');

Route::post('member/doiemail/checkpass','MemberAuth@postCheckPass');

Route::post('member/doiemail/endchangeemail','MemberAuth@postEndChangeEmail');

Route::post('admincaptinh/tuvien/them','TuVienController@postThem');

Route::post('admincaptinh/tuvien/chinhsua','TuVienController@postChinhSua');

Route::post('admincaptinh/ajax/tabletrangthai','AjaxController@postTableTrangThai');
//End  POsst ALL method --------//
Route::group(['middleware'=>['membermiddleware','logoutmiddleware']], function(){

	Route::get('/member/logout','MemberController@getMemberLogout');
	
//---------------------Admin Cap tinh -------------------------------------------------------------//
	Route::group(['prefix'=>'admincaptinh'], function(){
		/**/
		
		//ket thuc them
		Route::get('/quanli','MemberController@getQuanLi');

		Route::get('hosocanhan/doimatkhau','MemberController@getDoiMatKhau');

		Route::get('hosocanhan/changeemail','MemberController@getDoiEmail');

		Route::get('hosocanhan/endchangeemail','MemberController@getEndChangeEmail');
		///---tu vien ------------//
		Route::get('tuvien/danhsach', 'TuVienController@getDanhSachTuVien');

		Route::get('tuvien/chinhsuafull','TuVienController@getChinhSuaFull');

		Route::get('tuvien/them', 'TuVienController@getThemTuVien');

		Route::get('tuvien/xoa/{id}','TuVienController@getXoa');

		Route::get('tuvien/chinhsua/{id}','TuVienController@getChinhSua');

		Route::get('tuvien/chitiet/{id}','TuVienController@getChiTiet');

		Route::get('tuvien/thongke','TuVienController@getThongKe');

		Route::get('tangni/danhsach','TangNiController@getDanhSachTN');	
		///-----ket thuc tu vien ---------//
		Route::group(['prefix'=>'ajax'],function(){

			Route::get('quanhuyen','AjaxController@getQuanHuyen');

			Route::get('trangthai','AjaxController@getTrangThai');

			Route::get('xaphuong/{id}','AjaxController@getXaPhuong');

			Route::get('tuviendistrict/{id}','AjaxController@getTuVienDistrict');

			Route::get('tuvien/{id}','AjaxController@getTuVien');

			Route::get('state/{id}','AjaxController@getTuVienOfState');

			Route::get('state/{id}/district/{id2}','AjaxController@getTuVienDistrictState');

			Route::get('state/{id}/district/{id2}/ward/{id3}','AjaxController@getTuVienDistrictWardState');

			/*Ajax Tang Ni */
			Route::get('tangni/tuoidao/{id}', 'AjaxController@getTangNiTuoiDao');

			Route::get('tangni/gioipham/{id}', 'AjaxController@getTangNiGioiPham');

			Route::get('tangni/giaopham/{id}', 'AjaxController@getTangNiGiaoPham');

			Route::get('danhsach/tangni/tuvien', 'AjaxController@getDanhSachTangNiTuVien');

			Route::get('danhsach/tangni/tuoidao', 'AjaxController@getDanhSachTangNiTuoiDao');

			Route::get('danhsach/tangni/gioipham', 'AjaxController@getDanhSachTangNiGioiPham');

			Route::get('danhsach/tangni/giaopham', 'AjaxController@getDanhSachTangNiGiaoPham');

			Route::get('soluongtuvien/{id}/ward/{id2}','AjaxController@getSLTuVien');
			
			Route::get('soluongtangni/{id}/ward/{id2}','AjaxController@getSLTangNi');
			Route::get('danhsachgioipham/{id}/ward/{id2}','AjaxController@GetDanhSachGioiPham');
			
			Route::get('danhsachgiaopham/{id}/ward/{id2}','AjaxController@GetDanhSachGiaoPham');

			Route::get('danhsachtrangthai/{id}/ward/{id2}','AjaxController@GetDanhSachTrangThai');


		});
		//--VĂN BẢN

		Route::group(['prefix'=>'vanban'],function(){
			Route::get('danhsachthongbao', 'VanBanController@getDanhSach');
			Route::get('danhsachthongbaomodal', 'VanBanController@getDanhSachModal');
			Route::get('uploadthongbao','VanBanController@getVanBan');
			Route::post('uploadthongbao','VanBanController@postVanban');
			Route::post('uploadthongbaomodal','VanBanController@postVanbanModal');
			Route::post('suathongbao','VanBanController@postSuaVanBan');
			Route::post('xoathongbao','VanBanController@postXoaVanBan');

			Route::get('danhsachdontu','PDFController@getDanhSachDon');
			Route::get('taodon','PDFController@getDon');
			Route::get('donxinxg','PDFController@getDonXinXG');
			Route::post('uploaddontu','PDFController@postDonToUpload');
			Route::post('suadon','PDFController@postSuaDon');
			Route::post('xoadon','PDFController@postXoaDon');
			Route::get('trangthai/{id}','PDFController@getTrangThai');
			// Route::get('guidon','PDFController@getGuiDon');
		});
			///--- Kết Thúc Văn Bản ------------//
		
	});

//-----------------------------Admin Cap Huyen ---------------------------//
	Route::group(['prefix'=>'admincaphuyen'], function(){

		Route::get('quanli/{id}/{code}','AdminCapHuyenController@getQuanLi');

	});
	//------cap xa -------------
	Route::group(['prefix'=>'admincapxa'], function(){

		Route::get('quanli/{id}','AdminCapXaController@getQuanLi');
		
	});
	//--------------------cap tu vien ----------------------//
	Route::group(['prefix'=>'admincaptuvien'], function(){

		Route::get('quanli/{id}','AdminCapTuVienController@getQuanLi');
		
	});
	Route::group(['prefix'=>'nguoidungthuong'], function(){

		Route::get('quanli/{id}','NormalMemberController@getQuanLi');
		
	});
});
// ---------------------Post nguoi dung quan tri --------------/
Route::post('quantri/resetpassword','QuanTriController@postPassReset');

Route::post('quantri/hoso/doimatkhau','QuanTriAuth@postChangePassword');

Route::post('quantri/doiemail/checkpassforchangeemail','QuanTriAuth@postCheckPassForChangeEmail');

Route::post('quantri/hoso/doiemail','QuanTriAuth@postChangeEmail');
//-------------End Post quan tri ------------//



//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

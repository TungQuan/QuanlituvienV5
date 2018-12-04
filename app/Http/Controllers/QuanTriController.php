<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
//use App\QuanTri;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\QuanTri;
use Illuminate\Support\Facades\DB;


//use Illuminate\Foundation\Auth\ThrottlesLogins;
class QuanTriController extends Controller
{
   public function getQuanLi(){

   		//return view('quantri/quanli');
      $quantri = DB::table('QuanTri')->select('name','username','email')->get();
      return view('quantri/quanli',['quantri'=>$quantri]);
   }
   
   

    public function getLogout() {
      Auth::guard('quantri')->logout();
      return redirect('quantri');
    }
  	
  	public function getPassReset(){
  		return view('quantri/resetpass');
  	}

    public function getChangePassword(){
      $quantri = DB::table('QuanTri')->select('name','username')->get();
      return view('quantri/doimatkhau',['quantri'=>$quantri]);
    }
   
   public function getCheckPassChangeEmail(){
       $quantri = DB::table('QuanTri')->select('name','username')->get();
      return view('quantri/checkpassforchangeemail',['quantri'=>$quantri]);
   }

   public function getDoiEmail(){
    $quantri = DB::table('QuanTri')->select('name','username')->get();
      return view('quantri/doiemail',['quantri'=>$quantri]);
   }

   public function getDanhSachUser(){
       $quantri = DB::table('QuanTri')->select('name','username')->get();

       $usercaptinh = DB::table('permission')->join('user','permission.user_id','=','user.id')->join('role','permission.role_id','=','role.role_id')->join('tangni','user.id_tangni','=','tangni.id_tangni')->join('tuvien','tangni.TuVienID','=','tuvien.TuVienID')->select('permission.user_id','user.username','user.email','tangni.PhapDanh','TuVien.TuVien_Ten')->where('permission.role_id','=','1')->get();
         return view('quantri/danhsachuser',['quantri'=>$quantri, 'usercaptinh'=>$usercaptinh]);
   }
   public function getUserCapHuyen(){
       $quantri = DB::table('QuanTri')->select('name','username')->get();
       $usercaphuyen = DB::table('permission')->join('user','permission.user_id','=','user.id')->join('role','permission.role_id','=','role.role_id')->join('tangni','user.id_tangni','=','tangni.id_tangni')->join('tuvien','tangni.TuVienID','=','tuvien.TuVienID')->select('permission.user_id','user.username','user.email','tangni.PhapDanh','TuVien.TuVien_Ten')->where('permission.role_id','=','2')->get();
        return view('quantri/danhsachusercaphuyen',['quantri'=>$quantri, 'usercaphuyen'=>$usercaphuyen]);
   }

}

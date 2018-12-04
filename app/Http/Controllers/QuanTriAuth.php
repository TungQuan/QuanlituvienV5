<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\QuanTri;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Hash;
use Validator;
class QuanTriAuth extends Controller
{
   use ThrottlesLogins;

   public function  getLogin(){
      
      return view('quantri/login');
      
   }

   public function postLogin(Request $request){
		 $credentials = $request->only('username', 'password');
  
     //$pass = bcrypt('user84');
    // $pass84 = bcrypt(('user84');
		 if (Auth::guard('quantri')->attempt($credentials)) 
		 {
		 	  return redirect('quantri/quanli');
    	}
    	else{
    		return redirect('quantri')->with('thongbao','Tên Đăng Nhập Hoặc Mật Khẩu Không Đúng');
    	}
      //'Tên Đăng Nhập Hoặc Mật Khẩu Không Đúng'
   } 
  
   //change pasword
    public function postChangePassword(Request $request){

        $validator = Validator::make($request->all(), [
        'renewpass' => 'required|same:newpass',
    ]);

    if ($validator->fails()) {
       return redirect('quantri/hoso/doimatkhau')->with('thongbao','Mật Khẩu Xác Nhận Không Trùng Khớp');
    }
    else{
       $oldpass = $request->oldpass;
       $newpass = $request->newpass;
       $password = Auth::guard('quantri')->user()->password;
       if (Hash::check($oldpass, $password))
       {
            Auth::guard('quantri')->user()->password = Hash::make($newpass);
            Auth::guard('quantri')->user()->save();
            Auth::guard('quantri')->logout();
           return redirect('quantri')->with('thongbao2','Đổi Mật Khẩu Thành Công, Vui Lòng Đăng Nhập Lại');
        }
        else{
          return redirect('quantri/hoso/doimatkhau')->with('thongbao1','Mật Khẩu Hiện Tại Không Đúng');
        } 
        
    }
  }
  //change email
  public function postCheckPassForChangeEmail(Request $request){
        $password = $request->password;
        $current_password = Auth::guard('quantri')->user()->password;
        if(Hash::check($password, $current_password)){
            return redirect('quantri/hoso/doiemail');
        }
        else{
          return redirect('quantri/doiemail/checkpassforchangeemail')->with('thongbao','Mật Khẩu Không Đúng, Vui Lòng Thử Lại!');
        }
  }

  public function postChangeEmail(Request $request){
       $validator = Validator::make($request->all(), [
        'email' => 'unique:quantri,email'
    ]);
       if ($validator->fails()) {
        return redirect('quantri/hoso/doiemail')->with('thongbao','Email này đã tồn tại trên hệ thống');
      }
      else{
          
      }
  }


}

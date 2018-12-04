<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\user;
use App\permission;
use App\Mail\VerifyCode;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Hash;
use Validator;
use Mail;
class MemberAuth extends Controller
{ 
   use ThrottlesLogins;

    public static function rand_string($length) {
      $chars = "0123456789";
      $size = strlen( $chars );
      $str = '';
      for( $i = 0; $i < $length; $i++ ) {
        $str .= $chars[ rand( 0, $size - 1 ) ];
      }
      return $str;
    }
   public function postLogin(Request $request){
       $inforlogin = $request->only('username','password');
     if (Auth::guard('user')->attempt($inforlogin)) {
 
        return redirect('/');
      }
      else{
        return redirect('/')->with('thongbao','Tên Đăng Nhập Hoặc Mật Khẩu Không Đúng');
      }
   }

   public function doiMatKhau(Request $request){

      $validator = Validator::make($request->all(), [
        'renewpass' => 'required|same:newpass',
      ]);

      if ($validator->fails()) {
         return back()->with('thongbao','Mật Khẩu Xác Nhận Không Trùng Khớp');
      }
      else{
         $oldpass = $request->oldpass;
         $newpass = $request->newpass;
         $password = Auth::guard('user')->user()->password;
         if (Hash::check($oldpass, $password))
         {
              Auth::guard('user')->user()->password = Hash::make($newpass);
              Auth::guard('user')->user()->save();
              Auth::guard('user')->logout();
              return redirect('/')->with('thongbao2','Đổi Mật Khẩu Thành Công, Vui Lòng Đăng Nhập Lại');
          }
          else
          {
            return back()->with('thongbao1','Mật Khẩu Hiện Tại Không Đúng.');

          }    
      }
   }
   public function postCheckPass(Request $request ){
        $current_pass = $request->password;
        $email = $request->email;
        $validator = Validator::make($request->all(), [
          'email' => 'unique:user,email',
        ]);

      if ($validator->fails()) {
         return back()->with('thongbaoemail','Email này đã tồn tại trên hệ thống');
      }
      else{
        $user = Auth::guard('user')->user();
       //$password = Auth::guard('user')->user()->password;
        $password = $user->password;
        if (Hash::check($current_pass, $password))
         {
              $code = MemberAuth::rand_string(8);
             // Auth::guard('user')->user()->code = $code;
             // Auth::guard('user')->user()->email_temp = $email;
            //  Auth::guard('user')->user()->save();
              
             /* Mail::send('member.mailsend',['code'=>$code],function($m){
                $m->from('quanliphatgiao@gmail.com', 'quanliphatgiao');
                $m->to(,'')->subject('Xác Nhận Email - Hệ Thống Quản Lí Phật Giáo');
              });*/
               Mail::to($email)->send(new VerifyCode($code));
               $user->code = $code;
               $user->email_temp = $email;
               $user->save();
              return redirect('admincaptinh/hosocanhan/endchangeemail')->with('thongbao','Vui lòng nhập mật mã vừa được gửi tới email của bạn để hoàn tất');
          }
          else{
            return back()->with('thongbao1','Mật Khẩu Hiện Tại Không Đúng.');
          }
      }    
   }
   public function postEndChangeEmail(Request $request){
      $code = $request->code;
      $user = Auth::guard('user')->user();
     // $code_current = Auth::guard('user')->user()->code;
     // $email_temp =  Auth::guard('user')->user()->email_temp;
      $code_current = $user->code;
      $email_temp =  $user->email_temp;
       
      if($code === $code_current){
        /*
           Auth::guard('user')->user()->email = $email_temp;
           Auth::guard('user')->user()->code = "";
           Auth::guard('user')->user()->email_temp = "";
           Auth::guard('user')->user()->save();
          */
           $user->email = $email_temp;
           $user->code = "";
           $user->email_temp = "";
           $user->save();
           return redirect('/');
      }
      else{
          return back()->with('thongbao1','Mã xác nhận không đúng. Vui lòng thử lại');
      }
   }
}

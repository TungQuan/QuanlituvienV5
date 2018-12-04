<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
//use App\QuanTri;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\user;

use Illuminate\Support\Facades\DB;

class MemBerController extends Controller
{
	public function getPhapDanh($tangniid){
        $phapdanh = DB::table('tangni')->select('PhapDanh')->where('tangni_id','=',$tangniid)->value('PhapDanh');
        return $phapdanh;
    }
    public function getRoleID($userid){
    	//$roleid = DB::table('permission')->select('role_id')->where('user_id','=',$userid)->get();
    	$roleid = DB::table('permission')->select('role_id')->where('user_id','=',$userid)->value('role_id');
    	return $roleid;
    }

    public function getViewRole($roleid){

    }

    public function getMemberLogin(){
    	return view('member/login');
    }

    public function getMemberLogout(){
    	  Auth::guard('user')->logout();
      	return redirect('/');
    }

    public function getQuanLi(){
    	$user = Auth::guard('user')->user();
    	$userid = $user->id;
    	$email = $user->email;
    	$username = $user->username;
    	$tangni_id = $user->tangni_id;
    	$phapdanh = $this->getPhapDanh($tangni_id);
    	$roleid = $this->getRoleID($userid);
    	$levelname = DB::table('role')->select('role_name')->where('role_id','=',$roleid)->value('role_name');
    	if($roleid === 1){
    		return view('admincaptinh/quanli',['phapdanh'=>$phapdanh,'levelname'=>$levelname,'username'=>$username,'email'=>$email]);
    	}
    	
    }

    public function getDoiMatKhau(){
    	$user = Auth::guard('user')->user();
    	$userid = $user->id;
    	$tangniid = $user->tangni_id;
    	$roleid = $this->getRoleID($userid);
        $phapdanh = $this->getPhapDanh($tangniid);
        if($roleid === 1){
        	return view('admincaptinh/doimatkhau',['phapdanh'=>$phapdanh]);
        }
        else if($roleid === 2){
        	return view('admincaphuyen/doimatkhau',['phapdanh'=>$phapdanh]);
        }
        else if($role_id === 3 ){
        	return view('admincapxa/doimatkhau',['phapdanh'=>$phapdanh]);
        }
        else if($role_id === 4 ){
        	return view('admincaptuvien/doimatkhau',['phapdanh'=>$phapdanh]);
        }
        else{
        	return view('nguoidungthuong/doimatkhau',['phapdanh'=>$phapdanh]);
        }

    }

    public function getDoiEmail(){
    	$user = Auth::guard('user')->user();
    	$userid = $user->id;
    	$tangniid = $user->tangni_id;
    	$roleid = $this->getRoleID($userid);
        $phapdanh = $this->getPhapDanh($tangniid);
        if($roleid === 1){
        	return view('admincaptinh/doiemail',['phapdanh'=>$phapdanh]);
        }
        else if($roleid === 2){
        	return view('admincaphuyen/doiemail',['phapdanh'=>$phapdanh]);
        }
        else if($role_id === 3 ){
        	return view('admincapxa/doiemail',['phapdanh'=>$phapdanh]);
        }
        else if($role_id === 4 ){
        	return view('admincaptuvien/doiemail',['phapdanh'=>$phapdanh]);
        }
        else{
        	return view('nguoidungthuong/doiemail',['phapdanh'=>$phapdanh]);
        }
    }
    public function getEndChangeEmail(){
    	$user = Auth::guard('user')->user();
    	$userid = $user->id;
    	$tangniid = $user->tangni_id;
    	$roleid = $this->getRoleID($userid);
        $phapdanh = $this->getPhapDanh($tangniid);
        if($roleid === 1){
        	return view('admincaptinh/endchangeemail',['phapdanh'=>$phapdanh]);
        }
        else if($roleid === 2){
        	return view('admincaphuyen/endchangeemail',['phapdanh'=>$phapdanh]);
        }
        else if($role_id === 3 ){
        	return view('admincapxa/endchangeemail',['phapdanh'=>$phapdanh]);
        }
        else if($role_id === 4 ){
        	return view('admincaptuvien/endchangeemail',['phapdanh'=>$phapdanh]);
        }
        else{
        	return view('nguoidungthuong/endchangeemail',['phapdanh'=>$phapdanh]);
        }

    }

    
}

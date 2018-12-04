<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\user;
use Illuminate\Support\Facades\Auth;
use Validator;
use Session;
class TangNiController extends Controller
{
    public function getPhapDanh($tangniid){
        $phapdanh = DB::table('tangni')->select('PhapDanh')->where('id_tangni','=',$tangniid)->value('PhapDanh');
        return $phapdanh;
    }
    public function getRoleID($userid){
       
        $roleid = DB::table('permission')->select('role_id')->where('user_id','=',$userid)->value('role_id');
        return $roleid;
    }
    
    public function getDanhSachTN(){
        $user = Auth::guard('user')->user();
        $userid = $user->id;
        $tangniid = $user->id_tangni;
        $roleid = $this->getRoleID($userid);
        $phapdanh = $this->getPhapDanh($tangniid);
        $tangni = DB::table('TangNi')->join('TuVien', 'TangNi.TuVienID','=','TuVien.TuVienID')->join('GioiPham','TangNi.GioiPhamID','=','GioiPham.GioiPhamID')
        ->join('GiaoPham','TangNi.GiaoPhamID','=','GiaoPham.GiaoPhamID')
        ->select('id_tangni','PhapDanh','TuoiDao','TuVien_Ten','GioiPham_Ten','GiaoPham_Ten')->get();
        if($roleid === 1){
           
            return view('admincaptinh/tangni/danhsach',['phapdanh'=>$phapdanh,'tangni'=>$tangni]);
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
    	
    	return view('admin/tangni/danhsachfull',['tangni'=>$tangni]);
    }
    ////
    public function getThem(){
        return view('admin/tangni/themtangni');
    }
    public function getHoSo($TangNiID){
        return view('admin/tangni/hoso');
    }
    public function getChinhSua(){
        $tangni1 = DB::table('TangNi')->join('TuVien', 'TangNi.TuVienID','=','TuVien.TuVienID')->join('GioiPham','TangNi.GioiPhamID','=','GioiPham.GioiPhamID')
        ->join('GiaoPham','TangNi.GiaoPhamID','=','GiaoPham.GiaoPhamID')
        ->select('TangNiID','PhapDanh','TuoiDao','TuVien_Ten','GioiPham_Ten','GiaoPham_Ten')->get();
        return view('admin/tangni/chinhsua',['tangni1'=>$tangni1]);
    }
   
}

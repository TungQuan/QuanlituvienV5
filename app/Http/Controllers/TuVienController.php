<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\user;
use Illuminate\Support\Facades\Auth;
use Validator;
use Session;
use Illuminate\Support\Collection;
class TuVienController extends Controller
{
   
    public function getPhapDanh($tangniid){
        $phapdanh = DB::table('tangni')->select('PhapDanh')->where('tangni_id','=',$tangniid)->value('PhapDanh');
        return $phapdanh;
    }
    public function getRoleID($userid){
       
        $roleid = DB::table('permission')->select('role_id')->where('user_id','=',$userid)->value('role_id');
        return $roleid;
    }

    public function getDanhSachTuVien(){
        $user = Auth::guard('user')->user();
        $userid = $user->id;
        $tangniid = $user->tangni_id;
        $roleid = $this->getRoleID($userid);
        $phapdanh = $this->getPhapDanh($tangniid);
        if($roleid === 1){
            $tuvien = DB::table('TuVien')->join('XaPhuong','TuVien.xaphuong_id','=','XaPhuong.xaphuong_id') 
            -> join('QuanHuyen','XaPhuong.quanhuyen_id','=','QuanHuyen.quanhuyen_id')
            ->join('TrangThai','TuVien.trangthai_id','=','TrangThai.trangthai_id')
            ->select('tuvien.tuvien_id','tuvien_ten','xaphuong_ten','quanhuyen_ten','trangthai_ten','phone','diachi')->get();
            return view('admincaptinh/tuvien/danhsach',['phapdanh'=>$phapdanh,'tuvien'=>$tuvien]);
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
    public function getChinhSuaFull(){
        $user = Auth::guard('user')->user();
        $userid = $user->id;
        $tangniid = $user->tangni_id;
        $roleid = $this->getRoleID($userid);
        $phapdanh = $this->getPhapDanh($tangniid);
        if($roleid === 1){
            $tuvien = DB::table('TuVien')->join('XaPhuong','TuVien.xaphuong_id','=','XaPhuong.xaphuong_id') 
            -> join('QuanHuyen','XaPhuong.quanhuyen_id','=','QuanHuyen.quanhuyen_id')
            ->join('TrangThai','TuVien.trangthai_id','=','TrangThai.trangthai_id')
            ->select('tuvien_id','tuvien_ten','xaphuong_ten','quanhuyen_ten','trangthai_ten','phone','diachi')->get();
            return view('admincaptinh/tuvien/chinhsuafull',['phapdanh'=>$phapdanh,'tuvien'=>$tuvien]);
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
    public function getThemTuVien(){
        $user = Auth::guard('user')->user();
        $userid = $user->id;
        $tangniid = $user->tangni_id;
        $roleid = $this->getRoleID($userid);
        $phapdanh = $this->getPhapDanh($tangniid);
        $quanhuyen = DB::table('quanhuyen')->select('*')->get();
        $trangthai = DB::table('trangthai')->select('*')->get();
        if($roleid === 1){
            
            return view('admincaptinh/tuvien/them',['phapdanh'=>$phapdanh, 'quanhuyen'=>$quanhuyen, 'trangthai'=>$trangthai]);
        }
        else if($roleid === 2){
            return view('admincaphuyen/tuvien/them',['phapdanh'=>$phapdanh]);
        }
        else if($role_id === 3 ){
            return view('admincapxa/tuvien/them',['phapdanh'=>$phapdanh]);
        }
        else if($role_id === 4 ){
            return view('admincaptuvien/tuvien/them',['phapdanh'=>$phapdanh]);
        }
        else{
            return view('nguoidungthuong/tuvien/them',['phapdanh'=>$phapdanh]);
        }
    }

    public function postThem(Request $request){
        $validator = Validator::make($request->all(), [
        'phone' => 'bail|required|regex:/[0-9]{10}/',
        'image' => 'bail|mimes:jpeg,png|max:2048',
        
        ],
        [
            'regex'=>'Số điện thoại phải đúng 10 số',
            'mimes'=>'Hình ảnh không đúng định dạng',
            'max'=>'Kích thước tối đa file ảnh là 2MB'
        ]
    );

      if ($validator->fails()) {
         return back()->withErrors($validator)
                    ->withInput();
      }
      else{
         $name = $request->tentuvien;
         $trangthai = $request->trangthai;
         $diachi = $request->diachi;
         //$quanhuyen = $request->quanhuyen;
         $xaphuong = $request->xaphuong;
         $phone = $request->phone;
         $email = $request->email;
         if ($request->hasFile('image')) {

            $file = $request->image;
            $filename =  time().'_'.$file->getClientOriginalName();
            $upload = public_path('fontend_admin/image/tuvien');
            $file->move($upload, $filename);
            
        }
        else{
            $filename = NULL;
        }
        
         DB::table('tuvien')->insertGetId( 
          ['tuvien_ten'=>$name,'trangthai_id'=>$trangthai, 'diachi'=>$diachi,'xaphuong_id'=> $xaphuong, 'phone'=>$phone, 'email'=>$email, 'image'=>$filename]
        
        );
        return redirect('admincaptinh/tuvien/them')->with('thongbao1','Thêm Thành Công');
      }
   }
   //xoa tu vien
   public function getXoa($id){
        DB::table('tuvien')->where('tuvien_id','=',$id)->delete();
        return redirect('admincaptinh/tuvien/danhsach');
   }
   public function getChinhSua($id){
        $user = Auth::guard('user')->user();
        $userid = $user->id;
        $tangniid = $user->tangni_id;
        $roleid = $this->getRoleID($userid);
        $phapdanh = $this->getPhapDanh($tangniid);
        $tuvien = DB::table('TuVien')->join('XaPhuong','TuVien.xaphuong_id','=','XaPhuong.xaphuong_id') 
            -> join('QuanHuyen','XaPhuong.quanhuyen_id','=','QuanHuyen.quanhuyen_id')
            ->join('TrangThai','TuVien.trangthai_id','=','TrangThai.trangthai_id')
            ->select('tuvien_id','XaPhuong.xaphuong_id','TrangThai.trangthai_id','QuanHuyen.quanhuyen_id','tuvien_ten','xaphuong_ten','quanhuyen_ten','trangthai_ten','phone','email','image','diachi')->where('tuvien_id','=',$id)->get();
        if($roleid === 1){
            
            return view('admincaptinh/tuvien/chinhsua',['phapdanh'=>$phapdanh,'tuvien'=>$tuvien]);
        }
        else if($roleid === 2){
            return view('admincaphuyen/tuvien/chinhsua',['phapdanh'=>$phapdanh]);
        }
        else if($role_id === 3 ){
            return view('admincapxa/tuvien/chinhsua',['phapdanh'=>$phapdanh]);
        }
        else if($role_id === 4 ){
            return view('admincaptuvien/tuvien/chinhsua',['phapdanh'=>$phapdanh]);
        }
        else{
            return view('nguoidungthuong/tuvien/chinhsua',['phapdanh'=>$phapdanh]);
        }
    }
    public function getChiTiet($id){
        $user = Auth::guard('user')->user();
        $userid = $user->id;
        $tangniid = $user->tangni_id;
        $roleid = $this->getRoleID($userid);
        $phapdanh = $this->getPhapDanh($tangniid);
        $tuvien = DB::table('TuVien')->join('XaPhuong','TuVien.xaphuong_id','=','XaPhuong.xaphuong_id') 
            -> join('QuanHuyen','XaPhuong.quanhuyen_id','=','QuanHuyen.quanhuyen_id')
            ->join('TrangThai','TuVien.trangthai_id','=','TrangThai.trangthai_id')
            ->select('tuvien_id','XaPhuong.xaphuong_id','TrangThai.trangthai_id','QuanHuyen.quanhuyen_id','tuvien_ten','xaphuong_ten','quanhuyen_ten','trangthai_ten','phone','email','image','diachi')->where('tuvien_id','=',$id)->get();
        $count = DB::table('tangni')->where('tuvien_id','=',$id)->count();

        $giaopham = DB::table('tangni')->join('giaopham','tangni.giaopham_id','=','giaopham.giaopham_id')->select('giaopham_ten',DB::raw('Count(tangni_id) as soluonggiaopham'))->where('tuvien_id','=',$id)->groupBy('giaopham_ten')->get();

        $gioipham = DB::table('tangni')->join('gioipham','tangni.gioipham_id','=','gioipham.gioipham_id')->select('gioipham_ten',DB::raw('Count(tangni_id) as soluonggioipham'))->where('tuvien_id','=',$id)->groupBy('gioipham_ten')->get();
        
        if($roleid === 1){
            
            return view('admincaptinh/tuvien/chitiet',['phapdanh'=>$phapdanh,'tuvien'=>$tuvien,'count'=>$count,'giaopham'=>$giaopham,'gioipham'=>$gioipham]);
        }
        else if($roleid === 2){
            return view('admincaphuyen/tuvien/chinhsua',['phapdanh'=>$phapdanh]);
        }
        else if($role_id === 3 ){
            return view('admincapxa/tuvien/chinhsua',['phapdanh'=>$phapdanh]);
        }
        else if($role_id === 4 ){
            return view('admincaptuvien/tuvien/chinhsua',['phapdanh'=>$phapdanh]);
        }
        else{
            return view('nguoidungthuong/tuvien/chinhsua',['phapdanh'=>$phapdanh]);
        }
    }
    public function postChinhSua(Request $request){
        $validator = Validator::make($request->all(), [
        'phone' => 'bail|required|regex:/[0-9]{10}/',
        'image' => 'bail|mimes:jpeg,png|max:2048',
        
        'diachi'=> 'bail|required',
        ],
        [
            'regex'=>'Số điện thoại phải đúng 10 số',
            'mimes'=>'Hình ảnh không đúng định dạng',
            'max'=>'Kích thước file ảnh tối đa là 2MB',
            'phone.required'=>'Trường Số điện thoại không được để trống',
            'diachi.required'=>'Trường Địa chỉ không được để trống'
        ]
    );

      if ($validator->fails()) {
         return back()->withErrors($validator)
                    ->withInput();
      }
      else{
         $name = $request->tentuvien;
         //$trutri = $request->trutri;
         $trangthai = $request->trangthai;
         $diachi = $request->diachi;
         //$quanhuyen = $request->quanhuyen;
         $xaphuong = $request->xaphuong;
         $phone = $request->phone;
         $email = $request->email;
         $tuvien_id = $request->idtuvien;
         if ($request->hasFile('image')) {

            $file = $request->image;
            $filename =  time().'_'.$file->getClientOriginalName();
            $upload = public_path('fontend_admin/image/tuvien');
            $file->move($upload, $filename);
            
        }
        else{
            $filename = NULL;
        }
         DB::table('tuvien')->where('tuvien_id','=',$tuvien_id)
         ->update(['tuvien_ten'=>$name,'trangthai_id'=>$trangthai,
                    'diachi'=>$diachi,'xaphuong_id'=>$xaphuong,'phone'=>$phone, 'email'=>$email,'image'=>$filename]);
        return back()->with('thongbao1','Sửa Thành Công');
      }
    }
    public function getThongKe(){
        $user = Auth::guard('user')->user();
        $userid = $user->id;
        $tangniid = $user->tangni_id;
        $roleid = $this->getRoleID($userid);
        $phapdanh = $this->getPhapDanh($tangniid);
        $soluongtangni = DB::table('tangni')->count();
        $soluongtuvien = DB::table('tuvien')->count();
        $gioipham = DB::table('gioipham')->leftjoin('tangni','tangni.gioipham_id','=','gioipham.gioipham_id')->select('gioipham_ten',DB::raw('Count(tangni_id) as soluonggioipham'))->groupBy('gioipham_ten')->get();
        $giaopham = DB::table('giaopham')->leftjoin('tangni','tangni.giaopham_id','=','giaopham.giaopham_id')->select('giaopham_ten',DB::raw('Count(tangni_id) as soluonggiaopham'))->groupBy('giaopham_ten')->get();
        $trangthai = DB::table('trangthai')->leftjoin('tuvien','tuvien.trangthai_id','=','trangthai.trangthai_id')->select('trangthai_ten',DB::raw('Count(tuvien_id) as soluongtrangthai'))->groupBy('trangthai_ten')->get();
        if($roleid === 1){
            
            return view('admincaptinh/tuvien/thongke',['phapdanh'=>$phapdanh,'soluongtangni'=>$soluongtangni,'soluongtuvien'=>$soluongtuvien,'gioipham'=>$gioipham,'giaopham'=>$giaopham,'trangthai'=>$trangthai]);
        }
        else if($roleid === 2){
            return view('admincaphuyen/tuvien/them',['phapdanh'=>$phapdanh]);
        }
        else if($role_id === 3 ){
            return view('admincapxa/tuvien/them',['phapdanh'=>$phapdanh]);
        }
        else if($role_id === 4 ){
            return view('admincaptuvien/tuvien/them',['phapdanh'=>$phapdanh]);
        }
        else{
            return view('nguoidungthuong/tuvien/them',['phapdanh'=>$phapdanh]);
        }
    }
} 
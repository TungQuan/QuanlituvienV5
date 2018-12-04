<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\user;
use Illuminate\Support\Facades\Auth;
use Validator;
use Session;
use PDF;
use App;
use View;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Alert;
class PDFController extends Controller
{
    //
	 public function getPhapDanh($tangniid){
        $phapdanh = DB::table('tangni')->select('PhapDanh')->where('tangni_id','=',$tangniid)->value('PhapDanh');
        return $phapdanh;
    }
    public function getRoleID($userid){
       
        $roleid = DB::table('permission')->select('role_id')->where('user_id','=',$userid)->value('role_id');
        return $roleid;
    }
    //-- ĐƠN XIN XUẤT GIA WITH MODAL
    public function getDon()
    {
    	$user = Auth::guard('user')->user();
        $userid = $user->id;
        $tangniid = $user->tangni_id;
        $roleid = $this->getRoleID($userid);
        $phapdanh = $this->getPhapDanh($tangniid);
        if($roleid === 1){
            return view('admincaptinh/vanban/dontu/donxinxuatgia',['phapdanh'=>$phapdanh]);
        }
        else if($roleid === 2){
            return view('admincaphuyen/vanban/dontu/donxinxuatgia',['phapdanh'=>$phapdanh]);
        }
        else if($role_id === 3 ){
            return view('admincapxa/vanban/dontu/donxinxuatgia',['phapdanh'=>$phapdanh]);
        }
        else if($role_id === 4 ){
            return view('admincaptuvien/vanban/dontu/donxinxuatgia',['phapdanh'=>$phapdanh]);
        }
        else{
            return view('nguoidungthuong/vanban/dontu/donxinxuatgia',['phapdanh'=>$phapdanh]);
        }
    }
    //-- ĐƠN XIN XUẤT GIA WITH MODAL


    public function getDonXinXG()
    {
        return view('admincaptinh/vanban/dontu/demo');
    }
    //-- ĐƠN XIN XUẤT GIA GIAO DIỆN LỚN


    public function getDanhSachDon()
    {
        $user = Auth::guard('user')->user();
        $userid = $user->id;
        $tangniid = $user->id_tangni;
        $roleid = $this->getRoleID($userid);
        $phapdanh = $this->getPhapDanh($tangniid);
        // $dontu=DB::table('dontu')->select('*')->get();
        $dontu = DB::table('dontu')->paginate(5);
        if($roleid === 1){
            return view('admincaptinh/vanban/dontu/danhsachdon',['dontu'=>$dontu,'phapdanh'=>$phapdanh]);
        }
        else if($roleid === 2){
            return view('admincaphuyen/vanban/dontu/donxinxuatgia',['dontu'=>$dontu,'phapdanh'=>$phapdanh]);
        }
        else if($role_id === 3 ){
            return view('admincapxa/vanban/dontu/danhsachdon',['dontu'=>$dontu,'phapdanh'=>$phapdanh]);
        }
        else if($role_id === 4 ){
            return view('admincaptuvien/vanban/dontu/danhsachdon',['dontu'=>$dontu,'phapdanh'=>$phapdanh]);
        }
        else{
            return view('nguoidungthuong/vanban/dontu/danhsachdon',['dontu'=>$dontu,'phapdanh'=>$phapdanh]);
        }
    }
    // public function getDonToUpload()
    // {
    //     $user = Auth::guard('user')->user();
    //     $userid = $user->id;
    //     $tangniid = $user->id_tangni;
    //     $roleid = $this->getRoleID($userid);
    //     $phapdanh = $this->getPhapDanh($tangniid);
    //     $dontu=DB::table('dontu')->select('*')->get();
    //     if($roleid === 1){
    //         return view('admincaptinh/vanban/dontu/uploaddon',['dontu'=>$dontu,'phapdanh'=>$phapdanh]);
    //     }
    //     else if($roleid === 2){
    //         return view('admincaphuyen/vanban/dontu/uploaddon',['dontu'=>$dontu,'phapdanh'=>$phapdanh]);
    //     }
    //     else if($role_id === 3 ){
    //         return view('admincapxa/vanban/dontu/uploaddon',['dontu'=>$dontu,'phapdanh'=>$phapdanh]);
    //     }
    //     else if($role_id === 4 ){
    //         return view('admincaptuvien/vanban/dontu/uploaddon',['dontu'=>$dontu,'phapdanh'=>$phapdanh]);
    //     }
    //     else{
    //         return view('nguoidungthuong/vanban/dontu/uploaddon',['dontu'=>$dontu,'phapdanh'=>$phapdanh]);
    //     }
    // }

    public function postDonToUpload(request $request){
        $user = Auth::guard('user')->user();
        $tangniid=$user->tangni_id;
        $tendon=$request->tendon;
        $ngaytao=carbon::now();
        $ghichu=$request->ghichu;
        if ($request->hasFile('dontu'))
        {
            $file=$request->file('dontu');
            $name = $file->getClientOriginalName();
            $dontu1 = str_random(4)."_".$name;
            while (file_exists('vanban/dontu/'.$dontu1))
            {
                $dontu1 = str_random(4)."_".$name;
            }
            $file->move('vanban/dontu',$dontu1);
            $dontu=$dontu1;
        }
        else 
        {
            $dontu->chondon = null;
        }
        DB::table('dontu')->insertGetId( 
          ['tendon'=>$tendon, 'ghichu'=>$ghichu, 'ngaytao'=>$ngaytao, 'chondon'=>$dontu, 'tangni_id'=>$tangniid]
        );
        Alert::success('Thêm thành công!');
        return redirect()->back();
   }
    public function getTrangThai($id){
        $dt=DB::table('dontu')->where('id', $id)->first();
        if($dt->trangthai==0){
            DB::table('dontu')
            ->where('id', $id)
            ->update(array('trangthai' => 1));
        }
        else{
            DB::table('dontu')
            ->where('id', $id)
            ->update(array('trangthai' => 0));
        }
        Alert::success('Thao tác thành công!');
        return redirect()->back();
    }

    public function postSuaDon(request $request){

        $tendon=$request->tendon;
        $ngaytao=carbon::now();
        $ghichu=$request->ghichu;
        $iddon=$request->iddon;
        if ($request->hasFile('dontu'))
        {
            $file=$request->file('dontu');
            $name = $file->getClientOriginalName();
            $dontu1 = str_random(4)."_".$name;
            while (file_exists('vanban/dontu/'.$dontu1))
            {
                $dontu1 = str_random(4)."_".$name;
            }
            $file->move('vanban/dontu',$dontu1);
            $dontu=$dontu1;
            $vanbanmoi=DB::table('dontu')->where('id',$iddon)->update( 
              ['tendon'=>$tendon,'ngaytao'=>$ngaytao, 'ghichu'=>$ghichu, 'chondon'=>$dontu]);
                Alert::success('Sửa thành công!');
              return redirect()->back();
        }
        else 
        {
            $vanbanmoi=DB::table('dontu')->where('id',$iddon)->update( 
              ['tendon'=>$tendon,'ngaytao'=>$ngaytao, 'ghichu'=>$ghichu]);
                Alert::success('Sửa thành công!');
              return redirect()->back();
        }
   }

   public function postXoaDon(Request $req)
   {
        DB::table('dontu')->where('id',$req->iddon)->delete();
        Alert::success('Xóa thành công!');
        return redirect()->back();  
   }
}
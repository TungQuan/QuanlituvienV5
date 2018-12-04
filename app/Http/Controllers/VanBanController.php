<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\user;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Validator;
use Session;
use Alert;
use response;
use Illuminate\Support\Facades\Input;
class VanBanController extends Controller
{
	public function getPhapDanh($tangniid){
        $phapdanh = DB::table('tangni')->select('PhapDanh')->where('tangni_id','=',$tangniid)->value('PhapDanh');
        return $phapdanh;
    }
    public function getRoleID($userid){
       
        $roleid = DB::table('permission')->select('role_id')->where('user_id','=',$userid)->value('role_id');
        return $roleid;
    }

    public function getDanhSachModal(){
        $user = Auth::guard('user')->user();
        $userid = $user->id;
        $tangniid = $user->tangni_id;
        $roleid = $this->getRoleID($userid);
        $phapdanh = $this->getPhapDanh($tangniid);
        $vanban = DB::table('vanban')->paginate(5);
        // $vanban=DB::table('vanban')->select('*')->get();
        if($roleid === 1){          
            return view('admincaptinh/vanban/thongbao/danhsachthongbaomodal',['vanban'=>$vanban,'phapdanh'=>$phapdanh]); 
        }
        else if($roleid === 2){
            return view('admincaphuyen/vanban/thongbao/danhsachthongbaomodal',['vanban'=>$vanban,'phapdanh'=>$phapdanh]);
        }
        else if($role_id === 3 ){
            return view('admincapxa/vanban/thongbao/danhsachthongbaomodal',['vanban'=>$vanban,'phapdanh'=>$phapdanh]);
        }
        else if($role_id === 4 ){
            return view('admincaptuvien/vanban/thongbao/danhsachthongbaomodal',['vanban'=>$vanban,'phapdanh'=>$phapdanh]);
        }
        else{
            return view('nguoidungthuong/vanban/thongbao/danhsachthongbaomodal',['vanban'=>$vanban,'phapdanh'=>$phapdanh]);
        }
    }

    public function postVanbanModal(request $request){
            $user = Auth::guard('user')->user();
            $tangniid=$user->tangni_id;
            $tenvanban=$request->tenvanban;
            $congvanso=$request->congvanso;
            $noiphathanh=$request->noiphathanh;
            $noidungtomtat=$request->noidungtomtat;
            $ngaynhan=carbon::now();
            $ghichu=$request->ghichu;
            $ngaybanhanh=$request->ngaybanhanh;
            if ($request->hasFile('vanban'))
            {
                $file=$request->file('vanban');
                $name = $file->getClientOriginalName();
                $vanban1 = str_random(4)."_".$name;
                while (file_exists('vanban/thongbao/'.$vanban1))
                {
                    $vanban1 = str_random(4)."_".$name;
                }
                $file->move('vanban/thongbao',$vanban1);
                $vanban=$vanban1;

                $vanbanmoi=DB::table('vanban')->insertGetId( 
              ['tenvanban'=>$tenvanban,'congvanso'=>$congvanso,'noiphathanh'=>$noiphathanh,'vanban'=> $vanban, 'noidungtomtat'=>$noidungtomtat,'ngaynhan'=> $ngaynhan,'ngaybanhanh'=>$ngaybanhanh, 'ghichu'=>$ghichu, 'tangni_id'=>$tangniid]
            );
            Alert::success('Thêm thành công!');
            return redirect()->back();
            }
            else 
            {
                Alert::error('Error Message', 'Có lỗi!!')->persistent('Đóng');
                return redirect()->back();
            }
            
   }

     public function postSuaVanBan(request $request){
        $tenvanban=$request->tenvanban;
        $congvanso=$request->congvanso;
        $noiphathanh=$request->noiphathanh;
        $noidungtomtat=$request->noidungtomtat;
        $ngaynhan=carbon::now();
        $ghichu=$request->ghichu;
        $ngaybanhanh=$request->ngaybanhanh;
        $idthongbao=$request->idthongbao;
            if ($request->hasFile('vanban'))
            {
                $file=$request->file('vanban');
                $name = $file->getClientOriginalName();
                $vanban1 = str_random(4)."_".$name;
                while (file_exists('vanban/thongbao/'.$vanban1))
                {
                    $vanban1 = str_random(4)."_".$name;
                }
                $file->move('vanban/thongbao',$vanban1);
                $vanban=$vanban1;
                
                $vanbanmoi=DB::table('vanban')->where('id',$idthongbao)->update( 
              ['tenvanban'=>$tenvanban,'congvanso'=>$congvanso,'noiphathanh'=>$noiphathanh,'vanban'=> $vanban, 'noidungtomtat'=>$noidungtomtat,'ngaynhan'=> $ngaynhan,'ngaybanhanh'=>$ngaybanhanh, 'ghichu'=>$ghichu]);
                Alert::success('Sửa thành công!');
              return redirect()->back();
            }
            else
            {
                $vanbanmoi=DB::table('vanban')->where('id',$idthongbao)->update( 
              ['tenvanban'=>$tenvanban,'congvanso'=>$congvanso,'noiphathanh'=>$noiphathanh, 'noidungtomtat'=>$noidungtomtat,'ngaynhan'=> $ngaynhan,'ngaybanhanh'=>$ngaybanhanh, 'ghichu'=>$ghichu]);
                Alert::success('Sửa thành công!');
              return redirect()->back();
            }   
   }


   public function postXoaVanBan(Request $req)
   {
        DB::table('vanban')->where('id',$req->idthongbao)->delete();
        Alert::success('Xóa thành công!');
        return redirect()->back();  
   }
}
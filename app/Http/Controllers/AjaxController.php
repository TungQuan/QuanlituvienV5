<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TangNi;
use App\TuVien;
use App\GioiPham;
use App\GiaoPham;
use App\XaPhuong;
use App\QuanHuyen;
use Illuminate\Support\Facades\DB;
class AjaxController extends Controller
{
   public function getQuanHuyen(){
    $quanhuyen = DB::table('quanhuyen')->select('*')->get();
    echo "<option value='none'></option>";
     foreach($quanhuyen as $qh){
            echo "<option value='".$qh->quanhuyen_id."'>".$qh->quanhuyen_ten."</option>";
        }
   }

   public function getTrangThai(){
    $trangthai = DB::table('trangthai')->select('*')->get();
    echo "<option value='none'></option>";
    foreach($trangthai as $tt){  
            echo "<option value='".$tt->trangthai_id."'>".$tt->trangthai_ten."</option>";
        }
   }
   public function getXaPhuong($idQuanHuyen){
        $xaphuong = DB::table('xaphuong')->select('*')->where("quanhuyen_id","=",$idQuanHuyen)->get();
        echo "<option value='none'></option>";
        foreach($xaphuong as $xp){
            echo "<option value='".$xp->xaphuong_id."'>".$xp->xaphuong_ten."</option>";
        }
   }
   public function getTuVienDistrict($idQuanHuyen){
      $tuviendistrict = DB::table('TuVien')->join('XaPhuong','TuVien.xaphuong_id','=','XaPhuong.xaphuong_id') -> join('QuanHuyen','XaPhuong.quanhuyen_id','=','QuanHuyen.quanhuyen_id')->select('TuVien.tuvien_id','tuvien_ten')->where('QuanHuyen.quanhuyen_id','=',$idQuanHuyen)->get();
      echo "<option value='none'></option>";
       foreach($tuviendistrict as $tvdt){
            echo "<option value='".$tvdt->tuvien_id."'>".$tvdt->tuvien_ten."</option>";
        } 
   }
    public function getTuVien($idXaPhuong){
        $tuvien = DB::table('tuvien')->select('tuvien_id','tuvien_ten')->where('xaphuong_id','=',$idXaPhuong)->get();
         echo "<option value='none'></option>";
        foreach($tuvien as $tv){
            echo "<option value='".$tv->tuvien_id."'>".$tv->tuvien_ten."</option>";
        }
   }
   public function getTuVienOfState($idTrangThai){
    $tuvien = DB::table('TuVien')->join('TrangThai','TuVien.trangthai_id','=','TrangThai.trangthai_id')->select('tuvien_id','tuvien_ten')->where('TrangThai.trangthai_id','=',$idTrangThai)->get();
        echo "<option value='none'></option>";
        foreach($tuvien as $tv){
            echo "<option value='".$tv->tuvien_id."'>".$tv->tuvien_ten."</option>";
        }
   }
   public function getTuVienDistrictState($idTrangThai, $idQuanHuyen){
    $tuvien = DB::table('TuVien')->join('XaPhuong','TuVien.xaphuong_id','=','XaPhuong.xaphuong_id') -> join('QuanHuyen','XaPhuong.quanhuyen_id','=','QuanHuyen.quanhuyen_id')->select('TuVien.tuvien_id','tuvien_ten')->where([['QuanHuyen.quanhuyen_id','=',$idQuanHuyen],['trangthai_id','=',$idTrangThai]])->get();
     echo "<option value='none'></option>";
        foreach($tuvien as $tv){
            echo "<option value='".$tv->tuvien_id."'>".$tv->tuvien_ten."</option>";
        }
   }

    public function getTuVienDistrictWardState($idTrangThai, $idQuanHuyen, $idXaPhuong){
      $tuvien = DB::table('TuVien')->join('XaPhuong','TuVien.xaphuong_id','=','XaPhuong.xaphuong_id') -> join('QuanHuyen','XaPhuong.quanhuyen_id','=','QuanHuyen.quanhuyen_id')->select('TuVien.tuvien_id','tuvien_ten')->where([['QuanHuyen.quanhuyen_id','=',$idQuanHuyen],['trangthai_id','=',$idTrangThai],['XaPhuong.xaphuong_id','=',$idXaPhuong]])->get();
       echo "<option value='none'></option>";
          foreach($tuvien as $tv){
              echo "<option value='".$tv->tuvien_id."'>".$tv->tuvien_ten."</option>";
          }
   }
   public function getTangNiTuoiDao($idTuVien){
        $tuoidao = DB::table('TangNi')->select('TuoiDao')->where('id_tangni','=',$idTuVien)->distinct()->get();
        echo "<option value='none'></option>";
          foreach($tuoidao as $td){
              echo "<option>".$td->TuoiDao."</option>";
          }
    }
     public function getTangNiGioiPham($idTuVien){
        $gioipham = DB::table('TangNi')->join('GioiPham','TangNi.gioipham_id','=','GioiPham.gioipham_id') ->join('GiaoPham','TangNi.giaopham_id','=','GiaoPham.giaopham_id')->select('GioiPham_Ten')->where('tuvien_id','=',$idTuVien)->distinct()->get();
        echo "<option value='none'></option>";
          foreach($gioipham as $gp){
              echo "<option>".$gp->GioiPham_Ten."</option>";
          }
    }
    public function getTangNiGiaoPham($idTuVien){
        $giaopham = DB::table('TangNi')->join('GioiPham','TangNi.gioipham_id','=','GioiPham.gioipham_id')->join('GiaoPham','TangNi.giaopham_id','=','GiaoPham.giaopham_id')->select('GiaoPham_Ten')->where('tuvien_id','=',$idTuVien)->distinct()->get();
        echo "<option value='none'></option>";
          foreach($giaopham as $gp){
              echo "<option>".$gp->GiaoPham_Ten."</option>";
          }
    }
    public function getDanhSachTangNiTuVien(){
      $danhsach = DB::table('TuVien')->select('*')->get();
      echo "<option value='none'></option>";
          foreach($danhsach as $ds){
             echo "<option value='".$ds->tuvien_id."'>".$ds->tuvien_ten."</option>";
          }
    }
    public function getDanhSachTangNiGioiPham(){
      $danhsach = DB::table('GioiPham')->select('GioiPham_Ten')->get();
      echo "<option value='none'></option>";
          foreach($danhsach as $ds){
              echo "<option>".$ds->GioiPham_Ten."</option>";
          }
    }
     public function getDanhSachTangNiGiaoPham(){
      $danhsach = DB::table('GiaoPham')->select('GiaoPham_Ten')->get();
      echo "<option value='none'></option>";
          foreach($danhsach as $ds){
              echo "<option>".$ds->GiaoPham_Ten."</option>";
          }
    }
    public function getDanhSachTangNiTuoiDao(){
      $danhsach = DB::table('TangNi')->select('TuoiDao')->distinct()->get();
      echo "<option value='none'></option>";
          foreach($danhsach as $ds){
              echo "<option>".$ds->TuoiDao."</option>";
          }
    }
     public function getTrangThaiEdit(){
      $trangthai = DB::table('trangthai')->select('*')->get();
      echo "<option value=''></option>";
          foreach($trangthai as $tr){
              echo "<option value='".$tr->trangthai_id."'>".$tr->TrangThai_Ten."</option>";
          }
    }

    public function getSLTuVien($idquanhuyen, $idxaphuong){
      //$soluongtangni = DB::table('tangni')->count();
      $xaphuong_id = $idxaphuong;
      if($xaphuong_id === '0'){
        $soluongtuvien = DB::table('tuvien')->join('xaphuong','xaphuong.xaphuong_id','=','tuvien.xaphuong_id')->join('quanhuyen','quanhuyen.quanhuyen_id','=','xaphuong.quanhuyen_id')->select(DB::raw('Count(tuvien_id) as soluongtuvien'))->where('quanhuyen.quanhuyen_id','=',$idquanhuyen)->value('soluongtuvien');
        echo $soluongtuvien;
      } else{
          $soluongtuvien = DB::table('tuvien')->join('xaphuong','xaphuong.xaphuong_id','=','tuvien.xaphuong_id')->join('quanhuyen','quanhuyen.quanhuyen_id','=','xaphuong.quanhuyen_id')->select(DB::raw('Count(tuvien_id) as soluongtuvien'))->where([['quanhuyen.quanhuyen_id','=',$idquanhuyen],['xaphuong.xaphuong_id','=',$xaphuong_id]])->value('soluongtuvien');
          echo $soluongtuvien;
      }
      
      
    }
    
    public function getSLTangNi($idquanhuyen,$id_xaphuong){
      $idxaphuong = $id_xaphuong;
      if($idxaphuong === '0'){
        $soluongtangni = DB::table('tangni')->join('tuvien','tuvien.tuvien_id','=','tangni.tuvien_id')->join('xaphuong','xaphuong.xaphuong_id','=','tuvien.xaphuong_id')->join('quanhuyen','quanhuyen.quanhuyen_id','=','xaphuong.quanhuyen_id')->select(DB::raw('Count(tangni_id) as soluongtangni'))->where('quanhuyen.quanhuyen_id','=',$idquanhuyen)->value('soluongtangni');
      echo $soluongtangni;
    }
      else{
        $soluongtangni = DB::table('tangni')->join('tuvien','tuvien.tuvien_id','=','tangni.tuvien_id')->join('xaphuong','xaphuong.xaphuong_id','=','tuvien.xaphuong_id')->join('quanhuyen','quanhuyen.quanhuyen_id','=','xaphuong.quanhuyen_id')->select(DB::raw('Count(tangni_id) as soluongtangni'))->where([['quanhuyen.quanhuyen_id','=',$idquanhuyen],['xaphuong.xaphuong_id','=',$idxaphuong]])->value('soluongtangni');
      echo $soluongtangni;
      }
    }
    public function getDanhSachGioiPham($idquanhuyen, $id_xaphuong){
      $idxaphuong = $id_xaphuong;
       if($idxaphuong === '0'){
       $danhsachgioipham = DB::table('gioipham')
       ->leftjoin('tangni','tangni.gioipham_id','=','gioipham.gioipham_id')
       ->join('tuvien','tuvien.tuvien_id','=','tangni.tuvien_id')
       ->join('xaphuong','xaphuong.xaphuong_id','=','tuvien.xaphuong_id')
       ->join('quanhuyen','quanhuyen.quanhuyen_id','=','xaphuong.quanhuyen_id')
       ->select('gioipham_ten',DB::raw('Count(tangni_id) as soluong'))
       ->where('quanhuyen.quanhuyen_id','=',$idquanhuyen)->groupby('gioipham_ten')->get();
      }else{
        $danhsachgioipham = DB::table('gioipham')
       ->leftjoin('tangni','tangni.gioipham_id','=','gioipham.gioipham_id')
       ->join('tuvien','tuvien.tuvien_id','=','tangni.tuvien_id')
       ->join('xaphuong','xaphuong.xaphuong_id','=','tuvien.xaphuong_id')
       ->join('quanhuyen','quanhuyen.quanhuyen_id','=','xaphuong.quanhuyen_id')
       ->select('gioipham_ten',DB::raw('Count(tangni_id) as soluong'))
       ->where([['quanhuyen.quanhuyen_id','=',$idquanhuyen],['xaphuong.xaphuong_id','=',$idxaphuong]])->groupby('gioipham_ten')->get();
      }
       echo "<table class='table table-bordered table-gioipham'>";
       foreach($danhsachgioipham as $ds){
          echo "<tr><td><strong>".$ds->gioipham_ten."</strong></td><td>".$ds->soluong."</td></tr>";
       }
       echo "</table>";
    }

     public function getDanhSachGiaoPham($idquanhuyen, $id_xaphuong){
      $idxaphuong = $id_xaphuong;
      if($idxaphuong === '0'){
        $danhsachgiaopham = DB::table('giaopham')
       ->leftjoin('tangni','tangni.giaopham_id','=','giaopham.giaopham_id')
       ->join('tuvien','tuvien.tuvien_id','=','tangni.tuvien_id')
       ->join('xaphuong','xaphuong.xaphuong_id','=','tuvien.xaphuong_id')
       ->join('quanhuyen','quanhuyen.quanhuyen_id','=','xaphuong.quanhuyen_id')
       ->select('giaopham_ten',DB::raw('Count(tangni_id) as soluong'))
       ->where('quanhuyen.quanhuyen_id','=',$idquanhuyen)->groupby('giaopham_ten')->get();
     }
     else{
        $danhsachgiaopham = DB::table('giaopham')
       ->leftjoin('tangni','tangni.giaopham_id','=','giaopham.giaopham_id')
       ->join('tuvien','tuvien.tuvien_id','=','tangni.tuvien_id')
       ->join('xaphuong','xaphuong.xaphuong_id','=','tuvien.xaphuong_id')
       ->join('quanhuyen','quanhuyen.quanhuyen_id','=','xaphuong.quanhuyen_id')
       ->select('giaopham_ten',DB::raw('Count(tangni_id) as soluong'))
       ->where([['quanhuyen.quanhuyen_id','=',$idquanhuyen],['xaphuong.xaphuong_id','=',$idxaphuong]])->groupby('giaopham_ten')->get();
     }
       echo "<table class='table table-bordered table-giaopham'>";
       foreach($danhsachgiaopham as $ds){
          echo "<tr><td>".$ds->soluong."</td><td><strong>".$ds->giaopham_ten."</strong></td></tr>";
       }
       echo "</table>";
    }
    public function getDanhSachTrangThai($idquanhuyen, $id_xaphuong){
      $idxaphuong = $id_xaphuong;
      if( $id_xaphuong === '0'){
        $trangthai = DB::table('trangthai')->leftjoin('tuvien','tuvien.trangthai_id','=','trangthai.trangthai_id')->join('xaphuong','tuvien.xaphuong_id','=','xaphuong.xaphuong_id')->join('quanhuyen','xaphuong.quanhuyen_id','=','quanhuyen.quanhuyen_id')->select('trangthai_ten',DB::raw('Count(tuvien_id) as soluong'))->where('quanhuyen.quanhuyen_id','=',$idquanhuyen)->groupby('trangthai_ten')->get();
    }
      else{
        $trangthai = DB::table('trangthai')->leftjoin('tuvien','tuvien.trangthai_id','=','trangthai.trangthai_id')->join('xaphuong','tuvien.xaphuong_id','=','xaphuong.xaphuong_id')->join('quanhuyen','xaphuong.quanhuyen_id','=','quanhuyen.quanhuyen_id')->select('trangthai_ten',DB::raw('Count(tuvien_id) as soluong'))->where([['quanhuyen.quanhuyen_id','=',$idquanhuyen],['xaphuong.xaphuong_id','=',$idxaphuong]])->groupby('trangthai_ten')->get();
      }
       echo "<table class='table table-bordered table-trangthai'>";
       foreach($trangthai as $ds){
          echo "<tr><td><strong>".$ds->trangthai_ten."</strong></td><td>".$ds->soluong."</td><td><a class='listtuvien'>Danh Sách</a></td></tr>";
       }
       echo "</table>";
    }
  
}

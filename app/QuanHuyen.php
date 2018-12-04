<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuanHuyen extends Model
{
     protected $table = "QuanHuyen";

     public function xaphuong(){

     	return  $this->hasMany('App\XaPhuong','QuanHuyenID','QuanHuyenID');
     }
     public function tuvien(){
     	return $this->hasManyThrough('App\TuVien','App\XaPhuong','XaPhuongID','XaPhuongID','QuanHuyenID');
     }
}

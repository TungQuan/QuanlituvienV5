<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class XaPhuong extends Model
{
     protected $table = "XaPhuong";

     public function tuvien() {
     	return $this->hasMany('App\TuVien','XaPhuongID','XaPhuongID');
     }

     
 }  

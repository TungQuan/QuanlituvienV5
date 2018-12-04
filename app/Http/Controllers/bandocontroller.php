<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Map;

class bandocontroller extends Controller
{
    //ban do index
    public function getbando_index(){
    	return view('admin/bando/bando-index');
    }
    //ban do chi duong
    public function getbando_chiduong(){
        return view('admin/bando/chiduong');
    }
     //ban do tim kiem
    public function getbando_timkiem(){
    	return view('admin/bando/timkiem');
    }
     //ban do chinh
    public function getbando(){
    	return view('admin/bando/bando');
    }
}

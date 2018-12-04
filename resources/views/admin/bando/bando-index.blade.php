@extends('admin.homelayout.index')
@section('content')
<!-- style -->
<style type="text/css">
  #title{
    border-radius: 50px 50px 0px 0px;
    background-color: #DF3A01;
    color: #FFFFFF;
    text-align: center;
    size: 20px;
    margin-bottom: 0px;
    margin-top: 20px;
    margin-left: 0px;
    width: 970px;
  }
  .googleMap{
        width: 1000px;
        padding: 10px;
        background-color: #FFF;
        margin: 0px 0px 0px 0px;
        border: solid #fff 2px;
        border-top: none;
        border-radius: 0px 0px 10px 10px;
        color:  #0066B3;
        margin-left: 0px;
        text-align: center;
        box-shadow: 2px 2px whitesmoke;
        margin-bottom: 0px;
    }
</style>
<div id="page-wrapper" style="background-color: #e7e8e9">
    <div class="container-fluid" >
          	<div class="row">
	            <nav aria-label="breadcrumb">
	                <ol class="breadcrumb">
	                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
	                    <li class="breadcrumb-item active" aria-current="page">map</li>
	                </ol>
	            </nav>
 			</div>
 			<!-- content-map -->
 			<div class="googleMap">
            <div id="title"><h2>Map</h2></div>
            
                <div class="row">
                	<div class="col-md-5"><a class="btn btn-default btn-lg" style="width:100%; margin-bottom:10px; margin-left: 120px" href="admin/map/chiduong">Chỉ Đường</a></div>
                </div>
                <div class="row">    
                	<div class="col-md-5"><a class="btn btn-default btn-lg" style="width:100%; margin-bottom:10px; margin-left: 200px" href="admin/map/tim kiem"> Tìm Kiếm</a></div>
                </div>
                <div class="row">
                	<div class="col-md-5"><a class="btn btn-default btn-lg" style="width:100%; margin-bottom:10px;  margin-left: 120px" href="admin/map/bando">Bản Đồ</a></div>
                </div>    
              
            </div>

 	</div>
</div>

@endsection
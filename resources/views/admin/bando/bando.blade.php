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
    width: 975px;
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
	                    <li class="breadcrumb-item active" aria-current="page"><a href="#">Bản đồ</a></li>
	                    <li class="breadcrumb-item active" aria-current="page"><a href="#">Bà rịa - Vũng tàu</a></li>
	                </ol>
	            </nav>
 			</div>
 			<!-- content-map -->
 	<div class="googleMap">
            <div class="row">
        		<div class="col-md-12 col-md-offset-3" style="margin-left: 0px">
            		<div class="panel panel-default">
                		<div class="panel-heading" style="text-align: center; color: #FFFFFF; background-color:#DF3A01;"><h4>Bản đồ khu vực Tỉnh Bà rịa - Vũng tàu</h4></div>
                			<div class="panel-body">
                    			<div id ="map" style="height: 420px; width: 950px;">
                				</div>
            				</div>
        				</div>
   					</div>
            	</div>
 			</div>
		</div>
	</div>
	<!-- js -->
   <script language="javascript" type="text/javascript">
        function InitializeMap() 
        {
            var latlng = new google.maps.LatLng(10.4089391,107.1124084);
            var myOptions = {
                zoom: 13,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("map"), myOptions);
        }
        window.onload = InitializeMap;
    </script>

@endsection
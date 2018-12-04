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
    }           
</style>
<div id="page-wrapper" style="background-color: #e7e8e9">
    <div class="container-fluid" >
          	<div class="row">
	            <nav aria-label="breadcrumb">
	                <ol class="breadcrumb">
	                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
	                    <li class="breadcrumb-item active" aria-current="page"><a href="#">Map</a></li>
	                    <li class="breadcrumb-item active" aria-current="page"><a href="#">Tìm kiếm</a></li>
	                </ol>
	            </nav>
 			</div>
 			<!-- content-map -->
 			<div class="row">
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align: center; color: #FFFFFF; background-color:#DF3A01;"><h4>Tìm kiếm địa điểm</h4></div>
                <div class="panel-body">
                    <div class="row"><div class="col-md-2"></div>
                    <div class="row"><div class="col-md-2">
                           <h4 style="text-align: right;"> <span class="glyphicon glyphicon-search"></span>   Nhập địa chỉ:</h4>
                        </div>
                        <div class="col-md-4">
                            <input style="text-align: left;" id="addressinput" class="form-control" type="text" placeholder=" --- Nhập địa chỉ cần tìm ---" />
                        </div>
                        <div class="col-md-2">
                            <input id="Button1" class="btn btn-primary" style="width: 100%;" type="button" value="Tìm" onclick="return Button1_onclick()" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <div id ="map" style="height: 380px; width: 1000px; margin-left: 18px" >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- js -->
    <script language="javascript" type="text/javascript">

    var map;
    var geocoder;
    function InitializeMap() {

        var latlng = new google.maps.LatLng(10.4089391,107.1124084);
        var myOptions =
        {
            zoom: 13,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            disableDefaultUI: true
        };
        map = new google.maps.Map(document.getElementById("map"), myOptions);
    }

    function FindLocaiton() {
        geocoder = new google.maps.Geocoder();
        InitializeMap();

        var address = document.getElementById("addressinput").value;
        geocoder.geocode({ 'address': address }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location
                });

            }
            else {
                alert("Geocode was not successful for the following reason: " + status);
            }
        });

    }


    function Button1_onclick() {
        FindLocaiton();
    }

    window.onload = InitializeMap;
</script>
@endsection
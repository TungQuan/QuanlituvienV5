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
    }
</style>
<div id="page-wrapper" style="background-color: #e7e8e9">
    <div class="container-fluid" >
          	<div class="row">
	            <nav aria-label="breadcrumb">
	                <ol class="breadcrumb">
	                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
	                    <li class="breadcrumb-item active" aria-current="page"><a href="#">Bản đồ</a></li>
	                    <li class="breadcrumb-item active" aria-current="page"><a href="#">Chỉ đường</a></li>
	                </ol>
	            </nav>
 			</div>
 			<!-- content-map -->
 		<div class="row">
		<div class="col-md-12 col-md-offset-1" style="margin-left: 0px">
			<div class="panel panel-default">
  				<div class="panel-heading" style="text-align: center; color: #FFFFFF; background-color:#DF3A01; " ><h4>Bản đồ chỉ đường</h4></div>
  				<div id="control" class="panel-body">
  					<div class="row">
						<div class="col-md-5">
							<div class="form-group">
								<label>Vị trí bắt đằu:</label>
								<input id="startvalue" class="form-control" type="text" />
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
	  							<label>Nơi cần đến:</label>
	  							<input id="endvalue" class="form-control" type="text" />
	  						</div>
						</div>
						<div class="col-md-2" style="margin-top: 25px">
							<input id="Button1" class="btn btn-primary" type="button" value="Chỉ dẫn" onclick="return Button1_onclick()" />
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
		  						<div class="row">
		  							<div class="col-md-6">
		  								<div id ="map" style="height: 380px; width: 950"></div>
		  							</div>
		  							<div class="col-md-6">
		  								<div id ="directionpanel" style="height: 380px; overflow: auto" ></div>
		  							</div>
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
		var directionsDisplay;
		var directionsService = new google.maps.DirectionsService();

		function InitializeMap() {
			directionsDisplay = new google.maps.DirectionsRenderer();
			var latlng = new google.maps.LatLng(10.4089391,107.1124084);
			var myOptions =
			{
				zoom: 13,
				center: latlng,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};
			var map = new google.maps.Map(document.getElementById("map"), myOptions);

			directionsDisplay.setMap(map);
			directionsDisplay.setPanel(document.getElementById('directionpanel'));

			var control = document.getElementById('control');
			control.style.display = 'block';
		}



		function calcRoute() {
			var start = document.getElementById('startvalue').value;
			var end = document.getElementById('endvalue').value;
			console.log(start+"->>" +end);
			var request = {
				origin: start,
				destination: end,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			};
			directionsService.route(request, function (response, status) {
				if (status == google.maps.DirectionsStatus.OK) {
					directionsDisplay.setDirections(response);
				}
			});
		}

		function Button1_onclick() {
			calcRoute();
		}

		window.onload = InitializeMap;
	</script>

@endsection
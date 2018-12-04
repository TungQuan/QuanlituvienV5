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
    margin-left: 35px;
    width: 1000px;
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
        
        text-align: center;
        box-shadow: 2px 2px whitesmoke;
    }
    .contact_map{
        height: 550px;
        width: 83%;
        text-align: left;
        
        padding-top: 1px;
        padding-left: 20px;
        
        color:  #0066B3;
    }
    .contact_detail{
        text-align: left;
        float: left;
        margin-left: 90px;
        border-radius: 0 0 10 10;
        
        
    }
</style>
<div id="page-wrapper" style="background-color: #e7e8e9">
    <div class="container-fluid" >
        <div class="row">
          <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">map</li>
                </ol>
            </nav>
            
        </div>
            <div class="col-md-12" id="title">
                <h2 >Bản Đồ Tự Viện</h2>
            </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div id="map" style="width:100%;height:500px; ">
              <div class="contact_map" >
                <div class="googleMap">
                    <div id="googleMap" style="width: 645,5px; height: 450px;">Google Map</div>
                  </div>
            </div>
          </div>
        </div>       
    </div>
  


     <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBPeuDnxR4YQk0o3TKERqRKCGGp1o1Eop0"></script>

    <script type="text/javascript">
    var gmap = new google.maps.LatLng(9.9900815,105.7047018);
    // var gmap1 = new google.maps.LatLng(9.9891192,105.7043455);
    var marker;
    function initialize()
    {
      // Thuyen Vien Trúc Lâm
        var mapProp = {
             center:new google.maps.LatLng(9.9900815,105.7047018),
             zoom:16,
            mapTypeId:google.maps.MapTypeId.ROADMAP
        };
     
        var map=new google.maps.Map(document.getElementById("googleMap")
        ,mapProp);

        // My khanh
        // var mapProp1 = {
        //      center:new google.maps.LatLng(9.9891192,105.7043455),
        //      zoom:16,
        //     mapTypeId:google.maps.MapTypeId.ROADMAP
        // };
     
        // var map=new google.maps.Map(document.getElementById("googleMap")
        // ,mapProp1);
     
      var styles = [
        {
          featureType: 'road.arterial',
          elementType: 'all',
          stylers: [
            { hue: '#fff' },
            { saturation: 100 },
            { lightness: -48 },
            { visibility: 'on' }
          ]
        },{
          featureType: 'road',
          elementType: 'all',
          stylers: [
     
          ]
        },
        {
            featureType: 'water',
            elementType: 'geometry.fill',
            stylers: [
                { color: '#adc9b8' }
            ]
        },{
            featureType: 'landscape.natural',
            elementType: 'all',
            stylers: [
                { hue: '#809f80' },
                { lightness: -35 }
            ]
        }
      ];
     
      var styledMapType = new google.maps.StyledMapType(styles);
      map.mapTypes.set('Styled', styledMapType);
     
      marker = new google.maps.Marker({
        map:map,
        draggable:true,
        animation: google.maps.Animation.DROP,
        position: gmap
      });
      google.maps.event.addListener(marker, 'click', toggleBounce);
    }
     
    function toggleBounce() {
     
      if (marker.getAnimation() !== null) {
        marker.setAnimation(null);
      } else {
        marker.setAnimation(google.maps.Animation.BOUNCE);
      }
    }
     
    google.maps.event.addDomListener(window, 'load', initialize);
    </script>

<script type='text/javascript'>
    $(document).ready(function(){
        $('.sm-box').bxSlider({
          minSlides: 1,
          maxSlides: 2,
          slideWidth: 170,
          slideMargin: 10,
          ticker: true,
          speed: 25000
        });
    });
</script>


@endsection
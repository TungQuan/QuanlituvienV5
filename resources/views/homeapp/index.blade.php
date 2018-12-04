<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Hệ Thống Quản Lí Hồ Sơ Phật Giáo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <base href="{{ asset('') }} ">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
    margin-bottom: 0;
    border-radius: 0;
    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
    background-image: url('fontend_admin/image/bg-footer.png');
    padding: 15px;
    margin-top: 15px;
    height: 100px auto;
    color: #FFFFFF;
    text-align: center;
    }
    
    .carousel-inner img {
    width: 100%; /* Set width to 100% */
    margin: auto;
    min-height:200px;
    }
    /* Hide the carousel text when the screen is less than 600 pixels wide */
    @media (max-width: 600px) {
    .carousel-caption {
    display: none;
    }
    }
    .title{
    background-color: #B40404;
    text-align: center;
    margin-top: 10px;
    margin-bottom: 10px;
    margin-bottom: 0px ;
    border-radius: 10px 10px 0px 0px;
    color: #FFFFFF;
    font-family: arial;
    font-size: 20px
    }
    </style>
  </head>
  <body style="background-image: url(fontend_admin/image/bg-middle.jpg);">
    <nav class="navbar navbar-inverse" style="background-image: url(fontend_admin/image/bg-top.jpg);">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
          <a href="#"><img src="fontend_admin/image/logo.png" style="width: 100px; margin-top: 5px; margin-left: 80px;  margin-bottom: 5px"></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="#" style="font-size: 30px; margin-top: 30px; color:#FACC2E;"><b>Phật Giáo Tỉnh Bà Rịa - Vũng Tàu</b></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-top: 3px">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox" >
      <div class="item active">
        <img src="fontend_admin/image/imgCarousel/sl1.jpg" style="height: 300px" alt="Image">
        <div class="carousel-caption">
          <!-- <h3>Sell $</h3>
          <p>Money Money.</p> -->
        </div>
      </div>
      <div class="item">
        <img src="fontend_admin/image/imgCarousel/sl2.jpg" style="height: 300px" alt="Image">
        <div class="carousel-caption">
          <!-- <h3>More Sell $</h3>
          <p>Lorem ipsum...</p> -->
        </div>
      </div>
    </div>
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  
  <div class="container text-center" style="background-color:#FFFFFF; border-radius: 5px; margin-top: 3px ">
    <div class="row">
      <div class="col-sm-4" style="margin: 25px; margin-top: 10px; " >
        <script src="https://lichngaytot.com/Scripts/jquery-ui.min.js"></script>
        <script src="https://lichngaytot.com/Scripts/widgetlichngay.js"></script>
        <script type="text/javascript">document.write('<div class="tao-lich-left widgetlich-lvsicsoft" id="widgetlich-lvsicsoft" style="width:250px;;" data-urlimagen="" data-colorbordern="#ffffff" data-coloramn="#000000" data-colorduongn="#ff0000"></div>');getWidgetLichNgay("widgetlich-lvsicsoft");
        </script>
      </div>
      <div class="col-sm-4" class="bg-img">
        <p class="title">Tin Tức</p>
        <img src="fontend_admin/image/p2.jpg" class="img-responsive" style="width:100%" alt="Image">
      </div>
      <div class="col-sm-4" class="bg-img">
        <p class="title">Phật Giáo Huyện – Thành Phố</p>
        <img src="fontend_admin/image/p2.jpg" class="img-responsive" style="width:100%" alt="Image">
      </div>
      <!-- row -->
    </div>
    <!-- container -->
  </div><br>
  <footer>
    <div class="row">
      <div class="col-lg-12" style="font-size: 15px">
        <p> &copy;Bản quyền thuộc về Ban Trị Sự GHPGVN Tỉnh Bà Rịa Vũng Tàu.</p>
        <p> Thiết kế bởi sinh viên CNTT-K40 Đại Học Cần Thơ.</p>
      </div>
    </div>
  </footer>
</body>
</html>
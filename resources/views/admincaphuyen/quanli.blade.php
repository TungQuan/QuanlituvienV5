<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Đê">
        <meta name="author" content="">
        <title>Admin Cấp Tỉnh</title>
        <base href="{{ asset('') }} ">
        
        <script src="fontend_admin/jquery/jquery.min.js"></script>
        
        <!-- Bootstrap Core CSS -->
        <link href="fontend_admin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- js map -->
        
        <!--Memuil Menu CSS -->
        <link href="fontend_admin/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
        <!--css datatable -->
        <link href="fontend_admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        
        <!-- Memu CSS -->
        <link href="fontend_admin/menu/css/sb-admin-2.css" rel="stylesheet">
        <script src="fontend_admin/metisMenu/dist/metisMenu.min.js"></script>
        <script src="fontend_admin/bootstrap/js/bootstrap.min.js"></script>
        <!-- Custom Menu JavaScript -->
        <script src="fontend_admin/menu/js/sb-admin-2.js"></script>
        <!--CSS Tùy Chỉnh-->
        <style type="text/css">
        h2,h3,html,body{
        margin:0;padding: 0;
        }
        .title{
        min-height: 110px;
        background-image: url('fontend_admin/image/bg-top.jpg');
        padding-top: 0px;
        }
        .text{
        margin-left: 120px;
        padding-top: 25px;
        color: #FF8000;
        }
        .logo{
        width: 90px;
        float: left;
        padding-top: 10px;
        margin-left: 20px;
        }
        .userinfo{
            float: right;
            font-size: 16px;
            margin-top:20px;
            margin-right: 100px;
            cursor: pointer;
            text-decoration: underline;
        }
        .username{
            width:200px;
            text-align: right;
            text-decoration: underline;
      
        }
        .username:hover, .username{
            color: #FF8000;
        }
        .dropdown{
            position: relative;
            display: inline-block;

        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            box-shadow: 0px 8px 16px 0px ;
            z-index: 1;
            margin-top:1px;
       

        }
        .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        }
        .dropdown-content a:hover {background-color: #f1f1f1}
        .dropdown:hover .dropdown-content {
        display: block;
        }
        .sidebar{
        margin-top: 15px;
        }
        .left-content{
        }
        .right-content{
        margin-left: 50px;
        margin-top: 15px;
        }
        .footer {
        background-image: url('fontend_admin/image/bg-footer.png');
        padding: 15px;
        min-height: 150px auto;
        color: #FFFFFF;
        text-align: center;
        margin-top: 190px;
        }
        .userinfo-row-right{
        padding-left: 10px; ;
        line-height: 0.6;
        }
        .row1{
      
        padding-top: 15px;
        }
        .row2, .row3{
        margin-top:20px;
        }
        .col1, .col3,.col5 {
        text-align: right;
        color: grey;
        }
        div.btn-change-email{
        margin-left: 60px;
        margin-top: 20px;
        padding-bottom: 20px;
        font-size: 14px;
        }
        a.view-role-admin-lev1{
        cursor: pointer;
        text-decoration: underline;
        }
        div.infor-detail{
            margin-top: 30px;
            background-color: white;
        }
        </style>
    </head>
    <body  style="background-color: #f5f5f5">
        <div class="container-fluid" >
            @foreach($information as $infor)
            <div class="row">
                <div class=" userinfo dropdown ">
                    <div class="username"><p>{{$infor->PhapDanh}}</p></div>
                    <div class="dropdown-content">
                        <a href="quantri/quanli">Thông Tin Cá Nhân</a>
                        <a href="quantri/logout">Đăng Xuất</a>
                        <a href="">Cài Đặt</a>
                    </div>
                </div>
                <div class="title" >
                    <a class ="logo" href=""><img src="fontend_admin/image/logo.png" width="90px"></a>
                    <div class="text">
                        <h3 style="margin-bottom: 5px;">Hệ Thống Quản Lý Hồ Sơ Phật Giáo</h3>
                        <h4>Tỉnh Bà Rịa Vũng Tàu</h4>
                    </div>
                    
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-2 left-content">
                    <div class=" navbar-default sidebar" role="navigation" id="con">
                        <div class="sidebar-nav navbar-collapse">
                            <ul class="nav" id="side-menu">
                                <li class="lev1">
                                    <a href="#" class="title-ul"><i class="fa fa-cog fa-2x"></i>&nbsp;&nbsp;Hồ Sơ Cá Nhân &nbsp;<span class="fa arrow"></span>
                                </a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="admincapxa/quanli" class="title-li">Thông Tin Tài Khoản</a>
                                    </li>
                                    <li>
                                        <a href="admincapxa/hosocanhan" class="title-li">Thông Tin Cá Nhân</a>
                                    </li>
                                     
                                    <li>
                                        <a href="" class="title-li">Đổi Mật Khẩu</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="lev1">
                                <a href="" class="title-ul" ><i class="fa fa-users fa-fw fa-2x"></i>Quản Lý Tăng Ni<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href=""  class="title-li">Danh Sách Tăng Ni</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li class="lev1">
                                <a href="" class="title-ul"><i class="fa fa-home fa-2x"></i> Quản Lý Tự Viện<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="" class="title-li">Danh Sách Tự Viện</a>
                                    </li>
                                    
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            
                            <li class="lev1">
                                <a href="" class="title-ul"><i class="fa fa-file fa-2x"></i>&nbsp;Quản Lý Văn Bản<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="" class="title-li">Danh Sách Văn Bản Hiện Tại</a>
                                    </li>
                                    <li>
                                        <a href="" class="title-li">Thêm Văn Bản</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <!-- ban do -->
                            <li class="lev1">
                                <a href="#" class="title-ul"><i class="fa fa-map-marker fa-2x"></i>&nbsp;Bản Đồ &nbsp;<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="admin/bando/bando" class="title-li">Bản Đồ</a>
                                    </li>
                                    <li>
                                        <a href="admin/bando/chiduong" class="title-li">Chỉ Đường</a>
                                    </li>
                                    <li>
                                        <a href="admin/bando/timkiem" class="title-li">Tìm Kiếm</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <!-- ----------- -->
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                </div> <!-- col-3 -->
                <div class="col-md-9">
                    <div class="right-content">
                        <div class="userinfo-row-right" >
                            <h4>Thông Tin Tài Khoản </h4>
                            <p>Vui lòng không chia sẻ thông tin cá nhân cho người khác.</p>
                        </div>
                        <div class="infor-detail">
                            <div class="row row1">
                                <div class="col-md-2 col1">
                                    <p>Tài Khoản </p>
                                </div>
                                <div class="col-md-4">
                                    <p>{{$infor->username}}</p>
                                </div>
                            </div>
                            <div class="row row2">
                                <div class="col-md-2 col3">
                                    <p>Email </p>
                                </div>
                                <div class="col-md-4">
                                    <p>{{$infor->email}}</p>
                                </div>
                            </div>
                            <div class="row row3">
                                <div class="col-md-2 col5">
                                    <p>Phân Quyền </p>
                                </div>
                                @foreach($levelname as $name)
                                <div class="col-md-6">
                                    <p>{{$name->Level_Ten}} &nbsp;&nbsp;<a class="view-role-admin-lev1">Xem Quyền Hạn </a></p>
                                </div>
                                @endforeach
                            </div>
                            <div class="row">
                                <div class="btn-change-email">
                                    <form action="#" method="GET">
                                        <button type="submit" class="btn btn-primary btn-md" id="btn_change_email" >&nbsp;&nbsp;&nbsp;Cập Nhật Email &nbsp;&nbsp;&nbsp;</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="footer">
                    <p> &copy;Bản quyền thuộc về Ban Trị Sự GHPGVN Tỉnh Bà Rịa Vũng Tàu.</p>
                    <p> Thiết kế bởi sinh viên CNTT-K40 Đại Học Cần Thơ.</p>
                </div>
            </div>
        </div>
        @endforeach
        <!-- Bootstrap Core JavaScript -->
        
        <!-- Metis Menu Plugin JavaScript -->
        
    </body>
</html>
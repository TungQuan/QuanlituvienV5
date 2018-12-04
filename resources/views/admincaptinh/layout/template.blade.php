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
        
        <script src="fontend_admin/jquery/jquery.min.js" ></script>
        <!-- Bootstrap Core CSS -->
        <link href="fontend_admin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="fontend_admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="fontend_admin/layout/layout.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"  >
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        @yield('css')
    
    </head>
    <body style="background-color: #e7e8e9;">
        <div class="container-fluid" >
            <div class="row">
                <div class=" userinfo dropdown ">
                    
                    <div class="username"><p>{{$phapdanh}}</p></div>
                    
                    <div class="dropdown-content">
                        <a href="admincaptinh/quanli">Thông Tin Cá Nhân</a>
                        <a href="member/logout">Đăng Xuất</a>
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
                            <ul class="nav menu-fixed" >
                                <li class="lev1 f1">
                                    <a class="title-ul"><i class="fa fa-cog fa-2x"></i>&nbsp;&nbsp;Hồ Sơ Cá Nhân &nbsp;<span class="fa arrow"></span>
                                </a>
                                <ul class="nav nav-second-level ">
                                    <li>
                                        <a href="admincaptinh/quanli" class="title-li">Thông Tin Tài Khoản</a>
                                    </li>
                                    <li>
                                        <a href="admincaptinh/hosocanhan" class="title-li">Thông Tin Cá Nhân</a>
                                    </li>
                                    
                                    <li>
                                        <a href="admincaptinh/hosocanhan/doimatkhau" class="title-li">Đổi Mật Khẩu</a>
                                    </li>
                                </ul>
                          
                            </li>
                            <li class="lev1 f2">
                                <a class="title-ul"><i class="fa fa-users fa-fw fa-2x"></i>Quản Lý Tăng Ni<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level ">
                                    <li>
                                        <a href="admincaptinh/tangni/danhsach"  class="title-li">Danh Sách Tăng Ni</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li class="lev1 f3">
                                <a class="title-ul"><i class="fa fa-home fa-2x"></i> Quản Lý Tự Viện<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level " >
                                    <li>
                                        <a href="admincaptinh/tuvien/danhsach" class="title-li">Danh Sách Tự Viện</a>
                                    </li>
                                    <li>
                                        <a href="admincaptinh/tuvien/them" class="title-li">Thêm Tự Viện</a>
                                    </li>
                                    <li>
                                        <a href="admincaptinh/tuvien/chinhsuafull" class="title-li">Chỉnh Sửa Tự Viện</a>
                                    </li>
                                     <li>
                                        <a href="admincaptinh/tuvien/thongke" class="title-li">Thống Kê</a>
                                    </li>
                                </ul>

                                <!-- /.nav-second-level -->
                            </li>
                            
                            <li class="lev1 f4">
                                <a class="title-ul" ><i class="fa fa-file fa-2x"></i>&nbsp;Quản Lý Văn Bản<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level ">
                                    <li>
                                        <a href="admincaptinh/vanban/danhsachthongbaomodal" class="title-li">Danh Sách Thông Báo</a>
                                    </li>
                                    <li>
                                        <a href="admincaptinh/vanban/danhsachdontu" class="title-li">Danh Sách Đơn</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <!-- ban do -->
                            <li class="lev1 f5">
                                <a class="title-ul" ><i class="fa fa-map-marker fa-2x"></i>&nbsp;Bản Đồ &nbsp;<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level ">
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

                <div class="col-md-10">
                    @yield('right-content')
                </div>
            </div>
            <div class="row">
                <div class="footer">
                    <p> &copy;Bản quyền thuộc về Ban Trị Sự GHPGVN Tỉnh Bà Rịa Vũng Tàu.</p>
                    <p> Thiết kế bởi sinh viên CNTT-K40 Đại Học Cần Thơ.</p>
                </div>
            </div>
        </div>
        
         @yield('script')
        <script src="fontend_admin/bootstrap/js/bootstrap.min.js" ></script>
        <script src="fontend_admin/layout/layout.js"></script>
    </body>
</html>
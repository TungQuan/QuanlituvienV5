<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Đê">
    <meta name="author" content="">
    <title>Hệ Thống Quản Lý Hồ Sơ Phật Giáo</title>
    <base href="{{ asset('') }} ">
    
    <script src="fontend_admin/jquery/jquery.min.js"></script>
    <!-- Bootstrap Core CSS -->
    <link href="fontend_admin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- js map -->
    <!--Memuil Menu CSS -->
    <link href="fontend_admin/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <!--css datatable -->
    
   
    
    <!-- Memu CSS -->
    <link href="fontend_admin/menu/css/sb-admin-2.css" rel="stylesheet">
    <!-- Các Icon - Fonts -->
    <link href="fontend_admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
  </head>
  <body>
    <div id="wrapper">
      <!-- Navigation -->
      <nav id="con" class="navbar navbar-default navbar-static-top" role="navigation" style="background-image: url('fontend_admin/image/bg-top.jpg'); margin-bottom: 0px; min-height: 100px;">
        <div class="navbar-header" id="head">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
          <div>
            <a href="#" class="header-logo"><img src="fontend_admin/image/logo.png" width="80px" style="margin-left: 30px;margin-top: 10px;"></a>
            <div style="float: right; color: #FF8000; margin-left: 10px; margin-top: 5px">
              <h3 style="font-size: 20px;">Hệ Thống Quản Lý Hồ Sơ Phật Giáo</h3>
              <h4 style="font-size: 14px;">Tỉnh Bà Rịa Vũng Tàu</h4>
            </div>
          </div>
          
          <!-- /.navbar-header -->
          <!-- /.navbar-top-links -->
          
          <div class=" navbar-default sidebar" role="navigation" id="con">
            <div class="sidebar-nav navbar-collapse">
              <ul class="nav" id="side-menu">
                <li class="lev1">
                  <a href="admin/tuvien/danhsach" class="title-ul" ><i class="fa fa-dashboard fa-fw fa-2x"></i> Trang Chủ</a>
                </li>
                <li class="lev1">
                  <a href="#" class="title-ul" ><i class="fa fa-users fa-fw fa-2x"></i>Quản Lý Tăng Ni<span class="fa arrow"></span></a>
                  <ul class="nav nav-second-level">
                    <li>
                      <a href="admin/tangni/danhsachtangni"  class="title-li">Danh Sách Tăng Ni</a>
                    </li>
                    <li>
                      <a href="admin/tangni/them" class="title-li">Thêm Tăng Ni</a>
                    </li>
                    <li>
                      <a href="admin/tangni/chinhsua" class="title-li">Chỉnh Sữa Tăng Ni</a>
                    </li>
                  </ul>
                  <!-- /.nav-second-level -->
                </li>
                <li class="lev1">
                  <a href="#" class="title-ul"><i class="fa fa-home fa-2x"></i> Quản Lý Tự Viện<span class="fa arrow"></span></a>
                  <ul class="nav nav-second-level">
                    <li>
                      <a href="admin/tuvien/danhsach" class="title-li">Danh Sách Tự Viện</a>
                    </li>
                    <li>
                      <a href="admin/tuvien/them" class="title-li">Thêm Tự Viện</a>
                    </li>
                    <li>
                      <a href="admin/tuvien/chinhsua" class="title-li">Chỉnh Sửa Tự Viện</a>
                    </li>
                  </ul>
                  <!-- /.nav-second-level -->
                </li>
                
                <li class="lev1">
                  <a href="#" class="title-ul"><i class="fa fa-file fa-2x"></i>&nbsp;Quản Lý Văn Bản<span class="fa arrow"></span></a>
                  <ul class="nav nav-second-level">
                    <li>
                      <a href="#" class="title-li">Danh Sách Văn Bản Hiện Tại</a>
                    </li>
                    <li>
                      <a href="#" class="title-li">Thêm Văn Bản</a>
                    </li>
                  </ul>
                  <!-- /.nav-second-level -->
                </li>
                <!-- ban do -->
                <!-- ----------- -->
                <li class="lev1">
                  <a href="#" class="title-ul class="title-li""><i class="fa fa-user fa-2x"></i>&nbsp;Quản Lí Người Dùng<span class="fa arrow"></span></a>
                  <ul class="nav nav-second-level">
                    <li>
                      <a href="admin/user/TT_user" class="title-li">Xem Danh Sách</a>
                    </li>
                    <li>
                      <a href="#" class="title-li">Thêm Người Dùng</a>
                    </li>
                    <li>
                      <a href="#" class="title-li">Chỉnh Sửa Người Dùng</a>
                    </li>
                  </ul>
                </li>
                <li class="lev1">
                  <a href="#" class="title-ul"><i class="fa fa-cog fa-2x"></i>&nbsp;Thiết Lâp Hệ Thống <span class="fa arrow"></span></a>
                  <ul class="nav nav-second-level">
                    <li>
                      <a href="#" class="title-li">Cài Đặt</a>
                    </li>
                    <li>
                      <a href="#" class="title-li">Thông Tin Cá Nhân</a>
                    </li>
                    <li>
                      <a href="#" class="title-li">Đăng Xuất</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
            <!-- /.sidebar-collapse -->
          </div>
          
          <!-- /.navbar-static-side -->
        </nav>
        <!-- Content -->
        <!-- style -->
        <style>
        .title-thead{
        background-color: #DF3A01;
        color: #FFFFFF;
        font-size: 18px;
        text-align: center;
        border-radius: 20px 20px 0px 0px;
        font-weight: bold;
        }
        .title-tr:hover{
        font-weight: bold;
        }
        table >thead >tr>th {
        text-align: left;
        }
        td {
        text-align: left;
        margin-left: 30px;
        margin-top: 5px;
        margin-bottom: 5px;
        padding-bottom: 5px;
        }
        .icon-file{
        margin-bottom: 5px;
        }
        body {
        background: rgb(204,204,204);
        }
        page[size="A4"] {
        background: white;
        width: 21cm;
        height: 29.7cm;
        display: block;
        margin: 0 auto;
        margin-bottom: 0.5cm;
        box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
        }
        .a4{
        padding-top: 40px;
        }
        #quochieu{
        padding-left: 40px;
        padding-top: 30px;
        padding-top: 60px;
        }
        #tieungu{
        padding-left: 50px;
        }
        hr{
        width: 80px;
        border: dashed;
        border-width: 1px;
        width: 120px;
        }
        .hr1{
        text-align: center;
        padding-left: 100px;
        }
        .tendon{
        text-align: center;
        font-size: 20px;
        font-weight: bold;
        padding-top: 50px;
        }
        .loichao{
        padding-left: 120px;
        padding-top: 20px;
        }
        .trutri{
        padding-left: 80px;
        padding-top: 20px;
        }
        #nguoigui{
        padding-left: 80px;
        padding-top: 5px;
        }
        #ngaylamdon{
        text-align: right;
        padding-right: 50px;
        padding-top: 30px;
        }
        #kytentrai{
        padding-left: 180px;
        text-align: left;
        }
        #kytenphai{
        text-align: right;
        padding-right: 180px
        }
        </style>
        <!-- Page Content -->
        <div id="page-wrapper" style="background-color: #e7e8e9" >
          <div class="container-fluid" >
            <!-- /.col-lg-12 -->
            <div class="a4">
              <page size="A4">
                <!-- Quốc hiệu tiêu ngữ -->
                <div class="row">
                  <div class="col-md-6 text-right" id="quochieu" style="padding-right: 100px">
                    HỘI PHẬT GIÁO VIỆT NAM<br><p>BAN TRỊ SỰ THPG GIA LAI</p>
                    <div class="hr1"><hr></div>
                  </div>
                  <div class="col-md-6 text-xl-left" id="quochieu" style="padding-right: 90px">
                    CỘNG HOÀ XÃ HỘI CHỦ NGHĨA VIỆT NAM<br>
                    <p id="tieungu">Độc Lập – Tự Do – Hạnh Phúc</p>
                    <hr style="width: 160px; padding-right: 100px">
                  </div>
                </div>
                <!-- Quốc hiệu tiêu ngữ -->
                <!-- Tên Đơn -->
                <div class="row">
                  <div class="tendon">
                    <p>ĐƠN XIN PHÁT NGUYỆN XUẤT GIA</p>
                  </div>
                </div>
                <!-- Tên Đơn -->
                <!-- Lời chào -->
                <div class="row">
                  <div class="loichao">
                    <p><u><b>Kính gửi</b></u>: - Ban Thường Trực Giáo Hội Phật Giáo Gia Lai.</p>
                  </div>
                </div>
                <!-- Lời chào -->
                <!-- Kính gửi trụ trì -->
                <div class="row">
                  <div class="trutri">
                    <div class="guitrutri">
                      <p><u><b>Kính <input style="border: none; border-bottom: 1px dotted black;" type="text" name="trutri" ></b></u></p>
                    </div>
                  </div>
                </div>
                <!-- Kính gửi trụ trì -->
                
                <!-- nguoigui -->
                <div class="row">
                  <div id="nguoigui">
                    <p><b>Con ký tên dưới đây là: <input style="border: none;border-bottom: 1px dotted black; width:500px" type="text" name="nguoigui"></b></p>
                  </div>
                </div>
                <!-- nguoigui -->
                <!-- pháp danh -->
                <div class="row">
                  <div id="nguoigui">
                    <p><b>Pháp danh: <input style="border: none;border-bottom: 1px dotted black; width:580px" type="text" name="phapdanh"></b></p>
                  </div>
                </div>
                <!-- pháp danh -->
                
                <!-- ngày sinh -->
                <div class="row">
                  <div id="nguoigui">
                    <p><b>Ngày, tháng, năm sinh: <input  type="date" name="ngaysinh" min="1900-01-01" max="2015-01-01"> Tại <input style="border: none;border-bottom: 1px dotted black; width:335px" type="text" name="noisinh" ></b></p>
                  </div>
                </div>
                <!-- ngày sinh -->
                <!-- thường trú -->
                <div class="row">
                  <div id="nguoigui">
                    <p><b>Thường trú: <input style="border: none;border-bottom: 1px dotted black; width:100px" type="text" name="thuongtru"> Thôn <input style="border: none;border-bottom: 1px dotted black; width:100px" type="text" name="thon" > Xã: <input style="border: none;border-bottom: 1px dotted black; width:100px" type="text" name="xa"> Quận (huyện): <input style="border: none;border-bottom: 1px dotted black; width:100px" type="text" name="huyen"></b></p> <b><p>Tỉnh: <input style="border: none;border-bottom: 1px dotted black; width:335px" type="text" name="tinh"></b></p>
                  </div>
                </div>
                <!-- thường trú -->
                <!-- noi xin xuất gia -->
                <div class="row">
                  <div id="nguoigui">
                    <p><b>Nay xin xuất gia với Bổn sư thế độ là: <input style="border: none;border-bottom: 1px dotted black; width:405px" type="text" name="bonsu"></b></p>
                  </div>
                </div>
                <!-- nơi xin xuất gia -->
                <!-- Tên Chùa -->
                <div class="row">
                  <div id="nguoigui">
                    <p><b>Trụ trì chùa: <input style="border: none;border-bottom: 1px dotted black; width:576px" type="text" name="chua"></b></p>
                  </div>
                </div>
                <!-- Tên chùa -->
                <!-- Đại Chỉ Chùa -->
                <div class="row">
                  <div id="nguoigui">
                    <p><b>Địa chỉ: <input style="border: none;border-bottom: 1px dotted black; width:607px" type="text" name="dcchua"></b></p>
                  </div>
                </div>
                <!-- Địa Chỉ Chùa -->
                <!-- Lời cam kết -->
                <div class="row">
                  <div id="nguoigui">
                    <p style="padding-right: 80px">Con nguyện nghiêm trì giới pháp, tuân theo Hiến Chương và Nội Quy Ban Tăng Sự Trung Ương Giáo Hội Phật Giáo Việt Nam </p>
                  </div>
                </div>
                <div class="row">
                  <div id="nguoigui">
                    <p style="padding-right: 80px; padding-top: 0px">Kính mong Chư Tôn Đức từ bi chấp thuận. </p>
                  </div>
                </div>
                <!-- Lời cam kết -->
                
                <!-- ngày làm đơn -->
                <div class="row">
                  <div id="ngaylamdon">
                    <p> ...............,Ngày ........... tháng ........... năm ..........</p>
                  </div>
                </div>
                <!-- ngày làm đơn -->
                <!-- ngày làm đơn -->
                <div class="row">
                  <div id="kytenphai">
                    <p><b> Kính đơn</b></p>
                  </div>
                </div>
                <!-- ngày làm đơn -->
              </page>
                      
              <!-- page 2 -->
              <page size="A4">
                <!-- Sự đồng ý cha mẹ -->
                <div class="row">
                  <div class="tendon">
                    <p><b> SỰ ĐỒNG Ý CỦA CHA MẸ </b></p>
                  </div>
                </div>
                <div class="row">
                  <div id="nguoigui">
                    <p><b>Chúng tôi đồng ý cho con tôi là: <input style="border: none;border-bottom: 1px dotted black; width:438px" type="text" name="tennguoigui"></b></p>
                  </div>
                </div>
                <div class="row">
                  <div id="nguoigui">
                    <p><b>Xuất gia tu học tại chùa: <input style="border: none;border-bottom: 1px dotted black; width:410px" type="text" name="tennguoigui"> làm Bổn Sư</b></p>
                  </div>
                </div>
                <div class="row">
                  <div id="nguoigui">
                    <p><b>Do: <input style="border: none;border-bottom: 1px dotted black; width:630px" type="text" name="tennguoigui"></b></p>
                  </div>
                </div>
                <div class="row">
                  <div id="ngaylamdon">
                    <p> ...............,Ngày ........... tháng ........... năm ..........</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 text-right">
                    <div id="kytentrai">
                      <b>Cha</b> (ký tên)
                    </div>
                  </div>
                  <div class="col-md-6 text-left">
                    <div id="kytenphai">
                      <b>Mẹ</b>(ký tên)
                    </div>
                  </div>
                </div>
                <!-- Sự đồng ý cha mẹ -->

                <!-- Ý kiến bổn sư -->
                <div class="row">
                  <div class="tendon" style="padding-top: 90px">
                    <p><b> Ý kiến của Bổn Sư thế độ </b></p>
                  </div>
                </div>
                <div class="row">
                  <div id="nguoigui">
                    <textarea name="ykienbonsu" rows="5" cols="90">

                    </textarea>
                  </div>
                </div>
                
                <div class="row">
                  <div id="ngaylamdon">
                    <p> ...............,Ngày ........... tháng ........... năm ..........</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 text-right">
                    <div id="kytentrai">
                    </div>
                  </div>
                  <div class="col-md-6 text-left">
                    <div id="kytenphai">
                      <b>Bổn sư</b>(ký tên)
                    </div>
                  </div>
                </div>
                <!-- Ý kiến bổn sư -->

                <!--Xác nhận của UBND Phường, Xã (Nơi thường trú)  -->
                <div class="row">
                  <div class="tendon" style="padding-top: 90px">
                    <p><b> Xác nhận của UBND Phường, Xã </b>(Nơi thường trú) </p>
                  </div>
                </div>
                <div class="row">
                  <div id="nguoigui">
                    <textarea name="xacnhanubnn" rows="5" cols="90">

                    </textarea>
                  </div>
                </div>
                
                <div class="row">
                  <div id="ngaylamdon">
                    <p> ...............,Ngày ........... tháng ........... năm ..........</p>
                  </div>
                </div>
                <!--Xác nhận của UBND Phường, Xã (Nơi thường trú)  -->

                
              </page>
              <!-- page 2 -->

              <!-- page 3 -->
              <page size="A4">

                <!--Ý kiến của Ban Đại Diện Phật Giáo Huyện (Nơi thường trú)  -->
                <div class="row">
                  <div class="tendon">
                    <p><b> Ý kiến của Ban Đại Diện Phật Giáo Huyện</b> (Nơi thường trú) </p>
                  </div>
                </div>
                <div class="row">
                  <div id="nguoigui">
                    <textarea name="ykienphatgiao" rows="5" cols="90">

                    </textarea>
                  </div>
                </div>
                
                <div class="row">
                  <div id="ngaylamdon">
                    <p> ...............,Ngày ........... tháng ........... năm ..........</p>
                  </div>
                </div>
                <!--Ý kiến của Ban Đại Diện Phật Giáo Huyện (Nơi thường trú)  -->

                <!--Ý kiến của Ban Tôn Giáo (Nơi xuất gia)  -->
                <div class="row">
                  <div class="tendon" style="padding-top: 60px">
                    <p><b> Ý kiến của Ban Tôn Giáo</b> (Nơi xuất gia) </p>
                  </div>
                </div>
                <div class="row">
                  <div id="nguoigui">
                    <textarea name="ykienbantongiao" rows="5" cols="90">

                    </textarea>
                  </div>
                </div>
                
                <div class="row">
                  <div id="ngaylamdon">
                    <p> ...............,Ngày ........... tháng ........... năm ..........</p>
                  </div>
                </div>
                <!--Ý kiến của Ban Tôn Giáo (Nơi xuất gia) -->

                <div class="row">
                  <div id="nguoigui">
                    <p><b>Ban Trị Sự Phật Giáo Tỉnh: <input style="border: none;border-bottom: 1px dotted black; width:438px" type="text" name="bantrisutinh"></b></p>
                  </div>
                </div>

                <div class="row">
                  <div id="nguoigui">
                    <p><b>Chấp thuận cho: <input style="border: none;border-bottom: 1px dotted black; width:438px" type="text" name="tennguoigui"></b></p>
                  </div>
                </div> 

                <div class="row">
                  <div id="nguoigui">
                    <p><b>Được xuất gia tu học tại chùa: <input style="border: none;border-bottom: 1px dotted black; width:438px" type="text" name="tenchua"></b></p>
                  </div>
                </div>

                <div class="row">
                  <div id="nguoigui">
                    <p><b>Theo nội dung đơn xin</b></p>
                  </div>
                </div>
                
                <div class="row">
                  <div id="ngaylamdon">
                    <p> ...............,Ngày ........... tháng ........... năm ..........</p>
                  </div>
                </div>

                <div class="col-md-12 text-right">
                    <div id="kytenphai" style="padding-right:110px;">
                      <p ><b>TM.Ban Thường Trực BTS Tỉnh Hội</b></p>
                    </div>
                </div>
                <div class="col-md-12 text-right">
                    <div id="kytenphai">
                      <p><b>TRƯỞNG BAN </b></p>
                    </div>
                </div>
                <button onclick="myFunction()">Print this page</button>
                <script>
                function myFunction() {
                window.print();
                }
                </script>
              </page>
              <!-- page 3 -->
              
          
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        <!-- End Content -->
      </div>
      <!-- /#wrapper -->
      <!-- jQuery  File-->
      
      <!-- ajax add tang ni -->
      <script>
      $(document).ready(function(){
      var i=0;
      $('#add').click(function(){
      i++;
      
      $('#dynamic_field').append('<tr id="row'+i+'"><td style="width: 150px; color: black;"><input  type="date" name="tg-batdau'+i+'"/></td> <td style="width: 150px; color: black;"><input type="date" name="tg-ketthuc'+i+'"> </td> <td style="width: 200px; color: black;"><input type="text" name="noidaotao'+i+'" placeholder="    --- Nhập Nơi đào tạo ---" required width="350px"> </td> <td style="width: 200px;color: black;"><input type="text" name="noidung'+i+'" placeholder="    --- Nhập Nội dung ---" required>   </td> <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
      
      });
      $(document).on('click', '.btn_remove', function(){
      var button_id = $(this).attr("id");
      $('#row'+button_id+'').remove();
      });
      $('#submit').click(function(){
      $.ajax({
      url:"name.php",
      method:"POST",
      data:$('#add_name').serialize(),
      success:function(data)
      {
      alert(data);
      $('#add_name')[0].reset();
      }
      });
      });
      });
      </script>
      <!-- Loc  -->
      <!-- Bootstrap Core JavaScript -->
      <script src="fontend_admin/bootstrap/js/bootstrap.min.js"></script>
      <!-- Metis Menu Plugin JavaScript -->
      <script src="fontend_admin/metisMenu/dist/metisMenu.min.js"></script>
      <!-- Custom Menu JavaScript -->
      <script src="fontend_admin/menu/js/sb-admin-2.js"></script>
      <!-- DataTables JavaScript -->
      <script src="fontend_admin/dataTables/js/jquery.dataTables.min.js"></script>
      
      <!--Datatbles bootstrap  -->
      <script src="fontend_admin/dataTables/js/dataTables.bootstrap.min.js"></script>
      
      <!-- phone sdt format -->
      <script src="fontend_admin/formBootstrap/js/bootstrap-formhelpers-phone.js" ></script>
      <script src="fontend_admin/formBootstrap/js/bootstrap-formhelpers-datepicker.js" ></script>
      <!-- Javascript Personal -->
      <script src="fontend_admin/datatables-responsive/js/dataTables.responsive.min.js" type="text/javascript" async defer></script>
      <script src="fontend_admin/script_custom/custom.js"></script>
      @yield('script')
      
    </body>
  </html>
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
    <script src="fontend_admin/jquery/jquery.js"></script>
    <!-- Bootstrap Core CSS -->
    <link href="fontend_admin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- js map -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD57PRHJQSQ5XQOuNtAWpRBOP-UCX5pSzA&sensor=false"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

     <!--Memuil Menu CSS -->

     <link href="fontend_admin/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!--css datatable //-->
   
    <link href="fontend_admin/datatables/css/jquery.dataTables.css" rel="stylesheet"> 
    
    <!-- Memu CSS -->
    <link href="fontend_admin/menu/css/sb-admin-2.css" rel="stylesheet">

    <!-- Các Icon - Fonts -->
    <link href="fontend_admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS  
    <link href="fontend_admin/dataTables/css/dataTables.bootstrap.min.css" rel="stylesheet">-->
    <!-- DataTables Responsive CSS 
    <link href="fontend_admin/datatables-responsive/css/responsive.dataTables.css" rel="stylesheet">
-->
    <link href="fontend_admin/datatables-responsive/css/responsive.dataTables.min.css" rel="stylesheet">

     <!--CSS Tùy Chỉnh-->

   
</head>
<body>

    <div id="wrapper">
        @include('admin.homelayout.header')
        @yield('content')

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

    <!-- DataTables JavaScript-->
    <script src="fontend_admin/dataTables/js/jquery.dataTables.min.js" async></script>
    
    <!--Datatbles bootstrap  -->

    <script src="fontend_admin/dataTables/js/dataTables.bootstrap.min.js" async></script>
    
    <!-- phone sdt format -->

    <script src="fontend_admin/formBootstrap/js/bootstrap-formhelpers-phone.js" ></script>
    <script src="fontend_admin/formBootstrap/js/bootstrap-formhelpers-datepicker.js" ></script>
     <!-- Javascript Personal -->


    <script src="fontend_admin/datatables-responsive/js/dataTables.responsive.min.js" type="text/javascript" async defer></script>

    <script src="fontend_admin/script_custom/custom.js"></script>
     @yield('script')
    
</body>
</html>

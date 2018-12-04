@extends('admin.homelayout.index')
@section('content')
<!-- Page Content -->
<style>
.title-thead{
background-color: #DF3A01;
color: #FFFFFF;
font-size: 18px;
border-radius: 20px 20px 0px 0px;
font-weight: bold;
}
.title-tr:hover{
    font-weight: bold;

}
table >thead >tr>th {
    text-align: left;
}
.filter{
text-align: right;
font-size: 16px;
font-weight: bold;
}
#filter1:hover{
cursor: pointer;
}
#framefilter{
padding-top: 10px;
padding-bottom: 10px;
font-size: 18px;
/*display: none;*/
}
label {
font-weight: bold;
font-size: 16px;
}
#frame-color{
background-color: #acb0b1;
margin-top: 10px;
margin-bottom: 15px;
color: #360000;
font-weight: bold;
display: none;
}
#close-but{
color:white;
background-color: red;
font-weight: bold;
}
#close{
text-align: right;
display: none;
}
</style>
<div id="page-wrapper"  style="background-color: #e7e8e9">
    <div class="container-fluid">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Chỉnh sửa tự viện</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <p id="filter" class="filter"><a id="filter1">Lọc Dữ Liệu <i class="fa fa-filter "></i></a></p>
        </div>
        <div class="row">
            <div id="close">
                <p><button type="button" id="close-but"> &nbsp&nbsp Đóng Lại &nbsp&nbsp</button></p>
            </div>
        </div>
        <div class="row" id="frame-color">
            <div id="framefilter">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Quận Huyện</label>
                        <select name="district" class="form-control" id="district">
                            <option value="none"></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Xã Phường</label>
                        <select name="ward" class="form-control" id="ward">
                            <option value="none"></option>
                            <option value="none1">--Hãy chọn quận huyện trước--</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Tự Viện</label>
                        <select name="tuvien" class="form-control" id="tuvien">
                            <option value="none"></option>
                            <option value="none1">--Hãy chọn xã phường trước--</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Trạng Thái</label>
                        <select name="state"  class="form-control" id="state">
                            <option value="none"></option>
                        </select>
                    </div>
                </div>
                
                
            </div>
        </div>
        <div class="row">
            <!-- /.col-lg-12 -->
            <div class="table-responsive-md">
                <table class="dataTables1 table table-striped " id="dataTables1" >
                    <thead class="title-thead">
                        <tr >
                            <th>Tự Viện</th>
                            <th>Xã Phường</th>
                            <th>Quận Huyện</th>
                            <th>Trạng Thái</th>
                            <th>Xóa</th>
                            <th>Sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tuvien1 as $tv)
                        <tr class="title-tr">
                            <td>{{$tv->TuVien_Ten}}</td>
                            <td>{{$tv->XaPhuong_Ten}}</td>
                            <td>{{$tv->QuanHuyen_Ten}}</td>
                            <td>{{$tv->TrangThai_Ten}}</td>
                            <td align="center">
                                <a href="admin/tangni/xoa/{{$tv->TuVienID}}"><i class="glyphicon glyphicon-trash " style="font-size: 16px"></i>
                                </a>
                            </td>
                            <td align="center">
                                <a href="admin/tangni/capnhat/{{$tv->TuVienID}}">
                                    <i class="fa fa-pencil" style="font-size: 16px" ></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
@section('script')
<script>
$(document).ready(function() {

   var table = $('#dataTables1').DataTable({
            "ordering": false,
            "language": {
                   "search": "Tìm Kiếm",
                   "zeroRecords": "Không tìm thấy dữ liệu phù hợp",
                   "lengthMenu":  "Hiển Thị _MENU_ mẫu tin",
                   "info":        "",
                   "infoEmpty":  "Hiển thị 0 đến 0 của 0 mẫu tin",
                   "infoFiltered":   "",
                   "paginate": {
                        "first":      "First",
                        "last":       "Last",
                        "next":       "Tiếp Theo",
                        "previous":   "Về Trước"
                    }
                 }
    });
    $('#filter1').click(function(){
        $('#frame-color').css("display","block");
        $('#filter').css("display","none");
        $('#close').css("display","block");
        $.get("admin/ajax/quanhuyen/",function(data){
            $("#district").html(data);
        });
        $.get("admin/ajax/trangthai/",function(data){
            $("#state").html(data);
        });
        $('#ward').html("<option value='none1'></option><option value='none'>--Hãy chọn quận huyện trước--</option>");
        $('#tuvien').html("<option value='none1'></option><option value='none'>--Hãy chọn xã phường trước--</option>");
        $('#district').prop("selectedIndex",0);
        $('#state').prop("selectedIndex",0);  
    });
    $('#close-but').click(function(){
        $('#frame-color').css("display","none");
        $('#filter').css("display","block");
        $('#close').css("display","none");
        
        table.columns().eq(0).each(function(data) {
        if(table.column(3).search() !== ''){
            table.column(3).search('').draw();
        };
         if(table.column(1).search() !== ''){
            table.column(1).search('').draw();
        };
         if(table.column(2).search() !== ''){
            table.column(2).search('').draw();
        };
         if(table.column(0).search() !== ''){
            table.column(0).search('').draw();
        };
       });
    });
    
    $('#district').change(function(){
        var idQuanHuyen = $(this).val();
        if(idQuanHuyen !== "none"){
            $.get("admin/ajax/xaphuong/"+idQuanHuyen, function(data){
                $('#ward').html(data);
            });
            $.get("admin/ajax/tuviendistrict/"+idQuanHuyen,function(data){
                $('#tuvien').html(data);
            });
        }
        else {
             $('#ward').html("<option value='none1'></option><option value='none'>--Hãy chọn quận huyện trước--</option>");
            $('#tuvien').html("<option value='none1'></option><option value='none'>--Hãy chọn xã phường trước--</option>");
        }
        table.columns().eq(0).each(function(data) {
            if(table.column(3).search() !== ''){
                table.column(3).search('').draw();
            };
             if(table.column(1).search() !== ''){
                table.column(1).search('').draw();
            };
             if(table.column(2).search() !== ''){
                table.column(2).search('').draw();
            };
             if(table.column(0).search() !== ''){
                table.column(0).search('').draw();
            };
        });
        var value = $("#district option:selected").text();
        table.columns().eq(0).each(function(data) {
            if(table.column(2).search() !== value){
                table.column(2).search(value).draw();
            }
       }); 

       var idTrangThai = $('#state').val();
       if(idTrangThai !== "none"){
            var value = $("#state option:selected").text();
            table.columns().eq(0).each(function(data){
                if(table.column(3).search() !== value){
                    table.column(3).search(value).draw();
                }
            })
       } 
    });
    
    $('#ward').change(function(){
         var value = $("#ward option:selected").text();
         table.columns().eq(0).each(function(data) {
            if(table.column(1).search() !== value){
                table.column(1).search(value).draw();
            }
       });
       var idXaPhuong = $(this).val();
        if(idXaPhuong !== "none"){
            $.get("admin/ajax/tuvien/"+idXaPhuong, function(data){
                $('#tuvien').html(data);
            });
        }
        else{
            var idQuanHuyen = $("#district").val();
             $.get("admin/ajax/tuviendistrict/"+idQuanHuyen,function(data){
                $('#tuvien').html(data);
            });
        }
    }); 
    $('#tuvien').change(function(){
         var value = $("#tuvien option:selected").text();
         table.columns().eq(0).each(function(data) {
            if(table.column(0).search() !== value){
                table.column(0).search(value).draw();
            }
       });
    });
     $('#state').change(function(){  
       var idQuanHuyen = $('#district').val();
       var idXaPhuong = $('#ward').val();
       var idTrangThai = $(this).val();
       if(idTrangThai !== "none"){
           if(idQuanHuyen === "none"){
               $.get("admin/ajax/state/"+idTrangThai,function(data){
                    $('#tuvien').html(data);
               }) ;
            }
            else if(idXaPhuong === "none"){
                $.get("admin/ajax/state/"+idTrangThai+"/district/"+idQuanHuyen, function(data){
                    $('#tuvien').html(data);
                });
            }
            else{
                  $.get("admin/ajax/state/"+idTrangThai+"/district/"+idQuanHuyen+"/ward/"+idXaPhuong, function(data){
                    $('#tuvien').html(data);
                });
            }
        }
        else if(idQuanHuyen !== "none"){
            if(idXaPhuong === "none"){
                $.get("admin/ajax/tuviendistrict/"+idQuanHuyen,function(data){
                $('#tuvien').html(data);
            });
            }
            else{
                 $.get("admin/ajax/tuvien/"+idXaPhuong, function(data){
                $('#tuvien').html(data);
        });
            }
        }
        else{

        }
         table.columns().eq(0).each(function(data) {
            if(table.column(3).search() !== ''){
                table.column(3).search('').draw();
            };
             if(table.column(1).search() !== ''){
                table.column(1).search('').draw();
            };
             if(table.column(2).search() !== ''){
                table.column(2).search('').draw();
            };
             if(table.column(0).search() !== ''){
                table.column(0).search('').draw();
            };
        });
        var value = $("#state option:selected").text();
         table.columns().eq(0).each(function(data) {
            if(table.column(3).search() !== value){
                table.column(3).search(value).draw();
            }
       });
        var idQuanHuyen = $('#district').val();
        if(idQuanHuyen !== "none"){
            var value = $("#district option:selected").text();
            table.columns().eq(0).each(function(data){
                if(table.column(2).search() !== value){
                    table.column(2).search(value).draw();
                }
            });
             var value = $("#ward option:selected").text();
             table.columns().eq(0).each(function(data) {
                if(table.column(1).search() !== value){
                    table.column(1).search(value).draw();
                }
            });

       } 
    });
});
</script>
@endsection
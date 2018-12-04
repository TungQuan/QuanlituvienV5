@extends('admin.homelayout.index')
@section('content')
<!-- Page Content -->
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
    text-align: center;
}
.title-tr{
    background-color:  #FF8000 ;
    text-align: center;

}
#title-tuvien{
    border-radius: 70px 70px 0px 0px;
    background-color:  #FF8000;
    color: #FFFFFF;
    text-align: center;
    size: 25px;
    margin-bottom: 0;
}
#filter{
    text-align: right;
    font-size: 16px;
    font-weight: bold;
    margin-top: 10px;
    margin-left: 15px;
}
#filter1:hover{
    cursor: pointer;
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
    margin-top:10px;
}
label {
    padding-top: 5px;
    font-weight: bold;
}
</style>
<div id="page-wrapper"  style="background-color: #e7e8e9">
    <div class="container-fluid">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="admin/tuvien/danhsach">Danh sách tự viện</a></li>
                    @foreach($dstangni as $ds)
                    <li class="breadcrumb-item active" aria-current="page">{{$ds->TuVien_Ten}}</li>
                    <li id="valueid" style="display: none;">{{$ds->TuVienID}}</li>
                    @break;
                    @endforeach
                </ol>
            </nav>
        </div>
        <div class="row" >
            <div class="col-md-12" id="title-tuvien" >
                <h2 >Danh Sách Tăng Ni</h2>
            </div>
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
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Tuổi Đạo</label>
                        <select name="tuoidao" class="form-control" id="tuoidao">
                            <option value="none"></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Giới Phẩm</label>
                        <select name="gioipham" class="form-control" id="gioipham">
                            <option value="none"></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Giáo Phẩm</label>
                        <select name="giaopham"  class="form-control" id="giaopham">
                            <option value="none"></option>
                        </select>
                    </div>
                </div>   
            </div>
        </div>
        <div class="row">
            <!-- /.col-lg-12 -->
            <div class="table">
                <table class="table table-striped " id="dataTables4">
                    <thead class="title-thead">
                        <tr>
                            <th>STT</th>
                            <th>Pháp Danh</th>
                            <th>Tuổi Đạo</th>
                            <th>Giới Phẩm </th>
                            <th>Giáo Phẩm</th>
                             <th>Hồ Sơ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach($dstangni as $ds)
                        <tr class="title-tr">
                            <td align="center">@php echo $i; $i++ @endphp</td>
                            <td>{{$ds->PhapDanh}}</td>
                            <td>{{$ds->TuoiDao}}</td>
                            <td>{{$ds->GioiPham_Ten}}</td>
                            <td>{{$ds->GiaoPham_Ten}}</td>
                            <td class="center" align="center">
                                <a href="admin/tangni/hoso/{{$ds->TangNiID}}"><i class="glyphicon glyphicon-list-alt" style="font-size:20px;"></i>
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
    
   var table = $('#dataTables4').DataTable({
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
        var idTuVien = $("#valueid").text();
        //alert(idTuVien);
        $.get("admin/ajax/tangni/tuoidao/"+idTuVien,function(data){
            $('#tuoidao').html(data);
        });
        $.get("admin/ajax/tangni/gioipham/"+idTuVien,function(data){
            $('#gioipham').html(data);
        });
         $.get("admin/ajax/tangni/giaopham/"+idTuVien,function(data){
            $('#giaopham').html(data);
        });
   });
   $('#close-but').click(function(){
        $('#frame-color').css("display","none");
        $('#filter').css("display","block");
        $('#close').css("display","none");
        $('#tuoidao').prop("selectedIndex",0);
        $('#giaopham').prop("selectedIndex",0);
        $('#gioipham').prop("selectedIndex",0);
        table.columns().eq(0).each(function(data) {
            if(table.column(3).search() !== ''){
                table.column(3).search('').draw();
            };
            if(table.column(2).search() !== ''){
                table.column(2).search('').draw();
            };
            if(table.column(4).search() !== ''){
                table.column(4).search('').draw();
            };
        });
    });
   $('#tuoidao').change(function(){
    var value = $("#tuoidao option:selected").text();
        table.columns().eq(0).each(function(data) {
            if(table.column(2).search() !== value){
                table.column(2).search(value).draw();
            }
       }); 

   });
   $('#gioipham').change(function(){
    var value = $("#gioipham option:selected").text();
        table.columns().eq(0).each(function(data) {
            if(table.column(3).search() !== value){
                table.column(3).search(value).draw();
            }
       }); 

   });

    $('#giaopham').change(function(){
    var value = $("#giaopham option:selected").text();
        table.columns().eq(0).each(function(data) {
            if(table.column(4).search() !== value){
                table.column(4).search(value).draw();
            }
       }); 

   });
});
</script>
@endsection
@extends('admin.homelayout.index')
@section('content')
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
<!-- Page Content -->
<div id="page-wrapper" style="background-color: #e7e8e9">
    <div class="container-fluid" >
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Danh sách tăng ni</li>
                </ol>
            </nav>
        </div>
        <!-- /.col-lg-12 -->
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
                        <label>Tự Viện</label>
                        <select name="tuvien"  class="form-control" id="tuvien">
                            <option value="none"></option>
                        </select>
                    </div>
                </div>   
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Tuổi Đạo</label>
                        <select name="tuoidao" class="form-control" id="tuoidao">
                            <option value="none"></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Giới Phẩm</label>
                        <select name="gioipham" class="form-control" id="gioipham">
                            <option value="none"></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
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
            <div>
                <table class="table table-striped" id="dataTables2">
                    <thead class="title-thead">
                        <tr >
                            <th>STT</th>
                            <th>Pháp Danh</th>
                            <th>Tự Viện </th>
                            <th>Tuổi Đạo</th>
                            <th>Giới Phẩm</th>
                            <th>Giáo Phẩm</th>
                            <th>Hồ Sơ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i =1; @endphp
                        @foreach($tangni as $tn)
                        <tr class="title-tr">
                            <td align="center">@php echo $i; $i++ @endphp</td>
                            <td>{{$tn->PhapDanh}}</td>
                            <td>{{$tn->TuVien_Ten}}</td>
                            <td align="center">{{$tn->TuoiDao}}</td>
                            <td align="center">{{$tn->GioiPham_Ten}}</td>
                            <td align="center">{{$tn->GiaoPham_Ten}}</td>
                            <td align="center" ><a href="admin/tangni/hoso/{{$tn->TangNiID}}"><i class="glyphicon glyphicon-list-alt" style="font-size:20px;"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header1">&nbsp;
                </h1>
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

        var table = $('#dataTables2').DataTable({

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
        //alert("mo");
        $('#frame-color').css("display","block");
        $('#filter').css("display","none");
        $('#close').css("display","block");
        //var idTuVien = $("#valueid").text();
        //alert(idTuVien);
        $.get("admin/ajax/danhsach/tangni/tuvien",function(data){
            $('#tuvien').html(data);
        })
        $.get("admin/ajax/danhsach/tangni/tuoidao/",function(data){
            $('#tuoidao').html(data);
        });
        $.get("admin/ajax/danhsach/tangni/gioipham/",function(data){
            $('#gioipham').html(data);
        });
         $.get("admin/ajax/danhsach/tangni/giaopham/",function(data){
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
        $('#tuvien').prop("selectedIndex",0);
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
            if(table.column(5).search() !== ''){
                table.column(5).search('').draw();
            };
        });
    });

    $('#tuoidao').change(function(){
        //alert("doi tuoi dao");
    var value = $("#tuoidao option:selected").text();
        table.columns().eq(0).each(function(data) {
            if(table.column(3).search() !== value){
                table.column(3).search(value).draw();
            }
       }); 

   });
   $('#gioipham').change(function(){
   // alert("doi gioi pham");
    var value = $("#gioipham option:selected").text();
        table.columns().eq(0).each(function(data) {
            if(table.column(4).search() !== value){
                table.column(4).search(value).draw();
            }
       }); 

   });

    $('#giaopham').change(function(){
         //alert("doi giao pham");
    var value = $("#giaopham option:selected").text();
        table.columns().eq(0).each(function(data) {
            if(table.column(5).search() !== value){
                table.column(5).search(value).draw();
            }
       }); 

   });
     $('#tuvien').change(function(){
       // alert("doi tu viwen");
    var value = $("#tuvien option:selected").text();
        table.columns().eq(0).each(function(data) {
            if(table.column(2).search() !== value){
                table.column(2).search(value).draw();
            }
       }); 

   });
});
</script>
@endsection
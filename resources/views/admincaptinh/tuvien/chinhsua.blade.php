@extends('admincaptinh.layout.template')
@section('css')
<style type="text/css">
div.right-content{
margin-left:50px;
margin-top:15px;
}
p.title-form{
    border-radius: 50px 50px 0px 0px;
    background-color:  #DF3A01;
    color: #ffffff;
    font-size: 25px;
    text-align: center;
    margin : 0px 10px 0px 10px;
    padding: 5px 0px 5px 0px;
}
div.backgroundform {
    border-radius: 0px 0px 50px 50px;
    background-image: url("fontend_admin/image/bg-middle.jpg");
    margin : 0px 25px 0px 25px;
    padding: 15px 0px 0px 0px;
}
button.insert-but{
    background-color:  #DF3A01;
    color: #ffffff;
    margin-right: 10px;
}
label{
    font-weight: bold;
    font-size: 16px;
}
div.editframe{
    margin-top:15px;

}
span.edit{
    text-decoration: underline;
    font-weight: bold;
    cursor: pointer;
    color: blue;
}


</style>
@endsection
@section('script')
<script type="text/javascript">
    $(".nav li.f3").children('ul').addClass("action");
    $(".nav li.f3").children('a').children('span').css("transform","rotate(-90deg)");
    $(".nav li ul").not(".action").css("display","none");
    var tentuvien = $(".input_tuvien").val();
    var trutri = $(".input_trutri").val();
    var phone = $(".input_phone").val();
    var email = $(".input_email").val();
    var trangthai = $("#state").html();
    var quanhuyen = $("#quanhuyen").html();
    var xaphuong = $("#xaphuong").html();
    var diachi = $(".input_diachi").val();
   
   
    $("#restore_tuvien").click(function(){
        $(".input_tuvien").val(tentuvien);
    });
    
    $("#restore_trutri").click(function(){
        $(".input_trutri").val(trutri);
       
    });
    
    $("#restore_diachi").click(function(){
        $(".input_diachi").val(diachi);
        
    });
    $("#danhsach_trangthai").click(function(){
        $.get("admincaptinh/ajax/trangthai",function(data){
            $("#state").html(data);
        });
        
    });
   $("#danhsach_quanhuyen").click(function(){
        $.get("admincaptinh/ajax/quanhuyen",function(data){
            $("#quanhuyen").html(data);
        });
        
    });
    
    $("#quanhuyen").change(function(){
         var quanhuyen_id = $(this).val();
        //alert(quanhuyen_id);
        $.get("admincaptinh/ajax/xaphuong/"+quanhuyen_id,function(data){
            $("#xaphuong").html(data);
        });
    });
    $("#ds_xaphuong").click(function(){
        var quanhuyen_id = $("#quanhuyen option:selected").val();
        $.get("admincaptinh/ajax/xaphuong/"+quanhuyen_id,function(data){
            $("#xaphuong").html(data);
        });
    });
    
    $("#restore_phone").click(function(){
        $(".input_phone").val(phone);
       
    });
   
    $("#restore_email").click(function(){
        $(".input_email").val(email);
       
    });
    $("#reset-all").click(function() {
        $(".input_tuvien").val(tentuvien);
        $(".input_trutri").val(trutri);
        $(".input_diachi").val(diachi);
        $(".input_phone").val(phone);
        $(".input_email").val(email);
        $("#state").html(trangthai);
        $("#quanhuyen").html(quanhuyen);
        $("#xaphuong").html(xaphuong);
    });
    $("#avatar").click(function(){
        $(".update_avatar").css("display","block");
    });
</script>
@endsection
@section('right-content')
<div class="right-content">
    <div class="row">
        <div class="menu">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="admincaptinh/quanli">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="admincaptinh/tuvien/danhsach">Danh sách tự viện</a></li>
                    <li class="breadcrumb-item active">Chỉnh sửa tự viện</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p class="title-form">Chỉnh Sửa Tự Viện</p>
        </div>
    </div>
    <div class="row">
        <div class="backgroundform">
            @foreach($tuvien as $tv)
            <form class="form-horizontal" action="admincaptinh/tuvien/chinhsua" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                @foreach($errors->all() as $error)
                <div class="alert alert-danger" style="margin: 10px 250px 10px 250px; text-align: center">
                    {{$error}}
                </div>
                @endforeach
                @if(session('thongbao1'))
                <div class="alert alert-success" style="margin: 10px 250px 10px 250px; text-align: center">
                    {{session('thongbao1')}}
                </div>
                @endif
                <div class="form-group">
                    <label class="control-label col-md-4 " for="inputName">
                    Tên Tự Viện:</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control input_tuvien" value="{{$tv->tuvien_ten}}" name="tentuvien"  required="">
                    </div>
                    <div class="editframe">
                     
                        <span id="restore_tuvien" class="restore edit">Phục Hồi</span>
                    </div>
                </div>
                <!--
                <div class="form-group">
                    <label class="control-label col-md-4 ">Trụ Trì</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control input_trutri" name="trutri"value="tru tri" required>
                    </div>
                    <div class="editframe">
                        <span id="restore_trutri" class="restore edit">Phục Hồi</span>
                    </div>
                </div> -->
                <div class="form-group">
                    <label class="control-label col-md-4" for="quanhuyen">Trạng Thái: </label>
                    <div class="col-md-4">
                         <select class="form-control" id="state" name="trangthai"  required>
                            <option value={{$tv->trangthai_id}}>{{$tv->trangthai_ten}}</option>
                         </select>
                    </div>
                    <div class="editframe">
                        <span id="danhsach_trangthai" class="restore edit">Thay đổi</span>
                    </div>
                </div>
                
                <!--  form thong tin Dia Chih-->
                <div class="form-group">
                    <label class="control-label col-md-4 " for="address" >Địa Chỉ</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control input_diachi" name="diachi" value="{{$tv->diachi}}"  required="" >
                    </div>
                     <div class="editframe">
                        
                        <span id="restore_diachi" class="restore edit">Phục Hồi</span>
                    </div>
                </div>
                <!--  form đia chỉ-->
                <div class="form-group">
                    <label class="control-label col-md-4" for="quanhuyen">Quận Huyện: </label>
                    <div class="col-md-4">
                        <select class="form-control" id="quanhuyen" name="quanhuyen" required >
                            <option value="{{$tv->quanhuyen_id}}">{{$tv->quanhuyen_ten}}</option>
                        </select>
                    </div>
                    <div class="editframe">
                        <span id="danhsach_quanhuyen" class="restore edit">Thay đổi</span>
                    </div>
                </div>
                
                <!--  form thong tin Xa phuong -->
                <div class="form-group">
                    <label class="control-label col-md-4" for="xaphuong">Xã Phường: </label>
                    <div class="col-md-4">
                        <select class="form-control" id="xaphuong" name="xaphuong" required >
                            <option value="{{$tv->xaphuong_id}}">{{$tv->xaphuong_ten}}</option>
                        </select>
                    </div>
                    <div class="editframe">
                        <span id="ds_xaphuong" class="edit">Thay đổi</span>
                    </div>
                </div>
                
                <!--  form thong tin mail-->
                <div class="form-group">
                    <label class="control-label col-md-4 " for="phone">Số Điện Thoại:</label>
                    <div class="col-md-4">
                        <input type="tel" name="phone" class="phone form-control input_phone" value="{{$tv->phone}}"  required>
                    </div>
                    <div class="editframe">
                        <span id="restore_phone" class="restore edit">Phục Hồi</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4">Email</label>
                    <div class="col-md-4">
                        <input type="email" class="form-control input_email" name="email" value="{{$tv->email}}" >
                    </div>
                     <div class="editframe">
                         <span id="restore_email" class="restore edit">Phục Hồi</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4">Ảnh Đại Diện</label>
                    <div class="col-md-4 image">
                        <img src="fontend_admin/image/tuvien/{{$tv->image}}" alt="Chưa có hình" width="150px" height="150px">
                    </div>
                    <div class="avatar">
                         <span id="avatar" class="restore edit">Cập nhật</span>
                    </div>
                </div>
                <div class="form-group update_avatar" style="display: none;">
                    <div class="col-md-4 col-md-offset-4" >
                        <input type="file" name="image" accept="image/jpeg, image/png">
                    </div>
                </div>
                <input type="hidden" name="idtuvien" value="{{$tv->tuvien_id}}">
                @endforeach
                <!-- button -->
                <div class="form-group">
                    <div class="col-md-offset-2 col-md-8" align="center" style="margin-bottom: 20px">
                        <button type="submit" class="btn btn-basic insert-but">Xác Nhận</button>
                        <button type="button" id="reset-all"class="btn btn-primary reset-but">Thiết Lập Lại Tất Cả</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
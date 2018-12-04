@extends('admincaptinh.layout.template')
@section('css')
<style type="text/css">
        
            div.right-content{
                margin-left: 50px;
                margin-top: 15px;
            }
            div.userinfo-row-right{
                padding-left: 10px; ;
                line-height: 0.6;
            }
            div.row1{
                padding-top: 15px;
            }
            div.row2, .row3{
             margin-top:20px;
            }
            div.col1, div.col3,div.col5 {
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
@endsection
@section('script')
<script type="text/javascript">
    $(".nav li.f1").children('ul').addClass("action");
    $(".nav li.f1").children('a').children('span').css("transform","rotate(-90deg)");
    $(".nav li ul").not(".action").css("display","none");
</script>
@endsection
@section('right-content')
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
                <p>{{$username}}</p>
            </div>
        </div>
        <div class="row row2">
            <div class="col-md-2 col3">
                <p>Email </p>
            </div>
            <div class="col-md-4">
                <p>{{$email}}</p>
            </div>
        </div>
        <div class="row row3">
            <div class="col-md-2 col5">
                <p>Phân Quyền </p>
            </div>
           
            <div class="col-md-6">
                <p>{{$levelname}} &nbsp;&nbsp;<a class="view-role-admin-lev1">Xem Quyền Hạn </a></p>
            </div>
          
        </div>
        <div class="row">
            <div class="btn-change-email">
                <form action="admincaptinh/hosocanhan/changeemail" method="GET">
                    <button type="submit" class="btn btn-primary btn-md" id="btn_change_email" >&nbsp;&nbsp;&nbsp;Cập Nhật Email &nbsp;&nbsp;&nbsp;</button>
                </form>
            </div>
        </div>
    </div>
   
</div>
@endsection

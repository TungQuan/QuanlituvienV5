@extends('admincaptinh.layout.template')
@section('css')
<style type="text/css">
    div.right-content{
    margin-left:50px;
    margin-top:15px;
    }
    #backgroundform {
        border-radius: 0px 0px 50px 50px;
        background-image: url("fontend_admin/image/bg-middle.jpg");
    }
    .title {
        margin-left: 0px;
        text-align: center;
        border-radius: 50px 50px 0px 0px;
        background-color:  #DF3A01;
        color: #ffffff;
        font-size: 30px;
        margin-top: 0px;
        margin-bottom: 0px;
        margin-top: 10px;
    }
    label{
        
        font-weight: bold;
        font-size: 16px;
    }
    .button{
        background-color:  #DF3A01;
        color: #ffffff;
    }
    .form-control  {
        background-color:#ffffff;
        color: black;
    }
    #phone{
        background-color: #ffffff;
        color:black;
    }
    #form {
        padding-top: 25px;
        padding-bottom: 25px;
        
    }
</style>
@endsection

@section('script')
    <script type="text/javascript">
        $(".nav li.f4").children('ul').addClass("action");
        $(".nav li.f4").children('a').children('span').css("transform","rotate(-90deg)");
        $(".nav li ul").not(".action").css("display","none");
    </script>
@endsection
@section('right-content')
<div class="right-content">
    <div id="page-wrapper" style="background-color: #e7e8e9">
    <div class="container-fluid" >
            <div class="row" >
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Upload Đơn</li>
                </ol>
            </nav>
            </div>
            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
            <!-- /.col-lg-12 form thong tin -->
            
                <div class="row ">
                    <div class="col-md-12" >
                        <p class="title">Thêm Đơn</p>
                    </div>
                </div>

                <div id="backgroundform">
                    <div class="row" id="form">
                        <form class="form-horizontal" action="admincaptinh/vanban/uploaddontu" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <!--  form thêm văn bản-->
                            <div class="form-group" {{$errors->has('tendon') ? 'has-error' : ''}}>
                                <label class="control-label col-sm-4 " for="inputName">
                                Tên đơn:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control " id="inputTen" name="tendon" placeholder="Nhập Tên Đơn" required>
                                </div>
                                <span style="color: red;">
                                        {{$errors->first('ten')}}
                                </span>
                            </div>
                            
                            <div class="form-group" {{$errors->has('ghichu') ? 'has-error' : ''}}>
                                <label class="control-label col-sm-4 " for="inputName">
                                Ghi Chú:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control " id="inputTen" name="ghichu" placeholder="Nhập ghi chú">
                                </div>
                                <span style="color: red;">
                                        {{$errors->first('ghichu')}}
                                </span>
                            </div>
                            

                            <div class="form-group" {{$errors->has('dontu') ? 'has-error' : ''}}>
                                <label class="control-label col-sm-4 " for="inputVanBan"> Chọn Đơn: </label>
                                <div class="col-sm-4">
                                    <input type="file" class="form-control" id="inputdontu" name="dontu" required="required">
                                </div>
                                <span style="color: red;">
                                        {{$errors->first('dontu')}}                                        
                                </span>
                            </div>
                            <!-- button -->
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-8" align="center" style="margin-bottom: 20px">
                                    <input type="submit" class="btn-lg button" value="Tải lên">
                                    <button type="reset" class="btn-lg button">Nhập lại</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--end form -->
                </div>
                <!--end backround form -->
            </div>
        <!-- /.row -->
    <!-- /.container-fluid -->
</div>
</div>
@endsection
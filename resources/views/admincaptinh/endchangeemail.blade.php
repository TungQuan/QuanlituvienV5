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
    div.form{
    	padding-top: 20px;
    	padding-left: 10px;
    	background-color: white;
    }
    form.form-change-email{
    	padding: 0px 50px 20px 10px;
    }
</style>
@endsection
@section('script')
<script type="text/javascript">
    $(".nav li.f1").children('ul').addClass("action");
    $(".nav li ul").not(".action").css("display","none");
</script>
@endsection
@section('right-content')
<div class="right-content">
	<div class="userinfo-row-right" >
		<h4>Đổi Hộp Thư Email </h4>
		<p>Nhập mã xác nhận để hoàn thành việc cập nhật hộp thư mới</p>
	</div>
	<div class="form">
		<form class="form-change-email" action="member/doiemail/endchangeemail" method="POST">
			{!! csrf_field() !!}
			@if(session('thongbao'))
				<div class="alert alert-info thongbao " style="margin-top: 10px; text-align: center; color: black;">
					{{session('thongbao')}}
				</div>
			@endif
			<div class="form-group">
				<label for="oldpass">Nhập Mã Xác Nhận</label>
				<div class="input">
					<input type="text" class="form-control" name="code" id="code" placeholder="Mã Xác Nhận" required autofocus>
				</div>
				@if(session('thongbao1'))
				<div class="alert alert-danger" style="margin-top: 10px; margin-right: 50px;">
					{{session('thongbao1')}}
				</div>
				@endif
			</div>
			<div class="form-group">
				<div>
					<button style="background-color: #ff8000; color: #fff;" type="submit" class="btn btn-primary ">Cập Nhật Email</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection
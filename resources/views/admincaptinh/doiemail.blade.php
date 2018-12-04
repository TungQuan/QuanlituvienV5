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
		<p>Để cập nhật email mới, vui lòng xác nhận bằng cấp nhập mật khẩu</p>
	</div>
	<div class="form">
		<form class="form-change-email" action="member/doiemail/checkpass" method="POST">
			{!! csrf_field() !!}
			
			<div class="form-group">
				<label for="oldpass">Nhập Mật Khẩu Hiện Tại</label>
				<div class="input">
					<input type="password" class="form-control" name="password" id="password" placeholder="Mật khẩu hiện tại" required autofocus>
				</div>
				@if(session('thongbao1'))
				<div class="alert alert-danger" style="margin-top: 10px; margin-right: 50px;">
					{{session('thongbao1')}}
				</div>
				@endif
			</div>
			<div class="form-group">
				<label for="oldpass">Nhập Email Mới: </label>
				<div class="input">
					<input type="email" class="form-control" name="email" id="email" placeholder="Email mới" required >
				</div>
				@if(session('thongbaoemail'))
				<div class="alert alert-danger" style="margin-top: 10px; margin-right: 50px;">
					{{session('thongbaoemail')}}
				</div>
				@endif
				
			</div>
			<div class="form-group">
				<div>
					<button style="background-color: #ff8000; color: #fff;" type="submit" class="btn btn-primary ">Xác Nhận</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection
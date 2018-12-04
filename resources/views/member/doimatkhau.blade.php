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
    form.form-change-password{
    	padding: 0px 50px 20px 10px;
    }
</style>
@endsection
@section('right-content')
<div class="right-content">
	<div class="userinfo-row-right" >
		<h4>Đổi Mật Khẩu </h4>
		<p>Vui lòng không chia sẻ mật khẩu cho người khác.</p>
	</div>
	<div class="form">
		<form class="form-change-password" action="admincaptinh/hosocanhan/doimatkhau" method="POST">
			{!! csrf_field() !!}
			
			<div class="form-group">
				<label for="oldpass">Nhập Mật Khẩu Hiện Tại</label>
				<div class="input">
					<input type="password" class="form-control" name="oldpass" id="password" placeholder="Mật khẩu hiện tại" required autofocus>
				</div>
				@if(session('thongbao1'))
				<div class="alert alert-danger" style="margin-top: 10px; margin-right: 50px;">
					{{session('thongbao1')}}
				</div>
				@endif
			</div>
			<div class="form-group">
				<label for="newpass">Nhập Mật Khẩu Mới</label>
				<div class="input">
					<input type="password" class="form-control" name="newpass" id="newpass" placeholder="Mật khẩu mới" required="">
				</div>
			</div>
			<div class="form-group">
				<label for="renewpass">Xác Nhận Mật Khẩu</label>
				<div class="input">
					<input type="password" class="form-control" name="renewpass" id="renewpass" placeholder="Nhập lại mật khẩu" required>
				</div>
				@if(session('thongbao'))
				<div class="alert alert-danger" style="margin-top: 10px; margin-right: 50px;">
					{{session('thongbao')}}
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
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Đăng Nhập Hệ Thống</title>
		<link href="fontend_admin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<base href="{{ asset('') }} ">
		<style type="text/css">
			h2,h3,html,body{
				margin:0;padding: 0;
			}
			.title{
				min-height: 110px;
				background-image: url('fontend_admin/image/bg-top.jpg');
				padding-top: 0px;
			}
			.text{
				margin-left: 120px;
				padding-top: 25px;
				color: #FF8000;
			}
			.logo{
				width: 90px;
				float: left;
				padding-top: 10px;
				margin-left: 20px;
			}
			.login-panel{
				margin-top: 30px;
			}
			.form-control{
				margin-top:10px;
			}
			.panel-heading{
				text-align: center;
				font-weight: bold;
			}
			.panel-body{
				background-color:  #eff0f5;
			}
			.footer {
				background-image: url('fontend_admin/image/bg-footer.png');
				padding: 15px;
				min-height: 150px auto;
				color: #FFFFFF;
				text-align: center;
				margin-top: 90px;
		}
		.form{
			margin-top: 30px;}
		.resetpass{
			float: right;
			cursor: pointer;
			padding-top: 15px;
		}
		</style>
	</head>
	<body>
		<div class="title" >
			<a class ="logo" href="#"><img src="fontend_admin/image/logo.png" width="90px"></a>
			<div class="text">
				<h2 style="margin-bottom: 5px;">Hệ Thống Quản Lý Hồ Sơ Phật Giáo</h2>
				<h3>Tỉnh Bà Rịa Vũng Tàu</h3>
			</div>
			
		</div>
		<div class="container" >
			<div class="row">
				<div class="col-md-6 col-md-offset-3 form">
					<div class="login-panel panel panel-default">
						<div class="panel-body">
							@if(session('thongbao'))
							<div class="alert alert-danger">
								{{session('thongbao')}}
							</div>
							@endif
							@if(session('thongbao2'))
							<div class="alert alert-success">
								{{session('thongbao2')}}
							</div>
							@endif
							<form role="form" action="member/login" method="POST">
								{!! csrf_field() !!}
								<fieldset>
									<div class="form-group">
										<label for="username">Tên Đăng Nhập</label>
										<input class="form-control" placeholder="Tên đăng nhập" name="username" type="text" required autofocus>
									</div>
									<div class="form-group">
										<label for="password">Mật Khẩu</label>
										<input class="form-control" placeholder="Mật khẩu" name="password" type="password" required>
									</div>
									<button type="submit" class="btn btn-lg btn-success btn-block">Đăng Nhập</button>
									<div class="resetpass">
										<a href="quantri/resetpassword"> Quên mật khẩu? </a>
									</div>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer">
			<p> &copy;Bản quyền thuộc về Ban Trị Sự GHPGVN Tỉnh Bà Rịa Vũng Tàu.</p>
			<p> Thiết kế bởi sinh viên CNTT-K40 Đại Học Cần Thơ.</p>
		</div>
	</body>
	<script src="fontend_admin/bootstrap/js/bootstrap.min.js"></script>
	<script>
		
	</script>
</html>
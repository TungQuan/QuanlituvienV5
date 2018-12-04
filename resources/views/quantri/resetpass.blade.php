<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Quản Trị Admin</title>
		<base href="{{ asset('') }} ">
		<link href="fontend_admin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		
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
				margin-top: 5px;
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
				min-height: 160px auto;
				color: #FFFFFF;
				text-align: center;
				margin-top: 155px;
		}
		.textnote{
			margin-top: 50px;
			font-size: 18px;
			font-weight: bold;
				margin-left: 195px;
		}
		a{
			margin-left: 195px;
			font-size: 16px;
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
			<p class="textnote">Vui lòng nhập  email để lấy lại mật khẩu.<p>
				<div class="row">
					<div class="col-md-8 col-md-offset-2 form">
						<div class="login-panel panel panel-default">
							<div class="panel-body">
								<form role="form" action="quantri/sendpass" method="POST">
									{!! csrf_field() !!}
									<fieldset>
										<div class="form-group">
											<label for="email">Địa Chỉ Email: </label>
											<input class="form-control" placeholder="Nhập Email" name="email" type="email" required autofocus>
										</div>
										
										<button type="submit" class="btn btn-lg btn-success btn-block">Xác Nhận</button>
									</fieldset>
								</form>
							</div>
						</div>
					</div>
				</div>
				<a href="quantri">Quay Lại </a>
			</div>
			@if(session('thongbao'))
					<div class="alert alert-danger">
						{{session('thongbao')}}
					</div>
			@endif
			<footer class="footer">
				<p> &copy;Bản quyền thuộc về Ban Trị Sự GHPGVN Tỉnh Bà Rịa Vũng Tàu.</p>
				<p> Thiết kế bởi sinh viên CNTT-K40 Đại Học Cần Thơ.</p>
			</footer>
			<script src="fontend_admin/bootstrap/js/bootstrap.min.js"></script>
			
		</body>
		</script>
	</html>
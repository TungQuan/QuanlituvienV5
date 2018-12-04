<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Quản Trị Admin</title>
		<base href="{{ asset('') }} ">
		<link rel="stylesheet" href="fontend_admin/bootstrap/css/bootstrap.min.css">
		<script src="fontend_admin/jquery/jquery.min.js"></script>
		<script src="fontend_admin/bootstrap/js/bootstrap.min.js"></script>
		<script>
			$(document).ready(function() {
				$('#btn_change_email').click(function () {
					$(location).attr('href','quantri/checkpassforchangeemail');
				});
			});
		</script>
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
				margin-top: 190px;
		}
		.form{
			margin-top: 30px;}
		.resetpass{
			float: right;
			cursor: pointer;
			padding-top: 15px;
		}
		.userinfo{
			float: right;
			font-size: 16px;
			margin-top:20px;
			margin-right: 70px;
			cursor: pointer;
			text-decoration: underline;
		}
		.username{
			text-align: right;
			margin-left: 120px;
		}
		.username:hover, .username{
				color: #FF8000;
		}
		.dropdown{
			position: relative;
			display: inline-block;
		}
		.dropdown-content {
			display: none;
			position: absolute;
			background-color: #f9f9f9;
			min-width: 180px;
			box-shadow: 0px 8px 16px 0px ;
			z-index: 1;
			margin-top:1px;
		
		}
		.dropdown-content a {
			color: black;
			padding: 12px 16px;
			text-decoration: none;
			display: block;
		}
		.dropdown-content a:hover {background-color: #f1f1f1}
		.dropdown:hover .dropdown-content {
				display: block;
		}
		.menu-admin a{
			text-decoration: none;
				color: black;
		}
		.menu-admin a .profile:hover{
			color:  #FF8000;
		}
		a span.active{
			color:  #FF8000;
		}
		.menu-admin a .profile, span.edituser{
			cursor: pointer;
		}
		.lev1 {
		
			margin-top:15px;
			display: block;
		}
		.menu-profile a, .menu-user a{
			display:block;
			margin-left: 50px;
			margin-top: 5px;
		}
		.menu-user{
			/*display: none;*/
		}
		.user64-left{
			float: left;
		}
		.user-right{
			float: right;
			line-height: 0.5;
			display: block;
		}
		.user64-right a {
			text-decoration: none;
		}
		a.uname{
			margin-left: 10px;
			margin-top: 5px;
			font-weight: bold;
			font-size: 16px;
			color:black;
			
		}
		a.edit14{
			margin-left: 20px;
			display: block;
			color: grey;
		}
		.userinfo-row-left{
			margin-top: 30px;
			margin-left: 20px;
		}
		.left-content{
			margin-top: 20px;
			margin-left: 20px;
			
		}
		.right-content{
			
		}
		.border-bot{
			margin-top: 15px;
			border-bottom: 1px solid #efefef;
		}
		.userinfo-row-right{
			margin-top: 30px;
			padding-left: 10px; ;
			line-height: 0.6;
		}
		.row1{
			margin-top: 15px;
		}
		.row2, .row3{
			margin-top:20px;
		}
		.col1, .col3,.col5 {
			text-align: right;
			color: grey;
		}
		div.btn-change-email{
			margin-left: 30px;
			margin-top: 20px;
			padding-bottom: 20px;
			font-size: 14px;
		}
		a.view-role-admin-lev0{
			cursor: pointer;
			text-decoration: underline;
		}
		div.captinh{
			margin-top: 15px;
		}
		div.caphuyen, div.capxa, div.capchua, div.nguoidungthuong{
			margin-left: 15px;
			margin-top: 15px;

		}
		button.button:hover{
			font-weight: bold;
		}
		button.activebutton{
			background-color: #ff8000; color: #fff;
		}
		button.activebutton:hover{
			background-color: #ff8000; color: #fff;
		}
		div.table{
			margin-top: 15px;
			padding-left: 10px;
			padding-right: 15px;
		}
		div.table thead{
			font-weight: bold;
		}
		 span.help_admin_caphuyen{
		 	cursor: pointer;
		 	color: blue; 
		 	text-decoration: underline;
		}
		 span.help_admin_caphuyen:hover{
		 	font-weight: bold;
		 }
		</style>
	</head>
	<body  style="background-color: #f5f5f5">
		<div class="container-fluid" >
			<div class="row">
				<div class=" userinfo dropdown ">
					@foreach($quantri as $qt)
					<a class="username">{{$qt->username}} <span class="caret"></span></a>
					<div class="dropdown-content">
						<a href="quantri/quanli">Thông Tin Cá Nhân</a>
						<a href="quantri/logout">Đăng Xuất</a>
						<a href="#">Cài Đặt</a>
					</div>
				</div>
				<div class="title" >
					<a class ="logo" href="#"><img src="fontend_admin/image/logo.png" width="90px"></a>
					<div class="text">
						<h2 style="margin-bottom: 5px;">Hệ Thống Quản Lý Hồ Sơ Phật Giáo</h2>
						<h3>Tỉnh Bà Rịa Vũng Tàu</h3>
					</div>
					
				</div>
				
			</div>
			<div class="row">
				<div class="col-md-2">
					<div class="userinfo-row-left">
						<img class="user64-left" src="fontend_admin/image/user64.png" width="48px" height="48px">
						<div class="user64-right">
							<a class="uname">{{$qt->username}}</a>
							<a class="edit14" href="quantri/quanli">&nbsp;<img src="fontend_admin/image/edit14.png"><span class="edituser">&nbsp;Sửa Hồ Sơ</span></a>
						</div>
					</div>
				</div>
				<div class="col-md-10">
					<div class="userinfo-row-right" >
						<h4>Danh Sách Người Dùng</h4>
						<p>Thông tin về tài khoản của tất cả người dùng trong hệ thống</p>
					</div>
				</div>
			</div>
			<div class="border-bot"></div>
			<div class="row">
				<div  class="col-md-2">
					<div class="left-content">
						<div class="menu-admin">
							<a class="lev1" id="profile-manager"><img src="fontend_admin/image/user16.png" width="24px" height="24px"><span class="profile">&nbsp;&nbsp;Tài Khoản Cá Nhân</span></a>
							<div class="menu-profile">
								<a href="quantri/quanli"><span class="profile ">Hồ Sơ</span></a>
								<a href="quantri/hoso/doimatkhau"><span class="profile">Đổi Mật Khẩu</span></a>
							</div>
							<a class="lev1" id="user-manager"><img src="fontend_admin/image/list16.png" width="24px" height="24px"><span class="profile">&nbsp;&nbsp;Quản Lí User</span></a>
							<div class="menu-user">
								<a href="quantri/quanliuser/danhsachuser"><span class="profile active">Danh Sách</span></a>
								<a href="quantri/quanliuser/phanquyenuser"><span class="profile">Phân Quyền</span></a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-10 ">
					<div class="right-content">
						<div class="row">
							<div class="col-md-2 captinh"><a href="quantri/quanliuser/danhsachuser"><button class="btn btn-primary button " type="button">Quản Lí Cấp Tỉnh</button></a></div>
							<div class="col-md-2 caphuyen"><a href="quantri/quanliuser/usercaphuyen"><button class="btn btn-primary button activebutton" type="button">Quản Lí Cấp Huyện</button></a></div>
							<div class="col-md-2 capxa"><a href="quantri/quanliuser/usercapxa"><button class="btn btn-primary button" type="button">&nbsp;Quản Lí Cấp Xã &nbsp; </button></a></div>
							<div class="col-md-2 capchua" ><a href="quantri/quanliuser/usercaptuvien"><button class="btn btn-primary button" type="button">Quản Lí Cấp Tự Viện</button></a></div>
							<div class="col-md-2 nguoidungthuong"><a href="quantri/quanliuser/userthuong"><button class="btn btn-primary button" type="button">&nbsp;Người Dùng Thường &nbsp;</button></a></div>
						</div>
						<div class="row">
							<div class="table">
								<table class="table table-hover table-bordered table-striped">
									<thead>
										<tr>
											<td>STT</td>
											<td>Pháp Danh</td>
											<td>Tự Viện</td>
											<td>Tài Khoản</td>
											<td>Email</td>
											<td>Đổi Mật Khẩu</td>
											<td>Vô Hiệu</td>
										</tr>
									</thead>
									<tbody>
										 @php $i =1; @endphp
                        				 @foreach($usercaphuyen as $caphuyen)
											<tr>
												<td>@php echo $i; $i++; @endphp</td>
												<td>{{$caphuyen->PhapDanh}}</td>
												<td>{{$caphuyen->TuVien_Ten}}</td>
												<td>{{$caphuyen->username}}</td>
												<td>{{$caphuyen->email}}</td>
												<td><a href="quantri/quanliuser/resetpass/{{$caphuyen->user_id}}">Đổi Mật Khẩu</a></td>
												<td><a href="quantri/quanliuser/disamble/{{$caphuyen->user_id}}">Vô Hiệu</a></td>
											</tr>
										@endforeach
									</tbody>
								</table>
								<div class="help"><span class="help_admin_caphuyen" id="guildline">Xem Hướng Dẫn</span></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach
			<div class="row">
				<div class="footer">
					<p> &copy;Bản quyền thuộc về Ban Trị Sự GHPGVN Tỉnh Bà Rịa Vũng Tàu.</p>
					<p> Thiết kế bởi sinh viên CNTT-K40 Đại Học Cần Thơ.</p>
				</div>
			</div>
		</div>
	</body>
</html>
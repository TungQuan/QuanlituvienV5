@extends('admin.homelayout.index')
@section('content')
<!-- Style -->
<style type="text/css">
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
<!-- Page Content -->
<div id="page-wrapper" style="background-color: #e7e8e9">
	<div class="container-fluid" >
			<div class="row" >
				<nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Thêm tự viện</li>
                </ol>
            </nav>
			</div>
			<!-- /.col-lg-12 form thong tin -->
				<div class="row ">
					<div class="col-md-12" >
						<p class="title">Nhập Thông Tin Tự Viện</p>
					</div>
				</div>
				<div id="backgroundform">
					<div class="row" id="form">
						<form class="form-horizontal" action="#" method="#">
							<!--  form thong tin năm sinh-->
							<div class="form-group">
								<label class="control-label col-sm-4 " for="inputName">
								Tên Tự Viện:</label>
								<div class="col-sm-4">
									<input type="text" class="form-control " id="inputName" name="name" placeholder="Nhập Tên Tự Viện" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4 " for="inputTrutri" >Sư Trụ Trì</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" id="inputTrutri" name="trutri" placeholder="Nhập Vào Pháp Danh" required>
								</div>
							</div>
							<!--  form thong tin Dia Chih-->
							<div class="form-group">
								<label class="control-label col-sm-4 " for="address" >Địa Chỉ</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" id="inputAddress" name="name" placeholder="Nhập Địa Chỉ Cụ Thể" required>
								</div>
							</div>
							<!--  form đia chỉ-->
							<div class="form-group">
								<label class="control-label col-sm-4" for="quanhuyen">Quận Huyện: </label>
								<div class="col-sm-4">
									<select class="form-control" id="quanhuyen" required>
										<option>    -------Chọn Quận-Huyện-Thành Phố-------</option>
										<option>Quận Long Điền</option>
										<option>Thành Phố Bà Rịa</option>
										<option>Thành Phố Vũng Tàu</option>
										<option>Huyện Châu Thành</option>
									</select>
								</div>
							</div>
							<!--  form thong tin Xa phuong -->
							<div class="form-group">
								<label class="control-label col-sm-4" for="xaphuong">Xã Phường: </label>
								<div class="col-sm-4">
									<select class="form-control" id="xaphuong" required>
										<option>     -------Chọn Xã Phường-------</option>
										<option>Phường 1</option>
										<option>Phường 2</option>
										<option>Xã Long Điền</option>
										<option>Xã Hòa Hưng</option>
									</select>
								</div>
							</div>
							<!--  form thong tin mail-->
							<div class="form-group">
								<label class="control-label col-sm-4 " for="phone">Số Điện Thoại:</label>
								<div class="col-sm-4">
									<input type="text"class="input-large bfh-phone" id="phone" data-format="+84 (dddd) ddd-dddd">
								</div>
							</div>
							<!--  form thong tin SDT-->
							<!-- button -->
							<div class="form-group">        
						      <div class="col-sm-offset-2 col-sm-8" align="center" style="margin-bottom: 20px">
						        <button type="button" class="btn btn-warning"><b>Đồng Ý</b></button>
						        <button type="reset" class="btn btn-danger"><b>Nhập lại</b></button>
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
<!-- /#page-wrapper -->
@endsection
@extends('admin.homelayout.index')
@section('content')
<!-- Style -->
<style type="text/css">
	.title{
		background-color: #DF3A01 ; 
		text-align: center; 
		border-radius: 100px 100px 0px  0px ;
		color: #FFFFFF; 
		font-family: arial;
		font-size: 30px;
		margin-bottom: : 0px;
	}
	.title-td{
		background-color: #FE9A2E ; 
		text-align: center;
		color: #FFFFFF;
		font-size: 20px; 
		border-radius: 5px 5px;
		font-weight: bold;
	}

</style>
<!-- Page Content -->
<div id="page-wrapper" style="font-family: arial; background-color: #e7e8e9 ">
    <div class="container-fluid" ">
        <div class="row">
        	<nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="admin/tangni/danhsachtangni">Danh sách tăng ni</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Hồ sơ cá nhân</li>
                </ol>
            </nav>
            </div>
            <div class="row">
            <div class="col-lg-12">
            	<table class="table table-striped">
				    <thead>
				      <tr>
				        <td colspan="4" class="title">Thông Tin Tăng Ni</td>
				      </tr>
				    </thead>
				    <tbody>
				    	<tr>
				        <td colspan="4" class="title-td">Lý Lịch</td>
				      </tr>
				      <tr>
				        <td width="25%" style="text-align: right;">Họ Tên</td>
				        <td width="25%"><b>Trần Văn A</b></td>
				        <td width="25%" style="text-align: right;">Pháp Danh</td>
				        <td width="25%"><b>Thích ... ...</b></td>
				      </tr>
				      <tr>
				        <td width="25%" style="text-align: right;">Giới Tính</td>
				        <td width="25%"><b>Nam</b></td>
				        <td width="25%" style="text-align: right;">Giới Phẩm</td>
				        <td width="25%"><b>Sadi</b></td>
				      </tr>
				      <tr>
				        <td width="25%" style="text-align: right;">Trình Độ</td>
				        <td width="25%"><b>12/12</b></td>
				        <td width="25%" style="text-align: right;">Giáo Phẩm</td>
				        <td width="25%"><b>Đại Đức</b></td>
				      </tr>
				      <tr>
				        <td width="25%" style="text-align: right;">Số CMND</td>
				        <td width="25%"><b>123456789</b></td>
				        <td width="25%" style="text-align: right;">Mã Tăng Tịch</td>
				        <td width="25%"><b>123456789</b></td>
				      </tr>
				      <tr>
				        <td width="25%" style="text-align: right;">Ngày Tháng Năm Sinh</td>
				        <td width="25%"><b>01/01/1995</b></td>
				        <td width="25%" style="text-align: right;">Ngày Tháng Năm Xuất Gia</td>
				        <td width="25%"><b>DD/MM/YY</b></td>
				      </tr>
				      <tr>
				        <td width="25%" style="text-align: right;">Tôn Giáo</td>
				        <td width="25%"><b>Kinh</b></td>
				        <td width="25%" style="text-align: right;">Tôn Giáo</td>
				        <td width="25%"><b>Kinh</b></td>
				      </tr>
				      <tr>
				        <td width="25%" style="text-align: right;">Quê Quán</td>
				        <td width="25%"><b>H.Mỹ Xuyên - T.Sóc Trăng</b></td>
				        <td width="25%" style="text-align: right;">Nơi Xuất Gia</td>
				        <td width="25%"><b>T.Bà Rịa - Vũng Tàu</b></td>
				      </tr>
				      <!-- lien he -->
				      <tr>
				        <td colspan="4" class="title-td">Liên Hệ</td>
				      </tr>
				      <tr>
				        <td style="text-align: right;">Địa Chỉ</td>
				        <td><b>H.Mỹ Xuyên - T.Sóc Trăng</b></td>
				        <td style="text-align: right;">Tu Viện</td>
				        <td><b>T.Bà Rịa - Vũng Tàu</b></td>
				      </tr>
				      <tr>
				        <td style="text-align: right;">Số Điện Thoại</td>
				        <td><b>09xx 123456</b></td>
				        <td style="text-align: right;">Hotline Tu Viện</td>
				        <td><b>09xx 321654</b></td>
				      </tr>
				      <tr>
				        <td style="text-align: right;">Email</td>
				        <td><b>abv@gmail.com</b></td>
				        <td style="text-align: right;">Email Tu Viện</td>
				        <td><b>TuVien@gmail.com</b></td>
				      </tr>
				      <!-- Thành Tích -->
				      <tr>
				        <td colspan="4" class="title-td">Thành Tích</td>
				      </tr>
				      <tr>
				        <td style="text-align: right;">Tấn Phong Giáo Phẩm</td>
				        <td><b>Không</b></td>
				        <td style="text-align: right;">Tuổi Đạo</td>
				        <td><b>5</b></td>
				      </tr>
				    </tbody>
				</table>

            </div>
        </div>

            <!-- /.col-lg-12 form thong tin -->
        </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
@extends('admin.homelayout.index')
@section('content')
<!-- Style -->
<style type="text/css">
	.title{
		background-color: #B40404; 
		text-align: center; 
		margin-top: 10px; 
		margin-bottom: 0px ; 
		border-radius: 50px 50px 0px 0px;
		color: #FFFFFF; 
		font-family: arial; 
		font-size: 30px
	}
	.title-form{
		background-color: #DF3A01 ; 
		text-align: center; 
		border-radius: 0px 40px 0px  40px;
		color: #FFFFFF;
		font-family: arial;
		font-size: 25px;
	}
	.title-form-1{
		background-color: #DF3A01 ; 
		text-align: center; 
		border-radius: 0px 0px 30px  30px;
		color: #FFFFFF;
		font-family: arial;
		font-size: 25px;
	}
	.title-table{
		margin-left: 80px;
		border-radius: 5px; 
		text-align: center;
		color: #FFFFFF;
		font-size: 17px;

	}
	.title-tr1{ 
		background-color: #B40404;
		text-align: center; 
		font-family: arial; 
		font-size: 17px;
		margin-left: 30px;
	}
	.title-tr2{ 
		margin-left: 30px;
		color: black;
	}



</style>
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid" >
                <div class="row">
                    <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Thêm tăng ni</li>
                </ol>
            </nav>
                    <div class="col-lg-12"><p class="title">Thêm Tăng Ni</p></div>
                    
                    
				</div>
		<form class="form-horizontal" action="#" method="#" style="background-image: url(fontend_admin/image/bg-middle.jpg); border-radius: 10px">
		    <!--  form thong tin năm sinh-->
		    <p class="title-form-1">Lý Lịch</p>
		    <div class="form-group">
		      <label class="control-label col-sm-4" for="name" >Họ Tên:</label>
		    <div class="col-sm-4">
		        <input type="name" class="form-control" id="name" name="name" placeholder="--- Nhập Họ Tên ---" required>
		    </div>
		   </div>
		   <!--  form thong tin gioi tinh-->
		    <div class="form-group">
		      <label class="control-label col-sm-4" for="name" >Giới Tính:</label>
		    <div class="col-sm-4">
				<input name="gioitinh" type="radio" value="Nam" /> Nam 
				<input name="gioitinh" type="radio" value="Nữ" /> Nữ
		    </div>
		   </div>
		    <!--  form thong tin năm sinh-->
		    <div class="form-group">
		      <label class="control-label col-sm-4" for="namsinh">Ngày, tháng, năm sinh:</label>
		      <div class="col-sm-4">
		        <input type="date" class="form-control" id="namsinh" name="namsinh" required>
		      </div>
		    </div>
		    <!--  form thong tin năm sinh-->
		    <div class="form-group">
		      <label class="control-label col-sm-4" for="cmnd">Số CMND:</label>
		      <div class="col-sm-4">
		        <input type="text" class="form-control" id="cmnd" name="cmnd" placeholder="--- Nhập số chứng minh nhân dân ---" required>
		      </div>
		    </div>
		    <!--  form thong tin dia chi-->
		    <div class="form-group">
		      <label class="control-label col-sm-4" for="diachi">Địa Chỉ:</label>
		      <div class="col-sm-4">
		        <input type="text" class="form-control" id="diachi" name="diachi" placeholder="--- Nhập địa chỉ ---" required>
		      </div>
		    </div>
		     <!--  form thong tin ton giao-->
		    <div class="form-group">
		      <label class="control-label col-sm-4" for="tongiao">Tôn Giáo:</label>
		    <div class="col-sm-4"> 
				  <select class="form-control" id="tongiao" required>
				    <option>Kinh</option>
				    <option>Hoa</option>
				    <option>Khơme</option>
				    <option>Khác</option>
				  </select>
		    </div>
		   	</div>	
		     <!--  form thong tin mail-->
		    <div class="form-group">
		      <label class="control-label col-sm-4" for="email">Email:</label>
		    <div class="col-sm-4">
		        <input type="email" class="form-control" id="email" name="email" placeholder="--- Nhập Email ---" required>
		    </div>
		   </div>
		     <!--  form thong tin SDT-->
		    <div class="form-group">
		      <label class="control-label col-sm-4" for="sdt">Số Điện Thoại:</label>
		    <div class="col-sm-4">
		        <input type="text" class="form-control" id="sdt" name="sdt" placeholder="--- Nhập Số Điện Thoại ---" required>
		    </div>
		   	</div>
		   	<!-- //////////////////// -->
		   	<p class="title-form">Tự Viện</p>
		   				<!--  form thong tin chọn Tu Vien-->
		    <div class="form-group">
		      <label class="control-label col-sm-4" for="name">Tự viện:</label>
		    <div class="col-sm-4">
				  <select class="form-control" id="tuvien" required>
				    <option>Tự Viện 1</option>
				    <option>Tự Viện 2</option>
				    <option>Tự Viện 3</option>
				    <option>Tự Viện 4</option>
				  </select>
		    </div>
		   </div>
		   	
		     <!--  form thong tin phap danh-->
		    <div class="form-group">
		      <label class="control-label col-sm-4" for="phapdanh">Pháp Danh:</label>
		    <div class="col-sm-4">
		        <input type="text" class="form-control" id="phapdanh" name="phapdanh" placeholder="--- Nhập Pháp Danh ---" required>
		    </div>
		   </div>
		   <!--  form thong tin Ma Tang Tich-->
		    <div class="form-group">
		      <label class="control-label col-sm-4" for="matangtich">Mã Tăng Tịch:</label>
		      <div class="col-sm-4">
		        <input type="text" class="form-control" id="matangtich" name="matangtich" placeholder="--- Nhập mã số tăng tịch ---" required>
		      </div>
		    </div>
		    <!--  form thong tin ngay/thang/nam xuất gia-->
		    <div class="form-group">
		      <label class="control-label col-sm-4" for="ngayxuatgia">Ngày, tháng, năm xuất gia:</label>
		      <div class="col-sm-4">
		        <input type="date" class="form-control" id="ngayxuatgia" name="ngayxuatgia" required>
		      </div>
		    </div>
		    		     <!--  form thong tin gioi pham-->
		    <div class="form-group">
		      <label class="control-label col-sm-4" for="gioipham">Giới Phẩm:</label>
		    <div class="col-sm-4">
		        <select class="form-control" id="gioipham" required>
				    <option>Sadi</option>
				    <option>Sadi ni </option>
				    <option>Tỳ Kheo </option>
				    <option>Tỳ Kheo ni </option>
				    <option>Tịnh Nhân Cư Sỹ</option>
				  </select>
		    </div>
		   </div>
		   		     <!--  form thong tin giao pham-->
		    <div class="form-group">
		      <label class="control-label col-sm-4" for="giaopham">Giáo Phẩm:</label>
		    <div class="col-sm-4">
		        <select class="form-control" id="giaopham" required>
				    <option>Đại Đức</option>
				    <option>Thượng Tọa </option>
				    <option>Hòa Thượng </option>
				    <option>Sư Cô</option>
				    <option>Ni Cô</option>
				    <option>Ni Trưởng</option>
				  </select>
		    </div>
		   </div>
		   <p class="title-form">Quá Trình Đào Tạo</p>
		  	<table name="qtdaotao" id="dynamic_field"  border="0px" cellpadding="0" cellspacing="0" class="title-table" >
		  		<tr class="title-tr1">
		  			<td style="width: 150px">Thời gian bắt đầu</td>
		  			<td style="width: 150px">Thời gian kết thúc</td>
		  			<td style="width: 200px">Nơi đào tạo</td>
		  			<td style="width: 200px">Nội dung</td>
		  			<td></td>
		  		</tr>
		  		<tr class="title-tr2">
		  			<td style="width: 150px">
		  				<input type="date" name="tg-batdau0">
		  			</td>
		  			<td style="width: 150px">
		  				 <input type="date" name="tg-ketthuc0">
		  			</td>
		  			<td style="width: 200px">
		  				<input type="text" name="noidaotao0" placeholder="    --- Nhập Nơi đào tạo ---" required width="350px">
		  			</td>
		  			<td style="width: 200px">
		  				<input type="text" name="noidung0" placeholder="    --- Nhập Nội dung ---" required>
		  			</td>
		  			<td><button type="button" name="add" id="add" class="btn btn-success">Thêm</button></td>  
		  		</tr>
		  	</table>
		   <!-- button -->
		    <div class="form-group">        	
		    </div>
		    <div class="form-group">
		      <input type="hidden" name="NoRow" value="">        
		      <div class="col-sm-offset-2 col-sm-8" align="center" style="margin-bottom: 20px">
		        <button id="submit" type="button" class="btn btn-warning" ><b>Đồng Ý</b></button>
		        <button type="reset" class="btn btn-danger"><b>Nhập lại</b></button>
		      </div>
		    </div>
		</form>      
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
<!-- /#page-wrapper -->
@endsection
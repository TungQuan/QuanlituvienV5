@extends('admincaptinh.layout.template')
@section('css')

<style type="text/css">
	div.right-content{
		margin-left:50px;
		margin-top:15px;
	}
	p.title-form{
		border-radius: 50px 50px 0px 0px;
		background-color:  #DF3A01;
		color: #ffffff;
		font-size: 25px;
		text-align: center;
		margin : 0px 10px 0px 10px;
		padding: 5px 0px 5px 0px;
	}
	div.backgroundform {
		border-radius: 0px 0px 50px 50px;
		background-image: url("fontend_admin/image/bg-middle.jpg");
		margin : 0px 25px 0px 25px;
		padding: 15px 0px 0px 0px;
	}
	button.insert-but{
		background-color:  #DF3A01;
		color: #ffffff;
		margin-right: 10px;
	}
	label{
		font-weight: bold;
		font-size: 16px;
	}
</style>
@endsection
@section('script')
<script type="text/javascript">
	$(".nav li.f3").children('ul').addClass("action");
	$(".nav li.f3").children('a').children('span').css("transform","rotate(-90deg)");
	$(".nav li ul").not(".action").css("display","none");
	$("#quanhuyen").change(function(data){
		var idQuanHuyen = $(this).val();
        if(idQuanHuyen !== ""){
            $.get("admincaptinh/ajax/xaphuong/"+idQuanHuyen, function(data){
                $('#xaphuong').html(data);
            });
           
        }else{
        	 $('#xaphuong').html("<option></option><option disabled>Hãy chọn quận huyện trước</option>");
        }
	});
</script>
@endsection
@section('right-content')
<div class="right-content">
	<div class="row">
		<div class="menu">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="admincaptinh/quanli">Trang chủ</a></li>
					<li class="breadcrumb-item active" aria-current="page">Thêm tự viện</li>
				</ol>
			</nav>
		</div>
	</div>
	<div class="row">
			<div class="col-md-12">
				<p class="title-form">Nhập Thông Tin Tự Viện</p>
			</div>

	</div>
	<div class="row">
		<div class="backgroundform">
			<form class="form-horizontal" action="admincaptinh/tuvien/them" method="post" enctype="multipart/form-data">
				{!! csrf_field() !!}
				@foreach($errors->all() as $error)
				<div class="alert alert-danger" style="margin: 10px 250px 10px 250px; text-align: center">
					{{$error}}
				</div>
				@endforeach
				@if(session('thongbao1'))
				<div class="alert alert-success" style="margin: 10px 250px 10px 250px; text-align: center">
					{{session('thongbao1')}}
				</div>
				@endif
				<div class="form-group">
					<label class="control-label col-md-4 " for="inputName">
					Tên Tự Viện:</label>
					<div class="col-md-4">
						<input type="text" class="form-control " name="tentuvien" placeholder="Nhập Tên Tự Viện" required>
					</div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-md-4" for="quanhuyen">Trạng Thái: </label>
					<div class="col-md-4">
						<select class="form-control" id="trangthai" name="trangthai" required>
							<option></option>
							@foreach($trangthai as $tr)
							<option value="{{$tr->trangthai_id}}">{{$tr->trangthai_ten}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<!--  form thong tin Dia Chih-->
				<div class="form-group">
					<label class="control-label col-md-4 " for="address" >Địa Chỉ</label>
					<div class="col-md-4">
						<input type="text" class="form-control" name="diachi" placeholder="Địa Chỉ Cụ Thể" required>
					</div>
				</div>
				<!--  form đia chỉ-->
				<div class="form-group">
					<label class="control-label col-md-4" for="quanhuyen">Quận Huyện: </label>
					<div class="col-md-4">
						<select class="form-control" id="quanhuyen" name="quanhuyen" required>
							<option></option>
							@foreach($quanhuyen as $qh)
							<option value="{{$qh->quanhuyen_id}}">{{$qh->quanhuyen_ten}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<!--  form thong tin Xa phuong -->
				<div class="form-group">
					<label class="control-label col-md-4" for="xaphuong">Xã Phường: </label>
					<div class="col-md-4">
						<select class="form-control" id="xaphuong" name="xaphuong" required>
							<option></option>
							<option disabled>Hãy Chọn Quân Huyện Trước</option>
						</select>
					</div>
				</div>
				<!--  form thong tin mail-->
				<div class="form-group">
					<label class="control-label col-md-4 " for="phone">Số Điện Thoại:</label>
					<div class="col-md-4">
						<input type="tel" name="phone" class="phone form-control" placeholder="Số điện thoại">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-4 " >Email</label>
					<div class="col-md-4">
						<input type="email" class="form-control" name="email" placeholder="email( không bắt buộc)">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-4 ">Hình Ảnh (Jpeg, png, size < 2MB)</label>
					 
					<div class="col-md-4">
						<input type="file" class="form-control-file form-control-file-lg image" name="image"><p style="margin-top: 5px">(Không bắt buộc)</p>
					</div>
				</div>

				<!-- button -->
				<div class="form-group">
					<div class="col-md-offset-2 col-md-8" align="center" style="margin-bottom: 20px">
						<button type="submit" class="btn btn-basic insert-but">Thêm Tự Viện</button>
						<button type="reset" class="btn btn-primary reset-but"> &nbsp;Nhập Lại &nbsp;</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
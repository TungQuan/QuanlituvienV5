@extends('admincaptinh.layout.template')
@section('css')
<style type="text/css">
	div.right-content{
		margin-left:50px;
		margin-top:15px;
        position: relative;
	}
	div.background-detail-tuvien{
		
		margin-right: 50px;
		margin-left: 40px;
		border: 2px solid #ff8000;
		background-color: #ffffff;

	}
	div.box-image-detail-tuvien{
		margin-left: 150px;
		margin-top:15px;

	}
	div.box-info-detail-tuvien{
		margin-left:10px;
		margin-top:20px;
	}
	div.title-thongke{
		border-radius: 50px 50px 50px 50px;
		background-color: #ff8000;
		color: #fff;
		text-align: center;
		font-size: 20px;
		margin-right: 150px;
		margin-left: 150px;
		margin-top: 20px;
	}
	div.soluongtangni{
		text-align: center;
		font-size: 16px;
	}
	div.soluong-giaopham{
		float: left;
		margin-left: 150px;
	}
	div.soluong-gioipham{
		position: relative;
		float: right;
		margin-right: 150px;
	}
	p.title-gioipham{
		border-radius: 50px 50px 50px 50px;
		background-color: #ff8000;
		font-size: 16px;
		color: #fff;
		text-align: center;
	}
	p.title-giaopham{
		border-radius: 50px 50px 50px 50px;
		background-color: #ff8000;
		font-size: 16px;
		color: #fff;
		text-align: center;
	}
	.td_namefield{
		font-weight: bold;
	}

</style>
@endsection
@section('script')
<script type="text/javascript">
$(".nav li.f3").children('ul').addClass("action");
	$(".nav li.f3").children('a').children('span').css("transform","rotate(-90deg)");
	$(".nav li ul").not(".action").css("display","none");
</script>
@endsection
@section('right-content')
<div class="right-content">
	<div class="row">
		<div class="menu">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="admincaptinh/quanli">Trang chủ</a></li>
					<li class="breadcrumb-item active" aria-current="page">Danh sách tự viện</li>
				</ol>
			</nav>
		</div>
	</div>
	<div class ="row">
		@foreach($tuvien as $tv)
		<div class="background-detail-tuvien">
			<div class="row">
				<div class="col-md-4">
					<div class="box-image-detail-tuvien">
						<img src="fontend_admin/image/tuvien/{{$tv->image}}"height="180px"
							width="180px" >
					</div>
				</div>
				<div class="col-md-7">
					<div class="box-info-detail-tuvien">
						<div class="nametuvien">
							<label>Tên Tự Viện: </label>
							<span>{{$tv->tuvien_ten}}</span>
						</div>
						<div class="trutri">
							<label>Trụ Trì: </label>
							
						</div>
						<div class="trangthai">
							<label>Trạng Thái: </label>
							<span>{{$tv->trangthai_ten}}</span>
						</div>
						<div class="sodienthoai">
							<label>Số Điện Thoại: </label>
							<span>{{$tv->phone}}</span>
						</div>
						<div class="email">
							<label>Email: </label>
							<span>{{$tv->email}}</span>
						</div>
						<div class="diachi">
							<label>Đia chỉ: </label>
							<span>{{$tv->diachi}} - {{$tv->xaphuong_ten}} - {{$tv->quanhuyen_ten}} - Bà Rịa vũng Tàu</span>
						</div>
						<a href="admincaptinh/tangni/danhsach/{{$tv->tuvien_id}}">Xem danh sách Tăng Ni</a>
				</div>
			</div>

			</div>
			<div class="row">
				<div class="title-thongke">
					<p>Thống Kê Chi Tiết</p>
				</div>
				<div class="soluongtangni">
					<lable><strong>Số Lượng Tăng Ni:&nbsp;&nbsp;</strong></lable>
					<span>{{$count}}</span>
				</div>
				<div class="soluong-gioi-giao-pham">
					<div class="soluong-giaopham">
						<p class="title-giaopham">Giáo Phẩm</p>
						<table class="table table-bordered">
							<tbody>
								@foreach($giaopham as $gp)
								<tr>
									<td class="td_namefield">{{$gp->giaopham_ten}}</td>
									
									<td>{{$gp->soluonggiaopham}}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div> 
					 <div class="soluong-gioipham">
						<p class="title-gioipham">Giới Phẩm</p>
						<table class="table table-bordered">
							
							<tbody>
								@foreach($gioipham as $gp)
								<tr>
									<td class="td_namefield">{{$gp->gioipham_ten}}</td>
									
									<td>{{$gp->soluonggioipham}}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
					
				</div>
			</div>
		</div>
		@endforeach
	</div>
@endsection
@extends('admincaptinh.layout.template')
@section('css')
<style type="text/css">
	div.right-content{
		margin-left:50px;
		margin-top:15px;
	}
	div.frame-filter{
		background-color:#acb0b1;
		margin-right: 0px;
		margin-left: 0px;
	}
	div.frame{
		padding-top: 10px;
	}
	div.background-thongke{
		background-color: #ffffff;
		margin-left: 1px;
		margin-right: 1px;
	}
	.trung{
		border: 1px solid transparent !important;
	}
	div.gioipham{
		float: left;
		margin-left: 20px;
	}
	div.giaopham{
		float: right;
	}
	div.tangni-thongke{
		float: left;
		padding-right: 50px; 
		border-right: 2px solid #ff8000;
		margin-top: -10px;
		margin-left: 2px;
		padding-top: 25px;
		padding-bottom: 40px;

	}
	div.tuvien-thongke{
		float:right;
		padding-right: 0px;
		padding-top: 30px;
		margin-right: 10px;
		

	}
	div.title-thongke{
		background-color: #ff8000;
		color: #fff;
		font-size: 18px;
		text-align: center;
		margin-top: 10px;
		margin-left: 100px;
		margin-right: 100px;
	}
	div.content-thongke{
		margin: 0px 100px 0px 100px;
		border: 1px solid #ff8000;
	
	}
	p.tangni{
		float:left;
		border-right: hidden !important;
	
	}
	p.tuvien{
		float:right;
		
	}
	p.tangni, p.tuvien{
		border: 2px solid #ff8000;
		width: 50%;
		font-size: 16px;
		text-align: center;
		font-weight: bold;
		padding-top: 2px;
		padding-bottom: 2px;
	
	}
	div.tangni-tuvien{
		margin-left:100px;
		margin-right:100px;
	}
	span.normal{
		font-weight: normal !important;
	}
	div.tangni-tuvien-thongke{
		border: 1px solid #ff8000;
	}
	div.content-thongke{
		border: 2px groove #ff8000;
	}
	div.title-gioipham, div.title-giaopham, div.title-trangthai{
		border: 1px solid;
		background-color: #ff8000;
		color: #fff;
		text-align: center;
	}
	
	div.trangthai{
		margin-right: 100px;
	}
	a.list{
		cursor: pointer;
	}
	div#table-trangthai-show{
		margin-left: 60px;
		margin-right: 60px;
		margin-top: 10px;
	}

</style>
@endsection
@section('script')
<script type="text/javascript">
	$(".nav li.f3").children('ul').addClass("action");
	$(".nav li.f3").children('a').children('span').css("transform","rotate(-90deg)");
	$(".nav li ul").not(".action").css("display","none");
	
	function statisticAjax(arg_quanhuyenid, arg_xaphuongid){
		
		var quanhuyen_id = arg_quanhuyenid;
		var xaphuong_id = arg_xaphuongid;
		//alert(quanhuyen_id+""+xaphuong_id);
		/*if(xaphuong_id === 0){*/
			//alert("thuv hien");
			$.get("admincaptinh/ajax/soluongtuvien/"+quanhuyen_id+"/ward/"+xaphuong_id,function(data){

				$("#sltuvien").html(data);
				//alert("thuv hien");
			});

			
			$.get("admincaptinh/ajax/soluongtangni/"+quanhuyen_id+"/ward/"+xaphuong_id,function(data){
				$("#sltangni").html(data);
			});
			$.get("admincaptinh/ajax/danhsachgioipham/"+quanhuyen_id+"/ward/"+xaphuong_id,function(data){

				$("#table-gioipham").html(data);
			});
			
			$.get("admincaptinh/ajax/danhsachgiaopham/"+quanhuyen_id+"/ward/"+xaphuong_id,function(data){
				$("#table-giaopham").html(data);
			});
			$.get("admincaptinh/ajax/danhsachtrangthai/"+quanhuyen_id+"/ward/"+xaphuong_id,function(data){
				$("#table-trangthai").html(data);
				$(".listtuvien").css("cursor","pointer");
			});

		/*}		
		else{
			
		}*/
	}
	$("#district").change(function(){

		var quanhuyenid = $(this).val();
		var name = $("#district option:selected").text();
		if(quanhuyenid !== "none"){
			 $.get("admincaptinh/ajax/xaphuong/"+quanhuyenid, function(data){
                $('#ward').html(data);
            });
		}
		else{
			$('#ward').html("<option value='none1'></option><option value='none' disabled>--Hãy chọn quận huyện trước--</option>");
		}
		if(quanhuyenid !== "none"){
			var text = "Thống Kê Cho "+name
				$("#label-thongke").text(text);
			statisticAjax(quanhuyenid,0);
		}
		else{
			location.reload();
		}
		$("#table-trangthai-show").html("");
		
	});
	$("#ward").change(function(){
	
		var xaphuongid = $(this).val();
		var quanhuyenid = $("#district option:selected").val();
		var name_huyen = $("#district option:selected").text();
		var name_xa = $("#ward option:selected").text();
		if(xaphuongid !== "none"){
			var text = "Thống Kê Cho "+name_xa+", "+name_huyen;
				$("#label-thongke").text(text);
			statisticAjax(quanhuyenid,xaphuongid);
		}
		else{
			var text = "Thống Kê Cho "+name_huyen
				$("#label-thongke").text(text);
			statisticAjax(quanhuyenid,0);	
		}
		$("#table-trangthai-show").html("");
	});
	
	$.get("admincaptinh/ajax/quanhuyen",function(data){
		$("#district").html(data);
	});
	$(".listtuvien").css("cursor","pointer");
</script>
@endsection
@section('right-content')
<div class="right-content">
	<div class="row">
		<div class="menu">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="admincaptinh/quanli">Trang chủ</a></li>
					<li class="breadcrumb-item active" aria-current="page">Thống Kê Tự Viện</li>
				</ol>
			</nav>
		</div>
	</div>
	<div class="row frame-filter">
		<div class="frame">
			<div class="col-md-6">
				<div class="form-group">
					<label>Quận Huyện</label>
					<select name="district" class="form-control" id="district">
						<option value="none"></option>
					</select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Xã Phường</label>
					<select name="ward" class="form-control" id="ward">
						<option value="none"></option>
						<option value="none1" disabled>--Hãy chọn quận huyện trước--</option>
					</select>
				</div>
			</div>
			
		</div>
	</div>
	<div class="row background-thongke">
		
		<div class="title-thongke">
			<label id="label-thongke">Thống Kê Cho Tỉnh Bà Rịa - Vũng Tàu</label>
		</div>
		<div class=" tangni-tuvien">
			<p class=" tangni">Tăng Ni: <span id="sltangni" class="normal">{{$soluongtangni}}</span></p>
			<p class=" tuvien">Tự Viện: <span  id="sltuvien"class="normal">{{$soluongtuvien}}</span></p>
		</div>
		<div class=" row content-thongke">
			<div class=" col-md-6 tangni-thongke">
				<div class="giaopham-gioipham">
					<div class="gioipham">
						<div class="title-gioipham">
							<label class="gioipham">Giới Phẩm</label>
						</div>
						<div id="table-gioipham">
						<table class="table table-bordered table-gioipham">
							@foreach($gioipham as $gp)
							<tr>
								<td><strong>{{$gp->gioipham_ten}}</strong></td>
								<td>{{$gp->soluonggioipham}}</td>
							</tr>
							@endforeach
						</table>
						</div>
					</div>
					<div class="giaopham">
						<div class="title-giaopham">
							<label class="giaopham">Giáo Phẩm</label>
						</div>
						<div id="table-giaopham">
						<table class="table table-bordered table-giaopham" >
							@foreach($giaopham as $gp)
							<tr>
								<td>{{$gp->soluonggiaopham}}</td>
								<td><strong>&nbsp;{{$gp->giaopham_ten}}&nbsp;</strong></td>
							</tr>
							@endforeach
						</table>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-md-5 tuvien-thongke">
				<div class="row">
					<div class="trangthai">
						<div class="title-trangthai">
							<label>Trạng Thái</label>
						</div>
						<div id="table-trangthai">
						<table class="table table-bordered table-trangthai">
							@foreach($trangthai as $tt)
							<tr>
								<td><strong>{{$tt->trangthai_ten}}</strong></td>
								<td>{{$tt->soluongtrangthai}}</td>
								<td align="center"><a class="listtuvien">Danh Sách</a></td>
							</tr>
							@endforeach
						</table>
						</div>
					</div>
				</div>
				
			</div>
			
		</div>
		<div id="table-trangthai-show">
			
		</div>
	</div>
</div>
@endsection
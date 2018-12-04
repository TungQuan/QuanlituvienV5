@extends('admincaptinh.layout.template')
@section('css')
<style type="text/css">
div.right-content{
margin-left:50px;
margin-top:15px;
}
.title-thead{
background-color: #DF3A01;
color: #FFFFFF;
font-size: 18px;
text-align: center;
border-radius: 20px 20px 0px 0px;
font-weight: bold;
}
.download{
color: #DF3A01;
padding:5px 0px 5px 0px;
}
.tbody{
background-color: white;
}
.tbody tr:hover{
font-weight: bold;
}
.center{
text-align: center;
}
</style>
@endsection
@section('script')
    <script type="text/javascript">

    $(".nav li.f4").children('ul').addClass("action");
    $(".nav li.f4").children('a').children('span').css("transform","rotate(-90deg)");
    $(".nav li ul").not(".action").css("display","none");
</script>
@endsection
<!-- Page Content -->
@section('right-content')
<div class="right-content">
            <div class="row">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Danh sách thông báo</li>
                    </ol>
                </nav>
                
            </div>
            <!-- /.col-lg-12 -->
            <div class="row">
                <div >
                    <table class="table table-bordered table-hover">
                        
                        <thead class="title-thead">
                            <tr>
                                <th class="center">STT</th>
                                <th >Tên Văn Bản</th>
                                <th>Công Văn Số</th>
                                <th>Ngày Nhận</th>
                                <th>Nơi phát hành</th>
                                <th>Nội dung tóm tắt</th>
                                <th>Ghi Chú </th>
                                <th class="center">Tải Về</th>
                            </tr>
                        </thead>
                        <tbody class="tbody">
                            <?php $i=0; ?>
                            @foreach($vanban as $vb)
                            <?php $i++;?>
                            <tr>
                                <td class="center">{{$i}}</td>
                                <td>{{$vb->tenvanban}}</td>
                                <td>{{$vb->congvanso}}</td>
                                <td>{{$vb->ngaynhan}}</td>
                                <td>{{$vb->noiphathanh}}</td>
                                <td>{{$vb->noidungtomtat}}</td>
                                <td>{{$vb->ghichu}}</td>
                                <td  class="center"><a href="vanban/thongbao/{{$vb->vanban}}"><span class="glyphicon glyphicon-file fa-2x download"></span></a></td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                        
                    </table>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
<!-- /#page-wrapper -->
</div>
@endsection
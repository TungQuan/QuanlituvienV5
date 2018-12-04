@extends('admin.homelayout.index')
@section('content')
<style>
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
<!-- Page Content -->
<div id="page-wrapper" style="background-color: #e7e8e9" >
    <div class="container-fluid" >
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Danh sách tự viện</li>
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
                            <th>Ghi Chú </th>
                            <th>Ngày Nhập</th>
                            <th class="center">Tải Về</th>
                        </tr>
                    </thead>
                    <tbody class="tbody">
                        <tr>
                            <td class="center">1</td>
                            <td >Đơn Xin Xuất Gia</td>
                            <td >Ghi Chú </td>
                            <td>1/1/2005</td>
                            <td  class="center"><a href="admin/vanban/danhsachvanban/donxinxuatgia"><span class="glyphicon glyphicon-file fa-2x download"></span></a></td>
                        </tr>
                        <tr>
                            <td class="center">2</td>
                            <td >Chứng Nhận Hoạt Động Tôn Giáo</td>
                            <td >Ghi Chú </td>
                            <td>1/1/2005</td>
                            <td  class="center"><a href="admin/vanban/donxinxuatgia"><span class="glyphicon glyphicon-file fa-2x download"></span></a></td>
                        </tr>
                    </tbody>
                    
                </table>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
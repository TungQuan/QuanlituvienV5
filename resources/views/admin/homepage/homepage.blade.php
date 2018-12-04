@extends('admin.homelayout.index')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tự Viện
                            <small>Danh Sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead style="background-color: #B0C4DE; font-size: 20px; font-weight: bold">
                            <tr align="center" >
                                <th>Tự Viện ID</th>
                                <th>Tên Tự Viện</th>
                                <th>Mã Tĩnh</th>
                                <th>Trạng Thái</th>
                                <th>DS Tăng Ni</th>
                                <th>Xóa</th>
                                <th>Chỉnh sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tuvien as tv)
                                <tr class="odd gradeX" align="center" style="background-color: #F7DC6F; font-weight: bold" >
                                    <td>{{tv->TuVienID}}</td>
                                    <td>{{tv->TuVien_Ten}}</td>
                                    <td>{{tv->XaPhuongID}}</td>
                                    <td>{{tv->TrangThaiID}}</td>
                                    <td class="center"><i class="glyphicon glyphicon-list-alt" style="font-size:30px;color:green;"></i><a href="#"></a></td>
                                    <td class="center"><i class="glyphicon glyphicon-trash" style="font-size:30px;color:red;"></i><a href="#"></a></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw" style="font-size:30px;color:blue;"></i> <a href="#"></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
<!-- /#page-wrapper -->
@endsection
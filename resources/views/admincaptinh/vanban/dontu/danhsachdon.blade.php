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
@media print {
    body.modalprinter * {
        visibility: hidden;
    }

    body.modalprinter .modal-dialog.focused {
        position: absolute;
        padding: 0;
        margin: 0;
        left: 0;
        top: 0;
    }

    body.modalprinter .modal-dialog.focused .modal-content {
        border-width: 0;
    }

    body.modalprinter .modal-dialog.focused .modal-content .modal-header .modal-title,
    body.modalprinter .modal-dialog.focused .modal-content .modal-body,
    body.modalprinter .modal-dialog.focused .modal-content .modal-body * {
        visibility: visible;
    }

    body.modalprinter .modal-dialog.focused .modal-content .modal-header,
    body.modalprinter .modal-dialog.focused .modal-content .modal-body {
        padding: 0;
    }

    body.modalprinter .modal-dialog.focused .modal-content .modal-header .modal-title {
        margin-bottom: 20px;
    }
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
        <div class="col-md-6">
            
        </div>
        <div  class="col-md-2 text-right" style="padding-bottom: 10px; padding-right: 0px">
            <a href="admincaptinh/vanban/donxinxg" "email me"><button type="button" class="btn btn-success">Tạo đơn ngoài</button></a>
        </div>
        <div  class="col-md-1 text-right" style="padding-bottom: 10px; padding-right: 0px">
            <button type="button" name="add" id="add" data-toggle="modal" data-target="#taodon" class="btn btn-success">Tạo đơn</button>
        </div>

        <div  class="col-md-3 text-left" style="padding-bottom: 10px; padding-right: 5px">
            <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_modal" class="btn btn-success">Thêm Đơn Vào Danh Sách</button>
        </div>
    </div>
    <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Danh sách đơn</li>
            </ol>
        </nav>
        
    </div>
    @include('sweet::alert')
    <!-- /.col-lg-12 -->
    
    
    <div class="row" style="padding-right: 10px">
            <table class="table table-bordered table-hover">
                <thead class="title-thead">
                    <tr>
                        <th class="center">STT</th>
                        <th >Tên Đơn</th>
                        <th>Ngày Tạo</th>
                        <th>Trạng Thái</th>
                        <th>Ghi Chú</th>
                        <th class="center">Tải Về</th>
                        <th class="center">Sửa</th>
                        <th class="center">Xóa</th>
                    </tr>
                </thead>
                <tbody class="tbody">
                    <?php $i=0; ?>
                    @foreach($dontu as $dt)
                    <?php $i++;?>
                    <tr>
                        <td class="center">{{$i}}</td>
                        <td>{{$dt->tendon}}</td>
                        <td>{{date('d-m-Y', strtotime($dt->ngaytao))}}</td>
                        @if($dt->trangthai == 1)
                        <td class="center"><a href="admincaptinh/vanban/trangthai/{{$dt->id}}" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open"></span> Hiện</a></td>
                        
                        @else
                        <td class="center"><a href="admincaptinh/vanban/trangthai/{{$dt->id}}" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-eye-close"></span> Ẩn</a></td>
                        @endif
                        <td>{{$dt->ghichu}}</td>

                        <td  class="center"><a href="vanban/dontu/{{$dt->chondon}}" ><span class="glyphicon glyphicon-file fa-2x" ></span></a></td>

                        <td class="center"><button class="btn btn-info btn-sm" type="button" name="edit" id="edit" data-toggle="modal" data-target="#edit_data_modal" data-tendon="{{$dt->tendon}}" data-ghichu="{{$dt->ghichu}}" data-iddon="{{$dt->id}}"> <span class="glyphicon glyphicon-edit"></span></button></td>

                        <td  class="center"><button class="btn btn-danger btn-sm" type="button" name="delete" id="delete" data-toggle="modal" data-target="#delete_data_modal" data-tendon="{{$dt->tendon}}" data-iddon="{{$dt->id}}"><span class="glyphicon glyphicon-trash"></span></button></td>
                    </tr>
                    @endforeach
                </tbody>
                
            </table>
            <div class="text-right" style="padding-right: 20px"> 
                {!!$dontu->links()!!}
            </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
<div id="add_data_modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #ffc34d">
                    <button type="button" class="close" data-dismiss="modal">&times</button>
                    <span id="don"></span>
                    <h3 class="modal-title text-center" style="color: white"> Thêm Đơn</h3>

                </div>
                <div class="modal-body" style="background-color: #d1e0e0">
                    <form action="admincaptinh/vanban/uploaddontu" method="post" accept-charset="utf-8" id="insert_form" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <label>Tên đơn: </label>
                        <input type="text" name="tendon" id="tendon" class="form-control" required pattern=".{3,100}" title="Tên đơn phải có độ dài trên 3 ký tự"/>
                        <br/>
                        <label>Ghi chú: </label>
                        <input type="text" name="ghichu" id="ghichu" class="form-control"/>
                        <br/>
                        <label>Chọn đơn: </label>
                        <input type="file" name="dontu" id="dontu" class="form-control" required accept="file_extension|.gif, .jpg, .png, .doc, .docx, .pdf"/>
                        <br/>
                        <input type="submit" name="them" id="them" value="Thêm đơn" class="btn btn-success">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>

    <div id="edit_data_modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #ffc34d">
                    <button type="button" class="close" data-dismiss="modal">&times</button>
                    <span id="thongbao"></span>
                    <h3 class="modal-title text-center" style="color: white"> Sửa Thông Báo</h3>

                </div>
                <div class="modal-body" style="background-color: #d1e0e0">
                    <form action="admincaptinh/vanban/suadon" method="post" accept-charset="utf-8" id="insert_form" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <label>Tên đơn: </label>
                        <input type="text" name="tendon" id="tendon" class="form-control" required pattern=".{3,100}" title="Tên đơn phải có độ dài trên 3 ký tự"/>
                        <br/>
                        <label>Ghi chú: </label>
                        <input type="text" name="ghichu" id="ghichu" class="form-control"/>
                        <br/>
                        <label>Chọn đơn: </label>
                        <input type="file" name="dontu" id="dontu" class="form-control"/>
                        <input type="hidden" name="iddon" id="iddon" class="form-control"/>
                        <br/>
                        <input type="submit" name="them" id="them" value="Lưu thay đổi" class="btn btn-success">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>

    <div id="delete_data_modal" class="modal fade">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #ff3333">
                    <button type="button" class="close" data-dismiss="modal">&times</button>
                    <span id="don"></span>
                    <h3 class="modal-title text-center" style="color: white"> Xóa Đơn</h3>

                </div>
                <form action="admincaptinh/vanban/xoadon" method="post" accept-charset="utf-8" id="insert_form" enctype="multipart/form-data">
                <div class="modal-body" style="background-color: #f0f5f5">
                    
                        {{csrf_field()}}
                        <label><h4>Bạn có thật sự muốn xóa?</h4></label>
                        <input type="hidden" name="iddon" id="iddon" class="form-control"/>
                        <br/>
                    
                </div>
                <div class="modal-footer" style="background-color: #f0f5f5">
                    <input type="submit" name="xoa" id="xoa" value="Xóa" class="btn btn-success">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div id="taodon" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #ff3333">
                    <button type="button" class="close" data-dismiss="modal">&times</button>
                    <span id="don"></span>
                    <h3 class="modal-title text-center" style="color: white"> Tạo đơn</h3>

                </div>
                <div class="modal-body" style="background-color: #f0f5f5">
                    @include('admincaptinh.vanban.dontu.donxinxuatgia')
                </div>
            </div>
        </div>
    </div>

<script>
    //--EDIT DATA
    $('#edit_data_modal').on('show.bs.modal', function (event) {
        var button=$(event.relatedTarget)
        var tendon=button.data('tendon')
        var ghichu=button.data('ghichu')
        var iddon=button.data('iddon')
        var modal=$(this)
        modal.find('.modal-body #tendon').val(tendon)
        modal.find('.modal-body #ghichu').val(ghichu)
        modal.find('.modal-body #iddon').val(iddon)
    //---EDIT DATA
    });

    //---DELETE DATA
    $('#delete_data_modal').on('show.bs.modal', function (event) {
        var button=$(event.relatedTarget)
        var tendon=button.data('tendon')
        var iddon=button.data('iddon')
        var modal=$(this)
        modal.find('.modal-body #tendon').val(tendon)
        modal.find('.modal-body #iddon').val(iddon)
    })
    //---DELETE DATA
    
</script>
@endsection
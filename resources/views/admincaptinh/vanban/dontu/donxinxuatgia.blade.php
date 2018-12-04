<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
            <!-- quan -->
<script>
        $(document).ready(function(){
        var i=0;
        $('#add1').click(function(){
        i++;
        $('#addcontent1').append('<tr id="row2'+i+'"> <td><b><input name="inp_left'+i+'" type="text" style="border: none; border-bottom: 1px dotted black;width:100px">:</b></td> <td><input name="inp_right'+i+'" type=" text" style="border: none; border-bottom: 1px dotted black; width:500px"></td> <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_removea" style="margin-left:10px">-</button></td> </tr> ');
        });
        $(document).on('click', '.btn_removea', function(){
        var button_id = $(this).attr("id");
        $('#row2'+button_id+'').remove();
        });
        $('#submit').click(function(){
        $.ajax({
        url:"name.php",
        method:"POST",
        data:$('#add_name').serialize(),
        success:function(data)
        {
        alert(data);
        $('#add_name')[0].reset();
        }
        });
        });
        });
</script>
<script>
        $(document).ready(function(){
        var i=0;
        $('#add2').click(function(){
        i++;
        $('#addcontent2').append('<tr id="row'+i+'"> <td><input name="nd'+i+'" type=" text" style="border: none; border-bottom: 1px dotted black; width:605px"></td> <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_removeb" style="margin-left:10px">-</button></td> </tr> ');
        });
        $(document).on('click', '.btn_removeb', function(){
        var button_id = $(this).attr("id");
        $('#row'+button_id+'').remove();
        });
        $('#submit').click(function(){
        $.ajax({
        url:"name.php",
        method:"POST",
        data:$('#add_name').serialize(),
        success:function(data)
        {
        alert(data);
        $('#add_name')[0].reset();
        }
        });
        });
        });
        </script>
        <!-- quan -->
<!-- Bootstrap Core JavaScript -->
    
<style>
.title-thead{
background-color: #DF3A01;
color: #FFFFFF;
font-size: 18px;
text-align: center;
border-radius: 20px 20px 0px 0px;
font-weight: bold;
}
.title-tr:hover{
font-weight: bold;
}
.icon-file{
margin-bottom: 5px;
}
body {
background: rgb(204,204,204);
}
/* body {
background: rgb(204,204,204);
}
page[size="A4"] {
background: white;
width: 21cm;
height: 29.7cm;
display: block;
margin: 0 auto;
margin-bottom: 0.5cm;
box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
}
.a4{
padding-top: 40px;
} */



.page {
  background: white;
  width: 21cm;
  min-height: 29.7cm;
  margin: 1cm auto;
  border: 1px #D3D3D3 solid;
  border-radius: 5px;
  background: white;
  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
  display: block;
}


@page {
  size: A4;
  margin: 0;
}

@media print {
  .page {
    margin: 0;
    border: initial;
    border-radius: initial;
    width: initial;
    min-height: initial;
    box-shadow: initial;
    background: initial;
    page-break-after: always;
  }
}
#quochieu{
padding-left: 40px;
padding-top: 30px;
padding-top: 60px;
}
#tieungu{
padding-left: 50px;
}
hr{
width: 80px;
border: dashed;
border-width: 1px;
width: 120px;
}
.hr1{
padding-right: 60px;
}
.tendon{
text-align: center;
font-size: 20px;
font-weight: bold;
padding-top: 50px;
width: 100%;
}
.loichao{
padding-left: 120px;
padding-top: 20px;
}
.trutri{
padding-left: 80px;
padding-top: 20px;
}
#nguoigui{
padding-left: 80px;
padding-top: 5px;
}
#ngaylamdon{
text-align: right;
padding-right: 50px;
padding-top: 30px;
}
#kytentrai{
margin-left: 100px;
text-align: center;
}
#kytenphai{
text-align: center;
margin-right: 100px;
}
.tbtop{
padding-top: 80px;
padding-left: 20px;
}
.tbleft{
}
.tbright{
padding-left: 0px;
}
textarea{
border: none;
text-align: center;
width: 60%;
margin-left: 50px;
}
#fill{
border: none;
border-bottom: 1px dotted black;
}
.noidung{
margin-left: 100px;
padding-top: 10px;
}
.btn1{
margin-left: 10px;
}
.btn-pdf{
  padding-right: 10px;
  float: right;
}
@media print {
  #printPageButton {
    display: none;
  }
  #add1{
    display: none;
  }
  #add2{
    display: none;
  }
}
</style>
</head>
<body>
<!-- Page Content -->
    <!-- /.col-lg-12 -->
    <div class="book">
      <div class="page">
        <div class="tbtop">
          <table>
            <tr>
              <div class="tbleft">
                <td>
                    <textarea name="kyhieutrai" rows="2" cols="50" placeholder="Nhập Tên Trung Tâm" id="kyhieutrai"></textarea>
                    <div class="hr1"><hr style="margin-top: 10px"></div>
                </td>
              </div>
              
              <div class="tbright">
                <td>
                  CỘNG HOÀ XÃ HỘI CHỦ NGHĨA VIỆT NAM<br>
                  <p id="tieungu">Độc Lập – Tự Do – Hạnh Phúc</p>
                  <hr style="width: 160px; padding-right: 100px">
                </td>
              </div>
              
            </tr>
          </table>
        </div>
        <!-- Tên Đơn -->
        <div class="row">
          <div class="tendon"><p><b>
          <textarea placeholder = "Nhập tên đơn" style="margin-left: 0px; margin-right: 15px" name="tendon" id="tendon"></textarea></b></p>
          
        </div>
      </div>
      <!-- Tên Đơn -->
      <!-- Lời chào -->
      <div class="row">
        <div class="loichao">
          <p><u><b>Kính gửi</b></u>: <input style="border: none; border-bottom: 1px dotted black; width:500px" type="text" name="trutri" ></p>
        </div>
      </div>
      <!-- Lời chào -->
      <!-- Đại Chỉ Chùa -->
      <div class="row">
        <div class="noidung">
          <table id="addcontent1" class="nguoigui" >
            <tr id="row">
              <td>
                <b><input name="inp_left0" type="text" style="border: none; border-bottom: 1px dotted black;width:100px">:</b></td>
                <td>
                  <input name="inp_right0" type=" text" style="border: none; border-bottom: 1px dotted black; width:500px">
                </td>
                <td>
                  <div class="btn1">
                    <button type="button" name="add1" id="add1" class="btn btn-success">+</button>
                  </div>
                </td>
              </tr>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="noidung">
            <table id="addcontent2" class="nguoigui" >
              <tr id="row">
                <td>
                  <input name="nd1" type=" text" style="border: none; border-bottom: 1px dotted black; width:605px">
                </td>
                <td>
                  <div class="btn1">
                    <button type="button" name="add2" id="add2" class="btn btn-success">+</button>
                  </div>
                </td>
              </tr>
            </table>
          </div>
        </div>
        <!-- ngày làm đơn -->

        <div class="row">
          <div id="ngaylamdon">
            <p> ...............,Ngày ........... tháng ........... năm ..........</p>
          </div>
        </div>
        <table style="padding-top: 30px">
          <thead>
            <tr>
              <div class="kytentrai">
                <th style="width: 500px"><textarea name="kytentrai" cols="20" rows="3" placeholder="ký tên trái" id="kytentrai"></textarea></th>
              </div>
              <div class="kytenphai">
                <th style="width: 400px"><textarea name="kytenphai" cols="20" rows="3" placeholder="ký tên phải" id="kytenphai"></textarea></th>
              </div>
            </tr>
          </thead>
        </table>
        <!-- ngày làm đơn -->
        <div class="btn-pdf">
          <button onclick="myFunction()" id="printPageButton" class="btn-danger">Print this page</button>
        </div>
        <script>
        function myFunction() {
             placeholderVal = document.getElementById("tendon").placeholder;
     document.getElementById("tendon").placeholder = "";
            placeholderVal = document.getElementById("kyhieutrai").placeholder;
     document.getElementById("kyhieutrai").placeholder = "";
            placeholderVal = document.getElementById("kytentrai").placeholder;
     document.getElementById("kytentrai").placeholder = "";
            placeholderVal = document.getElementById("kytenphai").placeholder;
     document.getElementById("kytenphai").placeholder = "";
        window.print();
        }
        </script>
        <!-- <div class="btn-pdf">
          <button class="btn btn-danger" id="printPageButton" onClick="window.print();">Print</button>
        </div> -->
      </div>
    </div>
<!-- /#page-wrapper -->
</body>
</html>
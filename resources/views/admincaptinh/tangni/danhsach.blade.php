@extends('admincaptinh.layout.template')
@section('css')
<style type="text/css">

div.right-content{
	margin-left:50px;
	margin-top:15px;
    position: relative;
}
.title-thead{
    background-color: #DF3A01;
    color: #FFFFFF;
    font-size: 18px;
    text-align: center;
    border-radius: 20px 20px 0px 0px;
    font-weight: bold;
}
.title-tbody tr:nth-child(odd) {
    background-color: #ff8000;
}
.title-tbody tr:nth-child(odd):hover {
    background-color: #ff8000;
}
.title-tbody tr td:nth-child(2){
    text-align: center;
}
.title-tbody tr:hover{
    font-weight: bold;
}
.title-tbody tr td:first-child{
    text-align: center;
}
.title-tbody tr td:last-child{
    text-align: center;
}

#filter{
    text-align: right;
    font-size: 16px;
    font-weight: bold;
    margin-top: 10px;
    margin-right: 20px;
}
#filter1:hover{
    cursor: pointer;
}
#frame-color{
    background-color: #acb0b1;
    margin-top: 10px;
    margin-bottom: 15px;
    color: #360000;
    font-weight: bold;
    display: none;
}
#close-but{
    color:white;
    background-color: red;
    font-weight: bold;
}
#close{
    text-align: right;
    display: none;
    margin-top:10px;
}
label {
    padding-top: 5px;
    font-weight: bold;
}
div.paging{
        float: right;
        margin-right: 40px;
    }
div ul.ul-paging{
    margin-top:5px;
}
div.menu{
        margin-right: 10px;
    }
div.number{
    margin-left:10px;
    width: 30%;
    float: left;
    font-size: 16px;
    padding-top: 10px;
}
div.search{
        width: 20%;
        float: right;
        margin-bottom: 10px;
        margin-right: 20px;
    }
</style>

@endsection
@section('script')
<script type="text/javascript">

	$(".nav li.f2").children('ul').addClass("action");
	$(".nav li.f2").children('a').children('span').css("transform","rotate(-90deg)");
	$(".nav li ul").not(".action").css("display","none");
	
    function resetFilterSelect(){
    	var tr = $("tbody tr");
    	for(var i=0;i<tr.length;i++){
    		tr.eq(i).removeClass("showrow hiderow hastext notext");
    		tr.eq(i).css("display","");
    	}
    	$("#paging").empty();
    }
    function pagingTableFilter(arg_entries, arg_rowshow){

    	var entries = arg_entries;
		var rowshow = arg_rowshow;
		var sotrang = 0;
		if((rowshow % entries) == 0 ){
			sotrang = rowshow / entries;
		}
		else{
			sotrang = rowshow / entries + 1;
		}

		var html = '<li><span class="eachpage actived">1</span></li>';
		for(var i = 2 ; i<= sotrang; i++){
			html +='<li><span class="eachpage">'+i+'</span></li>';
		}

		return html;
    }
   
    function filterTuVien(arg_keyword){
      
    	var tr_hastext = $(".hastext");
        if(tr_hastext.length == 0){
            var tr_tuvien = $("tbody tr");
        ;
        }
        else{
            var tr_tuvien = $(".hastext");
        }
    	var rowHastext = 0;
    	var keyword = arg_keyword;
    	
    	for(var i =0; i< tr_tuvien.length ;i++){
          
    		var td = tr_tuvien.eq(i).find("td:eq(2)");
    		//alert("text: "+ text);
    		if(td.text().toUpperCase().indexOf(keyword) > -1){
    			tr_tuvien.eq(i).removeClass("hastext").addClass("hastext");
    			tr_tuvien.eq(i).css("display","");
    			rowHastext++;
    		}
    		else{
    			tr_tuvien.eq(i).removeClass("hastext").addClass("notext");
    			tr_tuvien.eq(i).css("display","none");
    		}
    	}
    	var entries = parseInt($("#number option:selected").text());

	 	var html = pagingTableFilter(entries, rowHastext);
	 	$("#paging").empty();
	 	$("#paging").append(html);
	 	$(".eachpage").css({"margin-left":"20px","cursor":"pointer","margin-top":"10px"});
		$(".actived").css({"background-color":"#337ab7", "color":"white"});
		var tr_tuvien = $(".hastext");
		for(var i=0 ;i<entries;i++){
			tr_tuvien.eq(i).css("display","");
			tr_tuvien.eq(i).addClass("showrow");
		}
		for(var i =entries; i<tr_tuvien.length;i++){
			tr_tuvien.eq(i).css("display","none");
			tr_tuvien.eq(i).addClass("hiderow");
		} 
    }
    function filterTuoiDao(arg_keyword){
        var tr_hastext = $(".hastext");
        if(tr_hastext.length == 0){
            var tr_tuoidao = $("tbody tr");
        ;
        }
        else{
            var tr_tuoidao = $(".hastext");
        }
        var rowHastext = 0;
        var keyword = arg_keyword;
        
        for(var i =0; i< tr_tuoidao.length ;i++){
          
            var td = tr_tuoidao.eq(i).find("td:eq(3)");
            //alert("text: "+ text);
            if(td.text().toUpperCase().indexOf(keyword) > -1){
                tr_tuoidao.eq(i).removeClass("hastext").addClass("hastext");
                tr_tuoidao.eq(i).css("display","");
                rowHastext++;
            }
            else{
                tr_tuoidao.eq(i).removeClass("hastext").addClass("notext");
                tr_tuoidao.eq(i).css("display","none");
            }
        }
        var entries = parseInt($("#number option:selected").text());
        
        var html = pagingTableFilter(entries, rowHastext);
        $("#paging").empty();
        $("#paging").append(html);
        $(".eachpage").css({"margin-left":"20px","cursor":"pointer","margin-top":"10px"});
        $(".actived").css({"background-color":"#337ab7", "color":"white"});
        var tr_tuoidao = $(".hastext");
        for(var i=0 ;i<entries;i++){
            tr_tuoidao.eq(i).css("display","");
            tr_tuoidao.eq(i).addClass("showrow");
        }
        for(var i =entries; i<tr_tuoidao.length;i++){
            tr_tuoidao.eq(i).css("display","none");
            tr_tuoidao.eq(i).addClass("hiderow");
        } 
    }
    function filterGiaoPham(arg_keyword){
        
        var tr_hastext = $(".hastext");
        if(tr_hastext.length == 0){
            
            var tr_giaopham = $("tbody tr");
        
        }
        else{
            var tr_giaopham = $(".hastext");
        }
        var rowHastext = 0;
        var keyword = arg_keyword;
        for(var i =0; i< tr_giaopham.length ;i++){
          
            var td = tr_giaopham.eq(i).find("td:eq(5)");
            //alert("text: "+ text);
            if(td.text().toUpperCase().indexOf(keyword) > -1){
                tr_giaopham.eq(i).removeClass("hastext").addClass("hastext");
                tr_giaopham.eq(i).css("display","");
                rowHastext++;
            }
            else{
                tr_giaopham.eq(i).removeClass("hastext").addClass("notext");
                tr_giaopham.eq(i).css("display","none");
            }
        }
     
        var entries = parseInt($("#number option:selected").text());
        var html = pagingTableFilter(entries, rowHastext);
        $("#paging").empty();
        $("#paging").append(html);
        $(".eachpage").css({"margin-left":"20px","cursor":"pointer","margin-top":"10px"});
        $(".actived").css({"background-color":"#337ab7", "color":"white"});
        var tr_giaopham = $(".hastext");
        for(var i=0 ;i<entries;i++){
            tr_giaopham.eq(i).css("display","");
            tr_giaopham.eq(i).addClass("showrow");
        }
        for(var i =entries; i<tr_giaopham.length;i++){
            tr_giaopham.eq(i).css("display","none");
            tr_giaopham.eq(i).addClass("hiderow");
        } 
    }
    function filterGioiPham(arg_keyword){
        
        var tr_hastext = $(".hastext");
        if(tr_hastext.length == 0){
            
            var tr_gioipham = $("tbody tr");
        
        }
        else{
            var tr_gioipham = $(".hastext");
        }
        var rowHastext = 0;
        var keyword = arg_keyword;
        for(var i =0; i< tr_gioipham.length ;i++){
          
            var td = tr_gioipham.eq(i).find("td:eq(4)");
            //alert("text: "+ text);
            if(td.text().toUpperCase().indexOf(keyword) > -1){
                tr_gioipham.eq(i).removeClass("hastext").addClass("hastext");
                tr_gioipham.eq(i).css("display","");
                rowHastext++;
            }
            else{
                tr_gioipham.eq(i).removeClass("hastext").addClass("notext");
                tr_gioipham.eq(i).css("display","none");
            }
        }
        var entries = parseInt($("#number option:selected").text());
        //var entries = 10;
        var html = pagingTableFilter(entries, rowHastext);
        $("#paging").empty();
        $("#paging").append(html);
        $(".eachpage").css({"margin-left":"20px","cursor":"pointer","margin-top":"10px"});
        $(".actived").css({"background-color":"#337ab7", "color":"white"});
        var tr_gioipham = $(".hastext");
        for(var i=0 ;i<entries;i++){
            tr_gioipham.eq(i).css("display","");
            tr_gioipham.eq(i).addClass("showrow");
        }
        for(var i =entries; i<tr_gioipham.length;i++){
            tr_gioipham.eq(i).css("display","none");
            tr_gioipham.eq(i).addClass("hiderow");
        } 
    }
    
    function filterInput(arg_keyword){
    	var tr_hastext = $(".hastext");
    	if(tr_hastext.length == 0){
    		var tr_input = $("tbody tr");
    	}
    	else{
    		var tr_input = $(".hastext");
    	}
    	var rowHastext = 0;
    	var keyword = arg_keyword;
    	
    	for(var i =0; i< tr_input.length ;i++){
    		var td = tr_input.eq(i).find("td:eq(2)");
    		//alert("text: "+ text);
    		if(td.text().toUpperCase().indexOf(keyword) > -1){
    			tr_input.eq(i).removeClass("hastext").addClass("hastext");
    			tr_input.eq(i).css("display","");
    			rowHastext++;
    		}
    		else{
    			tr_input.eq(i).removeClass("hastext").addClass("notext");
    			tr_input.eq(i).css("display","none");
    		}

    	}
    	
	 	var entries = parseInt($("#number option:selected").text());
	 	var html = pagingTableFilter(entries, rowHastext);
	 	$("#paging").empty();
	 	$("#paging").append(html);
	 	$(".eachpage").css({"margin-left":"20px","cursor":"pointer"});
		$(".actived").css({"background-color":"#337ab7", "color":"white"});
		var tr_input = $(".hastext");
		for(var i=0 ;i<entries;i++){
			tr_input.eq(i).css("display","");
			tr_input.eq(i).addClass("showrow");
		}
		for(var i =entries; i<tr_input.length;i++){
			tr_input.eq(i).css("display","none");
			tr_input.eq(i).addClass("hiderow");
		}
    }
    $(document).on("click","#paging span.eachpage",function(){
    	$(".actived").css({"background-color":"", "color":""});
		$(".actived").removeClass('actived');
		$(this).addClass('actived');
		$(".actived").css({"background-color":"#337ab7", "color":"white"});
    	var entries = parseInt($("#number option:selected").text());
    	var rowtable = $("tbody tr").length;
    	var value = parseInt($(this).text());
    	//var district = $("#district option:selected").text().length;
    	var tr_hastext = $(".hastext");
    	var end = entries * value;
	    var start = end - entries;
	    $(".showrow").css("display","none");
	    $(".showrow").removeClass("showrow");
	    for(var i=start; i < end;i++){
	  			if(i < tr_hastext.length){
		    		tr_hastext.eq(i).removeClass("hiderow").addClass("showrow");
		    		tr_hastext.eq(i).css("display", "");
		    
		    	}
		    	else{
		    		break;
		    	}
		    }
    	
    });
    $("#number").change(function(){
    	var key_tuoidao = $("#tuoidao option:selected").text().toUpperCase();
        var key_gioipham = $("#gioipham option:selected").text().toUpperCase();
        var key_giaopham = $("#giaopham option:selected").text().toUpperCase();
        var key_tuvien = $("#tuvien option:selected").text().toUpperCase();
    	var keyword = $("#input").val().toUpperCase();
    	resetFilterSelect();
    	filterTuVien("");    
    	if(key_tuvien.length !=0){
             filterTuVien(key_tuvien);
        }
        if(key_gioipham.length !=0){
            filterGioiPham(key_gioipham);
        }
        if(key_tuoidao.length !=0){
            filterTuoiDao(key_tuoidao);
        }
        if(key_giaopham.length != 0){
            filterGioiPham(key_gioipham);
        }
        if(keyword.length != 0){
            filterInput(keyword);
        }
    });
 	
    $("#input").on("keyup",function(){
    	var key_tuoidao = $("#tuoidao option:selected").text().toUpperCase();
        var key_gioipham = $("#gioipham option:selected").text().toUpperCase();
        var key_giaopham = $("#giaopham option:selected").text().toUpperCase();
        var key_tuvien = $("#tuvien option:selected").text().toUpperCase();
        var keyword = $("#input").val().toUpperCase();
        resetFilterSelect();
         
        if(key_tuvien.length !=0){
             filterTuVien(key_tuvien);
        }
        if(key_gioipham.length !=0){
            filterGioiPham(key_gioipham);
        }
        if(key_tuoidao.length !=0){
            filterTuoiDao(key_tuoidao);
        }
        if(key_giaopham.length != 0){
            filterGioiPham(key_gioipham);
        }
        filterInput(keyword);
    
    });

    $('#tuvien').change(function(){
       
        resetFilterSelect();
        var key_tuoidao = $("#tuoidao option:selected").text().toUpperCase();
        var key_gioipham = $("#gioipham option:selected").text().toUpperCase();
        var key_giaopham = $("#giaopham option:selected").text().toUpperCase();
        var key_tuvien = $("#tuvien option:selected").text().toUpperCase();
        var keyword = $("#input").val().toUpperCase();
        if(keyword.length != 0){
            filterInput(keyword);
        }
        if(key_tuoidao.length !=0){
            filterTuoiDao(key_tuoidao);
        }
        if(key_gioipham.length !=0){
            filterGioiPham(key_gioipham);
        }
        if(key_giaopham.length !=0){
            filterGiaoPham(key_giaopham);
        }

        filterTuVien(key_tuvien);

    });

    $('#tuoidao').change(function(){
       
        resetFilterSelect();
        var key_tuoidao = $("#tuoidao option:selected").text().toUpperCase();
        var key_gioipham = $("#gioipham option:selected").text().toUpperCase();
        var key_giaopham = $("#giaopham option:selected").text().toUpperCase();
        var key_tuvien = $("#tuvien option:selected").text().toUpperCase();
        var keyword = $("#input").val().toUpperCase();
        if(keyword.length != 0){
            filterInput(keyword);
        }
        if(key_tuvien.length !=0){
             filterTuVien(key_tuvien);
        }
        if(key_gioipham.length !=0){
            filterGioiPham(key_gioipham);
        }
        if(key_giaopham.length !=0){
            filterGiaoPham(key_giaopham);
        }
        filterTuoiDao(key_tuoidao);

    });
    $('#giaopham').change(function(){
       
        resetFilterSelect();
        var key_tuoidao = $("#tuoidao option:selected").text().toUpperCase();
        var key_gioipham = $("#gioipham option:selected").text().toUpperCase();
        var key_giaopham = $("#giaopham option:selected").text().toUpperCase();
        var key_tuvien = $("#tuvien option:selected").text().toUpperCase();
        var keyword = $("#input").val().toUpperCase();
        if(keyword.length != 0){
            filterInput(keyword);
        }
        if(key_tuvien.length !=0){
             filterTuVien(key_tuvien);
        }
        if(key_gioipham.length !=0){
            filterGioiPham(key_gioipham);
        }
        if(key_tuoidao.length !=0){
            filterTuoiDao(key_tuoidao);
        }
        filterGiaoPham(key_giaopham);

    });
    $('#gioipham').change(function(){
       
        resetFilterSelect();
        var key_tuoidao = $("#tuoidao option:selected").text().toUpperCase();
        var key_gioipham = $("#gioipham option:selected").text().toUpperCase();
        var key_giaopham = $("#giaopham option:selected").text().toUpperCase();
        var key_tuvien = $("#tuvien option:selected").text().toUpperCase();
        var keyword = $("#input").val().toUpperCase();
        if(keyword.length != 0){
            filterInput(keyword);
        }
        if(key_tuvien.length !=0){
             filterTuVien(key_tuvien);
        }
        if(key_giaopham.length !=0){
            filterGiaoPham(key_giaopham);
        }
        if(key_tuoidao.length !=0){
            filterTuoiDao(key_tuoidao);
        }
        filterGioiPham(key_gioipham);

    });
   $('#filter1').click(function(){
        //alert("mo");
        $('#frame-color').css("display","block");
        $('#filter').css("display","none");
        $('#close').css("display","block");
        //var idTuVien = $("#valueid").text();
        //alert(idTuVien);
        $.get("admincaptinh/ajax/danhsach/tangni/tuvien",function(data){
            $('#tuvien').html(data);
        })
        $.get("admincaptinh/ajax/danhsach/tangni/tuoidao/",function(data){
            $('#tuoidao').html(data);
        });
        $.get("admincaptinh/ajax/danhsach/tangni/gioipham/",function(data){
            $('#gioipham').html(data);
        });
         $.get("admincaptinh/ajax/danhsach/tangni/giaopham/",function(data){
            $('#giaopham').html(data);
        });
   });
   $('#close-but').click(function(){
        $('#frame-color').css("display","none");
        $('#filter').css("display","block");
        $('#close').css("display","none");
        $('#tuoidao').prop("selectedIndex",0);
        $('#giaopham').prop("selectedIndex",0);
        $('#gioipham').prop("selectedIndex",0);
        $('#tuvien').prop("selectedIndex",0);
        $("#input").val("");
        resetFilterSelect();
        filterTuVien("");
    });
   filterTuVien(""); 
</script>
@endsection

@section('right-content')
<div class="right-content">
 <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Danh sách tăng ni</li>
                </ol>
            </nav>
        </div>
        <!-- /.col-lg-12 -->
        <div class="row">
            <p id="filter" class="filter"><a id="filter1">Lọc Dữ Liệu <i class="fa fa-filter "></i></a></p>
        </div>
        <div class="row">
            <div id="close">
                <p><button type="button" id="close-but"> &nbsp&nbsp Đóng Lại &nbsp&nbsp</button></p>
            </div>
        </div>
        <div class="row" id="frame-color">
            <div id="framefilter">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Tự Viện</label>
                        <select name="tuvien"  class="form-control" id="tuvien">
                            <option value="none"></option>
                        </select>
                    </div>
                </div>   
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Tuổi Đạo</label>
                        <select name="tuoidao" class="form-control" id="tuoidao">
                            <option value="none"></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Giới Phẩm</label>
                        <select name="gioipham" class="form-control" id="gioipham">
                            <option value="none"></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Giáo Phẩm</label>
                        <select name="giaopham"  class="form-control" id="giaopham">
                            <option value="none"></option>
                        </select>
                    </div>
                </div>   
            </div>
        </div>
        <div class="row">
        <div class="search_menu">
            <div class="number">
                <span>Hiển Thị &nbsp;</span><span>
                <select id="number">
                    <option value="15">15</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                </select>
                </span><span>&nbsp; Dòng</span>
            </div>
            
            <div class="search">
                <input class="form-control" id="input" type="text" placeholder="Tìm Kiếm Theo Tên" aria-label="Search">
            </div>
        </div>
    </div>
        <div class="row">
            <div >
                <table class="table table-stripper table-hover" id="table">
                    <thead class="title-thead">
                        <tr>
                            <th>STT</th>
                            <th>Pháp Danh</th>
                            <th>Tự Viện </th>
                            <th>Tuổi Đạo</th>
                            <th>Giới Phẩm</th>
                            <th>Giáo Phẩm</th>
                            <th>Hồ Sơ</th>
                        </tr>
                    </thead>
                    <tbody class="title-tbody">
                        @php $i =1; @endphp
                        @foreach($tangni as $tn)
                        <tr>
                            <td align="center">@php echo $i; $i++ @endphp</td>
                            <td>{{$tn->PhapDanh}}</td>
                            <td>{{$tn->TuVien_Ten}}</td>
                            <td>{{$tn->TuoiDao}}</td>
                            <td>{{$tn->GioiPham_Ten}}</td>
                            <td>{{$tn->GiaoPham_Ten}}</td>
                            <td ><a href="admin/tangni/hoso/{{$tn->id_tangni}}"><i class="fa fa-list" style="font-size:20px;"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>
                <div class="paging" >
                <ul class="pagination pagination-md ul-paging" id="paging">
                    <li><span class="eachpage actived">1</span></li>
                </ul>
            </div>
            </div>
        </div>
	   
</div>
@endsection
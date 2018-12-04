@extends('admincaptinh.layout.template')
@section('css')
<style type="text/css">
	div.right-content{
		margin-left:50px;
		margin-top:15px;
        position: relative;
	}
	div.paging{
		float: right;
		margin-right: 40px;
	}
	div ul.ul-paging{
		margin-top:5px;
	}
	div.mytable {
		/*margin-top:10px;*/
		margin-left:10px;
		margin-right: 15px;
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
	.title-thead{
		background-color: #df3a01;
		color: #fff;
		font-size: 16px;
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
	div.search{
		width: 20%;
		float: right;
		margin-bottom: 10px;
		margin-right: 20px;
	}
	p.filter-text{
		/*text-align: right;*/
		font-size: 16px;
		font-weight: bold;
		margin-right: 30px;
        float: right;
	}
	#filter1{
		cursor: pointer;
		text-decoration: underline;
		color: blue;
	}
	p.close-button{
		float: right;
		margin-right: 30px;
		font-size: 16px;
		display: none;
	}
	input.close-but{
		background-color: red;
		color: #fff;
		cursor: pointer;
		font-weight: bold;
	}
	div.frame-filter{
		background-color: #acb0b1;
		margin-bottom: 20px;
		display: none;
	}
	div#frame-filter{
		padding-top:5px;
		padding-bottom: 5px;
		font-size: 16px;
	}
   div.popup_delete{
       width: 400px;
       background-color: #fff;
       position: absolute;
       z-index: 9999;
       margin-left: 250px;
       margin-top: 150px;
       display:none;
   }
   div.popup_body{
    padding-top: 10px;
    text-align: center;
   }
   div.popup_but{
    padding-bottom: 10px;
    text-align: center;
   }
   #over {
    background: #acb0b1;
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    opacity: 0.8;
    z-index: 999;
}/*
button.action-but{
     background-color: blue;
     color: #fff;
     margin-left: 10px;
     margin-top: 5px;
     font-weight: bold;
}
*/
</style>
@endsection
@section('script')
<script type="text/javascript">

	$(".nav li.f3").children('ul').addClass("action");
	$(".nav li.f3").children('a').children('span').css("transform","rotate(-90deg)");
	$(".nav li ul").not(".action").css("display","none");
	
	function pagingTable(arg_numOfpage, arg_numRowtable){
		var numOfPage = arg_numOfpage;
		var rowCount = arg_numRowtable;
		var sotrang = 0;
		if((rowCount % numOfPage) == 0 ){
			sotrang = rowCount / numOfPage;
		}
		else{
			sotrang = rowCount / numOfPage + 1;
		}
		var html = '';
		for(var i = 2 ; i<= sotrang; i++){
			html +='<li><span class="eachpage">'+i+'</span></li>';
		}
		return html;
	}

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
    
    function filterDistrict(arg_keyword){
    	var tr_hastext = $(".hastext");
    	if(tr_hastext.length == 0){
    		var tr_district = $("tbody tr");
    	}
    	else{
    		var tr_district = $(".hastext");
    	}
    	var rowHastext = 0;
    	var keyword = arg_keyword;
    	
    	for(var i =0; i< tr_district.length ;i++){
    		var td = tr_district.eq(i).find("td:eq(4)");
    		//alert("text: "+ text);
    		if(td.text().toUpperCase().indexOf(keyword) > -1){
    			tr_district.eq(i).removeClass("hastext").addClass("hastext");
    			tr_district.eq(i).css("display","");
    			rowHastext++;
    		}
    		else{
    			tr_district.eq(i).removeClass("hastext").addClass("notext");
    			tr_district.eq(i).css("display","none");
    		}

    	}
    	
	 	var entries = parseInt($("#number option:selected").text());
	 	var html = pagingTableFilter(entries, rowHastext);
	 	$("#paging").empty();
	 	$("#paging").append(html);
	 	$(".eachpage").css({"margin-left":"20px","cursor":"pointer"});
		$(".actived").css({"background-color":"#337ab7", "color":"white"});
		var tr_district = $(".hastext");
		for(var i=0 ;i<entries;i++){
			tr_district.eq(i).css("display","");
			tr_district.eq(i).addClass("showrow");
		}
		for(var i =entries; i<tr_district.length;i++){
			tr_district.eq(i).css("display","none");
			tr_district.eq(i).addClass("hiderow");
		}
    }
    //loc theo xa phuong
    function filterWard(arg_keyword){
    	var tr_ward = $(".hastext");
    	var rowHastext = 0;
    	var keyword = arg_keyword;
    	
    	for(var i =0; i< tr_ward.length ;i++){
    		var td = tr_ward.eq(i).find("td:eq(3)");
    		//alert("text: "+ text);
    		if(td.text().toUpperCase().indexOf(keyword) > -1){
    			tr_ward.eq(i).removeClass("hastext").addClass("hastext");
    			tr_ward.eq(i).css("display","");
    			rowHastext++;
    		}
    		else{
    			tr_ward.eq(i).removeClass("hastext").addClass("notext");
    			tr_ward.eq(i).css("display","none");
    		}
    	}
    	var entries = parseInt($("#number option:selected").text());
	 	var html = pagingTableFilter(entries, rowHastext);
	 	$("#paging").empty();
	 	$("#paging").append(html);

	 	$(".eachpage").css({"margin-left":"20px","cursor":"pointer"});
		$(".actived").css({"background-color":"#337ab7", "color":"white"});
		var tr_ward = $(".hastext");
		for(var i=0 ;i<entries;i++){
			tr_ward.eq(i).css("display","");
			tr_ward.eq(i).addClass("showrow");
		}
		for(var i =entries; i<tr_ward.length;i++){
			tr_ward.eq(i).css("display","none");
			tr_ward.eq(i).addClass("hiderow");
		} 
    } //filter ward end 
    //filter state
    
    function filterState(arg_keyword){
    	var tr_hastext = $(".hastext");
    	if(tr_hastext.length == 0){
    		var tr_state = $("tbody tr");
    	}
    	else{
    		var tr_state = $(".hastext");
    	}
    	//var tr = $("tbody tr");
    	//var text ='';
    	var rowHastext = 0;
    	var keyword = arg_keyword;
    	
    	for(var i =0; i< tr_state.length ;i++){
    		var td = tr_state.eq(i).find("td:eq(5)");
    		//alert("text: "+ text);
    		if(td.text().toUpperCase().indexOf(keyword) > -1){
    			tr_state.eq(i).removeClass("hastext").addClass("hastext");
    			tr_state.eq(i).css("display","");
    			rowHastext++;
    		}
    		else{
    			tr_state.eq(i).removeClass("hastext").addClass("notext");
    			tr_state.eq(i).css("display","none");
    		}
    	}
    	
	 	var entries = parseInt($("#number option:selected").text());
	 	var html = pagingTableFilter(entries, rowHastext);
	 	$("#paging").empty();
	 	$("#paging").append(html);
	 	$(".eachpage").css({"margin-left":"20px","cursor":"pointer"});
		$(".actived").css({"background-color":"#337ab7", "color":"white"});
		var tr_text= $(".hastext");
		for(var i=0 ;i<entries;i++){
			tr_text.eq(i).css("display","");
			tr_text.eq(i).addClass("showrow");
		}
		for(var i =entries; i<tr_text.length;i++){
			tr_text.eq(i).css("display","none");
			tr_text.eq(i).addClass("hiderow");
		}
    }
    function filterTuVien(arg_keyword){
    	var tr_hastext = $(".hastext");
    	var rowHastext = 0;
    	var keyword = arg_keyword;
    	
    	for(var i =0; i< tr_hastext.length ;i++){
    		var td = tr_hastext.eq(i).find("td:eq(2)");
    		//alert("text: "+ text);
    		if(td.text().toUpperCase().indexOf(keyword) > -1){
    			tr_hastext.eq(i).removeClass("hastext").addClass("hastext");
    			tr_hastext.eq(i).css("display","");
    			rowHastext++;
    		}
    		else{
    			tr_hastext.eq(i).removeClass("hastext").addClass("notext");
    			tr_hastext.eq(i).css("display","none");
    		}
    	}
    	var entries = parseInt($("#number option:selected").text());
	 	var html = pagingTableFilter(entries, rowHastext);
	 	$("#paging").empty();
	 	$("#paging").append(html);

	 	$(".eachpage").css({"margin-left":"20px","cursor":"pointer"});
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
    	var key_state = $("#state option:selected").text().toUpperCase();
        var key_district = $("#district option:selected").text().toUpperCase();
        var key_ward = $("#ward option:selected").text().toUpperCase();
        var key_tuvien = $("#tuvien option:selected").text().toUpperCase();
    	var tong = key_state.length + key_district.length + key_ward.length + key_tuvien.length;
    	var keyword = $("#input").val().toUpperCase();
    	resetFilterSelect();
    	filterDistrict("");    
    		if(key_district.length != 0){
    			filterDistrict(key_district);
    		}
    		if(key_ward.length != 0){
    			filterWard(key_ward);
    		}
    		if(key_tuvien.length != 0){
    			filterTuVien(key_tuvien);
    		}
    		if(key_state.length != 0){
    			filterState(key_state);
    		}
    		if(keyword.length != 0){
    			filterInput(keyword);
    		}
    	});
 	
    $("#input").on("keyup",function(){
    	var key_state = $("#state option:selected").text().toUpperCase();
        var key_district = $("#district option:selected").text().toUpperCase();
        var key_ward = $("#ward option:selected").text().toUpperCase();
        var key_tuvien = $("#tuvien option:selected").text().toUpperCase();
    	var tong = key_state.length + key_district.length + key_ward.length + key_tuvien.length;
    	var keyword = $("#input").val().toUpperCase();
    	resetFilterSelect();
    	    
    		if(key_district.length != 0){
    			filterDistrict(key_district);
    		}
    		if(key_ward.length != 0){
    			filterWard(key_ward);
    		}
    		if(key_tuvien.length != 0){
    			filterTuVien(key_tuvien);
    		}
    		if(key_state.length != 0){
    			filterState(key_state);
    		}
    		filterInput(keyword);
    
    });
    $("#filter1").click(function(){
		$(".frame-filter").css("display","block");
		$("#filter").css("display","none");
		$(".close-button").css("display","block");
		$.get("admincaptinh/ajax/quanhuyen/",function(data){
            $("#district").html(data);
        });
        $.get("admincaptinh/ajax/trangthai/",function(data){
            $("#state").html(data);
        });
        $('#ward').html("<option value='none1'></option><option value='none' disabled>--Hãy chọn quận huyện trước--</option>");
        $('#tuvien').html("<option value='none1'></option><option value='none' disabled>--Hãy chọn xã phường trước--</option>");
        $('#district').prop("selectedIndex",0);
        $('#state').prop("selectedIndex",0);  
    });
    $(".close-but").click(function(){
    	$(".frame-filter").css("display","none");
    	$("#filter").css("display","block");
		$(".close-button").css("display","none");
		$("#input").val("");
		$('#state').prop("selectedIndex",0);
		$('#district').prop("selectedIndex",0);
		$('#ward').prop("selectedIndex",0);
		$('#tuvien').prop("selectedIndex",0);
		resetFilterSelect();
		filterDistrict("");
    });
    $('#district').change(function(){
        var idQuanHuyen = $(this).val();
        if(idQuanHuyen !== "none"){
            $.get("admincaptinh/ajax/xaphuong/"+idQuanHuyen, function(data){
                $('#ward').html(data);
            });
            $.get("admincaptinh/ajax/tuviendistrict/"+idQuanHuyen,function(data){
                $('#tuvien').html(data);
            });
        }
        else {
             $('#ward').html("<option value='none1'></option><option value='none' disabled>--Hãy chọn quận huyện trước--</option>");
            $('#tuvien').html("<option value='none1'></option><option value='none' disabled>--Hãy chọn xã phường trước--</option>");
        }
        
         resetFilterSelect();
        var key_state = $("#state option:selected").text().toUpperCase();
        var key_district = $("#district option:selected").text().toUpperCase();
        var key_ward = $("#ward option:selected").text().toUpperCase();
        var key_tuvien = $("#tuvien option:selected").text().toUpperCase();
        var key_input = $("#input").val().toUpperCase();

        if(key_ward.length != 0){
                filterWard(key_ward);
            }
        if(key_state.length != 0){
            filterState(key_state);
        }
        if(key_input.length != 0){
            filterInput(key_input);
        }
        if(key_tuvien.length != 0){
            
            filterTuVien(key_tuvien);
        }
        filterDistrict(key_district);

    });

    $('#ward').change(function(){
        var idXaPhuong = $(this).val();
        if(idXaPhuong !== "none"){
            $.get("admincaptinh/ajax/tuvien/"+idXaPhuong, function(data){
                $('#tuvien').html(data);
            });
        }
        else{
            var idQuanHuyen = $("#district").val();
             $.get("admincaptinh/ajax/tuviendistrict/"+idQuanHuyen,function(data){
                $('#tuvien').html(data);
            });
        }
        resetFilterSelect();
        var key_state = $("#state option:selected").text().toUpperCase();
        var key_district = $("#district option:selected").text().toUpperCase();
        var key_ward = $("#ward option:selected").text().toUpperCase();
        var key_tuvien = $("#tuvien option:selected").text().toUpperCase();
        var key_input = $("#input").val().toUpperCase();

        if(key_district.length != 0){
                filterDistrict(key_district);
            }
        if(key_state.length != 0){
            filterState(key_state);
        }
        if(key_input.length != 0){
            filterInput(key_input);
        }
        if(key_tuvien.length != 0){
            
            filterTuVien(key_tuvien);
        }
        filterWard(key_ward);

       
    });
    $('#state').change(function(){  
       var idQuanHuyen = $('#district').val();
       var idXaPhuong = $('#ward').val();
       var idTrangThai = $(this).val();
       if(idTrangThai !== "none"){
           if(idQuanHuyen === "none"){
               $.get("admincaptinh/ajax/state/"+idTrangThai,function(data){
                    $('#tuvien').html(data);
               }) ;
            }
            else if(idXaPhuong === "none"){
                $.get("admincaptinh/ajax/state/"+idTrangThai+"/district/"+idQuanHuyen, function(data){
                    $('#tuvien').html(data);
                });
            }
            else{
                  $.get("admincaptinh/ajax/state/"+idTrangThai+"/district/"+idQuanHuyen+"/ward/"+idXaPhuong, function(data){
                    $('#tuvien').html(data);
                });
            }
        }
        else if(idQuanHuyen !== "none"){
            if(idXaPhuong === "none"){
                $.get("admincaptinh/ajax/tuviendistrict/"+idQuanHuyen,function(data){
                	$('#tuvien').html(data);
            	});
            }
            else{
                 $.get("admincaptinh/ajax/tuvien/"+idXaPhuong, function(data){
                	$('#tuvien').html(data);
        		});
            }
        }
        else{}
        //filter state //
    	resetFilterSelect();
        var key_state = $("#state option:selected").text().toUpperCase();
        var key_district = $("#district option:selected").text().toUpperCase();
        var key_ward = $("#ward option:selected").text().toUpperCase();
        var key_tuvien = $("#tuvien option:selected").text().toUpperCase();
        var key_input = $("#input").val().toUpperCase();

        if(key_district.length != 0){
                filterDistrict(key_district);
            }
        if(key_ward.length != 0){
            filterWard(key_ward);
        }
        if(key_input.length != 0){
            filterInput(key_input);
        }
        if(key_tuvien.length != 0){
            
            filterTuVien(key_tuvien);
        }
        filterState(key_state);
      
    }); 
    $("#tuvien").change(function() {
    	resetFilterSelect();
    	var key_state = $("#state option:selected").text().toUpperCase();
        var key_district = $("#district option:selected").text().toUpperCase();
        var key_ward = $("#ward option:selected").text().toUpperCase();
        var key_tuvien = $("#tuvien option:selected").text().toUpperCase();
        var key_input = $("#input").val().toUpperCase();

        if(key_district.length != 0){
                filterDistrict(key_district);
            }
        if(key_ward.length != 0){
            filterWard(key_ward);
        }
        if(key_input.length != 0){
            filterInput(key_tuvien);
        }
        if(key_state.length != 0){
            filterState(key_state);
        }
        filterTuVien(key_tuvien);

    });
    /*
   $("#xoatuvien").on('show.bs.modal', function(e) {
        $(this).find("#delete_tuvien").attr('href', $(e.relatedTarget).attr('href'));
    });*/
   
   
   filterDistrict("");

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
	<div class="row">
       <!-- <span "><button type="button" class="action-but">Hành Động</button></span>-->
		<p id="filter" class="filter-text"><a class="filter" id="filter1">Gửi giới hạn<i class="fa fa-filter "></i></a></p>
    </div>
    <div class="row">
        <p class="close-button"><input type="button" class="close-but" id="close-but" value=" &nbsp;&nbsp;&nbsp;Đóng Lại&nbsp;&nbsp;&nbsp;"></p>
    </div>
    <div class="row frame-filter">
        <div id="frame-filter">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Quận Huyện</label>
                        <select name="district" class="form-control" id="district">
                            <option value="none"></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Xã Phường</label>
                        <select name="ward" class="form-control" id="ward">
                            <option value="none"></option>
                            <option value="none1" disabled>--Hãy chọn quận huyện trước--</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Tự Viện</label>
                        <select name="tuvien" class="form-control" id="tuvien">
                            <option value="none"></option>
                            <option value="none1" disabled>--Hãy chọn xã phường trước--</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Trạng Thái</label>
                        <select name="state"  class="form-control" id="state">
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
                    <option value="10">10</option>
                    <option value="25">20</option>
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
        <div class="mytable">
            <table  class="table table-stripper table-hover" id="table">

                <thead class="title-thead">
                    <tr>
                        
                        <th >STT</th>
                        <th >Tên Tự Viện</th>
                         <th >Địa Chỉ</th>
                        <th >Xã Phường </th>
                        <th >Quận Huyện</th>
                        <th >Trạng Thái</th>
                        <th >Trụ Trì</th>
                        <th >Phone</th>
                        <th>DS Tăng Ni</th>
                        <th>Chi Tiết</th>
                    </tr>
                </thead>
                <tbody class="title-tbody">
                    @php $i =1; @endphp
                    @foreach($tuvien as $tv)
                    <tr>
                        
                        <td>@php echo $i; $i++; @endphp</td>
                        <td>{{$tv->TuVien_Ten}}</td>
                         <td class="pre_hide">{{$tv->diachi}}</td>
                        <td>{{$tv->XaPhuong_Ten}}</td>
                        <td>{{$tv->QuanHuyen_Ten}}</td>
                        <td>{{$tv->TrangThai_Ten}}</td>
                        <td >{{$tv->trutri}}</td>
                       
                        <td class="prehide">{{$tv->phone}}</td>
                        <td class="center" align="center"><a href="admin/tangni/danhsach/{{$tv->TuVienID}}"><i class="fa fa-list" style="font-size: 20px; color: blue;"></i></a></td>
                        <td align="center" class="noshow">
                                <a  href="admincaptinh/tuvien/chitiet/{{$tv->TuVienID}}"class="delete-button"><i class="fa fa-info-circle" style="font-size: 18px"></i>
                                </a>
                            </td>
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
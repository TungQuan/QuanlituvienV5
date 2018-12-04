 $(".nav li a.title-ul").click(function(){
        var li = $(this).parent();
        if(li.children('ul').hasClass('action')){
            li.children('ul').slideUp("fast");
            li.children('ul').removeClass('action');
            li.children('a').children('span').css("transform","initial");
        }
        else{
            $(".nav li ul.action").slideUp("fast");
            $(".nav li ul.action").parent().children('a').children('span').css("transform","initial");
            $(".nav li ul.action").removeClass('action'); 
            li.children('ul').addClass('action');
            li.children('ul').slideDown("fast");
            li.children('a').children('span').css("transform","rotate(-90deg)");
        }
    });

$(document).ready(function () {    
    //탭메뉴
    $(".tab_content").hide();
	$(".tab_content").eq(0).show();


	$("ul.tabs li").click(function(){
		$("ul.tabs li").removeClass("active");
		$(this).addClass("active");
        $("p.follow").removeClass('on');
		$(".tab_content").hide();
		var tabid = $(this).attr("rel");
		$("#"+tabid).fadeIn();
	});
    
    //햄버거메뉴
    $(".ham").click(function() {
		$(".ham_menu").animate({"left":"0"}, 200);
        $(".back_bg").show();
		$("body").css({"overflow":"hidden","position":"fixed"});
	});
	
	$(".close, .back_bg").click(function() {
		$(".ham_menu").animate({"left":"-70%"}, 200);
        $(".back_bg").hide();
		$("body").css({"overflow":"auto","position":"static"});	
	});

});

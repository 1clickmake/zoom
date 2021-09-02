<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(G5_COMMUNITY_USE === false) {
    define('G5_IS_COMMUNITY_PAGE', true);
    include_once(G5_THEME_SHOP_PATH.'/shop.head.php');
    return;
}

include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
if(defined('_INDEX_')) { // index에서만 실행
    include G5_MOBILE_PATH.'/newwin.inc.php'; // 팝업레이어
}
?>
<style>
#search-box{position:fixed; width:100%; height:100%; left:0; right:0; background:rgba(0,0,0,0.92); z-index:999; display:none;}
#search-box .search-div{position:relative; top:40%; width:80%; margin:0 auto;}
#search-box .search-div .sch_stx{display:block; position:relative; border:0; border-bottom:1px solid #ddd; background:none; font-size:1.4em; color:#fff; width:100%; padding:10px;}
#search-box .search-div .search_submit{position:absolute; top:0; right:0; border:0; font-size:1.8em; color:#ddd; background:none;}
#search-box .search-close{position:absolute; right:26px; top:20px; color:#fff; font-size:1.8em;}
</style>
<script> 
$(document).ready(function(){
	$(".search-view, .search-close").click(function(){
		$("#search-box").slideToggle();
	}); 
});
</script>

<div id="search-box">
	<a href="javascript:void(0);" class="search-close"><i class="fa fa-times" aria-hidden="true"></i></a>
	<div class="search-div" >
		
		<form name="fsearchbox" action="<?php echo G5_BBS_URL ?>/search.php" onsubmit="return fsearchbox_submit(this);" method="get">
                <input type="hidden" name="sfl" value="wr_subject||wr_content">
                <input type="hidden" name="sop" value="and">
                <input type="text" name="stx" class="sch_stx text-center" placeholder="Search" required maxlength="20">
                <button type="submit" value="검색" class="search_submit"><i class="fa fa-search" aria-hidden="true"></i><span class="sound_only">검색</span></button>
                </form>

                <script>
                function fsearchbox_submit(f)
                {
                    if (f.stx.value.length < 2) {
                        alert("검색어는 두글자 이상 입력하십시오.");
                        f.stx.select();
                        f.stx.focus();
                        return false;
                    }

                    // 검색에 많은 부하가 걸리는 경우 이 주석을 제거하세요.
                    var cnt = 0;
                    for (var i=0; i<f.stx.value.length; i++) {
                        if (f.stx.value.charAt(i) == ' ')
                            cnt++;
                    }

                    if (cnt > 1) {
                        alert("빠른 검색을 위하여 검색어에 공백은 한개만 입력할 수 있습니다.");
                        f.stx.select();
                        f.stx.focus();
                        return false;
                    }

                    return true;
                }
                </script>
	</div>
</div>
<header class="bg-white clearfix">
	<div class="top_menu clearfix">
        <div class="ham"><a href="#" class="full"></a></div>
        <div class="logo"><a href="<?php echo G5_URL?>"><img src="<?php echo G5_THEME_URL?>/images/gible-logo.png"></a></div>
        <ul class="menu">
            <li><a href="<?php echo get_pretty_url('courses');?>">Courses</a></li>
            <li><a href="<?php echo G5_URL?>/page/Become_a_Teacher.php">Become a Teacher</a></li>
            <li><a href="<?php echo G5_URL?>/page/About_Us.php">About Us</a></li>
            <li><a href="<?php echo get_pretty_url('qa');?>">FAQ</a></li>
            <a href="#" class="close"></a>
        </ul>        
        <div class="my_box">
			<?php if($is_member){?>
            <div class="login" style="background:#EC0088;">
			<a href="javascript:void(0);" class="full SignIn">
                <img src="<?php echo G5_THEME_URL?>/images/login-icon.png">
                Profile
            </a>
			</div>
			<?php } else{ ?>
			<div class="login">
			<a href="javascript:void(0);" class="full SignIn">
                <img src="<?php echo G5_THEME_URL?>/images/login-icon.png">
                Login
            </a>
			</div>
			<?php } ?>
            <div class="search"><a href="#" class="full search-view"><img src="<?php echo G5_THEME_URL?>/images/search-icon.png"></a></div>
        </div> 
	</div>
		
    <ul class="ham_menu">
        <li><a href="<?php echo get_pretty_url('courses');?>">Courses</a></li>
        <li><a href="<?php echo G5_URL?>/page/Become_a_Teacher.php">Become a Teacher</a></li>
        <li><a href="<?php echo G5_URL?>/page/About_Us.php">About Us</a></li>
		<li><a href="<?php echo get_pretty_url('qa');?>" class="text-danger">FAQ</a></li>
        <a href="#" class="close"></a>
    </ul>
	
	<div class="back_bg"></div>
</header>


<div id="wrapper">
<?php 
if(defined('_INDEX_')) {
    include_once(G5_THEME_PATH.'/include/main_swiper.php');
}else{
    include_once(G5_THEME_PATH.'/include/sub_swiper.php');
}
?><!--courses-latest--><!--slide-->	
</div>
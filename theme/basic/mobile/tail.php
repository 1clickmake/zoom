<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(G5_COMMUNITY_USE === false) {
    include_once(G5_THEME_SHOP_PATH.'/shop.tail.php');
    return;
}

?>
</div>

<?php if(!defined('_INDEX_')) {?>
<section id="BecomeTeacher" class="bg-primary pt-5 pb-5 text-white">
    <div class="container h-100 pt-5 pb-5">
        <div class="row d-flex h-100 justify-content-center text-center text-white py-5">
            <div class="col-md-8">
                <h1 class="pb-2 display-4 font-weight-bold" style="font-weight:700;">Become a Teacher</h1>
                <div class=" mt-3 text1_8" >Join our community of students around the word and sell ypur courses</div>
                <a href="<?php echo G5_URL;?>/page/Become_a_Teacher.php" class="btn btn-round btn-lg btn-dark shadow-lg  mt-4 text-white">Learn More <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</section>
<?php } ?>

<footer id="ft">
        <div class="top inner">
            <ul>
                <li class="contact">
                    <p class="tit">Contact</p>
                    <div>
                        <p>Email: contact@pluscope.com</p>
                        <p>Address: Paju-si, South Korea</p>
                    </div>
                </li>
                <li class="company">
                    <p class="tit">Company</p>
                    <div>
                        <a href="<?php echo G5_URL?>/page/About_Us.php">About Us</a>
                        <a href="<?php echo get_pretty_url('qa');?>">Contact</a>
                    </div>
                </li>
                <li class="links">
                    <p class="tit">Useful Links</p>
                    <div>
                        <a href="<?php echo get_pretty_url('courses');?>">Courses</a>
                        <a href="<?php echo G5_URL?>/page/Become_a_Teacher.php">Become a Teacher</a>
                        <a href="<?php echo get_pretty_url('qa');?>">FAQ</a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="bottom">
            <div class="inner">
                <p class="copy">© Gible. Powered by Pluscope. All Rights Reserved.</p>
                <p class="f_menu">
                    <a href="#">Privacy & Terms</a>
                    <a href="#">Sitemap</a>
                </p>
            </div>
        </div>
    <button type="button" id="top_btn">
    	<i class="fa fa-arrow-up" aria-hidden="true"></i><span class="sound_only">상단으로</span>
    </button>
</footer>
<?php include_once(G5_LIB_PATH.'/outlogin.modal.lib.php'); ?>
<script>
    var swiper = new Swiper(".mySwiper", {
        loop: true,
        navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
        },
    });
</script>

<script>
jQuery(function($) {

    $( document ).ready( function() {

        // 폰트 리사이즈 쿠키있으면 실행
        font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
        
        //상단고정
        /* if( $(".top").length ){
            var jbOffset = $(".top").offset();
            $( window ).scroll( function() {
                if ( $( document ).scrollTop() > jbOffset.top ) {
                    $( '.top' ).addClass( 'fixed' );
                }
                else {
                    $( '.top' ).removeClass( 'fixed' );
                }
            });
        } */

        //상단으로
        $("#top_btn").on("click", function() {
            $("html, body").animate({scrollTop:0}, '500');
            return false;
        });

    });
});
</script>

<?php
include_once(G5_THEME_PATH."/tail.sub.php");
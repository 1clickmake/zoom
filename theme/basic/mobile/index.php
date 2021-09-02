<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(G5_COMMUNITY_USE === false) {
    include_once(G5_THEME_MSHOP_PATH.'/index.php');
    return;
}

include_once(G5_THEME_MOBILE_PATH.'/head.php');
?>

	<div id="content">


        <div class="courses inner">
            <div class="top">
                <p class="tit">Online Courses</p>
                <a href="<?php echo get_pretty_url('courses');?>">View All Courses<img src="<?php echo G5_THEME_URL?>/images/arrow.png"></a>
            </div>

            <?php include_once(G5_THEME_PATH.'/include/course_latest.php');?><!--courses-latest-->
        </div><!--courses-->


        <div class="learn">
            <div class="inner">
                <div class="top">
                    <p class="tit">4 Steps to Learn</p>
                    <a href="#">Learn More<img src="<?php echo G5_THEME_URL?>/images/arrow.png"></a>
                </div>
                <div class="tabs_wrap">
                    <ul class="tabs">
                        <li class="active" rel="tab1"><a href="javascript:void(0);" class="full"><p>Join<p></p></a></li>
                        <li rel="tab2"><a href="javascript:void(0);" class="full"><p>Register</p></a></li>
                        <li rel="tab3"><a href="javascript:void(0);" class="full"><p>Choose</p></a></li>
                        <li rel="tab4"><a href="javascript:void(0);" class="full"><p>Learn</p></a></li>
                    </ul>
                    <div class="tab_wrap">
                        <div id="tab1" class="tab_content">
                            <p class="tit">Start Your Learning Progress</p>	
                            <p class="art">Each teacher provides every details and documents needed for your learning. You can start your lessons by clicking it at the content side-bar. Every lessons are prepared with texts, videos, images, presentation, and even Zoom. All you need to learn, are here with Gible.vtt</p>
                        </div><!--tab1-->
                        <div id="tab2" class="tab_content">
                            <p class="tit">Step2</p>	
                            <p class="art">Each teacher provides every details and documents needed for your learning. You can start your lessons by clicking it at the content side-bar. Every lessons are prepared with texts, videos, images, presentation, and even Zoom. All you need to learn, are here with Gible.vtt</p>
                        </div><!--tab2-->
                        <div id="tab3" class="tab_content">
                            <p class="tit">Step3</p>	
                            <p class="art">Each teacher provides every details and documents needed for your learning. You can start your lessons by clicking it at the content side-bar. Every lessons are prepared with texts, videos, images, presentation, and even Zoom. All you need to learn, are here with Gible.vtt</p>
                        </div><!--tab2-->
                        <div id="tab4" class="tab_content">
                            <p class="tit">Step4</p>	
                            <p class="art">Each teacher provides every details and documents needed for your learning. You can start your lessons by clicking it at the content side-bar. Every lessons are prepared with texts, videos, images, presentation, and even Zoom. All you need to learn, are here with Gible.vtt</p>
                        </div><!--tab2-->
                    </div><!--tab_wrap-->		
                </div><!--tabs_wrap-->
            </div>
        </div><!--learn--> 

        <?php include_once(G5_THEME_PATH.'/include/newsletter.php');?><!--news-->

    </div><!--content-->

<?php
include_once(G5_THEME_MOBILE_PATH.'/tail.php');
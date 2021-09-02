<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

$mb_img_path  = G5_DATA_PATH.'/member_image/'.substr($view['mb_id'],0,2).'/'.$view['mb_id'].'.gif';

$is_file_exist = file_exists($mb_img_path);
if ($is_file_exist) {
    $mb_img_url  = G5_DATA_URL.'/member_image/'.substr($view['mb_id'],0,2).'/'.$view['mb_id'].'.gif';
}
else {
    $mb_img_url  = G5_IMG_URL.'/member_not_img.jpg';
}

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>
<style>
.file-img img{width:100%;}
</style>
<script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>

<!-- 게시물 읽기 시작 { -->

<article id="bo_v" class="container pb-5">
    <header class="mb-3">
        <h5 style="font-size:3vh; font-weight:700;">
            <?php if ($category_name) { ?>
            <span class="bo_v_cate">[<?php echo $view['ca_name']; // 분류 출력 끝 ?>]</span>  
            <?php } ?>
            <span class="bo_v_tit">
            <?php
            echo cut_str(get_text($view['wr_subject']), 70); // 글제목 출력
            ?></span>
        </h5>
    </header>

    <section id="bo_v_info" class="mt-2 clearfix d-none">
       
        <strong class="if_date"><span class="sound_only">작성일</span><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo date("y-m-d H:i", strtotime($view['wr_datetime'])) ?></strong>

    </section>

    <div class="row">
        <div class="col-12 col-md-9">
            <div class="card w-100 border border-dark">
                <div class="file-img">
                <?php
                    // 첫번째 이미지 출력
                    if ($view['file'][0]['view']) {
                        echo get_view_thumbnail($view['file'][0]['view']);
                    }else{
                        echo '<img src="https://www.studyinnewzealand.govt.nz/themes/default/img/studies/bg-step-1.png" class="card-img-top" alt="...">';
                    }
                ?>
                </div>
            
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col-3"><img src="<?php echo $mb_img_url?>" alt="." class="rounded-circle img-fluid"></div>
                                <div class="col-9">
                                    <p>teacher</p>
                                    <h3 class="text-primary" style="font-size:1.8em;"><?php  echo $view['wr_name'];?></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="border-start border-end border-dark px-3">
                                <p>Categories</p>
                                <h2 style="font-size:2.4em;"><?php echo $view['ca_name'];?></h2>
                            </div>
                            
                        </div>
                        <div class="col">
                            <a href="<?php echo $view['wr_link1']?>" target="_blank" class="btn btn-primary btn-lg btn-block w-100 text-white"><i class="fa fa-video-camera fa-2x" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="d-none d-md-block col-md-3 follow-scroll">
            <div class="bg-white">
                <div class="border border-dark p-2">
                    <h2 class="text-primary text-center" style="font-size:2.4em; font-weight:700;">Free</h2>
                    <div class="mt-5">
                        <a href="<?php echo $view['wr_link1'];?>" target="_blank" class="btn btn-block btn-large w-100 bg-dark text-white rounded-pill">Take This Course</a>
                    </div>
                </div>

                <div class="mt-3 border border-dark p-2" style="font-size:2.0em;">
                    <a href="#Overview" class="d-block py-1">Overview</a>
                    <a href="#Curriculum" class="d-block py-1">Curriculum</a>
                    <a href="#Teacher" class="d-block py-1">Teacher</a>
                </div>
            </div>
        </div>
    </div>

    <section id="Overview" class="pt-5 pb-0">
        <div class="row text-left d-flex align-items-center">
            <div class="col-12">
                <div class="">
                    <h2 class="mb-3" style="font-size:3.0em; font-weight:700;">Overview</h2>

                    <h3 class="mt-3" style="font-size:2.0em; font-weight:700;">Course Description</h3>
                    <div style="font-size:1.6em;"><?php echo $view['wr_1'];?>***</div>
                    
                    <h3 class="mt-3" style="font-size:2.0em; font-weight:700;">Certification</h3>
                    <div style="font-size:1.6em;"><?php echo $view['wr_2'];?></div>

                    <h3 class="mt-3" style="font-size:2.0em; font-weight:700;">Learning Outcomes</h3>
                    <div style="font-size:1.6em;"><?php echo $view['wr_content'];?></div>
                </div>
            </div>
        </div>
    </section>

    <section id="Curriculum" class="mt-5 pt-5 pb-0  border-top border-dark">
        <div class="row text-left d-flex align-items-center">
            <div class="col-12">
                <div class="">
                    <h2 class="mb-3" style="font-size:3.0em; font-weight:700;">Crurriculum</h2>

                    <div style="font-size:1.6em;"><?php echo $view['wr_3'];?>-<?php echo $view['wr_4'];?>-<?php echo $view['wr_5'];?> <?php echo $view['wr_6'];?>:<?php echo $view['wr_7'];?></div>

                    <div style="font-size:1.6em;"><?php echo $view['wr_8'];?> Minute</div>

                    <?php
                    $cnt = 0;
                    if ($view['file']['count']) {
                        for ($i=0; $i<count($view['file']); $i++) {
                            if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view'])
                                $cnt++;
                        }
                    }
                    ?>

                    <?php if($cnt) { ?>
                    <!-- 첨부파일 시작 { -->
                    <section id="bo_v_file">
                        <h2>File Download</h2>
                        <ul>
                        <?php
                        // 가변 파일
                        for ($i=0; $i<count($view['file']); $i++) {
                            if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view']) {
                        ?>
                            <li>
                                <i class="fa fa-download" aria-hidden="true"></i>
                                <a href="<?php echo $view['file'][$i]['href'];  ?>" class="view_file_download">
                                    <strong><?php echo $view['file'][$i]['source'] ?></strong>
                                </a>
                                <?php echo $view['file'][$i]['content'] ?> (<?php echo $view['file'][$i]['size'] ?>)
                                <span class="bo_v_file_cnt"><?php echo $view['file'][$i]['download'] ?>회 다운로드 | DATE : <?php echo $view['file'][$i]['datetime'] ?></span>
                            </li>
                        <?php
                            }
                        }
                        ?>
                        </ul>
                    </section>
                    <!-- } 첨부파일 끝 -->
                    <?php } ?>
                    
                </div>
            </div>
        </div>
    </section>

    <section id="Teacher" class="mt-5 pt-5 pb-0 border-top border-dark">
        <h2 class="mb-3" style="font-size:3.0em; font-weight:700;">Teacher</h2>
        <div class="row text-left d-flex align-items-center">
            <div class="col-12 col-md-2">
                <div class="card w-100 border-0">
                    <img src="<?php echo $mb_img_url?>" alt="." class="rounded-circle img-fluid">  
                
                    <div class="card-body">
                        <h3 class="mt-3 text-primary" style="font-size:2.0em;"><?php  echo $view['wr_name'];?></h3>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-10">
                <h3 class="" style="font-size:2.0em; font-weight:700;">Career</h3>
                <div style="font-size:1.6em;">tearch  Career content</div>

                 <!-- 게시물 상단 버튼 시작 { -->
                <div class="mt-4">
                    <?php
                    ob_start();
                    ?>
                    <div class="row">
                        <div class="col mb-2">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <?php if ($update_href) { ?><a href="<?php echo $update_href ?>" class="btn btn-outline-danger text14"><i class="fa fa-pencil-square-o"></i> 수정</a><?php } ?>
                            <?php if ($delete_href) { ?><a href="<?php echo $delete_href ?>" class="btn btn-outline-danger text14" onclick="del(this.href); return false;"><i class="fa fa-trash-o"></i> 삭제</a><?php } ?>
                        </div>
                        </div>

                        <div class="col mb-2 text-end">
                        <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="<?php echo $list_href ?>" class="btn btn-outline-secondary text14"><i class="fa fa-list"></i> 목록</a>
                            <?php if ($write_href) { ?><a href="<?php echo $write_href ?>" class="btn btn-primary text14 text-white"><i class="fa fa-pencil"></i> 글쓰기</a><?php } ?>
                        </div>
                        </div>
                    </div>
                    
                    <?php
                    $link_buttons = ob_get_contents();
                    ob_end_flush();
                    ?>
                </div>
                <!-- } 게시물 상단 버튼 끝 -->

            </div>
        </div>
    </section>


    

    

    

    <?php
    // 코멘트 입출력
    include_once(G5_BBS_PATH.'/view_comment.php');
     ?>


</article>
<!-- } 게시판 읽기 끝 -->

<script>
(function($) {
    var element = $('.follow-scroll'),
        originalY = element.offset().top;
        otherDiv = 1000,
        staticHeight = $('.other-div').height()-$(element).height(); 
    
    // Space between element and top of screen (when scrolling)
    var topMargin = 10;
    
    // Should probably be set in CSS; but here just for emphasis
    element.css('position', 'relative');
    
    $(window).on('scroll', function(event) {
        var scrollTop = $(window).scrollTop();
        
        element.stop(false, false).animate({
            top: scrollTop < originalY
                    ? 0
                    : scrollTop - originalY + topMargin
        }, 10);

        if(scrollTop > 2000){
            element.stop();
        }
    });
})(jQuery);
</script>
<script>
<?php if ($board['bo_download_point'] < 0) { ?>
$(function() {
    $("a.view_file_download").click(function() {
        if(!g5_is_member) {
            alert("다운로드 권한이 없습니다.\n회원이시라면 로그인 후 이용해 보십시오.");
            return false;
        }

        var msg = "파일을 다운로드 하시면 포인트가 차감(<?php echo number_format($board['bo_download_point']) ?>점)됩니다.\n\n포인트는 게시물당 한번만 차감되며 다음에 다시 다운로드 하셔도 중복하여 차감하지 않습니다.\n\n그래도 다운로드 하시겠습니까?";

        if(confirm(msg)) {
            var href = $(this).attr("href")+"&js=on";
            $(this).attr("href", href);

            return true;
        } else {
            return false;
        }
    });
});
<?php } ?>

function board_move(href)
{
    window.open(href, "boardmove", "left=50, top=50, width=500, height=550, scrollbars=1");
}
</script>

<script>
$(function() {
    $("a.view_image").click(function() {
        window.open(this.href, "large_image", "location=yes,links=no,toolbar=no,top=10,left=10,width=10,height=10,resizable=yes,scrollbars=no,status=no");
        return false;
    });

    // 추천, 비추천
    $("#good_button, #nogood_button").click(function() {
        var $tx;
        if(this.id == "good_button")
            $tx = $("#bo_v_act_good");
        else
            $tx = $("#bo_v_act_nogood");

        excute_good(this.href, $(this), $tx);
        return false;
    });

    // 이미지 리사이즈
    $("#bo_v_atc").viewimageresize();

    //sns공유
    $(".btn_share").click(function(){
        $("#bo_v_sns").fadeIn();
   
    });

    $(document).mouseup(function (e) {
        var container = $("#bo_v_sns");
        if (!container.is(e.target) && container.has(e.target).length === 0){
        container.css("display","none");
        }	
    });
});

function excute_good(href, $el, $tx)
{
    $.post(
        href,
        { js: "on" },
        function(data) {
            if(data.error) {
                alert(data.error);
                return false;
            }

            if(data.count) {
                $el.find("strong").text(number_format(String(data.count)));
                if($tx.attr("id").search("nogood") > -1) {
                    $tx.text("이 글을 비추천하셨습니다.");
                    $tx.fadeIn(200).delay(2500).fadeOut(200);
                } else {
                    $tx.text("이 글을 추천하셨습니다.");
                    $tx.fadeIn(200).delay(2500).fadeOut(200);
                }
            }
        }, "json"
    );
}
</script>
<!-- } 게시글 읽기 끝 -->



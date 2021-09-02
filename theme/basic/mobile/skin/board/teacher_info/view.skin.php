<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);

$wr6 = explode("|", $view['wr_6']);
$wr11 = explode("|", $view['wr_11']);
$wr12 = explode("|", $view['wr_12']);
$wr14 = explode("|", $view['wr_14']);
$wr19 = explode("|", $view['wr_19']);
?>
<style>
#BecomeTeacher{display:none;}
.file-img img{width:100%; height:auto; border-radius:50%;}
.sub-titles{font-size:2.0em !important; font-weight:700; padding:10px 0;}
.table p{font-size:1.1em; color:var(--bs-teal); margin-bottom:7px;}
.table div{font-size:1.1em;}
</style>
<script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>

<!-- 게시물 읽기 시작 { -->

<article id="bo_v" class="container pb-5 text15">
    <header class="mb-3">
        <h5 style="font-size:2.2em; font-weight:700;">
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

    <section id="4-1">
        <h2 class="sub-titles mb-4 sound_only">Teacher Information</h2>
        <div class="row mt-5">
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="file-img mb-2 text-center">
                <?php
                    // 첫번째 이미지 출력
                    if ($view['file'][0]['view']) {
                        echo get_view_thumbnail($view['file'][0]['view']);
                    }else{
                        echo '<img src="'.G5_IMG_URL.'/teacher.png" class="rounded-circle card-img-top" alt="...">';
                    }
                ?>
                </div>
            </div>
            <div class="col-md-8">
            <table class="table">
                <tbody>
                    
                    <tr>
                        <td>
                            <p>Full Name</p>
                            <div><?php echo $view['wr_name'] ?></div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <p>Email Address</p>
                            <div><?php echo $view['wr_email'] ?></div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <p>Country of Residence</p>
                            <div><?php echo $view['wr_1']; ?></div>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <p>State or City of Residence</p>
                            <div><?php echo $view['wr_2']; ?></div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <p>Field of Expertise or Formal Volunteer Experiences</p>
                            <div><?php echo $view['wr_3']; ?></div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <p>LinkedIn (if you have)</p>
                            <div><?php echo $view['wr_4']; ?></div>
                        </td>
                    </tr>

                </tbody>
            </table>
            </div>
            
        </div>

    </section>




    <section id="4-2" class="mt-5">
        <h2 class="sub-titles">Teaching Information</h2>

        <table class="table">
            <tbody>
                <tr>
                    <td>
                        <p>One term consists of 8 weeks on Gible. Could you commit your time to a minimum of 8 weeks? (At least one hour a week)</p>
                        <div class="row">
                            <div class="col-auto">
                                <input type="radio" name="wr_5" value="Yes" <?php if( $view['wr_5'] == "Yes") echo "checked"; else echo "disabled";?> id="wr_5_1">
                                <label for="wr_5_1">Yes</label>
                            </div>
                            <div class="col-auto">
                                <input type="radio" name="wr_5" value="No" <?php if( $view['wr_5'] == "No") echo "checked"; else echo "disabled";?> id="wr_5_2" >
                                <label for="wr_5_2">No</label>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <p>What would you like to teach? (You can choose more than one option.)</p>
                        <div class="row mb-3">
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="checkbox" name="wr_6_1" value="Basic" <?php if( $wr6[0]== "Basic") echo "checked"; else echo "disabled";?> id="wr_6_1" >
                                <label for="wr_6_1">Basic English</label>
                            </div>
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="checkbox" name="wr_6_2" value="Bible" <?php if( $wr6[1]== "Bible") echo "checked"; else echo "disabled";?> id="wr_6_2">
                                <label for="wr_6_2">Bible with English</label>
                            </div>
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="checkbox" name="wr_6_3" value="IT" <?php if( $wr6[2]== "IT") echo "checked"; else echo "disabled";?> id="wr_6_3">
                                <label for="wr_6_3">IT Skills (MS Word/Excel/PowerPoint)</label>
                            </div>
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="checkbox" name="wr_6_4" value="Korean" <?php if( $wr6[3]== "Korean") echo "checked"; else echo "disabled";?> id="wr_6_4">
                                <label for="wr_6_4">Korean Language</label>
                            </div>
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="checkbox" name="wr_6_5" value="Job" <?php if( $wr6[4]== "BJobasic") echo "checked"; else echo "disabled";?> id="wr_6_5">
                                <label for="wr_6_5">Job Mentoring</label>
                            </div>
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="checkbox" name="wr_6_6" value="etc" <?php if( $wr6[5]== "etc") echo "checked"; else echo "disabled";?> id="wr_6_6">
                                <label for="wr_6_6">etc</label>
                            </div>
                        </div>
                        <?php if(isset($view['wr_7'])){?><div><?php echo $view['wr_7']; ?></div><?php } ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <p>Are you willing to make your own class materials?</p>
                        <div class="row">
                            <div class="col-auto">
                                <input type="radio" name="wr_8" value="Yes" <?php if( $view['wr_8'] == "Yes") echo "checked"; else echo "disabled";?> id="wr_8_1" >
                                <label for="wr_8_1">Yes</label>
                            </div>
                            <div class="col-auto">
                                <input type="radio" name="wr_8" value="No" <?php if( $view['wr_8'] == "No") echo "checked"; else echo "disabled";?> id="wr_8_2">
                                <label for="wr_8_2">No</label>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <p>How many hours a week are you willing to teach? </p>
                        <div class="row mb-3">
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="radio" name="wr_9" value="1hour" <?php if( $view['wr_9'] == "1hour") echo "checked"; else echo "disabled";?> id="wr_9_1" >
                                <label for="wr_9_1">1 hour</label>
                            </div>
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="radio" name="wr_9" value="2hours" <?php if( $view['wr_9'] == "2hours") echo "checked"; else echo "disabled";?> id="wr_9_2">
                                <label for="wr_9_2">2 hours</label>
                            </div>
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="radio" name="wr_9" value="3hours" <?php if( $view['wr_9'] == "3hours") echo "checked"; else echo "disabled";?> id="wr_9_3">
                                <label for="wr_9_3">3 hours</label>
                            </div>
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="radio" name="wr_9" value="4hours" <?php if( $view['wr_9'] == "4hours") echo "checked"; else echo "disabled";?> id="wr_9_4">
                                <label for="wr_9_4">4 hours</label>
                            </div>
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="radio" name="wr_9" value="5hours" <?php if( $view['wr_9'] == "5hours") echo "checked"; else echo "disabled";?> id="wr_9_5">
                                <label for="wr_9_5">5 hours</label>
                            </div>
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="radio" name="wr_9" value="etc" <?php if( $view['wr_9'] == "etc") echo "checked"; else echo "disabled";?> id="wr_9_6">
                                <label for="wr_9_6">etc</label>
                            </div>
                        </div>
                        <?php if(isset($view['wr_10'])){?><div><?php echo $view['wr_10']; ?></div><?php } ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <p>When is your available time slot to teach? (You can choose more than one option.)</p>
                        <div class="row">
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="checkbox" name="wr_11_1" value="12am-4am"  <?php if( $wr11[0] == "12am-4am") echo "checked"; else echo "disabled";?> id="wr_11_1" >
                                <label for="wr_11_1">12am - 4am</label>
                            </div>
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="checkbox" name="wr_11_2" value="4am-8am"  <?php if( $wr11[1] == "4am-8am") echo "checked"; else echo "disabled";?> id="wr_11_2">
                            <label for="wr_11_2">4am - 8am</label>
                                </div>
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="checkbox" name="wr_11_3" value="8am-12pm"  <?php if( $wr11[2] == "8am-12pm") echo "checked"; else echo "disabled";?> id="wr_11_3">
                                <label for="wr_11_3">8am - 12pm</label>
                            </div>
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="checkbox" name="wr_11_4" value="12pm-4pm"  <?php if( $wr11[3] == "12pm-4pm") echo "checked"; else echo "disabled";?> id="wr_11_4">
                                <label for="wr_11_4">12pm - 4pm</label>
                            </div>
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="checkbox" name="wr_11_5" value="4pm-8pm"  <?php if( $wr11[4] == "4pm-8pm") echo "checked"; else echo "disabled";?> id="wr_11_5">
                                <label for="wr_11_5">4pm - 8pm</label>
                            </div>
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="checkbox" name="wr_11_6" value="8pm-12am"  <?php if( $wr11[5] == "8pm-12am") echo "checked"; else echo "disabled";?> id="wr_11_6">
                                <label for="wr_11_6">8pm - 12am</label>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <p>Do you have the age preference of students? (You can choose more than one option.)</p>
                        <div class="row mb-3">
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="checkbox" name="wr_12_1" value="Elementary" <?php if( $wr12[0] == "Elementary") echo "checked"; else echo "disabled";?> id="wr_12_1" >
                                <label for="wr_12_1">Elementary School Students (5-10 years-old)</label>
                            </div>
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="checkbox" name="wr_12_2" value="Middle" <?php if( $wr12[1] == "Middle") echo "checked"; else echo "disabled";?> id="wr_12_2">
                                <label for="wr_12_2">Middle School Students (11-13 years-old)</label>
                            </div>
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="checkbox" name="wr_12_3" value="High" <?php if( $wr12[2] == "High") echo "checked"; else echo "disabled";?> id="wr_12_3">
                                <label for="wr_12_3">High School Students (14-18 years-old)</label>
                            </div>
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="checkbox" name="wr_12_4" value="College" <?php if( $wr12[3] == "College") echo "checked"; else echo "disabled";?> id="wr_12_4">
                                <label for="wr_12_4">College Students (18-25 years-old)</label>
                            </div>
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="checkbox" name="wr_12_5" value="etc" <?php if( $wr12[4] == "etc") echo "checked"; else echo "disabled";?> id="wr_12_5">
                                <label for="wr_12_5">etc</label>
                            </div>
                        </div>
                        <?php if(isset($view['wr_13'])){?><div><?php echo $view['wr_13']; ?></div><?php } ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <p>How many students can you handle in one class? (You can choose more than one option.)</p>
                        <div class="row mb-3">
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="checkbox" name="wr_14_1" value="1-3" <?php if( $wr14[0] == "1-3") echo "checked"; else echo "disabled";?> id="wr_14_1" >
                                <label for="wr_14_1">1-3 students</label>
                            </div>
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="checkbox" name="wr_14_2" value="4-6" <?php if( $wr14[1] == "4-6") echo "checked"; else echo "disabled";?>  id="wr_14_2">
                                <label for="wr_14_2">4-6 students</label>
                            </div>
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="checkbox" name="wr_14_3" value="etc" <?php if( $wr14[2] == "etc") echo "checked"; else echo "disabled";?>  id="wr_14_3">
                                <label for="wr_14_3">etc</label>
                            </div>
                        </div>
                        <div><?php echo $view['wr_15']; ?></div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <p>When can you start teaching? (Approximate date)</p>
                        <div ><?php echo $view['wr_17']; ?></div>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>



    <section id="4-3">
        <h2 class="sub-titles">Preference</h2>
        <table class="table">
        <tbody>
            <tr>
                <td>
                    <p>Do you have a country/continent you would like to teach?</p>
                    <div class="row">
                        <div class="col-auto">
                            <input type="radio" name="wr_18" value="Yes" <?php if( $view['wr_18'] == "Yes") echo "checked"; else echo "disabled";?> id="wr_18_1" >
                            <label for="wr_18_1">Yes</label>
                        </div>
                        <div class="col-auto">
                            <input type="radio" name="wr_18" value="No" <?php if( $view['wr_18'] == "No") echo "checked"; else echo "disabled";?> id="wr_18_2">
                            <label for="wr_18_2">No</label>
                        </div>
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <p>If you do, which country / continent would you like to teach? (You can choose more than one option.)</p>
                    <div class="row mb-3">
                        <div class="col-auto mb-2 mb-md-0">
                            <input type="checkbox" name="wr_19_1" value="Africa" <?php if( $wr19[0] == "Africa") echo "checked"; else echo "disabled";?> id="wr_19_1" >
                            <label for="wr_19_1">Africa</label>
                        </div>
                        <div class="col-auto mb-2 mb-md-0">
                            <input type="checkbox" name="wr_19_2" value="East" <?php if( $wr19[1] == "East") echo "checked"; else echo "disabled";?> id="wr_19_2">
                            <label for="wr_19_2">Middle East</label>
                        </div>
                        <div class="col-auto mb-2 mb-md-0">
                            <input type="checkbox" name="wr_19_3" value="Asia" <?php if( $wr19[2] == "Asia") echo "checked"; else echo "disabled";?> id="wr_19_3">
                            <label for="wr_19_3">Asia</label>
                        </div>
                        <div class="col-auto mb-2 mb-md-0">
                            <input type="checkbox" name="wr_19_4" value="America" <?php if( $wr19[3] == "America") echo "checked"; else echo "disabled";?> id="wr_19_4">
                            <label for="wr_19_4">South America</label>
                        </div>
                        <div class="col-auto mb-2 mb-md-0">
                            <input type="checkbox" name="wr_19_5" value="etc" <?php if( $wr19[4] == "etc") echo "checked"; else echo "disabled";?> id="wr_19_5">
                            <label for="wr_19_5">etc</label>
                        </div>
                    </div>
                    <?php if(isset($view['wr_20'])){?><div><?php echo $view['wr_20']; ?></div><?php } ?>
                </td>
            </tr>
        </tbody>
        </table>
    </section>

    <section id="4-4">
        <h2 class="sub-titles">Additional Information</h2>
        <table class="table">
        <tbody>
            <tr>
                <td class="wr_content">
                    <p>Feel free to ask any questions that you may have. We will get back to you as soon as possible. (Optional)</p>
                    <div class="text-dark"><?php echo $view['content'];?></div>
                </td>
            </tr>
        </tbody>
        </table>
    </section>

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
                        
                        <a href="<?php echo G5_URL; ?>" class="btn btn-outline-secondary text14"><i class="fa fa-home"></i> HOME</a>
                        <!--<?php if ($write_href) { ?><a href="<?php echo $write_href ?>" class="btn btn-primary text14 text-white"><i class="fa fa-pencil"></i> 글쓰기</a><?php } ?> -->
                        </div>
                        
                        </div>
                    </div>
                    
                    <?php
                    $link_buttons = ob_get_contents();
                    ob_end_flush();
                    ?>
                </div>
                <!-- } 게시물 상단 버튼 끝 -->


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



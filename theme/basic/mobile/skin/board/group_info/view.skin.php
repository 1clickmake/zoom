<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);

$wr6 = explode("|", $view['wr_6']);
$wr8 = explode("|", $view['wr_8']);
$wr10 = explode("|", $view['wr_10']);
$wr12 = explode("|", $view['wr_12']);
$wr15 = explode("|", $view['wr_15']);
$wr19 = explode("|", $view['wr_19']);
$wr22 = explode("|", $view['wr_22']);
?>
<style>
.file-img img{width:100%;}
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
		<h2 class="sub-titles mb-4 sound_only">Gible Class Request</h2>
		<div class="row mt-5">
			<div class="col-md-5 mb-3 mb-md-0">
                <div class="file-img mb-2 text-center">
                <?php
                    // 첫번째 이미지 출력
                    if ($view['file'][0]['view']) {
                        echo get_view_thumbnail($view['file'][0]['view']);
                    }else{
                        echo '<img src="'.G5_IMG_URL.'/bg-step-1.png" class="rounded-circle card-img-top" alt="...">';
                    }
                ?>
                </div>
            </div>
            <div class="col-md-7">
				<table class="table">
					<tbody>
						<tr>
							<td>
								<p>Full Name (The person who is filling out this form.)</p>
								<div><?php echo $view['wr_name'] ?></div>
							</td>
						</tr>
						
						<tr>
							<td>
								<p>Organization Name</p>
								<div><?php echo $view['wr_1']; ?></div>
							</td>
						</tr>
					
						<tr>
							<td>
								<p>Country (where the students are.)</p>
								<div><?php echo $view['wr_2']; ?></div>
							</td>
						</tr>

						<tr>
							<td>
								<p>City (where the students are.)</p>
								<div><?php echo $view['wr_3']; ?></div>
							</td>
						</tr>

						<tr>
							<td>
								<p>Contact Email</p>
								<div><?php echo $view['wr_email']; ?></div>
							</td>
						</tr>

						<tr>
							<td>
								<p>Phone Number (Optional)</p>
								<div><?php echo $view['wr_4']; ?></div>
							</td>
						</tr>

						<tr>
							<td>
								<p>Organization Website/SNS (ex. instagram, facebook, etc) (Optional)</p>
								<div><?php echo $view['wr_24']; ?></div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
    </section>


	<section id="4-2" class="mt-5">
        <h2 class="sub-titles">Student and Class information</h2>
        <table class="table">
			<tbody>
				<tr>
					<td>
						<p>How many students need learning?</p>
						<div class="row">
							<div class="col-auto">
								<input type="radio" name="wr_5" value="1" <?php if( $view['wr_5'] == "1") echo "checked"; else echo "disabled";?> id="wr_5_1" >
								<label for="wr_5_1">1-5</label>
							</div>
                            <div class="col-auto">
								<input type="radio" name="wr_5" value="6" <?php if( $view['wr_5'] == "6") echo "checked"; else echo "disabled";?> id="wr_5_2">
								<label for="wr_5_2">6-10</label>
							</div>
                            <div class="col-auto">
								<input type="radio" name="wr_5" value="11" <?php if( $view['wr_5'] == "11") echo "checked"; else echo "disabled";?> id="wr_5_3">
								<label for="wr_5_3">11-20</label>
							</div>
                            <div class="col-auto">
								<input type="radio" name="wr_5" value="21" <?php if( $view['wr_5'] == "21") echo "checked"; else echo "disabled";?> id="wr_5_4">
								<label for="wr_5_4">21-50</label>
							</div>
                            <div class="col-auto">
								<input type="radio" name="wr_5" value="51" <?php if( $view['wr_5'] == "51") echo "checked"; else echo "disabled";?> id="wr_5_5">
								<label for="wr_5_5">51-100</label>
							</div>
                            <div class="col-auto">
								<input type="radio" name="wr_5" value="100" <?php if( $view['wr_5'] == "100") echo "checked"; else echo "disabled";?> id="wr_5_6">
								<label for="wr_5_6">100+</label>
							</div>
						</div>
					</td>
				</tr>

				<tr>
					<td>
						<p>What grade are the the students?  (You can choose more than one option.)</p>
						<div class="row mb-3">
							<div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_6_1" value="Elementary" <?php if( $wr6[0]== "Elementary") echo "checked"; else echo "disabled";?> id="wr_6_1" >
								<label for="wr_6_1">Elementary School Students (5-10 years-old)</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_6_2" value="Middle" <?php if( $wr6[1]== "Middle") echo "checked"; else echo "disabled";?> id="wr_6_2">
								<label for="wr_6_2">Middle School Students (11-13 years-old)</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_6_3" value="High" <?php if( $wr6[2]== "High") echo "checked"; else echo "disabled";?> id="wr_6_3">
								<label for="wr_6_3">High School Students (14-18 years-old)</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_6_4" value="College" <?php if( $wr6[3]== "College") echo "checked"; else echo "disabled";?> id="wr_6_4">
								<label for="wr_6_4">College Students (18-25 years-old)1-50</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_6_5" value="Job" <?php if( $wr6[4]== "Job") echo "checked"; else echo "disabled";?> id="wr_6_5">
								<label for="wr_6_5">Job Mentoring / Job Training (18+)</label>
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
						<p>What types of classes do students need?  (You can choose more than one option.)</p>
						<div class="row mb-3">
							<div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_8_1" value="Basic" <?php if( $wr8[0]== "Basic") echo "checked"; else echo "disabled";?> id="wr_8_1" >
								<label for="wr_8_1">Basic English</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_8_2" value="Bible" <?php if( $wr8[1]== "Bible") echo "checked"; else echo "disabled";?> id="wr_8_2">
								<label for="wr_8_2">Bible Study in English</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_8_3" value="IT" <?php if( $wr8[2]== "IT") echo "checked"; else echo "disabled";?> id="wr_8_3">
								<label for="wr_8_3">IT Skills (MS Word/Excel/PowerPoint)</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_8_4" value="Korean" <?php if( $wr8[3]== "Korean") echo "checked"; else echo "disabled";?> id="wr_8_4">
								<label for="wr_8_4">Korean Language</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_8_5" value="Job" <?php if( $wr8[4]== "Job") echo "checked"; else echo "disabled";?> id="wr_8_5">
								<label for="wr_8_5">Job Mentoring</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_8_6" value="Professional" <?php if( $wr8[5]== "Professional") echo "checked"; else echo "disabled";?> id="wr_8_6">
								<label for="wr_8_6">Basic Professional Education for College Students (ex. nursing, medicine, etc.)</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_8_7" value="etc" <?php if( $wr8[6]== "etc") echo "checked"; else echo "disabled";?> id="wr_8_7">
								<label for="wr_8_7">etc</label>
							</div>
						</div>
						<?php if(isset($view['wr_9'])){?><div><?php echo $view['wr_9']; ?></div><?php } ?>
					</td>
				</tr>

				<tr>
					<td>
						<p>Where will the class be held?  (You can choose more than one option.)</p>
						<div class="row mb-3">
							<div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_10_1" value="School" <?php if( $wr10[0]== "School") echo "checked"; else echo "disabled";?> id="wr_10_1" >
								<label for="wr_10_1">School</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_10_2" value="Community" <?php if( $wr10[1]== "Community") echo "checked"; else echo "disabled";?> id="wr_10_2">
								<label for="wr_10_2">Community Center</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_10_3" value="Orphanage" <?php if( $wr10[2]== "Orphanage") echo "checked"; else echo "disabled";?> id="wr_10_3">
								<label for="wr_10_3">Orphanage</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_10_4" value="Church" <?php if( $wr10[3]== "Church") echo "checked"; else echo "disabled";?> id="wr_10_4">
								<label for="wr_10_4">Church</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_10_5" value="Home" <?php if( $wr10[4]== "Home") echo "checked"; else echo "disabled";?> id="wr_10_5">
								<label for="wr_10_5">Home</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_10_6" value="etc" <?php if( $wr10[5]== "etc") echo "checked"; else echo "disabled";?> id="wr_10_6">
								<label for="wr_10_6">etc</label>
							</div>
						</div>
						<?php if(isset($view['wr_11'])){?><div><?php echo $view['wr_11']; ?></div><?php } ?>
					</td>
				</tr>

				<tr>
					<td>
						<p>How many students will participate in one class?</p>
						<div class="row">
							<div class="col-auto">
								<input type="checkbox" name="wr_12_1" value="1" <?php if( $wr12[0]== "1") echo "checked"; else echo "disabled";?> id="wr_12_1" >
								<label for="wr_12_1">1-3 students</label>
							</div>
                            <div class="col-auto">
								<input type="checkbox" name="wr_12_2" value="4" <?php if( $wr12[1]== "4") echo "checked"; else echo "disabled";?> id="wr_12_2">
								<label for="wr_12_2">4-6 students</label>
							</div>
                            <div class="col-auto">
								<input type="checkbox" name="wr_12_3" value="7" <?php if( $wr12[2]== "7") echo "checked"; else echo "disabled";?> id="wr_12_3">
								<label for="wr_12_3">7-10 students</label>
							</div>
                            <div class="col-auto">
								<input type="checkbox" name="wr_12_4" value="10" <?php if( $wr12[3]== "10") echo "checked"; else echo "disabled";?> id="wr_12_4">
								<label for="wr_12_4">10+ students</label>
							</div>
						</div>
					</td>
				</tr>

				<tr>
					<td>
						<p>How many times a week would students like to take a class? (One term is 8 weeks)</p>
						<div class="row mb-3">
							<div class="col-auto mb-2 mb-md-0">
								<input type="radio" name="wr_13" value="Once" <?php if( $view['wr_13']== "Once") echo "checked"; else echo "disabled";?> id="wr_13_1" >
								<label for="wr_13_1">Once a week</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="radio" name="wr_13" value="Twice" <?php if( $view['wr_13']== "Twice") echo "checked"; else echo "disabled";?> id="wr_13_2">
								<label for="wr_13_2">Twice a week</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="radio" name="wr_13" value="Three" <?php if( $view['wr_13']== "Three") echo "checked"; else echo "disabled";?> id="wr_13_3">
								<label for="wr_13_3">Three times a week</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="radio" name="wr_13" value="Short" <?php if( $view['wr_13']== "Short") echo "checked"; else echo "disabled";?> id="wr_13_4">
								<label for="wr_13_4">Short-term online camp</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="radio" name="wr_13" value="etc" <?php if( $view['wr_13']== "etc") echo "checked"; else echo "disabled";?> id="wr_13_5">
								<label for="wr_13_5">etc</label>
							</div>
						</div>
						<?php if(isset($view['wr_14'])){?><div><?php echo $view['wr_14']; ?></div><?php } ?>
					</td>
				</tr>

				<tr>
					<td>
						<p>Which time slot do the students prefer?  (You can choose more than one option.)</p>
						<div class="row mb-3">
							<div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_15_1" value="9" <?php if( $wr15[0]== "9") echo "checked"; else echo "disabled";?> id="wr_15_1" >
								<label for="wr_15_1">9am - 12pm</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_15_2" value="12" <?php if( $wr15[1]== "12") echo "checked"; else echo "disabled";?> id="wr_15_2">
								<label for="wr_15_2">12pm - 3pm</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_15_3" value="3" <?php if( $wr15[2]== "3") echo "checked"; else echo "disabled";?> id="wr_15_3">
								<label for="wr_15_3">3pm - 6pm</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_15_4" value="etc" <?php if( $wr15[3]== "etc") echo "checked"; else echo "disabled";?> id="wr_15_4">
								<label for="wr_15_4">etc</label>
							</div>
						</div>
						<?php if(isset($view['wr_16'])){?><div><?php echo $view['wr_16']; ?></div><?php } ?>
					</td>
				</tr>

				<tr>
					<td>
						<p>When can you start class? (Approximate date)</p>
						<div><?php echo $view['wr_17']; ?></div>
					</td>
				</tr>
			</tbody>
        </table>
    </section>


	<section id="4-3">
		<h2 class="sub-titles">Internet & Computer Setting</h2>
        <p>We would like to know the Internet, electricity, and computer situations for Gible classes.</p>
        <table class="table">
			<tbody>
				<tr>
					<td>
						<p>How many computers with stable internet connection are available?</p>
						<div><?php echo $view['wr_18']; ?></div>
					</td>
				</tr>

				<tr>
					<td>
						<p>How do students access this class?  (You can choose more than one option.)</p>
						<div class="row mb-3">
							<div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_19_1" value="School" <?php if( $wr19[0]== "School") echo "checked"; else echo "disabled";?> id="wr_19_1" >
								<label for="wr_19_1">School PC</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_19_2" value="Tablet" <?php if( $wr19[1]== "Tablet") echo "checked"; else echo "disabled";?> id="wr_19_2">
								<label for="wr_19_2">Tablet</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_19_3" value="Mobile" <?php if( $wr19[2]== "Mobile") echo "checked"; else echo "disabled";?> id="wr_19_3">
								<label for="wr_19_3">Mobile phone</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_19_4" value="Personal" <?php if( $wr19[3]== "Personal") echo "checked"; else echo "disabled";?> id="wr_19_4">
								<label for="wr_19_4">Personal Laptop</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_19_5" value="etc" <?php if( $wr19[4]== "etc") echo "checked"; else echo "disabled";?> id="wr_19_5">
								<label for="wr_19_5">etc</label>
							</div>
						</div>
						 <?php if(isset($view['wr_20'])){?><div><?php echo $view['wr_20']; ?></div><?php } ?>
					</td>
				</tr>

				<tr>
					<td>
						<p>What is the internet speed of the device for classes? Go to fast.com via Chrome browser and find out the internet speed. </p>
						<div><?php echo $view['wr_21']; ?></div>
					</td>
				</tr>

				<tr>
					<td>
						<p>What is the main source of electricity for the students? </p>
						<div class="row mb-3">
							<div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_22_1" value="Solar" <?php if( $wr22[0]== "Solar") echo "checked"; else echo "disabled";?> id="wr_22_1" >
								<label for="wr_22_1">Solar power</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_22_2" value="Electronic" <?php if( $wr22[1]== "Electronic") echo "checked"; else echo "disabled";?> id="wr_22_2">
								<label for="wr_22_2">Electronic Generator</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_22_3" value="Pre" <?php if( $wr22[2]== "Pre") echo "checked"; else echo "disabled";?> id="wr_22_3">
								<label for="wr_22_3">Pre-charged battery</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_22_4" value="etc" <?php if( $wr22[3]== "etc") echo "checked"; else echo "disabled";?> id="wr_22_4">
								<label for="wr_22_4">etc</label>
							</div>
						</div>
						 <?php if(isset($view['wr_20'])){?><div><?php echo $view['wr_23']; ?></div><?php } ?>
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



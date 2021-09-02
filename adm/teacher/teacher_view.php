<?php
$sub_menu = "980001";
include_once('./_common.php');


auth_check_menu($auth, $sub_menu, 'w');

if(empty($wr_id)){
    alert('error!!');
}

$view = sql_fetch("select * from g5_write_teacher_info  where wr_id = '{$wr_id}'");

$wr6 = explode("|", $view['wr_6']);
$wr11 = explode("|", $view['wr_11']);
$wr12 = explode("|", $view['wr_12']);
$wr14 = explode("|", $view['wr_14']);
$wr19 = explode("|", $view['wr_19']);

$html = 0;
if (strstr($view['wr_option'], 'html1'))
    $html = 1;
else if (strstr($view['wr_option'], 'html2'))
    $html = 2;


$g5['title'] = $view['wr_name']."`s info";
include_once(G5_ADMIN_PATH.'/admin.head.php');
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

$view['content'] = conv_content($view['wr_content'], $html);
if (strstr($sfl, 'content'))
    $view['content'] = search_font($stx, $view['content']);

if(isset($view['wr_30']) && $view['wr_30'] == 1){
    $mtype = "<span class='text-success mr-3'>[승인완료]</span>";
}else{
    $mtype = "<span class='text-danger mr-3'>[승인대기]</span>"; 
}
$thumb = get_list_thumbnail('teacher_info', $wr_id, 200, 200, false, true);
?>
<style>
.sub-titles{font-size:2.0em !important; font-weight:700; padding:10px 0;}
.table p{font-size:1.1em; color:var(--teal); margin-bottom:7px;}
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
            echo $mtype;
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
			<div class="col-md-4 mb-3 mb-md-0">
                <div class="mb-2 text-center">
                <?php
                    if($thumb['src']) {
                        $img_content = '<img src="'.$thumb['src'].'" class="rounded-circle img-fluid" alt="'.$thumb['alt'].'" >';
                    } else {
                        $img_content = '<img src="'.G5_IMG_URL.'/bg-step-1.png" class="rounded-circle img-fluid" alt="..." style="width:200px; height:200px;">';
                    }
                    echo $img_content;
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
    <div class="btn_fixed_top text12">
        <a href="<?php echo G5_ADMIN_URL; ?>/teacher/teacher_list.php" class="btn btn_02"> LIST</a>
        <?php if(empty($view['wr_30']) || !$view['wr_30']){?>
            <a href="<?php echo G5_ADMIN_URL; ?>/teacher/teacher_member_update.php?ty=1&mb_id=<?php echo $view['mb_id'];?>&wr_id=<?php echo $wr_id;?>" class="btn btn_02 bg-danger"> Approval</a>
        <?php }else{ ?>
            <a href="<?php echo G5_ADMIN_URL; ?>/teacher/teacher_member_update.php?ty=2&mb_id=<?php echo $view['mb_id'];?>&wr_id=<?php echo $wr_id;?>" class="btn btn_02 bg-danger"> Cancle</a>
        <?php } ?>
    </div>
    <!-- } 게시물 상단 버튼 끝 -->

</article>
<!-- } 게시판 읽기 끝 -->
<?php
run_event('admin_gruop_list_after', $view, '');

include_once(G5_ADMIN_PATH.'/admin.tail.php');
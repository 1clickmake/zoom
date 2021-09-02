<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

$subject = $member['mb_name']."`s info";
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);

$wr6 = explode("|", $write['wr_6']);
$wr11 = explode("|", $write['wr_11']);
$wr12 = explode("|", $write['wr_12']);
$wr14 = explode("|", $write['wr_14']);
$wr19 = explode("|", $write['wr_19']);
?>
<style>
#BecomeTeacher{display:none;}
#bo_w a{font-size:12px;}
.custom-file-input ~ .custom-file-label::after {
    content: "File";
}
.sub-titles{font-size:2.0em; font-weight:700; padding:10px 0;}
.table p{font-size:1.1em; color:var(--bs-teal); margin-bottom:7px;}
</style>
<section id="bo_w" class="container pb-5 text15">
	<h4 class="border-bottom border-secondary p-2"><i class="fa fa-ellipsis-v text-danger"></i> <?php echo $g5['title'] ?><span class="sound_only"> 목록</span></h4>
    <div class="alert alert-warning" role="alert">
    Become a Teacher for Students in Developing Countries!
    </div>

    <div class="alert alert-warning" role="alert">
    Welcome! Pluscope connect students in developing countries with retired seniors and a variety of volunteers and organizations in developed countries. We hope that students in need will be educated and nurtured through teachers in developed countries. Gible classes are conducted online with real-time video chats. The students are those in orphanages, community centers, local schools, and NGOs. If you are interested in teaching students in developing countries, please fill in the information below.
    </div>

    <div class="alert alert-warning" role="alert">
    Gible (Give + Enable) is a program that teaches English, Bible, IT skills, and mentoring classes online for students in developing countries. Please check our journey by clicking this link : https://eslministries.org/2020/03/28/would-you-be-the-esl-teacher-and-mentor-of-the-children-in-africa/
    </div>

    
    <!-- 게시물 작성/수정 시작 { -->
    <form name="fwrite" id="fwrite" action="<?php echo $action_url ?>" onsubmit="return fwrite_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off" style="width:<?php echo $width; ?>">
    <input type="hidden" name="uid" value="<?php echo get_uniqid(); ?>">
    <input type="hidden" name="w" value="<?php echo $w ?>">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="wr_id" value="<?php echo $wr_id ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
	<input type="hidden" name="token2" value="<?php echo $token2 ?>">
    <input type="hidden" name="wr_subject" class="wr_subject" value="<?php echo ($write['wr_subject'])?$write['wr_subject']:'1';?>">

    <?php
    $option = '';
    $option_hidden = '';
    if ($is_notice || $is_html || $is_secret || $is_mail) {
        $option = '';
        if ($is_notice) {
            $option .= "\n".'<input type="checkbox" id="notice" name="notice" value="1" '.$notice_checked.'>'."\n".'<label for="notice">공지</label>';
        }

        if ($is_html) {
            if ($is_dhtml_editor) {
                $option_hidden .= '<input type="hidden" value="html1" name="html">';
            } else {
                $option .= "\n".'<input type="checkbox" id="html" name="html" onclick="html_auto_br(this);" value="'.$html_value.'" '.$html_checked.'>'."\n".'<label for="html">html</label>';
            }
        }

        if ($is_secret) {
            if ($is_admin || $is_secret==1) {
                $option .= "\n".'<input type="checkbox" id="secret" name="secret" value="secret" '.$secret_checked.'>'."\n".'<label for="secret">비밀글</label>';
            } else {
                $option_hidden .= '<input type="hidden" name="secret" value="secret">';
            }
        }

        if ($is_mail) {
            $option .= "\n".'<input type="checkbox" id="mail" name="mail" value="mail" '.$recv_email_checked.'>'."\n".'<label for="mail">답변메일받기</label>';
        }
    }

    echo $option_hidden;
    ?>

    <section id="4-1">
        <h2 class="sub-titles">Personal Information</h2>

        <table class="table">
            <tbody>
                <?php if ($is_password) { ?>
                <tr>
                    <td><input type="password" name="wr_password" id="wr_password" <?php echo $password_required ?> placeholder="비밀번호" class="form-control <?php echo $password_required ?>" maxlength="20"></td>
                </tr>
                <?php } ?>

                <?php if ($is_homepage) { ?>
                <tr>
                    <td><input type="text" name="wr_homepage" value="<?php echo $homepage ?>" id="wr_homepage" placeholder="홈페이지" class="form-control"></td>
                </tr>
                <?php } ?>
                <tr>
                    <td>
                        <p>Full Name</p>
                        <input type="text" name="wr_name" value="<?php echo $member['mb_name'] ?>" id="wr_name" required class="form-control required" placeholder="Full Name" maxlength="20">
                    </td>
                </tr>

                <tr>
                    <td>
                        <p>Email Address</p>
                        <input type="text" name="wr_email" value="<?php echo $email ?>" id="wr_email" class="form-control email" placeholder="email" maxlength="100">
                    </td>
                </tr>

                <tr>
                    <td>
                        <p>Country of Residence</p>
                        <input type="text" name="wr_1" value="<?php echo $write['wr_1']; ?>" id="wr_1" class="form-control" placeholder="Country of Residence" maxlength="100">
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <p>State or City of Residence</p>
                        <input type="text" name="wr_2" value="<?php echo $write['wr_2']; ?>" id="wr_2" class="form-control" placeholder="State or City of Residence" maxlength="100">
                    </td>
                </tr>

                <tr>
                    <td>
                        <p>Field of Expertise or Formal Volunteer Experiences</p>
                        <input type="text" name="wr_3" value="<?php echo $write['wr_3']; ?>" id="wr_3" class="form-control" placeholder="Field of Expertise or Formal Volunteer Experiences" maxlength="100">
                    </td>
                </tr>

                <tr>
                    <td>
                        <p>LinkedIn (if you have)</p>
                        <input type="text" name="wr_4" value="<?php echo $write['wr_4']; ?>" id="wr_4" class="form-control" placeholder="LinkedIn" maxlength="100">
                    </td>
                </tr>
            </tbody>
        </table>
    </section>




    <section id="4-2">
        <h2 class="sub-titles">Teaching Information</h2>

        <table class="table">
            <tbody>
                <tr>
                    <td>
                        <p>One term consists of 8 weeks on Gible. Could you commit your time to a minimum of 8 weeks? (At least one hour a week)</p>
                        <div class="row">
                            <div class="col-auto">
                                <input type="radio" name="wr_5" value="Yes" <?php echo get_checked($write['wr_5'], "Yes")?> id="wr_5_1" >
                                <label for="wr_5_1">Yes</label>
                            </div>
                            <div class="col-auto">
                                <input type="radio" name="wr_5" value="No" <?php echo get_checked($write['wr_5'], "No")?> id="wr_5_2">
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
                                <input type="checkbox" name="wr_6_1" value="Basic" <?php echo get_checked($wr6[0], "Basic")?> id="wr_6_1" >
                                <label for="wr_6_1">Basic English</label>
                            </div>
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="checkbox" name="wr_6_2" value="Bible" <?php echo get_checked($wr6[1], "Bible")?> id="wr_6_2">
                                <label for="wr_6_2">Bible with English</label>
                            </div>
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="checkbox" name="wr_6_3" value="IT" <?php echo get_checked($wr6[2], "IT")?> id="wr_6_3">
                                <label for="wr_6_3">IT Skills (MS Word/Excel/PowerPoint)</label>
                            </div>
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="checkbox" name="wr_6_4" value="Korean" <?php echo get_checked($wr6[3], "Korean")?> id="wr_6_4">
                                <label for="wr_6_4">Korean Language</label>
                            </div>
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="checkbox" name="wr_6_5" value="Job" <?php echo get_checked($wr6[4], "Job")?> id="wr_6_5">
                                <label for="wr_6_5">Job Mentoring</label>
                            </div>
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="checkbox" name="wr_6_6" value="etc" <?php echo get_checked($wr6[5], "etc")?> id="wr_6_6">
                                <label for="wr_6_6">etc</label>
                            </div>
                        </div>
                        <input type="text" name="wr_7" value="<?php echo $write['wr_7']; ?>" id="wr_7" class="form-control" placeholder="if etc..." maxlength="100">
                    </td>
                </tr>

                <tr>
                    <td>
                        <p>Are you willing to make your own class materials?</p>
                        <div class="row">
                            <div class="col-auto">
                                <input type="radio" name="wr_8" value="Yes" <?php echo get_checked($write['wr_8'], "Yes");?> id="wr_8_1" >
                                <label for="wr_8_1">Yes</label>
                            </div>
                            <div class="col-auto">
                                <input type="radio" name="wr_8" value="No" <?php echo get_checked($write['wr_8'], "No");?> id="wr_8_2">
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
                                <input type="radio" name="wr_9" value="1hour" <?php echo get_checked($write['wr_9'], "1hour");?> id="wr_9_1" >
                                <label for="wr_9_1">1 hour</label>
                            </div>
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="radio" name="wr_9" value="2hours" <?php echo get_checked($write['wr_9'], "2hours");?> id="wr_9_2">
                                <label for="wr_9_2">2 hours</label>
                            </div>
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="radio" name="wr_9" value="3hours" <?php echo get_checked($write['wr_9'], "3hours");?> id="wr_9_3">
                                <label for="wr_9_3">3 hours</label>
                            </div>
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="radio" name="wr_9" value="4hours" <?php echo get_checked($write['wr_9'], "4hours");?> id="wr_9_4">
                                <label for="wr_9_4">4 hours</label>
                            </div>
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="radio" name="wr_9" value="5hours" <?php echo get_checked($write['wr_9'], "5hours");?> id="wr_9_5">
                                <label for="wr_9_5">5 hours</label>
                            </div>
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="radio" name="wr_9" value="etc" <?php echo get_checked($write['wr_9'], "etc");?> id="wr_9_6">
                                <label for="wr_9_6">etc</label>
                            </div>
                        </div>
                        <input type="text" name="wr_10" value="<?php echo $write['wr_10']; ?>" id="wr_10" class="form-control" placeholder="if ect..." maxlength="100">
                    </td>
                </tr>

                <tr>
                    <td>
                        <p>When is your available time slot to teach? (You can choose more than one option.)</p>
                        <div class="row">
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="checkbox" name="wr_11_1" value="12am-4am"  <?php echo get_checked($wr11[0], "12am-4am");?> id="wr_11_1" >
                                <label for="wr_11_1">12am - 4am</label>
                            </div>
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="checkbox" name="wr_11_2" value="4am-8am"  <?php echo get_checked($wr11[1], "4am-8am");?> id="wr_11_2">
                            <label for="wr_11_2">4am - 8am</label>
                                </div>
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="checkbox" name="wr_11_3" value="8am-12pm"  <?php echo get_checked($wr11[2], "8am-12pm");?> id="wr_11_3">
                                <label for="wr_11_3">8am - 12pm</label>
                            </div>
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="checkbox" name="wr_11_4" value="12pm-4pm"  <?php echo get_checked($wr11[3], "12pm-4pm");?> id="wr_11_4">
                                <label for="wr_11_4">12pm - 4pm</label>
                            </div>
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="checkbox" name="wr_11_5" value="4pm-8pm"  <?php echo get_checked($wr11[4], "4pm-8pm");?> id="wr_11_5">
                                <label for="wr_11_5">4pm - 8pm</label>
                            </div>
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="checkbox" name="wr_11_6" value="8pm-12am"  <?php echo get_checked($wr11[5], "8pm-12am");?> id="wr_11_6">
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
                                <input type="checkbox" name="wr_12_1" value="Elementary" <?php echo get_checked($wr12[0], "Elementary");?> id="wr_12_1" >
                                <label for="wr_12_1">Elementary School Students (5-10 years-old)</label>
                            </div>
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="checkbox" name="wr_12_2" value="Middle" <?php echo get_checked($wr12[1], "Middle");?> id="wr_12_2">
                                <label for="wr_12_2">Middle School Students (11-13 years-old)</label>
                            </div>
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="checkbox" name="wr_12_3" value="High" <?php echo get_checked($wr12[2], "High");?> id="wr_12_3">
                                <label for="wr_12_3">High School Students (14-18 years-old)</label>
                            </div>
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="checkbox" name="wr_12_4" value="College" <?php echo get_checked($wr12[3], "College");?> id="wr_12_4">
                                <label for="wr_12_4">College Students (18-25 years-old)</label>
                            </div>
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="checkbox" name="wr_12_5" value="etc" <?php echo get_checked($wr12[4], "etc");?> id="wr_12_5">
                                <label for="wr_12_5">etc</label>
                            </div>
                        </div>
                        <input type="text" name="wr_13" value="<?php echo $write['wr_13']; ?>" id="wr_13" class="form-control" placeholder="if etc..." maxlength="100">
                    </td>
                </tr>

                <tr>
                    <td>
                        <p>How many students can you handle in one class? (You can choose more than one option.)</p>
                        <div class="row mb-3">
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="checkbox" name="wr_14_1" value="1-3" <?php echo get_checked($wr14[0], "1-3");?> id="wr_14_1" >
                                <label for="wr_14_1">1-3 students</label>
                            </div>
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="checkbox" name="wr_14_2" value="4-6" <?php echo get_checked($wr14[1], "4-6");?> id="wr_14_2">
                                <label for="wr_14_2">4-6 students</label>
                            </div>
                            <div class="col-auto mb-2 mb-md-0">
                                <input type="checkbox" name="wr_14_3" value="etc" <?php echo get_checked($wr14[2], "etc");?> id="wr_14_3">
                                <label for="wr_14_3">etc</label>
                            </div>
                        </div>
                        <input type="text" name="wr_15" value="<?php echo $write['wr_15']; ?>" id="wr_15" class="form-control" placeholder="if etc..." maxlength="100">
                    </td>
                </tr>

                <tr>
                    <td>
                        <p>When can you start teaching? (Approximate date)</p>
                        <input type="text" name="wr_17" value="<?php echo $write['wr_17']; ?>" id="wr_17" class="form-control" placeholder="Approximate date" maxlength="100">
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
                            <input type="radio" name="wr_18" value="Yes" <?php echo get_checked($write['wr_18'], "Yes");?> id="wr_18_1" >
                            <label for="wr_18_1">Yes</label>
                        </div>
                        <div class="col-auto">
                            <input type="radio" name="wr_18" value="No" <?php echo get_checked($write['wr_18'], "No");?> id="wr_18_2">
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
                            <input type="checkbox" name="wr_19_1" value="Africa" <?php echo get_checked($wr19[0], "Africa");?> id="wr_19_1" >
                            <label for="wr_19_1">Africa</label>
                        </div>
                        <div class="col-auto mb-2 mb-md-0">
                            <input type="checkbox" name="wr_19_2" value="East" <?php echo get_checked($wr19[1], "East");?> id="wr_19_2">
                            <label for="wr_19_2">Middle East</label>
                        </div>
                        <div class="col-auto mb-2 mb-md-0">
                            <input type="checkbox" name="wr_19_3" value="Asia" <?php echo get_checked($wr19[2], "Asia");?> id="wr_19_3">
                            <label for="wr_19_3">Asia</label>
                        </div>
                        <div class="col-auto mb-2 mb-md-0">
                            <input type="checkbox" name="wr_19_4" value="America" <?php echo get_checked($wr19[3], "America");?> id="wr_19_4">
                            <label for="wr_19_4">South America</label>
                        </div>
                        <div class="col-auto mb-2 mb-md-0">
                            <input type="checkbox" name="wr_19_5" value="etc" <?php echo get_checked($wr19[4], "etc");?> id="wr_19_5">
                            <label for="wr_19_5">etc</label>
                        </div>
                    </div>
                    <input type="text" name="wr_20" value="<?php echo $write['wr_20']; ?>" id="wr_20" class="form-control" placeholder="if etc..." maxlength="100">
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
                    <?php if($write_min || $write_max) { ?>
                    <!-- 최소/최대 글자 수 사용 시 -->
                    <p id="char_count_desc">이 게시판은 최소 <strong><?php echo $write_min; ?></strong>글자 이상, 최대 <strong><?php echo $write_max; ?></strong>글자 이하까지 글을 쓰실 수 있습니다.</p>
                    <?php } ?>
                    <?php echo $editor_html; // 에디터 사용시는 에디터로, 아니면 textarea 로 노출 ?>
                    <?php if($write_min || $write_max) { ?>
                    <!-- 최소/최대 글자 수 사용 시 -->
                    <div id="char_count_wrap"><span id="char_count"></span>글자</div>
                    <?php } ?>
                </td>
            </tr>
        </tbody>
        </table>
    </section>

    <section id="up-file">
		<table class="table">
            <tbody>
                <?php for ($i=0; $is_file && $i<$file_count; $i++) { ?>
                <tr>
                    <th scope="row" class="d-none d-md-table-cell">File #<?php echo $i+1 ?></th>
                    <td>
                    <div class="custom-file">
                        <input type="file" name="bf_file[]" title="파일첨부 <?php echo $i+1 ?> : 용량 <?php echo $upload_max_filesize ?> 이하만 업로드 가능" class="custom-file-input">
                        <label class="custom-file-label" for="customFile"><i class="fa fa-upload"></i></label>
                    </div>
                        <?php if ($is_file_content) { ?>
                        <input type="text" name="bf_content[]" value="<?php echo ($w == 'u') ? $file[$i]['bf_content'] : ''; ?>" title="파일 설명을 입력해주세요." class="frm_file form-control" size="50">
                        <?php } ?>
                        <?php if($w == 'u' && $file[$i]['file']) { ?>
                        <input type="checkbox" id="bf_file_del<?php echo $i ?>" name="bf_file_del[<?php echo $i;  ?>]" value="1"> <label for="bf_file_del<?php echo $i ?>"><?php echo $file[$i]['source'].'('.$file[$i]['size'].')';  ?> 파일 삭제</label>
                        <?php } ?>
                    
                    </td>
                </tr>
                <?php } ?>

                <?php if ($is_guest) { //자동등록방지  ?>
                <tr>
                    <th scope="row" class="d-none d-md-table-cell">자동등록방지</th>
                    <td>
                        <?php echo $captcha_html ?>
                    </td>
                </tr>
                <?php } ?>

            </tbody>
        </table>
    </section>

    <div class="alert alert-warning" role="alert">
        Thank you for your time and consideration. We will email you when we find a matching student(s)for you. If you have any questions in the future, please feel free to email us at contact@pluscope.com.
    </div>

    <div class="text-center pb-3">
        <input type="submit" value="Write" id="btn_submit" accesskey="s" class="btn btn-info text-white">
        <a href="./board.php?bo_table=<?php echo $bo_table ?>" class="btn btn-outline-secondary">Cancle</a>
    </div>
    </form>

    <script>
    <?php if($write_min || $write_max) { ?>
    // 글자수 제한
    var char_min = parseInt(<?php echo $write_min; ?>); // 최소
    var char_max = parseInt(<?php echo $write_max; ?>); // 최대
    check_byte("wr_content", "char_count");

    $(function() {
        $("#wr_content").on("keyup", function() {
            check_byte("wr_content", "char_count");
        });
    });

    <?php } ?>


    function html_auto_br(obj)
    {
        if (obj.checked) {
            result = confirm("자동 줄바꿈을 하시겠습니까?\n\n자동 줄바꿈은 게시물 내용중 줄바뀐 곳을<br>태그로 변환하는 기능입니다.");
            if (result)
                obj.value = "html2";
            else
                obj.value = "html1";
        }
        else
            obj.value = "";
    }

    function fwrite_submit(f)
    {
        <?php echo $editor_js; // 에디터 사용시 자바스크립트에서 내용을 폼필드로 넣어주며 내용이 입력되었는지 검사함   ?>
		
		<?php echo get_editor_js("wr_1"); ?>
		<?php echo chk_editor_js("wr_1"); ?>
		
		<?php echo get_editor_js("wr_2"); ?>
		<?php echo chk_editor_js("wr_2"); ?>

        var subject = "";
        var content = "";
        $.ajax({
            url: g5_bbs_url+"/ajax.filter.php",
            type: "POST",
            data: {
                "subject": f.wr_subject.value,
                "content": f.wr_content.value
            },
            dataType: "json",
            async: false,
            cache: false,
            success: function(data, textStatus) {
                subject = data.subject;
                content = data.content; 
            }
        });

        if (subject) {
            alert("제목에 금지단어('"+subject+"')가 포함되어있습니다");
            f.wr_subject.focus();
            return false;
        }

        if (content) {
            alert("내용에 금지단어('"+content+"')가 포함되어있습니다");
            if (typeof(ed_wr_content) != "undefined")
                ed_wr_content.returnFalse();
            else
                f.wr_content.focus();
            return false;
        }

        if (document.getElementById("char_count")) {
            if (char_min > 0 || char_max > 0) {
                var cnt = parseInt(check_byte("wr_content", "char_count"));
                if (char_min > 0 && char_min > cnt) {
                    alert("내용은 "+char_min+"글자 이상 쓰셔야 합니다.");
                    return false;
                }
                else if (char_max > 0 && char_max < cnt) {
                    alert("내용은 "+char_max+"글자 이하로 쓰셔야 합니다.");
                    return false;
                }
            }
        }

        <?php echo $captcha_js; // 캡챠 사용시 자바스크립트에서 입력된 캡챠를 검사함  ?>

        document.getElementById("btn_submit").disabled = "disabled";

        return true;
    }
    </script>
</section>
<!-- } 게시물 작성/수정 끝 -->
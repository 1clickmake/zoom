<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

$subject = $member['mb_name']."`s info";
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);

$wr6 = explode("|", $write['wr_6']);
$wr8 = explode("|", $write['wr_8']);
$wr10 = explode("|", $write['wr_10']);
$wr12 = explode("|", $write['wr_12']);
$wr15 = explode("|", $write['wr_15']);
$wr19 = explode("|", $write['wr_19']);
$wr22 = explode("|", $write['wr_22']);
?>
<style>
#bo_w a{font-size:12px;}
.custom-file-input ~ .custom-file-label::after {
    content: "File";
}
.sub-titles{font-size:2.0em; font-weight:700; padding:10px 0;}
.table p{font-size:1.1em; color:var(--bs-teal); margin-bottom:7px;}
</style>
<section id="bo_w" class="container pb-5">
	<h4 class="border-bottom border-secondary p-2"><i class="fa fa-ellipsis-v text-danger"></i> <?php echo $g5['title'] ?><span class="sound_only"> 목록</span></h4>
    <div class="alert alert-warning" role="alert">
    Welcome! Pluscope connect students in developing countries with retired seniors and a variety of volunteers and organizations in developed countries. We hope that students in need will be educated and nurtured through teachers in developed countries. Gible classes are conducted online with real-time video chats. The students can be those in orphanages, community centers, local schools, and NGOs. If you are interested in teaching students in developing countries, please fill in the information below.
    </div>

    <div class="alert alert-warning" role="alert">
    Gible (Give + Enable) is a program that teaches English, Bible, IT skills, and mentoring classes online for students in developing countries. Please check our journey by clicking this link : https://eslministries.org/2020/03/28/would-you-be-the-esl-teacher-and-mentor-of-the-children-in-africa/
    </div>

    <div class="alert alert-warning" role="alert">
    General Information : If there are multiple countries or regions in need, please answer the questionnaire for each region and country.
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
		<h2 class="sub-titles">Gible Class Request Form</h2>
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
					<p>Full Name (The person who is filling out this form.)</p>
					<input type="text" name="wr_name" value="<?php echo $member['mb_name'] ?>" id="wr_name" required class="form-control required" placeholder="Full Name" maxlength="20">
					</td>
				</tr>
				
				<tr>
					<td>
						<p>Organization Name</p>
						<input type="text" name="wr_1" value="<?php echo $write['wr_1']; ?>" id="wr_1" class="form-control" placeholder="Organization Name" maxlength="100">
					</td>
				</tr>
			
				<tr>
					<td>
						<p>Country (where the students are.)</p>
						<input type="text" name="wr_2" value="<?php echo $write['wr_2']; ?>" id="wr_2" class="form-control" placeholder="Country" maxlength="100">
					</td>
				</tr>

				<tr>
					<td>
						<p>City (where the students are.)</p>
						<input type="text" name="wr_3" value="<?php echo $write['wr_3']; ?>" id="wr_3" class="form-control" placeholder="City" maxlength="100">
					</td>
				</tr>

				<tr>
					<td>
						<p>Contact Email</p>
						<input type="text" name="wr_email" value="<?php echo $email ?>" id="wr_email" class="form-control email" placeholder="이메일" maxlength="100">
					</td>
				</tr>

				<tr>
					<td>
						<p>Phone Number (Optional)</p>
						<input type="text" name="wr_4" value="<?php echo $write['wr_4']; ?>" id="wr_4" class="form-control" placeholder="Phone Number" maxlength="100">
					</td>
				</tr>

				<tr>
					<td>
						<p>Organization Website/SNS (ex. instagram, facebook, etc) (Optional)</p>
						<input type="text" name="wr_24" value="<?php echo $write['wr_24']; ?>" id="wr_24" class="form-control" placeholder="Website/SNS" maxlength="100">
					</td>
				</tr>
			</tbody>
        </table>
    </section>


	<section id="4-2">
        <h2 class="sub-titles">Student and Class information</h2>
        <table class="table">
			<tbody>
				<tr>
					<td>
						<p>How many students need learning?</p>
						<div class="row">
							<div class="col-auto">
								<input type="radio" name="wr_5" value="1" <?php echo get_checked($write['wr_5'], "1")?> id="wr_5_1" >
								<label for="wr_5_1">1-5</label>
							</div>
                            <div class="col-auto">
								<input type="radio" name="wr_5" value="6" <?php echo get_checked($write['wr_5'], "6")?> id="wr_5_2">
								<label for="wr_5_2">6-10</label>
							</div>
                            <div class="col-auto">
								<input type="radio" name="wr_5" value="11" <?php echo get_checked($write['wr_5'], "11")?> id="wr_5_3">
								<label for="wr_5_3">11-20</label>
							</div>
                            <div class="col-auto">
								<input type="radio" name="wr_5" value="21" <?php echo get_checked($write['wr_5'], "21")?> id="wr_5_4">
								<label for="wr_5_4">21-50</label>
							</div>
                            <div class="col-auto">
								<input type="radio" name="wr_5" value="51" <?php echo get_checked($write['wr_5'], "51")?> id="wr_5_5">
								<label for="wr_5_5">51-100</label>
							</div>
                            <div class="col-auto">
								<input type="radio" name="wr_5" value="100" <?php echo get_checked($write['wr_5'], "100")?> id="wr_5_6">
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
								<input type="checkbox" name="wr_6_1" value="Elementary" <?php echo get_checked($wr6[0], "Elementary")?> id="wr_6_1" >
								<label for="wr_6_1">Elementary School Students (5-10 years-old)</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_6_2" value="Middle" <?php echo get_checked($wr6[1], "Middle")?> id="wr_6_2">
								<label for="wr_6_2">Middle School Students (11-13 years-old)</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_6_3" value="High" <?php echo get_checked($wr6[2], "High")?> id="wr_6_3">
								<label for="wr_6_3">High School Students (14-18 years-old)</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_6_4" value="College" <?php echo get_checked($wr6[3], "College")?> id="wr_6_4">
								<label for="wr_6_4">College Students (18-25 years-old)1-50</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_6_5" value="Job" <?php echo get_checked($wr6[4], "Job")?> id="wr_6_5">
								<label for="wr_6_5">Job Mentoring / Job Training (18+)</label>
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
						<p>What types of classes do students need?  (You can choose more than one option.)</p>
						<div class="row mb-3">
							<div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_8_1" value="Basic" <?php echo get_checked($wr8[0], "Basic")?> id="wr_8_1" >
								<label for="wr_8_1">Basic English</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_8_2" value="Bible" <?php echo get_checked($wr8[1], "Bible")?> id="wr_8_2">
								<label for="wr_8_2">Bible Study in English</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_8_3" value="IT" <?php echo get_checked($wr8[2], "IT")?> id="wr_8_3">
								<label for="wr_8_3">IT Skills (MS Word/Excel/PowerPoint)</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_8_4" value="Korean" <?php echo get_checked($wr8[3], "Korean")?> id="wr_8_4">
								<label for="wr_8_4">Korean Language</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_8_5" value="Job" <?php echo get_checked($wr8[4], "Job")?> id="wr_8_5">
								<label for="wr_8_5">Job Mentoring</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_8_6" value="Professional" <?php echo get_checked($wr8[5], "Professional")?> id="wr_8_6">
								<label for="wr_8_6">Basic Professional Education for College Students (ex. nursing, medicine, etc.)</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_8_7" value="etc" <?php echo get_checked($wr8[6], "etc")?> id="wr_8_7">
								<label for="wr_8_7">etc</label>
							</div>
						</div>
						<input type="text" name="wr_9" value="<?php echo $write['wr_9']; ?>" id="wr_9" class="form-control" placeholder="if etc..." maxlength="100">
					</td>
				</tr>

				<tr>
					<td>
						<p>Where will the class be held?  (You can choose more than one option.)</p>
						<div class="row mb-3">
							<div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_10_1" value="School" <?php echo get_checked($wr10[0], "School")?> id="wr_10_1" >
								<label for="wr_10_1">School</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_10_2" value="Community" <?php echo get_checked($wr10[1], "Community")?> id="wr_10_2">
								<label for="wr_10_2">Community Center</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_10_3" value="Orphanage" <?php echo get_checked($wr10[2], "Orphanage")?> id="wr_10_3">
								<label for="wr_10_3">Orphanage</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_10_4" value="Church" <?php echo get_checked($wr10[3], "Church")?> id="wr_10_4">
								<label for="wr_10_4">Church</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_10_5" value="Home" <?php echo get_checked($wr10[4], "Home")?> id="wr_10_5">
								<label for="wr_10_5">Home</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_10_6" value="etc" <?php echo get_checked($wr10[5], "etc")?> id="wr_10_6">
								<label for="wr_10_6">etc</label>
							</div>
						</div>
						<input type="text" name="wr_11" value="<?php echo $write['wr_11']; ?>" id="wr_11" class="form-control" placeholder="if etc..." maxlength="100">
					</td>
				</tr>

				<tr>
					<td>
						<p>How many students will participate in one class?</p>
						<div class="row">
							<div class="col-auto">
								<input type="checkbox" name="wr_12_1" value="1" <?php echo get_checked($wr12[0], "1")?> id="wr_12_1" >
								<label for="wr_12_1">1-3 students</label>
							</div>
                            <div class="col-auto">
								<input type="checkbox" name="wr_12_2" value="4" <?php echo get_checked($wr12[1], "4")?> id="wr_12_2">
								<label for="wr_12_2">4-6 students</label>
							</div>
                            <div class="col-auto">
								<input type="checkbox" name="wr_12_3" value="7" <?php echo get_checked($wr12[2], "7")?> id="wr_12_3">
								<label for="wr_12_3">7-10 students</label>
							</div>
                            <div class="col-auto">
								<input type="checkbox" name="wr_12_4" value="10" <?php echo get_checked($wr12[3], "10")?> id="wr_12_4">
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
								<input type="radio" name="wr_13" value="Once" <?php echo get_checked($write['wr_13'], "Once")?> id="wr_13_1" >
								<label for="wr_13_1">Once a week</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="radio" name="wr_13" value="Twice" <?php echo get_checked($write['wr_13'], "Twice")?> id="wr_13_2">
								<label for="wr_13_2">Twice a week</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="radio" name="wr_13" value="Three" <?php echo get_checked($write['wr_13'], "Three")?> id="wr_13_3">
								<label for="wr_13_3">Three times a week</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="radio" name="wr_13" value="Short" <?php echo get_checked($write['wr_13'], "Short")?> id="wr_13_4">
								<label for="wr_13_4">Short-term online camp</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="radio" name="wr_13" value="etc" <?php echo get_checked($write['wr_13'], "etc")?> id="wr_13_5">
								<label for="wr_13_5">etc</label>
							</div>
						</div>
						<input type="text" name="wr_14" value="<?php echo $write['wr_14']; ?>" id="wr_14" class="form-control" placeholder="if etc..." maxlength="100">
					</td>
				</tr>

				<tr>
					<td>
						<p>Which time slot do the students prefer?  (You can choose more than one option.)</p>
						<div class="row mb-3">
							<div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_15_1" value="9" <?php echo get_checked($wr15[0], "9")?> id="wr_15_1" >
								<label for="wr_15_1">9am - 12pm</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_15_2" value="12" <?php echo get_checked($wr15[1], "12")?> id="wr_15_2">
								<label for="wr_15_2">12pm - 3pm</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_15_3" value="3" <?php echo get_checked($wr15[2], "3")?> id="wr_15_3">
								<label for="wr_15_3">3pm - 6pm</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_15_4" value="etc" <?php echo get_checked($wr15[3], "etc")?> id="wr_15_4">
								<label for="wr_15_4">etc</label>
							</div>
						</div>
						<input type="text" name="wr_16" value="<?php echo $write['wr_16']; ?>" id="wr_16" class="form-control" placeholder="if etc..." maxlength="100">
					</td>
				</tr>

				<tr>
					<td>
						<p>When can you start class? (Approximate date)</p>
						<input type="text" name="wr_17" value="<?php echo $write['wr_17']; ?>" id="wr_17" class="form-control" placeholder="Approximate date" maxlength="100">
					</td>
				</tr>
			</tbody>
        </table>
    </section>


	<section id="4-3">
		<h2 class="sub-titles">Internet & Computer Setting</h2>
        <p>We would like to know the Internet, electricity, and computer situations for Gible classes.

        * 한국어로 작성해 주셔도 됩니다 :)</p>
        <table class="table">
			<tbody>
				<tr>
					<td>
						<p>How many computers with stable internet connection are available?</p>
						<input type="text" name="wr_18" value="<?php echo $write['wr_18']; ?>" id="wr_18" class="form-control" placeholder="How many computers with stable internet connection are available?e" maxlength="100">
					</td>
				</tr>

				<tr>
					<td>
						<p>How do students access this class?  (You can choose more than one option.)</p>
						<div class="row mb-3">
							<div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_19_1" value="School" <?php echo get_checked($wr19[0], "School")?> id="wr_19_1" >
								<label for="wr_19_1">School PC</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_19_2" value="Tablet" <?php echo get_checked($wr19[1], "Tablet")?> id="wr_19_2">
								<label for="wr_19_2">Tablet</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_19_3" value="Mobile" <?php echo get_checked($wr19[2], "Mobile")?> id="wr_19_3">
								<label for="wr_19_3">Mobile phone</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_19_4" value="Personal" <?php echo get_checked($wr19[3], "Personal")?> id="wr_19_4">
								<label for="wr_19_4">Personal Laptop</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_19_5" value="etc" <?php echo get_checked($wr19[4], "etc")?> id="wr_19_5">
								<label for="wr_19_5">etc</label>
							</div>
						</div>
						<input type="text" name="wr_20" value="<?php echo $write['wr_20']; ?>" id="wr_20" class="form-control" placeholder="etc" maxlength="100">
					</td>
				</tr>

				<tr>
					<td>
						<p>What is the internet speed of the device for classes? Go to fast.com via Chrome browser and find out the internet speed. (e.g. 54 Mbps,) </p>
						<input type="text" name="wr_21" value="<?php echo $write['wr_21']; ?>" id="wr_21" class="form-control" placeholder="" maxlength="100">
						<div class="row">
							<div class="col-md-4 mt-3 border border-warning">
								<div class="m-3">
									<div class="py-3 text16 text-danger">example</div>
									<img src="<?php echo G5_IMG_URL?>/internet_speed.png" class="w-100">
								</div>
							</div>
						</div>
					</td>
				</tr>

				<tr>
					<td>
						<p>What is the main source of electricity for the students?  (You can choose more than one option.)</p>
						<div class="row mb-3">
							<div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_22_1" value="Solar" <?php echo get_checked($wr22[0], "Solar")?> id="wr_22_1" >
								<label for="wr_22_1">Solar power</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_22_2" value="Electronic" <?php echo get_checked($wr22[1], "Electronic")?> id="wr_22_2">
								<label for="wr_22_2">Electronic Generator</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_22_3" value="Pre" <?php echo get_checked($wr22[2], "Pre")?> id="wr_22_3">
								<label for="wr_22_3">Pre-charged battery</label>
							</div>
                            <div class="col-auto mb-2 mb-md-0">
								<input type="checkbox" name="wr_22_4" value="etc" <?php echo get_checked($wr22[3], "etc")?> id="wr_22_4">
								<label for="wr_22_4">etc</label>
							</div>
						</div>
						<input type="text" name="wr_23" value="<?php echo $write['wr_23']; ?>" id="wr_23" class="form-control" placeholder="if etc.." maxlength="100">
					</td>
				</tr>
			</tbody>
        </table>
    </section>

    <section id="4-4">
        <h2 class="sub-titles">Additional Information</h2>
        <p>* 한국어로 작성해 주셔도 됩니다 :)</p>
        <table class="table">
			<tbody>
				<tr>
					<td class="wr_content">
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

        </table>
	</section>
	
	<div class="alert alert-warning" role="alert">
        Thank you for your time and consideration. We will email you when we find a matching teacher(s) for students and your organization. If you have any questions in the future, please feel free to email us at contact@pluscope.com.
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
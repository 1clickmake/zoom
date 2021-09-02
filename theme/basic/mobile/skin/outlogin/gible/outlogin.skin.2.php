<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$outlogin_skin_url.'/style.css">', 0);
?>

<!-- 로그인 후 아웃로그인 시작 { -->
<div id="t_outlogin" class="login2">
	<div id="login_bt">
		<?php include_once(G5_PLUGIN_PATH.'/alarm_in/alarm.php') ?>
		<p class="account"><a href="#"><?php echo get_member_profile_img($member['mb_id']); ?></a></p>
	</div>
	<div id="news">
		<h2>새소식<span class="arm_count"><?php echo $msg_count?></span></h2>
		<div id="ol_arm">	
			<ul id="dd_arm" style="display: none;"></dl>
		</div>
	</div>

	<div id="account">
	<h2 class="sound_only">개인정보</h2>
		<p><a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=register_form.php"><?php echo $nick ?></a></p>
		<p><?php echo $member['mb_id'] ?><a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=register_form.php" id="ol_after_info" title="정보수정">정보수정</a><?php if ($is_admin == 'super' || $is_auth) {  ?><a href="<?php echo correct_goto_url(G5_ADMIN_URL); ?>" title="관리자">관리자</a><?php }  ?></p>
		<h3>활동정보</h3>
		<p><a href="<?php echo G5_BBS_URL ?>/point.php" target="_blank" id="ol_after_pt" class="win_point">
					<i class="fa fa-database" aria-hidden="true"></i>포인트
					<strong><?php echo $point; ?></strong>
				</a>
			<a href="<?php echo G5_BBS_URL ?>/memo.php" target="_blank" id="ol_after_memo" class="win_memo">
					<i class="fa fa-envelope-o" aria-hidden="true"></i><span class="sound_only">안 읽은 </span>쪽지
					<strong><?php echo $memo_not_read; ?></strong>
				</a>
			<a href="<?php echo G5_BBS_URL ?>/scrap.php" target="_blank" id="ol_after_scrap" class="win_scrap">
					<i class="fa fa-thumb-tack" aria-hidden="true"></i>스크랩
					<strong class="scrap"><?php echo $mb_scrap_cnt; ?></strong>
				</a>
		</p>
		<p><a href="<?php echo G5_BBS_URL ?>/logout.php" id="ol_after_logout"><i class="fa fa-sign-out" aria-hidden="true"></i> 로그아웃</a></p>
	</div>
</div>
<script>
// 계정
$("p.account img").click(function(){
	$("#account").fadeToggle(100);
	$("#news").fadeOut(100);	
});	
</script>
<!-- } 로그인 후 아웃로그인 끝 -->
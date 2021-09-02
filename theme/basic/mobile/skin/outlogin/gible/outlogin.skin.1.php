<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$outlogin_skin_url.'/style.css">', 0);
?>

<!-- 로그인 전 아웃로그인 시작 { -->
<div id="t_outlogin" class="login1">
	<p><a href="<?php echo G5_BBS_URL ?>/login.php">로그인하기</a> <a href="<?php echo G5_BBS_URL ?>/register.php" class="bt">가입하기</a></p>
</div>

<!-- } 로그인 전 아웃로그인 끝 -->
<?php
include_once('./_common.php');
$sub_title = "Zoom Error !!";
include_once(G5_PATH.'/head.php');
?>

<div class="container pt-5 pb-5">
	<h2 class="text3_4" style="font-weight:700;">Zoom Error !!</h2>
</div>

<div class="container">
	<div class="text-center py-5 mb-5 text2_0">
		zoom 계정을 처리 하지 못했습니다.<br>
		다시 한번 천천히 혹인해 주시길 바라며<br>
		계속 오류가 있을경우 관리자에게 문의해 주세요.
		<div class="text-center mt-5">
			<a href="<?php echo G5_URL?>/zoom_info.php" class="d-inline-block bg-danger text-white text-18 px-3 py-1">Zoom 등록하기</a>
		</div>
	</div>
</div>

<?php 
include_once(G5_THEME_PATH.'/include/newsletter.php');
include_once(G5_PATH.'/tail.php');
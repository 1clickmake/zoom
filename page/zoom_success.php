<?php
include_once('./_common.php');
$sub_title = "Zoom successfully !!";
include_once(G5_PATH.'/head.php');
?>

<div class="container pt-5 pb-5">
	<h2 class="text3_4" style="font-weight:700;">Zoom successfully !!</h2>
</div>

<div class="container">
	<div class="text-center py-5 mb-5 text2_0">
		정상 처리 되었습니다.<br>
		이제 클래스를 등록하실 수 있습니다.<br>
		<div class="text-center mt-5">
			<a href="<?php echo G5_BBS_URL?>/write.php?bo_table=courses" class="d-inline-block bg-danger text-white text-18 px-3 py-1">Class 등록하기</a>
		</div>
	</div>
</div>

<?php 
include_once(G5_THEME_PATH.'/include/newsletter.php');
include_once(G5_PATH.'/tail.php');
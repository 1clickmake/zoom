<?php
include_once('./_common.php');
$sub_title = "Become a Teacher";
include_once(G5_PATH.'/head.php');
?>

<div class="container pt-5 pb-5">
	<h2 class="text3_4" style="font-weight:700;">Zoom info</h2>
	<p class="mt-4 text1_8">Lorem ipsum dolor sit amet, consectetur.</p>
</div>

<div class="container">
	<form name="fwrite" id="fwrite" action="<?php echo G5_URL; ?>/page/zoom_info_update.php"  method="post"  autocomplete="off">
		<table class="table">
			<tr>
				<td>
					<p>CLIENT_ID</p>
					<input type="text" name="client_id" value="" class="form-control required" id="client_id" required>
				</td>
			</tr>
			<tr>
				<td>
				<p>CLIENT_SECRET</p>
					<input type="text" name="client_secret" value=""  class="form-control required" id="client_secret" required>
				</td>
			</tr>
		</table>
		<div class="text-center my-5">
		<input type="submit" value="Write" id="btn_submit" accesskey="s" class="btn btn-info text-white">
		</div>
	</form>
</div>

<?php 
include_once(G5_THEME_PATH.'/include/newsletter.php');
include_once(G5_PATH.'/tail.php');
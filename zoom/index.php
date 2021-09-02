<?php
include_once('./_common.php');
include_once(G5_PATH.'/zoom/config.php');
$url = "https://zoom.us/oauth/authorize?response_type=code&client_id=".CLIENT_ID."&redirect_uri=".REDIRECT_URI;
?>
  
<a href="<?php echo $url?>">Login with Zoom</a>


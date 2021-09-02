<?php
include_once('./_common.php');

set_session('client_id', $_POST['client_id']);
set_session('client_secret', $_POST['client_secret']);

$client_id = get_session('client_id'); 
$client_secret = get_session('client_secret');

sql_query(" update {$g5['member_table']} set mb_9 = '{$client_id}', mb_10 = '{$client_secret}' where mb_id = '{$member['mb_id']}' ");

define('CLIENT_ID', $client_id);
define('CLIENT_SECRET', $client_secret);
define('REDIRECT_URI', G5_URL.'/zoom/callback.php');
$url = "https://zoom.us/oauth/authorize?response_type=code&client_id=".CLIENT_ID."&redirect_uri=".REDIRECT_URI;
?>
<script type="text/javascript">
location.href="<?php echo $url?>";
</script>

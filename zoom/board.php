<?php
include_once('./_common.php');

require_once G5_PATH.'/zoom/vendor/autoload.php';
require_once G5_PATH.'/zoom/class_db.php';
  
$mb = get_member($member['mb_id']);
$client_id = $mb['mb_9'];
$client_secret = $mb['mb_10'];

define('CLIENT_ID', $client_id);
define('CLIENT_SECRET', $client_secret);
define('REDIRECT_URI', G5_URL.'/zoom/callback.php');
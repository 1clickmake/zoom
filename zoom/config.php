<?php
include_once('./_common.php');

require_once G5_PATH.'/zoom/vendor/autoload.php';
require_once G5_PATH.'/zoom/class_db.php';
  

$client_id = get_session('client_id'); 
$client_secret = get_session('client_secret');

define('CLIENT_ID', $client_id);
define('CLIENT_SECRET', $client_secret);
define('REDIRECT_URI', G5_URL.'/zoom/callback.php');
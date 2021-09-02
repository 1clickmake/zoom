<?php
include_once('./_common.php');

require_once G5_PATH.'/zoom/vendor/autoload.php';
require_once G5_PATH.'/zoom/class_db.php';

$client_id = get_session('client_id'); 
$client_secret = get_session('client_secret');

define('CLIENT_ID', $client_id);
define('CLIENT_SECRET', $client_secret);
define('REDIRECT_URI', G5_URL.'/zoom_/callback.php');
	
try {
    $client = new GuzzleHttp\Client(['base_uri' => 'https://zoom.us']);
  
    $response = $client->request('POST', '/oauth/token', [
        "headers" => [
            "Authorization" => "Basic ". base64_encode(CLIENT_ID.':'.CLIENT_SECRET)
        ],
        'form_params' => [
            "grant_type" => "authorization_code",
            "code" => $_GET['code'],
            "redirect_uri" => REDIRECT_URI
        ],
    ]);
  
    $token = json_decode($response->getBody()->getContents(), true);
	
	print_r($token);
  
    $db = new DB();
  
    if($db->is_table_empty($member['mb_id'])) {
        $db->update_access_token(json_encode($token), $member['mb_id']);
        echo "Access token inserted successfully.";
    }
} catch(Exception $e) {
    echo $e->getMessage();
}

alert('ok');
	



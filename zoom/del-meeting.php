<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once('./_common.php');

require_once G5_PATH.'/zoom/config.php';

$meetingId = "85405712109";
$client = new GuzzleHttp\Client(['base_uri' => 'https://api.zoom.us']);
  
$db = new DB();
$arr_token = $db->get_access_token();
$accessToken = $arr_token->access_token;
  
$response = $client->request('DELETE', '/v2/meetings/'.$meetingId, [
    "headers" => [
        "Authorization" => "Bearer {$accessToken}"
    ]
]);
 
if (204 == $response->getStatusCode()) {
    echo "Meeting is deleted.";
}
<?php
include_once('./_common.php');

include_once (G5_PATH.'/zoom/config.php');
 
$db = new DB();
$refresh_token = $db->get_refersh_token();
  
$client = new GuzzleHttp\Client(['base_uri' => 'https://zoom.us']);
$response = $client->request('POST', '/oauth/token', [
                "headers" => [
                    "Authorization" => "Basic ". base64_encode(CLIENT_ID.':'.CLIENT_SECRET)
                ],
                'form_params' => [
                    "grant_type" => "refresh_token",
                    "refresh_token" => $refresh_token
                ],
            ]);
$db->update_access_token($response->getBody());

function create_meeting($subject, $studydate, $studytime, $studypass) {
    $client = new GuzzleHttp\Client(['base_uri' => 'https://api.zoom.us']);
  
    $db = new DB();
    $arr_token = $db->get_access_token();
    $accessToken = $arr_token->access_token;

        $response = $client->request('POST', '/v2/users/me/meetings', [
            "headers" => [
                "Authorization" => "Bearer ".$accessToken
            ],
            'json' => [
                "topic" => $subject,
                "type" => 2,
                "start_time" => $studydate,
                "duration" => $studytime, // 30 mins
                "password" =>  $studypass
            ],
        ]);
  
        $data = json_decode($response->getBody());
        //echo "Join URL: ". $data->join_url;
        //echo "<br>";
        //echo "Meeting Password: ". $data->password;
  
  return $data;
    
}
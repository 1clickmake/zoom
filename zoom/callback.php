<?php
include_once('./_common.php');

require_once G5_PATH.'/zoom/config.php';
  
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
    }else{
		//alert('error!!\n\n관리자에게 문의');
	}
} catch(Exception $e) {
    echo $e->getMessage();
}

if($token['access_token']){
	goto_url(G5_URL."/page/zoom_success.php");
}else{
	goto_url(G5_URL.'/page/zoom_error.php');
}
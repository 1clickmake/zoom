<?php
if (!defined("_GNUBOARD_")) exit; // 개별 page 접근 불가
include_once (G5_PATH.'/zoom/board.php');
require_once G5_PATH.'/zoom/create-study.php';

if($w == "u"){
	//기존 미팅 삭제
	$meetingId = $wr_10;
	$client = new GuzzleHttp\Client(['base_uri' => 'https://api.zoom.us']);
	  
	$db = new DB();
	$arr_token = $db->get_access_token();
	$accessToken = $arr_token->access_token;
	  
	$response = $client->request('DELETE', '/v2/meetings/'.$meetingId, [
		"headers" => [
			"Authorization" => "Bearer {$accessToken}"
		]
	]);
}


//$starttime =  2021-07-30T20:30:00
$starttime =  $wr_3."-".$wr_4."-".$wr_5."T".$wr_6.":".$wr_7.":00";
$study_subject = $ca_name." - ".$wr_subject;
$data = create_meeting($study_subject, $starttime, $wr_8, $studypass);
$urls = $data->join_url;
$meetId = $data->id;


sql_query(" update $write_table set wr_link1 = '{$urls}', wr_10 = '{$meetId}' where wr_id = '{$wr_id}' ");
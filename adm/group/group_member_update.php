<?php
$sub_menu = "990001";
include_once('./_common.php');

if($ty == 1){
    sql_query(" update {$g5['member_table']} set mb_level = '4' where mb_id = '{$mb_id}' ");
    sql_query(" update g5_write_group_info set wr_30 = '1', wr_31 = '".G5_TIME_YMDHIS."'  where wr_id = '{$wr_id}' ");
    $msg = "승인 되었습니다.";
}

else{
    sql_query(" update {$g5['member_table']} set mb_level = '2' where mb_id = '{$mb_id}' ");
    sql_query(" update g5_write_group_info set wr_30 = '', wr_31 = '".G5_TIME_YMDHIS."' where wr_id = '{$wr_id}' ");
    $msg = "승인취소 되었습니다";
}

$return_url = './group_view.php?wr_id='.$wr_id;
alert($msg, $return_url);
<?php
if (!defined("_GNUBOARD_")) exit; // 개별 page 접근 불가

if($w == ""){
    $alert_msg = "thank you~~";
}else{
    $alert_msg = "수정 되었습니다.";
}
alert($alert_msg, get_pretty_url($bo_table, $wr_id));
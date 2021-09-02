<?php
$sub_menu = "980001";
include_once('./_common.php');

check_demo();

if (! (isset($_POST['chk']) && is_array($_POST['chk']))) {
    alert($_POST['act_button']." 하실 항목을 하나 이상 체크하세요.");
}

auth_check_menu($auth, $sub_menu, 'w');

check_admin_token();

$mb_datas = array();
$msg = '';

if ($_POST['act_button'] == "Approval") {

    for ($i=0; $i<count($_POST['chk']); $i++)
    {
        // 실제 번호를 넘김
        $k = isset($_POST['chk'][$i]) ? (int) $_POST['chk'][$i] : 0;

        sql_query(" update {$g5['member_table']} set mb_level = '5' where mb_id = '".sql_real_escape_string($_POST['mb_id'][$k])."' ");
        sql_query(" update g5_write_teacher_info set wr_30 = '1', wr_31 = '".G5_TIME_YMDHIS."'  where wr_id = '{$_POST['wr_id'][$k]}' ");

    }

} else if ($_POST['act_button'] == "Cancel") {

    for ($i=0; $i<count($_POST['chk']); $i++)
    {
        // 실제 번호를 넘김
        $k = isset($_POST['chk'][$i]) ? (int) $_POST['chk'][$i] : 0;

        sql_query(" update {$g5['member_table']} set mb_level = '2' where mb_id = '".sql_real_escape_string($_POST['mb_id'][$k])."' ");
        sql_query(" update g5_write_teacher_info set wr_30 = '', wr_31 = '".G5_TIME_YMDHIS."'  where wr_id = '{$_POST['wr_id'][$k]}' ");
    }
}


run_event('teacher_list_update', $_POST['act_button'], $mb_datas);

goto_url('./teacher_list.php?'.$qstr);
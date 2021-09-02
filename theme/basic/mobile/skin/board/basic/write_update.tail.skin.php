<?
if (!defined("_GNUBOARD_")) exit; // 개별 page 접근 불가

if($is_admin && $w == "" && $_POST['never_write']){
	sql_query(" update {$write_table} set wr_48 = '{$_POST['token2']}' where wr_id = '{$wr_id}' ");
}

?>

<?php
$sub_menu = '990001';
include_once('./_common.php');
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

auth_check_menu($auth, $sub_menu, "r");
$sql_common = " from g5_write_group_info ";

$sql_search = " where (1) ";
if ($stx) {
    $sql_search .= " and ( ";
    switch ($sfl) {
        case 'mb_id' :
            $sql_search .= " ({$sfl} >= '{$stx}') ";
            break;
        case 'wr_name' :
            $sql_search .= " ({$sfl} = '{$stx}') ";
            break;
        default :
            $sql_search .= " ({$sfl} like '{$stx}%') ";
            break;
    }
    $sql_search .= " ) ";
}


if (!$sst) {
    $sst = "wr_id";
    $sod = "desc";
}

$sql_order = " order by {$sst} {$sod} ";

$sql = " select count(*) as cnt {$sql_common} {$sql_search} {$sql_order} ";
$row = sql_fetch($sql);
$total_count = $row['cnt'];

$rows = $config['cf_page_rows'];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) $page = 1; // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함

// 승인회원수
$sql = " select count(*) as cnt {$sql_common} {$sql_search} and wr_30 = '1' {$sql_order} ";
$row = sql_fetch($sql);
$leave_count = $row['cnt'];

// 대기회원수
$sql = " select count(*) as cnt {$sql_common} {$sql_search} and wr_30 = '' {$sql_order} ";
$row = sql_fetch($sql);
$intercept_count = $row['cnt'];

$listall = '<a href="'.$_SERVER['SCRIPT_NAME'].'" class="ov_listall">전체목록</a>';

$g5['title'] = 'Group Member';
include_once(G5_ADMIN_PATH.'/admin.head.php');

$sql = " select * {$sql_common} {$sql_search} {$sql_order} limit {$from_record}, {$rows} ";
$result = sql_query($sql);

$colspan = 16;
?>

<div class="local_ov01 local_ov">
    <?php echo $listall ?>
    <span class="btn_ov01"><span class="ov_txt">총 신청목록 </span><span class="ov_num"> <?php echo number_format($total_count) ?>명 </span></span>
    <a href="?sst=mb_intercept_date&amp;sod=desc&amp;sfl=<?php echo $sfl ?>&amp;stx=<?php echo $stx ?>" class="btn_ov01" > <span class="ov_txt">대기 </span><span class="ov_num"><?php echo number_format($intercept_count) ?>명</span></a>
    <a href="?sst=mb_leave_date&amp;sod=desc&amp;sfl=<?php echo $sfl ?>&amp;stx=<?php echo $stx ?>" class="btn_ov01" > <span class="ov_txt">승인  </span><span class="ov_num"><?php echo number_format($leave_count) ?>명</span></a>
</div>

<form id="fsearch" name="fsearch" class="local_sch01 local_sch" method="get">

<label for="sfl" class="sound_only">검색대상</label>
<select name="sfl" id="sfl">
    <option value="mb_id"<?php echo get_selected($sfl, "mb_id"); ?>>회원아이디</option>
    <option value="mb_nick"<?php echo get_selected($sfl, "mb_nick"); ?>>닉네임</option>
    <option value="mb_name"<?php echo get_selected($sfl, "mb_name"); ?>>이름</option>
    <option value="mb_level"<?php echo get_selected($sfl, "mb_level"); ?>>권한</option>
    <option value="mb_email"<?php echo get_selected($sfl, "mb_email"); ?>>E-MAIL</option>
    <option value="mb_tel"<?php echo get_selected($sfl, "mb_tel"); ?>>전화번호</option>
    <option value="mb_hp"<?php echo get_selected($sfl, "mb_hp"); ?>>휴대폰번호</option>
    <option value="mb_point"<?php echo get_selected($sfl, "mb_point"); ?>>포인트</option>
    <option value="mb_datetime"<?php echo get_selected($sfl, "mb_datetime"); ?>>가입일시</option>
    <option value="mb_ip"<?php echo get_selected($sfl, "mb_ip"); ?>>IP</option>
    <option value="mb_recommend"<?php echo get_selected($sfl, "mb_recommend"); ?>>추천인</option>
</select>
<label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
<input type="text" name="stx" value="<?php echo $stx ?>" id="stx" required class="required frm_input">
<input type="submit" class="btn_submit" value="검색">

</form>

<form name="fmemberlist" id="fmemberlist" action="./group_list_update.php" onsubmit="return fmemberlist_submit(this);" method="post">
<input type="hidden" name="sst" value="<?php echo $sst ?>">
<input type="hidden" name="sod" value="<?php echo $sod ?>">
<input type="hidden" name="sfl" value="<?php echo $sfl ?>">
<input type="hidden" name="stx" value="<?php echo $stx ?>">
<input type="hidden" name="page" value="<?php echo $page ?>">
<input type="hidden" name="token" value="">

<div class="tbl_head01 tbl_wrap">
    <table>
    <caption><?php echo $g5['title']; ?> 목록</caption>
    <thead>
    <tr>
		<th scope="col" id="mb_list_chk" >
            <label for="chkall" class="sound_only">회원 전체</label>
            <input type="checkbox" name="chkall" value="1" id="chkall" onclick="check_all(this.form)">
        </th>
        <th scope="col">Img</th>
        <th scope="col">ID</th>
        <th scope="col">승인</th>
        <th scope="col" id="th_dvc">Full Name</th>
        <th scope="col" id="th_loc">Organization Name</th>
        <th scope="col" id="th_st">Country</th>
        <th scope="col" id="th_end">City</th>
        <th scope="col" id="th_odr">Email</th>
        <th scope="col" id="th_hit">Phone</th>
        <th scope="col" id="th_hit">Write</th>
        <th scope="col" id="th_mng">승인/취소일</th>
        <th scope="col" id="th_mng">View</th>
    </tr>
    </thead>
    <tbody>
    <?php
    for ($i=0; $row=sql_fetch_array($result); $i++) {
		$bg = 'bg'.($i%2);
        if(isset($row['wr_30']) && $row['wr_30'] == 1){
            $mtype = "<span class='text-success mr-3'>승인완료</span>";
        }else{
            $mtype = "<span class='text-danger mr-3'>승인대기</span>"; 
        }

        $thumb = get_list_thumbnail('group_info', $row['wr_id'], 50, 50, false, true);

        if($thumb['src']) {
            $img_content = '<img src="'.$thumb['src'].'" class="rounded-circle img-fluid" alt="'.$thumb['alt'].'" >';
        } else {
            $img_content = '<img src="'.G5_IMG_URL.'/bg-step-1.png" class="rounded-circle" style="width:50px; height:50px;" alt="...">';
        }
    ?>

    <tr class="<?php echo $bg; ?>">
		<td headers="mb_list_chk" class="td_chk" rowspan="2">
            <input type="hidden" name="wr_id[<?php echo $i ?>]" value="<?php echo $row['wr_id'] ?>" id="wr_id_<?php echo $i ?>">
            <input type="hidden" name="mb_id[<?php echo $i ?>]" value="<?php echo $row['mb_id'] ?>" id="mb_id_<?php echo $i ?>">
            <label for="chk_<?php echo $i; ?>" class="sound_only"><?php echo get_text($row['wr_id']); ?> <?php echo get_text($row['wr_name']); ?></label>
            <input type="checkbox" name="chk[]" value="<?php echo $i ?>" id="chk_<?php echo $i ?>">
        </td>
        <td headers="th_id"class="td_num"><?php echo $img_content; ?></td>
        <td headers="th_id"class="td_num"><?php echo $row['mb_id']; ?></td>
        <td headers="th_dvc"><?php echo $mtype; ?></td>
        <td headers="th_dvc"><?php echo $row['wr_name']; ?></td>
        <td headers="th_dvc"><?php echo $row['wr_1']; ?></td>
        <td headers="th_st"><?php echo $row['wr_2']; ?></td>
        <td headers="th_end"><?php echo $row['wr_3']; ?></td>
        <td headers="th_odr"><?php echo $row['wr_email']; ?></td>
        <td headers="th_hit"><?php echo $row['wr_4']; ?></td>
        <td headers="th_hit"><?php echo $row['wr_datetime']; ?></td>
        <td headers="th_hit"><?php echo $row['wr_31']; ?></td>
        <td headers="th_mng" class="td_mng td_mns_m">
            <a href="./group_view.php?wr_id=<?php echo $row['wr_id']; ?>" class="btn btn_03">View</a>
        </td>
    </tr>


    <?php
    }
    if ($i == 0) {
    echo '<tr><td colspan="8" class="empty_table">No data.</td></tr>';
    }
    ?>
    </tbody>
    </table>

</div>

<div class="btn_fixed_top">
    <input type="submit" name="act_button" value="Approval" onclick="document.pressed=this.value" class="btn btn_02">
	<input type="submit" name="act_button" value="Cancel" onclick="document.pressed=this.value" class="btn btn_02">
</div>


</form>
<?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, "{$_SERVER['SCRIPT_NAME']}?$qstr&amp;page="); ?>

<script>
function fmemberlist_submit(f)
{
    if (!is_checked("chk[]")) {
        alert(document.pressed+" 하실 항목을 하나 이상 선택하세요.");
        return false;
    }

    if(document.pressed == "Cancel") {
        if(!confirm("선택한 회원의 승인을 취소 하시겠습니까?")) {
            return false;
        }
    }

    return true;
}
</script>

<?php
include_once (G5_ADMIN_PATH.'/admin.tail.php');
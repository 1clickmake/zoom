<?php
$menu['menu200'] = array (
    array('200000', '회원관리', G5_ADMIN_URL.'/member_list.php', 'member', 'user-o'),
	
	array('200000', '<b class="arrcolor"><i class="fa fa-check-square-o"></i> 회원관리</b>', '#', 'line', 1),
    array('200100', '회원관리', G5_ADMIN_URL.'/member_list.php', 'mb_list'),
	//array('200110', '회원 레벨관리', G5_ADMIN_URL.'/member.php?code=level_form', 'level_form'),
	//array('200120', '회원 엑셀일괄등록', G5_ADMIN_URL.'/member.php?code=xls', 'xls'),
	array('200300', '회원메일발송', G5_ADMIN_URL.'/mail_list.php', 'mb_mail'),
	
	//array('200000', '<b class="arrcolor"><i class="fa fa-check-square-o"></i> 포인트 관리</b>', '#', 'line', 1),
	//array('200200', '포인트관리', G5_ADMIN_URL.'/point_list.php', 'mb_point'),
	//array('200210', '포인트 엑셀일괄등록', G5_ADMIN_URL.'/member.php?code=pointxls', 'pointxls'),
    
	array('200000', '<b class="arrcolor"><i class="fa fa-check-square-o"></i> 통계</b>', '#', 'line', 1),
    array('200800', '접속자집계', G5_ADMIN_URL.'/visit_list.php', 'mb_visit', 1),
    array('200810', '접속자검색', G5_ADMIN_URL.'/visit_search.php', 'mb_search', 1),
    array('200820', '접속자로그삭제', G5_ADMIN_URL.'/visit_delete.php', 'mb_delete', 1),
   //array('200900', '투표관리', G5_ADMIN_URL.'/poll_list.php', 'mb_poll')
);
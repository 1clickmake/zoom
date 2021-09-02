<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
$g5['title'] = "Membership completed";
if($member['mb_1'] == "t"){
    $m_type = "Teacher";
    $write_link = G5_BBS_URL."/write.php?bo_table=teacher_info";
    $btnText = "writing teacher information";
} else if($member['mb_1'] == "g"){
    $m_type = "Group";
    $write_link = G5_BBS_URL."/write.php?bo_table=group_info";
    $btnText = "writing group information";
} else if($member['mb_1'] == "b"){
    $m_type = "Member";
    $write_link = G5_URL;
    $btnText = "Home";
}
?>
<style>
.slide{display:none;}
</style>
<div class="text-center py-5 bg-success text-white text2_4">
    <span class="d-inline-block pb-2 border-bottom fw-bold"><?php //echo $m_type;?> <?php echo $g5['title'];?></span>
</div>
<div id="reg_result" class="container">
    
    <div class="reg_result_wr text18 mb-5">
        <p class="reg_cong">
            <strong><?php echo get_text($mb['mb_name']); ?></strong>님의 회원가입을 진심으로 축하합니다.<br>
        </p>

        <?php if (is_use_email_certify()) { ?>
        <p>
            회원 가입 시 입력하신 이메일 주소로 인증메일이 발송되었습니다.<br>
            발송된 인증메일을 확인하신 후 인증처리를 하시면 사이트를 원활하게 이용하실 수 있습니다.
        </p>
        <div id="result_email">
            <span>아이디</span>
            <strong><?php echo $mb['mb_id'] ?></strong><br>
            <span>이메일 주소</span>
            <strong><?php echo $mb['mb_email'] ?></strong>
        </div>
        <p>
            이메일 주소를 잘못 입력하셨다면, 사이트 관리자에게 문의해주시기 바랍니다.
        </p>
        <?php } ?>

        <p>
            회원님의 비밀번호는 아무도 알 수 없는 암호화 코드로 저장되므로 안심하셔도 좋습니다.<br>
            아이디, 비밀번호 분실시에는 회원가입시 입력하신 이메일 주소를 이용하여 찾을 수 있습니다.
        </p>

        <p>
            회원 탈퇴는 언제든지 가능하며 일정기간이 지난 후, 회원님의 정보는 삭제하고 있습니다.<br>
            감사합니다.
        </p>
        
    </div>

    <div class="btn_confirm pt-3 pb-5  mb-5 border-top">
        
        <div class="reg_result_wr my-5 text-start text18">
            <?php if( $m_type == "Teacher"){?>
            <p>
                선생님의 상세 정보를 추가로 입력하시면 <br>administrator의 승인완료 후 코스 등록을 하실 수 있습니다.
            </p>
            <?php } ?>
            <?php if( $m_type == "Group"){?>
                <p>
                단체정보를 입력해 주세요
            </p>
            <?php } ?>
        </div>

        <a href="<?php echo $write_link ?>" class="text16"><?php echo $btnText?></a>
    </div>

</div>

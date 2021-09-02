<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once($board_skin_path.'/_naver_write.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>
<style>
#bo_w a{font-size:12px;}
.custom-file-input ~ .custom-file-label::after {
    content: "File";
}
</style>
<section id="bo_w" class="bg-light container-fluid pb-5">
	<h4 class="border-bottom border-secondary p-2"><i class="fa fa-ellipsis-v text-danger"></i> <?php echo $g5['title'] ?><span class="sound_only"> 목록</span></h4>

    <!-- 게시물 작성/수정 시작 { -->
    <form name="fwrite" id="fwrite" action="<?php echo $action_url ?>" onsubmit="return fwrite_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off" style="width:<?php echo $width; ?>">
    <input type="hidden" name="uid" value="<?php echo get_uniqid(); ?>">
    <input type="hidden" name="w" value="<?php echo $w ?>">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="wr_id" value="<?php echo $wr_id ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
	<input type="hidden" name="token2" value="<?php echo $token2 ?>">
    <?php
    $option = '';
    $option_hidden = '';
    if ($is_notice || $is_html || $is_secret || $is_mail) {
        $option = '';
        if ($is_notice) {
            $option .= "\n".'<input type="checkbox" id="notice" name="notice" value="1" '.$notice_checked.'>'."\n".'<label for="notice">공지</label>';
        }

        if ($is_html) {
            if ($is_dhtml_editor) {
                $option_hidden .= '<input type="hidden" value="html1" name="html">';
            } else {
                $option .= "\n".'<input type="checkbox" id="html" name="html" onclick="html_auto_br(this);" value="'.$html_value.'" '.$html_checked.'>'."\n".'<label for="html">html</label>';
            }
        }

        if ($is_secret) {
            if ($is_admin || $is_secret==1) {
                $option .= "\n".'<input type="checkbox" id="secret" name="secret" value="secret" '.$secret_checked.'>'."\n".'<label for="secret">비밀글</label>';
            } else {
                $option_hidden .= '<input type="hidden" name="secret" value="secret">';
            }
        }

        if ($is_mail) {
            $option .= "\n".'<input type="checkbox" id="mail" name="mail" value="mail" '.$recv_email_checked.'>'."\n".'<label for="mail">답변메일받기</label>';
        }
    }

    echo $option_hidden;
    ?>

    <div>
        <table class="table">
        <tbody>
        <?php if ($is_name) { ?>
        <tr>
            <th scope="row" class="d-none d-md-table-cell"><label for="wr_name">이름<strong class="sound_only">필수</strong></label></th>
            <td><input type="text" name="wr_name" value="<?php echo $name ?>" id="wr_name" required class="form-control required" placeholder="이름" maxlength="20"></td>
        </tr>
        <?php } ?>

        <?php if ($is_password) { ?>
        <tr>
            <th scope="row" class="d-none d-md-table-cell"><label for="wr_password">비밀번호<strong class="sound_only">필수</strong></label></th>
            <td><input type="password" name="wr_password" id="wr_password" <?php echo $password_required ?> placeholder="비밀번호" class="form-control <?php echo $password_required ?>" maxlength="20"></td>
        </tr>
        <?php } ?>

        <?php if ($is_email) { ?>
        <tr>
            <th scope="row" class="d-none d-md-table-cell"><label for="wr_email">이메일</label></th>
            <td><input type="text" name="wr_email" value="<?php echo $email ?>" id="wr_email" class="form-control email" placeholder="이메일" maxlength="100"></td>
        </tr>
        <?php } ?>

        <?php if ($is_homepage) { ?>
        <tr>
            <th scope="row" class="d-none d-md-table-cell"><label for="wr_homepage">홈페이지</label></th>
            <td><input type="text" name="wr_homepage" value="<?php echo $homepage ?>" id="wr_homepage" placeholder="홈페이지" class="form-control"></td>
        </tr>
        <?php } ?>

        <?php if ($option) { ?>
        <tr>
            <th scope="row" class="d-none d-md-table-cell">옵션</th>
            <td><?php echo $option ?></td>
        </tr>
        <?php } ?>

        <?php if ($is_category) { ?>
        <tr>
            <th scope="row" class="d-none d-md-table-cell"><label for="ca_name">분류<strong class="sound_only">필수</strong></label></th>
            <td>
                <select name="ca_name" id="ca_name" required class="required form-control" >
                    <option value="">선택하세요</option>
                    <?php echo $category_option ?>
                </select>
            </td>
        </tr>
        <?php } ?>
		
		<?php if ($is_admin && $token2) { ?>
        <tr>
            <th scope="row" class="d-none d-md-table-cell">블로그 글보내기</th>
            <td>
			<p class="text-info">체크할 경우 네이버 블로그로 글 내용이 전송되며 링크 #1에 자동으로 해당 블로그 링크가 생성됩니다.</p>
			<input type="checkbox" id="never_write" name="never_write" value="1"><label for="never_write" class="ml-2"> 네이버로 글 보내기</label>
			</td>
        </tr>

        <tr class="b_category" style="display:none;">
            <th scope="row" class="d-none d-md-table-cell"><label for="ca_name">블로그 분류<strong class="sound_only">필수</strong></label></th>
            <td>
                <select name="wr_50" id="wr_50" class="form-control" >
                    <?php
					for ($i=0 ; $i<$cnt;$i++){
					?>
					<option value="<?php echo $navercate['message']['result'][$i]['categoryNo']?>" <?php if($write[wr_50] == $navercate['message']['result'][$i]['categoryNo']) echo "selected";?>><?php echo $navercate['message']['result'][$i]['name']?></option>
						<?php
						$cnt2 = count($navercate['message']['result'][$i][subCategories]); 
						for ($y=0 ; $y<$cnt2;$y++){
						?>
							<option value="<?php echo $navercate['message']['result'][$i][subCategories][$y]['categoryNo']?>" <?php if($write[wr_50] == $navercate['message']['result'][$i][subCategories][$y]['categoryNo']) echo "selected";?>> - <?php echo $navercate['message']['result'][$i][subCategories][$y]['name']?></option>
						<?php } ?>
					<?php } ?>
                </select>
            </td>
        </tr>
		<tr class="b_category" style="display:none;">
            <th scope="row" class="d-none d-md-table-cell"><label for="wr_1">태그</label></th>
            <td>
				<p class="text-info">태그를 입력합니다. 컴마(',')로 구분하며 최대 10개까지 등록할 수 있습니다.</p>
                <input type="text" name="wr_1" value="<?php echo $write['wr_1'] ?>" id="wr_1" class="form-control" placeholder="태그 (컴마 ',' 로 구분)" maxlength="255">
            </td>
        </tr>
        <?php } ?>

        <tr>
            <th scope="row" class="d-none d-md-table-cell"><label for="wr_subject">제목<strong class="sound_only">필수</strong></label></th>
            <td>
                <input type="text" name="wr_subject" value="<?php echo $subject ?>" id="wr_subject" required class="form-control required" placeholder="제목" maxlength="255">
            </td>
        </tr>

        <tr>
            <th scope="row" class="d-none d-md-table-cell"><label for="wr_content">내용<strong class="sound_only">필수</strong></label></th>
            <td class="wr_content">
                <?php if($write_min || $write_max) { ?>
                <!-- 최소/최대 글자 수 사용 시 -->
                <p id="char_count_desc">이 게시판은 최소 <strong><?php echo $write_min; ?></strong>글자 이상, 최대 <strong><?php echo $write_max; ?></strong>글자 이하까지 글을 쓰실 수 있습니다.</p>
                <?php } ?>
                <?php echo $editor_html; // 에디터 사용시는 에디터로, 아니면 textarea 로 노출 ?>
                <?php if($write_min || $write_max) { ?>
                <!-- 최소/최대 글자 수 사용 시 -->
                <div id="char_count_wrap"><span id="char_count"></span>글자</div>
                <?php } ?>
            </td>
        </tr>

        <?php for ($i=1; $is_link && $i<=G5_LINK_COUNT; $i++) { ?>
        <tr>
            <th scope="row" class="d-none d-md-table-cell"><label for="wr_link<?php echo $i ?>">링크 #<?php echo $i ?></label></th>
            <td>
			<div class="input-group">
				<div class="input-group-prepend">
				  <span class="input-group-text"><i class="fa fa-link"></i></span>
				</div>
			<input type="text" name="wr_link<?php echo $i ?>" value="<?php if($w=="u"){echo$write['wr_link'.$i];} ?>" id="wr_link<?php echo $i ?>" class="form-control">
			</div>
			</td>
        </tr>
        <?php } ?>

        <?php for ($i=0; $is_file && $i<$file_count; $i++) { ?>
        <tr>
            <th scope="row" class="d-none d-md-table-cell">파일 #<?php echo $i+1 ?></th>
            <td>
			<div class="custom-file">
                <input type="file" name="bf_file[]" title="파일첨부 <?php echo $i+1 ?> : 용량 <?php echo $upload_max_filesize ?> 이하만 업로드 가능" class="custom-file-input">
				<label class="custom-file-label" for="customFile"><i class="fa fa-upload"></i></label>
			</div>
                <?php if ($is_file_content) { ?>
                <input type="text" name="bf_content[]" value="<?php echo ($w == 'u') ? $file[$i]['bf_content'] : ''; ?>" title="파일 설명을 입력해주세요." class="frm_file form-control" size="50">
                <?php } ?>
                <?php if($w == 'u' && $file[$i]['file']) { ?>
                <input type="checkbox" id="bf_file_del<?php echo $i ?>" name="bf_file_del[<?php echo $i;  ?>]" value="1"> <label for="bf_file_del<?php echo $i ?>"><?php echo $file[$i]['source'].'('.$file[$i]['size'].')';  ?> 파일 삭제</label>
                <?php } ?>
			
            </td>
        </tr>
        <?php } ?>

        <?php if ($is_guest) { //자동등록방지  ?>
        <tr>
            <th scope="row" class="d-none d-md-table-cell">자동등록방지</th>
            <td>
                <?php echo $captcha_html ?>
            </td>
        </tr>
        <?php } ?>

        </tbody>
        </table>
    </div>

    <div class="text-center pb-3">
        <input type="submit" value="작성완료" id="btn_submit" accesskey="s" class="btn btn-info">
        <a href="./board.php?bo_table=<?php echo $bo_table ?>" class="btn btn-outline-secondary">취소</a>
    </div>
    </form>

<script>
$('#never_write').click(function() {
	var n_checked = $('#never_write').attr('checked');
						   
	if(n_checked){
		$('.b_category').show();
	}else{
		$('.b_category').hide();
	}
});
</script>

    <script>
    <?php if($write_min || $write_max) { ?>
    // 글자수 제한
    var char_min = parseInt(<?php echo $write_min; ?>); // 최소
    var char_max = parseInt(<?php echo $write_max; ?>); // 최대
    check_byte("wr_content", "char_count");

    $(function() {
        $("#wr_content").on("keyup", function() {
            check_byte("wr_content", "char_count");
        });
    });

    <?php } ?>
    function html_auto_br(obj)
    {
        if (obj.checked) {
            result = confirm("자동 줄바꿈을 하시겠습니까?\n\n자동 줄바꿈은 게시물 내용중 줄바뀐 곳을<br>태그로 변환하는 기능입니다.");
            if (result)
                obj.value = "html2";
            else
                obj.value = "html1";
        }
        else
            obj.value = "";
    }

    function fwrite_submit(f)
    {
        <?php echo $editor_js; // 에디터 사용시 자바스크립트에서 내용을 폼필드로 넣어주며 내용이 입력되었는지 검사함   ?>

        var subject = "";
        var content = "";
        $.ajax({
            url: g5_bbs_url+"/ajax.filter.php",
            type: "POST",
            data: {
                "subject": f.wr_subject.value,
                "content": f.wr_content.value
            },
            dataType: "json",
            async: false,
            cache: false,
            success: function(data, textStatus) {
                subject = data.subject;
                content = data.content; 
            }
        });

        if (subject) {
            alert("제목에 금지단어('"+subject+"')가 포함되어있습니다");
            f.wr_subject.focus();
            return false;
        }

        if (content) {
            alert("내용에 금지단어('"+content+"')가 포함되어있습니다");
            if (typeof(ed_wr_content) != "undefined")
                ed_wr_content.returnFalse();
            else
                f.wr_content.focus();
            return false;
        }

        if (document.getElementById("char_count")) {
            if (char_min > 0 || char_max > 0) {
                var cnt = parseInt(check_byte("wr_content", "char_count"));
                if (char_min > 0 && char_min > cnt) {
                    alert("내용은 "+char_min+"글자 이상 쓰셔야 합니다.");
                    return false;
                }
                else if (char_max > 0 && char_max < cnt) {
                    alert("내용은 "+char_max+"글자 이하로 쓰셔야 합니다.");
                    return false;
                }
            }
        }

        <?php echo $captcha_js; // 캡챠 사용시 자바스크립트에서 입력된 캡챠를 검사함  ?>

        document.getElementById("btn_submit").disabled = "disabled";

        return true;
    }
    </script>
</section>
<!-- } 게시물 작성/수정 끝 -->
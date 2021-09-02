<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>
<style>
.gal-list-box .imagebox{position:relative;overflow:hidden;padding-bottom:100%;}
.gal-list-box .imagebox img{position: absolute;width: 100%;height: 100%; -webkit-transition: all .5s ease-in-out;  -moz-transition: all .5s ease-in-out;  transition: all .5s ease-in-out;}
.gal-list-box .imagebox img:hover{-o-transform: scale(1.2, 1.2);  -moz-transform: scale(1.2, 1.2);  -webkit-transform: scale(1.2, 1.2);  -ms-transform: scale(1.2, 1.2);  transform: scale(1.2, 1.2);}
</style>
<!-- 게시판 목록 시작 -->
<div class="bg-light container-fluid pb-5">
	<div class="pt-2 pb-2">
    
    <!--<h4 class="border-bottom border-secondary p-2"><i class="fa fa-ellipsis-v text-danger"></i> <?php echo $board['bo_subject'] ?><span class="sound_only"> 목록</span></h4>-->
    <?php if ($is_category) { ?>
    <div id="bo_cate">
        <h2><?php echo $board['bo_subject'] ?> 카테고리</h2>
        <ul id="bo_cate_ul">
            <?php echo $category_option ?>
        </ul>
    </div>
    <?php } ?>

    <!-- 게시판 페이지 정보 및 버튼 시작 { -->
    <div class="row pt-2 pb-2">
        <div class="col">
            <?php if ($is_checkbox) { ?>
                <label for="chkall" class="sound_only">현재 페이지 게시물 전체</label>
                <input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);">
            <?php } ?>
            <span>Total <?php echo number_format($total_count) ?>건</span>
            <?php echo $page ?> 페이지
        </div>

        <?php if ($rss_href || $write_href) { ?>
        <div class="col text-right">
			<div class="btn-group" role="group">
            <?php if ($rss_href) { ?><a href="<?php echo $rss_href ?>" class="btn btn-success btn-sm">RSS</a><?php } ?>
            <?php if ($admin_href) { ?><a href="<?php echo $admin_href ?>" class="btn btn-danger btn-sm">관리자</a><?php } ?>
            <?php if ($write_href) { ?><a href="<?php echo $write_href ?>" class="btn btn-primary btn-sm">글쓰기</a><?php } ?>
			</div>
        </div>
        <?php } ?>
    </div>
    <!-- } 게시판 페이지 정보 및 버튼 끝 -->

    <form name="fboardlist"  id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="sw" value="">


    

    <div class="row">
        <?php 
		$btnum = 12/$board['bo_gallery_cols'];
		for ($i=0; $i<count($list); $i++) {
		?>
        <div class="col-6 col-md-<?php echo $btnum?> mb-3">
            <div class="border p-2">
            
            <span class="sound_only">
                <?php
                if ($wr_id == $list[$i]['wr_id'])
                    echo "<span class=\"bo_current\">열람중</span>";
                else
                    echo $list[$i]['num'];
                ?>
            </span>
            
            <div class="gall_href mb-2">
                <a href="<?php echo $list[$i]['href'] ?>" class="gal-list-box">
                <?php
                if ($list[$i]['is_notice']) { // 공지사항 ?>
                    <strong style="width:<?php echo $board['bo_mobile_gallery_width'] ?>px;height:<?php echo $board['bo_mobile_gallery_height'] ?>px">공지</strong>
                <?php
                } else {
                    $thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $board['bo_mobile_gallery_width'], $board['bo_mobile_gallery_height'],'', true);

                    if($thumb['src']) {
                        $img_content = '<img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" class="img-fluid" >';
                    } else {
                        $img_content = '<img src="http://placehold.it/600x500/999999/ffffff?text=no-image"  class="img-fluid">';
                    }
	
					echo '<div class="imagebox">';
                    echo $img_content;
					echo '</div>';
                }
                ?>
                </a>
            </div>
            <div class="gall_text_href text-center">
                <?php if ($is_checkbox) { ?>
                <label for="chk_wr_id_<?php echo $i ?>" class="sound_only"><?php echo $list[$i]['subject'] ?></label>
                <input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
                <?php } ?>
                <?php
                // echo $list[$i]['icon_reply']; 갤러리는 reply 를 사용 안 할 것 같습니다. - 지운아빠 2013-03-04
                if ($is_category && $list[$i]['ca_name']) {
                ?>
                <a href="<?php echo $list[$i]['ca_name_href'] ?>" class="bo_cate_link"><?php echo $list[$i]['ca_name'] ?></a>
                <?php } ?>
                <a href="<?php echo $list[$i]['href'] ?>">
                    <div class="ellip-block text-center">
					<?php
					// if ($list[$i]['link']['count']) { echo '['.$list[$i]['link']['count']}.']'; }
					// if ($list[$i]['file']['count']) { echo '<'.$list[$i]['file']['count'].'>'; }

					if (isset($list[$i]['icon_new'])) echo $list[$i]['icon_new'];
					if (isset($list[$i]['icon_hot'])) echo $list[$i]['icon_hot'];
					//if (isset($list[$i]['icon_file'])) echo $list[$i]['icon_file'];
					//if (isset($list[$i]['icon_link'])) echo $list[$i]['icon_link'];
					//if (isset($list[$i]['icon_secret'])) echo $list[$i]['icon_secret'];
					?> 
					<?php echo $list[$i]['subject'] ?>
                    <?php if ($list[$i]['comment_cnt']) { ?><span class="sound_only">댓글</span><?php echo $list[$i]['comment_cnt']; ?><span class="sound_only">개</span><?php } ?>
					</div>
				</a>

            </div>
            </div>
        </div>
        <?php } ?>
        <?php if (count($list) == 0) { echo "<div class=\"text-center py-5\">게시물이 없습니다--.</div>"; } ?>
    </div>

    <?php if ($list_href || $is_checkbox || $write_href) { ?>
    <div class="row">
        <?php if ($is_checkbox) { ?>
        <div class="col">
			<div class="btn-group" role="group">
            <input type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value" class="btn btn-outline-danger btn-sm">
            <input type="submit" name="btn_submit" value="선택복사" onclick="document.pressed=this.value" class="btn btn-outline-danger btn-sm">
            <input type="submit" name="btn_submit" value="선택이동" onclick="document.pressed=this.value" class="btn btn-outline-danger btn-sm">
			</div>
        </div>
        <?php } ?>

        <?php if ($list_href || $write_href) { ?>
        <div class="col text-right">
			<div class="btn-group" role="group">
            <?php if ($list_href) { ?><a href="<?php echo $list_href ?>" class="btn btn-outline-secondary btn-sm">목록</a><?php } ?>
            <?php if ($write_href) { ?><a href="<?php echo $write_href ?>" class="btn btn-primary btn-sm">글쓰기</a><?php } ?>
            <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#searchModal"><i class="fa fa-search" aria-hidden="true"></i></button>
			</div>
        </div>
        <?php } ?>
    </div>
    <?php } ?>

    </form>
</div>

<!-- 페이지 -->
<?php echo $write_pages; ?>
</div>


<?php if($is_checkbox) { ?>
<noscript>
<p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
</noscript>
<?php } ?>



<!-- 게시판 검색 시작 { -->

<!-- Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-search" aria-hidden="true"></i> Search</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form name="fsearch" method="get">
        <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
        <input type="hidden" name="sca" value="<?php echo $sca ?>">
        <input type="hidden" name="sop" value="and">
        <label for="sfl" class="sound_only">검색대상</label>
        <select name="sfl" id="sfl" class="form-control form-control-sm mb-1">
            <option value="wr_subject"<?php echo get_selected($sfl, 'wr_subject', true); ?>>제목</option>
            <option value="wr_content"<?php echo get_selected($sfl, 'wr_content'); ?>>내용</option>
            <option value="wr_subject||wr_content"<?php echo get_selected($sfl, 'wr_subject||wr_content'); ?>>제목+내용</option>
            <option value="mb_id,1"<?php echo get_selected($sfl, 'mb_id,1'); ?>>회원아이디</option>
            <option value="mb_id,0"<?php echo get_selected($sfl, 'mb_id,0'); ?>>회원아이디(코)</option>
            <option value="wr_name,1"<?php echo get_selected($sfl, 'wr_name,1'); ?>>글쓴이</option>
            <option value="wr_name,0"<?php echo get_selected($sfl, 'wr_name,0'); ?>>글쓴이(코)</option>
        </select>
        <label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
        <input type="text" name="stx" value="<?php echo stripslashes($stx) ?>" required id="stx" class="form-control form-control-sm mb-1" maxlength="20">
        <div class="row">
            <div class="col-6"><button type="submit" value="검색" class="btn btn-danger btn-sm btn-block"><i class="fa fa-check" aria-hidden="true"></i> 검색</button></div> 
           <div class="col-6"><button type="button" class="btn btn-secondary  btn-sm btn-block" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Close</button></div> 
        </div>
        
        </form>
      </div>
    </div>
  </div>
</div>
<!-- } 게시판 검색 끝 -->

<?php if ($is_checkbox) { ?>
<script>
function all_checked(sw) {
    var f = document.fboardlist;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]")
            f.elements[i].checked = sw;
    }
}

function fboardlist_submit(f) {
    var chk_count = 0;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]" && f.elements[i].checked)
            chk_count++;
    }

    if (!chk_count) {
        alert(document.pressed + "할 게시물을 하나 이상 선택하세요.");
        return false;
    }

    if(document.pressed == "선택복사") {
        select_copy("copy");
        return;
    }

    if(document.pressed == "선택이동") {
        select_copy("move");
        return;
    }

    if(document.pressed == "선택삭제") {
        if (!confirm("선택한 게시물을 정말 삭제하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다\n\n답변글이 있는 게시글을 선택하신 경우\n답변글도 선택하셔야 게시글이 삭제됩니다."))
            return false;

        f.removeAttribute("target");
        f.action = "./board_list_update.php";
    }

    return true;
}

// 선택한 게시물 복사 및 이동
function select_copy(sw) {
    var f = document.fboardlist;

    if (sw == 'copy')
        str = "복사";
    else
        str = "이동";

    var sub_win = window.open("", "move", "left=50, top=50, width=500, height=550, scrollbars=1");

    f.sw.value = sw;
    f.target = "move";
    f.action = "./move.php";
    f.submit();
}
</script>
<?php } ?>
<!-- 게시판 목록 끝 -->

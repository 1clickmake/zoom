<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);

// 분류 사용 여부
$is_category = false;
$category_option = '';
if ($board['bo_use_category']) {
    $is_category = true;
    $category_href = get_pretty_url($bo_table);
}

?>
<style>
.gal-list-box .imagebox{position:relative;overflow:hidden;padding-bottom:100%;}
.gal-list-box .imagebox img{position: absolute;width: 100%;height: 100%; -webkit-transition: all .5s ease-in-out;  -moz-transition: all .5s ease-in-out;  transition: all .5s ease-in-out;}
.gal-list-box .imagebox img:hover{-o-transform: scale(1.2, 1.2);  -moz-transform: scale(1.2, 1.2);  -webkit-transform: scale(1.2, 1.2);  -ms-transform: scale(1.2, 1.2);  transform: scale(1.2, 1.2);}
</style>
<!-- 게시판 목록 시작 -->
<div class="container pb-5">
	<div class="pt-2 pb-2">

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
        <div class="col text-right text-end">
			<div>
            <?php if ($rss_href) { ?><a href="<?php echo $rss_href ?>" class="btn btn-success btn-sm">RSS</a><?php } ?>
            <?php if ($admin_href) { ?><a href="<?php echo $admin_href ?>" class="btn btn-danger btn-sm text-white">관리자</a><?php } ?>
            <?php if ($write_href) { ?><a href="<?php echo $write_href ?>" class="btn btn-primary btn-sm text-white">글쓰기</a><?php } ?>
			</div>
        </div>
        <?php } ?>
    </div>
    <!-- } 게시판 페이지 정보 및 버튼 끝 -->

    <div class="row">
        <div class="col-12 col-md-9">
            <div class="list-load"></div>
        </div>
        <div class="col-12 col-md-3 d-none d-md-block position-relative">
            <div class="list-category w-auto">
                <?php if ($is_category) { ?>
                <div class="text16">
                    <ul id="list-group ">
                        <li class="list-group-item text-center text20 border-dark"><b>Categories</b></li>
                    
                        <?php
                        $categories = explode('|', $board['bo_category_list']); // 구분자가 , 로 되어 있음
                        for ($i=0; $i<count($categories); $i++) {
                            $category = trim($categories[$i]);
                            if ($category=='') continue;
                            $cate_url = get_pretty_url($bo_table,'','sca='.urlencode($category));
                            $cateCnt = sql_fetch(" select count(*) as cnt from g5_write_{$bo_table}  where wr_is_comment = '0' and ca_name = '{$category}' ");
                        ?>
                            <label  class="list-group-item border-dark">
                                <input class="form-check-input ca-chk" type="checkbox" value="<?php echo $category;?>">
                                <?php echo $category;?>
                                <span class="badge rounded-pill bg-warning text-white float-end"><?php echo $cateCnt['cnt'];?></span>
                            </label>
                        <?php } ?>
                        <li class="list-group-item text-center text20 border-0"><button class="d-block bg-dark text-white w-100 rounded-pill py-2 mt-2 cate-clear">Filter Results</button></li>
                    </ul>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

</div>

<!-- 페이지 -->
<?php echo $write_pages; ?>
</div>


<?php if($is_checkbox) { ?>
<noscript>
<p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
</noscript>
<?php } ?>



<script>
 $(document).ready(function(){

    $('.list-load').load("<?php echo $board_skin_url?>/ajax.list.skin.php",
		{
			'bo_table':'<?php echo $bo_table;?>',
            'sca':'<?php echo $sca;?>',
            'page':'<?php echo $page;?>'
		}
	);
}); 

$(document).ready(function(){

    $(".ca-chk").change(function() {
        var category = new Array();//category

        $('.ca-chk:checkbox:checked').each(function () {
            category.push($(this).val());
        });
        $('.list-load').load("<?php echo $board_skin_url?>/ajax.list.skin.php",
            {
                'bo_table':'<?php echo $bo_table;?>',
                'sca':'<?php echo $sca;?>',
                'page':'<?php echo $page;?>',
                'category': category
            }
        );
    });

    $(".cate-clear").click(function() {
        $('.ca-chk:checkbox:checked').attr("checked", false);
        $('.list-load').load("<?php echo $board_skin_url?>/ajax.list.skin.php",
            {
                'bo_table':'<?php echo $bo_table;?>',
                'sca':'<?php echo $sca;?>',
                'page':'<?php echo $page;?>'
            }
        );
    });

}); 
</script>

<script>
(function($) {
    var element = $('.follow-scroll'),
        originalY = element.offset().top;
        otherDiv = 1000,
        staticHeight = $('.other-div').height()-$(element).height(); 
    
    // Space between element and top of screen (when scrolling)
    var topMargin = 10;
    
    // Should probably be set in CSS; but here just for emphasis
    element.css('position', 'relative');
    
    $(window).on('scroll', function(event) {
        var scrollTop = $(window).scrollTop();
        
        element.stop(false, false).animate({
            top: scrollTop < originalY
                    ? 0
                    : scrollTop - originalY + topMargin
        }, 10);

        if(scrollTop > 2000){
            element.stop();
        }
    });
})(jQuery);
</script>

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

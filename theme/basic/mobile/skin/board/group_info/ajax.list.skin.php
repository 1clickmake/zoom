<?php
include_once('./_common.php');
include_once('./list_num.php');
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
        for ($i=0; $i<count($list); $i++) {
            $btnum = 12/$board['bo_gallery_cols'];
		?>
    
        <div class="col-6 col-md-<?php echo $btnum?> mb-3">
            <div class="border border-dark">
            
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
                        $thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $board['bo_mobile_gallery_width'], $board['bo_mobile_gallery_height'],'', true);

                        if($thumb['src']) {
                            $img_content = '<img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" class="img-fluid" >';
                        } else {
                            $img_content = '<img src="http://placehold.it/600x500/999999/ffffff?text=no-image"  class="img-fluid">';
                        }
        
                        echo '<div class="imagebox">';
                        echo $img_content;
                        echo '</div>';
                    ?>
                    </a>
                </div>
                <div class="gall_text_href text-left px-3">
                    <div class="py-2">
                        <?php if ($is_checkbox) { ?>
                        <label for="chk_wr_id_<?php echo $i ?>" class="sound_only"><?php echo $list[$i]['subject'] ?></label>
                        <input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
                        <?php } ?>
                        <span class="text-primary text14"><?php echo $list[$i]['wr_name'] ?></span>
                    </div>
                    <a href="<?php echo $list[$i]['href'] ?>">
                        <div class="ellip-block text-left text24 pb-5">
                        <?php
                        if (isset($list[$i]['icon_new'])) echo $list[$i]['icon_new'];
                        if (isset($list[$i]['icon_hot'])) echo $list[$i]['icon_hot'];
                        ?> 
                        <?php echo $list[$i]['subject'] ?>
                        </div>
                    </a>
                </div>
                <div class="border-top border-dark px-3 py-2">
                    <div class="row text22">
                        <div class="col"><p class="text-primary">Free</p></div>
                        <div class="col text-end"><p><i class="fa fa-users" aria-hidden="true"></i> <span class="d-inline-block text12"><?php echo $list[$i]['wr_hit'] ?></span></p></div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php if (count($list) == 0) { echo "<div class=\"text-center py-5\">There are no posts.</div>"; } ?>
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
        <div class="col text-right text-end">
			<div class="btn-group" role="group">
            <?php if ($list_href) { ?><a href="<?php echo $list_href ?>" class="btn btn-outline-secondary btn-sm">목록</a><?php } ?>
            <?php if ($write_href) { ?><a href="<?php echo $write_href ?>" class="btn btn-primary btn-sm text-white">글쓰기</a><?php } ?>
			</div>
        </div>
        <?php } ?>
    </div>
    <?php } ?>

    </form>

<?php
$board_path = $_POST['board_path'];
include_once($board_path.'/_common.php');
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

$page = $_POST['pageno'];
$viewpage = $_POST['viewpage'];
$no_of_records_per_page = 20;
include_once($board_path.'/list_num.php');

$offset = ($pageno-1) * $no_of_records_per_page;
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
//echo $board_path;

?>
<style>
.imgback{height:200px;}
@media (max-width: 768px) {
	.imgback{height:265px;}
}
</style>
<!-- 게시판 목록 시작 -->
<div>
	
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
		
		<input type="hidden" id="pageno" value="<?php echo $page?>">
		<img id="loader" src="<?php echo $board_skin_url?>/img/loader.gif" style="position:absolute; z-index:0; top:-100px;">
	
    </div>
</div>
<script>
<?php if (count($list) == 0) { ?>
	$("#loader").hide();
<?php } ?>
</script>

<?php
include_once('./_common.php');
?>
        <ul class="cours_list">
            <?php
            $_POST['boards'] = "courses"; 
            $_POST['iwidth'] = "300";    
            $_POST['iheight'] ="300";          	
            $sqllatest = "select * from g5_write_".$_POST['boards']." where wr_is_comment = '0' order by wr_id desc limit 4";
            $resultlatest = sql_query($sqllatest);
            for ($l=0; $list=sql_fetch_array($resultlatest); $l++) {
                $thumb = get_list_thumbnail($_POST['boards'], $list['wr_id'], $_POST['iwidth'], $_POST['iheight'],true,true); 
				$wr_subject = cut_str($list['wr_subject'], 10);
				if($thumb['src']){
					$l_img = $thumb['src'];
				}else{
					$l_img = "https://fakeimg.pl/".$_POST['iwidth']."x".$_POST['iheight']."/333,200/fff,250/?font_size=32&font=noto&text=".$wr_subject;
				}
            ?>	
                <li>
                    <a href="<?php echo get_pretty_url( $_POST['boards'], $list['wr_id'] )?>" class="full">
                    <div class="c_img"><img src="<?php echo $l_img?>"></div>
                    <div class="c_info">
                        <p class="s_tit"><?php echo $list['wr_name'] ?></p>
                        <p class="tit"><?php echo $wr_subject;?></p>
                    </div>
                    <div class="c_price clearfix">
                        <p class="price">Free</p>
                        <p class="comment">
                            <img src="<?php echo G5_THEME_URL?>/images/people-icon.png">
                            <span><?php echo $list['wr_hit'] ?></span>
                        </p>
                    </div>
                    </a>
                </li>
            <?php } ?>
        </ul>
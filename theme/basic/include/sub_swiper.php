<?php
include_once('./_common.php');
include_once(G5_THEME_PATH.'/include/_set_title.php');

$colors=["one", "two", "three"];
$rand_color = $colors[array_rand($colors)];
?>
    <div class="slide" style="width:100%; overflow:hidden;">
        <div class="swiper-container mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide <?php echo $rand_color?>">
                    <div class="box">
                        <p class="tit"><?php echo $sub_title;?></p>
                        <p class="art">an educational solution that connects each other to create educational opportunities in developing countries and to provide meaningful and joyful lives for retired seniors in developed countries.</p>
                    </div>
                </div>
            </div>
        </div>
    </div><!--slide-->
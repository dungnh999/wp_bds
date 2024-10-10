<?php


/**
 * Template Name: Template Co operate 2
 */


get_header();

global $post;

$heading = get_field('heading_heading', $post);
$heading_content = get_field('heading_content', $post);
$img_1 = get_field('img_1', $post);
$heading_list = get_field('heading_list', $post);
$listht_1 = get_field('listht_1', $post);

$title_step = get_field('title_step', $post);
$bg_step = get_field('bg_step', $post);
$list_step = get_field('list_step', $post);

?>

<div class="container">
    <div class="row">
        <div class="col-md-12 w900 mb-4">
            <?php 
                if(!empty($heading)) {
                    ?>
            <div class="block-heading text-center">
                <p class="f18 color-1 fw700 uppercase"><?php echo $heading['subtitle'];?></p>
                <h2 class="f50 color-main fw800"><?php echo $heading['title_heading'];?></h2>
            </div>
            <?php
                }
                if(!empty($heading_content)) {
                    echo '<div class="content_co mb-4 text-center">'.$heading_content.'</div>';
                }
            
            ?>
        </div>

            <?php
            if(!empty($img_1)) {
                echo '        <div class="col-md-12 mb-50">';
                echo '<img src="'.$img_1['url'].'" alt="img" />';
                echo '        </div>';
            }
            ?>

        <div class="col-md-12 home_sec_5 mb-80">
            <div class="text_center">

                <?php 
                if(!empty($heading_list)) {
                    ?>
                    <div class="block-heading text-center">
                        <h2 class="f50 color-main fw800"><?php echo $heading_list;?></h2>
                    </div>
                    <?php
                        }
                    ?>
                <div class="wrap_action">
                    <?php 
                        if(!empty($listht_1)) {
                            foreach($listht_1 as $key => $itemht) {
                                ?>
                                <div class="item">

                                    <div class="box_content">
                                        <div class="num color-main fw700"><?php echo $itemht['number']; ?></div>
                                        <h3><?php echo $itemht['title']; ?></h3>
                                        <div class="content"><?php echo $itemht['content']; ?></div>
                                    </div>
                                    <div class="box_img">
                                        <?php echo '<img src="'.$itemht['img_item_1']['url'].'" alt="img"/>';?>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="sec-step pt-80 pb-80" style="background-image: url(<?php echo $bg_step['url']; ?>);">
    <div class="container">
        <div class="row">
        <div class="col-md-12 step" >
        <div class="text_center mb-4">
            <?php if(!empty($title_step)) { ?>
                <div class="block-heading text-center">
                    <h2 class="f50 color-main fw800"><?php echo $title_step;?></h2>
                </div>
            <?php } ?>
        </div>
        <div class="slidestep">
            <div class="swiper swiper-container">
                <div class="swiper-wrapper">
                    <?php 
                    if(!empty($list_step)) {
                        foreach ($list_step as $key => $step) {
                            ?>
                            <div class="swiper-slide">
                                <div class="item-step-slide text-center">
                                    <div class="number-step f50 color-white fw700">
                                        <?php echo $step['number_step'];?>
                                    </div>
                                    <h3 class="f18 fw700"><?php echo $step['title_step'];?></h3>
                                    <div class="heading-space-step"></div>
                                    <p><?php echo $step['content_step'];?></p>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="swiper-button-prev novbutton-slide"></div>
            <div class="swiper-button-next novbutton-slide"></div>
        </div>
    </div>
        </div>
    </div>
</div>

<?php

get_footer();
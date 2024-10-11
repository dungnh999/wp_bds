<?php


/**
 * Template Name: Template Co operate
 */


get_header();

global $post;

$heading = get_field('heading_heading', $post);
$heading_content = get_field('heading_content', $post);
$list_co = get_field('list_co', $post);

?>

<div class="container">
    <div class="row">
        <div class="col-md-12 w600 mb-4">
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
        <div class="col-md-12">
            <?php 
            if(!empty($list_co)) {
                foreach($list_co as $key => $list_co_item) {
                    ?>
                    <div class="item-co mb-5">
                        <div class="inner-item-co d-flex ">
                            <div class="thumb-co col-md-6 <?php echo ($key % 2 != 0) ? 'order2' : ''; ?>">
                                <img src="<?php echo $list_co_item['img_co']['url']; ?>" alt="<?php echo $list_co_item['title_co']; ?>">
                            </div>

                            <div class="content-co col-md-6 ">
                                <div class="inner-content-co">
                                <h2 class="f32 fw700 uppercase"><?php echo $list_co_item['title_co']; ?></h2>
                                <div class="heading-space"></div>
                                <p><?php echo $list_co_item['content_co']; ?></p>
                                <?php 
                                if(!empty($list_co_item['link_co'])) {
                                    echo '<a href="'.$list_co_item['link_co']['url'].'" class="cta-more">'.$list_co_item['link_co']['title'].'</a>';
                                }
                                ?>
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>

    </div>
</div>

<?php

get_footer();
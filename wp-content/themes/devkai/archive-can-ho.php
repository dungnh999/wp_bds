<?php 


get_header();

// $count = $GLOBALS['wp_query']->found_posts;
$description_ch = get_field('description_ch', 'options');
$currentTerm = get_queried_object(); 
$termsCH = get_terms(array(
    'taxonomy' => 'danh-muc-can-ho',
    'hide_empty' => false,
    'parent' => 0
));
?>


<div id="main-can-ho">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block-heading text-center">
                    <p class="f18 color-1 fw700 uppercase mb-2"><?php echo __('PRODUCTS FOR RENT', 'devkai'); ?></p>
                    <h2 class="f50 color-main fw700 uppercase"><?php echo (is_archive()) ? $currentTerm->label : $currentTerm->name; ?></h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <?php 
            if(!empty($termsCH)) {
                foreach($termsCH as $term_ch) {
                    $img_term_ch = get_field('img_term_ch', $term_ch);
                    ?>
                    <div class="col-md-4">
                        <div class="item-term-ch">
                            <div class="inner-term-ch text-center">
                            <a href="<?php echo add_query_arg('danh-muc-san-pham', $term_ch->slug, get_term_link($term_ch->term_id, $term_ch->taxonomy)) ?>" data-loai-id="<?php echo $term_ch->term_id  ?>">
                                    <div class="thumbnail-term-ch mb-3">
                                        <img src="<?php echo $img_term_ch['url']; ?>" alt="<?php echo $term_ch->name; ?>">
                                    </div>
                                    <h3 class="color-main fw700"><?php echo $term_ch->name; ?></h3>
                            </a>
                            <a >ádsađá</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
        
            ?>
        </div>
    </div>

    <div class="container list-ch mb-5">

        <div class="row">
            <div class="col-md-12">
                <div class="description-ch">
                    <?php echo $description_ch; ?>

                </div>
                <div class="more-des text-center">
                    <a href="javascript:voild(0);" class="cta-more"><?php echo __('Xem tất cả', 'devkai');?></a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

get_footer();
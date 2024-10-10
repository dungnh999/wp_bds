<?php 


get_header();
$loai_slug = sanitize_text_field($_GET['danh-muc-san-pham']);
$currentterrm = get_queried_object();
$hangs = get_terms(array(
    'taxonomy' => 'du-an',
    'hide_empty' => true,
    'meta_query' => array(
        array(
            'key' => 'danh_muc_can_ho_slug',
            'value' => $loai_slug,
            'compare' => 'LIKE'
        )
    )
));
echo json_encode($hangs) ;

?>

<div id="main-can-ho">
    <div class="container"> 
        <div class="row">
            <div class="col-md-12">
                <div class="block-heading text-center">
                    <p class="f18 color-1 fw700 uppercase mb-2">Dự án </p>
                    <h2 class="f50 color-main fw700 uppercase"> <?php echo $currentterrm->name ; ?></h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <?php 
                foreach($termsCH as $term_ch) {
                    $img_term_ch = get_field('image_project', $term_ch);
                    ?>
                        <div class="col-md-6">
                            <div class="item-term-ch">
                                <div class="inner-term-ch text-center">
                                    <a href="<?php echo get_term_link($term_ch->term_id, $term_ch->taxonomy);?>">
                                        <div class="thumbnail-term-ch mb-3">
                                            <img src="<?php echo $img_term_ch['url']; ?>" alt="<?php echo $term_ch->name; ?>">
                                        </div>
                                        <h3 class="color-main fw700"><?php echo $term_ch->name; ?></h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php
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
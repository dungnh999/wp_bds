<?php 


get_header();

$count = $GLOBALS['wp_query']->found_posts;
$description_ch = get_field('description_ch', 'options');
$currentterrm = get_queried_object();

$args = array(
    'post_type' => 'can-ho', // Đảm bảo tên post type đúng
    'tax_query' => array(
        array(
            'taxonomy' => 'du-an',
            'field'    => 'term_id',
            'terms'    => $currentterrm->term_id,
        ),
    ),
);
$projects = new WP_Query($args);
?>

<div id="main-can-ho">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block-heading text-center">
                    <p class="f18 color-1 fw700 uppercase mb-2"><?php echo $currentterrm->lable;?></p>
                    <h2 class="f50 color-main fw800 uppercase"><?php echo $currentterrm->name; ?></h2>
                    <!-- <p class="total-ch">Có tất cả <b><?php echo $count; ?> phòng</b> còn trống</p> -->
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php get_template_part('template-parts/search/search-can-ho');?>
            </div>
        </div>
    </div>
    <div class="container list-ch mb-5">
        <div class="row">
            <?php 
            if(have_posts()) {       
                while(have_posts()) {
                    the_post();
                    echo '1233123';
                    get_template_part('template-parts/content-can-ho-4');
                }
            }           
            
        wp_reset_postdata(  ); 
            ?>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="pagination">
                    <?php wp_bootstrap_pagination(); ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="description-ch">
                    <?php echo $description_ch; ?>

                </div>
                <div class="more-des text-center">
                    <a href="javascript:voild(0);" class="cta-more"><?php echo __('Readmore All', 'devkai');?></a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

get_footer();
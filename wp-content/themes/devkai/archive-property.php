<?php 


get_header();

$count = $GLOBALS['wp_query']->found_posts;
$description_ch = get_field('description_ch', 'options');
?>

<div id="main-can-ho">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block-heading text-center">
                    <p class="f18 color-1 fw700 uppercase mb-2">CITY SPACE</p>
                    <h2 class="f50 color-main fw700 uppercase"><?php echo __('BUY AND SELL REAL ESTATE', 'devkai');?></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php get_template_part('template-parts/search/search-property');?>
            </div>
        </div>
    </div>
    <div class="container list-ch mb-5">
        <div class="row">
            <?php 
            if(have_posts()) {
                while(have_posts()) {
                    the_post();
                    
                    get_template_part('template-parts/content-property-style1');
                }
            }
            
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
                    <a href="javascript:voild(0);" class="cta-more"><?php echo __('Readmore All', 'devkai'); ?></a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

get_footer();
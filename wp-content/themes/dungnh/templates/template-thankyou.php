<?php 

/**
 * Template Name: Thank you
 */



get_header();

?>
<style>
    header, footer, .heading-page-banner {
        display: none !important;
    }.container.page-thank {
    padding: 40px;
    border: 2px solid var(--color-main);
    border-radius: 10px;
}
</style>
<div class="container page-thank">
    <div class="row">
        <div class="col-md-12 text-center">
            <?php the_content(); ?>

            <a href="<?php echo home_url(); ?>" class="cta-more uppercase"><?php echo __('Go to home', 'dungnh');?></a>
        </div>
    </div>
</div>

<?php

get_footer();
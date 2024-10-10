<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package devkai
 */

$logo_footer = get_field('logo_footer', 'options');
$title_footer = get_field('title_footer', 'options');
$subtitle_form = get_field('subtitle_form', 'options');
$form_footer = get_field('form_footer', 'options');

?>
    </main>

<footer class="page-footer" role="contentinfo">
    <div class="top-footer">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <?php 
                    if(!empty($logo_footer)) {
                        echo '<img src="'.$logo_footer['url'].'" alt="logo_footer"/>';
                    }
                    ?>
                </div>

                <div class="col-md-9">
                    <div class="form-footer">
                        <div class="heading-form-footer">
                            <p class="f25 mb-0 fw700"><?php echo $title_footer; ?></p>
                            <p class="mb-0"><?php echo $subtitle_form; ?></p>
                        </div>
                        <div class="inner-form-footer">
                            <?php echo do_shortcode($form_footer);?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="middle-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="inner-footer-widget">
                        <?php if ( is_active_sidebar( 'footer_1' ) ) : ?>
                        <?php dynamic_sidebar( 'footer_1' ); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="inner-footer-widget">
                        <?php if ( is_active_sidebar( 'footer_2' ) ) : ?>
                        <?php dynamic_sidebar( 'footer_2' ); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="inner-footer-widget">
                        <?php if ( is_active_sidebar( 'footer_3' ) ) : ?>
                        <?php dynamic_sidebar( 'footer_3' ); ?>
                        <?php endif; ?>
                    </div>
                    </div>
                <div class="col-md-3">
                    <div class="inner-footer-widget">
                        <?php if ( is_active_sidebar( 'footer_4' ) ) : ?>
                        <?php dynamic_sidebar( 'footer_4' ); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
    $copyright = get_field('copyright', 'options');
    $quick_links_footer = get_field('quick_links_footer', 'options');
    ?>
    <div class="bottom-footer">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 color-white" ><?php echo $copyright; ?></div>

                <div class="col-md-6">
                    <?php 
                    if(!empty($quick_links_footer)) {
                        echo ' <ul class="d-flex mb-0">';
                        foreach ($quick_links_footer as $key => $linkfooter) {
                            echo '<li><a href="'.$linkfooter['link'].'" class="color-white">'.$linkfooter['title'].'</a></li>';
                        }
                        echo '</ul>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

<?php
$list_icon = get_field('list_icon', 'options');
?>

<div class="vka-wrapper">
   <input id="vkaCheckbox" type="checkbox" class="vka-checkbox">
   <label class="vka" for="vkaCheckbox">
      <i class="icon-cps-vka-menu"></i>
   </label>
   <div class="vka-wheel">
    <?php 
    if(!empty($list_icon)) {
        foreach ($list_icon as $key => $icon) {
            ?>
            <a class="vka-action vka-action-<?php echo $key + 1; ?>" href="<?php echo $icon['link_icon'];?>" rel="nofollow" title="Gọi trực tiếp">
                <div class="vka-button vka-button-<?php echo $key + 1; ?>"><img src="<?php echo $icon['icon']['url'];?>" alt="icon"></div>
            </a>
            <?php
        }
    }
    ?>
   </div>
</div>

<div class="overlay-search"></div>

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw==" crossorigin="anonymous" referrerpolicy="no-referrer" />




</body>

</html>
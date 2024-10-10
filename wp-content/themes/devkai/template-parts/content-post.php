<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package devkai
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(' col-md-4 '); ?>>
    <div class="inner-post">
        <div class="thumbnail-post">
            <?php echo get_the_post_thumbnail(get_the_ID(), 'full'); ?>
        </div>
        <div class="inner-post-content">
            <h3 ><a href="<?php echo get_permalink(); ?>" class="f16 fw500"><?php echo get_the_title(); ?></a></h3>
            <p><?php echo wp_trim_words( get_the_excerpt(  ), '20', '...' );?></p>
            <div class="post-date"><?php echo get_the_date(); ?></div>
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->

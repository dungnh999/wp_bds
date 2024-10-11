<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package dungnh
 */

get_header();

global $post;

$categories = get_the_category();
$separator = ' ';
$output = '';


$author_id = get_post_field ('post_author', get_the_ID());
$display_name = get_the_author_meta( 'display_name' , $author_id ); 
// $block_left_right = get_field('block_left_right', $post);
// $check_layout = get_field('check_layout', $post);


?>
<main role="main">
    <?php 
        $group_box = get_field('group_box',$post);
        $title_check = get_field('title_check', $post);
        $group_check = get_field('group_check', $post);
        $bottom_content_sg = get_field('bottom_content_sg', $post);
        ?>
        <div style="" class="section ">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="image-text-module text-left  image-right">
                            <h3><?php the_title(); ?></h3>
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="" class="section ">
            <div class="container">
                <div class="row">
                    <?php 
                    if($group_box) {
                        foreach($group_box as $key => $box) {
                            ?>
                            <div class="col-md-4">
                                <div class="image-text-module text-left  image-right">
                                    <?php 
                                    if( $box['image_box']) {
                                        ?>
                                        <img src="<?php echo $box['image_box']['url']; ?>"
                                        alt="" title="" width="370" height="370" style=" max-width:370px; max-height:370px; ">
                                        <?php 
                                    }
                                    if($box['title_box']) { echo '<h4>'.$box['title_box'].'</h4>'; }
                                    if($box['content_box']) { echo '<div>'.$box['content_box'].'</div>'; }
                                    ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
        <div style="" class="section ">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="image-text-module text-left  image-right">
                            <?php if($title_check) { echo '<h4>'.$title_check.'</h4>'; }?>
                            <?php 
                            if($group_check) {
                                echo '<ul class="check" style="display: inline-block;">';
                                foreach ($group_check as $check) {
                                    echo '<li>'.$check['text_check'].'</li>';
                                }
                                echo '</ul>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a id="interested_in_solutions" name="interested_in_solutions"></a>
        <?php 
        
        if($bottom_content_sg) {
            ?>
            <div style="" class="section gray-light">
                <div class="container">
                    <div class="row">
                        <div class="section-headline col-md-12">
                            <h2><?php echo $bottom_content_sg['title_bottom']; ?></h2>
                            <p><?php echo $bottom_content_sg['content_bottom']; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="image-text-module text-center  image-right">
                                <?php 
                                if($bottom_content_sg['link_bottom']) {
                                    echo '<p><a href="'.$bottom_content_sg['link_bottom']['url'].'" class="email btn btn-default">'.$bottom_content_sg['link_bottom']['title'].'</a></p>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
</main>

<?php

get_footer();
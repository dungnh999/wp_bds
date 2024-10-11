<?php


global $post;


get_header();

$paged = (isset($_GET['page'])) ? $_GET['page'] : 1;
$args_post = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 6,
    'orderby' => 'date',
    'suppress_filters' => false,
    'update_post_meta_cache' => false,
    'update_post_term_cache' => false,
    'ignore_sticky_posts' => true,
    'no_found_rows' => true,
);
$lang_posts = new WP_Query($args_post);
$related_post = get_field('related_post', $post);
?>
<main id="content-post" role="main">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="inner-post-content">
                    <div class="heading-single-post">
                        <h1 class="f30 fw700"><?php echo get_the_title(); ?></h1>
                    </div>
                    <div class="meta-single d-flex align-items-center">
                        <div class="date">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M16.25 3.125H3.75C3.40482 3.125 3.125 3.40482 3.125 3.75V16.25C3.125 16.5952 3.40482 16.875 3.75 16.875H16.25C16.5952 16.875 16.875 16.5952 16.875 16.25V3.75C16.875 3.40482 16.5952 3.125 16.25 3.125Z" stroke="#666666" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M13.75 1.875V4.375" stroke="#666666" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M6.25 1.875V4.375" stroke="#666666" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M3.125 6.875H16.875" stroke="#666666" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg><?php echo get_the_date();?>
                        </div>
                        <div class="share">
                            Chia sẻ

                            <?php echo socialshare(); ?>
                        </div>
                    </div>
                    <div class="content-single-post">
                        <?php the_content(); ?>
                    </div>

                    <div class="meta-single d-flex align-items-center justify-content-end">
                        <div class="share">
                            <?php echo __('Share', 'dungnh');?><?php echo socialshare(); ?>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-3 sidebar-post">
                <div class="inner-sidebar">
                    <?php 
                    $terms = get_terms( array(
                        'taxonomy' => 'category',
                        'hide_empty' => false,
                    ) );

                    ?>
                    <aside class="category mb-5">
                        <h3 class="f18 fw700 uppercase"><?php echo __('Category', 'dungnh');?></h3>
                        <div class="aside-content">
                            <ul class="nav-cat-sidebar ml-0 pl-0">
                            <?php 
                                if(!empty($terms)) {
                                    foreach ($terms as $key => $term) {
                                        echo '<li><a href="'.get_term_link( $term->term_id, $term->taxonomy ).'">'.$term->name.' <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                                        <path d="M5.625 2.8125L10.3125 7.5L5.625 12.1875" stroke="#666666" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg></a></li>';
                                    }
                                }

                            ?>
                            </ul>
                        </div>
                    </aside>


                    <aside>
                        <h3 class="f18 fw700 uppercase"><?php echo __('Related Post', 'dungnh');?></h3>
                        <div class="aside-content-related">
                            <ul class="nav-cat-sidebar ml-0 pl-0">
                            <?php 
                                if($lang_posts->have_posts()) {
                                    while($lang_posts->have_posts()) {
                                    $lang_posts->the_post();
                                        ?>
                                        <li>
                                            <a href="<?php echo get_permalink();?>">
                                                <p><?php echo get_the_title(); ?></p>
                                                <div class="related-date d-flex align-items-center justify-content-between">
                                                    <?php echo get_the_date();?>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="47" height="45" viewBox="0 0 47 45" fill="none">
                                                    <path d="M7.5293 22.5H39.605" stroke="#C3912C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M26.4844 9.84375L39.6062 22.5L26.4844 35.1562" stroke="#C3912C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </div>
                                            </a>    
                                        </li>       
                                        <?php
                                    }
                                }
                                wp_reset_query(  ); 

                            ?>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</main>

<?php

get_footer();
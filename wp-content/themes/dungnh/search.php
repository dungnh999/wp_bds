<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package dungnh
 */

get_header();
?>

<section id="wrapper">

    <div class="container">
        <div class="row">
            <div id="content-wrapper" class="left-column col-xs-12 col-sm-12 col-md-12 col-lg-9">
                <section id="main">
                    <h2 id="js-product-list-header" class="h2"><?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'dungnh' ), '<span>' . get_search_query() . '</span>' );
					?></h2>
                </section>
            </div>
        </div>
    </div>

    <div class="container blog-list">
        <div class="row">
            <?php 
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						* Include the Post-Type-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Type name) and that will be used instead.
						*/
						get_template_part( 'template-parts/content-post');

					endwhile;

					
					?>
            <div class="col-md-12">
                <?php wp_bootstrap_pagination(); ?>
            </div>
        </div>
    </div>


</section>

<?php
get_footer();
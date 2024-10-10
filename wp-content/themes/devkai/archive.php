<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package devkai
 */

get_header();
$currentTerm = get_queried_object();
?>

<main id="primary" class="site-main">

    <?php
		if ( have_posts() ) :

			// if ( is_home() && ! is_front_page() ) :
				$terms = get_terms( array(
					'taxonomy' => 'category',
					'hide_empty' => false,
				) );

				?>
				<div class="container heading-blog mb-4">
					<div class="row">
						<div class="col-md-12 d-flex align-items-end justify-content-between">
							<div class="block-heading">
								<p class="f18 color-1 fw700 uppercase">Cập nhật bản tin</p>
								<h2 class="f50 color-main fw800"><?php echo $currentTerm->name; ?></h2>
							</div>

							<div class="heading-cat-post">
								<ul>
									<li><a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">Tất cả</a></li>
									<?php 
									if(!empty($terms)) {
										foreach($terms as $term) {
											if($currentTerm->term_id == $term->term_id) {
												echo '<li class="active"><a href="'.get_term_link( $term->term_id, $term->taxonomy ).'">'.$term->name.'</a></li>';
											}else{
												echo '<li><a href="'.get_term_link( $term->term_id, $term->taxonomy ).'">'.$term->name.'</a></li>';
											}
											
										}
									}
									?>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<div class="container mb-5">
					<div class="row">
						<div class="col-md-12">
							<div class="top-post-hightline">
								<div class="blog-hightline" style="">
									<?php 
									$key = 0;
									while ( have_posts() ) :
										the_post();

										if($key <= 2 ) {
										?>
											<div class="single-blog">
												<div class="blog-img img-full">
													<a
														href="<?php echo get_permalink(); ?>">
														<img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>"
															alt=""></a>
												</div>
												<div class="blog-content">

												
													<div class="blog-meta">
														<p class="author-name color-white"><?php echo get_the_date(); ?></p>
														<h3 class="blog-title"><a
															href="<?php echo get_permalink(); ?>" class="f20 fw700 color-white"><?php echo get_the_title(); ?></a></h3>
														<a class="read-btn"
															href="<?php echo get_permalink(); ?>"><span
																class="qodef-m-text"><svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 45 45" fill="none">
															<path d="M7.03125 22.5H37.9688" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
															<path d="M25.3125 9.84375L37.9688 22.5L25.3125 35.1562" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
															</svg></span></a>
													</div>

												</div>
											</div>
										<?php
										}

										$key++;

									endwhile;
									
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
			// endif;

			?>
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
			<?php


		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

</main><!-- #main -->

<?php
get_footer();
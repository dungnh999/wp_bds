<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

// $columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
// $post_thumbnail_id = $product->get_image_id();
// $wrapper_classes   = apply_filters(
// 	'woocommerce_single_product_image_gallery_classes',
// 	array(
// 		'woocommerce-product-gallery',
// 		'woocommerce-product-gallery--' . ( $post_thumbnail_id ? 'with-images' : 'without-images' ),
// 		'woocommerce-product-gallery--columns-' . absint( $columns ),
// 		'images',
// 	)
// );


$images = array();
$post_thumbnail_id = array($product->get_image_id());
$attachment_ids = $product->get_gallery_image_ids();
if($attachment_ids) {
    $images = array_merge($post_thumbnail_id, $attachment_ids);
}else{
    $images = array_merge($post_thumbnail_id);
}

$image_cover = wp_get_attachment_image_src( $images[0], 'full', '' )[0];

?>

<section class="page-content" id="content">

    <div class="images-container">

        <div class="product-cover">
            <div id="product-zoom" style="position: relative; overflow: hidden;">
                <img class="js-qv-product-cover"
                    src="<?php echo $image_cover; ?>"
                    alt="" title="" itemprop="image">
            </div>
        </div>



        <div class="col-md-12">
            <div class="js-qv-mask mask">
                <ul class="qv-carousel product-images owl-carousel">
				<?php 
					if($images) {
						foreach ($images as $key => $img) {
							$image = wp_get_attachment_image_src( $img, 'full', '' )[0];
							?>
								<li class="thumb-container item">
                                    <img class="thumb js-thumb  selected "
                                        data-image-medium-src="<?php echo $image; ?>"
                                        data-image-large-src="<?php echo $image; ?>"
                                        src="<?php echo $image; ?>"
                                        alt="" title="" width="100" itemprop="image">
                                </li>
							<?php
						}
					}
				?>

                </ul>
            </div>
        </div>

    </div>


    <div class="scroll-box-arrows">
        <i class="material-icons left"></i>
        <i class="material-icons right"></i>
    </div>


</section>
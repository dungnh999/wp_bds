<?php
/**
 * The template for displaying product category thumbnails within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product-cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
$post_id = $product->get_id();
$post_thumbnail_id = $product->get_image_id();
$attachment_ids = $product->get_gallery_image_ids();
// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
    <article class="product-miniature js-product-miniature col-xs-6 col-sm-6 col-md-4 col-lg-6 col-xl-4" data-id-product="1" data-id-product-attribute="1"
        itemprop="item" itemscope="" itemtype="http://schema.org/Product">
        <div class="product-container">
            <div class="thumbnail-container">
                <div class="thumbnail-inner">

                    <a href="<?php echo get_permalink( $post_id );?>" class="thumbnail product-thumbnail">
                        <img src="<?php echo wp_get_attachment_image_src( $post_thumbnail_id, 'full' )[0];?>"
                            alt="<?php echo get_the_title($post_id); ?>"
                            data-full-size-image-url="https://demo.ishithemes.com/prestashop/bakers/206-large_default/hummingbird-printed-t-shirt.jpg">
                        <?php 
                            if($attachment_ids) {
                                ?>
                        <img class="product-img-extra change" alt="product-img"
                            src="<?php echo wp_get_attachment_image_src( $attachment_ids[0], 'full')[0];?>">
                        <?php
                            }
                            
                            ?>


                    </a>

                </div>

                <div class="product-description">

                    <h3 class="h3 product-title" itemprop="name"><a href="<?php echo get_permalink($post_id); ?>"
                            itemprop="url"
                            content="<?php echo get_permalink($post_id); ?>"><?php echo get_the_title($post_id); ?></a>
                    </h3>

                    <div class="product-price-and-shipping">

                        <p
                            class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>">
                            <?php echo $product->get_price_html(); ?></p>

                    </div>

                </div>
            </div>
        </div>
    </article>
</div>
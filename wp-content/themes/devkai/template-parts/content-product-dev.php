<?php 

$product = wc_get_product($post_id);
$post_thumbnail_id = $product->get_image_id();
$attachment_ids = $product->get_gallery_image_ids();

?>
<div class="item" data-id-product="1" data-id-product-attribute="1" itemscope="" itemtype="http://schema.org/Product">
    <div itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
        <article class="product-miniature js-product-miniature" data-id-product="1" data-id-product-attribute="1"
            itemprop="item" itemscope="" itemtype="http://schema.org/Product">
            <div class="product-container">
                <div class="thumbnail-container">
                    <div class="thumbnail-inner">

                        <a href="<?php echo get_permalink( $post_id );?>"
                            class="thumbnail product-thumbnail">
                            <img src="<?php echo wp_get_attachment_image_src( $post_thumbnail_id, 'full' )[0];?>" alt="<?php echo get_the_title($post_id); ?>"
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

                        <h3 class="h3 product-title" itemprop="name"><a
                                href="<?php echo get_permalink($post_id); ?>" itemprop="url"
                                content="<?php echo get_permalink($post_id); ?>"><?php echo get_the_title($post_id); ?></a></h3>

                        <div class="product-price-and-shipping">


                            <span class="regular-price" aria-label="Regular price">$23.90</span>
                            <span class="discount-percentage discount-product">-20%</span>



                            <span class="price" aria-label="Price">$19.12</span>
                            <div itemprop="offers" itemscope="" itemtype="http://schema.org/Offer" class="invisible">
                                <meta itemprop="priceCurrency" content="USD">
                                <meta itemprop="price" content="19.12">
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </article>
    </div>
</div>
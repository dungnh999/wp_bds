<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package devkai
 */

get_header();

global $post;

$area_ch = get_field('area_ch', $post);
$bedroom_ch = get_field('bedroom_ch', $post);
$bathroom_ch = get_field('bathroom_ch', $post);
$price_regular = get_field('price_regular', $post);
$price_sale = get_field('price_sale', $post);
$address_ch = get_field('address_ch', $post);
$address_ch_iframe = get_field('address_ch_iframe', $post);
$full_address = get_field('full_address', $post);
$day_night = get_field('day_night_ch', $post);

$day_night_label = $day_night['label'];

$gallery_ch = get_field('gallery_ch', $post);
$link_3d_ch = get_field('link_3d_ch', $post);
$view_360 = get_field('view_360', $post);
$featured_tienich = get_field('featured_tienich', $post);
$content_ch_single = get_field('content_ch_single', $post);
$list_ch_tienich = get_field('list_ch_tienich', $post);
$check_cer = get_field('check_cer', $post);

$loaiphong = get_the_terms( get_the_ID(), 'danh-muc-loai-phong' );

$term_links = array();
        
foreach ( $loaiphong as $term ) {
    $term_links[] =  __( $term->name );
}
                    
$all_terms = join( ', ', $term_links );

//Get array of terms
$terms = get_the_terms( $post->ID , 'danh-muc-can-ho', 'string');
//Pluck out the IDs to get an array of IDS
$term_ids = wp_list_pluck($terms,'term_id');

$args_post = array(
    'post_type' => 'can-ho',
    'post__not_in' => array(get_the_ID()),
    'post_status' => 'publish',
    'posts_per_page' => 4,
    'orderby' => 'date',
    'suppress_filters' => false,
    'update_post_meta_cache' => false,
    'update_post_term_cache' => false,
    'ignore_sticky_posts' => true,
    'no_found_rows' => true,
    'tax_query' => array(
        array(
            'taxonomy' => 'danh-muc-can-ho',
            'field' => 'id',
            'terms' => $term_ids,
            'operator'=> 'IN' //Or 'AND' or 'NOT IN'
        )
    ),
);

$lang_posts = new WP_Query($args_post);
$related_post = get_field('related_post', $post);

$hotline = get_field('hotline', 'options');

$list_ch_price = get_field('list_ch_price', $post);
$list_ch_khuvuc = get_field('list_ch_price', $post);


$related_ch_terms = get_field('related_ch_terms', $post);
$related_ch_price = get_field('related_ch_price', $post);
$related_ch_location = get_field('related_ch_location', $post);

$ward_field_value = get_post_meta( get_the_ID(), 'ward_field', true );

?>


<main role="main" id="main-sg-canho">

    <div class="container">
        <div class="row mb-4">
            <div class="col-md-7">
                <div class="inner-gallery-ch">
                    <!-- Swiper -->
                    <div class="gallery-top">
                        <div class="nav-gallery-button">
                            <div class="tab-gallery"><a href="javascript:;"><?php echo __('Media', 'devkai');?></a></div>
                            <div class="tab-3d"><a href="<?php echo $link_3d_ch; ?>" data-fancybox>Video</a></div>
                            <div class="tab-360"><a 
                            class="iframe-lightbox-link"
                            href="<?php echo $view_360; ?>"
                            data-padding-bottom="56.25%">360 View</a></div>
                        </div>
                        <div class="swiper swiper-container ">
                            <div class="swiper-wrapper">
                                <?php 
                                if(!empty($gallery_ch)) {
                                    foreach($gallery_ch as $key => $imgch) {
                                        $link_youtube = get_field('link_youtube', $imgch['ID']);
                                        if(!empty($link_youtube)) {
                                            ?>
                                            <div class="swiper-slide swiper-video">
                                                <a href="<?php echo $link_youtube; ?>" data-fancybox="images1">
                                                    <img src="<?php echo $imgch['url'] ?>" alt="img">
                                                    <div class="icon-play-video">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="59" height="59" viewBox="0 0 59 59" fill="none">
                                                        <rect x="14" y="19" width="29" height="21" fill="white"/>
                                                        <path d="M46.7465 8.625H12.2535C5.48609 8.625 0 14.1111 0 20.8785V38.1213C0 44.8888 5.48609 50.3749 12.2535 50.3749H46.7465C53.5139 50.3749 59 44.8888 59 38.1213V20.8785C59 14.1111 53.5139 8.625 46.7465 8.625ZM38.4595 30.3389L22.326 38.0336C21.8961 38.2386 21.3995 37.9252 21.3995 37.4489V21.5786C21.3995 21.0956 21.9092 20.7826 22.34 21.0009L38.4734 29.1765C38.9531 29.4196 38.9448 30.1075 38.4595 30.3389Z" fill="#F61C0D"/>
                                                        </svg>
                                                    </div>
                                                </a>
                                            </div>
                                            <?php
                                        }else{
                                            ?>
                                            <div class="swiper-slide">
                                                <a href="<?php echo $imgch['url'] ?>" data-fancybox="images1"><img src="<?php echo $imgch['url'] ?>" alt="img"></a>
                                            </div>
                                            <?php
                                        }

                                    }
                                }
                                
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="gallery-thumbs">
                        <div class="swiper swiper-container ">
                            <div class="swiper-wrapper">
                                <?php 
                                if(!empty($gallery_ch)) {
                                    foreach($gallery_ch as $key => $imgch) {
                                        $link_youtube = get_field('link_youtube', $imgch['ID']);
                                        if(!empty($link_youtube)) {
                                            ?>
                                            <div class="swiper-slide swiper-video">
                                                <a href="<?php echo $link_youtube; ?>" data-fancybox>
                                                    <img src="<?php echo $imgch['url'] ?>" alt="img">
                                                    <div class="icon-play-video">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="59" height="59" viewBox="0 0 59 59" fill="none">
                                                        <rect x="14" y="19" width="29" height="21" fill="white"/>
                                                        <path d="M46.7465 8.625H12.2535C5.48609 8.625 0 14.1111 0 20.8785V38.1213C0 44.8888 5.48609 50.3749 12.2535 50.3749H46.7465C53.5139 50.3749 59 44.8888 59 38.1213V20.8785C59 14.1111 53.5139 8.625 46.7465 8.625ZM38.4595 30.3389L22.326 38.0336C21.8961 38.2386 21.3995 37.9252 21.3995 37.4489V21.5786C21.3995 21.0956 21.9092 20.7826 22.34 21.0009L38.4734 29.1765C38.9531 29.4196 38.9448 30.1075 38.4595 30.3389Z" fill="#F61C0D"/>
                                                        </svg>
                                                    </div>
                                                </a>
                                            </div>
                                            <?php
                                        }else{
                                            ?>
                                            <div class="swiper-slide">
                                                <img src="<?php echo $imgch['url'] ?>" alt="img">
                                            </div>
                                            <?php
                                        }
                                    }
                                }
                                
                                ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-5">
                <div class="inner-info-ch">
                    <?php 
                    if(!empty($check_cer)) {
                        ?>
                        <div class="cn mb-3">
                        <span class="label-cer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
                        <path d="M6.125 8.50013L7.70833 10.0835L10.875 6.9168M15.3225 3.73772C15.1605 3.74594 14.9974 3.7501 14.8333 3.7501C12.4002 3.7501 10.1807 2.83538 8.49995 1.33105C6.81922 2.83532 4.59976 3.75 2.16667 3.75C2.00261 3.75 1.83953 3.74584 1.67752 3.73763C1.48006 4.50049 1.375 5.30054 1.375 6.12513C1.375 10.5517 4.40259 14.2712 8.5 15.3258C12.5974 14.2712 15.625 10.5517 15.625 6.12513C15.625 5.30057 15.52 4.50055 15.3225 3.73772Z" stroke="#B37F2C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg><?php echo get_field('name_cer_2', 'options');?></span>
                        </div>
                        <?php
                    }
                    ?>
                    <h1 class="f30 mb-3"><?php echo get_the_title(); ?></h1>
                    <?php 
                    if(!empty($full_address)) {
                        ?>
                    <div class="address_ch d-flex fw700 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C8.13 2 5 5.13 5 9C5 13.17 9.42 18.92 11.24 21.11C11.64 21.59 12.37 21.59 12.77 21.11C14.58 18.92 19 13.17 19 9C19 5.13 15.87 2 12 2ZM12 11.5C10.62 11.5 9.5 10.38 9.5 9C9.5 7.62 10.62 6.5 12 6.5C13.38 6.5 14.5 7.62 14.5 9C14.5 10.38 13.38 11.5 12 11.5Z" fill="#C3912C"/>
                        </svg>
                        <?php echo $full_address; ?>
                    </div>
                        <?php
                    }
                    ?>

                    <div class="price-ch mb-3">
                        <?php 
                        if(!empty($price_sale)) {
                            echo '<div class="inner-price-ch inner-price-has-sale d-flex">';
                            echo '<div class="sale-price"><p class="color-main fw700">'.number_format($price_sale , 0,",",".").' đ</p>';
                            if(!empty($day_night_label)) {
                                echo '<span class="prefix">/ '.$day_night_label.'</span>';
                            }
                            echo '</div>';
                            if(!empty($price_regular)) {
                                echo '<div class="regular-price"><p class="color-1">'.number_format($price_regular , 0,",",".").' đ</p></div>';
                            }
                            echo '</div>';
                        }else{
                            echo '<div class="inner-price-ch d-flex">';
                            if(!empty($price_regular)) {
                                echo '<div class="regular-price"><p class="color-main fw700">'.number_format($price_regular , 0,",",".").' đ</p>';
                                if(!empty($day_night_label)) {
                                    echo '<span class="prefix">/ '.$day_night_label.'</span>';
                                }
                                echo '</div>';
                            }
                            echo '</div>';
                        }

                        ?>
                    </div>

                    <div class="list-tienich mb-3">
                        <ul>
                            <?php 
                            if(!empty($area_ch)) {
                                echo '<li><span class="fw700">Diện tích</span><span>'.$area_ch.'m<sup>2</sup></span></li>';
                            }
                            if(!empty($bathroom_ch)) {
                                echo '<li><span class="fw700">Toilet</span><span>'.$bathroom_ch.'</span></li>';
                            }
                            if(!empty($bedroom_ch)) {
                                echo '<li><span class="fw700">Giường</span><span>'.$bedroom_ch.'</span></li>';
                            }
                            if(!empty($all_terms)) {
                                echo '<li><span class="fw700">Loại phòng</span><span>'.$all_terms.'</span></li>'; 
                            }

                            if(!empty($featured_tienich)) {
                                foreach($featured_tienich as $itemT) {
                                    if(!empty($itemT['status_ch_tienich'])) {
                                        echo '<li><span class="fw700">'.$itemT['name_tienich'].'</span><span>'.$itemT['status_ch_tienich'].'</span></li>';
                                    }
                                }
                            }
                            ?>
                        </ul>
                    </div>
                    <?php 
                    $title_contact_ch = get_field( 'title_contact_ch', 'options');
                    $content_contact_ch = get_field( 'content_contact_ch', 'options');
                    ?>
                    <div class="cta-contact-ch mb-4">
                        <a href="#" class="cta-contact uppercase" data-title="<?php echo get_the_title(); ?>"><?php echo (!empty($title_contact_ch)) ? $title_contact_ch : '';?></a>
                    </div>

                    <div class="contact-ch mb-4">
                        <div class="inner-contact-ch d-flex align-items-center">
                            <div class="text-contact-ch">
                                <p class="f20 mb-0"><?php echo (!empty($title_contact_ch)) ? $title_contact_ch : '';?></p>
                                <span class="fw700"><?php echo (!empty($content_contact_ch)) ? $content_contact_ch : '';?></span>
                            </div>
                            <div class="phone-contact-ch">
                                <a href="tel:<?php echo $hotline; ?>" class="color-main f18"><svg xmlns="http://www.w3.org/2000/svg" width="27" height="23" viewBox="0 0 27 23" fill="none">
                                <path d="M7.7432 0C5.67589 0 4 1.67589 4 3.7432V6.73776C4 15.4205 11.0387 22.4592 19.7214 22.4592H22.716C24.7833 22.4592 26.4592 20.7833 26.4592 18.716V16.6468C26.4592 15.7961 25.9786 15.0184 25.2177 14.638L21.6004 12.8293C20.3779 12.2181 18.8975 12.8313 18.4653 14.1279L18.0194 15.4654C17.85 15.9736 17.3287 16.2762 16.8035 16.1711C13.5156 15.5135 10.9457 12.9436 10.2881 9.65574C10.183 9.13046 10.4856 8.60915 10.9938 8.43975L12.6537 7.88644C13.767 7.51532 14.407 6.34959 14.1223 5.21106L13.2449 1.7012C12.9949 0.701395 12.0966 0 11.066 0H7.7432Z" fill="#C3912C"></path>
                                </svg><?php echo $hotline; ?></a>
                            </div>
                        </div>
                    </div>


                    <div class="tuvan-ch">
                        <p class="text-center f20 mt-3 mb-3"><?php echo (!empty($content_contact_ch)) ? $content_contact_ch : '';?></p>
                        <?php 
                        $list_tuvan = get_field('list_tuvan', 'options');
                        if(!empty($list_tuvan)) {
                            echo '<ul class="list-tuvan-ch d-flex m-0 p-0">';
                            foreach($list_tuvan as $key => $itemtuvan) {
                                echo '<li><a href="'.$itemtuvan['link'].'"><img src="'.$itemtuvan['icon']['url'].'" alt="icon" /></a></li>';
                            }
                            echo '</ul>';
                        }
                        
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-50">
            <div class="col-md-7">
                <ul class="nav-ch">
                    <li><a href="#tab1"><?php echo __('Description', 'devkai');?></a></li>
                    <li><a href="#tab2"><?php echo __('Utilities', 'devkai');?></a></li>
                    <li><a href="#tab3"><?php echo __('Map', 'devkai');?></a></li>
                </ul>

                <div class="group-content-ch">
                    <div id="tab1" class="tab-gioi-thieu sec-tab">
                        <h3><?php echo __('Description', 'devkai');?></h3>
                        <div class="inner-content-tab-gioi-thieu">
                            <?php 
                            if(!empty($content_ch_single)) {
                                echo $content_ch_single;
                            }else{
                                echo '<p>Không có nội dung. </p>';
                            }
                            
                            ?>
                        </div>

                        <a href="javascript:voild(0);" class="color-main cta-more-gt">Xem thêm <svg xmlns="http://www.w3.org/2000/svg" fill="none" height="22" viewBox="0 0 21 22" width="21"><path d="m17.0625 8.375-6.5625 6.5625-6.5625-6.5625" stroke="#c3912c" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
                    </div>


                    <div id="tab2" class="tab-tien-ich sec-tab" >
                        <h3><?php echo __('Utilities', 'devkai');?></h3>
                        <div class="inner-content-tab-tienich">
                            <?php 
                            if(!empty($list_ch_tienich)) {
                                foreach($list_ch_tienich as $tienichItem) {
                                    ?>
                                    <div class="tab-item-tienich">
                                        <p class="f16"><?php echo $tienichItem['title_item_tienich']; ?></p>
                                        <ul>
                                            <?php 
                                            foreach($tienichItem['list_item_tienich'] as $key => $item_tienich) {
                                                echo '<li class="fw700">'.$item_tienich['name_tienich'].'</li>';
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <?php
                                }
                            }else{
                                echo '<p>Không có nội dung. </p>';
                            }
                            
                            ?>
                        </div>
                    </div>


                    <?php 
                    $prop_location = $address_ch['lat'].','.$address_ch['lng'];
                    ?>
                    <div id="tab3" class="tab-ban-do sec-tab" >
                        <h3><?php echo __('Map', 'devkai');?></h3>
                        <div class="inner-content-tab-ban-do">
                            <?php echo $address_ch_iframe; ?>
                            <div class="location-full">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="24" viewBox="0 0 16 24" fill="none">
                                <rect y="0.5" width="16" height="23" fill="url(#pattern0)"/>
                                <defs>
                                <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                <use xlink:href="#image0_313_14821" transform="translate(-0.0281837) scale(0.00300104 0.00208768)"/>
                                </pattern>
                                <image id="image0_313_14821" width="352" height="479" xlink:href="data:image/png;base64,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"/>
                                </defs>
                                </svg><?php echo $address_ch['address'];?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="inner-sidebar-ch pt-50">
                    <p class="f30 fw700"><?php echo __('Related Rent', 'devkai');?></p>
                    <div class="related-ch-sidebar">
                        <?php 
                            if($related_ch_terms == NULL) {
                                if($lang_posts->have_posts()) {
                                    while($lang_posts->have_posts()) {
                                        $lang_posts->the_post();
                                        get_template_part( 'template-parts/content-can-ho-vertical' );
                                    }
                                }
                                wp_reset_query(  ); 
                            }else{
                                foreach($related_ch_terms as $chItem) {
                                    $post = $chItem;
                                    setup_postdata($post);
                                    get_template_part( 'template-parts/content-can-ho-vertical' );
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
                <h3 class="f30 fw700"><?php echo __('Rent with the same price range', 'devkai');?></h3>
            </div>
        </div>
        <div class="row mb-50 related-ch-bottom">
            <?php 
                if($related_ch_price == NULL) {
                    $args_price = array(
                        'post_type' => 'can-ho',
                        'post__not_in' => array(get_the_ID()),
                        'post_status' => 'publish',
                        'posts_per_page' => 4,
                        'orderby' => 'date',
                        'suppress_filters' => false,
                        'update_post_meta_cache' => false,
                        'update_post_term_cache' => false,
                        'ignore_sticky_posts' => true,
                        'no_found_rows' => true,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'danh-muc-can-ho',
                                'field' => 'id',
                                'terms' => $term_ids,
                                'operator'=> 'IN' //Or 'AND' or 'NOT IN'
                            )
                        ),
                        'meta_query' => array(
                            array(
                                'key' => 'price_regular',
                                'value' => $price_regular,
                                'compare' => '<=',
                            )
                        )
                    );

                    $lang_posts_price = new WP_Query($args_price);

                    if($lang_posts_price->have_posts()) {
                        while($lang_posts_price->have_posts()) {
                            $lang_posts_price->the_post();
                            get_template_part( 'template-parts/content-can-ho-4' );
                        }
                    }
                    wp_reset_query(  ); 
                }else{
                    foreach($related_ch_price as $chItem) {
                        $post = $chItem;
                        setup_postdata($post);
                        get_template_part( 'template-parts/content-can-ho-4' );
                    }
                }
            ?>
        </div>


        <div class="row mb-3">
            <div class="col-md-12">
                <h3 class="f30 fw700"><?php echo __('Rent in the same area', 'devkai'); ?></h3>
            </div>
        </div>
        <div class="row mb-50 related-ch-bottom">
            <?php               if($related_ch_location == NULL) {
                    $args_location = array(
                        'post_type' => 'can-ho',
                        'post__not_in' => array(get_the_ID()),
                        'post_status' => 'publish',
                        'posts_per_page' => 4,
                        'orderby' => 'date',
                        'suppress_filters' => false,
                        'update_post_meta_cache' => false,
                        'update_post_term_cache' => false,
                        'ignore_sticky_posts' => true,
                        'no_found_rows' => true,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'danh-muc-can-ho',
                                'field' => 'id',
                                'terms' => $term_ids,
                                'operator'=> 'IN' //Or 'AND' or 'NOT IN'
                            )
                        ),
                        'meta_query' => array(
                            array(
                                'key' => 'ward_field',
                                'value' => $ward_field_value,
                                'compare' => '=',
                            )
                        )
                    );

                    $lang_posts_location = new WP_Query($args_location);

                    if($lang_posts_location->have_posts()) {
                        while($lang_posts_location->have_posts()) {
                            $lang_posts_location->the_post();
                            get_template_part( 'template-parts/content-can-ho-4' );
                        }
                    }
                    wp_reset_query(  ); 
                }else{
                    foreach($related_ch_location as $chItem) {
                        $post = $chItem;
                        setup_postdata($post);
                        get_template_part( 'template-parts/content-can-ho-4' );
                    }
                }?>
        </div>

    </div>
</main>


<?php 
$content_after_submit_form = get_field( 'content_after_submit_form', 'options');
$form_booking = get_field('form_booking', $post);
?>

<div class="popup-contact">
    <div class="inner-popup-contact">
        <a href="javascript:;" class="close-popup">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M310.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 210.7 54.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L114.7 256 9.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 301.3 265.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L205.3 256 310.6 150.6z"/></svg>
        </a>
        <div class="form">
            <h3 class="f30 fw700 color-main"><?php echo __('Contact', 'devkai'); ?></h3>
            <p><?php echo __('Free counseling', 'devkai'); ?></</p>
            <?php 
            if($form_booking == 1) {
                if ( ICL_LANGUAGE_CODE == 'en' ) {
                    echo do_shortcode('[contact-form-7 id="1099" title="Form booking cho thuê EN"]');
                    
                }else{
                    echo do_shortcode('[contact-form-7 id="769" title="Form booking cho thuê"]');
                }

            }else{
                if ( ICL_LANGUAGE_CODE == 'en' ) {
                    echo do_shortcode('[contact-form-7 id="1098" title="Form booking EN"]');
                    
                }else{
                    echo do_shortcode('[contact-form-7 id="387" title="Form booking"]');
                }
                
            }
            ?>
        </div>

        <div class="after-submit-form">
            <?php 
            if(!empty($content_after_submit_form)) {
                echo $content_after_submit_form;
            }
            ?>
        </div>
    </div>
</div>





<script>
document.addEventListener( 'wpcf7mailsent', function( event ) {
    var thankyouURL = 'https://cityspace.vn/cam-on/';
    location = thankyouURL;
}, false );
</script>
<script src="https://unpkg.com/iframe-lightbox@latest/js/iframe-lightbox.js"></script>
<link rel="stylesheet" href="https://unpkg.com/iframe-lightbox@latest/css/iframe-lightbox.css">
<script>
    (function(root, document) {
        "use strict";
        [].forEach.call(document.getElementsByClassName("iframe-lightbox-link"), function(el) {
            el.lightbox = new IframeLightbox(el, {
            onCreated: function() {
                /* show your preloader */
            },
            onLoaded: function() {
                /* hide your preloader */
            },
            onError: function() {
                /* hide your preloader */
            },
            onClosed: function() {
                /* hide your preloader */
            },
            scrolling: false,
            /* default: false */
            rate: 500 /* default: 500 */,
            touch: false /* default: false - use with care for responsive images in links on vertical mobile screens */
            });
        });
    })("undefined" !== typeof window ? window : this, document);
</script>
<?php

get_footer();
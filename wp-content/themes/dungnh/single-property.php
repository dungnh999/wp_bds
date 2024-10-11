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

$area_bds = get_field('area_bds', $post);
$bedroom_bds = get_field('bedroom_bds', $post);
$bathroom_bds = get_field('bathroom_bds', $post);
$price_regular_bds = get_field('price_regular_bds', $post);
$price_dv_bds = get_field('price_dv_bds', $post);
$price_type_dv = get_field('price_type_dv', $post);
$address_bds = get_field('address_bds', $post);
$full_address = get_field('full_address', $post);

$gallery_bds = get_field('gallery_bds', $post);
$link_3d_bds = get_field('link_3d_bds', $post);
$view_360_bds = get_field('view_360_bds', $post);
$featured_tienich_bds = get_field('featured_tienich_bds', $post);
$content_bds_single = get_field('content_bds_single', $post);
$list_detail_bds = get_field('list_detail_bds', $post);

$list_bds_tienich = get_field('list_bds_tienich', $post);
$tienich_bando = get_field('tienich_bando', $post);

$loaiphong = get_the_terms( get_the_ID(), 'loai-bds' );
$address_bds_iframe = get_field('address_bds_iframe', $post);
$term_links = array();
        
foreach ( $loaiphong as $term ) {
    $term_links[] =  __( $term->name );
}
                    
$all_terms = join( ', ', $term_links );


$huong = get_the_terms( get_the_ID(), 'huong-nha' );

$huongs = array();
        
foreach ( $huong as $termitem ) {
    $huongs[] =  __( $termitem->name );
}
                    
$all_huong = join( ', ', $huongs );

//Get array of terms
$terms = get_the_terms( $post->ID , 'loai-bds', 'string');
//Pluck out the IDs to get an array of IDS
$term_ids = wp_list_pluck($terms,'term_id');

$args_post = array(
    'post_type' => 'property',
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
            'taxonomy' => 'loai-bds',
            'field' => 'id',
            'terms' => $term_ids,
            'operator'=> 'IN' //Or 'AND' or 'NOT IN'
        )
    ),
);
$lang_posts = new WP_Query($args_post);

$related_bds_terms = get_field('related_bds_terms', $post);
$related_bds_price = get_field('related_bds_price', $post);
$related_bds_location = get_field('related_bds_location', $post);

$ward_field_value = get_post_meta( get_the_ID(), 'ward_field', true );


$link_video = get_field('link_video', $post);
?>
<main role="main" id="main-sg-property">

    <div class="container">
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="inner-gallery-ch">
                    <!-- Swiper -->
                    <div class="gallery-main">
                        <div class="main-images-bds hidden-mb">
                            <?php 
                                if(!empty($gallery_bds)) {
                                    foreach($gallery_bds as $key => $imgbds) {
                                        $link_youtube = get_field('link_youtube', $imgbds['ID']);

                                        if($key < 5) {
                                            ?>
                                            <div class="item-slide">
                                                <a href="<?php echo $imgbds['url'] ?>" data-fancybox="images"><img src="<?php echo $imgbds['url'] ?>" alt="img"></a>
                                            </div>
                                            <?php
    
                                        }else{
                                            ?>
                                            <div class="item-slide" style="display: none;">
                                                <a href="<?php echo $imgbds['url'] ?>" data-fancybox="images"><img src="<?php echo $imgbds['url'] ?>" alt="img"></a>
                                            </div>
                                            <?php
                                        }
                                    }
                                }
                                
                            ?>
                        </div>
                        <div class="main-images-bds-mb hidden-pc">
                            <div class="swiper swiper-container">
                                <div class="swiper-wrapper">
                                    <?php 
                                        if(!empty($gallery_bds)) {
                                            foreach($gallery_bds as $key => $imgbds) {
                                                $link_youtube = get_field('link_youtube', $imgbds['ID']);

                                                if($key < 5) {
                                                    ?>
                                                    <div class="swiper-slide">
                                                        <div class="item-slide">
                                                            <a href="<?php echo $imgbds['url'] ?>" data-fancybox="images2"><img src="<?php echo $imgbds['url'] ?>" alt="img"></a>
                                                        </div>
                                                    </div>
                                             
                                                    <?php
            
                                                }else{
                                                    ?>
                                                    <div class="swiper-slide">
                                                        <div class="item-slide" style="display: none;">
                                                            <a href="<?php echo $imgbds['url'] ?>" data-fancybox="images2"><img src="<?php echo $imgbds['url'] ?>" alt="img"></a>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                        }
                                        
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="nav-gallery-button">
                            <div class="tab-gallery"><a href="javascript:;"><?php echo __('Media' , 'dungnh');?></a></div>
                            <div class="tab-3d"><a href="javascript:;">3D 360 View</a></div>
                            <div class="tab-360"><a href="<?php echo (!empty($link_video)) ? $link_video : 'javascript:;'; ?>" data-fancybox>Video</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-50">
        <div class="col-md-8">
            <ul class="nav-ch">
                <li><a href="#tab1"><?php echo __('Description', 'dungnh');?></a></li>
                <li><a href="#tab1"><?php echo __('Detail', 'dungnh'); ?></a></li>
                <li><a href="#tab2"><?php echo __('Utilities', 'dungnh'); ?></a></li>
                <li><a href="#tab3"><?php echo __('Map', 'dungnh'); ?></a></li>
            </ul>


                <div class="inner-info-ch">
                    <h1 class="f30 mb-3"><?php echo get_the_title(); ?></h1>
                    <div class="address_bds d-flex fw700 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C8.13 2 5 5.13 5 9C5 13.17 9.42 18.92 11.24 21.11C11.64 21.59 12.37 21.59 12.77 21.11C14.58 18.92 19 13.17 19 9C19 5.13 15.87 2 12 2ZM12 11.5C10.62 11.5 9.5 10.38 9.5 9C9.5 7.62 10.62 6.5 12 6.5C13.38 6.5 14.5 7.62 14.5 9C14.5 10.38 13.38 11.5 12 11.5Z" fill="#C3912C"/>
                        </svg>
                        <?php echo $full_address; ?>
                    </div>
                    <div class="price-bds mb-3 d-flex align-items-center">
                        <?php 
                        if(!empty($price_regular_bds)) {
                            echo '<div class="regular-price-bds"><p class="color-main f30 fw800 mb-0">'.number_format($price_regular_bds , 0,",",".").' đ</p></div>';
                            
                        }
                        if(!empty($price_dv_bds)) {
                            ?>
                            <div class="price-dv">
                                <span><?php echo __('Land unit price', 'dungnh'); ?></span>
                                <p class="f18 fw700 color-black mb-0"><?php echo $price_dv_bds;?> <?php echo $price_type_dv; ?></p>
                            </div>
                            <?php
                        }
                        ?>
                    </div>

                    <div class="list-tienich-bds mb-3">
                        <ul>
                            <?php 
                            if(!empty($bedroom_bds)) {
                                echo '<li><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="17" viewBox="0 0 18 17" fill="none">
                                <g clip-path="url(#clip0_313_14762)">
                                <path d="M3.72117 16.499C3.4329 16.499 3.25377 16.2751 3.25377 15.9128C3.25377 15.8509 3.25377 15.789 3.25377 15.7272C3.25377 15.571 3.25657 15.4119 3.24817 15.2529C3.24538 15.1969 3.20059 15.1173 3.15581 15.0938C2.13425 14.5605 1.51011 13.6973 1.303 12.5307C1.27221 12.3598 1.25822 12.1654 1.25542 11.9268C1.24982 10.9811 1.25262 10.0236 1.25542 9.21346C1.25542 9.10445 1.23583 9.04553 1.12667 8.99545C0.66207 8.78333 0.368195 8.41213 0.253443 7.89068C0.247846 7.86711 0.239449 7.8406 0.233852 7.81703L0.222656 7.78168V7.38691V7.38396C0.303822 7.0157 0.432567 6.74467 0.628484 6.5355C0.92236 6.22027 1.28341 6.05235 1.70043 6.04056C1.762 6.03761 1.82358 6.03761 1.90194 6.03761C1.95512 6.03761 2.0083 6.03761 2.06428 6.03761H2.06987C2.12865 6.03761 2.19022 6.03761 2.2546 6.03761V5.85496C2.2546 5.58687 2.2518 5.31289 2.2518 5.04774V5.0448C2.2462 4.44675 2.2434 3.83102 2.26299 3.22414C2.30218 2.02804 2.81996 1.18547 3.79954 0.717048C4.10741 0.569745 4.43207 0.496094 4.76513 0.496094C5.88186 0.496094 6.87264 1.32688 7.12173 2.47289C7.14692 2.5819 7.18331 2.6143 7.27847 2.6143C7.28406 2.6143 7.29246 2.6143 7.29806 2.6143C7.32325 2.6143 7.35124 2.61136 7.37643 2.61136C7.46879 2.61136 7.54156 2.6202 7.60593 2.63787C7.82144 2.69974 7.96138 2.91186 7.94179 3.14754C7.9194 3.39206 7.73187 3.58945 7.51077 3.59239C7.23369 3.59828 6.965 3.60123 6.71031 3.60123C6.44442 3.60123 6.18133 3.59828 5.93224 3.59239C5.69434 3.5865 5.50122 3.35965 5.50402 3.09451C5.50962 2.84115 5.70553 2.62903 5.94903 2.61136C5.97422 2.60841 5.99941 2.60841 6.0302 2.60841C6.04979 2.60841 6.06938 2.60841 6.09177 2.60841H6.10017C6.12815 2.60841 6.15614 2.60841 6.18693 2.60841C6.09737 2.26962 5.93224 2.01036 5.68314 1.81298C5.42005 1.60381 5.0786 1.48597 4.73994 1.48597C4.40129 1.48597 3.77715 1.60675 3.38812 2.42281C3.27336 2.66439 3.20619 2.92659 3.20059 3.15932C3.1838 3.8487 3.1866 4.52334 3.1894 5.23629C3.1894 5.49849 3.1922 5.76363 3.1922 6.03172H10.1752C12.0029 6.03172 13.8277 6.03172 15.6553 6.03172C16.3746 6.03172 16.9652 6.46479 17.1583 7.13355C17.371 7.873 17.0183 8.66844 16.3326 8.98072C16.2095 9.03669 16.1871 9.10445 16.1871 9.2223C16.1871 9.37549 16.1899 9.53163 16.1899 9.68482V9.68777C16.1927 10.4125 16.1983 11.1637 16.1871 11.9032C16.1647 13.3468 15.5294 14.4162 14.2979 15.0761C14.2223 15.1173 14.1831 15.1586 14.1859 15.2617C14.1915 15.5003 14.1887 15.7507 14.1887 15.9687C14.1859 16.2722 13.99 16.4902 13.7213 16.4902H13.7185C13.4527 16.4873 13.2567 16.2663 13.2539 15.9629C13.2539 15.8362 13.2539 15.7095 13.2539 15.5858V15.5828C13.2539 15.5239 13.2539 15.465 13.2539 15.4061H4.19138V15.5622C4.19138 15.6771 4.19138 15.7861 4.19138 15.898C4.19138 16.2692 4.01785 16.4902 3.72677 16.4931L3.72117 16.499ZM2.19022 10.1562C2.19022 10.7366 2.19022 11.3169 2.19022 11.8973C2.19022 13.3379 3.22019 14.425 4.58601 14.428C5.81469 14.428 7.04617 14.428 8.27764 14.428C9.45874 14.428 11.6642 14.428 12.8677 14.425C14.2279 14.425 15.2551 13.3409 15.2579 11.9061C15.2579 11.3081 15.2579 10.7101 15.2579 10.112V9.13391H2.19022V10.1562ZM15.5909 8.14404C15.6049 8.14404 15.6217 8.14404 15.6357 8.14404C15.6497 8.14404 15.6665 8.14404 15.6805 8.14404C15.7141 8.14404 15.7393 8.14404 15.7617 8.14109C16.036 8.12047 16.2655 7.89068 16.2851 7.61964C16.3046 7.36039 16.1199 7.11587 15.8596 7.04516C15.7841 7.02454 15.7029 7.02454 15.6273 7.02454C12.5514 7.02454 8.47356 7.02454 5.39766 7.02454H1.81518H1.74801C1.72562 7.02454 1.70603 7.02454 1.68923 7.02749C1.41495 7.04516 1.18265 7.27201 1.16026 7.5401C1.13787 7.79935 1.31699 8.04682 1.57728 8.11753C1.65845 8.1411 1.74801 8.14109 1.82358 8.14109C3.32374 8.14109 4.82671 8.14109 6.32687 8.14109L15.5909 8.14404Z" fill="#C3912C"></path>
                                <path d="M3.72053 16.4704C3.44904 16.4704 3.28112 16.2553 3.28112 15.9136C3.28112 15.8517 3.28112 15.7898 3.28112 15.7309C3.28112 15.5748 3.28391 15.4127 3.27552 15.2566C3.27272 15.1888 3.21954 15.1005 3.16636 15.0739C2.1504 14.5466 1.53186 13.6893 1.32754 12.5315C1.29676 12.3606 1.28276 12.1721 1.28276 11.9305C1.27716 10.9848 1.27996 10.0274 1.28276 9.2172C1.28276 9.1023 1.26037 9.02571 1.13722 8.96973C0.681017 8.75762 0.39274 8.39525 0.280787 7.88264C0.275189 7.85612 0.266793 7.83256 0.261195 7.80604L0.25 7.77658V7.39065V7.3877C0.331166 7.02534 0.457112 6.76019 0.647432 6.55692C0.938508 6.24464 1.29116 6.0826 1.69979 6.07082C1.76136 6.06787 1.82293 6.06787 1.9013 6.06787C1.95448 6.06787 2.00766 6.06787 2.06363 6.06787H2.06923C2.128 6.06787 2.19238 6.06787 2.25395 6.06787H2.28194V5.85576C2.28194 5.58767 2.27914 5.31663 2.27914 5.05148V5.04265C2.27354 4.4446 2.27074 3.82887 2.29034 3.22199C2.32952 2.03767 2.8417 1.20394 3.81009 0.741413C4.11236 0.602948 4.43423 0.529297 4.76449 0.529297C5.86722 0.529297 6.84681 1.35125 7.0931 2.48547C7.12109 2.60921 7.16867 2.65045 7.27502 2.65045C7.28062 2.65045 7.28902 2.65045 7.29742 2.65045C7.3226 2.65045 7.35059 2.64751 7.37578 2.64751C7.46534 2.64751 7.53531 2.65635 7.59689 2.67402C7.7984 2.73 7.93275 2.93327 7.91036 3.15128C7.89076 3.38107 7.71164 3.56667 7.50733 3.56962C7.23024 3.57551 6.96156 3.57846 6.70966 3.57846C6.44378 3.57846 6.18069 3.57551 5.93159 3.56962C5.71049 3.56373 5.52577 3.35161 5.53136 3.1012C5.53696 2.86257 5.71888 2.66224 5.95119 2.64751C5.97358 2.64456 5.99876 2.64456 6.03235 2.64456C6.05194 2.64456 6.07153 2.64456 6.09392 2.64456H6.10232C6.13031 2.64456 6.1583 2.64456 6.18908 2.64456H6.22547L6.21427 2.60626C6.12191 2.26157 5.95398 1.99643 5.70209 1.79315C5.4362 1.58104 5.08635 1.46025 4.7421 1.46025C4.39784 1.46025 3.75971 1.58398 3.36508 2.41182C3.24753 2.65635 3.18036 2.92444 3.17476 3.16307C3.15797 3.85244 3.16077 4.52709 3.16357 5.24003C3.16357 5.50518 3.16636 5.77032 3.16636 6.03547V6.06493H10.1774C12.005 6.06493 13.8298 6.06493 15.6575 6.06493C16.3628 6.06493 16.9421 6.48916 17.1325 7.14613C17.3424 7.87086 16.9953 8.65156 16.3236 8.955C16.1864 9.01687 16.1613 9.09641 16.1613 9.22309C16.1613 9.37629 16.1641 9.69151 16.1641 9.69151C16.1669 10.4162 16.1725 11.1645 16.1613 11.9011C16.1389 13.3328 15.5091 14.3934 14.2889 15.0504C14.2077 15.0946 14.1573 15.1447 14.1629 15.2625C14.1685 15.5011 14.1657 15.7486 14.1657 15.9666C14.1629 16.2524 13.9782 16.4615 13.7263 16.4615H13.7235C13.4716 16.4586 13.2897 16.2494 13.2869 15.9607C13.2869 15.834 13.2869 15.7073 13.2869 15.5836V15.5807C13.2869 15.5217 13.2869 15.4628 13.2869 15.4039V15.3744H4.16274V15.56C4.16274 15.672 4.16274 15.7839 4.16274 15.8959C4.16274 16.2465 3.99761 16.4586 3.72613 16.4615L3.72053 16.4704ZM2.16159 10.2071C2.16159 10.7727 2.16159 11.3354 2.16159 11.9011C2.16159 13.3593 3.20555 14.4582 4.58536 14.4582C5.81404 14.4582 7.04552 14.4582 8.277 14.4582C9.4581 14.4582 11.6636 14.4582 12.8671 14.4553C14.2441 14.4553 15.2824 13.3593 15.2852 11.9069C15.2852 11.3089 15.2852 10.7108 15.2852 10.1128V9.10525H2.16159V10.2071ZM15.5903 8.1743C15.6043 8.1743 15.6211 8.1743 15.6351 8.1743C15.6491 8.1743 15.6659 8.1743 15.6799 8.1743C15.7134 8.1743 15.7386 8.1743 15.7638 8.17135C16.0521 8.14778 16.2928 7.90915 16.3124 7.62339C16.332 7.35235 16.1417 7.0931 15.8674 7.01945C15.789 6.99882 15.7079 6.99588 15.6295 6.99588C12.5536 6.99588 8.47572 6.99588 5.39982 6.99588H1.81734H1.75016C1.72498 6.99588 1.70818 6.99588 1.68859 6.99882C1.40031 7.01945 1.15682 7.25513 1.13163 7.53795C1.10924 7.81193 1.29676 8.07413 1.56824 8.14778C1.65221 8.17135 1.74457 8.1743 1.82293 8.1743C3.3231 8.1743 4.82606 8.1743 6.32623 8.1743H15.5903Z" fill="#C3912C"></path>
                                </g>
                                <defs>
                                <clipPath id="clip0_313_14762">
                                <rect width="17" height="16" fill="white" transform="translate(0.222656 0.5)"></rect>
                                </clipPath>
                                </defs>
                                </svg></span><div class="detail-content"><span>'.__('Bedroom', 'dungnh').'</span><span class="fw700">'.$bedroom_bds.' Phòng</span></div></li>';
                            }
                            if(!empty($bathroom_bds)) {
                                echo '<li><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="15" viewBox="0 0 18 15" fill="none">
                                <g clip-path="url(#clip0_313_14757)">
                                <path d="M0.222656 8.73739C0.264231 8.58669 0.293334 8.43201 0.343224 8.2813C0.613461 7.50397 1.16641 6.98045 1.97712 6.72266C2.12679 6.67507 2.15589 6.61558 2.15173 6.48074C2.14758 5.06091 2.14758 3.64108 2.14758 2.22125C2.14758 1.40425 2.67558 0.741926 3.46966 0.551558C3.62349 0.515864 3.78563 0.5 3.94361 0.5C7.13241 0.5 10.3129 0.5 13.4934 0.5C14.5244 0.5 15.2811 1.22578 15.2853 2.21331C15.2894 3.63314 15.2853 5.05297 15.2853 6.4728C15.2853 6.53626 15.2853 6.59972 15.2853 6.62351C15.5888 6.77422 15.8881 6.8813 16.1417 7.05184C16.8277 7.5119 17.1977 8.15836 17.2102 8.95552C17.2268 10.0858 17.2185 11.2161 17.2143 12.3425C17.2143 12.6558 17.0023 12.8501 16.6697 12.8541C16.2165 12.8581 15.7634 12.8541 15.2853 12.8541C15.2853 12.9493 15.2853 13.0365 15.2853 13.1238C15.2853 13.4093 15.2894 13.6949 15.2853 13.9805C15.2811 14.2898 15.0732 14.5 14.7864 14.504C14.487 14.5079 14.275 14.2977 14.2708 13.9805C14.2667 13.6116 14.2708 13.2428 14.2708 12.866C10.5707 12.866 6.88296 12.866 3.17032 12.866C3.17032 12.9255 3.17032 12.989 3.17032 13.0484C3.17032 13.3618 3.17448 13.6711 3.17032 13.9844C3.16616 14.3017 2.95413 14.5119 2.65479 14.5079C2.36377 14.504 2.16005 14.2938 2.15589 13.9844C2.15173 13.6156 2.15589 13.2467 2.15589 12.8581C1.90644 12.8581 1.67362 12.8581 1.43665 12.8581C1.24124 12.8581 1.05 12.8501 0.854596 12.8581C0.542783 12.87 0.330751 12.755 0.222656 12.4734C0.222656 11.228 0.222656 9.98272 0.222656 8.73739ZM16.1958 11.8785C16.1999 11.8348 16.2082 11.8031 16.2082 11.7754C16.2082 10.8632 16.2249 9.95099 16.2041 9.03881C16.1874 8.15042 15.5389 7.56742 14.6076 7.56742C10.6871 7.56742 6.76655 7.56346 2.84604 7.57139C2.60074 7.57139 2.33051 7.61898 2.11016 7.71813C1.50317 7.98782 1.23709 8.4796 1.24124 9.1102C1.24124 9.97479 1.24124 10.8394 1.24124 11.704C1.24124 11.7595 1.2454 11.815 1.24956 11.8785C6.2344 11.8785 11.2026 11.8785 16.1958 11.8785ZM4.83748 6.60368C4.83748 6.35779 4.82916 6.13569 4.84163 5.91756C4.84995 5.73909 4.85826 5.55666 4.89568 5.38215C5.13682 4.28754 6.0972 3.55382 7.2904 3.54986C8.24247 3.54589 9.19453 3.54589 10.1466 3.54986C10.3171 3.54986 10.4917 3.56572 10.658 3.59745C11.7971 3.81161 12.5829 4.72776 12.6037 5.84618C12.6078 6.09207 12.6037 6.33796 12.6037 6.59178C13.1649 6.59178 13.7096 6.59178 14.2708 6.59178C14.2708 6.53229 14.2708 6.48074 14.2708 6.42918C14.2708 5.03711 14.2708 3.64504 14.2708 2.24901C14.2708 1.73739 13.9798 1.45977 13.4352 1.45977C10.2921 1.45977 7.1532 1.45977 4.01013 1.45977C3.45719 1.45977 3.17032 1.73343 3.17032 2.25694C3.17032 3.64504 3.17032 5.03314 3.17032 6.42125C3.17032 6.47677 3.17448 6.53229 3.17864 6.60368C3.66922 6.60368 4.14317 6.60368 4.61713 6.60368C4.68365 6.60368 4.75017 6.60368 4.83748 6.60368ZM11.5768 6.59575C11.5768 6.30227 11.5892 6.01671 11.5726 5.73513C11.5352 5.0966 10.9781 4.56516 10.3046 4.52946C10.0136 4.5136 9.71838 4.52153 9.42735 4.52153C8.67069 4.52153 7.91402 4.51756 7.15736 4.52946C6.77487 4.53739 6.4589 4.70397 6.20114 4.97365C5.74381 5.45354 5.87685 6.03258 5.86022 6.59575C7.78098 6.59575 9.67264 6.59575 11.5768 6.59575Z" fill="#C3912C"></path>
                                </g>
                                <defs>
                                <clipPath id="clip0_313_14757">
                                <rect width="17" height="14" fill="white" transform="translate(0.222656 0.5)"></rect>
                                </clipPath>
                                </defs>
                                </svg></span><div class="detail-content"><span>'.__('Bathroom', 'dungnh').'</</span><span class="fw700">'.$bathroom_bds.' Phòng</span></div></li>';
                            }

                            if(!empty($area_bds)) {
                                echo '<li><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41" fill="none">
                                <g clip-path="url(#clip0_313_15120)">
                                <path d="M2.90203 5.43127V10.9018H0V1.62145L0.0195423 1.58237C0.224736 1.1037 0.576497 0.752025 1.05528 0.546881L1.09437 0.527344H10.377V3.39936H5.05168L16.3373 14.6921L14.2463 16.7728L2.90203 5.43127Z" fill="#C3912C"/>
                                <path d="M24.0742 14.8191L35.4576 3.43844H29.9564V0.527344H39.239L39.2781 0.546881C40.0305 0.869251 40.3529 1.42607 40.3432 2.37364C40.3236 4.27855 40.3236 6.203 40.3334 8.06884C40.3334 8.79173 40.3334 9.52438 40.3334 10.2473V10.8822H37.4509V5.48011L26.0968 16.8412L24.0742 14.8191Z" fill="#C3912C"/>
                                <path d="M1.79789 40.8724C0.879402 40.8724 0.322448 40.5403 0.00977114 39.8077L0 39.7686V30.4882H2.88249V35.8122L14.1975 24.5391L16.308 26.6003L4.93442 37.9711H10.3574V40.8627H9.76137C9.02853 40.8627 8.30547 40.8627 7.57263 40.8627H7.43584C6.75186 40.8627 6.06788 40.8627 5.3839 40.8627C3.9964 40.8627 2.87271 40.8725 1.84675 40.8822L1.79789 40.8724Z" fill="#C3912C"/>
                                <path d="M29.9858 40.8627V37.9907H35.3013L23.9961 26.6882L26.1164 24.5684L37.4412 35.9001V30.5175H40.3334V33.4775C40.3334 35.3824 40.3334 37.2873 40.3334 39.1922C40.3334 40.3059 39.7765 40.8724 38.6723 40.8724C37.4607 40.8724 36.2491 40.8724 35.0375 40.8724L29.9858 40.8627Z" fill="#C3912C"/>
                                </g>
                                <defs>
                                <clipPath id="clip0_313_15120">
                                <rect width="40.345" height="40.345" fill="white" transform="translate(0 0.527344)"/>
                                </clipPath>
                                </defs>
                                </svg></span><div class="detail-content"><span >'.__('Area', 'dungnh').'</</</span><span class="fw700">'.$area_bds.' m2</span></div></li>';
                            }
                            if(!empty($all_huong)) {
                                echo '<li><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41" fill="none">
                                <g clip-path="url(#clip0_313_15129)">
                                <g clip-path="url(#clip1_313_15129)">
                                <path d="M40.998 20.7561C41.1556 31.752 32.2507 40.8616 21.2447 40.9979C10.2716 41.1333 1.13871 32.2703 1.00155 21.2414C0.865278 10.2687 9.73012 1.13681 20.7602 1.00055C31.7564 0.865183 40.8867 9.75219 40.998 20.7561ZM39.2229 21.0037C39.2282 10.9598 31.0563 2.78525 21.0069 2.77991C10.9575 2.77457 2.78645 10.9464 2.782 20.9939C2.77755 31.0413 10.9486 39.2132 20.998 39.2176C31.0474 39.2221 39.2184 31.052 39.2229 21.0037Z" fill="#C3912C"/>
                                <path d="M21.0426 8.77637C23.2518 15.4067 25.4612 22.037 27.6708 28.6674L27.6173 28.7081C27.535 28.6272 27.4509 28.548 27.3702 28.4654C26.5491 27.6285 25.6655 26.869 24.6535 26.2758C22.1585 24.8141 19.6783 24.8594 17.2156 26.359C16.2542 26.9447 15.4087 27.6749 14.6269 28.4815C14.5513 28.5601 14.5132 28.6771 14.4604 28.7764L14.3359 28.6708L20.9647 8.77923L21.0426 8.77637Z" fill="#C3912C"/>
                                </g>
                                </g>
                                <defs>
                                <clipPath id="clip0_313_15129">
                                <rect width="40.345" height="40.345" fill="white" transform="translate(0.34375 0.527344)"/>
                                </clipPath>
                                <clipPath id="clip1_313_15129">
                                <rect width="40" height="40" fill="white" transform="translate(1 0.999023)"/>
                                </clipPath>
                                </defs>
                                </svg></span><div class="detail-content"><span >'.__('Direction', 'dungnh').'</</</span><span class="fw700">'.$all_huong.'</span></div></li>'; 
                            }
                            ?>
                        </ul>
                    </div>


                </div>
        
                <div class="group-content-ch">
                    <div id="tab1" class="tab-gioi-thieu sec-tab">
                        <h3><?php echo __('Description', 'dungnh');?></h3>
                        <div class="inner-content-tab-gioi-thieu">
                            <?php 
                            if(!empty($content_bds_single)) {
                                echo $content_bds_single;
                            }else{
                                echo '<p>Không có nội dung. </p>';
                            }
                            
                            ?>
                        </div>

                        <a href="javascript:voild(0);" class="color-main cta-more-gt"><?php echo __('Readmore', 'dungnh');?> <svg xmlns="http://www.w3.org/2000/svg" fill="none" height="22" viewBox="0 0 21 22" width="21"><path d="m17.0625 8.375-6.5625 6.5625-6.5625-6.5625" stroke="#c3912c" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
                    </div>

                    <div id="tab2" class="tab-tien-ich sec-tab" >
                        <h3><?php echo __('Detail property', 'dungnh'); ?></h3>
                        <div class="inner-content-tab-detail">
                            <ul class="list-tab-detail-bds">
                                <?php 
                                if(!empty($list_detail_bds)) {
                                    foreach($list_detail_bds as $list_detail_bds_item) {
                                        ?>
                                        <li class="tab-item-tienich-detail-bds ">
                                            <div class="inner-detail-tienich d-flex justify-content-between">
                                            <span><?php echo $list_detail_bds_item['title_detail_item']; ?></span>
                                            <span class="fw700"><?php echo $list_detail_bds_item['value_detail_item']; ?></span>
                                            </div>
                                        
                                        </li>
                                        <?php
                                    }
                                }else{
                                    echo '<p>Không có nội dung. </p>';
                                }
                                
                                ?>
                            </ul>
                        </div>
                    </div>


                    <div id="tab2" class="tab-tien-ich sec-tab" >
                        <h3><?php echo __('Utilities', 'dungnh'); ?></h3>
                        <div class="inner-content-tab-tienich">
                            <ul class="list-tab-tienich-bds">
                                <?php 
                                if(!empty($list_bds_tienich)) {
                                    foreach($list_bds_tienich as $tienichItem) {
                                        ?>
                                        <li class="tab-item-tienich-bds">
                                            <p><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                            <path d="M5.33464 9.99935L9.33464 13.3327L14.668 6.66602M10.0013 19.3327C4.84664 19.3327 0.667969 15.154 0.667969 9.99935C0.667969 4.84469 4.84664 0.666016 10.0013 0.666016C15.156 0.666016 19.3346 4.84469 19.3346 9.99935C19.3346 15.154 15.156 19.3327 10.0013 19.3327Z" stroke="#C3912C"/>
                                            </svg><?php echo $tienichItem['title_item_tienich']; ?></p>
                                        </li>
                                        <?php
                                    }
                                }else{
                                    echo '<p>Không có nội dung. </p>';
                                }
                                
                                ?>
                            </ul>
                        </div>
                    </div>


                    <?php 
                    // $prop_location = $address_bds['lat'].','.$address_bds['lng'];
                    ?>
                    <div id="tab3" class="tab-ban-do sec-tab" >
                        <h3><?php echo __('Map', 'dungnh'); ?></h3>
                        <div class="inner-content-tab-ban-do">
                            <?php 
                            if(!empty($tienich_bando)) {
                                echo '<div class="des-map">'.$tienich_bando.'</div>';
                            }
                            ?>
                            <?php echo $address_bds_iframe; ?>
                            <div class="location-full">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="24" viewBox="0 0 16 24" fill="none">
                                <rect y="0.5" width="16" height="23" fill="url(#pattern0)"/>
                                <defs>
                                <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                <use xlink:href="#image0_313_14821" transform="translate(-0.0281837) scale(0.00300104 0.00208768)"/>
                                </pattern>
                                <image id="image0_313_14821" width="352" height="479" xlink:href="data:image/png;base64,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"/>
                                </defs>
                                </svg><?php echo $full_address;?>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <div class="col-md-4">
            <div class="sidebar-bds">
                <div class="box-contact-bds">
                    <div class="inner-box-contact d-flex align-items-center ">
                        <div class="img">
                            <img src="https://cityspace.vn/wp-content/uploads/2022/10/Frame-19015.png" alt="img">
                        </div>
                        <div class="content-box-contact">
                            <p class="f18 fw700 mb-0"><?php echo __('Contact', 'dungnh'); ?></p>
                            <p><?php echo __('Free counseling', 'dungnh'); ?></p>
                            <a href="#" class="uppercase cta-more"><?php echo __('Contact', 'dungnh'); ?> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-12">
                <h3 class="f30 fw700"><?php echo __('Related Property', 'dungnh');?></h3>
            </div>
        </div>
        <div class="row mb-50 related-ch-bottom">
            <?php if($related_bds_terms == NULL) {
                    if($lang_posts->have_posts()) {
                        while($lang_posts->have_posts()) {
                            $lang_posts->the_post();
                            get_template_part( 'template-parts/content-property-style1' );
                        }
                    }
                    wp_reset_query(  ); 
                }else{
                    foreach($related_bds_terms as $chItem) {
                        $post = $chItem;
                        setup_postdata($post);
                        get_template_part( 'template-parts/content-property-style1' );
                    }
                }
            ?>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
                <h3 class="f30 fw700"><?php echo __('Real estate same price', 'dungnh');?></h3>
            </div>
        </div>
        <div class="row mb-50 related-ch-bottom">
        <?php 
                if($related_bds_price == NULL) {
                    $args_price = array(
                        'post_type' => 'property',
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
                                'taxonomy' => 'loai-bds',
                                'field' => 'id',
                                'terms' => $term_ids,
                                'operator'=> 'IN' //Or 'AND' or 'NOT IN'
                            )
                        ),
                        'meta_query' => array(
                            array(
                                'key' => 'price_regular_bds',
                                'value' => $price_regular_bds,
                                'compare' => '<=',
                            )
                        )
                    );

                    $lang_posts_price = new WP_Query($args_price);

                    if($lang_posts_price->have_posts()) {
                        while($lang_posts_price->have_posts()) {
                            $lang_posts_price->the_post();
                            get_template_part( 'template-parts/content-property-style1' );
                        }
                    }
                    wp_reset_query(  ); 
                }else{
                    foreach($related_bds_price as $chItem) {
                        $post = $chItem;
                        setup_postdata($post);
                        get_template_part( 'template-parts/content-property-style1' );
                    }
                }
            ?>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
                <h3 class="f30 fw700"><?php echo __('Real estate same location', 'dungnh');?></h3>
            </div>
        </div>

        <div class="row mb-50 related-ch-bottom">
        <?php   if($related_bds_location == NULL) {
                    $args_location = array(
                        'post_type' => 'property',
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
                                'taxonomy' => 'loai-bds',
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
                            get_template_part( 'template-parts/content-property-style1' );
                        }
                    }
                    wp_reset_query(  ); 
                }else{
                    foreach($related_bds_location as $chItem) {
                        $post = $chItem;
                        setup_postdata($post);
                        get_template_part( 'template-parts/content-property-style1' );
                    }
                }?>
        </div>
    </div>


</main>
<div class="popup-contact">
    <div class="inner-popup-contact">
                <a href="javascript:;" class="close-popup"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
        </svg></a>
        <div class="form">
            <h3 class="f30 fw700 color-main"><?php echo __('Contact', 'dungnh'); ?></h3>
            <p><?php echo __('Free counseling', 'dungnh'); ?></p>
            <?php 
                if ( ICL_LANGUAGE_CODE == 'en' ) {
                    echo do_shortcode('[contact-form-7 id="1100" title="Form property EN"]');
                    
                }else{
                    echo do_shortcode('[contact-form-7 id="388" title="Form property"]');
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
<?php

get_footer();
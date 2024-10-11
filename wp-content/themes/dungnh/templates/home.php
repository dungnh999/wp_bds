<?php 


/**
 * Template Name: Homepage
 */

get_header();
global $post;

$banner_img = get_field('banner_img', $post);
$title_banner = get_field('title_banner', $post);
$link_video = get_field('link_video', $post);

$heading_about = get_field('heading_about_heading', $post);
$list_camket = get_field('list_camket', $post);
$img_about = get_field('img_about', $post);

$heading_why_us = get_field('heading_why_us_heading', $post);
$list_whyus = get_field('list_whyus', $post);
$bg_whyus = get_field('bg_whyus', $post);

$heading_cm = get_field('heading_cm_heading', $post);
$list_cm = get_field('list_cm', $post);


$heading_cho_thue = get_field('heading_cho_thue_heading', $post);
$list_ch = get_field('list_ch', $post);

$heading_bds = get_field('heading_bds_heading', $post);
$list_bds = get_field('list_bds', $post);


$heading_ht = get_field('heading_ht_heading', $post);
$content_ht = get_field('content_ht', $post);
$list_ht = get_field('list_ht', $post);

$heading_tt = get_field('heading_tt', $post);
$post_featured = get_field('post_featured', $post);
$bg_tt = get_field('bg_tt', $post);



$background_form = get_field('background_form', $post);

$heading_contact_1 = get_field('heading_contact_1_heading', $post);
$content_contact_1 = get_field('content_contact_1', $post);
$form = get_field('form', $post);


$heading_6 = get_field('heading_6_heading',$post);
$content_parter = get_field('content_parter', $post);
$imgs_partner = get_field('imgs_partner', $post);

$group_banner = get_field('group_banner', $post);
?>


<div class="sec-home1">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-md-12">
                <div class="slidebanner">
                    <div class="swiper swiper-container">
                        <div class="swiper-wrapper">
                            <?php 
                            if(!empty($group_banner)) {
                                foreach($group_banner as $banner) {
                                    if(!empty($banner['link_video'])) {
                                        ?>
                                        <div class="swiper-slide">
                                            <div class="item-slidebanner-home">
                                                <?php echo wp_get_attachment_image( $banner['banner_img']['ID'], 'full' ); ?>
                                                <div class="slidebanner-content">
                                                    <div class="inner-slide-content">
                                                        <?php 
                                                            if(!empty($banner['title_banner'])) {
                                                                echo '<h1 class="f45 fw700 color-4" data-aos="fade-up">'.$banner['title_banner'].'</h1>';
                                                            }
                                                            if(!empty($banner['link_video'])) {
                                                                echo '<a href="'.$banner['link_video'].'" data-aos="fade-up" data-fancybox><svg xmlns="http://www.w3.org/2000/svg" width="111" height="111" viewBox="0 0 111 111" fill="none">
                                                                <circle opacity="0.5" cx="55.5" cy="55.5" r="55" stroke="#B37F2C"/>
                                                                <circle opacity="0.5" cx="55.5009" cy="55.4999" r="36.1064" stroke="#B37F2C"/>
                                                                <circle cx="55.5009" cy="55.4999" r="25.0751" fill="#B37F2C" stroke="#B37F2C"/>
                                                                <path d="M52.6199 49.5688L61.3705 55.4996L52.6199 61.4305L52.6199 49.5688Z" fill="white" stroke="#B37F2C"/>
                                                                </svg></a>';
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }else{
                                        ?>
                                        <div class="swiper-slide">
                                            <div class="item-slidebanner-home">
                                                <a href="<?php echo (!empty($banner['link_banner'])) ? $banner['link_banner'] : '#'; ?>">
                                                    <?php echo wp_get_attachment_image( $banner['banner_img']['ID'], 'full' ); ?>
                                                    <div class="slidebanner-content">
                                                        <?php 
                                                            if(!empty($banner['title_banner'])) {
                                                                echo '<h1 class="f45 fw700 color-4" data-aos="fade-up">'.$banner['title_banner'].'</h1>';
                                                            }
                                                        ?>
                                                    </div>
                                                </a>
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
            </div>
        </div>
    </div>
</div>

<div class="sec-form-search">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="form-search-ch">
                    <form action="https://cityspace.vn/tim-kiem-can-ho/" method="GET">
                        <div class="inner-form">
                            <div class="form-input form-keywork">
                                <label for="keywork"><?php echo __('Rent', 'dungnh'); ?></label>
                                <input type="text" name="keywork" value="" placeholder="<?php echo __('Find the address...', 'dungnh'); ?>" />
                            </div>

                            <div class="form-input">
                                <label for="date-form"><?php echo __('Check-in date', 'dungnh'); ?></label>
                                <input type="text" name="your-date-form" value="">
                            </div>

                            <div class="form-input">
                                <label for="date-to"><?php echo __('Check-out date', 'dungnh'); ?></label>
                                <input type="text" name="your-date-to" value="">
                            </div>

                            <div class="form-input form-submit">
                                <button class="btn-submit-form"><?php echo __('Search', 'dungnh'); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="sec-home2 pt-80">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <?php 
                if(!empty($heading_about)) {
                    ?>
                    <div class="block-heading mb-5" data-aos="fade-up">
                        <p class="f18 color-1 fw700 uppercase"><?php echo $heading_about['subtitle'];?></p>
                        <h2 class="f50 color-main fw800"><?php echo $heading_about['title_heading'];?></h2>
                    </div>
                    <?php
                }

                if(!empty($list_camket)) {
                    ?>
                    <ul class="ml-0 pl-0 listcamket" data-aos="fade-up">
                        <?php 
                        foreach($list_camket as $listitem) {
                            ?>
                            <li class="f18 fw600"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                            <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                            </svg><?php echo $listitem['title_camket'];?></li>
                            <?php
                        }
                        
                        ?>
                    </ul>
                    <?php
                }
                ?>
            </div>

            <div class="col-md-6">
                <?php 
                if(!empty($img_about)) {
                    ?>
                    <div class="ab-img" data-aos="fade-right">
                        <?php echo '<img src="'.$img_about['url'].'" alt="img"/>'; ?>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>


<div class="sec-home3 pt-80 pb-80 bg_400" style="background-image: url(<?php echo $bg_whyus['url']; ?>);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12">
                <?php 
                if(!empty($heading_why_us)) {
                    ?>
                    <div class="block-heading text-center mb-5" data-aos="fade-up">
                        <p class="f18 color-1 fw700 uppercase"><?php echo $heading_why_us['subtitle'];?></p>
                        <h2 class="f50 color-main fw800"><?php echo $heading_why_us['title_heading'];?></h2>
                    </div>
                    <?php
                }

                if(!empty($list_whyus)) {
                    ?>
                    <div class="ml-0 pl-0 listwhyhome d-flex ">
                        <div class="swiper swiper-container" data-aos="fade-up" data-aos-delay="300">
                            <div class="swiper-wrapper">
                            <?php 
                                // $delay = 300;
                                foreach($list_whyus as $list_whyusitem) {
                                    ?>
                                    <div class="swiper-slide">
                                        <div class="text-center" >
                                            <?php 
                                            if(!empty($list_whyusitem['img_whyus'])) {
                                                echo '<img src="'.$list_whyusitem['img_whyus']['url'].'" alt="img" />';
                                            }

                                            if(!empty($list_whyusitem['title_whyus'])) {
                                                echo '<h3 class="uppercase f16 fw700 color-black">'.$list_whyusitem['title_whyus'].'</h3>';
                                            }

                                            if(!empty($list_whyusitem['content_whyus'])) {
                                                echo '<p class="">'.$list_whyusitem['content_whyus'].'</p>';
                                            }
                                            ?>

                                        </div>
                                    </div>
                                    <?php
                                    // $delay = $delay + 100;
                                }
                                
                                ?>
                            </div>
            
                        </div>
                        <div class="swiper-button-prev novbutton-slide btn-cricle"></div>
                        <div class="swiper-button-next novbutton-slide btn-cricle"></div>
                    </div>
                    <?php
                }
                ?>
            </div>


        </div>
    </div>
</div>



<div class="sec-home4 pt-80 pb-80">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12 ">
                <?php 
                if(!empty($heading_cm)) {
                    ?>
                    <div class="block-heading text-center mb-5 w900" data-aos="fade-up">
                        <p class="f18 color-1 fw700 uppercase"><?php echo $heading_cm['subtitle'];?></p>
                        <h2 class="f50 color-main fw800"><?php echo $heading_cm['title_heading'];?></h2>
                    </div>
                    <?php
                }

                if(!empty($list_cm)) {
                    ?>
                    <div class="listcm d-flex ">
                        <?php 
                        $delay = 300;
                        foreach($list_cm as $list_cm_item) {
                            ?>
                            <div class="text-center item-listcm" data-aos="fade-up" data-aos-delay="<?php echo $delay;?>">
                                <div class="inner-listcm">
                                <?php 
                                    if(!empty($list_cm_item['icon'])) {
                                        echo '<div class="icon-cm"><a href="'.$list_cm_item['link_cm'].'"><img src="'.$list_cm_item['icon']['url'].'" alt="img" /></a></div>';
                                    }

                                    if(!empty($list_cm_item['title_cm'])) {
                                        echo '<h3 class="uppercase f16 fw700 color-black"><a href="'.$list_cm_item['link_cm'].'">'.$list_cm_item['title_cm'].'</a></h3>';
                                    }
                                ?>
                                </div>

                            </div>
                            <?php
                            $delay = $delay + 100;
                        }
                        
                        ?>
                    </div>
                    <?php
                }
                ?>
            </div>


        </div>
    </div>
</div>

<div class="sec-home-can-ho pt-80 pb-80 " >
    <?php
    $terms = get_terms( array(
        'taxonomy' => 'danh-muc-can-ho',
        'hide_empty' => false,
    ) );

    ?>
    <div class="container heading-blog mb-5">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-between align-items-end"  data-aos="fade-up">
                <?php 
                    if(!empty($heading_cho_thue)) {
                        ?>
                        <div class="block-heading">
                            <p class="f18 color-1 fw700 uppercase"><?php echo $heading_cho_thue['subtitle'];?></p>
                            <h2 class="f50 color-main fw800"><?php echo $heading_cho_thue['title_heading'];?></h2>
                        </div>
                        <?php
                    }
                
                ?>
                <div class="heading-cat-post">
                    <ul>
                        <li><a href="">Tất cả</a></li>
                        <?php 
                        if(!empty($terms)) {
                            foreach($terms as $term) {
                                echo '<li><a href="'.get_term_link( $term->term_id, $term->taxonomy ).'">'.$term->name.'</a></li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-5"  data-aos="fade-up">
        <div class="row">
            <div class="col-md-12">
            <div class="slide-ch slide-p">
                <div class="swiper swiper-container">
                    <div class="swiper-wrapper">
                    <?php 
                        if(!empty($list_ch)) {
                            foreach($list_ch as $chItem) {
                                $post = $chItem;
                                setup_postdata($post);
                                echo '<div class="swiper-slide">';
                                get_template_part('template-parts/content-can-ho');
                                echo '</div>';
                            }
                        }
                        
                    ?>
                    </div>
                </div>
            </div>
            </div>

        </div>
    </div>
    <div class="container"  data-aos="fade-up">
        <div class="row">
            <div class="col-md-12 text-center">
                <a href="https://cityspace.vn/can-ho" class="cta-more uppercase"><?php echo __('Readmore', 'dungnh'); ?></a>
            </div>
        </div>
    </div>
</div>

<div class="sec-home-bds pt-80 pb-80 " >
    <?php
    $terms = get_terms( array(
        'taxonomy' => 'danh-muc-can-ho',
        'hide_empty' => false,
    ) );

    ?>
    <div class="container heading-blog mb-5"  data-aos="fade-up">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-between align-items-end">
                <?php 
                    if(!empty($heading_bds)) {
                        ?>
                        <div class="block-heading">
                            <p class="f18 color-1 fw700 uppercase"><?php echo $heading_bds['subtitle'];?></p>
                            <h2 class="f50 color-main fw800"><?php echo $heading_bds['title_heading'];?></h2>
                        </div>
                        <?php
                    }
                
                ?>
                <div class="heading-cat-post">
                    <ul>
                        <li><a href="#"><?php echo __('ALL', 'dungnh');?></a></li>
                        <?php 
                        if(!empty($terms)) {
                            foreach($terms as $term) {
                                echo '<li><a href="'.get_term_link( $term->term_id, $term->taxonomy ).'">'.$term->name.'</a></li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-5"  data-aos="fade-up">
        <div class="row">
            <div class="col-md-12">
            <div class="slide-property slide-p">
                <div class="swiper swiper-container">
                    <div class="swiper-wrapper">
                    <?php 
                        if(!empty($list_bds)) {
                            foreach($list_bds as $chItem) {
                                $post = $chItem;
                                setup_postdata($post);
                                echo '<div class="swiper-slide">';
                                get_template_part('template-parts/content-property-style2');
                                echo '</div>';
                            }
                        }
                        
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container"  data-aos="fade-up">
        <div class="row">
            <div class="col-md-12 text-center">
                <a href="https://cityspace.vn/property/" class="cta-more uppercase"><?php echo __('Readmore', 'dungnh'); ?></a>
            </div>
        </div>
    </div>
</div>


<div class="sec-home7 pt-80 pb-80">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12 ">
                <?php 
                if(!empty($heading_ht)) {
                    ?>
                    <div class="block-heading text-center mb-5 w900"  data-aos="fade-up">
                        <p class="f18 color-1 fw700 uppercase"><?php echo $heading_ht['subtitle'];?></p>
                        <h2 class="f50 color-main fw800"><?php echo $heading_ht['title_heading'];?></h2>
                        <?php 
                        if(!empty($content_ht)) {
                            echo '<div class="content_ht">'.$content_ht.'</div>';
                        }
                        ?>
                    </div>
                    <?php
                }

                if(!empty($list_ht)) {
                    ?>
                    <div class="list_ht d-flex "  data-aos="fade-up">
                        <div class="swiper swiper-container">
                            <div class="swiper-wrapper">
                                <?php 
                                foreach($list_ht as $list_ht_item) {
                                    ?>
                                    <div class="swiper-slide">
                                        <div class="text-center item-list_ht">
                                            <div class="inner-list_ht">
                                                <a href="<?php echo $list_ht_item['link']; ?>">
                                                    <?php 
                                                    if(!empty($list_ht_item['img_ht'])) {
                                                        echo '<img src="'.$list_ht_item['img_ht']['url'].'" alt="img" />';
                                                    }
                                                    if(!empty($list_ht_item['title_ht'])) {
                                                        echo '<h3 class="uppercase f16 fw700 color-black title_ht">'.$list_ht_item['title_ht'].'</h3>';
                                                    }
                                                    ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                }
                                
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>


        </div>
    </div>
</div>

<div class="sec-home8 pt-80 pb-80 bg_400 mb-80"  style="background-image: url(<?php echo $bg_whyus['url']; ?>);">
    <?php
    $terms = get_terms( array(
        'taxonomy' => 'category',
        'hide_empty' => false,
    ) );

    ?>
    <div class="container heading-blog mb-4">
        <div class="row">
            <div class="col-md-12 col-md-12 d-flex align-items-end justify-content-between" data-aos="fade-up">
                <div class="block-heading">
                    <p class="f18 color-1 fw700 uppercase"><?php echo __('Newsletter update', 'dungnh'); ?></p>
                    <h2 class="f50 color-main fw800"><?php echo __('News', 'dungnh'); ?></h2>
                </div>

                <div class="heading-cat-post">
                    <ul>
                        <li><a href="#"><?php echo __('ALL', 'dungnh'); ?></a></li>
                        <?php 
                        if(!empty($terms)) {
                            foreach($terms as $term) {
                                echo '<li><a href="'.get_term_link( $term->term_id, $term->taxonomy ).'">'.$term->name.'</a></li>';
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
                <div class="top-post-hightline" data-aos="fade-up">
                    <div class="blog-hightline" style="">
                        <?php 
                        foreach ($post_featured as $key => $post) {
                            ?>
                                <div class="single-blog">
                                    <div class="blog-img img-full">
                                        <a
                                            href="<?php echo get_permalink($post->ID); ?>">
                                            <img src="<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>"
                                                alt=""></a>
                                    </div>
                                    <div class="blog-content">

                                    
                                        <div class="blog-meta">
                                            <p class="author-name color-white"><?php echo get_the_date('d/m/Y', $post->ID); ?></p>
                                            <h3 class="blog-title"><a
                                                href="<?php echo get_permalink($post->ID); ?>" class="f20 fw700 color-white"><?php echo get_the_title($post->ID); ?></a></h3>
                                            <a class="read-btn"
                                                href="<?php echo get_permalink($post->ID); ?>"><span
                                                    class="qodef-m-text"><svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 45 45" fill="none">
                                                <path d="M7.03125 22.5H37.9688" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M25.3125 9.84375L37.9688 22.5L25.3125 35.1562" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg></span></a>
                                        </div>

                                    </div>
                                </div>
                            <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="section-contact-2 pt-80 pb-80">
    <div class="container"  style="background-image: url(<?php echo $background_form['url']; ?>);">
        <div class="row align-items-center">
            <div class="col-md-6 offset-md-6 ">
                <?php 
                if(!empty($heading_contact_1)) {
                    ?>
                    <div class="block-heading" data-aos="fade-up">
                        <p class="f18 color-1 fw700 uppercase"><?php echo $heading_contact_1['subtitle'];?></p>
                        <h2 class="f50 color-main fw800"><?php echo $heading_contact_1['title_heading'];?></h2>
                    </div>
                    <?php
                }
                if(!empty($content_contact_1)) {
                    echo '<div class="content_contact mb-4" data-aos="fade-up">'.$content_contact_1.'</div>';
                }

                if(!empty($form)) {
                    echo do_shortcode($form);
                }

                ?>
            </div>
        </div>
    </div>
</div>


<div class="section-about-6 pt-80 pb-80" >
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php 
                if(!empty($heading_6)) {
                    ?>
                    <div class="block-heading mb-5 w900 text-center" data-aos="fade-up">
                        <p class="f18 color-1 fw700 uppercase"><?php echo $heading_6['subtitle'];?></p>
                        <h2 class="f50 color-main fw800"><?php echo $heading_6['title_heading'];?></h2>
                        <?php if(!empty($content_parter)) {
                                ?>
                                <div class="block-subheading mb-5 text-center pl-5 pr-5">
                                    <p class="color-1 uppercase"><?php echo $content_parter;?></p>
                                </div>
                                <?php
                            }
                        ?>
                    </div>
                    <?php
                }
                ?>
            </div>

            <div class="col-md-12">
                <?php 
                if(!empty($imgs_partner)) {
                    ?>  
                    <div class="gr_partner mx-auto w900 relative" data-aos="fade-up">
                        <div class="swiper swiper-container">
                            <div class="swiper-wrapper">
                                <?php 
                                foreach ($imgs_partner as $key => $partner) {
                                    ?>
                                    <div class="swiper-slide">
                                        <div class="item-partner ">
                                            <div class="inner-partner">
                                            <img src="<?php echo $partner['url'];?>" alt="partner">
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="swiper-button-prev novbutton-slide btn-cricle"></div>
                        <div class="swiper-button-next novbutton-slide btn-cricle"></div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php

get_footer();
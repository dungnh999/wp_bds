<?php 

/**
 * Template Name: Template About
 */


get_header();

global $post;

$heading = get_field('heading', $post);
$block_des_1 = get_field('block_des_1', $post);
$content_des_about = get_field('content_des_about', $post);
$img_about = get_field('img_about', $post);

$heading_2 = get_field('heading_2_heading', $post);
$group_giatri = get_field('group_giatri', $post);
$bg_giatri = get_field('bg_giatri', $post);

$heading_3 = get_field('heading_3_heading', $post);
$group_history = get_field('group_history', $post);

$heading_4 = get_field('heading_4_heading', $post);
$content_gtml = get_field('content_gtml', $post);
$cta_link = get_field('cta_link', $post);
$img_1 = get_field('img_1', $post);
$img_2 = get_field('img_2', $post);
$link_video = get_field('link_video', $post);
$background_1 = get_field('background_1', $post);


$heading_5 = get_field('heading_5_heading', $post);
$sub_heading = get_field('sub_heading_heading', $post);
$group_whyus = get_field('group_whyus', $post);
$background_2 = get_field('background_2', $post);

$heading_6 = get_field('heading_6_heading', $post);
$content_parter = get_field('content_parter', $post);
$imgs_partner = get_field('imgs_partner', $post);




?>

<div class="section-about-1 pt-80 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-md-6" data-aos="fade-right">
                <?php 
                if(!empty($heading)) {
                    ?>
                    <div class="block-heading">
                        <p class="f18 color-1 fw700 uppercase"><?php echo $heading['subtitle'];?></p>
                        <h2 class="f50 color-main fw800"><?php echo $heading['title_heading'];?></h2>
                    </div>
                    <?php
                }
                if(!empty($block_des_1)) {
                    echo '<div class="block_des_1 d-flex mb-4"><svg xmlns="http://www.w3.org/2000/svg" width="33" height="24" viewBox="0 0 33 24" fill="none">
                    <path d="M13.7906 23.6L16.9906 -3.8147e-06H7.39062L0.990625 23.6H13.7906ZM29.7906 23.6L32.9906 -3.8147e-06H23.3906L16.9906 23.6H29.7906Z" fill="#C3912C"/>
                    </svg>'.$block_des_1.'</div>';
                }

                if(!empty($content_des_about)) {
                    echo '<div class="content_des_about">'.$content_des_about.'</div>';
                }
                ?>
            </div>
            <div class="col-md-6">
                <img src="<?php echo $img_about['url']; ?>" alt="about" class="img-broder" data-aos="fade-left">
            </div>
        </div>
    </div>
</div>


<div class="section-about-2 pt-80 pb-80"  style="background-image: url(<?php echo $bg_giatri['url']; ?>);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php 
                if(!empty($heading_2)) {
                    ?>
                    <div class="block-heading text-center mb-5" data-aos="fade-up">
                        <p class="f18 color-1 fw700 uppercase"><?php echo $heading_2['subtitle'];?></p>
                        <h2 class="f50 color-main fw800"><?php echo $heading_2['title_heading'];?></h2>
                    </div>
                    <?php
                }

                if(!empty($group_giatri)) {
                    $delay = 300;
                    ?>  
                    <div class="gr_giatri relative">
                        <div class="swiper swiper-container">
                            <div class="swiper-wrapper">
                                <?php 
                                foreach ($group_giatri as $key => $gt) {
                                    ?>
                                    <div class="swiper-slide">
                                        <div class="item-giatri" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                                            <div class="shape-giatri"></div>
                                            <div class="inner-item-giatri">
                                                <div class="icon-giatri mb-4">
                                                    <img src="<?php echo $gt['icon']['url']; ?>" alt="icon">
                                                </div>
                                                <div class="inner-giatri-content">
                                                    <p class="f20 fw700"><?php echo $gt['title_gt']; ?></p>
                                                    <p><?php echo $gt['content_gt']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                    $delay = $delay + 100;
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




<div class="section-about-3 pt-80 pb-80 mb-80" >
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php 
                if(!empty($heading_3)) {
                    ?>
                    <div class="block-heading text-center mb-5" data-aos="fade-up">
                        <p class="f18 color-1 fw700 uppercase"><?php echo $heading_3['subtitle'];?></p>
                        <h2 class="f50 color-main fw800"><?php echo $heading_3['title_heading'];?></h2>
                    </div>
                    <?php
                }

                if(!empty($group_history)) {
                    $delay = 300;
                    ?>  
                    <div class="gr_history ">
                        <?php 
                        foreach ($group_history as $key => $historyItem) {
                            ?>
                            <div class="item-history d-flex relative">
                                <div class="shape-history"></div>
                                <div class="inner-item-history d-flex relative align-items-center <?php echo ($key % 2 != 0 ) ? 'order2' : '';?>">
                                    <div class="img-history mb-4" data-aos="fade-right">
                                        <img src="<?php echo $historyItem['img_history']['url']; ?>" alt="icon">
                                    </div>
                                    <div class="inner-history-content" data-aos="fade-left">
                                        <div class="f45 fw700 color-main mb-4"><?php echo $historyItem['title_history']; ?></div>
                                        <p><?php echo $historyItem['content_history']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php
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



<div class="section-about-4 pt-80 pb-80"  style="background-image: url(<?php echo $background_1['url']; ?>);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <?php 
                if(!empty($heading_4)) {
                    ?>
                    <div class="block-heading mb-5" data-aos="fade-up">
                        <p class="f18 color-white fw700 uppercase"><?php echo $heading_4['subtitle'];?></p>
                        <h2 class="f50 color-white fw800"><?php echo $heading_4['title_heading'];?></h2>
                    </div>
                    <?php
                }

                if(!empty($content_gtml)) {
                    echo '<div class="content_gtml mb-4 color-white" data-aos="fade-up">'.$content_gtml.'</div>';
                }

                if(!empty($cta_link)) {
                    echo '<a class="cta_link color-main fw600 f16 uppercase mb-5" href="'.$cta_link['url'].'" data-aos="fade-up">'.$cta_link['title'].'</a>';
                }

                ?>
            </div>

            <div class="col-md-6">
                <div class="inner-img-ab4 d-flex relative" data-aos="fade-up">
                    <?php 
                    if(!empty($link_video)) {
                        ?>
                        <a href="<?php echo $link_video;?>" data-fancybox class="cta_video_popup"><svg xmlns="http://www.w3.org/2000/svg" width="153" height="153" viewBox="0 0 153 153" fill="none">
                        <circle opacity="0.5" cx="76.5" cy="76.5" r="76" stroke="white"/>
                        <circle opacity="0.5" cx="76.5004" cy="76.5004" r="49.9574" stroke="white"/>
                        <circle cx="76.5022" cy="76.5003" r="34.7522" fill="white" stroke="white"/>
                        <path d="M85.8203 76.5009L71.841 85.9755L71.841 67.0263L85.8203 76.5009Z" fill="#C3912C"/>
                        </svg></a>
                        <img src="<?php echo $img_1['url']; ?>" alt="img">
                        <img src="<?php echo $img_2['url']; ?>" alt="img">
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="section-about-5 pt-80 pb-80"  style="background-image: url(<?php echo $background_2['url']; ?>);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php 
                if(!empty($heading_5)) {
                    ?>
                    <div class="block-heading mb-5 text-center" data-aos="fade-up">
                        <p class="f18 color-1 fw700 uppercase"><?php echo $heading_5['subtitle'];?></p>
                        <h2 class="f50 color-main fw800"><?php echo $heading_5['title_heading'];?></h2>
                    </div>
                    <?php
                }

                if(!empty($sub_heading)) {
                    ?>
                    <div class="block-subheading mb-5 text-center pl-5 pr-5" data-aos="fade-up">
                        <h2 class="f50 color-main"><?php echo $sub_heading['subtitle'];?></h2>
                        <p class="color-1 uppercase"><?php echo $sub_heading['title_heading'];?></p>
                    </div>
                    <?php
                }

                ?>
            </div>

            <div class="col-md-12">
                <?php 
                if(!empty($group_whyus)) {
                    ?>  
                    <div class="gr_why d-flex relative" data-aos="fade-up">
                        <?php 
                        foreach ($group_whyus as $key => $whyItem) {
                            ?>
                            <div class="item-whyus ">
                                <div class="inner-item-whyus relative text-center">
                                    <div class="img-whyus mb-4">
                                        <img src="<?php echo $whyItem['icon']['url']; ?>" alt="icon">
                                    </div>
                                    <div class="inner-whyus-content">
                                        <div class="f18 fw700 color-main mb-4"><?php echo $whyItem['title_whyus_item']; ?></div>
                                        <p><?php echo $whyItem['content_whyus_item']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php
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


<div class="section-about-6 pt-80 pb-80" >
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php 
                if(!empty($heading_6)) {
                    ?>
                    <div class="block-heading mb-5 text-center" data-aos="fade-up">
                        <p class="f18 color-1 fw700 uppercase"><?php echo $heading_6['subtitle'];?></p>
                        <h2 class="f50 color-main fw800"><?php echo $heading_6['title_heading'];?></h2>
                    </div>
                    <?php
                }

                if(!empty($content_parter)) {
                    ?>
                    <div class="block-subheading mb-5 text-center pl-5 pr-5" data-aos="fade-up">
                        <p class="color-1 uppercase"><?php echo $content_parter;?></p>
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
<?php


/**
 * Template Name: Template FAQ
 */


get_header();

global $post;

$title_faq = get_field('title_faq', $post);
$list_faqs = get_field('list_faqs', $post);


?>

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="inner-sidebar-left inner-sidebar">
                <aside class="category mb-5">
                    <h3 class="f18 fw700 uppercase"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none">
                            <g clip-path="url(#clip0_313_15879)">
                                <path d="M4 6H20" stroke="white" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M4 12H20" stroke="white" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M4 18H20" stroke="white" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </g>
                            <defs>
                                <clipPath id="clip0_313_15879">
                                    <rect width="24" height="24" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>Danh mục</h3>
                    <div class="aside-content">
                        <?php wp_nav_menu(
                            array(
                                'theme_location' => 'menu-support',
                                'menu_id'        => 'support-menu',
                                'container_class'      => 'support-content',
                                'menu_class'           => 'menu menu-support',
                            )
                        );
		            ?>
                    </div>
                </aside>
            </div>
        </div>
        <div class="col-md-9">
            <div class="inner-content-support">
                <h2 class="f30 fw800 "><?php echo $title_faq; ?></h2>
                <div class="accordions">
                    <?php 
                    
                    if(!empty($list_faqs)) {
                        foreach($list_faqs as $key => $faq) {
                            ?>
                            <div class="accordion">
                                <label class="acc-label"><div class="number"><span class="numbertext"><?php echo ($key <= 10) ? '0' . ( $key + 1 ) : '' ;?></span> <span><?php echo $faq['title_faq_item']; ?></span></div>  <span
                                        class="plus-faq"></span></label>
                                <div class="acc-content"><?php echo $faq['content_faq_item']; ?></div>
                            </div>
                            <?php
                        }
                    }
                    
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php

get_footer();
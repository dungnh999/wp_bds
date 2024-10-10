<?php 

/**
 * Template Name: Template Contact
 */


get_header();

global $post;

$heading_contact = get_field('heading_contact_heading', $post);
$content_contact = get_field('content_contact', $post);
$list_contact = get_field('list_contact', $post);
$background_form = get_field('background_form', $post);

$heading_contact_1 = get_field('heading_contact_1_heading', $post);
$content_contact_1 = get_field('content_contact_1', $post);
$form = get_field('form', $post);

$title_list_contact = get_field('title_list_contact', $post);
$list_contact_2 = get_field('list_contact_2', $post);

$map = get_field('map', $post);



?>

<div class="section-contact-1 pt-80 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-md-12 w900">
                <?php 
                if(!empty($heading_contact)) {
                    ?>
                    <div class="block-heading text-center">
                        <p class="f18 color-1 fw700 uppercase"><?php echo $heading_contact['subtitle'];?></p>
                        <h2 class="f50 color-main fw800"><?php echo $heading_contact['title_heading'];?></h2>
                        <?php if(!empty($content_contact)) {
                            echo '<div class="content_contact mb-4">'.$content_contact.'</div>';
                        }
                        ?>
                    </div>
                    <?php
                }


                ?>
            </div>
            <div class="col-md-12">
            <div class="list_contact d-flex">
                <?php 
                if(!empty($list_contact)) {
                    foreach ($list_contact as $key => $contact_item) {
                        ?>
                        <div class="item-contact text-center">
                            <div class="inner-item-contact">
                                <div class="icon-contact">
                                    <?php echo $contact_item['icon']; ?>
                                </div>
                                <p class="title_contact f18 fw700"><?php echo $contact_item['title_contact'] ?></p>
                                <p><?php echo $contact_item['content_item_contact'] ?></p>
                            </div>
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



<div class="section-contact-2 pt-50 pb-80">
    <div class="container"  style="background-image: url(<?php echo $background_form['url']; ?>);">
        <div class="row align-items-center">
            <div class="col-md-6 offset-md-6 ">
                <?php 
                if(!empty($heading_contact)) {
                    ?>
                    <div class="block-heading">
                        <p class="f18 color-1 fw700 uppercase"><?php echo $heading_contact['subtitle'];?></p>
                        <h2 class="f50 color-main fw800"><?php echo $heading_contact['title_heading'];?></h2>
                    </div>
                    <?php
                }
                if(!empty($content_contact)) {
                    echo '<div class="content_contact mb-4">'.$content_contact.'</div>';
                }

                if(!empty($form)) {
                    echo do_shortcode($form);
                }

                ?>
            </div>
        </div>
    </div>
</div>


<div class="section-contact-3 pt-50 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-5">
                <?php 
                if(!empty($title_list_contact)) {
                    ?>
                    <div class="block-heading text-center">
                        <h2 class="f30 fw800"><?php echo $title_list_contact;?></h2>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="col-md-12">
                <div class="list-contact-2 d-flex">
                    <?php 
                    if(!empty($list_contact_2)) {
                        foreach($list_contact_2 as $key => $contact2) {
                            ?>
                            <div class="item-contact2 text-center">
                                <div class="inner-item-contact2">
                                    <div class="icon-contact">
                                        <img src=" <?php echo $contact2['icon']['url']; ?>" alt="icon">
                                    </div>
                                    <p class="title_contact f18 fw700"><?php echo $contact2['title_contact_2'] ?></p>
                                    <p><?php echo $contact2['content_contact_2'] ?></p>
                                </div>
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


<div class="section-map">
    <?php
    if(!empty($map)) {
        echo $map;
    }
    ?>
</div>


<?php


get_footer();
<?php 


get_header();

$currentterrm = get_queried_object();
$termsCH = get_terms(array(
    'taxonomy' => 'du-an',
    'hide_empty' => false,
    'meta_query' => array(
        array(
            'key' => 'danh-muc-can-ho', // Kiểm tra meta key
            'value' => '"' . $currentterrm->term_id . '"', // ID của danh mục đã chọn, cần bao quanh bằng dấu ngoặc kép
            'compare' => 'LIKE' // Sử dụng LIKE để kiểm tra sự tồn tại trong mảng
        ),
    ),
));

?>

<div id="main-can-ho">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block-heading text-center">
                    <p class="f18 color-1 fw700 uppercase mb-2"><?php echo __('Dự án', 'dungnh'); ?></p>
                    <h2 class="f50 color-main fw700 uppercase"><?php echo $currentterrm->name ; ?></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php 
            foreach($termsCH as $term_ch) {
                $img_term_ch = get_field('image_project', $term_ch);
                ?>
                <div class="col-md-6">
                    <div class="item-term-ch">
                        <div class="inner-term-ch text-center">
                            <a href="<?php echo get_term_link($term_ch->term_id, $term_ch->taxonomy) . '?danh-muc=' . $currentterrm->slug;?>">
                                <div class="thumbnail-term-ch mb-3">
                                    <img src="<?php echo $img_term_ch['url']; ?>" alt="<?php echo $term_ch->name; ?>">
                                </div>
                                <h3 class="color-main fw700"><?php echo $term_ch->name; ?></h3>
                            </a>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <div class="container list-ch mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="description-ch">
                    <?php echo $description_ch; ?>
                </div>
                <div class="more-des text-center">
                    <a href="javascript:voild(0);" class="cta-more"><?php echo __('Xem tất cả', 'dungnh');?></a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

get_footer();
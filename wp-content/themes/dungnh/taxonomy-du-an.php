<?php 


get_header();

$count = $GLOBALS['wp_query']->found_posts;
$description_ch = get_field('description_ch', 'options');
$currentterrm = get_queried_object();
$danh_muc_id = isset($_GET['danh-muc']) ? $_GET['danh-muc'] : '';

echo json_encode($danh_muc_id);
$args = array(
    'post_type' => 'can-ho', // Kiểu bài viết là 'can-ho'
    'hide_empty' => false,
    'tax_query' => array(
        'relation' => 'AND', // Chúng ta muốn tất cả điều kiện phải thỏa mãn
        array(
            'taxonomy' => 'danh-muc-can-ho', // Taxonomy là 'danh-muc-can-ho'
            'field' => 'slug', // Tìm theo ID
            'terms' => $danh_muc_id , // ID của danh mục là 1 (thay đổi nếu cần)
        ),
        array(
            'taxonomy' => 'du-an', // Taxonomy là 'du-an'
            'field' => 'term_id', // Tìm theo ID
            'terms' => $currentterrm->term_id, // ID của dự án là 17 (thay đổi nếu cần)
        ),
    ),
);
$can_ho_query = new WP_Query($args);
?>

<div id="main-can-ho">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block-heading text-center">
                    <p class="f18 color-1 fw700 uppercase mb-2"><?php echo $currentterrm->lable;?></p>
                    <h2 class="f50 color-main fw800 uppercase"><?php echo $currentterrm->name; ?></h2>
                    <!-- <p class="total-ch">Có tất cả <b><?php echo $count; ?> phòng</b> còn trống</p> -->
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php get_template_part('template-parts/search/search-can-ho');?>
            </div>
        </div>
    </div>
    <div class="container list-ch mb-5">
        <div class="row">
            <?php 
            if($can_ho_query->have_posts()) {       
                while($can_ho_query->have_posts()) {
                    $can_ho_query->the_post();
                    get_template_part('template-parts/content-can-ho-4');
                }
            }           
            wp_reset_postdata(  ); 
            ?>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="pagination">
                    <?php wp_bootstrap_pagination(); ?>
                </div>
            </div>
        </div>

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
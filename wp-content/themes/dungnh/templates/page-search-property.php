<?php 


/**
 * Template Name: Search Property
 */


get_header();

$description_ch = get_field('description_ch', 'options');


$args = array(
    'post_type' => 'property',
    'posts_per_page' => 12,
    'post_status' => 'publish',
);

$meta_query = array();
$tax_query = array();


if(!empty($_GET['citi'])) {
    $meta_query[] = array(
        'key'     => 'citi_field',
        'value'   => $_GET['citi'],
        'compare' => '=',
    );
}

if(!empty($_GET['ward'])) {
    $meta_query[] = array(
        'key'     => 'ward_field',
        'value'   => $_GET['ward'],
        'compare' => '=',
    );
}


if(!empty($_GET['min-price']) && !empty($_GET['max-price'])) {
    $meta_query[] = array(
        'key'     => 'price_regular_bds',
        'value'   => array($_GET['min-price'], $_GET['max-price']),
        'type'     => 'numeric',
        'compare' => 'BETWEEN',
    );
}else{
    if(!empty($_GET['min-price'])) {
        $meta_query[] = array(
            'key'     => 'price_regular_bds',
            'value'   => $_GET['min-price'],
            'type'     => 'numeric',
            'compare' => '>=',
        );
    }
    
    if(!empty($_GET['max-price'])) {
        $meta_query[] = array(
            'key'     => 'price_regular_bds',
            'value'   => $_GET['max-price'],
            'type'     => 'numeric',
            'compare' => '<=',
        );
    }
    
}

if(!empty($_GET['min-area']) && !empty($_GET['max-area'])) {
    $meta_query[] = array(
        'key'     => 'area_bds',
        'value'   => array($_GET['min-area'], $_GET['max-area']),
        'type'     => 'numeric',
        'compare' => 'BETWEEN',
    );
}else{

    if(!empty($_GET['min-area'])) {
        $meta_query[] = array(
            'key'     => 'area_bds',
            'value'   => $_GET['min-area'],
            'type'     => 'numeric',
            'compare' => '>=',
        );
    }
    
    if(!empty($_GET['max-area'])) {
        $meta_query[] = array(
            'key'     => 'area_bds',
            'value'   => $_GET['max-area'],
            'type'     => 'numeric',
            'compare' => '<=',
        );
    }
    
}

if(!empty($_GET['orderby']) && $_GET['orderby'] == 'desc') {
    $args['orderby'] = 'DATE';
    $args['order'] = 'DESC';
}

if(!empty($_GET['orderby']) && $_GET['orderby'] == 'asc') {
    $args['orderby'] = 'DATE';
    $args['order'] = 'ASC';
}

if(!empty($_GET['orderby']) && $_GET['orderby'] == 'price-desc') {
    $args['orderby'] = 'meta_value_num';
    $args['order'] = 'ASC';
    $args['meta_key'] = 'price_regular_bds';

}

if(!empty($_GET['orderby']) && $_GET['orderby'] == 'price-asc') {
    $args['orderby'] = 'meta_value_num';
    $args['order'] = 'DESC';
    $args['meta_key'] = 'price_regular_bds';
}


if(!empty($_GET['loaibds'])) {
    $tax_query[] = array(
        'taxonomy' => 'loai-bds',
        'fields' => 'term_id',
        'terms' => $_GET['loaibds']
    );
}

if(count($meta_query) > 0) {

    $args['meta_query'] = $meta_query;
    $args['meta_query']['relation'] = 'AND';
}

if(count($tax_query) > 0) {

    $args['tax_query'] = $tax_query;
    $args['tax_query']['relation'] = 'AND';
}

// echo '<pre style="display: none;">';
// print_r($args);
// echo '</pre>';
$querySearch = new WP_query($args);

?>

<div id="main-can-ho">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block-heading text-center">
                    <p class="f18 color-1 fw700 uppercase mb-2">CITY SPACE</p>
                    <h2 class="f50 color-main fw700 uppercase">MUA BÁN BẤT ĐỘNG SẢN</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php get_template_part('template-parts/search/search-property');?>
            </div>
        </div>
    </div>
    <div class="container list-ch mb-5">
        <div class="row">
            <?php 
            if($querySearch->have_posts()) {
                while($querySearch->have_posts()) {
                    $querySearch->the_post();
                    
                    get_template_part('template-parts/content-property-style1');
                }
            }else{
                echo '<div class="col-md-12"><h2 class="fw700 f50 text-center">Không có thông tin lọc phù hợp</h2></div>';
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
                    <a href="javascript:voild(0);" class="cta-more">Xem tất cả</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php


get_footer();
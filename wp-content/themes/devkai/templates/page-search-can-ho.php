<?php 


/**
 * Template Name: Search Căn hộ
 */


get_header();

$description_ch = get_field('description_ch', 'options');


$args = array(
    'post_type' => 'can-ho',
    'posts_per_page' => 12,
    'post_status' => 'publish',
);

if(!empty($_GET['keywork'])) {
    $args['s'] = $_GET['keywork'];
}

$meta_query = array();
$tax_query = array();


if(!empty($_GET['your-date-form']) && !empty($_GET['your-date-to'])) { 
    $date1 = str_replace('/', '-', $_GET['your-date-form']);
    $date2 = str_replace('/', '-', $_GET['your-date-to']);

    if(strtotime($date1) != strtotime($date2)) {
        $date_form = date('Y-m-d', strtotime($date1));
        $date_to = date('Y-m-d', strtotime($date2));
    
        $meta_query[] =    array(
            'key'     => 'time_date_form',
            'value'   => $date_form,
            'compare' => '<=',
            'type'    => 'DATE'
        ); 
        $meta_query[] =    array(
            'key'     => 'time_date_to',
            'value'   => $date_to,
            'compare' => '>=',
            'type'    => 'DATE'
        );
    }
}

if(!empty($_GET['daterange'])) {
    $date = explode(' - ', $_GET['daterange']);

    $date1 = str_replace('/', '-', $date[0]);
    $date2 = str_replace('/', '-', $date[1]);

    if(strtotime($date1) != strtotime($date2)) {
        $date_form = date('Y-m-d', strtotime($date1));
        $date_to = date('Y-m-d', strtotime($date2));
    
        $meta_query[] =    array(
            'key'     => 'time_date_form',
            'value'   => $date_form,
            'compare' => '<=',
            'type'    => 'DATE'
        ); 
        $meta_query[] =    array(
            'key'     => 'time_date_to',
            'value'   => $date_to,
            'compare' => '>=',
            'type'    => 'DATE'
        );
    }

}

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
        'key'     => 'price_regular',
        'value'   => array($_GET['min-price'], $_GET['max-price']),
        'type'     => 'numeric',
        'compare' => 'BETWEEN',
    );
    $meta_query[] = array(
        'key'     => 'price_sale',
        'value'   => array($_GET['min-price'], $_GET['max-price']),
        'type'     => 'numeric',
        'compare' => 'BETWEEN',
    );
}else{
    if(!empty($_GET['min-price'])) {
        $meta_query[] = array(
            'key'     => 'price_regular',
            'value'   => $_GET['min-price'],
            'type'     => 'numeric',
            'compare' => '>=',
        );
        $meta_query[] = array(
            'key'     => 'price_sale',
            'value'   => $_GET['min-price'],
            'compare' => '>=',
        );
    }
    
    
    if(!empty($_GET['max-price'])) {
        $meta_query[] = array(
            'key'     => 'price_regular',
            'value'   => $_GET['max-price'],
            'type'     => 'numeric',
            'compare' => '<=',
        );
        $meta_query[] = array(
            'key'     => 'price_sale',
            'value'   => $_GET['max-price'],
            'compare' => '<=',
        );
    }
    
}


$category = '';

if(!empty($_GET['loaibds'])) {
    $category = get_term_by('id', $_GET['loaibds'], 'danh-muc-can-ho');
    $tax_query[] = array(
        'taxonomy' => 'danh-muc-can-ho',
        'fields' => 'term_id',
        'terms' => $_GET['loaibds']
    );
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
    $args['meta_key'] = 'price_regular';
}

if(!empty($_GET['orderby']) && $_GET['orderby'] == 'price-asc') {
    $args['orderby'] = 'meta_value_num';
    $args['order'] = 'DESC';
    $args['meta_key'] = 'price_regular';
}


if(count($meta_query) > 0) {
    $args['meta_query']['relation'] = 'AND';
    $args['meta_query'] = $meta_query;
}

if(count($tax_query) > 0) {
    $args['tax_query']['relation'] = 'AND';
    $args['tax_query'] = $tax_query;
}

$querySearch = new WP_query($args);
// echo '<pre style="display: none;">';
// print_r($querySearch);
// echo '</pre>';
?>

<div id="main-can-ho">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block-heading text-center">
                    <p class="f18 color-1 fw700 uppercase mb-2">CHO THUÊ NGẮN HẠN</p>
                    <h2 class="f50 color-main fw700 uppercase"><?php echo (!empty($category)) ? $category->name: 'CĂN HỘ CHO THUÊ'; ?></h2>
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
            if($querySearch->have_posts()) {
                while($querySearch->have_posts()) {
                    $querySearch->the_post();
                    
                    get_template_part('template-parts/content-can-ho-4');
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
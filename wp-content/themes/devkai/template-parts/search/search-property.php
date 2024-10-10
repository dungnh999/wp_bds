<?php 

global $wpdb;
global $wp;

$cities = "SELECT * FROM `province`";
$results = $wpdb->get_results($cities);
$currentTerm = get_queried_object();

$labelWard = '';
if(!empty($_GET['citi'])) {
    $ward = "SELECT * FROM `district` WHERE _province_id = " . $_GET['citi'];
	$results_wards = $wpdb->get_results($ward);
    if(!empty($_GET['ward'])) {
        foreach($results_wards as $ward) {
            if($ward->id == $_GET['ward']) {
                $labelWard = $ward->_name;
            }
        }
    }
}

// echo '<pre>';print_r($results);echo '</pre>';

$loaibds = get_terms(array(
    'taxonomy' => 'loai-bds',
    'hide_empty' => false,
));


$huongbds = get_terms(array(
    'taxonomy' => 'huong-nha',
    'hide_empty' => false,
));

$citiID = (!empty($_GET['citi'])) ? $_GET['citi'] : '';
$wardID = (!empty($_GET['ward'])) ? $_GET['ward'] : '';



$labelSort = array(
    'desc' => __('New' ,'devkai'),
    'asc' => __('Most view', 'devkai'),
    'price-desc' => __('Price from low to high', 'devkai'),
    'price-asc' => __('Price from high to low', 'devkai')
);
$current_url = home_url($_SERVER['REQUEST_URI']);
$current_url = trim(strtok($current_url, '?'));

if(is_tax('loai-bds')) {
    $current_url = get_term_link($currentTerm->term_id, $currentTerm->taxonomy);
}

$filter_price_bds = get_field('filter_price_bds', 'options');

?>

<div class="main-search-property">
    <div class="inner-search">
        <div class="sortby">
            <div class="label-sortby">
                <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                <path d="M0.109375 2.78809L15.7465 2.78809M3.2368 8.00045L12.6191 8.00045M5.32174 13.2128L10.5341 13.2128" stroke="#C3912C" stroke-width="1.5"/>
                </svg><?php echo (!empty($_GET['orderby'])) ? $labelSort[$_GET['orderby']] : 'Sắp xếp theo'; ?></span>

                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                </svg>
            </div>
            <div class="filter-dropdown-sortby">
                <div class="inner-dropdown-sortby">
                    <div class="item-short">
                        <a href="<?php echo add_query_arg( array('orderby' => 'desc'), $current_url ); ?>"><?php echo __('New' ,'devkai');?></a>
                    </div>
                    <div class="item-short">
                        <a href="<?php echo add_query_arg( array('orderby' => 'asc'), $current_url ); ?>"><?php echo __('Most view', 'devkai'); ?></a>
                    </div>
                    <div class="item-short">
                        <a href="<?php echo add_query_arg( array('orderby' => 'price-desc'), $current_url ); ?>"><?php echo __('Price from low to high', 'devkai'); ?></a>
                    </div>
                    <div class="item-short">
                        <a href="<?php echo add_query_arg( array('orderby' => 'price-asc'), $current_url ); ?>"><?php echo __('Price from high to low', 'devkai'); ?></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="button-filter"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel" viewBox="0 0 16 16">
        <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2h-11z"/>
        </svg> <?php echo __("Filter", 'devkai');?></div>
        <div class="form-group-search">
            <form id="form-property" action="<?php echo $current_url; ?>" method="GET" enctype="multipart/form-data">
                <div class="inner-form-group-search">
                    <div class="filter-input filter-input-kv">
                        <div class="filter-input-label"><?php echo (!empty($labelWard)) ? $labelWard : __('Locations', 'devkai'); ?> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                        </svg></div>

                        <div class="filter-dropdown-content">
                            <div class="inner-filter-dropdown">
                                <div class="inner-filter-kv-content">
                                <div class="citi-field <?php echo !empty($_GET['citi']) ? 'hide' : ''; ?>">
                                    <?php 
                                    if(!empty($results)) {
                                        foreach($results as $citi) {
                                            echo '<div class="item-citi" data-id="'.$citi->id.'">'.$citi->_name.' <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                        </svg></div>';
                                        }
                                    }
                                    ?>
                                </div>

                                <div class="ward-field <?php echo !empty($_GET['citi']) ? 'show' : ''; ?>">
                                    <?php
                                    if(!empty($_GET['citi'])) {
                                        echo '<div class="item-citi item-back"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                                        </svg> Trở lại</div>';
                                    }
                                    
                                    ?>
                                    <?php 
                                    if(!empty($results_wards)) {
                                        foreach($results_wards as $ward) {
                                            echo '<div class="item-citi" data-id="'.$ward->id.'">'.$ward->_name.' <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                            </svg></div>';
                                        }
                                    }?>
                                </div>

                                </div>

                                <a href="javascript:;" class="btn-submit-kv"><?php echo __('Apply', 'devkai'); ?></a>
                            </div>

                            <input type="hidden" name="citi" value="<?php echo !empty($_GET['citi']) ? $_GET['citi'] : ''; ?>">
                            <input type="hidden" name="ward" value="<?php echo !empty($_GET['ward']) ? $_GET['ward'] : ''; ?>">


                            <div class="loading-location">
                                <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
                            </div>
                        </div>
                    </div>

                    <div class="filter-input">
                        <div class="filter-input-label"><?php echo (!empty($_GET['loaibds'])) ?  get_term_by('id', $_GET['loaibds'], 'loai-bds')->name : __('Type Property', 'devkai'); ?> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                        </svg></div>
                        <div class="filter-dropdown-content">
                            <div class="inner-filter-dropdown">
                                <div class="loaibds-field">
                                    <?php 
                                    if(!empty($loaibds)) {
                                        echo '<div class="item-loaibdsitem" data-id=""><span class="check"></span><a href="https://cityspace.vn/property/">Chọn tất cả</a></div>';
                                        foreach($loaibds as $loaibdsitem) {
                                            if(!empty($_GET['loaibds']) && $_GET['loaibds'] == $loaibdsitem->term_id || $currentTerm->term_id == $loaibdsitem->term_id) {
                                                echo '<div class="item-loaibdsitem active" data-id="'.$loaibdsitem->term_id.'"><span class="check"></span><a href="'.get_term_link($loaibdsitem->term_id, $loaibdsitem->taxonomy).'">'.$loaibdsitem->name.'</a></div>';
                                            }else{
                                                echo '<div class="item-loaibdsitem" data-id="'.$loaibdsitem->term_id.'"><span class="check"></span><a href="'.get_term_link($loaibdsitem->term_id, $loaibdsitem->taxonomy).'">'.$loaibdsitem->name.'</a></div>';
                                            }

                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <input type="hidden" name="loaibds" value="<?php echo !empty($_GET['loaibds']) ? $_GET['loaibds'] : ''; ?>">
                        </div>
                    </div>

                    <div class="filter-input">
                        <div class="filter-input-label"><?php 
                                if ( !empty($_GET['min-price']) && !empty($_GET['max-price']) ) {
                                    echo number_format($_GET['min-price'] , 0,",",".") . ' - ' . number_format($_GET['max-price'] , 0,",",".");
                                } elseif(!empty($_GET['min-price'])) {
                                    echo __('Up ', 'devkai') . number_format($_GET['min-price'] , 0,",",".");
                                } elseif(!empty($_GET['max-price'])) {
                                    echo __('Down ', 'devkai') . number_format($_GET['max-price'] , 0,",",".");
                                } else {
                                    echo __('Price', 'devkai');
                                }
                            ?>  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                        </svg></div>
                        <div class="filter-dropdown-content price-property dropdown-content-price">
                            <div class="inner-filter-dropdown">
                                <div class="price-filter-field">
                                <div class="panel-filter-price">
                                        <div class="top-price-input">
                                            <div class="col-price">
                                                <span class="f16 fw700"><?php echo __('Enter price from', 'devkai'); ?></span>
                                                <input type="text" class="price-min-input price-input" value="<?php echo !empty($_GET['min-price']) ? $_GET['min-price'] : '0'; ?>">
                                                <input type="hidden" name="min-price" value="<?php echo !empty($_GET['min-price']) ? $_GET['min-price'] : ''; ?>">
                                            </div>

                                            <div class="col-price">
                                                <span class="f16 fw700"><?php echo __('To', 'devkai'); ?></span>
                                                <input type="text" class="price-max-input price-input" value="<?php echo !empty($_GET['max-price']) ? $_GET['max-price'] : '0'; ?>">
                                                <input type="hidden" name="max-price" value="<?php echo !empty($_GET['max-price']) ? $_GET['max-price'] : ''; ?>">
                                            </div>
                                        </div>
                                        <div class="bottom-price-input">
                                            <?php 
                                            if(!empty($filter_price_bds)) {
                                                foreach($filter_price_bds as $price) {
                                                    ?>
                                                    <div class="item-price" data-min="<?php echo $price['min_value']; ?>" data-max="<?php echo $price['max_value']; ?>">
                                                        <span><?php echo $price['label_filter']; ?></span>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            
                                            ?>
                                        </div>
                                        <div class="apply-search">
                                            <a href="javascript:voild(0);" class="cta-submit"><?php echo __('Apply', 'devkai'); ?></a>
                                        </div>
                                </div>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>

                    <div class="filter-input">
                        <div class="filter-input-label"><?php 
                                if ( !empty($_GET['min-area']) && !empty($_GET['max-area']) ) {
                                    echo $_GET['min-area'] . ' - ' . $_GET['max-area'];
                                } else {
                                    echo __('Area', 'devkai');
                                }
                            ?> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                        </svg></div>
                        <div class="filter-dropdown-content dropdown-content-area">
                            <div class="inner-filter-dropdown">
                                <div class="price-filter-field">
                                <div class="panel-area">
                                        <span class="f16 fw700"><?php echo __('Area', 'devkai');?></span>
                                        <div class="top-area-input">
                                            <div class="col-area">
                                                <input type="number" name="min-area" placeholder="Từ" value="<?php echo !empty($_GET['min-area']) ? $_GET['min-area'] : ''; ?>">
                                                <div class="label-area">m<sup>2</sup></div>
                                            </div>

                                            <div class="col-area">
                                                <input type="number" name="max-area" placeholder="Đến" value="<?php echo !empty($_GET['max-area']) ? $_GET['max-area'] : ''; ?>">
                                                <div class="label-area">m<sup>2</sup></div>
                                            </div>
                                        </div>
                                        <div class="apply-search">
                                            <a href="javascript:voild(0);" class="cta-submit"><?php echo __('Apply', 'devkai'); ?></a>
                                        </div>
                                </div>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                    <a href="<?php echo $current_url; ?>" class="btn-reload-search" title="Xóa bộ lọc"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                    <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                    </svg></a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php

define('THEME_URI', get_template_directory_uri() . '/functions');
define('THEME_URL', dirname(__FILE__) );


require_once( get_template_directory() . '/functions/posts_type.php' );
require_once( THEME_URL . '/widgets/social-widget.php' ); 

add_action('admin_head', 'dev_custom_style_admin');

function dev_custom_style_admin() {
  echo '<style>
  	.acf-label > label {
		font-size: 20px;
		background: #f6f6f6;
		padding: 5px 20px !important;
		margin-bottom: 10px !important;
	}

	.acf-label > .description {
		color: red;
		font-size: 18px;
	}
  </style>';
}

/**
 * Enqueue scripts and styles.
 */
function dev_scripts() {
	wp_enqueue_style('bootstrap', THEME_URI . "/css/bootstrap.css");
	wp_enqueue_style('fonts', THEME_URI . "/fonts/stylesheet.css");
	wp_enqueue_style('frontend', THEME_URI . "/css/frontend.css");

	// wp_enqueue_script( 'dungnh-navigation', THEME_URI . '/js/navigation.js', '', '', true );

	wp_enqueue_script( 'jquery' );

	wp_enqueue_script('cleave', THEME_URI . "/js/cleave.js", '', '', true);
	wp_enqueue_script('frontend', THEME_URI . "/js/frontend.js", '', '', true);
	wp_localize_script( 'frontend', 'dev_ajax',
		array( 
			'ajax_url' => admin_url( 'admin-ajax.php' ),
		)
	);
}
add_action('wp_enqueue_scripts', 'dev_scripts');

function dev_translate_text($vi, $en)
{
	global $sitepress;
	$lang = $sitepress->get_current_language();
	//var_dumps($lang);
	$text = '';
	if ($lang == 'vi') {
		$text = $vi;
	} elseif ($lang == 'en') {
		$text = $en;
	}
	return $text;
}

// WPML MENU
function menu_wpml(){
    if (function_exists('icl_get_languages')) {
        $languages = icl_get_languages('skip_missing=0');
        if(1 < count($languages)){
			$items ='';
            foreach($languages as $l){
				$class ='';
				if(ICL_LANGUAGE_CODE == $l['language_code']) $class ='current';
                $items = $items.'<li class="menu-item-'.$l['language_code'].' '.$class.'"><a href="'. $l['url'].'"><img src="'.$l['country_flag_url'].'" alt="'.$l['code'].'" /></a></li>';
            }
        }
    }
    echo  '<ul class="menu_wpml">'.$items.'</ul>';
}

/*
 * Breadcrumbs
*/

function dimox_breadcrumbs()
{

	/* === OPTIONS === */
	$text['home']     = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
	<path d="M9.87454 14.2491V10.4991C9.87454 10.3333 9.80869 10.1743 9.69148 10.0571C9.57427 9.9399 9.4153 9.87405 9.24954 9.87405H6.74954C6.58378 9.87405 6.42481 9.9399 6.3076 10.0571C6.19039 10.1743 6.12454 10.3333 6.12454 10.4991V14.2491C6.12454 14.4149 6.0587 14.5738 5.94151 14.691C5.82432 14.8083 5.66537 14.8741 5.49962 14.8741L1.75008 14.8746C1.668 14.8746 1.58671 14.8585 1.51088 14.8271C1.43504 14.7957 1.36613 14.7496 1.30809 14.6916C1.25004 14.6336 1.204 14.5647 1.17258 14.4888C1.14117 14.413 1.125 14.3317 1.125 14.2496V7.02615C1.125 6.93908 1.14319 6.85297 1.17842 6.77333C1.21364 6.6937 1.26511 6.62231 1.32954 6.56373L7.57911 0.881324C7.69415 0.77672 7.84406 0.718755 7.99955 0.71875C8.15504 0.718745 8.30495 0.7767 8.42 0.881296L14.6704 6.56373C14.7349 6.6223 14.7863 6.6937 14.8216 6.77334C14.8568 6.85298 14.875 6.9391 14.875 7.02618V14.2496C14.875 14.3317 14.8588 14.413 14.8274 14.4888C14.796 14.5647 14.75 14.6336 14.6919 14.6916C14.6339 14.7496 14.565 14.7957 14.4891 14.8271C14.4133 14.8585 14.332 14.8746 14.2499 14.8746L10.4995 14.8741C10.3337 14.8741 10.1748 14.8083 10.0576 14.691C9.94038 14.5738 9.87454 14.4149 9.87454 14.2491V14.2491Z" stroke="#666666" stroke-linecap="round" stroke-linejoin="round"/>
	</svg>'; // text for the 'Home' link
	$text['category'] = '%s'; // text for a category page
	$text['search']   = 'Kết quả tìm kiếm "%s"'; // text for a search results page
	$text['tag']      = 'Posts Tagged "%s"'; // text for a tag page
	$text['author']   = 'Articles Posted by %s'; // text for an author page
	$text['404']      = 'Error 404'; // text for the 404 page

	$show_current   = 1; // 1 - show current post/page/category title in breadcrumbs, 0 - don't show
	$show_on_home   = 1; // 1 - show breadcrumbs on the homepage, 0 - don't show
	$show_home_link = 1; // 1 - show the 'Home' link, 0 - don't show
	$show_title     = 1; // 1 - show the title for the links, 0 - don't show
	$delimiter      = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
	<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
  </svg>'; // delimiter between crumbs
	$before         = '<li typeof="v:Breadcrumb" class="active"><a>'; // tag before the current crumb
	$after          = '</a></li>'; // tag after the current crumb
	/* === END OF OPTIONS === */

	global $post;
	$home_link    = home_url('/');
	$link_before  = '<li typeof="v:Breadcrumb">';
	$link_after   = '</li>';
	$link_attr    = ' rel="v:url" property="v:title"';
	$link         = $link_before . '<a' . $link_attr . ' href="%1$s">%2$s</a>' . $link_after;
	$parent_id    = $parent_id_2 = $post->post_parent;
	$frontpage_id = get_option('page_on_front');


	$wp_the_query   = $GLOBALS['wp_the_query'];
    $queried_object = $wp_the_query->get_queried_object();


	if (is_home() || is_front_page()) {
		echo '<ol id="breadcrumbs" class="breadcrumb hidden-xs" xmlns:v="http://rdf.data-vocabulary.org/#">';
		if ($show_home_link == 1) {
			echo $link_before . '<a href="' . $home_link . '" rel="v:url" property="v:title">' . $text['home'] . '</a>' . $link_after;
			if ($frontpage_id == 0 || $parent_id != $frontpage_id) echo $delimiter;
		}
		echo $link_before . '<a href="' . $home_link . '" rel="v:url" property="v:title">Tin tức</a>' . $link_after;
		echo '</ol>';
	} else {

		echo '<ol id="breadcrumbs" class="breadcrumb hidden-xs" xmlns:v="http://rdf.data-vocabulary.org/#">';
		if ($show_home_link == 1) {
			echo $link_before . '<a href="' . $home_link . '" rel="v:url" property="v:title">' . $text['home'] . '</a>' . $link_after;
			if ($frontpage_id == 0 || $parent_id != $frontpage_id) echo $delimiter;
		}

		if (is_category()) {
			$this_cat = get_category(get_query_var('cat'), false);
			if ($this_cat->parent != 0) {
				$cats = get_category_parents($this_cat->parent, TRUE, $delimiter);
				if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
				$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
				$cats = str_replace('</a>', '</a>' . $link_after, $cats);
				if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
				echo $cats;
			}
			if ($show_current == 1) echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;
		} elseif(is_tax()) {
		   // Set the variables for this section
		   $term_object        = get_term( $queried_object );
		   $taxonomy           = $term_object->taxonomy;
		   $term_id            = $term_object->term_id;
		   $term_name          = $term_object->name;
		   $term_parent        = $term_object->parent;
		   $taxonomy_object    = get_taxonomy( $taxonomy );
		   $post_name = get_post_type_object($taxonomy_object->object_type[0]);

		   $current_term_link  = $before . '<a href="'.get_post_type_archive_link($post_name->name).'">' . $post_name->label . '</a>' . $after . $delimiter;
		   $parent_term_string = '';

			if(!empty($current_term_link)) {
				echo sprintf( $link, esc_url( get_post_type_archive_link($post_name->name) ), $post_name->label ) . $delimiter;
			}

			if ( 0 !== $term_parent ) {
				// Get all the current term ancestors
					$parent_term_links = [];
					while ( $term_parent ) {
							$term = get_term( $term_parent, $taxonomy );
							$parent_term_links[] = sprintf( $link, esc_url( get_term_link( $term ) ), $term->name );
							$term_parent = $term->parent;
					}
					$parent_term_links  = array_reverse( $parent_term_links );
					$parent_term_string = implode( $delimiter, $parent_term_links );

			}

		   	if ( $parent_term_string ) {
				echo $parent_term_string . $delimiter;
			}

			if ($show_current == 1) echo $before . '<a href="'.get_term_link( $term_object ) .'">' . $term_name . '</a>' . $after;
			

		} elseif (is_search()) {
			echo $before . sprintf($text['search'], get_search_query()) . $after;
		} elseif (is_day()) {
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
			echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F')) . $delimiter;
			echo $before . get_the_time('d') . $after;
		} elseif (is_month()) {
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
			echo $before . get_the_time('F') . $after;
		} elseif (is_year()) {
			echo $before . get_the_time('Y') . $after;
		} elseif (is_single() && !is_attachment()) {
			if (get_post_type() != 'post') {
				$parent_term_string = '';
				if(is_singular( 'can-ho' )) {
					$rd_taxonomy = 'danh-muc-can-ho'; // region taxonomy
				}elseif(is_singular( 'property' )) {
					$rd_taxonomy = 'loai-bds'; // region taxonomy
				}
				
				$rd_terms = wp_get_post_terms( $post->ID, $rd_taxonomy, array( "fields" => "ids" ) ); // getting the term IDs

				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				if ( $position > 1 ) echo $sep;
				echo sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->labels->name, $position ) . $delimiter;

				if( $rd_terms ) {
					$term_array = trim( implode( ',', (array) $rd_terms ), ' ,' );
					$neworderterms = get_terms($rd_taxonomy, 'orderby=none&include=' . $term_array );
					foreach( $neworderterms as $orderterm ) {
						$parent_term_links[] = sprintf( $link, esc_url( get_term_link( $orderterm ) ), $orderterm->name );
					}

					$parent_term_links  = array_reverse( $parent_term_links );
					$parent_term_string = implode( $delimiter, $parent_term_links );
				}

				if ( $parent_term_string ) {
					echo $parent_term_string . $delimiter;
				}

				if ($show_current) echo $sep . $before . get_the_title() . $after;
				elseif ($show_last_sep) echo $sep;

			} else {
				$cat = get_the_category();
				$cat = $cat[0];
				$cats = get_category_parents($cat, TRUE, $delimiter);
				if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
				$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
				$cats = str_replace('</a>', '</a>' . $link_after, $cats);
				if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
				echo $cats;
				if ($show_current == 1) echo $before . get_the_title() . $after;
			}
		} elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
			$post_type = get_post_type_object(get_post_type());
			echo $before . $post_type->labels->singular_name . $after;
		} elseif (is_attachment()) {
			$parent = get_post($parent_id);
			$cat = get_the_category($parent->ID);
			$cat = $cat[0];
			$cats = get_category_parents($cat, TRUE, $delimiter);
			$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
			$cats = str_replace('</a>', '</a>' . $link_after, $cats);
			if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
			echo $cats;
			printf($link, get_permalink($parent), $parent->post_title);
			if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;
		} elseif (is_page() && !$parent_id) {
			if ($show_current == 1) echo $before . get_the_title() . $after;
		} elseif (is_page() && $parent_id) {
			if ($parent_id != $frontpage_id) {
				$breadcrumbs = array();
				while ($parent_id) {
					$page = get_page($parent_id);
					if ($parent_id != $frontpage_id) {
						$breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
					}
					$parent_id = $page->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				for ($i = 0; $i < count($breadcrumbs); $i++) {
					echo $breadcrumbs[$i];
					if ($i != count($breadcrumbs) - 1) echo $delimiter;
				}
			}
			if ($show_current == 1) {
				if ($show_home_link == 1 || ($parent_id_2 != 0 && $parent_id_2 != $frontpage_id)) echo $delimiter;
				echo $before . get_the_title() . $after;
			}
		} elseif (is_tag()) {
			echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
		} elseif (is_author()) {
			global $author;
			$userdata = get_userdata($author);
			echo $before . sprintf($text['author'], $userdata->display_name) . $after;
		} elseif (is_404()) {
			echo $before . $text['404'] . $after;
		}

		if (get_query_var('paged')) {
			if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) echo ' (';
			echo __('Page') . ' ' . get_query_var('paged');
			if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) echo ')';
		}

		echo '</ol><!-- .breadcrumbs -->';
	}
} // end dimox_breadcrumbs()



function socialshare()
{

?>
	<div class="social-share-bar">

		<a class="icon-Brenntag_share_icons_facebook" title="Facebook" href="http://www.facebook.com/sharer.php?u=
		<?php echo get_permalink(); ?>
	&amp;t=" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
<path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke="#272D35" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M15.75 8.25H14.25C13.6533 8.25 13.081 8.48705 12.659 8.90901C12.2371 9.33097 12 9.90326 12 10.5V21" stroke="#272D35" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M9 13.5H15" stroke="#272D35" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></a>
		<a class="icon-Brenntag_share_icons_twitter" title="Twitter" href="https://twitter.com/intent/tweet?url=
		<?php echo get_permalink(); ?>
	&amp;text=" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
<path d="M22.5006 5.68726C21.6841 6.85618 20.6655 7.8699 19.4926 8.68066L19.4926 8.68065C19.4183 10.731 18.8198 12.7282 17.7541 14.4814C16.6884 16.2347 15.1911 17.6855 13.4052 18.6955C11.6192 19.7054 9.60418 20.2407 7.55247 20.2502C5.50076 20.2598 3.48084 19.7433 1.68555 18.75L1.68616 18.7489C4.03051 18.7165 6.31343 17.9946 8.25024 16.6732L8.25016 16.6734C6.17689 15.2603 4.59782 13.2338 3.73433 10.878C2.87084 8.52226 2.76623 5.95533 3.43517 3.53711L3.43513 3.53713C4.39323 5.01262 5.66407 6.25938 7.15762 7.18907C8.65117 8.11876 10.3309 8.70864 12.0778 8.91693L12.0775 8.91698C11.8936 8.04005 12.0296 7.12624 12.461 6.34092C12.8924 5.5556 13.5907 4.95066 14.4295 4.63559C15.2683 4.32052 16.1922 4.31613 17.034 4.62322C17.8757 4.93031 18.5797 5.52858 19.0186 6.30976L19.0186 6.31018C20.2036 6.27481 21.3769 6.06492 22.5006 5.68726" stroke="#272D35" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></a>
<a class="icon-Brenntag_share_icons_linked_in" title="Linkedin" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=
		<?php echo get_permalink(); ?>
	&amp;title=&amp;ro=false&amp;summary=&amp;source=" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
<path d="M19.5 3.75H4.5C4.08579 3.75 3.75 4.08579 3.75 4.5V19.5C3.75 19.9142 4.08579 20.25 4.5 20.25H19.5C19.9142 20.25 20.25 19.9142 20.25 19.5V4.5C20.25 4.08579 19.9142 3.75 19.5 3.75Z" stroke="#272D35" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M11.25 10.5V16.5" stroke="#272D35" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M8.25 10.5V16.5" stroke="#272D35" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M8.25 8.34375C8.71599 8.34375 9.09375 7.96599 9.09375 7.5C9.09375 7.03401 8.71599 6.65625 8.25 6.65625C7.78401 6.65625 7.40625 7.03401 7.40625 7.5C7.40625 7.96599 7.78401 8.34375 8.25 8.34375Z" fill="#272D35"/>
<path d="M11.25 13.125C11.25 12.4288 11.5266 11.7611 12.0188 11.2688C12.5111 10.7766 13.1788 10.5 13.875 10.5C14.5712 10.5 15.2389 10.7766 15.7312 11.2688C16.2234 11.7611 16.5 12.4288 16.5 13.125V16.5" stroke="#272D35" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></a>
	</div>
<?php
}


// change class sub menu wp
class submenu_wrap extends Walker_Nav_Menu
{
	function start_lvl(&$output, $depth = 0, $args = array())
	{
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<div class='main-dropdown-menu'><ul class='second-level'>\n";
	}
	function end_lvl(&$output, $depth = 0, $args = array())
	{
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul></div>\n";
	}
}




/**
 * WordPress Bootstrap Pagination
 */

function wp_bootstrap_pagination( $args = array() ) {
    
    $defaults = array(
        'range'           => 4,
        'custom_query'    => FALSE,
        'previous_string' => __( '<svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-left" class="svg-inline--fa fa-chevron-left fa-w-10" role="img" viewBox="0 0 320 512"><path fill="currentColor" d="M34.52 239.03L228.87 44.69c9.37-9.37 24.57-9.37 33.94 0l22.67 22.67c9.36 9.36 9.37 24.52.04 33.9L131.49 256l154.02 154.75c9.34 9.38 9.32 24.54-.04 33.9l-22.67 22.67c-9.37 9.37-24.57 9.37-33.94 0L34.52 272.97c-9.37-9.37-9.37-24.57 0-33.94z"/></svg> Trước', 'dungnh' ),
        'next_string'     => __( 'Sau <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" class="svg-inline--fa fa-chevron-right fa-w-10" role="img" viewBox="0 0 320 512"><path fill="currentColor" d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>', 'dungnh' ),
        'before_output'   => '<div class="paginatoin-area mb-5 mt-5"><ul class="pagination-box">',
        'after_output'    => '</ul></div>'
    );
    
    $args = wp_parse_args( 
        $args, 
        apply_filters( 'wp_bootstrap_pagination_defaults', $defaults )
    );
    
    $args['range'] = (int) $args['range'] - 1;
    if ( !$args['custom_query'] )
        $args['custom_query'] = @$GLOBALS['wp_query'];
    $count = (int) $args['custom_query']->max_num_pages;
    $page  = intval( get_query_var( 'paged' ) );
    $ceil  = ceil( $args['range'] / 2 );
    
    if ( $count <= 1 )
        return FALSE;
    
    if ( !$page )
        $page = 1;
    
    if ( $count > $args['range'] ) {
        if ( $page <= $args['range'] ) {
            $min = 1;
            $max = $args['range'] + 1;
        } elseif ( $page >= ($count - $ceil) ) {
            $min = $count - $args['range'];
            $max = $count;
        } elseif ( $page >= $args['range'] && $page < ($count - $ceil) ) {
            $min = $page - $ceil;
            $max = $page + $ceil;
        }
    } else {
        $min = 1;
        $max = $count;
    }
    
    $echo = '';
    $previous = intval($page) - 1;
    $previous = esc_attr( get_pagenum_link($previous) );
    
    $firstpage = esc_attr( get_pagenum_link(1) );
    if ( $firstpage && (1 != $page) )
        $echo .= '<li class="previous navi-prev"><a href="' . $firstpage . '">' . $args['previous_string'] . '</a></li>';

    if ( !empty($min) && !empty($max) ) {
        for( $i = $min; $i <= $max; $i++ ) {
            if ($page == $i) {
                $echo .= '<li class="active"><span class="active">' . $i . '</span></li>';
            } else {
                $echo .= sprintf( '<li><a href="%s">%d</a></li>', esc_attr( get_pagenum_link($i) ), $i );
            }
        }
    }
    
    $next = intval($page) + 1;
    $next = esc_attr( get_pagenum_link($next) );
    if ($next && ($count != $page) )
        $echo .= '<li class="navi-next"><a href="' . $next . '" title="' . __( '›', 'dungnh') . '">' . $args['next_string'] . '</a></li>';
    
    $lastpage = esc_attr( get_pagenum_link($count) );

    if ( isset($echo) )
        echo $args['before_output'] . $echo . $args['after_output'];
}




if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Tùy chỉnh Căn hộ',
        'menu_title'    => 'Tùy chỉnh Căn hộ',
        'parent_slug'   => 'edit.php?post_type=can-ho',
    ));

}




add_action('wp_ajax_get_ward', 'get_ward_func');
add_action('wp_ajax_nopriv_get_ward', 'get_ward_func');

function get_ward_func() {
	$CitiID = $_POST['CitiID'] ? $_POST['CitiID'] : 0;

	global $wpdb;

	$ward = "SELECT * FROM `district` WHERE _province_id = " . $CitiID;
	$results = $wpdb->get_results($ward);

    if(!empty($results)) {
		echo '<div class="item-citi item-back"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
		<path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
	  	</svg> Trở lại</div>';
        foreach($results as $ward) {
        	echo '<div class="item-citi" data-id="'.$ward->id.'">'.$ward->_name.' <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
            </svg></div>';
        }
    }

	die();
}



add_action('wp_ajax_get_ward_admin', 'get_ward_admin_func');
add_action('wp_ajax_nopriv_get_ward_admin', 'get_ward_admin_func');

function get_ward_admin_func() {
	$CitiID = $_GET['CitiID'] ? $_GET['CitiID'] : 0;

	global $wpdb;

	$ward = "SELECT * FROM `district` WHERE _province_id = " . $CitiID;
	$results = $wpdb->get_results($ward);

    if(!empty($results)) {
        foreach($results as $ward) {
			echo '<option value="' . $ward->id . '">' . $ward->_name . '</option>';
        }
    }

	die();
}








/**
 * Custom Box Project
 */

function dungnh_metabox_project()
{
    $screens = ['property', 'can-ho'];
    foreach ($screens as $screen) {
        add_meta_box(
            'dungnh_box_project',
            'Thông tin BĐS',
            'dungnh_render_box_project',
            $screen,
            'side',
            'high'
        );
    }
}
add_action('add_meta_boxes', 'dungnh_metabox_project');


// show custom field bds
function dungnh_render_box_project($post)
{
    global $wpdb;
	$cities = "SELECT * FROM `province`";
	$results = $wpdb->get_results($cities);
    $cities = $wpdb->get_results('SELECT * FROM `devvn_tinhthanhpho`');

    $citi_field = get_post_meta($post->ID, 'citi_field', true);
    $ward_field = get_post_meta($post->ID, 'ward_field', true);

    if ($citi_field) {
        $quanhuyen = $wpdb->get_results('SELECT * FROM `devvn_quanhuyen` WHERE matp=' . $city_field . '');
    }

	if(!empty($citi_field)) {
		$ward = "SELECT * FROM `district` WHERE _province_id = " . $citi_field;
		$results_wards = $wpdb->get_results($ward);
	}



?>
    <div class="box-bds">
        <label for="citi_field" style="display: block;margin-bottom: 10px;">Tỉnh / Thành</label>
        <select name="citi_field" id="citi_field">
            <option value="">Chọn tỉnh / thành</option>
            <?php
            //if($city_field) {
            foreach ($results as $citi) {
                if ($citi_field == $citi->id) {
                    echo '<option value="' . $citi->id . '" selected>' . $citi->_name . '</option>';
                } else {
                    echo '<option value="' . $citi->id . '">' . $citi->_name . '</option>';
                }
            }
            //}

            ?>
        </select>

        <label for="ward_field" style="display: block;margin-bottom: 10px;">Quận / huyện</label>
        <select name="ward_field" id="ward_field">
            <option value="">Chọn quận / huyện</option>
            <?php
            if ($citi_field) {
                foreach ($results_wards as $results_wards_item) {
                    if ($ward_field == $results_wards_item->id) {
                        echo '<option value="' . $results_wards_item->id . '" selected>' . $results_wards_item->_name . '</option>';
                    } else {
                        echo '<option value="' . $results_wards_item->id . '">' . $results_wards_item->_name . '</option>';
                    }
                }
            }
            ?>
        </select>
    </div>

    <script>
        jQuery(document).ready(function() {
            var listid = [];
            var listtitle = [];
            jQuery('#citi_field').change(function() {
                var idparent = jQuery(this).val();
                listid[0] = idparent;
                listtitle[0] = jQuery("#citi_field option:selected").text();
                if (idparent != '') {
                    jQuery.get('<?php echo admin_url('admin-ajax.php'); ?>?action=get_ward_admin&CitiID=' + idparent, function(data) {
                        if (jQuery('#ward_field').length) {
                            jQuery('#ward_field').html(data).prop('disabled', false);
                        }
                    });
                } else {
                    jQuery('#ward_field').html('<option value="">Vui lòng chọn</option>').prop('disabled', true);
                    jQuery('#ward_field').change();
                }
            });
        });
    </script>

	<style>
		.box-bds select {
			margin-bottom: 10px;
			width: 100%;
			height: 40px;
			border-radius: 4px;
			border: 1px solid #d9d9d9;
		}
	</style>

<?php
}


// save custom field bds
function dungnh_save_box_project($post_id, $post, $update)
{
    if ($post->post_type != 'property' && $post->post_type != 'can-ho') {
        return;
    }

    if (array_key_exists('citi_field', $_POST)) {
        update_post_meta(
            $post_id,
            'citi_field',
            $_POST['citi_field']
        );
    }

    if (array_key_exists('ward_field', $_POST)) {
        update_post_meta(
            $post_id,
            'ward_field',
            $_POST['ward_field']
        );
    }

}
add_action('save_post', 'dungnh_save_box_project', 10, 3);





add_filter( 'posts_where', 'title_filter', 10, 2 );
function title_filter($where, &$wp_query){
    global $wpdb;

    if($search_term = $wp_query->get( 'search_prod_title' )){
        /*using the esc_like() in here instead of other esc_sql()*/
        $search_term = $wpdb->esc_like($search_term);
        $search_term = ' \'%' . $search_term . '%\'';
        $where .= ' AND ' . $wpdb->posts . '.post_title LIKE '.$search_term;
    }

    return $where;
}




function be_arrows_in_menus( $item_output, $item, $depth, $args ) {

	if( in_array( 'menu-item-has-children', $item->classes ) ) {
		$arrow = 0 == $depth ? '<span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg></span>' : '<span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M342.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L274.7 256 105.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg></span>';
		$item_output = str_replace( '</a>', $arrow . '</a>', $item_output );
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'be_arrows_in_menus', 10, 4 );



function customize_customtaxonomy_archive_display ( $query ) {
	if (($query->is_main_query()) && (is_tax('danh-muc-can-ho'))) {
		if(!empty($_GET['keywork'])) {
			$args['s'] = $_GET['keywork'];
		}

		$meta_query = array();
		$tax_query = array();

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

		if(!empty($_GET['loaibds'])) {
			$tax_query[] = array(
				'taxonomy' => 'danh-muc-can-ho',
				'fields' => 'term_id',
				'terms' => $_GET['loaibds']
			);
		}

		if(!empty($_GET['orderby']) && $_GET['orderby'] == 'desc') {
			$query->set( 'orderby', 'DATE' );
			$query->set( 'order', 'DESC' );
		}
		
		if(!empty($_GET['orderby']) && $_GET['orderby'] == 'asc') {
			$query->set( 'orderby', 'DATE' );
			$query->set( 'order', 'ASC' );
		}
		
		if(!empty($_GET['orderby']) && $_GET['orderby'] == 'price-desc') {
			$query->set( 'orderby', 'meta_value_num' );
			$query->set( 'order', 'ASC' );
			$query->set( 'meta_key', 'price_regular' );   
		}
		
		if(!empty($_GET['orderby']) && $_GET['orderby'] == 'price-asc') {
			$query->set( 'orderby', 'meta_value_num' );
			$query->set( 'order', 'DESC' );
			$query->set( 'meta_key', 'price_regular' );   
		}

		if(count($meta_query) > 0) {
			$query->set( 'meta_query', $meta_query );
		}
		
		if(count($tax_query) > 0) {
			$query->set( 'tax_query', $meta_query );
		}
	}



	if (($query->is_main_query()) && (is_tax('loai-bds'))) {
		if(!empty($_GET['keywork'])) {
			$args['s'] = $_GET['keywork'];
		}

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

		if(!empty($_GET['loaibds'])) {
			$tax_query[] = array(
				'taxonomy' => 'loai-bds',
				'fields' => 'term_id',
				'terms' => $_GET['loaibds']
			);
		}

		if(!empty($_GET['orderby']) && $_GET['orderby'] == 'desc') {
			$query->set( 'orderby', 'DATE' );
			$query->set( 'order', 'DESC' );
		}
		
		if(!empty($_GET['orderby']) && $_GET['orderby'] == 'asc') {
			$query->set( 'orderby', 'DATE' );
			$query->set( 'order', 'ASC' );
		}
		
		if(!empty($_GET['orderby']) && $_GET['orderby'] == 'price-desc') {
			$query->set( 'orderby', 'meta_value_num' );
			$query->set( 'order', 'ASC' );
			$query->set( 'meta_key', 'price_regular' );   
		}
		
		if(!empty($_GET['orderby']) && $_GET['orderby'] == 'price-asc') {
			$query->set( 'orderby', 'meta_value_num' );
			$query->set( 'order', 'DESC' );
			$query->set( 'meta_key', 'price_regular' );   
		}

		if(count($meta_query) > 0) {
			$query->set( 'meta_query', $meta_query );
		}
		
		if(count($tax_query) > 0) {
			$query->set( 'tax_query', $meta_query );
		}
	}

}

 add_action( 'pre_get_posts', 'customize_customtaxonomy_archive_display' );


// Thêm checkbox chọn danh mục khi tạo du-an
add_action( 'du-an_add_form_fields', 'add_danh_muc_checkbox_for_du_an', 10, 2 );
function add_danh_muc_checkbox_for_du_an( $term ) {
    ?>
    <div class="form-field">
        <label for="danh-muc-can-ho"><?php _e( 'Chọn Danh Mục Căn Hộ', 'textdomain' ); ?></label>
        <?php 
        // Lấy danh sách danh mục căn hộ
        $categories = get_terms( array(
            'taxonomy' => 'danh-muc-can-ho',
            'hide_empty' => false,
        ) );

        if ( ! empty( $categories ) ) {
            foreach ( $categories as $category ) {
                echo '<label><input type="checkbox" name="danh-muc-can-ho[]" value="' . esc_attr( $category->term_id ) . '">' . esc_html( $category->name ) . '</label><br>';
            }
        }
        ?>
    </div>
    <?php
}


// Lưu meta field cho du-an khi tạo hoặc chỉnh sửa
add_action( 'created_du-an', 'save_danh_muc_checkbox_for_du_an', 10, 2 );
add_action( 'edited_du-an', 'save_danh_muc_checkbox_for_du_an', 10, 2 );
function save_danh_muc_checkbox_for_du_an( $term_id ) {
    if ( isset( $_POST['danh-muc-can-ho'] ) && ! empty( $_POST['danh-muc-can-ho'] ) ) {
        $selected_categories = array_map( 'sanitize_text_field', $_POST['danh-muc-can-ho'] );
        update_term_meta( $term_id, 'danh-muc-can-ho', $selected_categories );
    } else {
        // Nếu không có danh mục nào được chọn, xóa meta
        delete_term_meta( $term_id, 'danh-muc-can-ho' );
    }
}


// Hiển thị checkbox đã chọn khi chỉnh sửa du-an
add_action( 'du-an_edit_form_fields', 'edit_danh_muc_checkbox_for_du_an', 10, 2 );
function edit_danh_muc_checkbox_for_du_an( $term, $taxonomy ) {
    // Lấy danh sách danh mục căn hộ
    $categories = get_terms( array(
        'taxonomy' => 'danh-muc-can-ho',
        'hide_empty' => false,
    ) );

    // Lấy danh mục đã chọn
    $selected_categories = get_term_meta( $term->term_id, 'danh-muc-can-ho', true );
    ?>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="danh-muc-can-ho"><?php _e( 'Chọn Danh Mục Căn Hộ', 'textdomain' ); ?></label></th>
        <td>
            <?php 
            if ( ! empty( $categories ) ) {
                foreach ( $categories as $category ) {
                    $checked = in_array( $category->term_id, (array) $selected_categories ) ? 'checked="checked"' : '';
                    echo '<label><input type="checkbox" name="danh-muc-can-ho[]" value="' . esc_attr( $category->term_id ) . '" ' . $checked . '>' . esc_html( $category->name ) . '</label><br>';
                }
            }
            ?>
        </td>
    </tr>
    <?php
}

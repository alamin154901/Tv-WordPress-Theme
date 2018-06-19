<?php
global $themesbazar;
load_theme_textdomain( 'sunflower', get_template_directory() . '/languages' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-formats',  array ( 'aside', 'gallery', 'quote', 'image', 'video' ) );

/* --------------Post Thumbnails Add-------------- */
    
add_theme_support( 'post-thumbnails');
set_post_thumbnail_size( 600, 337, true );
add_image_size( 'single-thumbnail', 600, 337, true );





/* ----------------StyleSheet and Javascript Add --------------*/

function newsstar_css_and_js() {
   wp_register_style('bootstrap',get_template_directory_uri() .'/css/bootstrap.min.css');
   wp_register_style('font-awesome',get_template_directory_uri() .'/css/font-awesome.min.css');
   wp_register_style('responsive',get_template_directory_uri() .'/css/responsive.css');
   wp_register_style('menu',get_template_directory_uri() .'/css/menu.css');
   wp_register_style('stylesheet',get_template_directory_uri() .'/css/stylesheet.css');
   wp_register_style('style',get_stylesheet_uri() );
    
    wp_register_script('js_min', get_template_directory_uri() .'/js/bootstrap.min.js', array(
    jquery
    ));

    wp_enqueue_style('bootstrap');
    wp_enqueue_style('font-awesome');
    wp_enqueue_style('responsive');
    wp_enqueue_style('menu');
    wp_enqueue_style('stylesheet');
    wp_enqueue_style('css-themes');
    wp_enqueue_style('style');
    
    wp_enqueue_script('jquery');    
    wp_enqueue_script('js_min');
    
}
add_action( 'wp_enqueue_scripts', 'newsstar_css_and_js' );




/* --------------Post View Count----------------- */
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 Views";
    }
    return $count;
}



function setPostViews($postID) {
    $countKey = 'post_views_count';
    $count = get_post_meta($postID, $countKey, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $countKey);
        add_post_meta($postID, $countKey, '0');
    }else{
        $count++;
        update_post_meta($postID, $countKey, $count);
    }
}

/* --------------Post Pagination----------------- */

function wp_bootstrap_pagination( $args = array() ) {

    $defaults = array(
        'range'           => 4,
        'custom_query'    => FALSE,
        'previous_string' => __( '<i class="fa fa-backward" aria-hidden="true"></i>
', 'text-domain' ),
        'next_string'     => __( '<i class="fa fa-forward" aria-hidden="true"></i>
', 'text-domain' ),
        'before_output'   => '<div class="post-nav"><ul class="pager">',
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
        $echo .= '<li class="previous"><a href="' . $firstpage . '">' . __( '<i class="fa fa-fast-backward" aria-hidden="true"></i>
', 'text-domain' ) . '</a></li>';
    if ( $previous && (1 != $page) )
        $echo .= '<li><a href="' . $previous . '" title="' . __( 'previous', 'text-domain') . '">' . $args['previous_string'] . '</a></li>';
    
    if ( !empty($min) && !empty($max) ) {
        for( $i = $min; $i <= $max; $i++ ) {
            if ($page == $i) {
                $echo .= '<li class="active"><span class="active">' . str_pad( (int)$i, 2, '0', STR_PAD_LEFT ) . '</span></li>';
            } else {
                $echo .= sprintf( '<li><a href="%s">%002d</a></li>', esc_attr( get_pagenum_link($i) ), $i );
            }
        }
    }
    
    $next = intval($page) + 1;
    $next = esc_attr( get_pagenum_link($next) );
    if ($next && ($count != $page) )
        $echo .= '<li><a href="' . $next . '" title="' . __( 'next', 'text-domain') . '">' . $args['next_string'] . '</a></li>';
    
    $lastpage = esc_attr( get_pagenum_link($count) );
    if ( $lastpage ) {
        $echo .= '<li class="next"><a href="' . $lastpage . '">' . __( '<i class="fa fa-fast-forward" aria-hidden="true"></i>
', 'text-domain' ) . '</a></li>';
    }
    if ( isset($echo) )
        echo $args['before_output'] . $echo . $args['after_output'];
}


/* --------------Live TV Post Register----------------- */

if(function_exists('register_post_type')) {
		register_post_type('livetv', array(
			'labels' => array(
				'name' => __('Live TV', 'news'),
				'menu_name' => __('Live TV', 'news'),
				'add_new' => __('Add New Link', 'news'),
				'add_new_item' => __('Add New Link', 'news'),
			),
			'public' => true,
			'menu_icon' => 'dashicons-format-gallery',
			'supports' => array('title','editor')
		   ));
	    }
		
	
		
/* --------------Live TV Post Register----------------- */

if(function_exists('register_post_type')) {
		register_post_type('notice', array(
			'labels' => array(
				'name' => __('Notice', 'news'),
				'menu_name' => __('Notice', 'news'),
				'add_new' => __('Add New Notice', 'news'),
				'add_new_item' => __('Add New Notice', 'news'),
			),
			'public' => true,
			'menu_icon' => 'dashicons-format-gallery',
			'supports' => array('title','editor')
		   ));
	    }
		
		

/* --------------Page Title----------------- */

add_filter( 'wp_title', 'wpdocs_hack_wp_title_for_home' );
 
/**
 * Customize the title for the home page, if one is not set.
 *
 * @param string $title The original title.
 * @return string The title to use.
 */
function wpdocs_hack_wp_title_for_home( $title )
{
  if ( empty( $title ) && ( is_home() || is_front_page() ) ) {
    $title = __( 'Home', 'textdomain' ) . ' | ' . get_bloginfo( 'name' ). ' | ' . get_bloginfo( 'description' );
  }
  return $title;
}


function stock_youtube_video($atts, $content = null){
    extract (
        shortcode_atts(array(
            'id' => 'jpGDSiHI61c'
       
        ),$atts)  );
   
$youtube_shortcode_markup = '

<div class="embed-responsive embed-responsive-16by9">
  <iframe width="640" height="360" src="https://www.youtube.com/embed/'.$id.'?showinfo=1&showtitle=0&autohide=0&rel=0&controls=0&modestbranding=1&loop=0" frameborder="0" allowfullscreen></iframe>
</div>
';

return $youtube_shortcode_markup;
}
add_shortcode('youtube', 'stock_youtube_video');




function bn_number($str)
 {
     $en = array(1,2,3,4,5,6,7,8,9,0);
    $bn = array('১','২','৩','৪','৫','৬','৭','৮','৯','০');
    $str = str_replace($en, $bn, $str);
     return $str;
 }



function bn1_date($str)
 {
     $en = array(1,2,3,4,5,6,7,8,9,0);
    $bn = array('১','২','৩','৪','৫','৬','৭','৮','৯','০');
    $str = str_replace($en, $bn, $str);
    $en = array( 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' );
    $en_short = array( 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec' );
    $bn = array( 'জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'অগাস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর' );
    $str = str_replace( $en, $bn, $str );
    $str = str_replace( $en_short, $bn, $str );
    $en = array('Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday');
     $en_short = array('Sat','Sun','Mon','Tue','Wed','Thu','Fri');
     $bn_short = array('শনিবার', 'রবিবার','সোমবার','মঙ্গলবার','বুধবার','বৃহস্পতিবার','শুক্রবার');
     $bn = array('শনিবার','রবিবার','সোমবার','মঙ্গলবার','বুধবার','বৃহস্পতিবার','শুক্রবার');
     $str = str_replace( $en, $bn, $str );
     $str = str_replace( $en_short, $bn_short, $str );
     $en = array( 'am', 'pm' );
    $bn = array( 'পূর্বাহ্ন', 'অপরাহ্ন' );
    $str = str_replace( $en, $bn, $str );
     return $str;
 }


include('lib/ReduxCore/framework.php');
include('lib/ReduxCore/templates/panel/config.php');
include('lib/sample/config.php');
include('include/widget.php');
include('include/menu.php');
include('include/wp-bootstrap-navwalker.php');
include('lib/tgm/example.php');





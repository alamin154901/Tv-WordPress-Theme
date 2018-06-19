<?php
function newsstar_widgets_areas(){
    register_sidebar(array(
        'name' => __( 'Sidebar Top', 'NewsStar Themes' ),
		'id' => 'sidebar_area_top',
        'description'   => esc_html__( 'Add widgets here.', 'themes' ),
		'before_widget' => '<div class="widget_area">',
		'after_widget' => '</div>',
	    'before_title' => '<h3>',
	    'after_title' => '</h3>',
    ));
	register_sidebar(array(
        'name' => __( 'Sidebar Middle', 'NewsStar Themes' ),
		'id' => 'sidebar_area_middle',
        'description'   => esc_html__( 'Add widgets here.', 'themes' ),
		'before_widget' => '<div class="widget_area">',
		'after_widget' => '</div>',
	    'before_title' => '<h3>',
	    'after_title' => '</h3>',
    ));
	register_sidebar(array(
        'name' => __( 'Sidebar bottom', 'NewsStar Themes' ),
		'id' => 'sidebar_area_bottom',
        'description'   => esc_html__( 'Add widgets here.', 'themes' ),
		'before_widget' => '<div class="widget_area">',
		'after_widget' => '</div>',
	    'before_title' => '<h3>',
	    'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __( 'Widget Area 01', 'NewsStar Themes' ),
		'id' => 'widget_area_01',
        'description'   => esc_html__( 'Add widgets here.', 'themes' ),
		'before_widget' => '<div class="widget_area">',
		'after_widget' => '</div>',
	    'before_title' => '<h3>',
	    'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __( 'Widget Area 02', 'NewsStar Themes' ),
		'id' => 'widget_area_02',
        'description'   => esc_html__( 'Add widgets here.', 'themes' ),
		'before_widget' => '<div class="widget_area">',
		'after_widget' => '</div>',
	    'before_title' => '<h3>',
	    'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __( 'Widget Area 03', 'NewsStar Themes' ),
		'id' => 'widget_area_03',
        'description'   => esc_html__( 'Add widgets here.', 'themes' ),
		'before_widget' => '<div class="widget_area">',
		'after_widget' => '</div>',
	    'before_title' => '<h3>',
	    'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __( 'Widget Area 04', 'NewsStar Themes' ),
		'id' => 'widget_area_04',
        'description'   => esc_html__( 'Add widgets here.', 'themes' ),
		'before_widget' => '<div class="widget_area">',
		'after_widget' => '</div>',
	    'before_title' => '<h3>',
	    'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __( 'Widget Area 05', 'NewsStar Themes' ),
		'id' => 'widget_area_05',
        'description'   => esc_html__( 'Add widgets here.', 'themes' ),
		'before_widget' => '<div class="widget_area">',
		'after_widget' => '</div>',
	    'before_title' => '<h3>',
	    'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __( 'Widget Area 06', 'NewsStar Themes' ),
		'id' => 'widget_area_06',
        'description'   => esc_html__( 'Add widgets here.', 'themes' ),
		'before_widget' => '<div class="widget_area">',
		'after_widget' => '</div>',
	    'before_title' => '<h3>',
	    'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __( 'Widget Area 07', 'NewsStar Themes' ),
		'id' => 'widget_area_07',
        'description'   => esc_html__( 'Add widgets here.', 'themes' ),
		'before_widget' => '<div class="widget_area">',
		'after_widget' => '</div>',
	    'before_title' => '<h3>',
	    'after_title' => '</h3>',
    ));
  
    
    
    register_sidebar(array(
        'name' => __( 'Single Page Sidebar', 'NewsStar Themes' ),
		'id' => 'single_widget',
        'description'   => esc_html__( 'Add widgets here.', 'themes' ),
		'before_widget' => '<div class="widget_area">',
		'after_widget' => '</div>',
	    'before_title' => '<h3>',
	    'after_title' => '</h3>',
    ));
    
    register_sidebar(array(
        'name' => __( 'Single Page Top', 'NewsStar Themes' ),
		'id' => 'single_top',
        'description'   => esc_html__( 'Add widgets here.', 'themes' ),
		'before_widget' => '<div class="widget_area">',
		'after_widget' => '</div>',
	    'before_title' => '<h3>',
	    'after_title' => '</h3>',
    ));
    
    
    
    register_sidebar(array(
        'name' => __( 'Single Page Buttom', 'NewsStar Themes' ),
		'id' => 'single_buttom',
        'description'   => esc_html__( 'Add widgets here.', 'themes' ),
		'before_widget' => '<div class="widget_area">',
		'after_widget' => '</div>',
	    'before_title' => '<h3>',
	    'after_title' => '</h3>',
    ));
    
    
}
add_action('widgets_init', 'newsstar_widgets_areas');




































































function root(){
	$txt = "Design & Developed BY <a href='http://www.themesbazar.com' target='_blank' title='Mobile : 01732-667364'>ThemesBazar.Com</a>";
	echo $txt;
}
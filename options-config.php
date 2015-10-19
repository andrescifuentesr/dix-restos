<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "redux_options";


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
        'menu_title'           => __( 'Theme Options', 'redux-framework' ),
        'page_title'           => __( 'Theme Options', 'redux-framework' ),
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
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
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
        'system_info'          => false,
        // REMOVE

        //'compiler'             => true,

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
        'title' => __( 'Documentation', 'redux-framework' ),
    );

    $args['admin_bar_links'][] = array(
        //'id'    => 'redux-support',
        'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
        'title' => __( 'Support', 'redux-framework' ),
    );

    $args['admin_bar_links'][] = array(
        'id'    => 'redux-extensions',
        'href'  => 'reduxframework.com/extensions',
        'title' => __( 'Extensions', 'redux-framework' ),
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
        'title' => 'Visit us on GitHub',
        'icon'  => 'el el-github'
        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://twitter.com/reduxframework',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://www.linkedin.com/company/redux-framework',
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
        // $args['intro_text'] = sprintf( __( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'redux-framework' ), $v );
    } else {
        $args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'redux-framework' );
    }

    // Add content after the form.
    $args['footer_text'] = __( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'redux-framework' );

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
            'title'   => __( 'Theme Information 1', 'redux-framework' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'redux-framework' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework' );
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


     */


    //====================
    // Homepage
    //====================

    Redux::setSection( $opt_name, array(
        'title' => __( 'Homepage', 'redux-framework' ),
        'id'    => 'basic',
        'desc'  => __( '', 'redux-framework' ),
        'icon'  => 'el el-home'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Description', 'redux-framework' ),
        'id'         => 'home-description',
        'desc'       => __( 'Please, always insert your text on English', 'redux-framework' ),
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'home-image-caption',
                'type'     => 'text',
                'title'    => __( 'Home Image Caption', 'redux-framework' ),
                // 'subtitle' => __( 'Button', 'redux-framework' ),
                // 'desc'     => __( 'Field Description', 'redux-framework' ),
                'default'  => 'Welcome',
            ),
            array(
                'id'       => 'home-image-media',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Welcome Image', 'redux-framework' ),
                'compiler' => 'true',
                //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'     => __( 'Upload any media using the WordPress uploader. Recomended size image should have 340px x 340px', 'redux-framework' ),
                // 'subtitle' => __( 'Upload any media using the WordPress uploader.', 'redux-framework' ),
                'default'  => array( 'url' => 'http://www.cuyabroweb.com/dix-restos/wp-content/uploads/2015/09/img-home_1.jpg' ),
                //'hint'      => array(
                //    'title'     => 'Hint Title',
                //    'content'   => 'This is a <b>hint</b> for the media field with a Title.',
                //)
            ),            
            array(
                'id'       => 'home-description-textarea',
                'type'     => 'textarea',
                'title'    => __( 'Home Description', 'redux-framework' ),
                'subtitle' => __( 'This is the main description for your restaruant at the homepage', 'redux-framework' ),
                // 'desc'     => __( 'This is the description field, again good for additional info.', 'redux-framework' ),
                'default'  => 'An amazing view on one of the most sumptuous Parisian building, the Arc de Triomphe. Sunny or full during the evenings, our luxury Italian Trattoria’s terrace, the Casa Luca, offers a privileged moment during a culinary escape in the Chic and trendy Paris of the 8th district.',
            ),
            array(
                'id'       => 'home-description-button',
                'type'     => 'text',
                'title'    => __( 'Home Description Button', 'redux-framework' ),
                'subtitle' => __( 'Button', 'redux-framework' ),
                // 'desc'     => __( 'Field Description', 'redux-framework' ),
                'default'  => 'Discover our daily menu',
            )         
        )
    ) );

    //====================
    //Links section
    //====================

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Buttons', 'redux-framework' ),
        'desc'       => __( 'Please, always insert your text on English', 'redux-framework' ),
        'id'         => 'links-section',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'home-reservation-link-label',
                'type'     => 'text',
                'title'    => __( 'Reservation Label', 'redux-framework' ),
                // 'subtitle' => __( 'Subtitle', 'redux-framework' ),
                'desc'     => __( 'Fill in here text for Reservation link. This label corresponds to the block next to your home slider', 'redux-framework' ),
                'default'  => 'Online Reservation',
                // 'placeholder' => 'Placeholder Text'
            ),
            array(
                'id'       => 'home-reservation-link',
                'type'     => 'text',
                'title'    => __( 'Reservation Page Link', 'redux-framework' ),
                // 'subtitle' => __( 'Subtitle', 'redux-framework' ),
                'desc'     => __( 'Fill in here the URL to the Reservation page. ', 'redux-framework' ),
                'default'  => '',
                // 'placeholder' => 'Placeholder Text'
            ),
            array(
                'id'       => 'home-contact-link-label',
                'type'     => 'text',
                'title'    => __( 'Contact Label', 'redux-framework' ),
                // 'subtitle' => __( 'Subtitle', 'redux-framework' ),
                'desc'     => __( 'Fill in here text for Contact link. This label corresponds to the bottom left block', 'redux-framework' ),
                'default'  => 'Contact',
                // 'placeholder' => 'Contact'
            ),
            array(
                'id'       => 'home-contact-link',
                'type'     => 'text',
                'title'    => __( 'Contact Page Link', 'redux-framework' ),
                // 'subtitle' => __( 'Subtitle', 'redux-framework' ),
                'desc'     => __( 'Fill in here the URL to the Contact page. ', 'redux-framework' ),
                'default'  => '',
                // 'placeholder' => 'Placeholder Text'
            ),
            array(
                'id'       => 'home-contact-image',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Contact image', 'redux-framework' ),
                'compiler' => 'true',
                //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'     => __( 'Upload any media using the WordPress uploader. Recomended size image should have 340px x 170px', 'redux-framework' ),
                // 'subtitle' => __( 'Upload any media using the WordPress uploader.', 'redux-framework' ),
                'default'  => array( 'url' => 'http://www.cuyabroweb.com/dix-restos/wp-content/uploads/2015/09/img-home_2.jpg' ),
                //'hint'      => array(
                //    'title'     => 'Hint Title',
                //    'content'   => 'This is a <b>hint</b> for the media field with a Title.',
                //)
            ),
            array(
                'id'       => 'home-menu-link-label',
                'type'     => 'text',
                'title'    => __( 'Menu Page Label', 'redux-framework' ),
                // 'subtitle' => __( 'Subtitle', 'redux-framework' ),
                'desc'     => __( 'Fill in here text for Menu link. This label corresponds to the bottom right block', 'redux-framework' ),
                'default'  => 'Menus',
                // 'placeholder' => 'Menus'
            ),
            array(
                'id'       => 'home-menu-link',
                'type'     => 'text',
                'title'    => __( 'Menu Page Link', 'redux-framework' ),
                // 'subtitle' => __( 'Subtitle', 'redux-framework' ),
                'desc'     => __( 'Fill in here the URL to the Menu page. ', 'redux-framework' ),
                'default'  => '',
                // 'placeholder' => 'Placeholder Text'
            ),
            array(
                'id'       => 'home-menu-image',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Menus Image', 'redux-framework' ),
                'compiler' => 'true',
                //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'     => __( 'Upload any media using the WordPress uploader. Recomended size image should have 340px x 170px', 'redux-framework' ),
                // 'subtitle' => __( 'Upload any media using the WordPress uploader.', 'redux-framework' ),
                'default'  => array( 'url' => 'http://www.cuyabroweb.com/dix-restos/wp-content/uploads/2015/09/img-home_3.jpg' ),
                //'hint'      => array(
                //    'title'     => 'Hint Title',
                //    'content'   => 'This is a <b>hint</b> for the media field with a Title.',
                //)
            )
        )
    ) );


    //====================
    //Header
    //====================

    // -> START Basic Fields
    Redux::setSection( $opt_name, array(
        'title' => __( 'Header', 'redux-framework' ),
        'id'    => 'header-section',
        'desc'  => __( '', 'redux-framework' ),
        'icon'  => 'el el-laptop'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Description', 'redux-framework' ),
        'id'         => 'header-description',
        'desc'       => __( 'Please, always insert your text on English', 'redux-framework' ),
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'header-image-logo',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Logo', 'redux-framework' ),
                'compiler' => 'true',
                //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'     => __( 'Upload any media using the WordPress uploader. Recomended size image should have 340px x 340px', 'redux-framework' ),
                // 'subtitle' => __( 'Upload any media using the WordPress uploader.', 'redux-framework' ),
                'default'  => array( 'url' => 'http://www.casaluca.fr/etoile/wp-content/uploads/2015/09/logo-casa-luca.svg' ),
                //'hint'      => array(
                //    'title'     => 'Hint Title',
                //    'content'   => 'This is a <b>hint</b> for the media field with a Title.',
                //)
            ),
            array(
                'id'       => 'header-phone',
                'type'     => 'text',
                'title'    => __( 'Header Phone', 'redux-framework' ),
                // 'subtitle' => __( 'Button', 'redux-framework' ),
                'desc'     => __( 'Fill in here your Header phone number.', 'redux-framework' ),
                'default'  => '01 47 20 20 40',
                'placeholder' => '01 47 20 20 40'
            ) 
        )
    ) ); 

    //====================
    //Slider
    //====================


    // -> START Media Uploads
    Redux::setSection( $opt_name, array(
        'title' => __( 'Slider', 'redux-framework' ),
        'id'    => 'home-media',
        'desc'  => __( '', 'redux-framework' ),
        'icon'  => 'el el-picture'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Slides', 'redux-framework' ),
        'id'         => 'home-slides',
        'desc'       => __( 'Please, always insert your text on English', 'redux-framework' ) ,
        'subsection' => true,
        'fields'     => array(
            array(
                'id'          => 'home-opt-slides',
                'type'        => 'slides',
                'title'       => __( 'Slides Options', 'redux-framework' ),
                'subtitle'    => __( 'Unlimited slides with drag and drop sortings.', 'redux-framework' ),
                'desc'        => __( 'Just add all slides required for your homepage.', 'redux-framework' ),
                'placeholder' => array(
                    'title'       => __( 'This is a title', 'redux-framework' ),
                    // 'description' => __( 'Description Here', 'redux-framework' ),
                    // 'url'         => __( 'Give us a link!', 'redux-framework' ),
                ),
            ),
        )
    ) );

    //====================
    //Footer
    //====================

    Redux::setSection( $opt_name, array(
        'title' => __( 'Footer', 'redux-framework' ),
        'id'    => 'footer-section',
        'desc'  => __( '', 'redux-framework' ),
        'icon'  => 'el el-lines'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'General information', 'redux-framework' ),
        'desc'       => __( 'Please, always insert your text on English', 'redux-framework' ),
        'id'         => 'foo-section',
        'subsection' => true,
        'fields'     => array(         
            array(
                'id'       => 'footer-phone',
                'type'     => 'text',
                'title'    => __( 'Phone', 'redux-framework' ),
                // 'subtitle' => __( 'Subtitle', 'redux-framework' ),
                'desc'     => __( 'Fill in here your Restaurant phone number.', 'redux-framework' ),
                'default'  => '01 47 20 20 40',
                'placeholder' => '01 47 20 20 40'
            ),
            array(
                'id'       => 'footer-jobs',
                'type'     => 'text',
                'title'    => __( 'Work with us', 'redux-framework' ),
                // 'subtitle' => __( 'Subtitle', 'redux-framework' ),
                'desc'     => __( 'Fill in here your Jobs label.', 'redux-framework' ),
                'default'  => 'Work with us',
                'placeholder' => 'Jobs'
            ),
            array(
                'id'       => 'footer-jobs-email',
                'type'     => 'text',
                'title'    => __( 'Work with us email', 'redux-framework' ),
                // 'subtitle' => __( 'Subtitle', 'redux-framework' ),
                'desc'     => __( 'Fill in here your jobs email.', 'redux-framework' ),
                // 'default'  => 'Work with us',
                'placeholder' => 'workwithus@email.com'
            ),
            array(
                'id'       => 'footer-adress',
                'type'     => 'textarea',
                'title'    => __( 'Restaurant Adress', 'redux-framework' ),
                // 'subtitle' => __( 'This is the main description for your restaruant at the homepage', 'redux-framework' ),
                'desc'     => __( 'Fill in here your Restaurant adress.', 'redux-framework' ),
                'default'  => '82 avenue Marceau 75008 Paris 8ème',
            ),
            array(
                'id'       => 'footer-schedules',
                'type'     => 'textarea',
                'title'    => __( 'Restaurant Schedules', 'redux-framework' ),
                // 'subtitle' => __( 'This is the main description for your restaruant at the homepage', 'redux-framework' ),
                'desc'     => __( 'Fill in here your Restaurant Schedule.', 'redux-framework' ),
                'default'  => 'open Tuesday to Sunday From Midday to Midnight',
            ),
            array(
                'id'       => 'footer-googlemap',
                'type'     => 'text',
                'title'    => __( 'Footer Googlemap', 'redux-framework' ),
                'subtitle' => __( 'Fill in here your Google Map shortcode', 'redux-framework' ),
                // 'desc'     => __( 'This is the description field, again good for additional info.', 'redux-framework' ),
                'default'  => '[put_wpgm id=2]',
            )
        )
    ) );

    //====================
    //Bottom Menu
    //====================

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Restaurants Menu', 'redux-framework' ),
        'desc'       => __( 'Please, always insert your text on English', 'redux-framework' ),
        'id'         => 'footer-menu',
        'subsection' => true,
        'fields'     => array(         
            array(
                'id'       => 'footer-restaurant-1',
                'type'     => 'text',
                'title'    => __( 'Restaurant 1', 'redux-framework' ),
                // 'subtitle' => __( 'Subtitle', 'redux-framework' ),
                'desc'     => __( 'Fill in here your Restaurant 1', 'redux-framework' ),
                'default'  => 'Marius et Janette',
                // 'placeholder' => ''
            ),
            array(
                'id'       => 'footer-restaurant-link-1',
                'type'     => 'text',
                'title'    => __( 'Restaurant Link 1', 'redux-framework' ),
                // 'subtitle' => __( 'Subtitle', 'redux-framework' ),
                'desc'     => __( 'Fill in here your link to Restaurant 1', 'redux-framework' ),
                'default'  => 'http://www.mariusetjanette.com/',
                // 'placeholder' => ''
            ),
            array(
                'id'       => 'footer-restaurant-2',
                'type'     => 'text',
                'title'    => __( 'Restaurant 2', 'redux-framework' ),
                // 'subtitle' => __( 'Subtitle', 'redux-framework' ),
                'desc'     => __( 'Fill in here your Restaurant 2', 'redux-framework' ),
                'default'  => 'Le petit Marius',
                // 'placeholder' => ''
            ),
            array(
                'id'       => 'footer-restaurant-link-2',
                'type'     => 'text',
                'title'    => __( 'Restaurant Link 2', 'redux-framework' ),
                // 'subtitle' => __( 'Subtitle', 'redux-framework' ),
                'desc'     => __( 'Fill in here your link to Restaurant 2', 'redux-framework' ),
                'default'  => 'http://www.lepetitmarius.com',
                // 'placeholder' => ''
            ),
            array(
                'id'       => 'footer-restaurant-3',
                'type'     => 'text',
                'title'    => __( 'Restaurant 3', 'redux-framework' ),
                // 'subtitle' => __( 'Subtitle', 'redux-framework' ),
                'desc'     => __( 'Fill in here your Restaurant 3', 'redux-framework' ),
                'default'  => 'Chez Francis',
                // 'placeholder' => 'Chez Francis'
            ),
            array(
                'id'       => 'footer-restaurant-link-3',
                'type'     => 'text',
                'title'    => __( 'Restaurant Link 3', 'redux-framework' ),
                // 'subtitle' => __( 'Subtitle', 'redux-framework' ),
                'desc'     => __( 'Fill in here your link to Restaurant 3', 'redux-framework' ),
                'default'  => 'http://www.chezfrancis-restaurant.com/',
                // 'placeholder' => ''
            ),
            array(
                'id'       => 'footer-restaurant-4',
                'type'     => 'text',
                'title'    => __( 'Restaurant 4', 'redux-framework' ),
                // 'subtitle' => __( 'Subtitle', 'redux-framework' ),
                'desc'     => __( 'Fill in here your Restaurant 4', 'redux-framework' ),
                'default'  => 'Casa Luca',
                // 'placeholder' => ''
            ),
            array(
                'id'       => 'footer-restaurant-link-4',
                'type'     => 'text',
                'title'    => __( 'Restaurant Link 4', 'redux-framework' ),
                // 'subtitle' => __( 'Subtitle', 'redux-framework' ),
                'desc'     => __( 'Fill in here your link to Restaurant 4', 'redux-framework' ),
                'default'  => 'http://www.casaluca.fr/',
                // 'placeholder' => ''
            ),
            array(
                'id'       => 'footer-restaurant-5',
                'type'     => 'text',
                'title'    => __( 'Restaurant 5', 'redux-framework' ),
                // 'subtitle' => __( 'Subtitle', 'redux-framework' ),
                'desc'     => __( 'Fill in here your Restaurant 5', 'redux-framework' ),
                'default'  => 'La Cantina di Luca',
                // 'placeholder' => ''
            ),
            array(
                'id'       => 'footer-restaurant-link-5',
                'type'     => 'text',
                'title'    => __( 'Restaurant Link 5', 'redux-framework' ),
                // 'subtitle' => __( 'Subtitle', 'redux-framework' ),
                'desc'     => __( 'Fill in here your link to Restaurant 5', 'redux-framework' ),
                'default'  => 'http://www.cantinadiluca.fr',
                // 'placeholder' => ''
            ),
            array(
                'id'       => 'footer-restaurant-6',
                'type'     => 'text',
                'title'    => __( 'Restaurant 6', 'redux-framework' ),
                // 'subtitle' => __( 'Subtitle', 'redux-framework' ),
                'desc'     => __( 'Fill in here your Restaurant 6', 'redux-framework' ),
                'default'  => 'Le Thiou',
                // 'placeholder' => ''
            ),
            array(
                'id'       => 'footer-restaurant-link-6',
                'type'     => 'text',
                'title'    => __( 'Restaurant Link 6', 'redux-framework' ),
                // 'subtitle' => __( 'Subtitle', 'redux-framework' ),
                'desc'     => __( 'Fill in here your link to Restaurant 6', 'redux-framework' ),
                'default'  => 'http://www.thiou.fr',
                // 'placeholder' => ''
            ),
            array(
                'id'       => 'footer-restaurant-7',
                'type'     => 'text',
                'title'    => __( 'Restaurant 7', 'redux-framework' ),
                // 'subtitle' => __( 'Subtitle', 'redux-framework' ),
                'desc'     => __( 'Fill in here your Restaurant 7', 'redux-framework' ),
                'default'  => 'Le Berkeley',
                // 'placeholder' => ''
            ),
            array(
                'id'       => 'footer-restaurant-link-7',
                'type'     => 'text',
                'title'    => __( 'Restaurant Link 7', 'redux-framework' ),
                // 'subtitle' => __( 'Subtitle', 'redux-framework' ),
                'desc'     => __( 'Fill in here your link to Restaurant 7', 'redux-framework' ),
                'default'  => 'http://www.leberkeley.fr',
                // 'placeholder' => ''
            ),
            array(
                'id'       => 'footer-restaurant-8',
                'type'     => 'text',
                'title'    => __( 'Restaurant 8', 'redux-framework' ),
                // 'subtitle' => __( 'Subtitle', 'redux-framework' ),
                'desc'     => __( 'Fill in here your Restaurant 8', 'redux-framework' ),
                'default'  => 'Hôtel Montaigne 5*',
                // 'placeholder' => ''
            ),
            array(
                'id'       => 'footer-restaurant-link-8',
                'type'     => 'text',
                'title'    => __( 'Restaurant Link 8', 'redux-framework' ),
                // 'subtitle' => __( 'Subtitle', 'redux-framework' ),
                'desc'     => __( 'Fill in here your link to Restaurant 8', 'redux-framework' ),
                'default'  => '',
                // 'placeholder' => ''
            ),
            array(
                'id'       => 'footer-restaurant-9',
                'type'     => 'text',
                'title'    => __( 'Restaurant 9', 'redux-framework' ),
                // 'subtitle' => __( 'Subtitle', 'redux-framework' ),
                'desc'     => __( 'Fill in here your Restaurant 9', 'redux-framework' ),
                'default'  => 'L’Entracte',
                // 'placeholder' => ''
            ),
            array(
                'id'       => 'footer-restaurant-link-9',
                'type'     => 'text',
                'title'    => __( 'Restaurant Link 9', 'redux-framework' ),
                // 'subtitle' => __( 'Subtitle', 'redux-framework' ),
                'desc'     => __( 'Fill in here your link to Restaurant 9', 'redux-framework' ),
                'default'  => '',
                // 'placeholder' => ''
            )
        )
    ) );

    //====================
    //Bottom menu
    //====================

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Copyright', 'redux-framework' ),
        'desc'       => __( 'Please, always insert your text on English', 'redux-framework' ),
        'id'         => 'foo-copyrights',
        'subsection' => true,
        'fields'     => array(         
            array(
                'id'       => 'footer-copyright',
                'type'     => 'text',
                'title'    => __( 'Copyright', 'redux-framework' ),
                // 'subtitle' => __( 'Subtitle', 'redux-framework' ),
                'desc'     => __( 'Fill in here your copyright legend (Year appears automatically).', 'redux-framework' ),
                'default'  => 'Food 2 Vous ©',
                // 'placeholder' => '01 47 20 20 40'
            ),
            array(
                'id'       => 'footer-mention',
                'type'     => 'text',
                'title'    => __( 'Legal mention', 'redux-framework' ),
                // 'subtitle' => __( 'This is the main description for your restaruant at the homepage', 'redux-framework' ),
                'desc'     => __( 'Fill in here your Legal mention label', 'redux-framework' ),
                'default'  => 'Legal mention',
            ),
            array(
                'id'       => 'footer-mention-link',
                'type'     => 'text',
                'title'    => __( 'Link to Legal mentions', 'redux-framework' ),
                // 'subtitle' => __( 'This is the main description for your restaruant at the homepage', 'redux-framework' ),
                'desc'     => __( 'Fill in here your link to Legal mentions.', 'redux-framework' ),
                // 'default'  => 'Legal mention',
            )
        )
    ) );


    //====================
    //Menu options
    //====================

    Redux::setSection( $opt_name, array(
        'title' => __( 'Menu options', 'redux-framework' ),
        'id'    => 'menu-section',
        'desc'  => __( '', 'redux-framework' ),
        'icon'  => 'el el-picture'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'À la carte', 'redux-framework' ),
        'id'         => 'menu-section-carte-options',
        'desc'       => __( 'Please, always insert your text on English', 'redux-framework' ) ,
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'menu-section-carte-label',
                'type'     => 'text',
                'title'    => __( 'Label', 'redux-framework' ),
                // 'subtitle' => __( 'Subtitle', 'redux-framework' ),
                'desc'     => __( 'Fill in here your Menu label.', 'redux-framework' ),
                'default'  => 'À la carte',
                // 'placeholder' => '01 47 20 20 40'
            ),
            array(
                'id'       => 'menu-section-carte-image',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Image', 'redux-framework' ),
                'compiler' => 'true',
                //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'     => __( 'Upload any media using the WordPress uploader. Recomended size image should have 531px x 340px', 'redux-framework' ),
                // 'subtitle' => __( 'Upload any media using the WordPress uploader.', 'redux-framework' ),
                'default'  => array( 'url' => 'http://www.cuyabroweb.com/dix-restos/wp-content/uploads/2015/09/menu-carte.jpg' ),
                //'hint'      => array(
                //    'title'     => 'Hint Title',
                //    'content'   => 'This is a <b>hint</b> for the media field with a Title.',
                //)
            )
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Menu du jour', 'redux-framework' ),
        'id'         => 'menu-section-daily-options',
        'desc'       => __( 'Please, always insert your text on English', 'redux-framework' ) ,
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'menu-section-daily-label',
                'type'     => 'text',
                'title'    => __( 'Label', 'redux-framework' ),
                // 'subtitle' => __( 'Subtitle', 'redux-framework' ),
                'desc'     => __( 'Fill in here your Menu label.', 'redux-framework' ),
                'default'  => 'Menu du jour',
                // 'placeholder' => '01 47 20 20 40'
            ),
            array(
                'id'       => 'menu-section-daily-image',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Image', 'redux-framework' ),
                'compiler' => 'true',
                //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'     => __( 'Upload any media using the WordPress uploader. Recomended size image should have 531px x 340px', 'redux-framework' ),
                // 'subtitle' => __( 'Upload any media using the WordPress uploader.', 'redux-framework' ),
                'default'  => array( 'url' => 'http://www.cuyabroweb.com/dix-restos/wp-content/uploads/2015/09/menu-jour.jpg' ),
                //'hint'      => array(
                //    'title'     => 'Hint Title',
                //    'content'   => 'This is a <b>hint</b> for the media field with a Title.',
                //)
            )
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Brunch', 'redux-framework' ),
        'id'         => 'menu-section-brunch-options',
        'desc'       => __( 'Please, always insert your text on English', 'redux-framework' ) ,
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'menu-section-brunch-label',
                'type'     => 'text',
                'title'    => __( 'Label', 'redux-framework' ),
                // 'subtitle' => __( 'Subtitle', 'redux-framework' ),
                'desc'     => __( 'Fill in here your Menu label.', 'redux-framework' ),
                'default'  => 'Le brunch',
                // 'placeholder' => '01 47 20 20 40'
            ),
            array(
                'id'       => 'menu-section-brunch-image',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Image', 'redux-framework' ),
                'compiler' => 'true',
                //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'     => __( 'Upload any media using the WordPress uploader. Recomended size image should have 531px x 340px', 'redux-framework' ),
                // 'subtitle' => __( 'Upload any media using the WordPress uploader.', 'redux-framework' ),
                'default'  => array( 'url' => 'http://www.cuyabroweb.com/dix-restos/wp-content/uploads/2015/09/menu-brunch.jpg' ),
                //'hint'      => array(
                //    'title'     => 'Hint Title',
                //    'content'   => 'This is a <b>hint</b> for the media field with a Title.',
                //)
            )
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Boissons', 'redux-framework' ),
        'id'         => 'menu-section-boissons-options',
        'desc'       => __( 'Please, always insert your text on English', 'redux-framework' ) ,
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'menu-section-boissons-label',
                'type'     => 'text',
                'title'    => __( 'Label', 'redux-framework' ),
                // 'subtitle' => __( 'Subtitle', 'redux-framework' ),
                'desc'     => __( 'Fill in here your Menu label.', 'redux-framework' ),
                'default'  => 'Nos boissons',
                // 'placeholder' => '01 47 20 20 40'
            ),
            array(
                'id'       => 'menu-section-boissons-image',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Image', 'redux-framework' ),
                'compiler' => 'true',
                //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'     => __( 'Upload any media using the WordPress uploader. Recomended size image should have 531px x 340px', 'redux-framework' ),
                // 'subtitle' => __( 'Upload any media using the WordPress uploader.', 'redux-framework' ),
                'default'  => array( 'url' => 'http://www.cuyabroweb.com/dix-restos/wp-content/uploads/2015/09/menu-boisson.jpg' ),
                //'hint'      => array(
                //    'title'     => 'Hint Title',
                //    'content'   => 'This is a <b>hint</b> for the media field with a Title.',
                //)
            )
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Special', 'redux-framework' ),
        'id'         => 'menu-section-special-options',
        'desc'       => __( 'Please, always insert your text on English', 'redux-framework' ) ,
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'menu-section-special-label',
                'type'     => 'text',
                'title'    => __( 'Label', 'redux-framework' ),
                // 'subtitle' => __( 'Subtitle', 'redux-framework' ),
                'desc'     => __( 'Fill in here your Menu label.', 'redux-framework' ),
                'default'  => 'Menu Special',
                // 'placeholder' => '01 47 20 20 40'
            ),
            array(
                'id'       => 'menu-section-special-image',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Image', 'redux-framework' ),
                'compiler' => 'true',
                //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'     => __( 'Upload any media using the WordPress uploader. Recomended size image should have 531px x 340px', 'redux-framework' ),
                // 'subtitle' => __( 'Upload any media using the WordPress uploader.', 'redux-framework' ),
                'default'  => array( 'url' => 'http://www.cuyabroweb.com/dix-restos/wp-content/uploads/2015/09/menu-special.jpg' ),
                //'hint'      => array(
                //    'title'     => 'Hint Title',
                //    'content'   => 'This is a <b>hint</b> for the media field with a Title.',
                //)
            )
        )
    ) );

//====================
// Colors
//====================

    // -> START Color Selection
    Redux::setSection( $opt_name, array(
        'title' => __( 'Colors', 'redux-framework' ),
        'id'    => 'color-section',
        'desc'  => __( '', 'redux-framework' ),
        'icon'  => 'el el-tint'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'General', 'redux-framework' ),
        'id'         => 'site-color',
        // 'desc'       => __( 'For full documentation on this field, visit: ', 'redux-framework' ) . '<a href="http://docs.reduxframework.com/core/fields/color/" target="_blank">http://docs.reduxframework.com/core/fields/color/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'site-background',
                'type'     => 'background',
                'output'   => array( '.site' ),
                'title'    => __( 'Site Background', 'redux-framework' ),
                'subtitle' => __( 'Pick a footer background for the theme (default: #efe8e8).', 'redux-framework' ),
                'default' => array(
                    'background-color'  => '#efe8e8',
                    'background-image'  => 'http://www.casaluca.fr/etoile/wp-content/uploads/2015/09/cube.svg',
                    'background-attachment' => 'inherit',
                    'background-position' => 'center center',
                    'background-repeat' => 'repeat',
                ),
                // 'validate' => 'color',
                // 'background-repeat' => false,
                // 'background-image' => false,

                // 'background-attachment' => false,
                // 'background-position' => false,              
                'background-size' => false
            ),
            array(
                'id'       => 'site-color',
                'type'     => 'color',
                'output'   => array( 'body' ),
                'title'    => __( 'Site text color', 'redux-framework' ),
                'subtitle' => __( 'Pick a color for the Site (default: #404040).', 'redux-framework' ),
                'default'  => '#404040',
                'validate' => 'color',
            ),
            array(
                'id'       => 'site-color-links',
                'type'     => 'color',
                'output'   => array( 'a', '.legend--inline-block' ),
                'title'    => __( 'Site links color', 'redux-framework' ),
                'subtitle' => __( 'Pick a color for the Site (default: #404040).', 'redux-framework' ),
                'default'  => '#404040',
                'validate' => 'color',
            )
        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Header', 'redux-framework' ),
        'id'         => 'header-color',
        // 'desc'       => __( 'For full documentation on this field, visit: ', 'redux-framework' ) . '<a href="http://docs.reduxframework.com/core/fields/color/" target="_blank">http://docs.reduxframework.com/core/fields/color/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'header-background',
                'type'     => 'background',
                'output'   => array( '.site-header' ),
                'title'    => __( 'Header Background Color', 'redux-framework' ),
                'subtitle' => __( 'Pick a header background for the theme (default: #ffffff).', 'redux-framework' ),
                'default' => array(
                    'background-color'  => '#ffffff'
                ),
                'validate' => 'color',
                'background-repeat' => false,
                'background-attachment' => false,
                'background-position' => false,
                'background-image' => false,
                'background-clip' => false,
                'background-origin' => false,
                'background-size' => false
            ),
            array(
                'id'       => 'header-menu-color',
                'type'     => 'color',
                'output'   => array( '.main-navigation a' ),
                'title'    => __( 'Menu Color', 'redux-framework' ),
                'subtitle' => __( 'Pick a color for the menu (default: #404040).', 'redux-framework' ),
                'default'  => '#404040',
                'validate' => 'color',
            ),
            array(
                'id'       => 'header-menu-bottom-color',
                'type'     => 'border',
                'output'   => array(
                    '.main-navigation .current-menu-item > a',
                    '.main-navigation .current_page_ancestor > a',
                    '.main-navigation .current_page_item>a',
                    '.main-navigation a:hover'
                ),
                'title'    => __( 'Menu botom line', 'redux-framework' ),
                'subtitle' => __( 'Define a color for your menu bottom border (default: #cd0001).', 'redux-framework' ),
                // 'default'  => '#cd0001',
                // 'validate' => 'color',
                'all' => false,
                'top' => false,
                'left' => false,
                'right' => false,
                'bottom' => true,
                'style' => true,
                'default' => array(
                    'border-color'  => '#cd0001',
                    'border-style'  => 'solid',
                    'border-bottom' => '4px'
                )
            ),
            array(
                'id'       => 'header-social-menu-color',
                'type'     => 'background',
                'output'   => array( '.site-header .nav-social a' ),
                'title'    => __( 'Social Menu Background Color', 'redux-framework' ),
                'subtitle' => __( 'Define a background color for your social menu (default: #cd0001).', 'redux-framework' ),
                'default' => array(
                    'background-color'  => '#cd0001'
                ),
                'validate' => 'color',
                'background-repeat' => false,
                'background-attachment' => false,
                'background-position' => false,
                'background-image' => false,
                'background-clip' => false,
                'background-origin' => false,
                'background-size' => false
            ),
            array(
                'id'       => 'header-phone-color',
                'type'     => 'color',
                'output'   => array( '.nav-lang__phone' ),
                'title'    => __( 'Header phone text color', 'redux-framework' ),
                'subtitle' => __( 'Pick a color for the header phone', 'redux-framework' ),
                // 'default'  => '#404040',
                'validate' => 'color',
            ),
        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Footer', 'redux-framework' ),
        'id'         => 'footer-color',
        // 'desc'       => __( 'For full documentation on this field, visit: ', 'redux-framework' ) . '<a href="http://docs.reduxframework.com/core/fields/color/" target="_blank">http://docs.reduxframework.com/core/fields/color/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'footer-background',
                'type'     => 'background',
                'output'   => array( '.site-footer' ),
                'title'    => __( 'Footer Background Color', 'redux-framework' ),
                'subtitle' => __( 'Pick a footer background for the theme (default: #535353).', 'redux-framework' ),
                'default' => array(
                    'background-color'  => '#535353'
                ),
                'validate' => 'color',
                'background-repeat' => false,
                'background-attachment' => false,
                'background-position' => false,
                'background-image' => false,
                'background-clip' => false,
                'background-origin' => false,
                'background-size' => false
            ),
            array(
                'id'       => 'footer-color',
                'type'     => 'color',
                'output'   => array( '.site-footer' ),
                'title'    => __( 'Footer text Color', 'redux-framework' ),
                'subtitle' => __( 'Pick a color for the footer (default: #989898).', 'redux-framework' ),
                'default'  => '#989898',
                'validate' => 'color',
            ),
            array(
                'id'       => 'footer-social-menu-color',
                'type'     => 'background',
                'output'   => array( '.menu-social .menu-item a' ),
                'title'    => __( 'Social Menu Background Color', 'redux-framework' ),
                'subtitle' => __( 'Define a background color for your social menu (default: #cd0001).', 'redux-framework' ),
                'default' => array(
                    'background-color'  => '#cd0001'
                ),
                'validate' => 'color',
                'background-repeat' => false,
                'background-attachment' => false,
                'background-position' => false,
                'background-image' => false,
                'background-clip' => false,
                'background-origin' => false,
                'background-size' => false
            ),
            array(
                'id'       => 'footer-googlemap-border',
                'type'     => 'border',
                'output'   => array(
                    '.site-footer .site-info__rigth'
                ),
                'title'    => __( 'Google map left border', 'redux-framework' ),
                'subtitle' => __( 'Define a color for the google maps left border (default: #cd0001).', 'redux-framework' ),
                // 'default'  => '#cd0001',
                // 'validate' => 'color',
                'all' => false,
                'top' => false,
                'left' => true,
                'right' => false,
                'bottom' => false,
                'style' => true,
                'default' => array(
                    'border-color'  => '#cd0001',
                    'border-style'  => 'solid',
                    'border-left' => '5px'
                )
            )
        ),
    ) );

//====================
// Colors
//====================

    // -> START Color Selection
    Redux::setSection( $opt_name, array(
        'title' => __( 'Google Analytics', 'redux-framework' ),
        'id'    => 'google-ga-section',
        'desc'  => __( '', 'redux-framework' ),
        'icon'  => 'el el-globe'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Code', 'redux-framework' ),
        'id'         => 'google-ga-code',
        // 'desc'       => __( 'For full documentation on this field, visit: ', 'redux-framework' ) . '<a href="http://docs.reduxframework.com/core/fields/color/" target="_blank">http://docs.reduxframework.com/core/fields/color/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'footer-google-analytics',
                'type'     => 'textarea',
                'title'    => __( 'Tracking Code', 'redux-framework' ),
                // 'subtitle' => __( '', 'redux-framework' ),
                'desc'     => __( 'Add your Google Analytics script here. Please include your script tags ', 'redux-framework' ),
                'placeholder' => '<script type="text/javascript">
    var _gaq = _gaq || [];
  _gaq.push(["_setAccount", "UA-XXXXX-X"]);
  _gaq.push(["_trackPageview"]);
  (function() {
    var ga = document.createElement("script"); ga.type = "text/javascript"; ga.async = true;
    ga.src = ("https:"" == document.location.protocol ? "https://ssl" : "http://www") + ".google-analytics.com/ga.js";
    var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
'
            )
        ),
    ) );


//====================
// Fin
//====================

    if ( file_exists( dirname( __FILE__ ) . '/../README.md' ) ) {
        $section = array(
            'icon'   => 'el el-list-alt',
            'title'  => __( 'Documentation', 'redux-framework' ),
            'fields' => array(
                array(
                    'id'       => '17',
                    'type'     => 'raw',
                    'markdown' => true,
                    'content'  => file_get_contents( dirname( __FILE__ ) . '/../README.md' )
                ),
            ),
        );
        Redux::setSection( $opt_name, $section );
    }
    /*
     * <--- END SECTIONS
     */

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    // function compiler_action( $options, $css, $changed_values ) {
    //     echo '<h1>The compiler hook has run!</h1>';
    //     echo "<pre>";
    //     print_r( $changed_values ); // Values that have changed since the last save
    //     echo "</pre>";
    //     //print_r($options); //Option values
    //     //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
    // }

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
                $return['error'] = $field;
                $field['msg']    = 'your custom error message';
            }

            if ( $warning == true ) {
                $return['warning'] = $field;
                $field['msg']      = 'your custom warning message';
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
    function dynamic_section( $sections ) {
        //$sections = array();
        $sections[] = array(
            'title'  => __( 'Section via hook', 'redux-framework' ),
            'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'redux-framework' ),
            'icon'   => 'el el-paper-clip',
            // Leave this as a blank section, no options just some intro text set above.
            'fields' => array()
        );

        return $sections;
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    function change_arguments( $args ) {
        //$args['dev_mode'] = true;

        return $args;
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    function change_defaults( $defaults ) {
        $defaults['str_replace'] = 'Testing filter hook!';

        return $defaults;
    }

    // Remove the demo link and the notice of integrated demo from the redux-framework plugin
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

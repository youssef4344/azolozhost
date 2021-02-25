<?php
	
// Filters that allow shortcodes in Text Widgets

add_filter('widget_text', 'shortcode_unautop');
add_filter('widget_text', 'do_shortcode');
add_filter('the_content_rss', 'do_shortcode');

// Thumbnails

add_theme_support( 'post-thumbnails' );  
set_post_thumbnail_size( 478, 250, true );  // Homepage thumbnails
add_image_size( 'random-thumbnails', 204, 124, true ); // Random posts thumbnails
add_image_size( 'random-thumbnails-sidebar', 300, 182, true ); // Random posts thumbnails in sidebar
update_option('medium_size_w', 760); // Post Image Uploader Medium Size
add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) );

// Disable Default Post Image Upload Sizes

function disable_remove_default_image_sizes( $sizes) {
    unset( $sizes['thumbnail']); 
    unset( $sizes['large']); 
    return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'disable_remove_default_image_sizes');

// Disable Default Image Links

function wpb_imagelink_setup() {
	$image_set = get_option( 'image_default_link_type' );
	if ($image_set !== 'none') {
		update_option('image_default_link_type', 'none');
	}
}
add_action('admin_init', 'wpb_imagelink_setup', 10);

// Tags Cloud Min/Max Font Size

add_filter('widget_tag_cloud_args','set_tag_cloud_sizes');
function set_tag_cloud_sizes($args) {
$args['smallest'] = 16;
$args['largest'] = 26;
return $args; }

// Homepage Title

add_filter( 'wp_title', 'home_title' );
function home_title( $title )
{
  if( empty( $title ) && ( is_home() || is_front_page() ) ) {
    return __( '', 'theme_domain' ) . get_bloginfo('title');
  }
  return $title;
}

// Responsive Container for Embeds

function lipode_embed_html( $html ) {
    return '<div class="video-container">' . $html . '</div>';
}
add_filter( 'embed_oembed_html', 'lipode_embed_html', 10, 3 );
add_filter( 'video_embed_html', 'lipode_embed_html' ); // Jetpack

// Register Header Menu

function register_header_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_header_menu' );

// Register Footer Menu

function register_footer_menu() {
  register_nav_menu('footer-menu',__( 'Footer Menu' ));
}
add_action( 'init', 'register_footer_menu' );

// Register Widget Areas

function lipode_widgets_init() {
	register_sidebar(array(
		'name'=> __('Sidebar', 'lipode'),
		'id' => 'sidebar',
		'description'   => __( 'Widget area on the sidebar.', 'lipode' ),
		'before_widget' => '<div class="clear"></div>',
		'after_widget' => '',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
}
add_action( 'widgets_init', 'lipode_widgets_init' );

function lipode_widgets_init2() {
	register_sidebar(array(
		'name'=> __('Random Posts Top', 'lipode'),
		'id' => 'header',
		'description'   => __( 'Widget area to display random posts at top of the page.', 'lipode' ),
		'before_widget' => '<div class="random-container-top">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title-top-bottom">',
		'after_title' => '</h3>',
	));
}
add_action( 'widgets_init', 'lipode_widgets_init2' );

function lipode_widgets_init3() {
	register_sidebar(array(
		'name'=> __('Random Posts Bottom', 'lipode'),
		'id' => 'footer',
		'description'   => __( 'Widget area to display random posts at bottom of the page.', 'lipode' ),
		'before_widget' => '<div class="random-container-bottom">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title-top-bottom">',
		'after_title' => '</h3>',
	));
}
add_action( 'widgets_init', 'lipode_widgets_init3' );

function lipode_widgets_init4() {
	register_sidebar(array(
		'name'=> __('Post Ads Top', 'lipode'),
		'id' => 'before_content',
		'description'   => __( 'Widget area to display ads at top of the post.', 'lipode' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3 class="post-ads">',
		'after_title' => '</h3>',
	));
}
add_action( 'widgets_init', 'lipode_widgets_init4' );

function lipode_widgets_init5() {
	register_sidebar(array(
		'name'=> __('Post Ads Bottom', 'lipode'),
		'id' => 'after_content',
		'description'   => __( 'Widget area to display ads at bottom of post.', 'lipode' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3 class="post-ads">',
		'after_title' => '</h3>',
	));
}
add_action( 'widgets_init', 'lipode_widgets_init5' );

?>
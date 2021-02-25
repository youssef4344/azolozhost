<?php

// Theme Customization

function theme_customize_register( $wp_customize ) {

// Google Fonts

  $wp_customize->add_section('arbitrage_font_selector', array(
    'title'    => __('Fonts', 'arbitrage'),
    'priority' => 50,
  ));

  $fonts = arbitrage_get_gfonts();
  $newarray = array();
  $newarray[] = '';
  foreach ($fonts as $index => $font) {
    foreach ($font->files as $key => $value) {
      $newarray[$font->family . ':dw:' . $value ] = $font->family . ' - ' . $key;
    }
  }

  $wp_customize->add_setting('arbitrage_theme_options[heading_font]', array(
    'default'        => '',
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
  ));
  $wp_customize->add_control( 'heading_font', array(
    'settings' => 'arbitrage_theme_options[heading_font]',
    'label'   => __('Heading Font Style', 'arbitrage'),
    'section' => 'arbitrage_font_selector',
    'type'    => 'select',
    'choices'    => $newarray
  ));

  $wp_customize->add_setting('arbitrage_theme_options[body_font]', array(
    'default'        => '',
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
  ));
  $wp_customize->add_control( 'body_font', array(
    'settings' => 'arbitrage_theme_options[body_font]',
    'label'   => __('Body Font Style', 'arbitrage'),
    'section' => 'arbitrage_font_selector',
    'type'    => 'select',
    'choices'    => $newarray
  ));
  
   // Menu Logo Text Size
  
    $wp_customize->add_setting('arbitrage_theme_options[site_title_size]', array(
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
    'default'        => '38'
  ));
  $wp_customize->add_control('site_title_size', array(
    'label'      => __('Site Title Size (px)', 'arbitrage'),
    'section'    => 'arbitrage_font_selector',
    'settings'   => 'arbitrage_theme_options[site_title_size]'
  ));
  
  // Menu Item Size
  
    $wp_customize->add_setting('arbitrage_theme_options[menu_item_font_size]', array(
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
    'default'        => '22'
  ));
  $wp_customize->add_control('menu_item_font_size', array(
    'label'      => __('Menu Item Size (px)', 'arbitrage'),
    'section'    => 'arbitrage_font_selector',
    'settings'   => 'arbitrage_theme_options[menu_item_font_size]'
  ));
  
  // H1 Title Size
  
    $wp_customize->add_setting('arbitrage_theme_options[h1]', array(
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
    'default'        => '36'
  ));
  $wp_customize->add_control('h1', array(
    'label'      => __('H1 Title Size (px)', 'arbitrage'),
    'section'    => 'arbitrage_font_selector',
    'settings'   => 'arbitrage_theme_options[h1]'
  ));
  
  // H2 Title Size
  
    $wp_customize->add_setting('arbitrage_theme_options[h2]', array(
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
    'default'        => '22'
  ));
  $wp_customize->add_control('h2', array(
    'label'      => __('H2 Title Size (px)', 'arbitrage'),
    'section'    => 'arbitrage_font_selector',
    'settings'   => 'arbitrage_theme_options[h2]'
  ));
  
  // Content Text Size
  
    $wp_customize->add_setting('arbitrage_theme_options[p]', array(
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
    'default'        => '18'
  ));
  $wp_customize->add_control('p', array(
    'label'      => __('Content Text Size (px)', 'arbitrage'),
    'section'    => 'arbitrage_font_selector',
    'settings'   => 'arbitrage_theme_options[p]'
  ));


  // Widget Title Size
  
    $wp_customize->add_setting('arbitrage_theme_options[widget_h3]', array(
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
    'default'        => '20'
  ));
  $wp_customize->add_control('widget_h3', array(
    'label'      => __('Widget Title Size (px)', 'arbitrage'),
    'section'    => 'arbitrage_font_selector',
    'settings'   => 'arbitrage_theme_options[widget_h3]'
  ));


// Colors
	
$colors = array();
	$colors[] = array(
	  'slug'=>'menu_color', 
	  'default' => '#ffffff',
	  'label' => __('Menu Color', 'theme')
	);
	$colors[] = array(
	  'slug'=>'logo_icon_background_color', 
	  'default' => '#ffffff',
	  'label' => __('Logo Icon Background Color', 'theme')
	);
	$colors[] = array(
	  'slug'=>'menu_link_color', 
	  'default' => '#4c585c',
	  'label' => __('Menu Link Color', 'theme')
	);
	$colors[] = array(
	  'slug'=>'menu_link_hover_color', 
	  'default' => '#ffffff',
	  'label' => __('Menu Link Hover Color', 'theme')
	);
	$colors[] = array(
	  'slug'=>'menu_link_background_hover_color', 
	  'default' => '#ff7300',
	  'label' => __('Menu Link Background Hover Color', 'theme')
	);
	$colors[] = array(
	  'slug'=>'h1_color', 
	  'default' => '#4c585c',
	  'label' => __('H1, H3 Color', 'theme')
	);
	$colors[] = array(
	  'slug'=>'link_color', 
	  'default' => '#4c585c',
	  'label' => __('Link Color', 'theme')
	);
	$colors[] = array(
	  'slug'=>'link_hover_color', 
	  'default' => '#ff7300',
	  'label' => __('Link Hover Color', 'theme')
	);
	$colors[] = array(
	  'slug'=>'thumbnail_hover_color', 
	  'default' => '#ffffff',
	  'label' => __('Thumbnail Hover Color', 'theme')
	);
	foreach( $colors as $color ) {
		
	// SETTINGS
	  $wp_customize->add_setting(
	    $color['slug'], array(
	      'default' => $color['default'],
	      'type' => 'option', 
	      'capability' => 
	      'edit_theme_options'
	    )
	  );
	  
	  // Controls for Colors
	  $wp_customize->add_control(
	  	new WP_Customize_Color_Control(
	      $wp_customize,
	      $color['slug'], 
	      array('label' => $color['label'], 
	      'section' => 'colors',
	      'settings' => $color['slug'])
        )
	);
} 

// end of custom colors


// Logo image uploader

  $wp_customize->add_section( 'theme_logo_section' , array(
    'title'       => __( 'Logo Image', 'theme' ),
    'priority'    => 30,
    'description' => 'Upload an image to replace the default site name and description with a logo in the header. Default size: 260x48 px',
) );
	$wp_customize->add_setting( 'theme_logo' );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 	'theme_logo', array(
    'label'    => __( 'Logo Image', 'theme' ),
    'section'  => 'theme_logo_section',
    'settings' => 'theme_logo',
) ) );
}
add_action( 'customize_register', 'theme_customize_register' );

// Logo icon uploader

function arbitrage_theme_customizer( $wp_customize ) {
    $wp_customize->add_section( 'arbitrage_logo_section' , array(
    'title'       => __( 'Logo Icon', 'arbitrage' ),
    'priority'    => 30,
    'description' => 'Upload an icon to have an icon below the site title in the header. Default size: 60x60 px',
) );
$wp_customize->add_setting( 'arbitrage_logo' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'arbitrage_logo', array(
    'label'    => __( 'Logo Icon', 'arbitrage' ),
    'section'  => 'arbitrage_logo_section',
    'settings' => 'arbitrage_logo',
) ) );
}

add_action( 'customize_register', 'arbitrage_theme_customizer' );

?>
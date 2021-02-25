<?php
	
// Get Theme options
 
function arbitrage_get_theme_option( $option_name, $default = false ) {
  $options = get_option( 'arbitrage_theme_options' );
  if( isset($options[$option_name]) && ! empty( $options[$option_name] ) ) {
    return $options[$option_name];
  }
  return $default; 
}
  
// Get Google Fonts

if( ! function_exists('arbitrage_get_gfonts') ) {
  function arbitrage_get_gfonts(){
    $fontsSeraliazed = wp_remote_fopen( get_template_directory_uri() . '/functions/fonts/gfonts_v2.txt' );
    $fontArray = unserialize( $fontsSeraliazed );
    return $fontArray->items;
  }
}

// Google Fonts Selector

if( ! function_exists('arbitrage_typo_font') ) {
  function arbitrage_typo_font(){
    if (arbitrage_get_theme_option('heading_font') && arbitrage_get_theme_option('heading_font') != '') {
      $heading_font = explode(':dw:', arbitrage_get_theme_option('heading_font') );
      ?>
        <style type="text/css" id="heading_font" media="screen">
          @font-face {
            font-family: "<?php echo $heading_font[0] ?>";
            src: url('<?php echo $heading_font[1] ?>');
          } 
          h1,h2,h3,h4,h5,h6, .header a, .share, .share-bottom, .sidebar, .sidebar a, .footer, .footer a, .widget-title, blockquote {
            font-family: "<?php echo $heading_font[0] ?>" !important;
          }
        </style>
      <?php
    }
    if (arbitrage_get_theme_option('body_font') && arbitrage_get_theme_option( 'body_font') != '') {
      $body_font = explode( ':dw:', arbitrage_get_theme_option('body_font') );
      ?>
        <style type="text/css" id="body_font" media="screen">
          @font-face {
            font-family: "<?php echo $body_font[0] ?>";
            src: url('<?php echo $body_font[1] ?>');
          } 
          html, body{
            font-family: "<?php echo $body_font[0] ?>" !important;
          }
        </style>
      <?php
    }
    if (arbitrage_get_theme_option( 'p') && arbitrage_get_theme_option( 'p') != '') {
    ?>
    <style type="text/css" id="article_font-size" media="screen">
         body, .single a, .post-content p, .page-content p, .entry-content, blockquote cite{
          font-size: <?php echo arbitrage_get_theme_option( 'p' ).'px'; ?> !important;
        }
      </style>
    <?php
  }
    if (arbitrage_get_theme_option( 'h1') && arbitrage_get_theme_option( 'h1') != '') {
    ?>
    <style type="text/css" id="h1_font-size" media="screen">
        h1{
          font-size: <?php echo arbitrage_get_theme_option( 'h1' ).'px'; ?>;
        }
      </style>
    <?php
  }
    if (arbitrage_get_theme_option( 'h2') && arbitrage_get_theme_option( 'h2') != '') {
    ?>
    <style type="text/css" id="h2_font-size" media="screen">
	     .post-title h2, .sidebar h4{
          font-size: <?php echo arbitrage_get_theme_option( 'h2' ).'px'; ?> !important;
        }
      </style>
    <?php
  }
 	 if (arbitrage_get_theme_option( 'widget_h3') && arbitrage_get_theme_option( 'widget_h3') != '') {
    ?>
    <style type="text/css" id="widget_h3_font-size" media="screen">
	     .widget-title{
          font-size: <?php echo arbitrage_get_theme_option( 'widget_h3' ).'px'; ?> !important;
        }
      </style>
    <?php
  }
  if (arbitrage_get_theme_option( 'site_title_size') && arbitrage_get_theme_option( 'site_title_size') != '') {
    ?>
    <style type="text/css" id="site_title_size" media="screen">
	     .logo-text{
          font-size: <?php echo arbitrage_get_theme_option( 'site_title_size' ).'px'; ?> !important;
        }
      </style>
    <?php
  }
  	if (arbitrage_get_theme_option( 'menu_item_font_size') && arbitrage_get_theme_option( 'menu_item_font_size') != '') {
    ?>
    <style type="text/css" id="menu_item_font-size" media="screen">
	     .header-nav a{
          font-size: <?php echo arbitrage_get_theme_option( 'menu_item_font_size' ).'px'; ?> !important;
        }
      </style>
    <?php
  }
  }
  add_filter('wp_head','arbitrage_typo_font');
}

?>

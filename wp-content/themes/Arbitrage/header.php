<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<title><?php wp_title(''); ?></title>
	<meta http-equiv="Content-Language" content="en_US" />
	<meta http-equiv="imagetoolbar" content="no" />
	<meta property="fb:app_id" content="" />
	<link rel="stylesheet" data-them="" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="all" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/responsive.css" type="text/css" media="all" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
	<?php include_once("functions/share/share.js"); ?>
	<?php include_once("functions/customize/customcolors.php"); ?>
	<?php include_once("functions/scrolltop/scrolltop.js"); ?>
	<?php wp_head(); ?>
	<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/functions/font-awesome/css/font-awesome.min.css">
</head>
<body>
	<div class="thetop"></div>
	<div class="scrolltop" style="z-index:999999;">
	    <div class="scroll icon"><i class="fa fa-4x fa-arrow-circle-up"></i></div>
	</div>
	<div class="header">
		<div class="header-container">
			<?php if (get_theme_mod('theme_logo')){ ?>
	
	<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
    	<div class='logo-image'>
        	<img src='<?php echo esc_url( get_theme_mod( 'theme_logo' )); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' )); ?>'>
        </div>
    </a>

<?php } else if(get_theme_mod('arbitrage_logo') != null){ ?>
	<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
		<div class="logo-icon">
			<img src='<?php echo esc_url( get_theme_mod( 'arbitrage_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
		</div>
		<div class="logo-text">
	 		<?php bloginfo( 'name' ); ?>
	 	</div>
	</a>
<?php } else { ?>
	
	<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
		<div class="logo-text">
	 		<?php bloginfo( 'name' ); ?>
	 	</div>
	</a>

<?php } ?>
				<div class="header-left">
					<?php wp_nav_menu( array( 'theme_location' => 'header-menu' , 'container_class' => 'header-nav' ) ); ?>
				</div>
				
				<form id="category-select" class="category-select" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
				    <!-- font icon-->
					<div class="fa fa-bars"></div>
					<!-- select dropdown -->
					<?php $args = array(
						'show_count'       => 0,
						'orderby'          => 'name',
						'echo'             => 0,
						);
					?>
					<?php $select  = wp_dropdown_categories( $args ); ?>
					<?php $replace = "<select$1 onchange='return this.form.submit()'>"; ?>
					<?php $select  = preg_replace( '#<select([^>]*)>#', $replace, $select ); ?>
					<?php echo $select; ?>
					<!-- input fallback -->
					<noscript>
						<input type="submit" value="View" />
					</noscript>
				</form>
				
				<div class="header-right">		
					<?php if ( is_single() ) {
						echo '<div class="header-post-nav">';
						next_post_link('%link', '<div class="prev-post"><i class="fa fa-chevron-left fa-2x"></i></div>');
						previous_post_link('%link', '<div class="next-post"><i class="fa fa-chevron-right fa-2x"></i></div>');
						echo '<a href="?random=1"><div class="random-post"><i class="fa fa-random fa-2x"></i></div></a>';
						echo '</div>';
					} ?>
					<div class="search-form">	
						<?php get_search_form(); ?>
					</div>
				</div>
		</div>
    </div>
<div class="clear"></div>
<div class="wrapper">
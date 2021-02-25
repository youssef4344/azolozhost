<?php
	$menu_color = get_option('menu_color');
	$logo_icon_background_color = get_option('logo_icon_background_color');
	$menu_link_color = get_option('menu_link_color');
	$menu_link_hover_color = get_option('menu_link_hover_color');
	$menu_link_background_hover_color = get_option('menu_link_background_hover_color');
	$h1_color = get_option('h1_color');
	$link_color = get_option('link_color');
	$link_hover_color = get_option('link_hover_color');
	$thumbnail_hover_color = get_option('thumbnail_hover_color');
?>

<style>
	.header, .footer, .widget-title, .search-field:focus, .header-nav ul li:hover > ul{background: <?php echo $menu_color; ?>;}
	h1, h3, .scroll .fa{color: <?php echo $menu_link_color; ?>;}
	h1, h3{color: <?php echo $h1_color; ?>;}
	.scroll .fa:hover{color: <?php echo $link_hover_color; ?>;}
	.header-nav a, .fa, .footer, .footer a, .logo-text, .search-field, .widget-title, .text_first, .text_second, .search-field:focus, .search-form ::-webkit-input-placeholder{color: <?php echo $menu_link_color; ?>;}
	.header-nav a:hover, .logo-text:hover{color: <?php echo $menu_link_hover_color; ?>; background: <?php echo $menu_link_background_hover_color; ?>;}
	a{color: <?php echo $link_color; ?>;}
	a:hover{color: <?php echo $link_hover_color; ?>;}
	.fa:hover{color: <?php echo $menu_link_background_hover_color; ?>;}
	.logo-icon{background: <?php echo $logo_icon_background_color; ?>;}
	.post-thumb, .post-thumb-small, .post-thumb-medium{background: <?php echo $thumbnail_hover_color; ?>;}
	.p-btn, .n-btn{background: <?php echo $menu_link_background_hover_color; ?>;}
	.p-btn:hover, .n-btn:hover{background: <?php echo $link_color; ?>;}
</style>
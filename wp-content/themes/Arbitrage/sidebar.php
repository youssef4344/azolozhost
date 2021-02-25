<div class="sidebar">	
	<?php if ( is_home() or is_category() ) { ?>
		<div class="clear"></div>
			<?php dynamic_sidebar( 'Home' ); ?>
		<div class="clear"></div>
			<?php } else { ?>
				<?php dynamic_sidebar( 'Sidebar' ); ?>
			<div class="clear"></div>
	<?php } ?>			
</div>
<?php include 'header.php'; ?>
<div class="home-content">
	<?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>
	<div class="home-post">
		<a href="<?php the_permalink() ?>">
			<div class="post">
				<div class="post-thumb">
					<?php if ( has_post_thumbnail() ) {
					the_post_thumbnail();
					} else { ?>
					<div class="no-thumb">Missing Featured Image</div>
					<?php } ?>
				</div>
				<div class="clear"></div>
				<div class="post-title">
					<h2><span><?php the_title(); ?></span></h2>
				</div>
			</div>
		</a>
	</div>

	<?php endwhile; ?>

	<?php else : ?>
		<div class="home-content">
			<div class="single-title">
				<h1><span>404 - Page Not Found</span></h1>
				<div class="clear"></div>
				<div class="single">
					<div id="not-found"><i class="fa fa-meh-o"></i><p>Oops! We couldn't find this Page.</p></div>
				</div>	
			</div>
		</div>
	<?php endif; ?>
	
	<div class="clear"></div>
	<div class="nav">
		<div class="navlink"><?php next_posts_link('') ?></div>
	</div>
</div>

<div class="clear"></div>
<?php include 'footer.php'; ?>
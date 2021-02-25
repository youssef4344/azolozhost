<?php include 'header.php'; ?>
	<div class="post-content">
	<?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>
		<div class="single-title">
			<h1><span><?php the_title(); ?></span></h1>
		</div>
		<div class="clear"></div>
		<div class="single">
			<?php the_content(); ?>
		</div>	
		<?php endwhile; ?>
		<?php else : ?>
			<div class="post-content">
				<div class="single-title">
					<h1><span>404 - Page Not Found</span></h1>
					<div class="clear"></div>
					<div class="single">
						<div id="not-found"><i class="fa fa-meh-o"></i><p>Oops! We couldn't find this Page.</p></div>
					</div>	
				</div> 
			</div>
		<?php endif; ?>
	</div> 
	
<?php include 'sidebar.php'; ?>
<div class="clear"></div>

<?php dynamic_sidebar('Footer'); ?>
<div class="clear"></div>
<?php include 'footer.php'; ?>
</div>
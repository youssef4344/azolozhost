</div><!-- Wrapper End -->

<div class="footer">
	<div class="footer-container">
		<div class="footer-copy">
			@ <?php echo date('Y'); ?> <?php echo $blog_title = get_bloginfo('title'); ?>. <a href="" target="_blank"></a> Inc, All Rights Reserved <a href="http://www.azoloz.com" target="_blank"></a>
		</div>
		<div class="footer-nav">
			<?php wp_nav_menu( array('menu' => 'Footer' )); ?>
		</div>
	</div>
</div>

<?php wp_footer(); ?> 

</body>
</html>
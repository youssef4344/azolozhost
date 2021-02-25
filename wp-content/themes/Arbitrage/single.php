<?php include 'header.php'; ?>
<?php dynamic_sidebar('Header'); ?>
	<div class="post-content">
	<?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>
		<div class="single-title">
			<h1><span><?php the_title(); ?></span></h1>
		</div>
			<div class="clear"></div>
			<?php dynamic_sidebar('before_content'); ?>
			<div class="clear"></div>
		<div class="single">
			<?php if($numpages > 1) { 
				echo "<hr><div class='post-pagination clearfix'><div class='col-xs-12 col-md-4 col-lg-4'><div class='page-nav-number'>Page $page of $numpages</div></div>"; 
				}
			?>
			<?php
				$defaults = array(
					'before'           => '<div class="col-xs-12 col-md-8 col-lg-8">',
					'after'            => '</div>',
					'link_before'      => '',
					'link_after'       => '',
					'next_or_number'   => 'next',
					'separator'        => ' ',
					'nextpagelink'     => __( '<div class="btn n-btn">Next Page <span class="fa fa-arrow-right"></span></div>' ),
					'previouspagelink' => __( '' ),
					'pagelink'         => '%',
					'echo'             => 1
				);
				wp_link_pages( $defaults );
			?>
			<?php 
				global $multipage, $numpages, $page;
					if( $multipage && $page == $numpages )
						echo "<a href='?random=1'><div class='col-xs-12 col-md-8 col-lg-8'><div class='btn n-btn'>Next Post <span class='fa fa-arrow-right'></span></div></div></a>";
			?>
			<?php if($numpages > 1) { 
				 echo "<div class='clear'></div></div><hr>"; 
				}
			?>		
			<?php the_content(); ?>	
			
			<?php if($numpages > 1) { 
				echo "<hr><div class='post-pagination clearfix'><div class='col-xs-12 col-md-4 col-lg-4'><div class='page-nav-number'>Page $page of $numpages</div></div>"; 
				}
			?>
			<?php
				$defaults = array(
					'before'           => '<div class="col-xs-12 col-md-8 col-lg-8">',
					'after'            => '</div>',
					'link_before'      => '',
					'link_after'       => '',
					'next_or_number'   => 'next',
					'separator'        => ' ',
					'nextpagelink'     => __( '<div class="btn n-btn">Next Page <span class="fa fa-arrow-right"></span></div>' ),
					'previouspagelink' => __( '' ),
					'pagelink'         => '%',
					'echo'             => 1
				);
				wp_link_pages( $defaults );
			?>
			<?php 
				global $multipage, $numpages, $page;
					if( $multipage && $page == $numpages )
						echo "<a href='?random=1'><div class='col-xs-12 col-md-8 col-lg-8'><div class='btn n-btn'>Next Post <span class='fa fa-arrow-right'></span></div></div></a>";
			?>
			<?php if($numpages > 1) { 
				 echo "<div class='clear'></div></div><hr>"; 
				}
			?>		
		</div>		
			<div class="clear"></div><br />
		<div id="comments">
			<?php comments_template(); ?>
		</div>
		<?php endwhile; ?>
		
		<?php else : ?>
		<div class="post-content">
			<div class="single-title">
				<h1><span>404</span></h1>
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
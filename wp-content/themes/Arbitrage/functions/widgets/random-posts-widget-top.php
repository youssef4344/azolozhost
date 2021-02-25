<?php

/*
Plugin Name: Lipode Random Posts Widget Top
Description: A widget that displays random posts with thumbnails at top of the page.
Version: 1.0
*/

class Lipode_Random_Posts_Widget_Top extends WP_Widget {

	/*----------------------------------------
	  Constructor.
	  ----------------------------------------
	  
	  * The constructor. Sets up the widget.
	----------------------------------------*/
	
	function Lipode_Random_Posts_Widget_Top () {
		
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'random-posts-widget-top', 'description' => __( 'A widget that displays random posts with thumbnails at top of the page.', 'Lipode' ) );

		/* Widget control settings. */
		$control_ops = array( 'id_base' => 'random_posts_top' );

		/* Create the widget. */
		parent::__construct( 'random_posts_top', __('Lipode Random Posts Widget Top', 'Lipode' ), $widget_ops, $control_ops );
		
	} // End Constructor

	/*----------------------------------------
	  widget()
	  ----------------------------------------
	  
	  * Displays the widget on the frontend.
	----------------------------------------*/

	function widget( $args, $instance ) {  
		
		extract( $args, EXTR_SKIP );
		
		/* Our variables from the widget settings. */
		$title  = apply_filters('widget_title', $instance['title'], $instance, $this->id_base );
		
		$number = $instance['number'];
			
		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title ) {
		
			echo $before_title . $title . $after_title;
		
		} // End IF Statement
		
		/* Widget content. */
		
		/* Create a new post query */
        $query = new WP_Query();
        //Send our widget options to the query
        $query->query( array(
	        'post_type'      => 'post',
            'posts_per_page' => $number,
            'ignore_sticky_posts' => 1,
            'orderby'        => 'rand',
        ));
        global $post;
        if ($query->have_posts()) : $count = 0;?>
        	<?php while ($query->have_posts()) : $query->the_post(); $count++; ?>
		        <a href="<?php the_permalink() ?>">
					<div class="random-posts-widget-top">
						<ul><li>
							<div class="post-thumb-small">
									<?php if ( has_post_thumbnail() ) {
									the_post_thumbnail('random-thumbnails');
									} else { ?>
									<div class="no-thumb">Missing Featured Image</div>
									<?php } ?>
									<h4><?php the_title(); ?></h4>
							</div>
						</li></ul>
					</div>
				</a>
            <?php endwhile; ?>
            <?php endif; wp_reset_postdata();
        
		/* After widget (defined by themes). */
		echo $after_widget;

	} // End widget()

	/*----------------------------------------
	  update()
	  ----------------------------------------
	  
	  * Function to update the settings from
	  * the form() function.
	  
	  * Params:
	  * - Array $new_instance
	  * - Array $old_instance
	----------------------------------------*/
	
	function update ( $new_instance, $old_instance ) {
		
		$instance = $old_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['number'] = strip_tags( $new_instance['number'] );

		return $instance;
		
	} // End update()
	
	/*----------------------------------------
	  form()
	  ----------------------------------------
	  
	  * The form on the widget control in the
	  * widget administration area.
	  
	  * Make use of the get_field_id() and 
	  * get_field_name() function when creating
	  * your form elements. This handles the confusing stuff.
	  
	  * Params:
	  * - Array $instance
	----------------------------------------*/

	function form ( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => __( '', 'Lipode' ), 'number' => '5' );
		$instance = wp_parse_args( (array) $instance, $defaults );

?>
		<!-- Widget Title: Text Input -->
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'Lipode' ); ?></label>
            <input type="text" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" />
        </p>
        <!-- Widget Post Number: Text Input -->
        <p>
            <label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:', 'Lipode' ); ?></label>
            <input type="text" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo $instance['number']; ?>" size="3" class="widefat" id="<?php echo $this->get_field_id( 'image' ); ?>" />
        </p>
<?php
	} // End form()

} // End Class

/*----------------------------------------
  Register the widget on `widgets_init`.
  ----------------------------------------
  
  * Registers this widget.
----------------------------------------*/

add_action( 'widgets_init', create_function( '', 'return register_widget("Lipode_Random_Posts_Widget_Top");' ), 1 );



?>
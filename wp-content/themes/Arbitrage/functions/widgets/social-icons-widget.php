<?php

/*-----------------------------------------------------------------------------------

	Plugin Name: Lipode Social Icons Widget
	Description: A widget that displays social icons in sidebar.
	Version: 1.0

-----------------------------------------------------------------------------------*/

// Widget Registration.
 
function lipode_load_widget() {

	register_widget( 'Social_Icons_Widget' );

}
class Social_Icons_Widget extends WP_Widget {

	protected $defaults;
	protected $sizes;
	protected $profiles;

	function __construct() {

		$this->defaults = array(
			'title'			 => '',
			'new_window'		 => 0,
			'size'			 => 64,
			'facebook'		 => '',
			'twitter'		 => '',
			'gplus'			 => '',
			'pinterest'		 => '',
			'linkedin'		 => '',
			'stumbleupon'    => '',
			'youtube'		 => '',
			'flickr'		 => '',
			'lastfm'		 => '',
			'tumblr'		 => '',
			'vimeo'			 => '',
			'dribbble'		 => '',
			'email'			 => '',
			'rss'			 => '',
			'instagram'		 => '',
			'picasa'		 => '',
		);


		$this->sizes = array( '64' );

		$this->profiles = array(
			'facebook' => array(
				'label'	  => __( 'Facebook URL', 'lipode' ),
				'pattern' => '<a title="Facebook" href="%s" %s><li class="social-facebook"></li></a>',
			),
			'email' => array(
				'label'	  => __( 'Email URL', 'lipode' ),
				'pattern' => '<a title="Email" href="%s" %s><li class="social-email"></li></a>',
			),
			'gplus' => array(
				'label'	  => __( 'Google+ URL', 'lipode' ),
				'pattern' => '<a title="Google+" href="%s" %s><li class="social-gplus"></li></a>',
			),
			'pinterest' => array(
				'label'	  => __( 'Pinterest URL', 'lipode' ),
				'pattern' => '<a title="Pinterest" href="%s" %s><li class="social-pinterest"></li></a>',
			),
			'linkedin' => array(
				'label'	  => __( 'Linkedin URL', 'lipode' ),
				'pattern' => '<a title="LinkedIn" href="%s" %s><li class="social-linkedin"></li></a>',
			),
			'stumbleupon' => array(
				'label'	  => __( 'StumbleUpon URL', 'lipode' ),
				'pattern' => '<a title="StumbleUpon" href="%s" %s><li class="social-stumbleupon"></li></a>',
			),
			'twitter' => array(
				'label'	  => __( 'Twitter URL', 'lipode' ),
				'pattern' => '<a title="Twitter" href="%s" %s><li class="social-twitter"></li></a>',
			),
			'youtube' => array(
				'label'	  => __( 'YouTube URL', 'lipode' ),
				'pattern' => '<a title="YouTube" href="%s" %s><li class="social-youtube"></li></a>',
			),
			'flickr' => array(
				'label'	  => __( 'Flickr URL', 'lipode' ),
				'pattern' => '<a title="Flickr" href="%s" %s><li class="social-flickr"></li></a>',
			),
			'lastfm' => array(
				'label'	  => __( 'Lastfm URL', 'lipode' ),
				'pattern' => '<a title="Lastfm" href="%s" %s><li class="social-lastfm"></li></a>',
			),
			'tumblr' => array(
				'label'	  => __( 'Tumblr URL', 'lipode' ),
				'pattern' => '<a title="Tumblr" href="%s" %s><li class="social-tumblr"></li></a>',
			),
			'vimeo' => array(
				'label'	  => __( 'Vimeo URL', 'lipode' ),
				'pattern' => '<a title="Vimeo" href="%s" %s><li class="social-vimeo"></li></a>',
			),
			'dribbble' => array(
				'label'	  => __( 'Dribbble URL', 'lipode' ),
				'pattern' => '<a title="Dribbble" href="%s" %s><li class="social-dribbble"></li></a>',
			),
			'rss' => array(
				'label'	  => __( 'RSS URL', 'lipode' ),
				'pattern' => '<a title="RSS" href="%s" %s><li class="social-rss"></li></a>',
			),
			'instagram' => array(
				'label'	  => __( 'Instagram URL', 'lipode' ),
				'pattern' => '<a title="Instagram" href="%s" %s><li class="social-instagram"></li></a>',
			),
			'picasa' => array(
				'label'	  => __( 'Picasa URL', 'lipode' ),
				'pattern' => '<a title="Picasa" href="%s" %s><li class="social-picasa"></li></a>',
			),

		);

		$widget_ops = array(
			'classname'	 => 'social-icons',
			'description' => __( 'A widget that displays Social Icons.', 'lipode' ),
		);

		$control_ops = array(
			'id_base' => 'social-icons',
			#'width'   => 505,
			#'height'  => 350,
		);

		parent::__construct( 'social-icons', __( 'Lipode Social Icons Widget', 'lipode' ), $widget_ops, $control_ops );

	}

	/**
	 * Widget Form.
	 *
	 * Outputs the widget form that allows users to control the output of the widget.
	 *
	 */
	function form( $instance ) {

		/** Merge with defaults */
		$instance = wp_parse_args( (array) $instance, $this->defaults );
		?>

		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'lipode' ); ?></label> <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" /></p>

		<p><label><input id="<?php echo $this->get_field_id( 'new_window' ); ?>" type="checkbox" name="<?php echo $this->get_field_name( 'new_window' ); ?>" value="1" <?php checked( 1, $instance['new_window'] ); ?>/> <?php esc_html_e( 'Open links in new window?', 'lipode' ); ?></label></p>

		<?php
		foreach ( (array) $this->profiles as $profile => $data ) {

			printf( '<p><label for="%s">%s:</label>', esc_attr( $this->get_field_id( $profile ) ), esc_attr( $data['label'] ) );
			printf( '<input type="text" id="%s" class="widefat" name="%s" value="%s" /></p>', esc_attr( $this->get_field_id( $profile ) ), esc_attr( $this->get_field_name( $profile ) ), esc_url( $instance[$profile] ) );

		}

	}

	/**
	 * Form validation and sanitization.
	 *
	 * Runs when you save the widget form. Allows you to validate or sanitize widget options before they are saved.
	 *
	 */
	function update( $newinstance, $oldinstance ) {

		foreach ( $newinstance as $key => $value ) {

			/** Sanitize Profile URLs */
			if ( array_key_exists( $key, (array) $this->profiles ) ) {
				$newinstance[$key] = esc_url( $newinstance[$key] );
			}

		}

		return $newinstance;

	}

	/**
	 * Widget Output.
	 *
	 * Outputs the actual widget on the front-end based on the widget options the user selected.
	 *
	 */
	function widget( $args, $instance ) {

		extract( $args );

		/** Merge with defaults */
		$instance = wp_parse_args( (array) $instance, $this->defaults );

		echo $before_widget;

			if ( ! empty( $instance['title'] ) )
				echo $before_title . apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) . $after_title;

			$output = '';

			$new_window = $instance['new_window'] ? 'target="_blank"' : '';

			foreach ( (array) $this->profiles as $profile => $data ) {
				if ( ! empty( $instance[$profile] ) )
					$output .= sprintf( $data['pattern'], esc_url( $instance[$profile] ), $new_window );
			}

			if ( $output )
				printf( '<div class="social-icons"><ul class="%s">%s</ul><div class="clear"></div></div>', '',$output );

		echo $after_widget;

	}

}

add_action( 'widgets_init', 'lipode_load_widget' );
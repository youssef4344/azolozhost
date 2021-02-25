<?php

/*
Plugin Name: Lipode MailChimp Subscribe Widget
Description: A widget that displays a mailchimp subscription widget in sidebar.
Version: 1.0
*/

class Subscribe_Widget extends WP_Widget {

    public function __construct()
    {
        parent::__construct(false, 'Lipode Newsletter Subscription Widget');
    }

	  
    public function widget($args, $instance)
    {
        $title = $title = apply_filters('widget_title', $instance['title'], $instance, $this->id_base);
        echo $args['before_widget'];

        if ($title) {
            echo $args['before_title'];
            echo $title;
            echo $args['after_title'];
        }
        ?>
		<?php echo '<div class="subscribe-widget">'; ?>
	        <?php if ($instance['text_first']) : ?>
	            <div class="text_first"><?php echo $instance['text_first'] ?></div>
	        <?php endif ?>
	         <?php if ($instance['text_second']) : ?>
	            <div class="text_second"><?php echo $instance['text_second'] ?></div>
	        <?php endif ?>
	         <form class="mcsw_form"
	              id="mcsw_form-<?php echo $this->id ?>">
	
	            <div class="email">
	                <input type="email" name="email" class="subscribe-email" placeholder="<?php echo $instance['email_placeholder'] ?>" />
	
	                <p class="hidden message"></p>
	            </div>
	
	            <input type="submit" class="subscribe-button" value="<?php echo $instance['button_text'] ?>" class="submit" />
	
	            <input type="hidden" name="widget_id" value="<?php echo $this->id ?>" />
	            
	            <?php wp_nonce_field(mcsw_nonce_action()) ?>
	        </form>
        <?php echo '</div>'; /*DIV subscribe widget */ ?>

        <?php
        echo $args['after_widget'];
    }

    /**
     * Outputs the options form on admin
     * @param array $instance The widget options
     */
    public function form($instance)
    {
        $instance = wp_parse_args($instance, $this->get_defaults());
        $lists = $this->get_lists($instance['api_key']);
        $this->output_text_field('api_key', 'API Key', $instance['api_key']);
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('list_id') ?>">Mailing List</label>

            <select class="widefat" 
                    id="<?php echo $this->get_field_id('list_id') ?>" 
                    name="<?php echo $this->get_field_name('list_id') ?>">

                <?php foreach ($lists as $list_id => $list_name) : ?>

                    <option value="<?php echo $list_id ?>" <?php echo $instance['list_id'] == $list_id ? 'selected="true"' : '' ?>>
                        <?php echo $list_name ?>
                    </option>

                <?php endforeach ?>
            </select>
        </p>

        <?php
        $this->output_text_field('title', 'Title:', $instance['title']);
        $this->output_text_field('text_first', 'Text First:', $instance['text_first']);
        $this->output_text_field('text_second', 'Text Second:', $instance['text_second']);
        $this->output_text_field('email_placeholder', 'Email Placeholder:', $instance['email_placeholder']);
        $this->output_text_field('button_text', 'Button Text:', $instance['button_text']);
        $this->output_text_field('success_message', 'Success Message:', $instance['success_message']);
        $this->output_text_field('error_message', 'Error Message:', $instance['error_message']);
    }

    public function output_text_field($setting_name, $setting_label, $setting_value)
    {
        ?>

        <p>
            <label for="<?php echo $this->get_field_id($setting_name) ?>">
                <?php echo $setting_label ?>
            </label>

            <input class="widefat" 
                   id="<?php echo $this->get_field_id($setting_name) ?>" 
                   name="<?php echo $this->get_field_name($setting_name) ?>" 
                   type="text" 
                   value="<?php echo $setting_value ?>" />
        </p>

        <?php
    }

    /**
     * Default widget settings
     * @return array
     */
    public function get_defaults()
    {
        return array(
            'api_key' => '',
            'list_id' => '',
            'title' => '',
            'text_first' => 'Get More Stuff',
            'text_second' => 'Sign up for daily email and get the stories everyone is talking about.',
            'email_placeholder' => 'enter your email address',
            'button_text' => 'Subscribe',
            'success_message' => 'Thanks! You have successfully subscribed.',
            'error_message' => 'Oops, something went wrong!'
        );
    }

    /**
     * Returns available lists from MailChimp as an associative array: 
     * [list id] => [list name]
     * 
     * @param string $api_key
     * @return array Associative array of the following structure: [list id] => [list name]
     */
    public function get_lists($api_key)
    {
        $ret = array('' => 'Select a mailing list');

        try {
            $mc_lists = new Mailchimp_Lists(new Mailchimp($api_key));
            $result = $mc_lists->getList();

            foreach ($result['data'] as $list) {
                $ret[$list['id']] = $list['name'];
            }
        } catch (Exception $ex) {
            $ret = array(
                '' => 'No lists found'
            );
        }

        return $ret;
    }

}

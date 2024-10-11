<?php
//custom widget tutorial
class SocialWidget extends WP_Widget 
{
	function __construct() {
		parent::__construct(
			'SocialWidget', // Base ID
			'Social', // Name
			array('description' => __( 'Displays your social.'))
		);
	}
	function widget($args, $instance) { //output
		extract( $args );
		// these are the widget options
		$title = apply_filters('widget_title', $instance['title']);
		$facebook = $instance['facebook'];
		echo $before_widget;
		// Check if title is set
		if ( $title ) {
			echo $before_title . $title . $after_title;
		}

		echo '<ul class="social-footer">';
			if($instance['facebook']) {
				echo '<li>';
					echo '<a href="'.$instance['facebook'].'">';
						echo '<svg width="31" height="32" viewbox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M16.5929 23.4458V16.1693H18.6015L18.8677 13.6618H16.5929L16.5963 12.4068C16.5963 11.7528 16.6585 11.4023 17.5978 11.4023H18.8535V8.89453H16.8446C14.4316 8.89453 13.5822 10.1109 13.5822 12.1566V13.6621H12.0781V16.1696H13.5822V23.4458H16.5929Z" fill="white" /><path d="M30.5 16C30.5 24.5755 23.7694 31.5 15.5 31.5C7.23057 31.5 0.5 24.5755 0.5 16C0.5 7.4245 7.23057 0.5 15.5 0.5C23.7694 0.5 30.5 7.4245 30.5 16Z" stroke="white" />';
						echo '</svg>';
					echo '</a>';
				echo '</li>';
			}
			if($instance['twitter']) {
			echo '<li>';
				echo '<a href="'.$instance['twitter'].'"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewbox="0 0 32 32" fill="none">
						<circle cx="16" cy="16" r="15.5" stroke="white" />
						<path fill-rule="evenodd" clip-rule="evenodd"
							d="M15.6982 13.0077L15.7318 13.5609L15.1726 13.4931C13.1374 13.2335 11.3594 12.3529 9.84978 10.874L9.11174 10.1402L8.92164 10.6821C8.51907 11.89 8.77626 13.1657 9.61495 14.0237C10.0622 14.4979 9.96161 14.5656 9.19002 14.2834C8.92164 14.1931 8.6868 14.1253 8.66444 14.1592C8.58616 14.2382 8.85454 15.2656 9.06701 15.672C9.35775 16.2364 9.95042 16.7896 10.599 17.117L11.1469 17.3767L10.4984 17.388C9.87215 17.388 9.84978 17.3992 9.91688 17.6363C10.1405 18.3701 11.0239 19.1491 12.008 19.4878L12.7013 19.7249L12.0975 20.0861C11.2029 20.6054 10.1517 20.899 9.10056 20.9215C8.59735 20.9328 8.18359 20.978 8.18359 21.0119C8.18359 21.1248 9.54785 21.757 10.3418 22.0053C12.7237 22.7391 15.5528 22.423 17.6775 21.1699C19.1871 20.278 20.6968 18.5056 21.4013 16.7896C21.7815 15.8752 22.1617 14.2043 22.1617 13.4028C22.1617 12.8835 22.1952 12.8157 22.8214 12.1948C23.1905 11.8336 23.5371 11.4384 23.6042 11.3255C23.716 11.111 23.7049 11.111 23.1346 11.303C22.184 11.6417 22.0499 11.5965 22.5195 11.0885C22.8662 10.7272 23.2799 10.0724 23.2799 9.8805C23.2799 9.84664 23.1122 9.90308 22.9221 10.0047C22.7208 10.1176 22.2735 10.2869 21.938 10.3885L21.3342 10.5804L20.7862 10.2079C20.4843 10.0047 20.0594 9.7789 19.8357 9.71116C19.2654 9.55311 18.3932 9.57569 17.8788 9.75632C16.481 10.2643 15.5976 11.5739 15.6982 13.0077Z"
							fill="white" />
					</svg></a>';
			echo '</li>';
			}
			if($instance['youtube']) {
			echo '<li>';
				echo '<a href="'.$instance['youtube'].'"><svg xmlns="http://www.w3.org/2000/svg" width="31" height="32" viewbox="0 0 31 32" fill="none">
						<path
							d="M30.5 16C30.5 24.5755 23.7694 31.5 15.5 31.5C7.23057 31.5 0.5 24.5755 0.5 16C0.5 7.4245 7.23057 0.5 15.5 0.5C23.7694 0.5 30.5 7.4245 30.5 16Z"
							stroke="white" />
						<path fill-rule="evenodd" clip-rule="evenodd"
							d="M22.0304 10.6823C22.7641 10.8837 23.342 11.4769 23.5381 12.2303C23.8944 13.5957 23.8944 16.4447 23.8944 16.4447C23.8944 16.4447 23.8944 19.2936 23.5381 20.6591C23.342 21.4125 22.7641 22.0057 22.0304 22.2072C20.7006 22.573 15.3681 22.573 15.3681 22.573C15.3681 22.573 10.0356 22.573 8.70577 22.2072C7.97202 22.0057 7.39417 21.4125 7.19806 20.6591C6.8418 19.2936 6.8418 16.4447 6.8418 16.4447C6.8418 16.4447 6.8418 13.5957 7.19806 12.2303C7.39417 11.4769 7.97202 10.8837 8.70577 10.6823C10.0356 10.3164 15.3681 10.3164 15.3681 10.3164C15.3681 10.3164 20.7006 10.3164 22.0304 10.6823ZM13.7697 14.0463V19.3753L18.0328 16.7109L13.7697 14.0463Z"
							fill="white" />';
					echo '</svg></a>';
			echo '</li>';
			}
		echo '</ul>';

		echo $after_widget;
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['facebook'] = strip_tags($new_instance['facebook']);
        $instance['twitter'] = strip_tags($new_instance['twitter']);
        $instance['youtube'] = strip_tags($new_instance['youtube']);
		return $instance;
	}	
    
    // widget form creation
	function form($instance) {

	// Check values
	if( $instance) {
		$title = esc_attr($instance['title']);
		$facebook = esc_attr($instance['facebook']);
        $twitter = esc_attr($instance['twitter']);
        $youtube = esc_attr($instance['youtube']);
	} else {
		$title = '';
		$facebook = '';
        $twitter = '';
        $youtube = '';
	}
	?>
		<p>
		    <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'novteam'); ?></label>
		    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<p>
		    <label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook', 'novteam'); ?></label>		
            <input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo $facebook; ?>" />
		</p>
        <p>
		    <label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter', 'novteam'); ?></label>		
            <input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo $twitter; ?>" />
		</p>
        <p>
		    <label for="<?php echo $this->get_field_id('youtube'); ?>"><?php _e('Youtube', 'novteam'); ?></label>		
            <input class="widefat" id="<?php echo $this->get_field_id('youtube'); ?>" name="<?php echo $this->get_field_name('youtube'); ?>" type="text" value="<?php echo $youtube; ?>" />
		</p>		 
	<?php
	}
	
} //end class SocialWidget
add_action( 'widgets_init', function(){
	register_widget( 'SocialWidget' );
});

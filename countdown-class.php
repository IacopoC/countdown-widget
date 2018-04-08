<?php

/**
 * Adds Countdown_Widget widget.
 */
class Countdown_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'countdown_widget', // Base ID
			esc_html__( 'Countdown Widget', 'countdown_widget' ), // Name
			array( 'description' => esc_html__( 'Countdown Widget', 'countdown_widget' ), ) // Args
		);
	}




	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		if ( ! empty( $instance['date'] ) ) { 
			$date_str = str_replace('-', '/', $instance['date']); ?> 

		<div id="getting-started"></div>
		<script type="text/javascript">
		  jQuery(document).ready(function($) {
  			$("#getting-started")
  			.countdown("<?php echo $date_str; ?>", function(event) {
    		$(this).text(
      		event.strftime('%D giorni %H:%M:%S')
    		);
  			});
  		   });
		</script>
         <?php 

		}

		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'countdown_widget' );
		$date = ! empty( $instance['date'] ) ? $instance['date'] : esc_html('01/01/2018');
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'countdown_widget' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'date' ) ); ?>"><?php esc_attr_e( 'Countdown date:', 'countdown_widget' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'date' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'date' ) ); ?>" type="date" value="<?php echo esc_attr( $date ); ?>">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['date'] = ( ! empty( $new_instance['date'] ) ) ? strip_tags( $new_instance['date'] ) : '';

		return $instance;
	}

} 

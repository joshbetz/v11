<?php

add_action( 'widgets_init', create_function( '', 'register_widget( "V11_Bio_Widget" );' ) );
class V11_Bio_Widget extends WP_Widget {
	public function __construct() {
		parent::__construct( 'v11_bio_widget', __( 'v11 Bio Widget', 'v11' ), array( 'description' => __( 'A bio widget specific to the v11 theme.', 'v11' ) ) );
	}

	public function widget( $args, $instance ) {
		global $v11_theme;

		extract( $args );
		$email = isset( $instance['email'] ) ? esc_attr( $instance['email'] ) : get_option( 'admin_email' );

		$author = get_user_by( 'email', $email );
		$first_name = get_the_author_meta( 'first_name', $author->ID );
		$last_name = get_the_author_meta( 'last_name', $author->ID );

		echo $before_widget;
		echo "<div class='name'>";
		echo "<span class='first-name'>" . $first_name . "</span>";
		echo get_avatar( $email, 102 );
		echo "<span class='last-name'>" . $last_name . "</span>";
		echo "</div>";
		echo "<div class='bio'>" . $v11_theme->remove_widows( $author->description ) . "</div>";
		echo $after_widget;
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['email'] = sanitize_email( $new_instance['email'] );
		return $instance;
	}

	public function form( $instance ) {
		$email = isset( $instance['email'] ) ? $instance['email'] : '';
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php _e( 'Email:', 'v11' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" type="email" value="<?php echo esc_attr( $email ); ?>">
		</p>
		<?php
	}
}

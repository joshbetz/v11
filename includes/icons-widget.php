<?php

add_action( 'widgets_init', create_function( '', 'register_widget( "V11_Icons_Widget" );' ) );
class V11_Icons_Widget extends WP_Widget {

	public $icons = array(
		'twitter' => 'Twitter',
		'dribbble' => 'Dribbble',
		'forrst' => 'Forrst',
		'github' => 'Github',
		'googleplus' => 'Google+',
		'facebook' => 'Facebook',
		'linkedin' => 'LinkedIn',
		'lastfm' => 'Last.fm',
		'skype' => 'Skype',
		'flickr' => 'Flickr',
		'vimeo' => 'Vimeo',
		'wordpress' => 'WordPress'
	);

	public function __construct() {
		parent::__construct( 'v11_icons_widget', __( 'v11 Icons Widget', 'v11' ), array( 'description' => __( 'A social icon widget specific to the v11 theme.', 'v11' ) ) );
	}

	public function widget( $args, $instance ) {
		extract( $args );
		$title = esc_attr( $instance['title'] );
		$icons = array_filter( array_map( 'esc_url', $instance['icons'] ) );
		$translations = $this->icons;

		echo $before_widget;
		if ( !empty( $title ) )
			echo $before_title . $title . $after_title;
		if ( count( $icons > 0 ) ) {
			echo "<ul>";
			foreach( $icons as $icon => $link )
				echo "<li><a class='{$icon}' title='Find me on {$translations[$icon]}' href='{$link}'>{$translations[$icon]}</a></li>";
			echo "</ul>";
		}
		echo $after_widget;
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = sanitize_email( $new_instance['title'] );
		$instance['icons'] = array_map( 'esc_url', $new_instance['icons'] );
		return $instance;
	}

	public function form( $instance ) {
		$title = isset( $instance['title'] ) ? $instance['title'] : '';
		$icons = !empty( $instance['icons'] ) ? $instance['icons'] : array();
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'v11' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="title" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<span>Icons</span>
			<ul>
				<?php
					$field = $this->get_field_name( 'icons' );
					foreach ( $this->icons as $class => $name ) {
						$value = !empty( $icons[$class] ) ? $icons[$class] : '';
						echo "<li><label for='{$class}'><input class='widefat' type=input name='{$field}[$class]' value='{$value}' placeholder='{$name}'></label></li>";
					}
				?>
			</ul>
		</p>
		<?php
	}
}
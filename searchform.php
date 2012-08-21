<form role="search" action="<?php echo home_url(); ?>">
	<label class="assistive-text" for="s">Search for:</label>
	<input id="searchbox" name="s" type=type placeholder="Search..." value="<?php if ( isset( $_REQUEST['s'] ) ) echo esc_attr( $_REQUEST['s'] ); ?>">
</form>
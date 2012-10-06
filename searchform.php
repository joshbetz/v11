<form role="search" action="<?php echo home_url(); ?>">
	<label class="assistive-text" for="searchbox"><?php _e( 'Search for', 'v11' ); ?>:</label>
	<input id="searchbox" name="s" type=text placeholder="<?php _e( 'Search...', 'v11' ); ?>" value="<?php the_search_query(); ?>">
	<input class="button" type=submit value="Search">
</form>

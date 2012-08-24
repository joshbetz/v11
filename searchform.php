<form role="search" action="<?php echo home_url(); ?>">
	<label class="assistive-text" for="s">Search for:</label>
	<input id="searchbox" name="s" type=type placeholder="Search..." value="<?php echo get_search_query(); ?>">
</form>
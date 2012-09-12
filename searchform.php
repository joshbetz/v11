<form role="search" action="<?php echo home_url(); ?>">
	<label class="assistive-text" for="searchbox">Search for:</label>
	<input id="searchbox" name="s" type=text placeholder="Search..." value="<?php the_search_query(); ?>">
</form>
			<?php get_sidebar(); ?>
			</div>
		<footer id="footer">
			<span class="footer-left"><?php echo str_replace( "{yyyy}", date('Y'), get_theme_mod( 'copyright' ) ); ?></span>
			<span class="footer-right"><?php _e( 'v11 Theme by <a href="http://joshbetz.com">Josh Betz</a>', 'v11' ); ?> &middot; <?php _e( 'Proudly powered by WordPress', 'v11' ); ?></span>
		</footer>
	</div>
	<!-- JavaScript at the bottom for fast page loading -->
	<?php wp_footer(); ?>
</body>
</html>
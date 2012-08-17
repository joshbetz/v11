			<?php get_sidebar(); ?>
			</div>
		<footer id="footer">
			<span class="footer-left"><?php echo str_replace( "{yyyy}", date('Y'), get_theme_mod( 'copyright' ) ); ?></span>
			<span class="footer-right">v11 Theme by <a href="http://joshbetz.com">Josh Betz</a> &middot; Proudly powered by WordPress</span>
		</footer>
	</div>
	<!-- JavaScript at the bottom for fast page loading -->
	<?php wp_footer(); ?>
</body>
</html>
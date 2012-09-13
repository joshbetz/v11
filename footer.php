			</div>
		<footer id="footer">
			<span class="footer-left"><?php echo str_replace( "{yyyy}", date('Y'), get_theme_mod( 'v11_copyright' ) ); ?></span>
			<span class="footer-right"><?php printf( __( 'v11 Theme made by %s in %s.', 'v11' ), '<a href="http://joshbetz.com">Josh Betz</a>', '<span class="wisconsin" aria-hidden="true" data-icon="&#x76;"></span><span class="assistive-text">Wisconsin</span>' ); ?> <?php printf( __( 'Proudly powered by %s', 'v11' ), '<a href="http://wordpress.org">WordPress</a>' ); ?></span>
		</footer>
	</div>
	<!-- JavaScript at the bottom for fast page loading -->
	<?php wp_footer(); ?>
</body>
</html>
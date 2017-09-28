</div>	<!-- site wrap -->

	<footer id="footer">

		<div class="outer">

			<div class="inner">
				
				<div class="container">

					<div class="left-side">
						
						<?php if ( get_field( 'footer_description' ) ) { ?>
							<div class="line1"><?php the_field( 'footer_description' ); ?></div>
						<?php } else { ?>
							<div class="line1">The SPOT is part of UCF Business Services, a unit of the Division of Administration and Finance</div>
						<?php } ?>

						<div class="line2">
							<?php if ( get_field( 'copyright_text' ) ) { the_field( 'copyright_text' ); } else { ?>&copy; 2015 The SPOT @ UCF<?php } ?> <a href="<?php echo get_permalink( 199 ); ?>" class="footer-link">Privacy Policy</a> <a href="<?php echo get_permalink( 44 ); ?>" class="footer-link">Take Our Survey</a>
						</div>

					</div>

					<div class="right-side">
						<a href="#" class="footer-up"></a>
					</div>

					<div class="clear"></div>

				</div>

			</div>
			
		</div>

	</footer>

	<?php wp_footer(); ?>

	</body>

</html>
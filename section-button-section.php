<div class="container btn-section">

	<div class="left-side">
		<a href="<?php the_field( 'button_section_left_button_link' ); ?>" class="no-letter-spacing capitalize btn purple-btn"><?php the_field( 'button_section_left_button_text' ); ?></a>
	</div>

	<div class="right-side">
		<a href="<?php the_field( 'button_section_right_button_link' ); ?>" class="no-letter-spacing capitalize btn purple-btn"><?php the_field( 'button_section_right_button_text' ); ?></a>
	</div>

	<div class="clear"></div>
	
	<?php if ( get_field( 'button_section_disclaimer' ) ) { ?>

		<div class="disclaimer">
			<?php the_field( 'button_section_disclaimer' ); ?>
		</div>

	<?php } ?>
	
</div>
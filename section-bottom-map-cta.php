<section class="bottom-map-cta">

	<div class="overlay"></div>

	<div class="outer">

		<div class="inner">
			
			<div class="cta-content">
				<?php if ( get_field( 'map_cta_top_line' ) ) { ?>
					<h2 class="top-line"><?php the_field( 'map_cta_top_line' ); ?></h2>
				<?php } ?>
				<h1><?php the_field( 'map_cta_title', '' ); ?></h1>
				<?php if ( get_field( 'map_cta_subline' ) ) { ?>
					<h2><?php the_field( 'map_cta_subline' ); ?></h2>
				<?php } ?>

				<?php if ( get_field( 'button_link' ) ) { ?>
					<a href="<?php the_field( 'button_link' ) ?>" class="btn purple-btn wide">
						<?php if ( get_field( 'button_text' ) ) { ?>
							<?php the_field( 'button_text' ); ?>
						<?php } else { ?>
							Find Us
						<?php } ?>
					</a>
				<?php } else { ?>
					<a href="<?php echo get_permalink( 17 ); ?>" class="btn purple-btn wide">Find Us</a>
				<?php } ?>
			</div>

		</div>
		
	</div>
	
</section>
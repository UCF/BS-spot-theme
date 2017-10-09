<?php /* Template Name: Passports */ ?>

<?php get_header(); ?>

	<main class="general">
		
		<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
		<section class="page-header" style="background: url(<?php echo $thumb[0]; ?>) no-repeat center center; background-size: cover;">

			<div class="overlay"></div>
				
			<div class="container">
				<p><?php the_title(); ?></p>
				<?php if ( get_field( 'header_sub_line' ) ) { ?>
					<div class="sub-line"><?php the_field( 'header_sub_line' ); ?></div>
				<?php } ?>
			</div>

		</section>

		<section class="purple-section">
			
			<div class="container smallest">
				
				<?php if ( get_field( 'important_passport_information_title' ) ) { ?>

					<h1><?php the_field( 'important_passport_information_title' ); ?></h1>

				<?php } ?>

				<?php if ( get_field( 'important_passport_information_description' ) ) { ?>

					<?php the_field( 'important_passport_information_description' ); ?>

				<?php } ?>

				<div class="btn-row">

					<a href="<?php echo get_field( 'important_passport_information_link' ); ?>" target="_blank" class="btn green-btn">
						<?php if ( !get_field( 'important_passport_information_link_text' ) ) { echo 'Learn More'; } else { the_field( 'important_passport_information_link_text' ); } ?>
					</a>

				</div>

			</div>

		</section>

		<section class="white-section alternate-padding-2">

			<div class="container smallest center-heading formatted alternate">
				
				<?php if ( get_field( 'help_section_title' ) ) { ?>

					<h1><?php the_field( 'help_section_title' ); ?></h1>

				<?php } ?>

				<div class="btn-row">

					<a href="<?php echo get_field( 'help_section_link' ); ?>" target="_blank" class="btn green-btn">
						<?php if ( !get_field( 'help_section_link_text' ) ) { echo 'Why You need To Renew Your Passport Immediately'; } else { the_field( 'help_section_link_text' ); } ?>
					</a>

				</div>

				<?php if ( get_field( 'help_section_description' ) ) { ?>
					
					<?php the_field( 'help_section_description' ); ?>

				<?php } ?>

			</div>

			<div class="container medium side-blocks">

				<?php if ( get_field( 'help_section_left_block' ) ) { ?>
				
					<div class="side-block left-block">

						<?php the_field( 'help_section_left_block' ); ?>

					</div>

				<?php } ?>

				<?php if ( get_field( 'help_section_right_block' ) ) { ?>

					<div class="side-block right-block">
						
						<?php the_field( 'help_section_right_block' ); ?>

					</div>

				<?php } ?>

				<div class="clear"></div>

			</div>
			
			<?php if ( get_field( 'disclaimer' ) ) { ?>

				<div class="container formatted disclaimer text-center">
					<?php the_field( 'disclaimer' ); ?>
				</div>

			<?php } ?>
			
		</section>

		<section class="side-map-section">

			<div id="map-side"></div>

			<div class="info-side">

				<div class="info-side-wrap">

					<?php the_field( 'passport_renewal_section' ); ?>

				</div>

			</div>
			
		</section>

	</main>

<?php get_footer(); ?>
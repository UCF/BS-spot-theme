<?php /* Template Name: UCF Departments */ ?>

<?php get_header(); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

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

			<section class="white-section alternate-padding-3 border-bottom">

				<div class="container smaller">

					<div class="inner-cta-wrap no-margin">

						<?php if ( get_field( 'side_cta_left_side' ) ) { ?>
						
							<div class="left-side">
								
								<div class="department-2-wrap">

									<?php the_field( 'side_cta_left_side' ); ?>

								</div>

							</div>

						<?php } ?>
						
						<?php if ( get_field( 'side_cta_right_side' ) ) { ?>

							<div class="right-side">

								<div class="smaller-wrap">
									<?php the_field( 'side_cta_right_side' ); ?>
								</div>

							</div>

						<?php } ?>

						<div class="clear"></div>

					</div>

				</div>

				<?php get_template_part( 'section-button-section' ); ?>

			</section>

			<?php get_template_part( 'section-side-by-side-sections' ); ?>

			<?php get_template_part( 'section-bottom-map-cta' ); ?>
		
			<?php get_template_part( 'section-newsletter-survey' ); ?>

		</main>

	<?php endwhile; endif; ?>

<?php get_footer(); ?>
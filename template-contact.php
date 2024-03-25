<?php /* Template Name: Contact */ ?>

<?php get_header(); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<main class="contact">

			<section class="contactStuff">

				<div class="left-side">

					<div class="top-part">

						<ul class="infoList">

							<?php if ( get_field( 'preferred_parking' ) ) { ?>

							<li class="no-margin-top">

								<div class="title">Parking Locations</div>

								<div class="infoList-info">
									<?php the_field( 'preferred_parking' ); ?>
								</div>

							</li>

							<?php } ?>

							<?php if ( get_field( 'address' ) ) { ?>

								<li>

									<div class="title">Address</div>

									<div class="infoList-info">
										<?php the_field( 'address' ); ?>
									</div>

								</li>

							<?php } ?>

							<?php if ( get_field( 'contact_info' ) ) { ?>

								<li>

									<div class="title">Contact Info</div>

									<div class="infoList-info">
										<?php the_field( 'contact_info' ); ?>
									</div>

								</li>

							<?php } ?>

							<?php if ( get_field( 'hours_of_operation' ) ) { ?>

								<li>

									<div class="title">Hours of Operation</div>

									<div class="infoList-info">
										<?php the_field( 'hours_of_operation' ); ?>
									</div>

								</li>

							<?php } ?>

							<?php if ( get_field( 'facebook_link' ) || get_field( 'linkedin_link' ) || get_field( 'twitter_link' ) ) { ?>

								<li>

									<?php if ( get_field( 'facebook_link' ) ) { ?>
										<a href="<?php the_field( 'facebook_link' ); ?>" class="contact-icon fb first"></a>
									<?php } ?>

									<?php if ( get_field( 'twitter_link' ) ) { ?>
										<a href="<?php the_field( 'twitter_link' ); ?>" class="contact-icon tw"></a>
									<?php } ?>

									<?php if ( get_field( 'linkedin_link' ) ) { ?>
										<a href="<?php the_field( 'linkedin_link' ); ?>" class="contact-icon linkedin"></a>
									<?php } ?>

									<div class="clear"></div>

								</li>

							<?php } ?>

						</ul>

					</div>

					<div class="bottom-part">

						<h3><?php echo get_option( 'survey_cta_title', '' ); ?></h3>

						<div class="cta-description">
							<p><?php echo get_option( 'survey_cta_description', '' ); ?></p>
						</div>

						<a href="<?php echo get_permalink( 44 ); ?>" class="btn green-btn">Take Our Survey</a>

					</div>

				</div>

				<div class="right-side">

					<?php the_content(); ?>

				</div>

				<div class="clear"></div>

			</section>

		</main>

	<?php endwhile; endif; ?>

<?php get_footer(); ?>

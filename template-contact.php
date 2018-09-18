<?php /* Template Name: Contact */ ?>

<?php get_header(); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<main class="contact">

			<img id="mapPrint" src="<?php bloginfo('template_directory'); ?>/library/images/print-map.png" alt="Printable Map" class="hide" />
		
			<section id="fullMap">

				<!-- <a class="printMap" href="#">Print Map</a> -->

				<div id="map-side"></div>

			</section>

			<section class="contactStuff">

				<div class="left-side">	

					<div class="top-part">
						
						<?php/* if ( !get_field( 'time_message' ) ) { ?>
							<h3>We are currently:</h3>
						<?php } else { ?>
							<?php the_field( 'time_message' ); ?>
						<?php } ?>

						<h3>
							<?php 
								$timeNow = date( 'H:i:s' ); 
								$open = date( 'w' ) == 0 || date( 'w' ) == 6 ? FALSE : TRUE;
								if ( $timeNow >= get_field( 'open_time' ) && $timeNow <= get_field( 'close_time' ) && $open ) { ?>
									<span class="color-green">OPEN</span> 
							<?php } else { ?>
								<span class="color-red">CLOSED</span> 
							<?php } ?>
							<?php echo '- ' . date( 'h:i a', strtotime( get_field( 'open_time' ) ) ) . ' to ' . date( 'h:i a', strtotime( get_field( 'close_time' ) ) ); ?>
						</h3> */ ?>

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
<?php /* Template Name: Document Destruction */ ?>

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
		
			<section class="white-section">
				
				<div class="container smaller">

					<?php the_content(); ?>

					<div class="inner-cta-wrap">

						<?php if ( get_field( 'cta_left_side' ) ) { ?>

							<div class="left-side">
								
								<div class="quest-wrap">

									<?php the_field( 'cta_left_side' ); ?>

								</div>

							</div>

						<?php } ?>

						<?php if ( get_field( 'cta_right_side' ) ) { ?>

							<div class="right-side">

								<div class="recycle-wrap">

									<?php the_field( 'cta_right_side' ); ?>

								</div>

							</div>

						<?php } ?>

						<div class="clear"></div>

					</div>

				</div>

			</section>
			
			<?php if ( get_field( 'green_section' ) ) { ?>

				<section class="green-section text-center">
					<h1><?php the_field( 'green_section' ); ?></h1>
				</section>

			<?php } ?>
			
			<?php if ( get_field( 'steps_section' ) ) { $steps = get_field( 'steps_section' ); ?>

				<section class="steps-section">

					<ul class="step-list">

						<?php
							$stepCounter = 1;
							foreach ( $steps as $step ) { ?>
	
								<li <?php if ( $stepCounter == 3 || $stepCounter == 4 ) { ?>class="overlay-right" <? } ?>style="background: url(<?php echo $step['background_image']; ?>); background-size: cover; background-position: center;">
								
									<div class="overlay half-overlay--width">
										
										<div class="overlay-content">

											<h2><?php echo $step['sub_title']; ?></h2>

											<h3><?php echo $step['title']; ?></h3>
											
											<div class="step-description">
												<?php echo $step['content']; ?>
											</div>

										</div>

									</div>

								</li>

							<?php 
								$stepCounter++;

								if ( $stepCounter == 5 ) {
									$stepCounter = 1;
								}
							} 
						?>

					</ul>
					
				</section>

			<?php } ?>

			<section class="white-section formatted alternate-padding">
				
				<?php if ( get_field( 'second_section_title' ) ) { ?>
					<h1 class="text-center top-level"><?php the_field( 'second_section_title' ); ?></h1>
				<?php } ?>
				
				<?php if ( get_field( 'second_section_description' ) ) { ?> 

					<div class="container smaller">
						<?php the_field( 'second_section_description' ); ?>
					</div>

				<?php } ?>

				<div class="destruction-choices">
					
					<div class="choice">

						<div class="choice-outer-wrap">

							<div class="choice-inner-wrap">

								<div class="outer">

									<div class="inner">
										<img src="<?php the_field( 'choice_1_image' ) ?>" alt="Choice 1" />
									</div>

								</div>

							</div>

							<div class="choice-info-wrap">
								<?php the_field( 'choice_1_description' ) ?>
							</div>

						</div>

					</div>

					<div class="choice">
						
						<div class="choice-outer-wrap">

							<div class="choice-inner-wrap">

								<div class="outer">

									<div class="inner">
										<img src="<?php the_field( 'choice_2_image' ) ?>" alt="Choice 2" />
									</div>

								</div>

							</div>

							<div class="choice-info-wrap">
								<?php the_field( 'choice_2_description' ) ?>
							</div>

						</div>

					</div>

					<div class="choice">

						<div class="choice-outer-wrap">

							<div class="choice-inner-wrap">

								<div class="outer">

									<div class="inner">
										<img src="<?php the_field( 'choice_3_image' ) ?>" alt="Choice 3" />
									</div>

								</div>

							</div>

							<div class="choice-info-wrap">
								<?php the_field( 'choice_3_description' ) ?>
							</div>

						</div>

					</div>

				</div>
				
				<?php if ( get_field( 'faqs' ) ) { $faqs = get_field( 'faqs' ); ?>

					<div class="faq-section">

						<div class="container">

							<h6>Frequently Asked Questions</h6>

							<ul class="faq-list">

								<?php foreach ( $faqs as $faq ) { ?>

									<li class="faq">

										<a href="#" class="faq-title"><?php echo $faq['title']; ?></a>

										<div class="faq-info">
											<?php echo $faq['description']; ?>
										</div>
										
									</li>
		
								<?php } ?>
								
							</ul>

						</div>

					</div>

				<?php } ?>
				
			</section>

			<section class="white-section form-section no-padding">
				
				<div class="container smaller">

					<?php gravity_form( 2, false, true, false, null, true, null ); ?>

				</div>
				
			</section>

		</main>

	<?php endwhile; endif; ?>

<?php get_footer(); ?>
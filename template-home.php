<?php /* Template Name: Home */ ?>

<?php get_header(); ?>

	<main class="home">
	
		<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
		<section class="page-header" style="background: url(<?php echo $thumb[0]; ?>) no-repeat center center; background-size: cover;">

			<div class="overlay"></div>
			
			<div class="center">

				<div class="content-container">
					<?php echo apply_filters( 'the_content', $post->post_content ); ?>
					<a href="<?php the_field( 'header_sub_link' ); ?>" class="quote-link"><?php the_field( 'header_sub_line' ); ?></a>
				</div>

			</div>

		</section>

		<section class="white-section formatted">

			<div class="container">

				<?php $blocks = get_field( 'blocks' ); 

					if ( !empty( $blocks ) ) { ?>

						<div class="icon-blocks">

							<?php 
								$blockCounter = 1;
								$rowBlockCounter = 1;

								foreach ( $blocks as $block ) { 
									$classList = array( 'block' );

									if ( $blockCounter == 1 ) {
										$classList[] = 'first';
									}

									if ( $blockCounter == 1 || $blockCounter == 2 || $blockCounter == 3 ) {
										$classList[] = 'top-block';
									}

									if ( $rowBlockCounter == 1 ) {
										$classList[] = 'first-block';
									}

									if ( $rowBlockCounter == 2 ) {
										$classList[] = 'second-block';
									}

									if ( $rowBlockCounter == 3 ) {
										$classList[] = 'third-block';
									}

									$printClassList = trim( implode( ' ', $classList ) );
								?>

									<div class="<?php echo $printClassList; ?>">

										<div class="block-icon <?php echo $block['icon_type']; ?>"></div>
										
										<h3><?php echo $block['title']; ?></h3>

										<div class="block-info">
											<p><?php echo $block['description']; ?></p>
										</div>

										<a href="<?php echo $block['link']; ?>" class="learn-more">Learn More</a>

									</div>

								<?php 
									$blockCounter++;

									if ( $rowBlockCounter == 3 ) {
										$rowBlockCounter = 0;
									}

									$rowBlockCounter++;

								} ?>

							<div class="clear"></div>

						</div>
					<?php } 

				?>

			</div>
			
		</section>

		<?php get_template_part( 'section-bottom-map-cta' ); ?>
		
		<?php get_template_part( 'section-newsletter-survey' ); ?>

	</main>

<?php get_footer(); ?>
<?php /* Template Name: General Page */ ?>

<?php get_header(); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<main class="general">

			<section class="page-header">

				<div class="overlay"></div>
					
				<div class="container">
					<p><?php the_title(); ?></p>
					<?php if ( get_field( 'header_sub_line' ) ) { ?>
						<div class="sub-line"><?php the_field( 'header_sub_line' ); ?></div>
					<?php } ?>
				</div>

			</section>

			<section class="white-section form-section general-page alternate-padding-4">
				
				<div class="container smaller">

					<?php the_content(); ?>

				</div>

			</section>

		</main>

	<?php endwhile; endif; ?>

<?php get_footer(); ?>
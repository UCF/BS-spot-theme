<?php if ( get_field( 'side_by_side_sections' ) ) { $sections = get_field( 'side_by_side_sections' ); ?>

	<section class="side-by-sides">

		<?php 
			$counter = 1;

			foreach ( $sections as $section ) { 
				if ( $counter & 1 ) { ?>
					<div class="side-by-side-row">

						<div class="right-image" style="background: url(<?php echo $section['image']; ?>); background-size: cover; background-position: center;">
				<?php } else { ?>
					<div class="side-by-side-row left-side-has-image">

						<div class="left-image" style="background: url(<?php echo $section['image']; ?>); background-size: cover; background-position: center;">
				<?php } ?>
					<figure class="mobile-image">
						<img src="<?php echo $section['image']; ?>" />
					</figure>
				</div>

				<div class="content-side">

					<div class="outer">

						<div class="inner">

							<div class="inner-content">
								<h2><?php echo $section['title']; ?></h2>
								<?php echo $section['description']; ?>
								<?php if ( $section['link'] ) { ?>
									<a href="<?php echo $section['link']; ?>" class="btn <?php if ( $counter & 1 ) { ?>green-btn<?php } else { ?>purple-btn<?php } ?>"><?php echo $section['link-text']; ?></a>
								<?php } ?>
							</div>

						</div>

					</div>

				</div>

			</div>

		<?php $counter++; } ?>

	</section>

<?php } ?>
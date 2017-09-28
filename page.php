<?php get_header(); ?>

<main class="main-page-template">
	
	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
		<?php the_content(); ?>
	<?php endwhile; endif; ?>
		
</main>
<?php //end content ?>

<?php get_footer(); ?>
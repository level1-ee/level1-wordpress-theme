<?php get_header(); ?>

	<main class="main-content">

	<div class="index-additions">
		<div class="index-additions__item index-additions__item__player2">
			<a href="http://level1.ee/player2/" target="_blank">
				<img src="<?php echo get_template_directory_uri(); ?>/img/temp-index-player2.png" alt="Player2">
			</a>
		</div>
		<div class="index-additions__item index-additions__item__2014">
			<a href="http://mangudeoo.ee/" target="_blank">
				<img src="<?php echo get_template_directory_uri(); ?>/img/moo-event-banner.jpg" alt="MängudeÖÖ">
			</a>
		</div>
	</div>

<?php

// check if the flexible content field has rows of data
if( have_rows('home_modules') ): ?>

		<?php // loop through the rows of data
		while ( have_rows('home_modules') ) : the_row(); ?>

			<?php

			if( get_row_layout() == 'hero' ): {

				get_template_part('partials/module-hero');

			} elseif ( get_row_layout() == 'media_object' ): {

				 get_template_part('partials/module-media-object');

			} elseif ( get_row_layout() == 'three_cols' ): {

				get_template_part('partials/module-three-col');

			} elseif ( get_row_layout() == 'two_cols' ): {

				get_template_part('partials/module-two-col');

			} elseif ( get_row_layout() == 'gallery' ): {

				get_template_part('partials/module-gallery');

			}

			endif;

			?>

	 <?php endwhile; // have_rows('home_modules') ?>

<?php else : ?>

		no layouts found

<?php endif; // have_rows('home_modules')?>





<footer class="global-footer">
    <a href="mailto:levelup@level1.ee">levelup@level1.ee</a>
    <p>ÜHENDUGE MEIEGA</p>
</footer>





	</main>

<?php get_footer(); ?>
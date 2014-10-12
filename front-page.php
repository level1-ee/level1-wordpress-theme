<?php get_header(); ?>

	<main class="main-content">
	<div class="index-events">
		<div class="moo-wrap">
			<a href="http://mangudeoo.ee" target="_blank" class="index-events__moo">
				<img src="<?php echo get_template_directory_uri(); ?>/img/events/moo.png" alt="MängudeÖÖ">
			</a>
		</div>
		<div class="sub-event-wrap">
			<a href="http://level1.ee/minecrafti-voistlus" target="_blank" class="sub-event sub-event--minecraft">
				<img src="<?php echo get_template_directory_uri(); ?>/img/events/minecraft.png" alt="Minecrafti Arhietektuurivõistlus">
			</a>
			<a href="http://level1.ee/sinu-pikslitomme" target="_blank" class="sub-event sub-event--pikslitomme">
				<img src="<?php echo get_template_directory_uri(); ?>/img/events/sinu-pikslitomme.jpg" alt="Sinu Pikslitõmme">
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
<?php get_header(); ?>

<?php

// Loop for one sticky post

$sticky_query = new WP_Query( array(
	'posts_per_page' => 1,
	'post__in'  => get_option( 'sticky_posts' ),
	'ignore_sticky_posts' => 1
	)); ?>

<?php if ( $sticky_query->have_posts() ) : ?>

<!-- pagination here -->
<!-- the loop -->
<section class="featured">

<?php while ( $sticky_query->have_posts() ) : $sticky_query->the_post(); ?>

	<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); ?>

	<article class="featured-post" style="background-image: url('<?php echo $large_image_url[0]; ?>');">
		<div class="featured__body">
			<div class="featured__body-inner">

				<h2 class="featured__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

				<div class="post-meta post-meta--featured">

					<img class="author-thumb" src="<?php echo get_template_directory_uri(); ?>/img/profile1.jpg" alt="">


					<div class="block">
					<?php
					// Post Categories
					$categories = get_the_category();
					$separator = ' ';
					$output = '';
					if($categories){
						foreach($categories as $category) {
							$output .= '<a href="'.get_category_link( $category->term_id ).'" class="post-label post-label--cat" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
						}
					echo trim($output, $separator);
					}
					?>

					<time class="post-label post-label--pubdate"><?php the_time('j.m.Y'); ?></time>
					</div>
					<a href="#1" class="post-label post-label--author">Ahto Ahas</a>
				</div>


			</div>
		</div>
	</article>

<?php endwhile; ?>

</section> <!-- .featured -->

	<?php wp_reset_postdata(); // reset the query ?>
	<!-- post navigation -->

<?php else: ?>

	<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>











<?php
// Loop for posts without sticky flag

$non_sticky_query = new WP_Query( array( 'post__not_in' => get_option( 'sticky_posts' ) ) ); ?>

<?php if ( $non_sticky_query->have_posts() ) : ?>

<section class="grid">

<!-- pagination here -->
<!-- the loop -->
<?php while ( $non_sticky_query->have_posts() ) : $non_sticky_query->the_post(); ?>

	<?php $grid_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'grid-featured-img'); ?>

	<article <?php post_class('post-card'); ?>>
		<div class="post-card__inner">
			<?php if ( has_post_thumbnail()) { ?>
			<img class="post-img" src="<?php echo $grid_image_url[0]; ?>" alt="" class="">
			<?php } else { ?>
			<img class="post-img" src="<?php echo get_template_directory_uri(); ?>/img/default-post-thumb.png" alt="" class="">
			<?php } ?>

			<div class="post-author post-author--grid">
				<img class="post-author__img" src="<?php echo get_template_directory_uri(); ?>/img/profile1.jpg" alt="">
				<p class="post-author__name">Ahto Ahas</p>
			</div>

			<div class="post-card__body">
				<div class="post-card__body-inner">

					<h2 class="post-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<div class="post-meta post-meta--post-card">

						<?php
						// Post Categories
						$categories = get_the_category();
						$separator = ' ';
						$output = '';
						if($categories){
							foreach($categories as $category) {
								$output .= '<a href="'.get_category_link( $category->term_id ).'" class="post-label post-label--cat" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
							}
						echo trim($output, $separator);
						}
						?>

						<time class="post-label post-label--pubdate"><?php the_time('j.m.Y'); ?></time>
					</div>
				</div>
			</div> <!-- .post-card__body -->

		</div> <!-- .post-card__inner -->
	</article> <!-- .post-card -->


<?php endwhile; ?>

</section> <!-- .grid -->

	<?php wp_reset_postdata(); // reset the query ?>
	<!-- post navigation -->

<?php else: ?>

	<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>



<?php get_footer(); ?>

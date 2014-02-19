<?php get_header(); ?>
<a href="https://www.facebook.com/PSEesti" class="ps-sponsor-banner"><img src="<?php echo get_template_directory_uri(); ?>/img/ps-logo.png" alt=""></a>

<?php if(is_home() && !is_paged()) { ?>
<?php

// ==========================================================
// Loop for one sticky post
// ==========================================================

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

	<article <?php post_class('featured-post lazy'); ?> data-original="<?php echo $large_image_url[0]; ?>" style="background-image:url('');">
		<div class="featured__body">
			<div class="featured__body-inner">
				<div class="post-meta post-meta--featured">
					<?php
					// Post Categories
					$categories = get_the_category();
					$separator = ' ';
					$output = '';
					if($categories){
						foreach($categories as $category) {
							$output .= '<a href="'.get_category_link( $category->term_id ).'" class="post-meta-label post-meta-label--cat" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
						}
					echo trim($output, $separator);
					}
					?>

					<time class="post-meta-label post-meta-label--pubdate"><?php the_time('j.m.Y'); ?></time>

					<a href="<?php the_permalink(); ?>#disqus_thread" class="post-meta-label post-meta-label--comments"></a>
				</div> <!-- .post-meta--featured -->

				<div class="featured-post-title-wrap">
					<h2 class="featured__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<?php
					if( $post->post_excerpt ) {
					    echo '<p class="subtitle">'.get_the_excerpt().'</p>';
					} else {

					}
					?>
				</div>
				<div class="post-author post-author--featured">
					<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
						<img class="post-author__img" src="<?php echo get_wp_user_avatar_src($user_id, 'thumbnail'); ?>" alt="">
						<p class="post-author__name"><?php the_author(); ?></p>
					</a>
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
<?php } ?>

<?php

// ==========================================================
// Loop for posts without sticky flag
// ==========================================================

$non_sticky_query = new WP_Query( array( 'post__not_in' => get_option( 'sticky_posts' ), 'paged' => get_query_var('paged') ) ); ?>

<?php if ( $non_sticky_query->have_posts() ) : ?>

<section class="grid">

<?php while ( $non_sticky_query->have_posts() ) : $non_sticky_query->the_post(); ?>

	<?php $grid_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'grid-featured-img'); ?>

	<article <?php post_class('post-card'); ?>>
		<div class="post-card__inner">
			<?php if ( has_post_thumbnail()) { ?>
			<img class="post-img lazy" src="<?php echo get_template_directory_uri(); ?>/img/featured-img-fallback-grid.jpg" data-original="<?php echo $grid_image_url[0]; ?>" width="1067" height="600" alt="">
			<?php } else { ?>
			<img class="post-img" src="<?php echo get_template_directory_uri(); ?>/img/featured-img-fallback-grid.jpg" alt="" class="">
			<?php } ?>

			<div class="post-author post-author--card">
				<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
					<img class="post-author__img" src="<?php echo get_wp_user_avatar_src($user_id, 'thumbnail'); ?>" alt="">
					<p class="post-author__name"><?php the_author(); ?></p>
				</a>
			</div>

			<div class="post-card__body">
				<div class="post-card__body-inner">
					<h2 class="post-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

					<div class="post-meta post-meta--card">
						<?php
						// Post Categories
						$categories = get_the_category();
						$separator = ' ';
						$output = '';
						if($categories){
							foreach($categories as $category) {
								$output .= '<a href="'.get_category_link( $category->term_id ).'" class="post-meta-label post-meta-label--cat" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
							}
						echo trim($output, $separator);
						}
						?>

						<time class="post-meta-label post-meta-label--pubdate"><?php the_time('j.m.Y'); ?></time>

						<a href="<?php the_permalink(); ?>#disqus_thread" class="post-meta-label post-meta-label--comments"></a>
					</div> <!-- .post-meta--card -->

				</div> <!-- .post-card__body-inner -->
			</div> <!-- .post-card__body -->

		</div> <!-- .post-card__inner -->
	</article> <!-- .post-card -->


<?php endwhile; ?>

</section> <!-- .grid -->

	<?php get_template_part( 'partials/pagination' ); ?>

	<?php wp_reset_postdata(); // reset the query ?>
	<!-- post navigation -->

<?php else: ?>

	<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

<?php get_footer(); ?>

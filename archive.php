<?php get_header(); ?>


<div class="index-header">
	<?php if (is_author()) { ?>
		<h1><?php the_author(); ?></h1>
	<?php } else { ?>
		<h1><?php single_cat_title(); ?></h1>
	<?php } ?>

	<?php if (is_tag()) { ?>
			<p>Märksõna</p>
	<?php } elseif (is_author()) { ?>
			<p>Autor</p>
	<?php } else { ?>
			<p>Rubriik</p>
	<?php } ?>
</div>

<?php if ( have_posts() ) : ?>

<section class="grid">

<!-- pagination here -->
<!-- the loop -->
<?php while ( have_posts() ) : the_post(); ?>

	<?php $grid_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'grid-featured-img'); ?>

	<article <?php post_class('post-card'); ?>>
		<div class="post-card__inner">
			<?php if ( has_post_thumbnail()) { ?>
			<img class="post-img" src="<?php echo $grid_image_url[0]; ?>" alt="" class="">
			<?php } else { ?>
			<img class="post-img" src="<?php echo get_template_directory_uri(); ?>/img/default-post-thumb.png" alt="" class="">
			<?php } ?>






			<div class="post-author post-author--card">
				<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
					<img class="post-author__img" src="<?php echo get_wp_user_avatar_src($user_id, 'thumbnail'); ?>" alt="">
					<p class="post-author__name"><?php the_author(); ?></p>
				</a>
			</div>







			<div class="post-card__body">
				<div class="post-card__body-inner">

					<div class="card-title-background">
						<h2 class="post-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					</div>






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

					<a href="#0" class="post-meta-label post-meta-label--comments">

						<svg class="comment-icon" width="68px" height="63px" viewBox="0 0 68 63" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
							<path class="svg-icon" d="M50.015,63.127 L37.93,45 L0,45 L0,0 L68,0 L68,45 L53.64,45 L50.015,63.127 L50.015,63.127 Z M4,41 L40.07,41 L47.985,52.873 L50.36,41 L64,41 L64,4 L4,4 L4,41 L4,41 Z" id="Shape" fill="#FFFFFF"></path>
						</svg>


					21</a>
				</div> <!-- .post-meta--card -->



				</div>
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

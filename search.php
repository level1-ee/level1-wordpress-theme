<?php get_header(); ?>

<?php
function current_page_nr() {
	if (is_paged()) {
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		echo '<span>LK'.$paged.'</span>';
	}
}
?>
<div class="index-header">

			<h1><span>Otsing</span><?php echo esc_html( get_search_query( false ) ); ?><?php current_page_nr(); ?></h1>

</div>

<?php if ( have_posts() ) : ?>

<section class="grid">

<!-- pagination here -->
<!-- the loop -->
<?php while ( have_posts() ) : the_post(); ?>

	<?php $grid_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'grid-featured-img'); ?>

	<div class="grid-item">
			<article class="grid-post" style="background-image:url(<?php echo $grid_image_url[0]; ?>);">


				<div class="single-post-meta">
					<?php
					// Post Categories
					$categories = get_the_category();
					$separator = ' ';
					$output = '';
					if($categories){
						foreach($categories as $category) {
							$output .= '<a href="'.get_category_link( $category->term_id ).'" class="single-post-category" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
						}
					echo trim($output, $separator);
					}
					?>

					<time class="single-post-pubdate"><?php the_time('j.m.Y'); ?></time>
					<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" class="post-author"><?php the_author(); ?></a>
				</div> <!-- .single-post-meta -->

				<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			</article>
	</div>


<?php endwhile; ?>

</section> <!-- .grid -->

	<?php //get_template_part( 'partials/pagination' ); ?>

	<?php wp_reset_postdata(); // reset the query ?>
	<!-- post navigation -->
	<div class="archive-pagination">

		<?php next_posts_link('&#8592;') ?>
		<?php previous_posts_link('&#8594;') ?>

	</div>
<?php else: ?>

	<p class="no-search-results">Ei leidnud midagi</p>

<?php endif; ?>


<?php get_footer(); ?>

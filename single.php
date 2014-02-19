<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php
	if( has_shortcode( $post->post_content, 'gallery') ) {
		get_template_part( 'partials/gallery-scripts' );
} ?>

<article>

	<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); ?>

	<header <?php post_class('single-post-header lazy'); ?> data-original="<?php echo $large_image_url[0]; ?>" style="background-image: url('');">
		<div class="single-post-header__body">
			<div class="single-post-header__body-inner">

				<div class="post-meta post-meta--single">
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

				<div class="single-post-title">
					<h1 class="featured__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

					<?php
						if( $post->post_excerpt ) {
								echo '<p class="subtitle">'.get_the_excerpt().'</p>';
						} else {

						}
					?>
				</div>

				<div class="post-author post-author--single">
					<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
						<img class="post-author__img" src="<?php echo get_wp_user_avatar_src($user_id, 'thumbnail'); ?>" alt="">
						<p class="post-author__name"><?php the_author(); ?></p>
					</a>
				</div>

				<div class="social-box">
					<div class="fb-like" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
				</div>

			</div>
		</div>
	</header>
	<div class="single-post-content">
		<?php the_content(); ?>
	</div>
</article>

<div class="single-post-footer">
	<?php get_template_part('partials/comments'); ?>
	<?php get_template_part('partials/related-posts-tags') ?>
</div>

<!-- post -->
<?php endwhile; ?>
	<?php get_template_part( 'partials/pagination-single' ); ?>
<!-- post navigation -->
<?php else: ?>
<!-- no posts found -->
<?php endif; ?>

<?php get_footer(); ?>
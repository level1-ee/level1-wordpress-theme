<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php
	if( has_shortcode( $post->post_content, 'gallery') ) {

		get_template_part( 'partials/gallery-scripts' );

} ?>

<article>

	<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); ?>

	<header <?php post_class('single-post-header'); ?> style="background-image: url('<?php echo $large_image_url[0]; ?>');">
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

					<a href="#0" class="post-meta-label post-meta-label--comments">
						<svg class="comment-icon" width="68px" height="63px" viewBox="0 0 68 63" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
							<path class="svg-icon" d="M50.015,63.127 L37.93,45 L0,45 L0,0 L68,0 L68,45 L53.64,45 L50.015,63.127 L50.015,63.127 Z M4,41 L40.07,41 L47.985,52.873 L50.36,41 L64,41 L64,4 L4,4 L4,41 L4,41 Z" id="Shape" fill="#FFFFFF"></path>
						</svg>

					21</a>
				</div> <!-- .post-meta--featured -->

				<h1 class="featured__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

				<?php
if( $post->post_excerpt ) {
    echo '<p class="subtitle">'.get_the_excerpt().'</p>';
} else {

}
?>



				<div class="post-author post-author--single">
					<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
						<img class="post-author__img" src="<?php echo get_wp_user_avatar_src($user_id, 'thumbnail'); ?>" alt="">
						<p class="post-author__name"><?php the_author(); ?></p>
					</a>
				</div>


			</div>
		</div>
	</header>
	<div class="single-post-content">
		<?php the_content(); ?>
</article>

<div class="single-tags">
	<?php the_tags('<ul><li>','</li><li>','</li></ul>'); ?>
</div>


<div class="single-footer">
	<div class="comments-wrap">
		<h3>Vestlus</h3>
		<div id="disqus_thread"></div>
		<script type="text/javascript">
				/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
				var disqus_shortname = 'level1-dev'; // required: replace example with your forum shortname

				/* * * DON'T EDIT BELOW THIS LINE * * */
				(function() {
						var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
						dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
						(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
				})();
		</script>
		<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
		<a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
	</div>
	<div class="related-posts">
		<h3>Samal teemal</h3>
	</div>
</div>

<!-- post -->
<?php endwhile; ?>
	<?php get_template_part( 'partials/pagination-single' ); ?>
<!-- post navigation -->
<?php else: ?>
<!-- no posts found -->
<?php endif; ?>






<?php get_footer(); ?>

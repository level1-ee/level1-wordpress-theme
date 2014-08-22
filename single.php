<?php get_header(); ?>


<main class="single-content">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php
	if( has_shortcode( $post->post_content, 'gallery') ) { ?>



	<script>
		jQuery(document).ready(function($) {
			$('.gallery').each(function() { // the containers for all your galleries
		    $(this).magnificPopup({
		        delegate: '.gallery-img-link', // the selector for gallery item
		        type: 'image',
		        gallery: {
		          enabled:true
		        }
		    });
			});
		});

    (function($){
        $(window).load(function(){
            $(".gallery").scrollbar({

            });
        });
    })(jQuery);

	</script>

<?php } ?>

<article>

	<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); ?>

	<header <?php post_class('single-post-header'); ?> style="background-image: url('<?php echo $large_image_url[0]; ?>');">
		<div class="single-post-header-hover"></div>
		<div class="single-post-header__body">
			<div class="single-post-header__body-inner">

				<div class="single-post-title-wrapper js-title-wrapper">
				<!-- <p class="single-post-author"><?php the_author(); ?></p> -->

				<h1 class="single-post-header__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

				</div>


<!-- 				<div class="social-box">
					<div class="fb-like" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
				</div> -->

			</div> <!-- /.single-post-header__body-inner -->
		</div> <!-- /.single-post-header__body -->
	</header> <!-- /.single-post-header -->
	<div class="single-post-content">
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
					<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" class="post-author">
						<?php the_author(); ?>
					</a>
				</div> <!-- .single-post-meta -->
		<?php
		if( $post->post_excerpt ) {
		    echo '<p class="single-post-content__excerpt">'.get_the_excerpt().'</p>';
		}
		?>

		<?php the_content(); ?>
	<div class="fb-button">
		<div class="fb-like" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
	</div>
	</div> <!-- /.single-post-content -->
</article>

<div class="single-post-footer">

	<div class="single-tags">
		<?php the_tags('<ul><li>','</li><li>','</li></ul>'); ?>
	</div>

	<div class="comments-wrap">

		<div id="disqus_thread"></div>
		<script type="text/javascript">
				/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
				var disqus_shortname = 'level1ee'; // required: replace example with your forum shortname
				var disqus_identifier = '<?php echo $post->ID ?>';
				var disqus_url = '<?php echo get_permalink($post->ID); ?>';

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


</div>

<!-- post -->
<?php endwhile; ?>

<!-- post navigation -->
<?php else: ?>
<!-- no posts found -->
<?php endif; ?>

</main>

<?php
wp_enqueue_script( 'fitvids' );
?>
<script>
jQuery(document).ready(function($) {
	$(".single-post-content").fitVids();
});
</script>

<?php get_footer(); ?>
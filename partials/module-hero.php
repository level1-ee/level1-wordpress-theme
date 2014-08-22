<?php
/**
 * HERO module
 */
?>

<?php

$post_object = get_sub_field('post');

if( $post_object ):

	// override $post
	$post = $post_object;
	setup_postdata( $post );

	?>

		<?php
				$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
		 ?>

		<div class="module module--hero">


			<a href="<?php the_permalink(); ?>">
			<article style="background-image:url('<?php echo $large_image_url[0]; ?>');">

				<div class="post-meta">
					<p class="post-author"><?php the_author(); ?></p>
					<h2 class="post-title"><?php the_title(); ?></h2>
				</div>
			</article>
			</a>
		</div> <!-- /.module-hero -->

<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; // if( $post_object ):  ?>

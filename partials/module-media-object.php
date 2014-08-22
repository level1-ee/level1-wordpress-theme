<?php
/**
 * Media block module
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
				$image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'grid-featured-img');
		 ?>

		<div class="module module--media-block">
			<?php if (get_sub_field('video') == true) { ?>
				<iframe class="module--media-block__img" src="<?php the_sub_field('youtube_embed_url'); ?>?autohide=1&controls=2&showinfo=0&modestbranding=1" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
			<?php } else { ?>

			<a href="<?php the_permalink(); ?>" class="module--media-block__img" style="background-image:url('<?php echo $image_url[0]; ?>');">
			</a>
			<?php } ?>
			<div class="module--media-block__content">
				<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div class="excerpt">
					<?php the_sub_field('content'); ?>
				</div>
			</div>
		</div> <!-- /.module--media-block -->


<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; // if( $post_object ):  ?>

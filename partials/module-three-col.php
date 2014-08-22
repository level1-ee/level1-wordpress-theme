<div class="module module--three-col">










<?php

$post_object = get_sub_field('post_one');

if( $post_object ):

	// override $post
	$post = $post_object;
	setup_postdata( $post );

	?>


	<?php $grid_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'grid-featured-img'); ?>


	<div class="module--three-col__col">
			<article class="module--three-col__post" style="background-image:url(<?php echo $grid_image_url[0]; ?>);">


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

<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; // if( $post_object ):  ?>




<?php

$post_object = get_sub_field('post_two');

if( $post_object ):

	// override $post
	$post = $post_object;
	setup_postdata( $post );

	?>


	<?php $grid_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'grid-featured-img'); ?>



	<div class="module--three-col__col">
			<article class="module--three-col__post" style="background-image:url(<?php echo $grid_image_url[0]; ?>);">


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
<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; // if( $post_object ):  ?>



<?php

$post_object = get_sub_field('post_three');

if( $post_object ):

	// override $post
	$post = $post_object;
	setup_postdata( $post );

	?>



	<?php $grid_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'grid-featured-img'); ?>

	<div class="module--three-col__col">
			<article class="module--three-col__post" style="background-image:url(<?php echo $grid_image_url[0]; ?>);">


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

<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; // if( $post_object ):  ?>

</div>

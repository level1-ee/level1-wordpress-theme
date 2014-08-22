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

	<div class="module module--gallery">
		<div class="module--gallery__content">
			<h2> <a href="<?php the_sub_field('post'); ?>">
				<?php the_sub_field('title'); ?>
				</a>
			</h2>
			<?php the_sub_field('shortcode'); ?>
		</div>
	</div>

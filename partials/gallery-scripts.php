<?php wp_enqueue_script( 'mCustomScrollbar' ); ?>

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
            $(".gallery").mCustomScrollbar({
            	horizontalScroll:true,
            	scrollInertia: 300,
            	mouseWheel: false
            	// contentTouchScroll: true
            });
        });
    })(jQuery);

	</script>
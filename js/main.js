jQuery(document).ready(function($) {

	$('.img-link').magnificPopup({
		type: 'image',
		// mainClass: 'mfp-with-zoom', // this class is for CSS animation below
		closeOnContentClick: true
		// gallery:{
		// 	enabled:true
		// },
		// zoom: {
		// 	enabled: true, // By default it's false, so don't forget to enable it
		// 	duration: 300, // duration of the effect, in milliseconds
		// 	easing: 'ease-in-out', // CSS transition easing function

		// 	// The "opener" function should return the element from which popup will be zoomed in
		// 	// and to which popup will be scaled down
		// 	// By defailt it looks for an image tag:
		// 	opener: function(openerElement) {
		// 		// openerElement is the element on which popup was initialized, in this case its <a> tag
		// 		// you don't need to add "opener" option if this code matches your needs, it's defailt one.
		// 		return openerElement.is('img') ? openerElement : openerElement.find('img');
		// 	}
		// }

	});

	$('.menu-item-has-children', '.js-main-nav').hover(function() {
		$(this).addClass('active-mother');
		$(this).children('.sub-menu').slideDown('fast');
	}, function() {
		/* Stuff to do when the mouse leaves the element */
		$(this).removeClass('active-mother');
		$(this).children('.sub-menu').slideUp('fast');
	});

	// $('.js-stream').mCustomScrollbar({
	// 	// scrollInertia: 3000,
	// });
	//

	$('.menu-item-search').click(function(event) {
		event.preventDefault();
		$('.search-overlay').fadeIn();
		$('.search-form__field').focus();
	});

	$('.close-search').click(function(event) {
		$('.search-overlay').fadeOut('fast');
	});

	$('.single-post-header__title').hover(function() {
		$('.single-post-header-hover').css('opacity', '.5');
	}, function() {
		$('.single-post-header-hover').css('opacity', '0');
	});

	 $('.js-stream').scrollbar({
			// "autoScrollSize": false,
			"scrolly": $('.external-scroll_y')
	 });

	var headerBody = $('.js-title-wrapper');
	$(window).on('scroll', function() {
		var st = $(this).scrollTop();
		headerBody.css({ 'opacity' : (1 - st/120) });
	});

});
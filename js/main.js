jQuery(document).ready(function($) {
 var $menu = $('.main-nav').hide(),
    $menulink = $('.nav-btn'),
    $closemenu = $('.close-btn');

  $menulink.click(function() {
    $menu.show();
    return false;
	});
	$closemenu.click(function() {
    $menu.hide();
    return false;
	});


var divs = $('.featured__body ');
$(window).on('scroll', function() {
   var st = $(this).scrollTop();
   divs.css({ 'opacity' : (1 - st/150) });
});
});
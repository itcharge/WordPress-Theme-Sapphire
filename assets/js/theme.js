/**
 * Initialise Menu Toggle
 */
( function() {

	jQuery('.sapphire-menu li.menu-item-has-children').each( function() {
		jQuery(this).prepend('<div class="nav-toggle-subarrow"></div>');
	});

	jQuery('#nav-toggle').on('click', function(event) {
		event.preventDefault();
		jQuery('#nav-toggle').toggleClass('nav-is-visible');
		jQuery('.main-navigation .sapphire-menu').toggleClass("sapphire-menu-mobile");
		jQuery('.header-widget').toggleClass("header-widget-mobile");
	});

	jQuery('.nav-toggle-subarrow, .nav-toggle-subarrow .nav-toggle-subarrow').click(
		function () {
			jQuery(this).parent().toggleClass("nav-toggle-dropdown");
		}
	);

} )();


( function () {
	
	var offset = 300, speed = 250, duration = 500, backButton = jQuery('#back-top');
	
	
	// 当滚动条的垂直位置距顶部 300 像素一下时，跳转链接出现，否则消失
	jQuery(window).scroll(function () {
		if (jQuery(window).scrollTop() > offset) {
			backButton.fadeIn(duration);
		} else {
			backButton.fadeOut(duration);
		}
		console.log(jQuery(window).scrollTop());
	});
	
	jQuery('#back-top').click(function () {
		jQuery("html,body").animate({
			scrollTop: 0
		}, speed);
	});
} )();
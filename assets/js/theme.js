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
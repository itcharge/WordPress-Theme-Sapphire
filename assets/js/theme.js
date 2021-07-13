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


/**
 * 滚动到顶部
 */
( function () {
	
	var offset = 300, duration = 500, backButton = jQuery('#back-top');
	var tocTop = jQuery("#side-box-article-toc").offset().top;
	var tocHeight = jQuery("#side-box-article-toc").height;
	var docHeight = jQuery(document).height;
	var footHeight = jQuery("#site-footer").height;
	
	// 当滚动条的垂直位置距顶部 300 像素一下时，跳转链接出现，否则消失
	jQuery(window).scroll(function () {
//		console.log(jQuery(window).scrollTop());

		var scrollTop = jQuery(window).scrollTop();
		if (scrollTop > offset) {
			backButton.fadeIn(duration);
		} else {
			backButton.fadeOut(duration);
		}
		
		if (scrollTop >= tocTop) {
			if (scrollTop + tocHeight + footHeight + 40 <= docHeight) {
				jQuery("#side-box-article-toc").css({"position":"fixed"});
				jQuery("#side-box-article-toc").animate({"top":'20px'}, duration);
			} else {
				console.log(jQuery(window).scrollTop());
				jQuery("#side-box-article-toc").css({"position":"fixed"});
				jQuery("#side-box-article-toc").animate({"top":"", "bottom":'20px'}, duration);
			}
		} else {
			jQuery("#side-box-article-toc").css({"position":"static", "top":"0"});
		}				
	});
	
	jQuery('#back-top').click(function () {
		jQuery("html,body").animate({
			scrollTop: 0
		}, speed);
	});
} )();


/**
 * 代码高亮 更改 pre 标签
 */
( function () {
	jQuery(document).ready(function () {
		jQuery("pre").addClass("prettyprint linenums");
	});
} )();
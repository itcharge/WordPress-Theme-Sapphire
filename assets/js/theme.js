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
	
	var offset = 300, speed = 250, duration = 500, backButton = jQuery('#back-top');
	var sideTop = jQuery("#right-box").offset().top + jQuery("#right-box").height() + jQuery(window).height();
	
	// 当滚动条的垂直位置距顶部 300 像素一下时，跳转链接出现，否则消失
	jQuery(window).scroll(function () {
		if (jQuery(window).scrollTop() > offset) {
			backButton.fadeIn(duration);
		} else {
			backButton.fadeOut(duration);
		}
		
		console.log(jQuery(window).scrollTop());
		
		if (jQuery(window).scrollTop() > sideTop) {
			if (jQuery("#fixed-right-box").length == 0) {
				// 下面是要显示的模块，复制侧边栏中的标签云内容，追加到侧边栏的底部
				var friendLink = jQuery("#side-box-recent-posts").clone().html();
				var html = "<div id='fixed-right-box'><div class='side-box recent-posts' id='side-box-recent-posts'>" + friendLink + "</div></div>";
				jQuery("#right-box").append(html);
			} else {
				jQuery("#fixed-right-box").show();
			}
		} else {
			jQuery("#fixed-right-box").hide();
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
	})
} )();
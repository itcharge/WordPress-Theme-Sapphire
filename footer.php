<?php 
/**
 * Template Name: 页脚模板
 *
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package Sapphire
 * @since Sapphire 1.0
 */
wp_footer(); 
?>

<footer class="site-footer" id="site-footer">
	<div class="footer-info">
		<div class="footer-left">
			&copy; 
			<?php echo date('Y'); echo " "; bloginfo('name'); echo ".  All Rights Reserved."; ?>
		</div>
		<div class="footer-right">
			<a href="https://cn.wordpress.org/" target="_blank">WordPress</a> Theme <a href="https://itcharge.cn/Sapphire/" target="_blank">Sapphire</a> by ITCharge
		</div>
	</div>
</footer>
</body>
</html>

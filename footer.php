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
		<?php 
		$sa_site_uv_pv = sa_theme_option('sa_site_uv_pv');
		if ($sa_site_uv_pv && $sa_site_uv_pv == 'open'):
		?>
		<script async src="//busuanzi.ibruce.info/busuanzi/2.3/busuanzi.pure.mini.js"></script>		
		<div class="footer-site-uv-pv">			
			<span id="busuanzi_container_site_pv">本站总访问量 <span id="busuanzi_value_site_pv"></span> 次 </span>
			|
			<span id="busuanzi_container_site_uv">本站总访客数 <span id="busuanzi_value_site_uv"></span> 人 </span>
		</div>
		<?php endif; ?>
		<div class="footer-copyright">
			&copy;
			<?php 
			$sa_site_since = sa_theme_option('sa_site_since');
			$now_date = date('Y');
			if ($sa_site_since < $now_date) {
				echo $sa_site_since."-".$now_date." ";
			} else {
				echo $now_date." "; 
			}
			
			echo bloginfo('name')." | ";
			$sa_site_icp = sa_theme_option('sa_site_icp');
			echo '<a href="https://beian.miit.gov.cn/" target="_blank">'.$sa_site_icp.'</a> | ';
			?>
			Theme <a href="https://itcharge.cn/wordpress-theme-sapphire/" target="_blank">Sapphire</a> by ITCharge
		</div>
	</div>
</footer>
</body>
</html>

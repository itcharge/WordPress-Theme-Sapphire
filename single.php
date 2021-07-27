<?php 
/**
 * Template Name: 文章模板
 *
 * The template for displaying all single posts
 *
 * @package Sapphire
 * @since Sapphire 1.0
 */
?>

<?php get_header(); ?>
<div class="site-content">
	<div id="left-box">
		<div id="home-main">
			<?php if (have_posts()) : the_post(); update_post_caches($posts); ?>
			<article class="article article-type-post">
				<div class='article-inner'>
					<header class="article-header">
						<h1 class="article-title"><?php the_title(); ?></h1>
						<a href="<?php the_permalink(); ?>" class="article-date">
							<time>
								<i class="icon-calendar icon"></i>
								<?php the_time('Y-m-d') ?>
							</time>
						</a>
						<?php read_words_times(); ?>
					</header>
					
					<div class="article-entry" id="article-entry-content">
						<?php the_content(); ?>
					</div>
					<?php
						$sa_post_praise = sa_theme_option('sa_post_praise');
						$sa_post_praise_wechat = sa_theme_option('sa_post_praise_wechat');
						$sa_post_praise_alipay = sa_theme_option('sa_post_praise_alipay');
						if ($sa_post_praise && $sa_post_praise == 'open' && (($sa_post_praise_wechat && $sa_post_praise_wechat != '') || ($sa_post_praise_alipay && $sa_post_praise_alipay != ''))) :
					?>
					<div class="article-praise">
						<a href="javascript:void(0)" class="article-praise-btn" onclick="praiseBtnClick()" title="赏">赏</a>
					</div>
					<?php endif; ?>
					<?php 
						$sa_post_copyright = sa_theme_option('sa_post_copyright');
						if ($sa_post_copyright && $sa_post_copyright == 'open') :
							$sa_post_copyright_name = sa_theme_option('sa_post_copyright_name');
							$sa_post_copyright_url = sa_theme_option('sa_post_copyright_url');
					?>
					<div class="article-copyright">
						<ul>
							<li class="article-copyright-author">
								<strong>本文作者：</strong>
								<?php the_author(); ?>
							</li>
							<li class="article-copyright-link">
								<strong>本文链接：</strong>
								<a href="<?php get_permalink(); ?>" title="<?php the_title(); ?>"><?php echo get_permalink(); ?></a>
							</li>
							<li class="article-copyright-license">
								<strong>版权声明：</strong>
								本站所有文章除特别声明外，均采用 <a href="<?php echo $sa_post_copyright_url; ?>"><?php echo $sa_post_copyright_name;?></a> 许可协议。
							</li>
						</ul>
					</div>
					<?php endif; ?>
					<div class="article-info article-info-index">
						<?php 
							$cat = get_the_category();
							if ($cat) {
								echo '<div class="article-cat-tag tagcloud">';
									echo '<i class="icon-book icon"></i>';
									echo '<ul class="cat-tag-list">';
										foreach ($cat as $key => $category) {
											echo '<li class="cat-tag-list-item">';
												echo '<a class="article-category-link color'.rand(1, 10).'" href="'.get_category_link($category->cat_ID).'">'.$category->cat_name.'</a>'; 
											echo '</li>';
										}
									echo '</ul>';
								echo '</div>';
							}
//							$tags = get_the_tags();
//							if ($tags) {
//								echo '<div class="article-category tagcloud">';
//									echo '<i class="icon-price-tags icon"></i>';
//									echo '<ul class="article-tag-list">';
//										foreach ($tags as $key => $tag) {
//											echo '<li class="article-tag-list-item">';
//												echo '<a class="article-tag-link color'.rand(1, 10).'" href="'.get_tag_link($tag->term_id).'">'.$tag->name.'</a>'; 
//											echo '</li>';
//										}
//									echo '</ul>';
//								echo '</div>';
//							}
						?>
						<span class="article-more-link">
							<?php edit_post_link('编辑', '', ''); ?>
						</span>
			      		<div class="clearfix"></div>
					</div>
				</div>
			</article>
			
			<?php comments_template(); ?>
			<?php endif; ?>
		</div>
	</div>
	<?php get_sidebar(); ?>
	<div class="clearfix"></div>
</div>

<a href="#" id="back-top">
	<i class="icon-font icon-plane"></i>
</a>

<div class="article-praise-mask"></div>
<div class="article-praise-box">
	<a class="article-praise-close" href="javascript:void(0)" onclick="praiseBtnClick()" title="关闭"><i class="icon-close icon"></i></a>
	<div class="article-praise-title">
		<p class="article-praise-p"><i class="icon icon-quo-left"></i>谢谢你请我喝咖啡~<i class="icon icon-quo-right"></i></p>
	</div>
	
	<div class="article-praise-payimg">
		<?php if (($sa_post_praise_wechat && $sa_post_praise_wechat != '') && ($sa_post_praise_alipay && $sa_post_praise_alipay != '')) :?>
		<img class="pay-img-wechatpay" src="<?php echo $sa_post_praise_wechat; ?>" alt="扫码支持" title="扫一扫" style="display: block;"/>
		<img class="pay-img-alipay" src="<?php echo $sa_post_praise_alipay; ?>" alt="扫码支持" title="扫一扫" style="display: none;"/>
		<?php elseif ($sa_post_praise_wechat && $sa_post_praise_wechat != '') : ?>
		<img class="pay-img-wechatpay" src="<?php echo $sa_post_praise_wechat; ?>" alt="扫码支持" title="扫一扫" style="display: block;"/>
		<?php elseif ($sa_post_praise_alipay && $sa_post_praise_alipay != '') : ?>
		<img class="pay-img-alipay" src="<?php echo $sa_post_praise_alipay; ?>" alt="扫码支持" title="扫一扫" style="display: block;"/>
		<?php endif; ?>
	</div>
	<div class="article-praise-explain">扫码打赏，支持一下</div>
	<div class="article-praise-payselect">
		<?php if (($sa_post_praise_wechat && $sa_post_praise_wechat != '') && ($sa_post_praise_alipay && $sa_post_praise_alipay != '')) :?>
		<div class="article-praise-item checked" data-id="wechat_pay">
    			<span class="radiobox"></span>
    			<span class="pay-type"><img src="<?php bloginfo('template_url'); ?>/assets/img/praise/wechat_pay.svg" alt="微信" /></span>
				<span class="pay-title">微信支付</span>
		</div>
		<div class="article-praise-item" data-id="ali_pay">
			<span class="radiobox"></span>
			<span class="pay-type"><img src="<?php bloginfo('template_url'); ?>/assets/img/praise/ali_pay.svg" alt="支付宝" /></span>
			<span class="pay-title">支付宝</span>
		</div>
		<?php elseif ($sa_post_praise_wechat && $sa_post_praise_wechat != '') :?>
		<div class="article-praise-item checked" data-id="wechat_pay">
    			<span class="radiobox"></span>
    			<span class="pay-type"><img src="<?php bloginfo('template_url'); ?>/assets/img/praise/wechat_pay.svg" alt="微信" /></span>
				<span class="pay-title">微信支付</span>
		</div>
		<?php elseif ($sa_post_praise_alipay && $sa_post_praise_alipay != '') : ?>
		<div class="article-praise-item checked" data-id="ali_pay">
			<span class="radiobox"></span>
			<span class="pay-type"><img src="<?php bloginfo('template_url'); ?>/assets/img/praise/ali_pay.svg" alt="支付宝" /></span>
			<span class="pay-title">支付宝</span>
		</div>
		<?php endif; ?>
	</div>
	<div class="article-praise-info">
		<?php if (($sa_post_praise_wechat && $sa_post_praise_wechat != '') && ($sa_post_praise_alipay && $sa_post_praise_alipay != '')) :?>
		<p>打开<span class="article-praise-info-txt">微信</span>扫一扫，即可进行扫码打赏哦</p>
		<?php elseif ($sa_post_praise_wechat && $sa_post_praise_wechat != '') :?>
		<p>打开<span class="article-praise-info-txt">微信</span>扫一扫，即可进行扫码打赏哦</p>
		<?php elseif ($sa_post_praise_alipay && $sa_post_praise_alipay != '') : ?>
		<p>打开<span class="article-praise-info-txt">支付宝</span>扫一扫，即可进行扫码打赏哦</p>
		<?php endif; ?>
	</div>
</div>
<script type="text/javascript">
jQuery(function($){
	jQuery(".article-praise-item").click(function(){
		jQuery(this).addClass('checked').siblings('.article-praise-item').removeClass('checked');
		var dataid = jQuery(this).attr('data-id');
		if (dataid == "ali_pay") {
			jQuery(".pay-img-alipay").css('display','block');
			jQuery(".pay-img-wechatpay").css('display','none');
		} else {
			jQuery(".pay-img-wechatpay").css('display','block');
			jQuery(".pay-img-alipay").css('display','none');
		}

		jQuery(".article-praise-info-txt").text(dataid=="ali_pay"?"支付宝":"微信");
	});
});
function praiseBtnClick() {
	jQuery(".article-praise-mask").fadeToggle();
	jQuery(".article-praise-box").fadeToggle();
}
</script>

<?php get_footer(); ?>
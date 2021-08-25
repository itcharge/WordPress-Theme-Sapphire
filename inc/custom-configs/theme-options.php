<?php
/**
 * 主题设置选项配置
 *
 * @package Sapphire
 * @since Sapphire 1.0
 */
?>
<?php
$theme_tabs = array(
	array(
		'title'		=>		'基本设置',
		'id'		=>		'panel_basic'
	),
	array(
		'title'		=>		'SEO 设置',
		'id'		=>		'panel_seo'
	),
	array(
		'title'		=>		'文章设置',
		'id'		=>		'panel_post'
	),
	array(
		'title'		=>		'社交设置',
		'id'		=>		'panel_social'
	),
	array(
		'title'		=>		'关于主题',
		'id'		=>		'panel_about'
	)
);

$theme_options = array(
	'panel_basic'	=>	array(
		// 网站图标设置
		array(
			'name'      =>		'网站图标设置',
			'type'      =>		'subtitle'
		),
		array(
			'name'		=>		'网站 Favicon 图标',
			'desc'		=>		'网站 Favicon 图标，推荐尺寸 32px * 32px、48px * 48px、96px * 96px',
			'id'		=>		'sa_site_favicon',
			'type'		=>		'image',
			'std'		=>		get_template_directory_uri() . '/assets/img/favicon.png'
		),
		array(
			'name'		=>		'网站顶部 Logo 设置',
			'desc'		=>		'网站 Logo 图标，推荐尺寸 264px * 52px（不设置则默认显示站点标题）',
			'id'		=>		'sa_site_logo',
			'type'		=>		'image',
			'std'		=>		''
		),
		// 页面显示效果设置
		array(
			'name'      =>		'页面效果设置',
			'type'      =>		'subtitle'
		),
		array(
			'name'      =>		'点击小红心',
			'desc'		=>		'打开则显示鼠标点击小红心效果',
			'id'        =>		'sa_site_clicklove',
			'type'      =>		'select',
			'options'	=>		array(
					'close'	=>	'关闭',
					'open'	=>	'开启'
			),
			'std'		=>		'close'
		),
		array(
			'name'      =>		'加载进度条',
			'desc'		=>		'打开则显示加载进度条效果',
			'id'        =>		'sa_site_progressbar',
			'type'      =>		'select',
			'options'	=>		array(
					'close'	=>	'关闭',
					'open'	=>	'开启'
			),
			'std'		=>		'close'
		),
		
		// 底部设置
		array(
			'name'      =>		'底部设置',
			'type'      =>		'subtitle'
		),
		array(
			'name'      =>		'网站成立年份',
			'desc'		=>		'设置「网站成立年份」',
			'id'        =>		'sa_site_since',
			'type'      =>		'text',
			'std'		=>		'2021'
		),
		array(
			'name'      =>		'网站备案号',
			'desc'		=>		'设置「网站备案号」',
			'id'        =>		'sa_site_icp',
			'type'      =>		'text',
			'std'		=>		'ICP备案 XXX 号'
		),
		array(
			'name'      =>		'网站访问量统计',
			'desc'		=>		'打开则在「网站底部」显示「本站总访问量」、「本站总访客数」',
			'id'        =>		'sa_site_uv_pv',
			'type'      =>		'select',
			'options'	=>		array(
					'close'	=>	'关闭',
					'open'	=>	'开启'
			),
			'std'		=>		'close'
		),
		
		// 边栏设置
		array(
			'name'      =>		'边栏设置',
			'type'      =>		'subtitle'
		),
		array(
			'name'		=>		'边栏 Logo 设置',
			'desc'		=>		'边栏 Logo 图标（正方形），推荐尺寸 128px * 128px',
			'id'		=>		'sa_sidebar_logo',
			'type'		=>		'image',
			'std'		=>		get_template_directory_uri() . '/assets/img/head.jpg'
		),
		array(
			'name'      =>		'最新文章',
			'desc'		=>		'打开则在「侧边栏」显示「最新文章」',
			'id'        =>		'sa_sidebar_recent_posts',
			'type'      =>		'select',
			'options'	=>		array(
					'close'	=>	'关闭',
					'open'	=>	'开启'
			),
			'std'		=>		'open'
		),
		array(
			'name'      =>		'热门标签',
			'desc'		=>		'打开则在「侧边栏」显示「热门标签」',
			'id'        =>		'sa_sidebar_hot_tags',
			'type'      =>		'select',
			'options'	=>		array(
					'close'	=>	'关闭',
					'open'	=>	'开启'
			),
			'std'		=>		'open'
		),
		array(
			'name'      =>		'侧边栏显示「联系方式」',
			'desc'		=>		'打开则在「侧边栏」显示「联系方式」，可在下方设置具体连接',
			'id'        =>		'sa_sidebar_contact',
			'type'      =>		'select',
			'options'	=>		array(
					'close'	=>	'关闭',
					'open'	=>	'开启'
			),
			'std'		=>		'close'
		),
		array(
			'name'      =>		'文章目录',
			'desc'		=>		'打开则在「文章页面」的「侧边栏」显示「文章目录」',
			'id'        =>		'sa_sidebar_post_toc',
			'type'      =>		'select',
			'options'	=>		array(
					'close'	=>	'关闭',
					'open'	=>	'开启'
			),
			'std'		=>		'close'
		)
	),
	
	// SEO 设置
	'panel_seo'			=>	array(
		array(
			'name'      =>		'标题链接符号',
			'desc'		=>		'选择后切勿更改，对 SEO 不好',
			'id'        =>		'sa_seo_connector',
			'type'      =>		'select',
			'options'	=>		array(
					'midline'	=>	'中横线 - ',
					'underline'	=>	'下划线 _ ',
					'verticalline'=>'中竖线 | '
			),
			'std'		=>		'midline'
		),
		array(
			'name'      =>		'网站关键词',
			'desc'		=>		'设置「网站关键词」，用 , 隔开',
			'id'        =>		'sa_seo_site_keywords',
			'type'      =>		'textarea',
			'std'		=>		'互联网,分享,技术'
		),
		array(
			'name'      =>		'网站描述',
			'desc'		=>		'设置「网站描述」',
			'id'        =>		'sa_seo_site_desc',
			'type'      =>		'textarea',
			'std'		=>		'一款简洁大气的响应式双栏博客主题'
		)
	),
	// 文章设置
	'panel_post'		=>	array(
		array(
			'name'      =>		'文章效果设置',
			'type'      =>		'subtitle'
		),
		array(
			'name'      =>		'代码高亮',
			'desc'		=>		'打开则使用 prettify.js 代码高亮',
			'id'        =>		'sa_post_prettify',
			'type'      =>		'select',
			'options'	=>		array(
					'close'	=>	'关闭',
					'open'	=>	'开启'
			),
			'std'		=>		'close'
		),
		array(
			'name'      =>		'数学公式',
			'desc'		=>		'打开则使用 Mathjax.js 对文章内的 LaTex 数学公式进行渲染',
			'id'        =>		'sa_post_mathjax',
			'type'      =>		'select',
			'options'	=>		array(
					'close'	=>	'关闭',
					'open'	=>	'开启'
			),
			'std'		=>		'close'
		),
		array(
			'name'      =>		'阅读时长统计',
			'desc'		=>		'打开则显示「文章字数」、「阅读时长」',
			'id'        =>		'sa_post_readtime',
			'type'      =>		'select',
			'options'	=>		array(
					'close'	=>	'关闭',
					'open'	=>	'开启'
			),
			'std'		=>		'close'
		),
		array(
			'name'      =>		'底部打赏设置',
			'type'      =>		'subtitle'
		),
		array(
			'name'      =>		'底部打赏开关',
			'desc'		=>		'打开则在文章底部显示显示「打赏」，不设置则不显示打赏按钮',
			'id'        =>		'sa_post_praise',
			'type'      =>		'select',
			'options'	=>		array(
					'close'	=>	'关闭',
					'open'	=>	'开启'
			),
			'std'		=>		'close'
		),
		array(
			'name'		=>		'微信打赏二维码',
			'desc'		=>		'设置文章底部微信打赏二维码图片，最佳尺寸：130px * 130px',
			'id'		=>		'sa_post_praise_wechat',
			'type'		=>		'image',
			'std'		=>		''
		),
		array(
			'name'		=>		'支付宝打赏二维码',
			'desc'		=>		'设置文章底部支付宝打赏二维码图片，最佳尺寸：130px * 130px',
			'id'		=>		'sa_post_praise_alipay',
			'type'		=>		'image',
			'std'		=>		''
		),
		array(
			'name'      =>		'文章底部版权设置',
			'type'      =>		'subtitle'
		),
		array(
			'name'      =>		'文章版权开关',
			'desc'		=>		'打开则在文章底部显示「文章版权」',
			'id'        =>		'sa_post_copyright',
			'type'      =>		'select',
			'options'	=>		array(
					'close'	=>	'关闭',
					'open'	=>	'开启'
			),
			'std'		=>		'close'
		),
		array(
			'name'		=>		'版权协议名称',
			'desc'		=>		'显示「版权协议名称」',
			'id'		=>		'sa_post_copyright_name',
			'type'		=>		'text',
			'std'		=>		'CC BY-NC-SA 4.0'
		),
		array(
			'name'		=>		'版权协议链接地址',
			'desc'		=>		'显示「版权协议链接地址」',
			'id'		=>		'sa_post_copyright_url',
			'type'		=>		'text',
			'std'		=>		'https://creativecommons.org/licenses/by-nc-sa/4.0/'
		),
	),
	
	// 社交设置
	'panel_social'	=>	array(
		array(
			'name'		=>		'博客主页',
			'short'		=>		'blog',
			'desc'		=>		'显示博客主页链接按钮',
			'id'		=>		'sa_social_blog_url',
			'type'		=>		'text',
			'std'		=>		'https://itcharge.cn'
		),
		array(
			'name'		=>		'GitHub 主页',
			'short'		=>		'github',
			'desc'		=>		'显示 GitHub 主页链接按钮',
			'id'		=>		'sa_social_github_url',
			'type'		=>		'text',
			'std'		=>		''
		),
		array(
			'name'		=>		'微博主页',
			'short'		=>		'weibo',
			'desc'		=>		'显示微博主页链接按钮',
			'id'		=>		'sa_social_weibo_url',
			'type'		=>		'text',
			'std'		=>		''
		),
		array(
			'name'		=>		'知乎主页',
			'short'		=>		'zhihu',
			'desc'		=>		'显示知乎主页链接按钮',
			'id'		=>		'sa_social_zhihu_url',
			'type'		=>		'text',
			'std'		=>		''
		),
		array(
			'name'		=>		'CSDN 主页',
			'short'		=>		'csdn',
			'desc'		=>		'显示 CSDN 主页链接按钮',
			'id'		=>		'sa_social_csdn_url',
			'type'		=>		'text',
			'std'		=>		''
		),
		array(
			'name'		=>		'博客园主页',
			'short'		=>		'cnblogs',
			'desc'		=>		'显示博客园主页链接按钮',
			'id'		=>		'sa_social_cnblogs_url',
			'type'		=>		'text',
			'std'		=>		''
		),
		array(
			'name'		=>		'码云主页',
			'short'		=>		'gitee',
			'desc'		=>		'显示 gitee 主页链接按钮',
			'id'		=>		'sa_social_gitee_url',
			'type'		=>		'text',
			'std'		=>		''
		),
		array(
			'name'		=>		'QQ 号',
			'short'		=>		'qq',
			'desc'		=>		'显示添加 QQ 号链接按钮',
			'id'		=>		'sa_social_qq_url',
			'type'		=>		'text',
			'std'		=>		''
		),
		array(
			'name'		=>		'简书主页',
			'short'		=>		'jianshu',
			'desc'		=>		'显示简书主页链接按钮',
			'id'		=>		'sa_social_jianshu_url',
			'type'		=>		'text',
			'std'		=>		''
		),
		array(
			'name'		=>		'豆瓣主页',
			'short'		=>		'douban',
			'desc'		=>		'显示豆瓣主页链接按钮',
			'id'		=>		'sa_social_douban_url',
			'type'		=>		'text',
			'std'		=>		''
		),
		array(
			'name'		=>		'思否主页',
			'short'		=>		'segmentfault',
			'desc'		=>		'显示思否主页链接按钮',
			'id'		=>		'sa_social_segmentfault_url',
			'type'		=>		'text',
			'std'		=>		''
		),
		array(
			'name'		=>		'哔哩哔哩',
			'short'		=>		'bilibili',
			'desc'		=>		'显示哔哩哔哩个人主页链接按钮',
			'id'		=>		'sa_social_bilibili_url',
			'type'		=>		'text',
			'std'		=>		''
		),
		array(
			'name'		=>		'AcFun 主页',
			'short'		=>		'acfun',
			'desc'		=>		'显示 AcFun 个人主页链接按钮',
			'id'		=>		'sa_social_acfun_url',
			'type'		=>		'text',
			'std'		=>		''
		),
		array(
			'name'		=>		'E-mail',
			'short'		=>		'mail',
			'desc'		=>		'显示 E-mail 链接按钮',
			'id'		=>		'sa_social_email_url',
			'type'		=>		'text',
			'std'		=>		''
		),
		array(
			'name'		=>		'Facebook 主页',
			'short'		=>		'facebook',
			'desc'		=>		'显示 Facebook 主页链接按钮',
			'id'		=>		'sa_social_facebook_url',
			'type'		=>		'text',
			'std'		=>		''
		),
		array(
			'name'		=>		'Google 主页',
			'short'		=>		'google',
			'desc'		=>		'显示 Google 主页链接按钮',
			'id'		=>		'sa_social_google_url',
			'type'		=>		'text',
			'std'		=>		''
		),
		array(
			'name'		=>		'Twitter 主页',
			'short'		=>		'twitter',
			'desc'		=>		'显示 Twitter 主页链接按钮',
			'id'		=>		'sa_social_twitter_url',
			'type'		=>		'text',
			'std'		=>		''
		),
		array(
			'name'		=>		'LinkedIn 主页',
			'short'		=>		'linkedin',
			'desc'		=>		'显示 LinkedIn 主页链接按钮',
			'id'		=>		'sa_social_linkedin_url',
			'type'		=>		'text',
			'std'		=>		''
		)
	),
	'panel_about'	=>	array(
		array(
			'name'		=>		'关于主题',
			'desc'		=>		'',
			'id'		=>		'sa_about',
			'type'		=>		'html',
			'std'		=>		get_template_directory_uri() . '/inc/custom-configs/theme-about.php'
		)
	)
);
?>
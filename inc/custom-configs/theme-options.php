<?php

$theme_tabs = array(
	array(
		'title'		=>		'基本设置',
		'id'		=>		'panel_basic'
	),
	array(
		'title'		=>		'文章页面设置',
		'id'		=>		'panel_post'
	),
	array(
		'title'		=>		'联系方式设置',
		'id'		=>		'panel_social'
	),
	array(
		'title'		=>		'其他设置',
		'id'		=>		'panel_other'
	),	
	array(
		'title'		=>		'关于主题',
		'id'		=>		'panel_about'
	)
);

$theme_options = array(
		
	'panel_basic'	=>	array(
		// 页面显示效果设置
		array(
			'name'      =>		'页面效果设置',
			'type'      =>		'subtitle'
		),
		array(
			'name'      =>		'点击小红心',
			'desc'		=>		'打开则显示鼠标点击小红心效果',
			'id'        =>		'sa_home_clicklove',
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
			'id'        =>		'sa_home_progressbar',
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
			'id'        =>		'sa_home_since',
			'type'      =>		'text',
			'std'		=>		'2021'
		),
		array(
			'name'      =>		'网站备案号',
			'desc'		=>		'设置「网站备案号」',
			'id'        =>		'sa_home_icp',
			'type'      =>		'text',
			'std'		=>		'ICP备案 XXX 号'
		),
		array(
			'name'      =>		'网站访问人数统计',
			'desc'		=>		'打开则在「网站底部」显示「网站访问人数」',
			'id'        =>		'sa_home_uv',
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
			'name'      =>		'最新文章',
			'desc'		=>		'打开则在「侧边栏」显示「最新文章」',
			'id'        =>		'sa_sidebar_recents',
			'type'      =>		'select',
			'options'	=>		array(
					'close'	=>	'关闭',
					'open'	=>	'开启'
			),
			'std'		=>		'close'
		),
		array(
			'name'      =>		'热门标签',
			'desc'		=>		'打开则在「侧边栏」显示「热门标签」',
			'id'        =>		'sa_sidebar_hottags',
			'type'      =>		'select',
			'options'	=>		array(
					'close'	=>	'关闭',
					'open'	=>	'开启'
			),
			'std'		=>		'close'
		),
	),
	'panel_post'		=>	array(
		array(
			'name'      =>		'文章目录',
			'desc'		=>		'打开则在「文章页面」的「侧边栏」显示「文章目录」',
			'id'        =>		'sa_sidebar_posttoc',
			'type'      =>		'select',
			'options'	=>		array(
					'close'	=>	'关闭',
					'open'	=>	'开启'
			),
			'std'		=>		'close'
		),
		array(
			'name'      =>		'代码高亮',
			'desc'		=>		'打开则使用 prettify.js 代码高亮',
			'id'        =>		'sa_sidebar_posttoc',
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
			'id'        =>		'sa_sidebar_posttoc',
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
			'id'        =>		'sa_sidebar_posttoc',
			'type'      =>		'select',
			'options'	=>		array(
					'close'	=>	'关闭',
					'open'	=>	'开启'
			),
			'std'		=>		'close'
		),
	),
	'panel_social'	=>	array(
		array(
			'name'      =>		'侧边栏显示「联系方式」',
			'desc'		=>		'打开则在「侧边栏」显示「联系方式」，可在下方设置具体连接',
			'id'        =>		'sa_sidebar_hottags',
			'type'      =>		'select',
			'options'	=>		array(
					'close'	=>	'关闭',
					'open'	=>	'开启'
			),
			'std'		=>		'close'
		),

		array(
			'name'		=>		'博客主页',
			'desc'		=>		'显示博客主页链接按钮',
			'id'		=>		'sa_social_blog_url',
			'type'		=>		'text',
			'std'		=>		'https://itcharge.cn'
		),
		array(
			'name'		=>		'GitHub 主页',
			'desc'		=>		'显示 GitHub 主页链接按钮',
			'id'		=>		'sa_social_github_url',
			'type'		=>		'text',
			'std'		=>		'https://itcharge.cn'
		),
		array(
			'name'		=>		'微信二维码',
			'desc'		=>		'显示微信二维码链接按钮',
			'id'		=>		'sa_social_wechat_url',
			'type'		=>		'text',
			'std'		=>		''
		),
		array(
			'name'		=>		'微博主页',
			'desc'		=>		'显示微博主页链接按钮',
			'id'		=>		'sa_social_weibo_url',
			'type'		=>		'text',
			'std'		=>		'https://itcharge.cn'
		),
		array(
			'name'		=>		'知乎主页',
			'desc'		=>		'显示知乎主页链接按钮',
			'id'		=>		'sa_social_zhihu_url',
			'type'		=>		'text',
			'std'		=>		'https://itcharge.cn'
		),
		array(
			'name'		=>		'CSDN 主页',
			'desc'		=>		'显示 CSDN 主页链接按钮',
			'id'		=>		'sa_social_csdn_url',
			'type'		=>		'text',
			'std'		=>		'https://itcharge.cn'
		),
		array(
			'name'		=>		'博客园主页',
			'desc'		=>		'显示博客园主页链接按钮',
			'id'		=>		'sa_social_cnblogs_url',
			'type'		=>		'text',
			'std'		=>		'https://itcharge.cn'
		),
		array(
			'name'		=>		'码云主页',
			'desc'		=>		'显示 gitee 主页链接按钮',
			'id'		=>		'sa_social_gitee_url',
			'type'		=>		'text',
			'std'		=>		'https://itcharge.cn'
		),
		array(
			'name'		=>		'QQ 号',
			'desc'		=>		'显示添加 QQ 号链接按钮',
			'id'		=>		'sa_social_qq_url',
			'type'		=>		'text',
			'std'		=>		'https://itcharge.cn'
		),
		array(
			'name'		=>		'简书主页',
			'desc'		=>		'显示简书主页链接按钮',
			'id'		=>		'sa_social_jianshu_url',
			'type'		=>		'text',
			'std'		=>		''
		),
		array(
			'name'		=>		'豆瓣主页',
			'desc'		=>		'显示豆瓣主页链接按钮',
			'id'		=>		'sa_social_douban_url',
			'type'		=>		'text',
			'std'		=>		'https://itcharge.cn'
		),
		array(
			'name'		=>		'思否主页',
			'desc'		=>		'显示思否主页链接按钮',
			'id'		=>		'sa_social_segmentfault_url',
			'type'		=>		'text',
			'std'		=>		'https://itcharge.cn'
		),
		array(
			'name'		=>		'哔哩哔哩',
			'desc'		=>		'显示哔哩哔哩个人主页链接按钮',
			'id'		=>		'sa_social_segmentfault_url',
			'type'		=>		'text',
			'std'		=>		'https://itcharge.cn'
		),
		array(
			'name'		=>		'AcFun 主页',
			'desc'		=>		'显示 AcFun 个人主页链接按钮',
			'id'		=>		'sa_social_acfun_url',
			'type'		=>		'text',
			'std'		=>		'https://itcharge.cn'
		),
		array(
			'name'		=>		'E-mail',
			'desc'		=>		'显示 E-mail 链接按钮',
			'id'		=>		'sa_social_email_url',
			'type'		=>		'text',
			'std'		=>		'https://itcharge.cn'
		),
		array(
			'name'		=>		'Facebook 主页',
			'desc'		=>		'显示 Facebook 主页链接按钮',
			'id'		=>		'sa_social_facebook_url',
			'type'		=>		'text',
			'std'		=>		'https://itcharge.cn'
		),
		array(
			'name'		=>		'Google 主页',
			'desc'		=>		'显示 Google 主页链接按钮',
			'id'		=>		'sa_social_google_url',
			'type'		=>		'text',
			'std'		=>		'https://itcharge.cn'
		),
		array(
			'name'		=>		'Twitter 主页',
			'desc'		=>		'显示 Twitter 主页链接按钮',
			'id'		=>		'sa_social_twitter_url',
			'type'		=>		'text',
			'std'		=>		'https://itcharge.cn'
		),
		array(
			'name'		=>		'LinkedIn 主页',
			'desc'		=>		'显示 LinkedIn 主页链接按钮',
			'id'		=>		'sa_social_linkedin_url',
			'type'		=>		'text',
			'std'		=>		'https://itcharge.cn'
		)
	),
	'other'			=>	array(
		array(
			'name'		=>		'LinkedIn 主页',
			'desc'		=>		'显示 LinkedIn 主页链接按钮',
			'id'		=>		'sa_social_linkedin_url',
			'type'		=>		'text',
			'std'		=>		'https://itcharge.cn'
		)
	),
	'panel_about'	=>	array(
		array(
			'name'		=>		'LinkedIn 主页',
			'desc'		=>		'显示 LinkedIn 主页链接按钮',
			'id'		=>		'sa_social_linkedin_url',
			'type'		=>		'text',
			'std'		=>		'https://itcharge.cn'
		)
	)
);
?>
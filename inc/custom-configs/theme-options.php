<?php

$theme_tabs = array(
	array(
		'title'		=>		'基本设置',
		'id'		=>		'panel_basic'
	),
	array(
		'title'		=>		'边栏设置',
		'id'		=>		'pannel_sidebar'	
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
		array(
			'name'      =>		'图标设置',
			'type'      =>		'subtitle'
		),
		array(
			'name'      =>		'网站图标',
			'desc'		=>		'用于浏览器的地址栏或书签中显示',
			'id'        =>		'sa_home_favicon',
			'type'      =>		'img',
			'std'		=>		''
		),
		array(
			'name'      =>		'顶栏图标',
			'desc'		=>		'用于顶部网站显示',
			'id'        =>		'sa_home_headicon',
			'type'      =>		'img',
			'std'		=>		''
		),
		array(
			'name'      =>		'页面效果设置',
			'type'      =>		'subtitle'
		),
		array(
			'name'      =>		'点击小红心',
			'desc'		=>		'',
			'id'        =>		'sa_home_clicklove',
			'type'      =>		'select',
			'options'	=>		array(
					'close'	=>	'关闭',
					'open'	=>	'打开'
			),
			'std'		=>		'close'
		),
		array(
			'name'      =>		'底部设置',
			'type'      =>		'subtitle'
		),
		array(
			'name'      =>		'网站成立年份',
			'desc'		=>		'',
			'id'        =>		'sa_home_since',
			'type'      =>		'text',
			'std'		=>		''
		),
		array(
			'name'      =>		'网站备案号',
			'desc'		=>		'',
			'id'        =>		'sa_home_icp',
			'type'      =>		'text',
			'std'		=>		''
		),
		array(
			'name'      =>		'网站访问人数统计',
			'desc'		=>		'用于统计网站访问人数',
			'id'        =>		'sa_home_uv',
			'type'      =>		'select',
			'options'	=>		array(
					'close'	=>	'关闭',
					'open'	=>	'打开'
			),
			'std'		=>		'close'
		),
		array(
			'name'      =>		'网站访问次数统计',
			'desc'		=>		'用于统计网站访问次数',
			'id'        =>		'sa_home_pv',
			'type'      =>		'select',
			'options'	=>		array(
					'close'	=>	'关闭',
					'open'	=>	'打开'
			),
			'std'		=>		'close'
		)
	),
	'pannel_sidebar'	=> array(
		array(
			'name'      =>		'网站图标',
			'desc'		=>		'',
			'id'        =>		'home_icon_types',
			'type'      =>		'img',
			'std'		=>		''
		)	
	),
	'panel_post'		=>	array(
		array(
			'name'      =>		'网站图标',
			'desc'		=>		'',
			'id'        =>		'home_icon_types',
			'type'      =>		'img',
			'std'		=>		''
		)
	),
	'panel_social'	=>	array(
		array(
			'name'		=>		'侧边栏是否显示社交链接',
			'desc'		=>		'',
			'id'		=>		'sa_social_switch',
			'type'		=>		'check',
			'std'		=>		'false'
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
			'desc'		=>		'显示微信二维码按钮',
			'id'		=>		'sa_social_wechat_url',
			'type'		=>		'img',
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
<?php
/**
 * 主题设置面板
 *
 * @package Sapphire
 * @since Sapphire 1.0
 */
?>

<?php
/**
* 主题设置面板
*/
function set_theme_config() {
	add_theme_page( '主题选项', '主题设置', 'administrator', 'sapphire_slug', 'theme_config_page' );
}
add_action('admin_menu', 'set_theme_config');

function theme_config_page() {
	global $theme_options, $theme_tabs;
	if ( $_REQUEST['action'] == 'update' ) {	// 保存信息
		save_options();
	} else if ( $_REQUEST['action'] == 'reset' ) {	// 恢复默认
		reset_options();
	}
	echo '<div class="wrap sapphire-setup-panel">';
		echo '<h2>Sapphire 主题设置</h2>';
		echo '<form method="post">';
			echo '<h2 class="nav-tab-wrapper">';
			$tab_index = 0;
			foreach ($theme_tabs as $value) {
				if ($tab_index == 0) {
					echo '<a href="#'.$value['id'].'" class="nav-tab nav-tab-active">'.$value['title'].'</a>';
				} else {
					echo '<a href="#'.$value['id'].'" class="nav-tab">'.$value['title'].'</a>';
				}
				$tab_index++;
			}
			echo '</h2>';
			$pannel_index = 0; 
			foreach ($theme_tabs as $theme_tab) {
				$pannel_options = $theme_options[$theme_tab['id']];
				if ($pannel_index == 0) {
					echo '<div class="panel" id="'.$theme_tab['id'].'" style="display: block;">';
				} else {
					echo '<div class="panel" id="'.$theme_tab['id'].'">';
				}
					echo '<table class="form-table">';
					foreach ($pannel_options as $pannel_option) {
						$option_key = sa_theme_option($pannel_option['id']);
						$pannel_options[$pannel_option['std']] = $option_key;
						sa_theme_print_html($pannel_option, $option_key);
					}
					echo '</table>';
				echo '</div>';
				$pannel_index++;
			}
?>
			<div class="update-reset-option">
				<input name="submit" type="submit" class="button button-primary" value="保存更改"/>
				<input type="hidden" name="action" value="update" />
			</div>
		</form>
		&nbsp; &nbsp; &nbsp; &nbsp;
		<form method="post">
			<div class="update-reset-option">
				<input name="reset" type="submit" class="button button-secondary" value="重置主题" 
				 onclick="return confirm('重置后将清除本主题所有的设置项！是否重置？');"/>
				<input type="hidden" name="action" value="reset" />
			</div>
		</form>
	</div>
<style>
#wpcontent{background:#fff}
#wpwrap{background-color: #fff;}
.wrap{background-color: #fff;}
.panel{display:none}
.panel h2{margin:0;font-size:1.2em}
.nav-tab-wrapper{clear:both;border-bottom:2px solid #eee}
.nav-tab{position:relative}
.nav-tab:focus {box-shadow:none;}
.nav-tab i:before{position:absolute;top:-10px;right:-8px;display:inline-block;padding:2px;border-radius:50%;background:#e14d43;color:#fff;content:"\f463";vertical-align:text-bottom;font:400 18px/1 dashicons;speak:none}
.nav-tab .nav-tab-active{border-bottom-color: rgb(66,133,244);margin-bottom:-2px}
.nav-tab:active, .nav-tab:focus{background:#eee;outline:0}
.nav-tab{background:#fff;border:none;padding:10px 18px;margin-bottom:1px;margin-left:0;border-bottom: 3px solid transparent;}
.regular-text {width: 50%;}
</style>
<script>
jQuery(function ($) {
	$(".nav-tab").click(function () {
		$(this).addClass("nav-tab-active").siblings().removeClass("nav-tab-active");
		$(".panel").hide();
		$($(this).attr("href")).show();
		return false;
	});
	//上传单个图片
	$('.sa-theme-upload-image').on("click",function(e) {
		var custom_uploader;

		var obj = $(this);
		e.preventDefault();

		if (custom_uploader) {
			custom_uploader.open();
			return;
		}

		var custom_uploader = wp.media({
			title: '插入选项缩略图',
			button: {
				text: '选择图片'
			},
			multiple: false  // Set this to true to allow multiple files to be selected
		});

		custom_uploader.on('select', function() {
			var attachment = custom_uploader.state().get('selection').first().toJSON();
			obj.prev("input").val(attachment.url)
			obj.next("img").attr('src',attachment.url);
			$('.media-modal-close').trigger('click');
		});

		custom_uploader.open();
	});
});
</script>

<?php	
}

function sa_theme_print_html($option, $option_key) {
	echo '<tr>';
	switch ($option['type']) {
		case 'subtitle':
			echo '<td><h2>'.$option['name'].'</h2></td>';
			break;
		case 'text':
			echo '<th><label for="'.$option['id'].'">'.$option['name'].'</label></th>';
			echo '<td><label>';
				echo '<input type="'.$option['type'].'" name="'.$option['id'].'" class="regular-text" id="'.$option['id'].'" value="'.htmlspecialchars($option_key).'"></input> &nbsp;';
				echo '<span class="description">'.$option['desc'].'</span>';
			echo '</td></label>';
			break;
		case 'textarea':
			echo '<th><label for="'.$option['id'].'">'.$option['name'].'</label></th>';
			echo '<td><label>';
				echo '<textarea name="'.$option['id'].'" class="regular-text" id="'.$option['id'].'" rows="3" cols="50">'.htmlspecialchars($option_key).'</textarea> &nbsp;';
				echo '<span class="description">'.$option['desc'].'</span>';
			echo '</td></label>';
			break;
		case 'image':
			echo '<th><label for="'.$option['id'].'">'.$option['name'].'</label></th>';
			echo '<td><label>';
				echo '<div class="input-group">';
					echo '<input type="text" name="'.$option['id'].'" class="regular-text" id="'.$option['id'].'" value="'.htmlspecialchars($option_key).'"></input> &nbsp;';
					echo '<input type="button" name="'.$option['id'].'" class="sa-theme-upload-image" id="'.$option['id'].'" value="上传"></input> &nbsp;';
					echo '<span class="description">'.$option['desc'].'</span>';
				echo '</div>';
				echo '<img src="'.htmlspecialchars($option_key).'" style="max-width:80px;vertical-align: top;margin:10px 0" />';
			echo '</td></label>';
			break;
		case 'select':
			$select_options = $option['options'];
			echo '<th><label for="'.$option['id'].'">'.$option['name'].'</label></th>';
			echo '<td><label>';
				echo '<select name="'.$option['id'].'" id="'.$option['id'].'">';
				foreach ($select_options as $select_key => $select_value) {
					if ($option_key == $select_key) {
						echo '<option value="'.$select_key.'" selected>'.$select_value.'</option>';
					} else {
						echo '<option value="'.$select_key.'">'.$select_value.'</option>';
					}
				}
				echo '</select> &nbsp;';
				echo '<span class="description">'.$option['desc'].'</span>';
			echo '</td></label>';
			break;
		default:
			echo '<th><label for="'.$option['id'].'">'.$option['name'].'</label></th>';
			break;
	}
	echo '</tr>';
}

// 获取主题选项值
function sa_theme_option($key, $default = '', $echo = false) {
	global $theme_options, $theme_tabs;
	$result = get_option($key);
	if ( $result ) {
		return $result;
	}
	if ( $default ) {
		return $default;
	} 
	foreach ($theme_tabs as $theme_tab) {
		$pannel_options = $theme_options[$theme_tab['id']];
		foreach ($pannel_options as $pannel_option) {
			if (isset($pannel_option['id']) && ($pannel_option['id'] == $key)) {
				$result = $pannel_option['std'];
				update_option($key, $result);
				break;
			}
		}
	}
	return $result;
}

// 保存主题选项值
function save_options() {
	global $theme_options, $theme_tabs;
	foreach ($theme_tabs as $theme_tab) {
		$pannel_options = $theme_options[$theme_tab['id']];
		foreach ($pannel_options as $pannel_option) {
			if ( isset($_REQUEST[$pannel_option['id']]) ) {
				update_option($pannel_option['id'], $_REQUEST[$pannel_option['id']]);
			} else {
				delete_option($pannel_option['id']);
			}
		}
	}
	echo '<div class="updated"><p><strong>主题设置已保存！</strong></p></div>';
	update_option('sapphire_options_setup', true);
}

// 重置主题选项值
function reset_options() {
	global $theme_options, $theme_tabs;
	foreach ($theme_tabs as $theme_tab) {
		$pannel_options = $theme_options[$theme_tab['id']];
		foreach ($pannel_options as $pannel_option) {
			delete_option($pannel_option['id']);
		}
	}
	delete_option('sapphire_options_setup');   // 删除主题初始化标志
	echo '<div class="updated"><p><strong>主题设置已重置。</strong></p></div>';
}

// 主题上传功能
function load_media_files() {
	wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'load_media_files' );

// 自定义主题选项栏
function theme_customize_register( $wp_customize ) {

	$wp_customize->add_setting( 'sa_praise_wechat_qrcode', array(
		'default'   	=> 		'',
		"transport" 	=> 		"postMessage",
		'type'      	=> 		'theme_mod'
	) );
	$wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 'sa_praise_wechat_qrcode', array(
		'label'			=>		'微信打赏二维码',
		'description'	=>		'设置文章底部微信打赏二维码图片，最佳尺寸：130px * 130px（不设置则不显示打赏按钮）',
		'section'		=>		'theme_section_praise'
	) ) );
	$wp_customize->add_setting( 'sa_praise_alipay_qrcode', array(
		'default'  		=> 		'',
		"transport"		=> 		"postMessage",
		'type'      	=> 		'theme_mod'
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'sa_praise_alipay_qrcode', array(
		'label'			=>		'支付宝打赏二维码',
		'description'	=>		'设置文章底部支付宝打赏二维码图片，最佳尺寸：130px * 130px（不设置则不显示打赏按钮）',
		'section'		=>		'theme_section_praise'
	) ) );
	
	$wp_customize->add_setting( 'sa_site_logo', array(
		'default'		=> 		'',
		'transport' 	=> 		'refresh',
		'type' 		    => 		'theme_mod'
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'sa_site_logo', array(
		'label'     	=> 		'站点 logo',
		'description' 	=> 		'设置网站顶部 logo，最佳尺寸：165px * 45px（不设置则显示纯文字站名）',
		'section'   	=> 		'title_tagline',
		'priority'  	=> 		300
	) ) );
}
add_action( 'customize_register', 'theme_customize_register' );
?>
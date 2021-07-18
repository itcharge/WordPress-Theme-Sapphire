<?php
	include 'theme-options.php';
?>

<div class="wrap sapphire-setup-panel">
	<h2>Sapphire 主题设置</h2>
	<form>
		<h2 class="nav-tab-wrapper">
		<?php
			$tab_index = 0;
			foreach ($theme_tabs as $value) {
				if ($tab_index == 0) {
					echo '<a href="#'.$value['id'].'" class="nav-tab nav-tab-active">'.$value['title'].'</a>';
				} else {
					echo '<a href="#'.$value['id'].'" class="nav-tab">'.$value['title'].'</a>';
				}
				$tab_index++;
			}
		?>
		</h2>
		<?php
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
						echo '<tr>';
						if ($pannel_option['type'] == 'subtitle') {
							echo '<td><h2>'.$pannel_option['name'].'</h2></td>';
						} elseif ($pannel_option['type'] == 'text') {
							echo '<th><label for="'.$pannel_option['id'].'">'.$pannel_option['name'].'</label></th>';
							echo '<td><label>';
								echo '<input type="'.$pannel_option['type'].'" name="'.$pannel_option['id'].'" class="regular-text" id="'.$pannel_option['id'].'" value="'.$pannel_option['std'].'"></input> &nbsp;';
								echo '<span class="description">'.$pannel_option['desc'].'</span>';
							echo '</td></label>';
						} elseif ($pannel_option['type'] == 'select') {
							$select_options = $pannel_option['options'];
							echo '<th><label for="'.$pannel_option['id'].'">'.$pannel_option['name'].'</label></th>';
							echo '<td><label>';
								echo '<select name="'.$pannel_option['id'].'" id="'.$pannel_option['id'].'">';
								foreach ($select_options as $select_option) {
									echo '<option>'.$select_option.'</option>';
								}
								echo '<span class="description">'.$pannel_option['desc'].'</span>';
							echo '</td></label>';
						} else {
							echo '<th><label for="'.$pannel_option['id'].'">'.$pannel_option['name'].'</label></th>';
						}
						echo '</tr>';
					}
					echo '</table>';
				echo '</div>';
				$pannel_index++;
			}
		?>
		
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
</style>
<script>
jQuery(function ($) {
	$(".nav-tab").click(function () {
		$(this).addClass("nav-tab-active").siblings().removeClass("nav-tab-active");
		$(".panel").hide();
		$($(this).attr("href")).show();
		return false;
	});
});
</script>
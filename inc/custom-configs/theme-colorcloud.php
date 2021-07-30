<?php
function colorCloud($text) {
	$text = preg_replace_callback('|<a (.+?)>|i', 'colorCloudCallback', $text);
	return $text;
}
function rand_color() {
	$red = sprintf('%02X', mt_rand(0x2E, 0x34));
	$green = sprintf('%02X', mt_rand(0x30, 0x49));
	$blue = sprintf('%02X', mt_rand(0x32, 0x5e));
	
	return '#'.$red.$green.$blue;
}
function colorCloudCallback($matches) {
	$text = $matches[1];
	$color = rand_color();
	$pattern = '/style=(\'|\")(.*)(\'|\")/i';
	$text = preg_replace($pattern, "style=\"color:$color; $2;\"", $text);
	return "<a $text>";
}
add_filter('wp_tag_cloud', 'colorCloud', 1);
?>
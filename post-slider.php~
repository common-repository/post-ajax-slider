<?php
/*
Plugin Name: Post Ajax Slider
Description: This plugin is used to make the reader read the most updated news for some categories in good designed slider. 
Version: 0.0.1
Author: Yuri Setiantoko
Author URI: http://yuri.byethost17.com/
*/

define('POST_AJAX_SLIDER_VERSION','0.0.1');
add_action('admin_init','post_ajax_slider_init');
add_theme_support( 'post-thumbnails' );
//add_action('post-ajax-slider','post_ajax_slider_viewer','1');

function post_ajax_slider_init()
{
	// register setting
	$all_category_ids = get_all_category_ids();
	$count_category = count($all_category_ids);
	$i = 0; 
	while($i < $count_category )
	{
		register_setting('post-ajax-slider-settings-group',get_cat_name($all_category_ids[--$count_category]));
		register_setting('post-ajax-slider-settings-group',get_cat_name($all_category_ids[$count_category])."-image");
	}
	register_setting('post-ajax-slider-settings-group', 'default-image-cat');
	register_setting('post-ajax-slider-settings-group', 'no-post-cat');
	register_setting('post-ajax-slider-settings-group', 'category_icon_size');
	register_setting('post-ajax-slider-settings-group', 'post-image-width');
	//update_option('category_icon_size','128');
	$upload_image = "wp-content/plugins/post-ajax-slider/styles/images/";
	update_option('no-post-cat',$upload_image.'no-post.png');
	update_option('default-image-cat',$upload_image.'default.png');
}

/**
function post_ajax_slider_viewer()
{
	//echo "Tol";
	require_once("wp-content/plugins/post-ajax-slider/post-viewer.php");
}
**/

function post_ajax_slider_options_page()
{
	add_options_page('Post Ajax Slider Option','Post Ajax Slider',10,'post-ajax-slider/options.php');
}

function post_ajax_slider_js()
{
	
	$post_ajax_slider_path = get_bloginfo('wpurl')."/wp-content/plugins/post-ajax-slider/";
	$script_js = "
	<!-- link ke external javascript -->
	<script src=\"".$post_ajax_slider_path."lib/jquery/jquery-1.3.2.js\" type=\"text/javascript\"> 
	</script>
	<script src=\"".$post_ajax_slider_path."lib/jquery/jquery-1.3.2.min.js\" type=\"text/javascript\"> 
	</script>	
	<script src=\"".$post_ajax_slider_path."post-ajax.js\" type=\"text/javascript\"> 
	</script>
	";
	echo $script_js;
}

function post_ajax_slider_styles()
{
	
	$post_ajax_slider_path = get_bloginfo('wpurl')."/wp-content/plugins/post-ajax-slider/";
	$style_css = "
	<!-- link ke external stylesheet -->
	<link rel=\"stylesheet\" href=\"".$post_ajax_slider_path."styles/default.css\" type=\"text/css\" media=\"screen\" />
	";
	echo $style_css;
}

/* menambahkan script external dan style external ke header */
add_action('wp_head','post_ajax_slider_js');
add_action('wp_head','post_ajax_slider_styles');

/* menambahkan submenu option page dari plugin ini ke admin */
add_action('admin_menu','post_ajax_slider_options_page');

?>
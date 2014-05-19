<?php
/**
 * Plugin Name: cubetech Jobs
 * Plugin URI: http://www.cubetech.ch
 * Description: cubetech Jobs - create some jobs, usable with a shorttags
 * Version: 1.0
 * Author: cubetech GmbH
 * Author URI: http://www.cubetech.ch
 */

include_once('lib/cubetech-post-type.php');
include_once('lib/cubetech-shortcode.php');

wp_enqueue_script('jquery');
wp_register_script('cubetech_jobs_js', plugins_url('assets/js/cubetech-jobs.js', __FILE__), array('jquery','wpdialogs'));
wp_enqueue_script('cubetech_jobs_js');

add_action('wp_enqueue_scripts', 'cubetech_jobs_add_styles');

function cubetech_jobs_add_styles() {
	wp_register_style('cubetech-jobs-css', plugins_url('assets/css/cubetech-jobs.css', __FILE__) );
	wp_enqueue_style('cubetech-jobs-css');
}
if(!function_exists('enqueue_css'))
{
	function enqueue_css()
	{
		wp_register_style('custom_jquery-ui-dialog', plugins_url('assets/css/jquery-ui-dialog.min.css', __FILE__) );
		wp_enqueue_style('custom_jquery-ui-dialog');
	}
	add_action( 'admin_enqueue_scripts', 'enqueue_css' );
} 
/* Add button to TinyMCE */
function cubetech_jobs_addbuttons() {

	if ( (! current_user_can('edit_posts') && ! current_user_can('edit_pages')) )
		return;
	
	if ( get_user_option('rich_editing') == 'true') {
		add_filter("mce_external_plugins", "add_cubetech_jobs_tinymce_plugin");
		add_filter('mce_buttons', 'register_cubetech_jobs_button');
		add_action( 'admin_footer', 'cubetech_jobs_dialog' );
	}
}
 
function register_cubetech_jobs_button($buttons) {
   array_push($buttons, "|", "cubetech_jobs_button");
   return $buttons;
}
 
function add_cubetech_jobs_tinymce_plugin($plugin_array) {
	$plugin_array['cubetech_jobs'] = plugins_url('assets/js/cubetech-jobs-tinymce.js', __FILE__);
	return $plugin_array;
}

add_action('init', 'cubetech_jobs_addbuttons');

function cubetech_jobs_dialog() { 

	$args=array(
		'hide_empty' => false,
		'orderby' => 'name',
		'order' => 'ASC'
	);
	$taxonomies = get_terms('cubetech_jobs_group', $args);
	
	?>
	<style type="text/css">
		#cubetech_jobs_dialog { padding: 10px 30px 15px; }
	</style>
	<div style="display:none;" id="cubetech_jobs_dialog">
		<div>
			<p><input type="submit" class="button-primary" value="Jobs einfügen" onClick="tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[cubetech-jobs]'); tinyMCEPopup.close();" /></p>
		</div>
	</div>
	<?php
}

?>

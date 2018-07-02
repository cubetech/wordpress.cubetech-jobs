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

add_action('wp_enqueue_scripts', 'cubetech_jobs_add_styles');

function cubetech_jobs_add_styles() {
	wp_register_style( 'cubetech-jobs-css', plugins_url('assets/css/cubetech-jobs.css', __FILE__) );
	wp_enqueue_style( 'cubetech-jobs-css' );
	wp_enqueue_script('cubetech_jobs_js', plugins_url('assets/js/cubetech-jobs.js', __FILE__), array('jquery','wpdialogs'));
}

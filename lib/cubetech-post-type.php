<?php
function cubetech_jobs_create_post_type() {
	register_post_type('cubetech_jobs',
		array(
			'labels' => array(
				'name' => __('Jobs'),
				'singular_name' => __('Job'),
				'add_new' => __('Job hinzufügen'),
				'add_new_item' => __('Neuer Job hinzufügen'),
				'edit_item' => __('Job bearbeiten'),
				'new_item' => __('Neuer Job'),
				'view_item' => __('Job betrachten'),
				'search_items' => __('Jobs durchsuchen'),
				'not_found' => __('Keine Jobs gefunden.'),
				'not_found_in_trash' => __('Keine Jobs gefunden.')
			),
			'capability_type' => 'post',
			'taxonomies' => false,
			'public' => true,
			'has_archive' => false,
			'rewrite' => array('slug' => 'jobs', 'with_front' => false),
			'show_ui' => true,
			'menu_position' => '20',
			'menu_icon' => null,
			'hierarchical' => true,
			'supports' => array('title', 'editor', 'thumbnail')
		)
	);
	flush_rewrite_rules();
}
add_action('init', 'cubetech_jobs_create_post_type');
?>

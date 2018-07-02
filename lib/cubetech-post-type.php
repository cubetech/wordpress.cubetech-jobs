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
				'description' => _x('Jobs', 'Description', 'wptheme-foundation'),
				'supports' => array('title', 'editor', 'thumbnail', 'revisions'),
				'hierarchical'        => false,
				'public'              => true,
				'show_ui'             => true,
				'show_in_nav_menus'   => true,
				'show_in_admin_bar'   => true,
				'menu_position'       => 20,
				'can_export'          => true,
				'has_archive'         => false,
				'exclude_from_search' => false,
				'publicly_queryable'  => true,
				'capability_type'     => 'post',
				'rewrite'			  => array( 'slug' => 'jobs', 'with_front' => false ),
				'menu_icon'			  => 'dashicons-admin-plugins',
			)
		);
	}

	add_action('init', 'cubetech_jobs_create_post_type');

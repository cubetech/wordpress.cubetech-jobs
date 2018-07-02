<?php
function cubetech_jobs_shortcode($atts)
{
	extract(shortcode_atts(array(
		'orderby' 		=> 'menu_order',
		'order'			=> 'asc',
		'numberposts'	=> 999,
		'offset'		=> 0,
		'poststatus'	=> 'publish',
	), $atts));
	
	$return .= '<div class="cubetech-jobs-container">';

	$args = array(
		'posts_per_page'  	=> 999,
		'numberposts'     	=> $numberposts,
		'offset'          	=> $offset,
		'orderby'         	=> $orderby,
		'order'           	=> $order,
		'post_type'       	=> 'cubetech_jobs',
		'post_status'     	=> $poststatus,
		'suppress_filters' 	=> true,
	);
		
	$posts = get_posts($args);
	
	$return .= cubetech_jobs_content($posts);
		
	return $return;

}

add_shortcode('cubetech-jobs', 'cubetech_jobs_shortcode');

function cubetech_jobs_content($posts) {

	$contentreturn = '';
	
	$i = 0;
	
	foreach ($posts as $post) {

		$post_meta_data = get_post_custom($post->ID);
		$terms = wp_get_post_terms($post->ID, 'cubetech_jobs_group');
		$url = $post_meta_data['cubetech_jobs_url'][0];
		
		$image = get_the_post_thumbnail( $post->ID, 'cubetech-jobs-thumb', array('class' => 'cubetech-jobs-thumb') );
		
		$args = array( 'post_mime_type' => 'application/pdf', 'post_type' => 'attachment', 'numberposts' => 1, 'post_status' => null, 'post_parent' => $post->ID );
		$attachments = get_posts($args);
		
		$contentreturn .= '
		<div class="cubetech-jobs">
			<div class="cubetech-jobs-content">
				<h3>' . $post->post_title . '</h3>
				' . $post->post_content . '
			</div>';
		
		if ( count($attachments) > 0 ) {
			$contentreturn .= '<div class="cubetech-jobs-link">
				<a class="cubetech-jobs-button" target="_blank" href="' . get_field('pdf_job', $post->ID) . '">PDF herunterladen</a>
			</div>';
		}
		$contentreturn .= '</div>';
		
		$i++;

	}
	
	return $contentreturn;
	
}
?>

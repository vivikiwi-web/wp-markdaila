<?php

// Prevent direct access
if (! defined('ABSPATH')) {
	exit;
}

/**
 * Remove junk
 */
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

/**
 * Remove comments feed
 *
 * @return void
 */

function kiwi_post_comments_feed_link()
{
	return;
}
add_filter('post_comments_feed_link', 'kiwi_post_comments_feed_link');

/**
 * Remove unnecessary scripts
 *
 * @return void
 */
function deregister_scripts()
{
	wp_deregister_script('wp-embed');
}
add_action('wp_footer', 'deregister_scripts');

/**
 * Redirect author archives to homepage
 */
add_action('template_redirect', function () {
	if (is_author()) {
		wp_redirect(home_url(), 301);
		exit;
	}
});

/**
 * Redirect author query parameter to homepage
 */
add_action('init', function () {
	if (isset($_GET['author'])) {
		wp_redirect(home_url(), 301);
		exit;
	}
});

/**
 * Disable REST API user endpoints
 */
add_filter('rest_endpoints', function ($endpoints) {
	if (isset($endpoints['/wp/v2/users'])) {
		unset($endpoints['/wp/v2/users']);
	}
	if (isset($endpoints['/wp/v2/users/(?P<id>[\d]+)'])) {
		unset($endpoints['/wp/v2/users/(?P<id>[\d]+)']);
	}
	return $endpoints;
});

/**
 * Remove unnecessary styles
 *
 * @return void
 */
function deregister_styles()
{
	// wp_dequeue_style('wp-block-library');
	// wp_dequeue_style('wp-block-library-theme');
	wp_dequeue_style('classic-theme-styles');
	// wp_dequeue_style('global-styles');
}

add_action('wp_print_styles', 'deregister_styles', 100);

/**
 * Disable inline block styles (prevents huge inline CSS)
 * Forces WordPress to not load block styles at all
 */
add_filter('should_load_separate_core_block_assets', '__return_false');

/**
 * Prevent WordPress from inlining custom block styles
 * Forces all block styles to load as separate CSS files
 */
add_filter('styles_inline_size_limit', '__return_zero');

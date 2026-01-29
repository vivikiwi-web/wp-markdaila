<?php

/**
 * Plugin Name: Kiwi Blocks
 * Description: Custom Gutenberg blocks built with TypeScript + Tailwind + shadcn.
 * Version: 0.1.0
 */

if (!defined('ABSPATH')) exit;

/**
 * Wordpress cleanup.
 */
require __DIR__ . '/includes/wp-cleanup.php';

add_action('init', function () {
	$blocks_dir = __DIR__ . '/build/blocks';

	if (!is_dir($blocks_dir)) return;

	foreach (scandir($blocks_dir) as $block) {
		if ($block === '.' || $block === '..') continue;

		$path = $blocks_dir . '/' . $block;

		if (file_exists($path . '/block.json')) {
			register_block_type($path);
		}
	}
});

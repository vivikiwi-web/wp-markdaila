<?php

function example_disable_color_for_specific_blocks($args, $block_type)
{

	// List of block types to modify.
	$block_types_to_modify = [
		'core/paragraph',
		'core/heading',
		'core/list',
		'core/list-item'
	];

	// Check if the current block type is in the list.
	if (in_array($block_type, $block_types_to_modify, true)) {
		// Disable color controls.
		$args['supports']['color'] = array(
			'background' => false,
			'link'       => false,
		);
	}

	return $args;
}
add_filter('register_block_type_args', 'example_disable_color_for_specific_blocks', 10, 2);

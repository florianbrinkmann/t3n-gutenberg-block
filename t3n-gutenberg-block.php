<?php
/**
 * Gutenberg block example plugin.
 *
 * @license   GPL-2.0+
 * @package t3n53
 *
 * @wordpress-plugin
 * Plugin Name: t3n Gutenberg Block
 * Description: Example Gutenberg block.
 * Version:     0.1.0
 * Author:      Florian Brinkmann
 * Author URI:  https://florianbrinkmann.com/en/
 * License:     GPL v2 http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Text Domain: t3n-gutenberg-block
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

add_action( 'enqueue_block_editor_assets', 't3n53_enqueue_block_editor_assets' );
add_action( 'enqueue_block_assets', 't3n53_enqueue_block_assets' );

/**
 * Register the block.
 */
function t3n53_enqueue_block_editor_assets() {
	wp_enqueue_script(
		't3n-gutenberg-block-editor-script',
		plugins_url( 'assets/js/editor.blocks.js', __FILE__ ),
		[ 'wp-blocks', 'wp-element' ]
	);
}

/**
 * Enqueue block assets.
 */
function t3n53_enqueue_block_assets() {
	wp_enqueue_style(
		't3n-gutenberg-block-frontend-style',
		plugins_url( 'assets/css/frontend.blocks.css', __FILE__ )
	);

	if ( is_admin() ) {
		wp_enqueue_style(
			't3n-gutenberg-block-editor-style',
			plugins_url( 'assets/css/editor.blocks.css', __FILE__ )
		);
	}
}

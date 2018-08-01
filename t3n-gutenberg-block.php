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
 * Text Domain: t3n53
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Enqueue block script and backend stylesheet.
 */
add_action( 'enqueue_block_editor_assets', function() {
	wp_enqueue_script(
		't3n53-editor-script',
		plugins_url( 'assets/js/editor.blocks.js', __FILE__ ),
		[ 'wp-blocks', 'wp-element' ]
	);

	wp_enqueue_style(
		't3n53-editor-style',
		plugins_url( 'assets/css/editor.blocks.css', __FILE__ )
	);
} );

/**
 * Enqueue styles for backend and frontend.
 */
add_action( 'enqueue_block_assets', function() {
	wp_enqueue_style(
		't3n53-frontend-style',
		plugins_url( 'assets/css/frontend.blocks.css', __FILE__ )
	);
} );

<?php
/*
Plugin Name: Enable Auto Updates
Plugin URI: https://github.com/sc-pulsion/wp_auto_update_mu_plugin/
Description: Enable auto updates for all plugins and themes. Clear WP Fastest Cache after any updates.
Version: 0.3
Author: Stewart Campbell
Author URI: http://www.pulsion.co.uk/
Copyright: Pulsion Technology Ltd
*/

/* 
 * Enable updates even if version control is detected
 */
add_filter( 'automatic_updates_is_vcs_checkout', '__return_false' );

/*
 * Make sure we are only updating minor versions
 */
add_filter( 'allow_dev_auto_core_updates', '__return_false' );
add_filter( 'allow_major_auto_core_updates', '__return_false' );
add_filter( 'allow_minor_auto_core_updates', '__return_true' );

/* 
 * Enable plugin and theme updates 
 */
add_filter( 'auto_update_plugin', '__return_true' );
add_filter( 'auto_update_theme', '__return_true' );

/* 
 * Translations should be enabled by default but make sure
 */
add_filter( 'auto_update_translation', '__return_true' );

/* 
 * Make sure all email notifications are turned on 
 * We may want to set the debug filter to false if the notifications get annoying 
 */
add_filter( 'auto_core_update_send_email', '__return_true' );
add_filter( 'automatic_updates_send_debug_email', '__return_true' );

/*
 * Clear WP Fastest Cache after any updates
 */
function action_upgrader_process_complete() { 
	if(isset($GLOBALS['wp_fastest_cache']) && method_exists($GLOBALS['wp_fastest_cache'], 'deleteCache')){
		$GLOBALS['wp_fastest_cache']->deleteCache(true);
	}
}; 
add_action( 'upgrader_process_complete', 'action_upgrader_process_complete', 10, 2 );

<?php
/*
Plugin Name: Enable Auto Updates
Plugin URI: http://www.pulsion.co.uk/
Description: Enable auto updates for all plugins and themes
Version: 0.1
Author: Stewart Campbell
Author URI: http://www.pulsion.co.uk/
License: GPL
Copyright: Pulsion Technology Ltd
*/

add_filter( 'auto_update_plugin', '__return_true' );
add_filter( 'auto_update_theme', '__return_true' );

?>
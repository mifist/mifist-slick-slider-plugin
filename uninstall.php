<?php
// Если к файлу обращаются напрямую, закроем доступ
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ){
	exit();
}
	

$option_name = 'plugin_option_name';

// Для обычного сайта.
if ( !is_multisite() ) {
	delete_option( $option_name );
}
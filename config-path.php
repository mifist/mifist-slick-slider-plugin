<?php //Определение путей
// определение глобальных констант
// определяем путь к папке плагина внутри директории WordPress
define("MIFISTSLICK_PlUGIN_DIR", plugin_dir_path(__FILE__));
define("MIFISTSLICK_PlUGIN_URL", plugin_dir_url( __FILE__ ));
define("MIFISTSLICK_PlUGIN_SLUG", preg_replace( '/[^\da-zA-Z]/i', '_',  basename(MIFISTSLICK_PlUGIN_DIR)));
define("MIFISTSLICK_PlUGIN_TEXTDOMAIN", str_replace( '_', '-', MIFISTSLICK_PlUGIN_SLUG ));
define("MIFISTSLICK_PlUGIN_OPTION_VERSION", MIFISTSLICK_PlUGIN_SLUG.'_version');
define("MIFISTSLICK_PlUGIN_OPTION_NAME", MIFISTSLICK_PlUGIN_SLUG.'_options');
define("MIFISTSLICK_PlUGIN_AJAX_URL", admin_url('admin-ajax.php'));

// Проверим зарегистрирована ли функция get_plugins(). Это нужно для фронт-энда
// обычно get_plugins() работает только в админ-панели.
if ( ! function_exists( 'get_plugins' ) ) {
	// подключим файл с функцией get_plugins()
	require_once ABSPATH . 'wp-admin/includes/plugin.php';
}

// получаем данные плагина
$plugin_data = get_plugin_data(MIFISTSLICK_PlUGIN_DIR.'/'.basename(MIFISTSLICK_PlUGIN_DIR).'.php', false, false);

define("MIFISTSLICK_PlUGIN_VERSION", $plugin_data['Version']);
define("MIFISTSLICK_PlUGIN_NAME", $plugin_data['Name']);
// путь к файлам переводам
define("MIFISTSLICK_PlUGIN_DIR_LOCALIZATION", plugin_basename(MIFISTSLICK_PlUGIN_DIR.'/lang/'));
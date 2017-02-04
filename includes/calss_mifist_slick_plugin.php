<?php //Регистрируем функцию, которая будет срабатывать во время деактивации и активации плагина в классе плагина mifist_slick_plugin


namespace includes;

class MifistSlickPlugin
{
    private static $instance = null;
    private function __construct() {
    	if (!is_admin()) {
           new MifistShortcode();
        }
    }
    public static function get_instance() {

        if ( null == self::$instance ) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    static public function activation()
    {
        // debug.log
        error_log('plugin '.MIFISTSLICK_PlUGIN_NAME.' activation');
	    
	    
    }

    static public function deactivation()
    {
        // debug.log
        error_log('plugin '.MIFISTSLICK_PlUGIN_NAME.' deactivation');
    }

}

MifistSlickPlugin::get_instance();
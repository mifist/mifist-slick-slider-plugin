<?php // Главный файл плагина
//Регистрируем функцию, которая будет срабатывать во время деактивации и активации плагина в классе плагина mifist_slick_plugin


namespace includes;
use includes\common\MifistLoader;
use includes\common\GetInstance;


class MifistSlickPlugin {
	use GetInstance;
    private function __construct() {
    	
        MifistLoader::getInstance();
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

MifistSlickPlugin::getInstance();
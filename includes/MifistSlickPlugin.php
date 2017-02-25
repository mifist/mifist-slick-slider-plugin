<?php // Главный файл плагина
//Регистрируем функцию, которая будет срабатывать во время деактивации и активации плагина в классе плагина mifist_slick_plugin


namespace includes;
use includes\common\MifistDefaultOption;
use includes\common\MifistLoader;
use includes\common\GetInstance;
use includes\models\admin\menu\MifistGuestBookSubMenuModel;

class MifistSlickPlugin {
	use GetInstance;
    private function __construct() {
        MifistLoader::getInstance();
	    add_action('plugins_loaded', array(&$this, 'setDefaultOptions'));
    }
	
	/**
	 * Если не созданные настройки установить по умолчанию
	 */
	public function setDefaultOptions(){
		if( ! get_option(MIFISTSLICK_PlUGIN_OPTION_NAME) ){
			update_option( MIFISTSLICK_PlUGIN_OPTION_NAME, MifistDefaultOption::getDefaultOptions() );
		}
		if( ! get_option(MIFISTSLICK_PlUGIN_OPTION_VERSION) ){
			update_option(MIFISTSLICK_PlUGIN_OPTION_VERSION, MIFISTSLICK_PlUGIN_VERSION);
		}
	}
	
    static public function activation()
    {
	    // debug.log
	    error_log('plugin '.STEPBYSTEP_PlUGIN_NAME.' activation');
	    //Создание таблицы Гостевой книги
	    MifistGuestBookSubMenuModel::createTable();
	    
	    
    }

    static public function deactivation()
    {
        // debug.log
        error_log('plugin '.MIFISTSLICK_PlUGIN_NAME.' deactivation');
	    delete_option(MIFISTSLICK_PlUGIN_OPTION_NAME);
	    delete_option(MIFISTSLICK_PlUGIN_OPTION_VERSION);
    }

}

MifistSlickPlugin::getInstance();
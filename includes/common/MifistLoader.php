<?php // Файл сборки плагина
namespace includes\common;

// Пути namespace к классам

use includes\shortcodes\MifistShortcode;
// menu

use includes\controllers\admin\menu\MifistMainAdminMenuController;
use includes\controllers\admin\menu\MifistMainAdminSubMenuController;
// custom admin menu
use includes\controllers\admin\menu\MifistMyCommentsMenuController;
use includes\controllers\admin\menu\MifistMyDashboardMenuController;
use includes\controllers\admin\menu\MifistMyMediaMenuController;
use includes\controllers\admin\menu\MifistMyOptionsMenuController;
use includes\controllers\admin\menu\MifistMyPagesMenuController;
use includes\controllers\admin\menu\MifistMyPluginsMenuController;
use includes\controllers\admin\menu\MifistMyPostsMenuController;
use includes\controllers\admin\menu\MifistMyThemeMenuController;
use includes\controllers\admin\menu\MifistMyToolsMenuController;
use includes\controllers\admin\menu\MifistMyUsersMenuController;
// example
use includes\example\MifistExampleAction;
use includes\example\MifistExampleFilter;

class MifistLoader {
	use GetInstance;
	
	// инициализируем новый класс как объект
    private function __construct(){
        // is_admin() Условный тег. Срабатывает когда показывается админ панель сайта (консоль или любая
        // другая страница админки).
        // Проверяем в админке мы или нет
        if ( is_admin() ) {
            $this->admin(); // Когда в админке вызываем метод admin()
        } else {
            $this->site(); // Когда на сайте вызываем метод site()
        }
        $this->all();
    }
	
    /**
     * Метод будет срабатывать когда вы находитесь в Админ панеле. Загрузка классов для Админ панели
     */
    public function admin(){
    	// MENU
	    MifistMainAdminMenuController::newInstance();
	    MifistMainAdminSubMenuController::newInstance();
	    // custom admin menu
	    MifistMyCommentsMenuController::newInstance();
	    MifistMyDashboardMenuController::newInstance();
	    MifistMyMediaMenuController::newInstance();
	    MifistMyOptionsMenuController::newInstance();
	    MifistMyPagesMenuController::newInstance();
	    MifistMyPluginsMenuController::newInstance();
	    MifistMyPostsMenuController::newInstance();
	    MifistMyThemeMenuController::newInstance();
	    MifistMyToolsMenuController::newInstance();
	    MifistMyUsersMenuController::newInstance();
    }

    /**
     * Метод будет срабатывать когда вы находитесь Сайте. Загрузка классов для Сайта
     */
    public function site(){
      
    }

    /**
     * Метод будет срабатывать везде. Загрузка классов для Админ панеле и Сайта
     */
    public function all(){
	    MifistShortcode::getInstance();
	    MifistLocalization::getInstance();
	    MifistLoaderScript::getInstance();
//	    MifistExampleAction::newInstance();
//	    $mifistExampleFilter = MifistExampleFilter::newInstance();
//		$mifistExampleFilter->callMyFilter("Roman");
//		$mifistExampleFilter->callMyFilterAdditionalParameter("Roman", "Softgroup", "Poltava");
//		$mifistExampleAction = MifistExampleAction::newInstance();
//		$mifistExampleAction->callMyAction();
//		$mifistExampleAction->callMyActionAdditionalParameter( 'test1', 'test2', 'test3' );
    }
}
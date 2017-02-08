<?php // Файл сборки плагина
namespace includes\common;

// Пути namespace к классам
use includes\shortcodes\MifistShortcode;
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
       

    }

    /**
     * Метод будет срабатывать когда вы находитесь Сайте. Загрузка классов для Сайта
     */
    public function site(){
       MifistShortcode::getInstance();
    }

    /**
     * Метод будет срабатывать везде. Загрузка классов для Админ панеле и Сайта
     */
    public function all(){
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
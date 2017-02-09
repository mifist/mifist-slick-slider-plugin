<?php
namespace includes\controllers\admin\menu;

class MifistMainAdminMenuController extends MifistBaseAdminMenuController {

    public function action()
    {
        // TODO: Implement action() method.
        /**
         * add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
         *
         */
        $pluginPage = add_menu_page(
            _x(
                'Step By Step',
                'admin menu page' ,
                MIFISTSLICK_PlUGIN_TEXTDOMAIN
            ),
            _x(
                'Step By Step',
                'admin menu page' ,
                MIFISTSLICK_PlUGIN_TEXTDOMAIN
            ),
            'manage_options',
            MIFISTSLICK_PlUGIN_TEXTDOMAIN,
            array(&$this,'render'),
            MIFISTSLICK_PlUGIN_URL .'assets/images/main-menu.png'
        );
    }

    /**
     * Метод отвечающий за контент страницы
     */
    public function render()
    {
        // TODO: Implement render() method.
        _e("Hello world", MIFISTSLICK_PlUGIN_TEXTDOMAIN);
    }
	
    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}
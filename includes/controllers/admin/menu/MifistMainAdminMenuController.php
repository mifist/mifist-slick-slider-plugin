<?php
namespace includes\controllers\admin\menu;
use includes\common\NewInstance;

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
                'Mifist Slick Slider',
                'admin menu page' ,
                MIFISTSLICK_PlUGIN_TEXTDOMAIN
            ),
            _x(
                'Mifist Slick Slider',
                'admin menu page' ,
                MIFISTSLICK_PlUGIN_TEXTDOMAIN
            ),
            'manage_options',
	        // MIFISTSLICK_PlUGIN_TEXTDOMAIN,
	        MIFISTSLICK_PlUGIN_TEXTDOMAIN . '/includes/controllers/admin/page/main-admin-menu.php',
	        '', // array(&$this,'render'),
            MIFISTSLICK_PlUGIN_URL .'assets/admin/images/picture.svg',
	        9 // $position перед Медиа
        );
    }

    /**
     * Метод отвечающий за контент страницы
     */
    public function render() {
    	// TODO: Implement render() method.
	}
	
   use NewInstance;
}
<?php
namespace includes\controllers\admin\menu;
use includes\common\NewInstance;

class MifistMainAdminSubMenuController extends MifistBaseAdminMenuController
{

    public function action()
    {
        // TODO: Implement action() method.
        $pluginPage = add_submenu_page(
	        MIFISTSLICK_PlUGIN_TEXTDOMAIN . '/includes/controllers/admin/page/main-admin-menu.php',
            _x(
                'Mifist Sub Page',
                'admin menu page' ,
                MIFISTSLICK_PlUGIN_TEXTDOMAIN
            ),
            _x(
                'Mifist Sub Page',
                'admin menu page' ,
                MIFISTSLICK_PlUGIN_TEXTDOMAIN
            ),
            'manage_options',
            'mifist_control_sub_menu',
            array(&$this, 'render'));
    }

    public function render()
    {
        // TODO: Implement render() method.
        _e("Hello world sub menu", MIFISTSLICK_PlUGIN_TEXTDOMAIN);
    }
	
    use NewInstance;
}
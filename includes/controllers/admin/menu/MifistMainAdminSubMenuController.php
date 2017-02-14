<?php
namespace includes\controllers\admin\menu;
use includes\common\NewInstance;

class MifistMainAdminSubMenuController extends MifistBaseAdminMenuController
{

    public function action()
    {
        // TODO: Implement action() method.
        $pluginPage = add_submenu_page(
	        MIFISTSLICK_PlUGIN_TEXTDOMAIN,
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
	    echo '<br /><h1 class="mif-admin-title">' . get_admin_page_title() . '</h1>';
	    echo '<br />
			<span class="admin-page--hello">'.
		    _x("Hello world :) This sub menu", MIFISTSLICK_PlUGIN_TEXTDOMAIN)
		    .'</span>';
	    echo '<br />
			<span class="admin-page--welcome">'.
		    _x("Welcome!", MIFISTSLICK_PlUGIN_TEXTDOMAIN)
		    .'</span>';
    }
	
    use NewInstance;
}
<?php
namespace includes\controllers\admin\menu;
use includes\common\NewInstance;

class MifistMyDashboardMenuController extends MifistBaseAdminMenuController
{
    public function action()
    {
        // TODO: Implement action() method.

        $pluginPage = add_dashboard_page(
            __('Sub dashboard Mifist', MIFISTSLICK_PlUGIN_TEXTDOMAIN),
            __('Sub dashboard Mifist', MIFISTSLICK_PlUGIN_TEXTDOMAIN),
            'read',
            'mifist_control_sub_dashboard_menu',
            array(&$this, 'render')
        );
    }

    public function render()
    {
        // TODO: Implement render() method.
	    echo '<br /><h1 class="mif-admin-title">' . get_admin_page_title() . '</h1>';
	    echo '<br />
			<span class="admin-page--hello">'.
		    _x("Hello world :) This page dashboards", MIFISTSLICK_PlUGIN_TEXTDOMAIN)
		    .'</span>';
	    echo '<br />
			<span class="admin-page--welcome">'.
		    _x("Welcome!", MIFISTSLICK_PlUGIN_TEXTDOMAIN)
		    .'</span>';
    }
	
	use NewInstance;
}
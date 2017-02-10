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
        _e("Hello this page dashboards", MIFISTSLICK_PlUGIN_TEXTDOMAIN);
    }
	
	use NewInstance;
}
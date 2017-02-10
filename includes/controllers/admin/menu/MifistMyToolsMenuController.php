<?php

namespace includes\controllers\admin\menu;
use includes\common\NewInstance;

class MifistMyToolsMenuController extends MifistBaseAdminMenuController
{
    public function action()
    {
        // TODO: Implement action() method.

        $pluginPage = add_management_page(
            __('Sub tools Mifist', MIFISTSLICK_PlUGIN_TEXTDOMAIN),
            __('Sub tools Mifist', MIFISTSLICK_PlUGIN_TEXTDOMAIN),
            'read',
            'step_by_step_control_sub_tools_menu',
            array(&$this, 'render')
        );
    }

    public function render()
    {
        // TODO: Implement render() method.
        _e("Hello this page Tools", MIFISTSLICK_PlUGIN_TEXTDOMAIN);
    }

    use NewInstance;
}
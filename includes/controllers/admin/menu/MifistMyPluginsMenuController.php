<?php

namespace includes\controllers\admin\menu;
use includes\common\NewInstance;

class MifistMyPluginsMenuController extends MifistBaseAdminMenuController
{
    public function action()
    {
        // TODO: Implement action() method.

        $pluginPage = add_plugins_page(
            __('Sub plugins Mifist', MIFISTSLICK_PlUGIN_TEXTDOMAIN),
            __('Sub plugins Mifist', MIFISTSLICK_PlUGIN_TEXTDOMAIN),
            'read',
            'step_by_step_control_sub_plugins_menu',
            array(&$this, 'render')
        );
    }

    public function render()
    {
        // TODO: Implement render() method.
        _e("Hello this page Plugins", MIFISTSLICK_PlUGIN_TEXTDOMAIN);
    }

    use NewInstance;
}
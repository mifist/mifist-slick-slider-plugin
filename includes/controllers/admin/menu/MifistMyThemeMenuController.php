<?php

namespace includes\controllers\admin\menu;
use includes\common\NewInstance;

class MifistMyThemeMenuController extends MifistBaseAdminMenuController
{
    public function action()
    {
        // TODO: Implement action() method.

        $pluginPage = add_theme_page(
            __('Sub theme Mifist', MIFISTSLICK_PlUGIN_TEXTDOMAIN),
            __('Sub theme Mifist', MIFISTSLICK_PlUGIN_TEXTDOMAIN),
            'read',
            'step_by_step_control_sub_theme_menu',
            array(&$this, 'render')
        );
    }

    public function render()
    {
        // TODO: Implement render() method.
        _e("Hello this page Theme", MIFISTSLICK_PlUGIN_TEXTDOMAIN);
    }

    use NewInstance;
}
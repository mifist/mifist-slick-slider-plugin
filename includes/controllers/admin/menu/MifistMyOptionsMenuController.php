<?php

namespace includes\controllers\admin\menu;
use includes\common\NewInstance;

class  MifistMyOptionsMenuController extends  MifistBaseAdminMenuController
{
    public function action()
    {
        // TODO: Implement action() method.

        $pluginPage = add_options_page(
            __('Sub options Mifist', MIFISTSLICK_PlUGIN_TEXTDOMAIN),
            __('Sub options Mifist', MIFISTSLICK_PlUGIN_TEXTDOMAIN),
            'read',
            'step_by_step_control_sub_options_menu',
            array(&$this, 'render')
        );
    }

    public function render()
    {
        // TODO: Implement render() method.
        _e("Hello this page Settings", MIFISTSLICK_PlUGIN_TEXTDOMAIN);
    }

    use NewInstance;
}
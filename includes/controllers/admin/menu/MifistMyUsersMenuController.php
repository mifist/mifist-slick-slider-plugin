<?php

namespace includes\controllers\admin\menu;
use includes\common\NewInstance;

class MifistMyUsersMenuController extends MifistBaseAdminMenuController
{
    public function action()
    {
        // TODO: Implement action() method.

        $pluginPage = add_users_page(
            __('Sub users Mifist', MIFISTSLICK_PlUGIN_TEXTDOMAIN),
            __('Sub users Mifist', MIFISTSLICK_PlUGIN_TEXTDOMAIN),
            'read',
            'step_by_step_control_sub_users_menu',
            array(&$this, 'render')
        );
    }

    public function render()
    {
        // TODO: Implement render() method.
        _e("Hello this page Users", MIFISTSLICK_PlUGIN_TEXTDOMAIN);
    }

    use NewInstance;
}
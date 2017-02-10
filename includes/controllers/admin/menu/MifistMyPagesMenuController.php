<?php

namespace includes\controllers\admin\menu;
use includes\common\NewInstance;

class MifistMyPagesMenuController extends MifistBaseAdminMenuController
{
    public function action()
    {
        // TODO: Implement action() method.

        $pluginPage = add_pages_page(
            __('Sub pages Mifist', MIFISTSLICK_PlUGIN_TEXTDOMAIN),
            __('Sub pages Mifist', MIFISTSLICK_PlUGIN_TEXTDOMAIN),
            'read',
            'step_by_step_control_sub_pages_menu',
            array(&$this, 'render')
        );
    }

    public function render()
    {
        // TODO: Implement render() method.
        _e("Hello this page Pages", MIFISTSLICK_PlUGIN_TEXTDOMAIN);
    }

    use NewInstance;
}
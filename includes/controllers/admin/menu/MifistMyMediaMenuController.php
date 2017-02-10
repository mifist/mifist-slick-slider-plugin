<?php
namespace includes\controllers\admin\menu;
use includes\common\NewInstance;

class MifistMyMediaMenuController extends MifistBaseAdminMenuController
{
    public function action()
    {
        // TODO: Implement action() method.

        $pluginPage = add_media_page(
            __('Sub media Mifist', MIFISTSLICK_PlUGIN_TEXTDOMAIN),
            __('Sub media Mifist', MIFISTSLICK_PlUGIN_TEXTDOMAIN),
            'read',
            'step_by_step_control_sub_media_menu',
            array(&$this, 'render')
        );
    }

    public function render()
    {
        // TODO: Implement render() method.
        _e("Hello this page media", MIFISTSLICK_PlUGIN_TEXTDOMAIN);
    }

   use NewInstance;
}
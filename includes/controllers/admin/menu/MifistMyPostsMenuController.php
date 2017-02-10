<?php

namespace includes\controllers\admin\menu;
use includes\common\NewInstance;

class MifistMyPostsMenuController extends MifistBaseAdminMenuController
{
    public function action()
    {
        // TODO: Implement action() method.

        $pluginPage = add_posts_page(
            __('Sub posts Mifist', MIFISTSLICK_PlUGIN_TEXTDOMAIN),
            __('Sub posts Mifist', MIFISTSLICK_PlUGIN_TEXTDOMAIN),
            'read',
            'step_by_step_control_sub_posts_menu',
            array(&$this, 'render')
        );
    }

    public function render()
    {
        // TODO: Implement render() method.
        _e("Hello this page posts", MIFISTSLICK_PlUGIN_TEXTDOMAIN);
    }

    use NewInstance;
}
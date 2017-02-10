<?php
namespace includes\controllers\admin\menu;


class MifistMyCommentsMenuController extends MifistBaseAdminMenuController
{
    public function action()
    {
        // TODO: Implement action() method.

        $pluginPage = add_comments_page(
            __('Sub comments Mifist', MIFISTSLICK_PlUGIN_TEXTDOMAIN),
            __('Sub comments Mifist', MIFISTSLICK_PlUGIN_TEXTDOMAIN),
            'read',
            'mifisi_control_sub_comments_menu',
            array(&$this, 'render')
        );
    }

    public function render()
    {
        // TODO: Implement render() method.
        _e("Hello this page Comments", MIFISTSLICK_PlUGIN_TEXTDOMAIN);
    }

    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}
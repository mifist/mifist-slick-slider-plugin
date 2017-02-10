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
	    echo '<br /><h1 class="mif-admin-title">' . get_admin_page_title() . '</h1>';
	    echo '<br />
			<span class="admin-page--hello">'.
		    _x("Hello world :) This page Comments", MIFISTSLICK_PlUGIN_TEXTDOMAIN)
		    .'</span>';
	    echo '<br />
			<span class="admin-page--welcome">'.
		    _x("Welcome!", MIFISTSLICK_PlUGIN_TEXTDOMAIN)
		    .'</span>';
    }

    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}
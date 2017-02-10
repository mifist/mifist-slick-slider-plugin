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

    public function render() {
        // TODO: Implement render() method.
	    echo '<br /><h1 class="mif-admin-title">' . get_admin_page_title() . '</h1>';
	    echo '<br />
			<span class="admin-page--hello">'.
                 _x("Hello :) This page media", MIFISTSLICK_PlUGIN_TEXTDOMAIN)
            .'</span>';
	    echo '<br />
			<span class="admin-page--welcome">'.
                _x("Welcome!", MIFISTSLICK_PlUGIN_TEXTDOMAIN)
	        .'</span>';
    }

   use NewInstance;
}
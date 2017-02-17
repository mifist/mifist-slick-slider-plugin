<?php
namespace includes\controllers\admin\menu;
use includes\common\NewInstance;
use includes\models\admin\menu\MifistMainAdminOptionsMenuModel;

class MifistMainAdminOptionsMenuController extends MifistBaseAdminMenuController {
	use NewInstance;
	public $model;
	public function __construct(){
		parent::__construct();
		$this->model = MifistMainAdminOptionsMenuModel::newInstance();
	}

    public function action()
    {
        // TODO: Implement action() method.
        $pluginPage = add_submenu_page(
	        MIFISTSLICK_PlUGIN_TEXTDOMAIN,
            _x(
                'Slick Options',
                'admin menu page' ,
                MIFISTSLICK_PlUGIN_TEXTDOMAIN
            ),
            _x(
                'Slick Options',
                'admin menu page' ,
                MIFISTSLICK_PlUGIN_TEXTDOMAIN
            ),
            'manage_options',
            'mifist_control_options_menu',
            array(&$this, 'render'));
    }

    public function render() {
        // TODO: Implement render() method.
	    $pathView = MIFISTSLICK_PlUGIN_DIR . '/includes/views/admin/menu/MifistMainAdminOptionsMenu.view.php';
	    $this->loadView($pathView);
    }
	
   
}
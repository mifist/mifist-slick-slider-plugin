<?php
/**
 * Created by PhpStorm.
 * User: avant
 * Date: 08.02.17
 * Time: 15:06
 */

namespace includes\common;

class MifistLoaderScript {
	use GetInstance;

	private function __construct(){
		// Проверяем в админке мы или нет
		if ( is_admin() ) {
			add_action('admin_enqueue_scripts', array(&$this, 'loadScriptAdmin' ) );
			add_action('admin_head', array(&$this, 'loadHeadScriptAdmin'));
		} else {
			add_action( 'wp_enqueue_scripts', array(&$this, 'loadScriptSite' ) );
			add_action('wp_head', array(&$this, 'loadHeadScriptSite'));
			add_action( 'wp_footer', array(&$this, 'loadFooterScriptSite'));
		}
		
	}
	
	public function loadScriptAdmin($hook){
	// SCRIPT
		wp_register_script(
			MIFISTSLICK_PlUGIN_SLUG.'-admin-js', //$handle
			MIFISTSLICK_PlUGIN_URL.'assets/admin/js/mssp-admin-main.js', //$src
			array(
				'jquery'
			), //$deps
			MIFISTSLICK_PlUGIN_VERSION, //$ver
			true //$$in_footer
		);
		/**
		 * Добавляет скрипт, только если он еще не был добавлен и другие скрипты от которых он зависит зарегистрированы.
		 * Зависимые скрипты добавляются автоматически.
		 */
		//wp_enqueue_script(MIFISTSLICK_PlUGIN_SLUG.'-admin-js');
		// STYLE
		wp_register_style(
			MIFISTSLICK_PlUGIN_SLUG.'-admin', //$handle
			MIFISTSLICK_PlUGIN_URL.'assets/admin/css/mssp-admin-main.css', // $src
			array(), //$deps,
			MIFISTSLICK_PlUGIN_VERSION // $ver
		//'all' // $media (all|screen|handheld|print)
		);
		wp_enqueue_style(MIFISTSLICK_PlUGIN_SLUG.'-admin');
	}
	
	
	public function loadHeadScriptAdmin(){
		?>
		<script type="text/javascript">
			var mifistSlickAjaxUrl;
			mifistSlickAjaxUrl  = '<?php echo MIFISTSLICK_PlUGIN_AJAX_URL; ?>';
		</script>
		<?php
	
	}
	public function loadScriptSite($hook){
	// SCRIPT
		wp_register_script(
			MIFISTSLICK_PlUGIN_SLUG.'-core-js', //$handle
			MIFISTSLICK_PlUGIN_URL.'assets/core/js/mssp-core.js', //$src
			array(
				'jquery'
			), //$deps
			MIFISTSLICK_PlUGIN_VERSION, //$ver
			true //$$in_footer
		);
		//wp_enqueue_script(MIFISTSLICK_PlUGIN_SLUG.'-core-js');
		wp_register_script(
			MIFISTSLICK_PlUGIN_SLUG.'-slick-js', //$handle
			MIFISTSLICK_PlUGIN_URL.'assets/core/js/slick.min.js', //$src
			array(
				'jquery'
			), //$deps
			MIFISTSLICK_PlUGIN_VERSION, //$ver
			true //$$in_footer
		);
		wp_enqueue_script(MIFISTSLICK_PlUGIN_SLUG.'-slick-js');
		
	}
	public function loadHeadScriptSite(){

		
	}
	public function loadFooterScriptSite(){

		// STYLE
		wp_register_style(
			MIFISTSLICK_PlUGIN_SLUG.'-core', // handle
			MIFISTSLICK_PlUGIN_URL.'assets/core/css/mssp-style.css', // $src
			array(), // $deps,
			MIFISTSLICK_PlUGIN_VERSION // $ver
		//'all' // $media (all|screen|handheld|print)
		);
		wp_enqueue_style(MIFISTSLICK_PlUGIN_SLUG.'-core');
	}

}
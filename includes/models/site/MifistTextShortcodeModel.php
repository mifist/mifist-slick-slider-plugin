<?php
namespace includes\models\site;


use includes\common\MifistRequestApi;
use includes\common\NewInstance;
use includes\controllers\admin\menu\MifistICreatorInstance;

class MifistTextShortcodeModel implements MifistICreatorInstance {
	use NewInstance;
	public function __construct() {
		
	}
	
	/**
	 * Получения данных от кэша если данных нет в кэше запросить от сервера и записать в кэш
	 * @param $currency
	 * @param $origin
	 * @param $destination
	 * @param string $month
	 * @return array|bool
	 */
	public function getData(){
		$cacheKey = "";
		$data = array();
		$cacheKey = $this->getCacheKey();
		if ( false === ($data = get_transient($cacheKey))) {
			$reuestAPI = MifistRequestApi::getInstance();
			$data = $reuestAPI;
			set_transient($cacheKey, $data, 100);
		}
		
		return $data;
	}
	
	/**
	 * Создает ключ для кэша
	 */
	public function getCacheKey(){
		$code = "gitapi";
		return MIFISTSLICK_PlUGIN_TEXTDOMAIN
			."_slick_slide_readme_{$code}";
	}
	
}
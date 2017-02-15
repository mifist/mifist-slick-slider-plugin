<?php
namespace includes\models\site;


use includes\common\MifistRequestApi;
use includes\controllers\admin\menu\MifistICreatorInstance;

class MifistTextShortcodeModel implements MifistICreatorInstance
{

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
    public function getData($contents){
        $cacheKey = "";
        $data = array();
        $cacheKey = $this->getCacheKey($contents);
        if ( false === ($data = get_transient($cacheKey))) {
            $reuestAPI = MifistRequestApi::getInstance();
            $data = $reuestAPI->getSlickDoc($contents);
            set_transient($cacheKey, $data, 100);
        }

        return $data;
    }

    /**
     * Создает ключ для кэша
     */
    public function getCacheKey($contents){
        return MIFISTSLICK_PlUGIN_TEXTDOMAIN
            ."_slick_content_{$contents}";
    }
	
	public static function newInstance()
	{
		// TODO: Implement newInstance() method.
		$instance = new self;
		return $instance;
	}
}
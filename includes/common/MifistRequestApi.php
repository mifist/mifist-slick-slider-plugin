<?php
namespace includes\common;


class MifistRequestApi {
    const MIFISTSLICK_API_INDEX_HTML = 'https://api.github.com/repos/kenwheeler/slick/contents/index.html';
    const MIFISTSLICK_TOKEN = '2a559eed26006545b4cde58d9c0500e9df4fd74c';
  //  const MIFISTSLICK_SHA = '761bebfd2731ade11ede557b5b37b2f959b61ac9';
   // const MIFISTSLICK_MARKER = '17942';
	private static $instance = null;
	
	private function __construct(){
		
	}
	public static function getInstance(){
		if ( null == self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}
	

    public function getToken(){
        return "&token=".self::MIFISTSLICK_TOKEN;
    }


    /**
     * Вывод
     * Запрос
     * https://api.github.com/repos/kenwheeler/slick
     * Параметры запроса
     * currency — валюта цен на билеты. Значение по умолчанию — rub.
     * origin — пункт отправления. IATA код города или код страны. Длина не менее 2 и не более 3 символов.
     * destination — пункт назначения. IATA код города или код страны. Длина не менее 2 и не более 3.
     *               Обратите внимание! Если не указывать пункт отправления и назначения, то API вернет
     *               список самых дешевых билетов, которые были найдены за последние 48 часов.
     * show_to_affiliates — false — все цены, true — только цены, найденные с партнёрским маркером (рекомендовано).
     *                      Значение по умолчанию — true.
     * month — первый день месяца, в формате «YYYY-MM-DD».
     */
    public function getSlickDoc($contents /*$currency, $origin, $destination, $month = ""*/){
        $requestURL = "";
//        if ($currency == false || empty($currency)){
//            $currency = "currency=RUB";
//        } else {
//            $currency = "currency={$currency}";
//        }
//        if ($origin == false || empty($origin)){
//            return false;
//        } else {
//            $origin = "&origin={$origin}";
//        }
//        if ($destination == false || empty($destination)){
//            return false;
//        } else {
//            $destination = "&destination={$destination}";
//        }
//        if ($month == false || empty($month)){
//            $month = "&month=".date('Y-m-d');
//        } else {
//            $month = "&month={$month}";
//        }
	    if ($contents == false || empty($contents)){
		    return false;
        } else {
            $contents = "{$contents}";
		    return $contents;
        }
	   
    }

    public function requestAPI($requestURL){
	    $requestURL = 'https://api.github.com/repos/kenwheeler/slick/contents/index.html'
	      .$this->getToken();
        $response = wp_remote_get( $requestURL, array(
            'Accept-Encoding' => 'gzip, deflate',
	        'compress'  => true,
	        'decompress'  => true
        ) );
       // $body = wp_remote_retrieve_body($response);
        $json = json_decode($response);
        if (!is_wp_error($json) && $json->success == true) {
            return $json->data;
        } else {
            return false;
        }

    }




}
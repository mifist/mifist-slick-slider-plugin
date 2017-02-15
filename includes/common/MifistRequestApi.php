<?php
namespace includes\common;


class MifistRequestApi
{
	const MIFISTSLICK_API_README = "https://api.github.com/repos/kenwheeler/slick/git/blobs/761bebfd2731ade11ede557b5b37b2f959b61ac9";
	const MIFISTSLICK_TOKEN = "2a559eed26006545b4cde58d9c0500e9df4fd74c";
	//const MIFISTSLICK_MARKER = "17942";
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
	 * Календарь цен на месяц
	 * Запрос
	 * http://api.travelpayouts.com/v2/prices/month-matrix
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
	public function getReadMeSlick($code){
		$requestURL = '';
		if ($code == false || empty($code)){
			return false;
		} else {
			$code = "content={$code}";
		}
		$requestURL = self::MIFISTSLICK_API_README.'?{$code}'
			.$this->getToken();
		
		return $this->requestAPI($requestURL);
	}
	
	public function requestAPI($requestURL){
		$response = wp_remote_get( $requestURL, array(
			'headers' => array(
				'Accept-Encoding' => 'gzip, deflate'
			)
		));
		$body = wp_remote_retrieve_body($response);
		$json = json_decode($body);
		if (!is_wp_error($json) && $json->success == true) {
			return $json->data;
		} else {
			return false;
		}
		
	}
	
	
	
	
}
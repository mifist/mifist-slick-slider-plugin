<?php
namespace includes\common;


class MifistRequestApi {
	private static $instance = null;
	private function __construct(){
		
	}
	public static function getInstance(){
		if ( null == self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}
	
	
	public function requestAPI(){
		$response = wp_remote_get( 'https://api.github.com/repos/kenwheeler/slick/contents/README.markdown',
			array('headers' => array(
			//'Accept-Encoding' => 'gzip, deflate'
			//'Content-type' => 'application/json'
		)) );
		$body = wp_remote_retrieve_body($response);
		$json = json_decode($body);
		if (!is_wp_error($json) && $json->success == true) {
			return $json->data;
		} else {
			return false;
		}
		
	}
	
	
	
}
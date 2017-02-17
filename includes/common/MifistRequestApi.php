<?php
namespace includes\common;


class MifistRequestApi {
	const MIFISTSLICK_GIT_CONTENT = 'https://api.github.com/repos/kenwheeler/slick/contents/README.markdown';

	private static $instance = null;
	private function __construct(){
		
	}
	public static function getInstance(){
		if ( null == self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}
	
	public function getGitContent(){
		
		$response = wp_remote_get(self::MIFISTSLICK_GIT_CONTENT, array(
				'headers' => array(
					'Content-type' => 'application/json'
				)
			)
		);
		
		$body = wp_remote_retrieve_body($response);
		$json = json_decode($body);
		return $json->content;
	}
	
	
	
}
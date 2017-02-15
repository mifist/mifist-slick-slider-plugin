<?php
namespace includes\controllers\site\shortcodes;
use includes\common\GetInstance;

// создание шоткода
class MifistShortcode {
	use GetInstance;
	static $loaded;
	public function __construct() {
		add_shortcode( 'mifshortcode', array( $this, 'shortcode_code' ) );
		add_shortcode( 'mifdescription', array( $this, 'description_code' ) );
		
	}

	// проверка и вывод скрипта для шорткода
	function enqueueScriptsStyle() {
		$pluginPrefix = "mifist-";
		wp_enqueue_style( "{$pluginPrefix}-css", MIFISTSLICK_PlUGIN_URL . 'assets/core/css/mssp-style.css' );
		wp_enqueue_script( "{$pluginPrefix}-js", MIFISTSLICK_PlUGIN_URL . 'assets/core/js/slick.min.js', array('jquery'),
			null, true);
	}
	//вывод кода на страницу
	static public function shortcode_code ($atts, $content = "") {
		// инициализация глобальных переменных для mif_slide, при необходимости
		$GLOBALS['shortcode-count'] = 0;
		$GLOBALS['mif_sh-lines'] = array();
		// чтение контента и выполнение внутренних шорткодов
		do_shortcode($content);
		// подготовка HTML кода
		$output = '<div class="mifist_shortcode">';
		if(is_array($GLOBALS['mif_sh-lines'])) {
			foreach ($GLOBALS['mif_sh-lines'] as $line) {
				$lineContent  = '<div class="shortcode-line">';
				$lineContent .=     $line;
				$lineContent .= '</div>';
				$output .= $lineContent;
			}
		}
		$output .= '</div>';
		// вывод HTML кода
		return $output;
	}
	//получение данных
	static public function description_code ($atts, $content = "") {
		// получаем параметры шорткода
		extract(shortcode_atts(array(
			'title'     => '',          // shortcode title name
			'description'      => '',         // shortcode escription
		), $atts));
		$title = esc_html($atts['title']);
		$description = esc_html($atts['description']);
		// Подоготавливаем HTML: заголовок шорткода
		$sh_title = '<p class="shortcode-title">' . $title  . '</p>';
		
		// Подоготавливаем HTML: описание шорткода
		$sh_description = '<p class="shortcode-description">' . $description . '</p>';
		$sh_content = '<p class="shortcode-content">' . $content . '</p>';
		
		// Подоготавливаем HTML: компонуем контент
		$sh_div  = $sh_title;
		$sh_div .= $sh_description;
		$sh_div .= $sh_content;
		
		// сохраняем полученные данные
		$i = $GLOBALS['shortcode-count'] + 1;
		$GLOBALS['mif_sh-lines'][$i] = $sh_div;
		$GLOBALS['shortcode-count'] = $i;
		// ничего не выводим
		return true;
	}
	public function requestAPI(){
		$response = wp_remote_get( "https://api.github.com/repos/kenwheeler/slick/git/blobs/761bebfd2731ade11ede557b5b37b2f959b61ac9", array('headers' => array(
			'Accept-Encoding' => 'gzip, deflate',
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




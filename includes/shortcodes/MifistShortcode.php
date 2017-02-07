<?php
namespace includes\shortcodes;

// создание шоткода
class MifistShortcode {
	private static $instance = null;
	static $loaded;
	public function __construct() {
		add_shortcode( 'mifshortcode', array( $this, 'shortcode_code' ) );
		add_shortcode( 'mifdescription', array( $this, 'description_code' ) );
		add_action('wp_footer', array($this, 'enqueueScriptsStyle'));
	}
	public static function getInstance(){
		if ( null == self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}
	// проверка и вывод скрипта для шорткода
	function enqueueScriptsStyle() {
		$pluginPrefix = "mifist-";
		wp_enqueue_style( "{$pluginPrefix}main-css", MIFISTSLICK_PlUGIN_URL . 'assets/css/mssp-style.css' );
		wp_enqueue_script( "{$pluginPrefix}main-js", MIFISTSLICK_PlUGIN_URL . 'assets/js/slick.min.js' );
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
	
}




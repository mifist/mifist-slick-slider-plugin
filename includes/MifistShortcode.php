<?php
namespace includes;
// пример подключения скриптов шорткода, только если он есть на странице
/*class foobar_shortcode {
  static $add_script;
  static function init () {
      add_shortcode('foobar', array(__CLASS__, 'foobar_func'));
      add_action('init', array(__CLASS__, 'register_script'));
      add_action('wp_footer', array(__CLASS__, 'print_script'));
  }
  static function foobar_func( $atts ) {
      self::$add_script = true;
      return "foo and bar";
  }
  static function register_script() {
      wp_register_script( 'foo-js', get_template_directory_uri() . '/includes/js/foo.js');
  }
 
  static function print_script () {
      if ( !self::$add_script ) return;
      wp_print_scripts('foo-js');
  }
}
foobar_shortcode::init();*/

// создание шоткода
class MifistShortcode {
	private static $instance = null;
	public function __construct() {
		
			add_shortcode( 'mifshortcode', array( $this, 'shortcode_code' ) );
			add_shortcode( 'mifdescription', array( $this, 'description_code' ) );
		
		
	}

	//вывод кода на страницу
	static public function shortcode_code ($atts, $content) {
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
	static public function description_code ($atts, $content = null) {
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





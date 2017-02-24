<?php
namespace includes\controllers\site\shortcodes;

// Наследуем базовый класс MifistShortcodesController в котором реализованый некоторый функционал для создания
// шорткода
use includes\controllers\admin\menu\MifistICreatorInstance;
use includes\models\admin\menu\MifistGuestBookSubMenuModel;

class MifistGuestBookShortcodesController extends MifistShortcodesController
    implements MifistICreatorInstance
{

    /**
     * Функция в которой будем добалять шорткоды через функцию add_shortcode( $tag , $func );
     * @return mixed
     */
    public function initShortcode()
    {
        // TODO: Implement initShortcode() method.
        /*
         * Добавляем щорткод [mifist_guest_book]
         * этот шорткод будет добалять форму для добавления данных в гостевую книгу
         */
        add_shortcode( 'mifist_guest_book', array(&$this, 'action'));
    }

    /**
     * Функция обработки шоткода
     * Функция указанная в параметре $func, получает 3 параметра, каждый из них может быть передан,
     * а может нет:
     * $atts(массив)
     *      Ассоциативный массив атрибутов указанных в шоткоде. По умолчанию пустая строка - атрибуты
     *      не переданы.
     *      По умолчанию: ''
     * $content(строка)
     *      Текст шоткода, когда используется закрывающая конструкция шотркода: [foo]текст шорткода[/foo]
     *      По умолчанию: ''
     * $tag(строка)
     *      Тег шорткода. Может пригодится для передачи в доп. функции. Пр: если шорткод - [foo],
     *      то тег будет - foo.
     *      По умолчанию: текущий тег
     * @param array $atts
     * @param string $content
     * @param string $tag
     * @return mixed
     */
    public function action($atts = array(), $content = '', $tag = '')
    {
        // TODO: Implement action() method.
        return $this->render(array());
    }

    /**
     * Функция отвечающа за вывод обработаной информации шорткодом
     * @param $data
     * @return mixed
     */
    public function render($data)
    {
        // TODO: Implement render() method.
        // В этой переменой будет view формы
	    $action = isset($_GET['action']) ? $_GET['action'] : null ;
	    //Данные которые будут передаваться в view
	    $data = array();
	    $pathView = MIFISTSLICK_PlUGIN_DIR;
	    
	    $data = MifistGuestBookSubMenuModel::getAll();
	    $pathView .= "/includes/views/site/shortcodes/MifistGuestBookShortcodesController.view.php";
	    $this->loadView($pathView, 0, $data);
    }

    // Метод создает экземпляр класса
    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}
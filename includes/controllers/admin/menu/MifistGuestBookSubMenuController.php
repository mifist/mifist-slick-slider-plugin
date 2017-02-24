<?php
namespace includes\controllers\admin\menu;


use includes\models\admin\menu\MifistGuestBookSubMenuModel;

class MifistGuestBookSubMenuController extends MifistBaseAdminMenuController {
	
	public function action()
	{
		// TODO: Implement action() method.
		//Добавление пункта меню
		$pluginPage = add_submenu_page(
			MIFISTSLICK_PlUGIN_TEXTDOMAIN,
			_x(
				'Guest book',
				'admin menu page' ,
				MIFISTSLICK_PlUGIN_TEXTDOMAIN
			),
			_x(
				'Guest book',
				'admin menu page' ,
				MIFISTSLICK_PlUGIN_TEXTDOMAIN
			),
			'manage_options',
			'mifist_control_guest_book_menu',
			array(&$this, 'render'));
	}
	
	public function render()
	{
		// TODO: Implement render() method.
		/*
		В Гостевой книги может быть несколько view (Отображение данных таблицы,
		Добавление данных в таблице, Редактирование данных в таблице,
		Удаление данных с таблицы). Что бы определить контролеру какое действие в данный
		момент обрабатывать к ссылке будет добляться $_GET['action']. Мы его можем получить
		и определить какой view подшружать странице.
		*/
		$action = isset($_GET['action']) ? $_GET['action'] : null ;
		//Данные которые будут передаваться в view
		$data = array();
		$pathView = MIFISTSLICK_PlUGIN_DIR;
		/*
		 * Используем switch чтобы определить какой сейчас  $_GET['action']
		 */
		switch($action) {
			// Подгружаем view для добавление данных в таблицу
			// admin.php?page=mifist_control_guest_book_menu&action=add_data
			case "add_data":
				$pathView .= "/includes/views/admin/menu/MifistGuestBookSubMenuAdd.view.php";
				$this->loadView($pathView, 0, $data);
				break;
			// Сохранение данных в таблицу
			// admin.php?page=mifist_control_guest_book_menu&action=insert_data
			case "insert_data":
				/*
				 * Проверяем наличие данных от формы MifistGuestBookSubMenuAdd.view.php
				 */
				if (isset($_POST)){
					/*
					 * Передаем массив данных в метод insert модели.
					 * Массив ассоциативный ключ это название поля в таблице в которую мы будем вставлять,
					 * значение это значение которое будет вставлено определеному полю
					 *
					 */
					$id = MifistGuestBookSubMenuModel::insert(array(
						'user_name' => $_POST['user_name'],
						'date_add' => time(), // time() стандартная php функция получения времени
						'message' => $_POST['message']
					));
					
					/*
					 * После вставки возвращаемся на основную страницу гостевой книги
					 * admin.php?page=mifist_control_guest_book_menu
					 */
					$this->redirect("admin.php?page=mifist_control_guest_book_menu");
				}
				
				
				break;
			// Подгружаем view для редактирование данных в таблицу
			// admin.php?page=mifist_control_guest_book_menu&action=edit_data&id=ID записи
			case "edit_data":
				/*
				 * Чтобы получить из таблицы запись которую редактировать мы используем $_GET['id'] параметр
				 * Проверяем его наличие и на пустоту
				*/
				if(isset($_GET['id']) && !empty($_GET['id'])){
					// Получаем данные записи в таблице по id затем эти данные передадим в view MifistGuestBookSubMenuEdit.view
					$data = MifistGuestBookSubMenuModel::getById((int)$_GET['id']);
					$pathView .= "/includes/views/admin/menu/MifistGuestBookSubMenuEdit.view.php";
					$this->loadView($pathView, 0, $data);
				}
				
				break;
			// Обновление редактированых данных в таблице
			// admin.php?page=mifist_control_guest_book_menu&action=update_data
			case "update_data":
				// Проверяем наличие $_POST данных от формы редактирования  MifistGuestBookSubMenuEdit.view.php
				//var_dump($_POST);
				if (isset($_POST)){
					// Если данные есть то обновляем их в базе данных по ID
					MifistGuestBookSubMenuModel::updateById(
						array(
							'user_name' => $_POST['user_name'],
							'date_add' => time(),
							'message' => $_POST['message']
						), $_POST['id']
					);
					$this->redirect("admin.php?page=mifist_control_guest_book_menu");
				}
				break;
			// Удаление данных
			// admin.php?page=mifist_control_guest_book_menu&action=delete_data&id=ID записи
			case "delete_data":
				// Чтобы удалить определеную запись в таблице мы используем $_GET['id'] параметр
				// Проверяем его наличие и на пустоту
				if(isset($_GET['id']) && !empty($_GET['id'])){
					MifistGuestBookSubMenuModel::deleteById((int)$_GET['id']);
				}
				$this->redirect("admin.php?page=mifist_control_guest_book_menu");
				break;
			// Основная страница Гостевой книги
			// admin.php?page=mifist_control_guest_book_menu
			default:
				//Получение всех записей в таблице чтобы отобразить их view
				
				$data = MifistGuestBookSubMenuModel::getAll();
				$pathView .= "/includes/views/admin/menu/MifistGuestBookSubMenu.view.php";
				$this->loadView($pathView, 0, $data);
		}
		
	}
	
	/**
	 * Метод перенаправления на нужную страницу
	 * @param string $page
	 */
	public function redirect($page = ''){
		echo '<script type="text/javascript">
                  document.location.href="'.$page.'";
           </script>';
	}
	
	public static function newInstance()
	{
		// TODO: Implement newInstance() method.
		$instance = new self;
		return $instance;
	}
}
<?php // Рассказазываем WordPress о новых страницах.
// Для этого нужно создать функцию, которую следует привязать к действию 'admin_menu'.
namespace includes\controllers\admin\menu;

abstract class MifistBaseAdminMenuController implements MifistICreatorInstance {
    public function __construct(){
        /*
         * Регистрирует хук-событие. При регистрации указывается PHP функция,
         * которая сработает в момент события, которое вызывается с помощью do_action().
         */
        add_action('admin_menu', array( &$this, 'action'));
    }

    abstract public function action();
    abstract public function render();
}
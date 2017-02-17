<?php
namespace includes\models\admin\menu;


use includes\common\NewInstance;
use includes\controllers\admin\menu\MifistICreatorInstance;

class MifistMainAdminOptionsMenuModel implements MifistICreatorInstance {

    public function __construct(){
        add_action( 'admin_init', array( &$this, 'createOption' ) );
        error_log(1);
    }

    /**
     * Регистрировать опции
     * Добавлять поля опции
     * Добавлять секции опции

     */
    public function createOption() {
        error_log(2);
        // register_setting( $option_group, $option_name, $sanitize_callback );
        // Регистрирует новую опцию
        register_setting('MifistMainSettings', MIFISTSLICK_PlUGIN_OPTION_NAME, array(&$this, 'saveOption'));
        // add_settings_section( $id, $title, $callback, $page );
        // Добавление секции опций
        add_settings_section( 'mifist_slick_account_section_id', __('Account', MIFISTSLICK_PlUGIN_TEXTDOMAIN), '', 'mifist-slick-plugin' );
        // add_settings_field( $id, $title, $callback, $page, $section, $args );
        // Добавление полей опций
        add_settings_field(
            'mifist_slick_token_field_id',
            __('Token', MIFISTSLICK_PlUGIN_TEXTDOMAIN),
            array(&$this, 'tokenField'),
            'mifist-slick-plugin',
            'mifist_slick_account_section_id'
        );
        add_settings_field(
            'mifist_slick_marker_field_id',
            __('Marker', MIFISTSLICK_PlUGIN_TEXTDOMAIN),
            array(&$this, 'markerField'),
            'mifist-slick-plugin',
            'mifist_slick_account_section_id'
        );

    }

    public function tokenField(){
        $option = get_option(MIFISTSLICK_PlUGIN_OPTION_NAME);
        ?>
            <input type="text"
                   name="<?php echo MIFISTSLICK_PlUGIN_OPTION_NAME; ?>[account][token]"
                   value="<?php echo esc_attr( $option['account']['token'] ) ?>" />
        <?php
    }
    public function markerField(){
        $option = get_option(MIFISTSLICK_PlUGIN_OPTION_NAME);
        //var_dump($option);
        ?>
        <input type="text"
               name="<?php echo MIFISTSLICK_PlUGIN_OPTION_NAME; ?>[account][marker]"
               value="<?php echo esc_attr( $option['account']['marker'] ) ?>" />
        <?php
    }
    /**
     * Сохранение опции
     * @param $input
     */
    public function saveOption($input) {
        error_log(3);
        error_log(print_r($input, true));
        return $input;
    }

   use NewInstance;
}
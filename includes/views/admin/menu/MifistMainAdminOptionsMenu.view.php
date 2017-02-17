<?php
/**
 * Created by PhpStorm.
 * User: avant
 * Date: 17.02.17
 * Time: 9:33
 */
?>
<form action="options.php" method="POST">
    <?php
        settings_fields( 'MifistMainSettings' );     // скрытые защитные поля
        do_settings_sections( 'mifist-slick-plugin' ); // секции с настройками (опциями). У нас она всего одна 'section_id'
        submit_button();
    ?>
</form>
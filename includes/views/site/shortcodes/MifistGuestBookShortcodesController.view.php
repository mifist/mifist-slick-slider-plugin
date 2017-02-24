<?php
/**
 * Created by PhpStorm.
 * User: avant
 * Date: 24.02.17
 * Time: 4:39
 */

$output = '';
$output .= '<form class="mifist-guest-form" method="post">
    <label>'.__('User name', MIFISTSLICK_PlUGIN_TEXTDOMAIN ).'</label>
    <input type="text" name="mifist_user_name" class="mifist-user-name">
     <label>'.__('User age', MIFISTSLICK_PlUGIN_TEXTDOMAIN ).'</label>
    <input type="number" name="mifist_age" class="mifist-age">
     <label>'.__('User e-mail', MIFISTSLICK_PlUGIN_TEXTDOMAIN ).'</label>
    <input type="email" name="mifist_user_mail" class="mifist-user-mail">
    <label>'.__('Message', MIFISTSLICK_PlUGIN_TEXTDOMAIN ).'</label>
    <textarea name="mifist_message" class="mifist-message"></textarea>
    <button class="mifist-btn-add" >'.__('Add', MIFISTSLICK_PlUGIN_TEXTDOMAIN ).'</button>                   
</form>';
echo $output;

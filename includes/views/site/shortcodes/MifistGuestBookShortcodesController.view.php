<?php
/**
 * Created by PhpStorm.
 * User: avant
 * Date: 24.02.17
 * Time: 4:39
 */
$output = '';
$output .= '<form  method="post">
                        <label>'.__('User name', MIFISTSLICK_PlUGIN_TEXTDOMAIN ).'</label>
                        <input type="text" name="mifist_user_name" class="mifist-user-name">
                        <label>'.__('Message', MIFISTSLICK_PlUGIN_TEXTDOMAIN ).'</label>
                        <textarea name="mifist_message" class="mifist-message"></textarea>
                        <button class="mifist-btn-add" >'.__('Add', MIFISTSLICK_PlUGIN_TEXTDOMAIN ).'</button>                   
                    </form>';
return $output;
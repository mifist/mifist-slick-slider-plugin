<!-- Ссылка ссылаеться на страницу гостевой книги только у нее добавлен $_GET['action'] параметр &action=add_data
    По этому параметру мы будем в методе render определять что делать
 -->
<a href="admin.php?page=mifist_control_guest_book_menu&action=add_data">
    <?php _e('Add', MIFISTSLICK_PlUGIN_TEXTDOMAIN ); ?>
</a>

<table class="admin-table " border="1">
    <thead>
    <tr>
	   <!-- <td>
		    <?php /*_e('Category', MIFISTSLICK_PlUGIN_TEXTDOMAIN ); */?>
	    </td>-->
        <td>
            <?php _e('Name', MIFISTSLICK_PlUGIN_TEXTDOMAIN ); ?>
        </td>
	    <td>
		    <?php _e('Age', MIFISTSLICK_PlUGIN_TEXTDOMAIN ); ?>
	    </td>
	    <td>
		    <?php _e('E-mail', MIFISTSLICK_PlUGIN_TEXTDOMAIN ); ?>
	    </td>
        <td>
            <?php _e('Messsage', MIFISTSLICK_PlUGIN_TEXTDOMAIN ); ?>
        </td>
        <td>
            <?php _e('Date', MIFISTSLICK_PlUGIN_TEXTDOMAIN ); ?>
        </td>
        <td>
            <?php _e('Actions', MIFISTSLICK_PlUGIN_TEXTDOMAIN ); ?>
        </td>
    </tr>
    </thead>
    <tbody>
    <!-- Проверка данных на пустоту чтобы цыкл не вернул ошибку -->
    <?php if(count($data) > 0 && $data !== false){  ?>
        <?php foreach($data as $value): ?>
            <tr class="table_box">
	           <!-- <td>
		            <?php /*echo $value['user_category']; */?>
	            </td>-->
                <td>
		            <?php echo $value['user_name']; ?>
	            </td>
	            <td>
		            <?php echo $value['age']; ?>
	            </td>
	            <td>
		            <?php echo $value['user_mail']; ?>
	            </td>
                <td>
                    <?php echo $value['message']; ?>
                </td>
                <td>
                    <?php echo date('d-m-Y H:i', $value['date_add']); ?>
                </td>

                <td>
                    <!-- Ссылки  ссылаються на страницу гостевой книги только у них добавлен $_GET['action'] параметр
                     для редактирования &action=edit_data для удаления &action=delete_data и в этих ссылок еще добавлен
                     один $_GET['id'] параметр это &id=(id записи) записи гостевой книги по котором мы будем выполнять
                     действия -->
                    <a href="admin.php?page=mifist_control_guest_book_menu&action=edit_data&id=<?php echo $value['id'];?>">
                        <?php _e('Edit', MIFISTSLICK_PlUGIN_TEXTDOMAIN ); ?>
                    </a>
                    <a href="admin.php?page=mifist_control_guest_book_menu&action=delete_data&id=<?php echo $value['id'];?>">
                        <?php _e('Delete', MIFISTSLICK_PlUGIN_TEXTDOMAIN ); ?>
                    </a>


                </td>

            </tr>
        <?php endforeach ?>
    <?php }else{ ?>
        <tr>
<!--            <td></td>-->
            <td></td>
            <td></td>
            <td></td>
	        <td></td>
	        <td></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
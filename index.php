<?php
include_once('libs/HtmlHelper.php');
$fields = array(
				'text' => array('id' => 'username', 'name' => 'username', 'placeholder' => 'I\'m a text input!'),
				'password' => array('id' => 'password', 'name' => 'password', 'placeholder' => 'I\'m a password input!')
			   );
$form =  HtmlHelper::Form('template/index.php', $fields);
include_once('template/index.php');
?>

<?php
include_once('libs/HtmlHelper.php');
$fields = array(
				'text' => array('id' => 'username', 'name' => 'username', 'placeholder' => 'I\'m a text input!'),
				'password' => array('id' => 'password', 'name' => 'password', 'placeholder' => 'I\'m a password input!')
			   );

$form =  HtmlHelper::Form('template/index.php', $fields);
$list = array('li' => array('id' => 'alex', 'name' => 'test', 'value' => 'hello'));

$list = HtmlHelper::list_item($list,'class');
include_once('template/index.php');
?>

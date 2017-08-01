<?php
include_once('libs/HtmlHelper.php');
$fields = array(
				'text' => array('id' => 'username', 'name' => 'username', 'placeholder' => 'I\'m a text input!'),
				'password' => array('id' => 'password', 'name' => 'password', 'placeholder' => 'I\'m a password input!')
			   );

$form =  HtmlHelper::Form('template/index.php', $fields);
$list = array('option' => 'value', 'id' => 'alex', 'name' => 'test');

echo $list = HtmlHelper::list_item($list,'liClass');
include_once('template/index.php');
?>

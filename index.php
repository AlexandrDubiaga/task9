<?php
include_once('libs/HtmlHelper.php');
/*$fields = array(
				'text' => array('id' => 'username', 'name' => 'username', 'placeholder' => 'I\'m a text input!'),
				'password' => array('id' => 'password', 'name' => 'password', 'placeholder' => 'I\'m a password input!')
			   );

$form =  HtmlHelper::Form('template/index.php', $fields);
*/
$select = array('option' => 'first', 'id' => 'second', 'name' => 'third');

$selectMult = HtmlHelper::select($select,'liClass',50,form-control);
include_once('template/index.php');
?>

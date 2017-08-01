<?php
include_once('libs/HtmlHelper.php');
/*$fields = array(
				'text' => array('id' => 'username', 'name' => 'username', 'placeholder' => 'I\'m a text input!'),
				'password' => array('id' => 'password', 'name' => 'password', 'placeholder' => 'I\'m a password input!')
			   );

$form =  HtmlHelper::Form('template/index.php', $fields);
*/
$select = array('first','second','third','fourth','fifth','six');

$selectMult = HtmlHelper::select($select,'liClass',1,'form-control','third');
include_once('template/index.php');
?>

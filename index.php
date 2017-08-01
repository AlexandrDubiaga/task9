<?php
include_once('libs/HtmlHelper.php');
echo HtmlHelper::Doctype();
$fields = array(
				'text' => array('id' => 'username', 'name' => 'username', 'placeholder' => 'I\'m a text input!'),
				'password' => array('id' => 'password', 'name' => 'password', 'placeholder' => 'I\'m a password input!')
			   );
echo HtmlHelper::Form('index.php', $fields);

?>

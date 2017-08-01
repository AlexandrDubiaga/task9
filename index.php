<?php
include_once('libs/HtmlHelper.php');
echo HtmlParser::Doctype();
echo HtmlParser::Doctype();
$fields = array(
				'text' => array('id' => 'username', 'name' => 'username', 'placeholder' => 'I\'m a text input!'),
				'password' => array('id' => 'password', 'name' => 'password', 'placeholder' => 'I\'m a password input!')
			   );
echo HtmlParser::Form('index.php', $fields);

?>

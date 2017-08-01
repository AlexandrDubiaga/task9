<?php
include_once(lids/HtmlHelper.php');
echo HTML::Doctype();
$fields = array('text' => array('id' => 'username', 'name' => 'username', 'placeholder' =>  'text input!'),
'password' => array('id' => 'password', 'name' => 'password', 'placeholder' => 'password input!'));
echo HTML::Form('index.php', $fields);
?>

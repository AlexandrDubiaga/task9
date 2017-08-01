<?php
include_once(lids/HtmlHelper.php');
echo HTML::Doctype();

echo HTML::Form('index.php', $fields);
?>

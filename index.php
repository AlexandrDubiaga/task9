<?php
include_once('libs/HtmlHelper.php');

$select = array('first','second','third','fourth','fifth','six');
$selectMult = HtmlHelper::select($select,'liClass',1,'form-control','third');

$titles = array('Name', 'Title', 'Date');
$tab = array('Alex', 'Story', '12.02.17');
$table = HtmlHelper::table($tab, $titles, 'table table-striped');

$tab = array('first', 'Second', 'Fight');
$listUl = HtmlHelper::listesOlUl($tab, 'list-group','list-group-item','ol');

$val = array('varOne'=>'first', 'varTwo'=>'Second', 'varThree'=>'Fight');
$dtdddlList = HtmlHelper::listesdlDtDd($val,'list-group','list-group-item');

$valForm = array('varOne'=>'first', 'varTwo'=>'Second', 'varThree'=>'Fight');
$radioForm = HtmlHelper::radiobuttonsGroup($valForm,'form-inline','','group');





include_once('template/index.php');

?>

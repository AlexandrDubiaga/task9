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

$valradio = array('varOne'=>'first', 'varTwo'=>'Second', 'varThree'=>'Fight');
$radioForm = HtmlHelper::radiobuttonsGroup($valradio,'form-inline','','group');

$valCheckbox = array('varOne'=>'first', 'varTwo'=>'Second', 'varThree'=>'Fight');
$checkboxForm = HtmlHelper::checkbox($valCheckbox,'form-inline','','val');





include_once('template/index.php');

?>

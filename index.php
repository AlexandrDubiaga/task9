<?php
include_once('libs/HtmlHelper.php');

$select = array('first','second','third','fourth','fifth','six');
$selectMult = HtmlHelper::select($select,'liClass',1,'form-control','third');

$titles = array('Name', 'Title', 'Date');
$tab = array('Alex', 'Story', '12.02.17');
$table = HtmlHelper::table($tab, $titles, 'table table-striped');

$oLUlData = array('first', 'Second', 'Fight');
$listUlOl = HtmlHelper::listesOlUl($oLUlData, 'list-group','list-group-item','ol');

$dtData = array('varOne'=>'first', 'varTwo'=>'Second', 'varThree'=>'Fight');
$dtddlList = HtmlHelper::listesdlDtDd($dtData,'list-group','list-group-item');

$valradio = array('varOne'=>'first', 'varTwo'=>'Second', 'varThree'=>'Fight');
$radioForm = HtmlHelper::radiobuttonsGroup($valradio,'form-inline','','group');

$valCheckbox = array('varOne'=>'first', 'varTwo'=>'Second', 'varThree'=>'Fight');
$checkboxForm = HtmlHelper::checkbox($valCheckbox,'form-inline','','val','varTwo');

include_once('template/index.php');

?>

<?php
include_once('libs/HtmlHelper.php');

$select = array('first','second','third','fourth','fifth','six');
$selectMult = HtmlHelper::select($select,'liClass',1,'form-control','third');
if(!$selectMult)
{
  $errorSelect = ERROR_SELECT;
}

$titles = array('Name', 'Title', 'Date');
$tab = array('Alex', 'Story', '12.02.17');
$table = HtmlHelper::table($tab, $titles, 'table table-striped');
if(!$table)
{
  $errorTable = ERROR_TABLE;
}
$oLUlData = array('first', 'Second', 'Fight');
$listUlOl = HtmlHelper::listesOlUl($oLUlData, 'list-group','list-group-item','ol');
if(!$listUlOl)
{
  $errorListOlUl = ERROR_LISTOLUL;
}
$dtData = array('varOne'=>'first', 'varTwo'=>'Second', 'varThree'=>'Fight');
$dtddlList = HtmlHelper::listesdlDtDd($dtData,'list-group','list-group-item');
if(!$dtddlList)
{
  $errorListDtDdDl = ERROR_LISTDTDDDL;
}
$valradio = array('varOne'=>'first', 'varTwo'=>'Second', 'varThree'=>'Fight');
$radioForm = HtmlHelper::radiobuttonsGroup($valradio,'form-inline','','group');
if(!$radioForm)
{
  $errorRadioForm = ERROR_RADIOFORM;
}
$valCheckbox = array('varOne'=>'first', 'varTwo'=>'Second', 'varThree'=>'Fight');
$checkboxForm = HtmlHelper::checkbox($valCheckbox,'form-inline','','val','varTwo');
if(!$checkboxForm)
{
  $errorCheckboxForm = ERROR_CHECKBOXFORM;
}
include_once('template/index.php');

?>

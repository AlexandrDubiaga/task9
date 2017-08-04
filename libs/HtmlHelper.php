<?php
abstract class HtmlHelper{
	
	private static $tag = '';
	private static function parse_attr($attributes)
	{
		if (is_string($attributes)) 
		{
			return (!empty($attributes)) ? ' ' . trim($attributes) : '';
		}
		if (is_array($attributes)) 
		{
			$attr = '';
			foreach ($attributes as $key => $val) 
			{
				$attr .= ' ' . $key . '="' . $val . '"';
			}
			return $attr;
		}
	}
	
	private static function parse_fields($fields)
	{
		if (is_array($fields)) 
		{
			$field = '';
			foreach ($fields as $key => $val)
			{
				$attributes = self::parse_attr($val);
				$field .= '<input type="' . $key .'"' . $attributes . ' />' . PHP_EOL;
			}
			return $field;
		}
	}
	
	public static function select(array $select, $class = null,$size, $formControl, $selected)
	{
		if (is_array($select)) 
		{
			$class = (isset($class) && !empty($class)) ? ' class="' . $class . '"': null;
			$formControl = (isset($formControl) && !empty($formControl)) ? ' class="' . $formControl . '"': null;
			$size = (isset($size) && !empty($size)) ? ' size="' . $size . '"': null;
			$string = '';
			$sel = 'selected';
			$i = 0;
			$string .= "<select multiple  $formControl $class $size>";
			foreach ($select as $key => $val)
			{
				$i++;
				$string  .= '<option id="' . $i . '"' . $class . '>' . PHP_EOL . $val . PHP_EOL . '</option>' . PHP_EOL;	
			}
			$string  .= "</select>";
			return $string;
		}
	}
	
	public static function table(array $names, array $titles, $class)
	{
        	$string='';
		$class = (isset($class) && !empty($class)) ? ' class="' . $class . '"': null;
		$string .= "<table $class>";
        	$string .= '<tr>';
        	foreach($titles as $key => $val)
        	{
            		$string .= '<th>'. PHP_EOL . $val . PHP_EOL .'</th>' .  PHP_EOL;;
        	}
       		$string .= '</tr>';
		$string .= '<tr>';
		foreach($names as $key => $val)
		{
			$string .= '<td>'. PHP_EOL . $val . PHP_EOL .'</td>' .  PHP_EOL;;
		
		}
		$string .= '</tr>';
		$string .= '</table>';
		return $string;
	
	}
	public static function listesOlUl(array $list, $classList, $classItem, $tag = ' ')
	{
        	$classList = (isset($classList) && !empty($classList)) ? ' class="' . $classList . '"': null;
        	$classItem = (isset($classItem) && !empty($classItem)) ? ' class="' . $classItem . '"': null;
        	$string =' ';
        	$string .= "<$tag $classList>";
        	foreach($list as $key => $val)
        	{
            		$string .= '<li ' . $classItem . '>'. PHP_EOL . $val . PHP_EOL .'</li>' .  PHP_EOL;
        	}
        	$string .= "</$tag>";
        	return $string;
	}

    	public static function listesdlDtDd(array $list, $classList, $classItem)
	{
    		$classList = (isset($classList) && !empty($classList)) ? ' class="' . $classList . '"': null;
        	$classItem = (isset($classItem) && !empty($classItem)) ? ' class="' . $classItem . '"': null;
        	$string =' ';
        	$string .= "<dl $classList>";
        	foreach($list as $key => $val)
        	{
            		$string .= '<dt ' . $classItem . '>'. PHP_EOL . $key . PHP_EOL .'</dt>' .  PHP_EOL;
            		$string .= '<dd ' . $classItem . '>'. PHP_EOL . $val . PHP_EOL .'</dd>' .  PHP_EOL;
        	}
        	$string .= "</dl>";
        	return $string;
   	 }

    	public static function radiobuttonsGroup(array $list, $classForm, $classItem,$nameForInput)
	{
		$classForm = (isset($classForm) && !empty($classForm)) ? ' class="' . $classForm . '"': null;
        	$classItem = (isset($classItem) && !empty($classItem)) ? ' class="' . $classItem . '"': null;
        	$nameForInput = (isset($nameForInput) && !empty($nameForInput)) ? ' name="' . $nameForInput . '"': null;
		$string =' ';
        	$string .= "<form $classForm>";
        	foreach($list as $key => $val)
        	{
            		$valForInput = (isset($key) && !empty($key)) ? ' value="' . $key . '"': null;
            		$string .= '<input type="radio" ' . $classItem . ' '.$nameForInput.' '.$valForInput.'>'. PHP_EOL . $val . PHP_EOL;
        	}
        	$string .= "</form >";
        	return $string;
    	}
	
	public static function checkbox(array $list, $classForm, $classItem,$nameForInput)
	{
	$classForm = (isset($classForm) && !empty($classForm)) ? ' class="' . $classForm . '"': null;
        $classItem = (isset($classItem) && !empty($classItem)) ? ' class="' . $classItem . '"': null;
        $nameForInput = (isset($nameForInput) && !empty($nameForInput)) ? ' name="' . $nameForInput . '"': null;
        $string =' ';
        $string .= "<form $classForm>";
        foreach($list as $key => $val)
        {
        	$valForInput = (isset($key) && !empty($key)) ? ' value="' . $key . '"': null;
            	$string .= '<input type="checkbox" ' . $classItem . ' '.$nameForInput.' '.$valForInput.'>'. PHP_EOL . $val . PHP_EOL;
        }
        $string .= "</form >";
        return $string;
    }	
}
?>



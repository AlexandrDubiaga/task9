<?php
abstract class HtmlHelper{
	
	private static $tag = '';
	
	const VERSION = '1.0.7';
	
	private static function parse_attr($attributes) {
		if (is_string($attributes)) {
			return (!empty($attributes)) ? ' ' . trim($attributes) : '';
		}
		if (is_array($attributes)) {
			$attr = '';
			foreach ($attributes as $key => $val) {
				$attr .= ' ' . $key . '="' . $val . '"';
			}
			return $attr;
		}
	}
	
	private static function parse_fields($fields) {
		if (is_array($fields)) {
			$field = '';
			foreach ($fields as $key => $val) {
				$attributes = self::parse_attr($val);
				$field .= '<input type="' . $key .'"' . $attributes . ' />' . PHP_EOL;
			}
			return $field;
		}
	}
	
	public static function list_item($items, $class = null) {
		if (is_array($items)) {
			$class = (isset($class) && !empty($class)) ? ' class="' . $class . '"': null;
			$option = '';
			$sel = "<select>";
			$sel2 = "</select>";
			$i = 0;
			echo "<select>";
			foreach ($items as $key => $val) {
				$i++;
				$option .= '<option id="' . $i . '"' . $class . '>' . PHP_EOL . $val . PHP_EOL . '</option>' . PHP_EOL;
				
			}
			echo "</select>";
			
			return $sel.$option.$sel2;
		}
	}
	
	
	public static function Form($action, $fields, $name = null, $method = 'post', $enctype = 'multipart/form-data') {
		$name = (isset($name) && !empty($name)) ? ' name="' . $name . '"' : null;
		$method = (isset($method)) ? ' method="' . $method . '"': null;
		$enctype = (isset($enctype)) ? ' enctype="' . $enctype . '"': null;
		$html = '<form action="' . $action . '"' . $name . $method . $enctype . '>' . PHP_EOL;
		$html .= self::parse_fields($fields);
		$html .= '</form>' . PHP_EOL;
		return $html;
	}
	
	
}
?>

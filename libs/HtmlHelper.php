<?php
abstract class HtmlHelper{
	
	private static $tag = '';
	
	
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
	
	public static function select($select, $class = null) {
		if (is_array($select)) {
			$class = (isset($class) && !empty($class)) ? ' class="' . $class . '"': null;
			$string = '';
			$i = 0;
			$string .= "<select $class>";
			foreach ($select as $key => $val) {
				$i++;
				$string  .= '<option id="' . $i . '"' . $class . '>' . PHP_EOL . $val . PHP_EOL . '</option>' . PHP_EOL;	
			}
			$string  .= "</select>";
			return $string;
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

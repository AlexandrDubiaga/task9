<?php
abstract class HTML {
	
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
	
	private static function list_item($items, $class = null) {
		if (is_array($items)) {
			$class = (isset($class) && !empty($class)) ? ' class="' . $class . '"': null;
			$li = '';
			$i = 0;
			foreach ($items as $key => $val) {
				$i++;
				$li .= '<li id="' . $i . '"' . $class . '>' . PHP_EOL . $val . PHP_EOL . '</li>' . PHP_EOL;
			}
			return $li;
		}
	}
	
	private static function filter($str, $mode) {
		switch($mode) {
			case 'strip':
				/* HTML tags are stripped from the string
				before it is used. */
				return strip_tags($str);
			case 'escapeAll':
				/* HTML and special characters are escaped from the string
				before it is used. */
				return htmlentities($str, ENT_QUOTES, 'UTF-8');
			case 'escape':
				/* Only HTML tags are escaped from the string. Special characters
				is kept as is. */
				return htmlspecialchars($str, ENT_NOQUOTES, 'UTF-8');
			case 'url':
				/* Encode a string according to RFC 3986 for use in a URL. */
				return rawurlencode($str);
			case 'filename':
				/* Escape a string so it's safe to be used as filename. */
				return str_replace('/', '-', $str);
			default:
				return null;
		}
	}
	
	public static function Doctype($type = 'html5') {
		$doctypes = array(
			'html5'			=> '<!DOCTYPE html>',
			'xhtml11'		=> '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">',
			'xhtml1-strict'	=> '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">',
			'xhtml1-trans'	=> '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">',
			'xhtml1-frame'	=> '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">',
			'html4-strict'	=> '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">',
			'html4-trans'	=> '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">',
			'html4-frame'	=> '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">',
		);
		if (isset($doctypes[strtolower($type)])) {
			return $doctypes[$type] . "\n";
		}
		else {
			return '';
		}
	}
	
	public static function Image($src, $attributes = '') {
		if (isset($attributes) && !empty($attributes)) {
			$attributes = self::parse_attr($attributes);
		}
		$border = (isset($attributes['border']) && !empty($attributes['border'])) ? $attributes['border'] . ' ' : 'border="0" ';
		$alt = (isset($attributes['alt']) && !empty($attributes['alt'])) ? $attributes['alt'] . ' ' : 'alt="" ';
		return '<img src="' . $src . '"' . $attributes . ' ' . $border . $alt . '/>';
	}
	
	public static function Anchor($url, $label = null, $attributes = null) {
		$label = (!empty($label)) ? $label : $url;
		if (isset($attributes) && !empty($attributes)) {
			$attributes = self::parse_attr($attributes);
		}
		return '<a href="' . $uri . '"' . $attributes . '>' . $label . '</a>';
	}
	
	public static function Email($email, $label = null, $attributes = null)	{
		$label = (!empty($label)) ? $label : $email;
		if (isset($attributes) && !empty($attributes)) {
			$attributes = self::parse_attr($attributes);
		}
		$html = '<a href="mailto:' . $email . '"' . $attributes . '>' . $label . '</a>';
		return $html;
	}
	
	public static function LineBreak($count = 1) {
		return str_repeat('<br />', $count) . PHP_EOL;
	}
	
	public static function Space($count = 1) {
		return str_repeat('&nbsp;', $count);
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
	
	public static function Open($tag, $attributes = null, $li_items = array()) {
		self::$tag = strtolower($tag);
		if (isset($attributes) && !empty($attributes)) {
			$attributes = self::parse_attr($attributes);
		}
		if ($tag == 'ul' || $tag == 'ol') {
			if (!empty($attributes['li_class'])) {
				$list = self::list_item($li_items, $attributes['li_class']);
				return '<' . self::$tag . $attributes . '>' . PHP_EOL . $li_items;
			} else {
				$list = self::list_item($li_items);
				return '<' . self::$tag . $attributes . '>' . PHP_EOL . $li_items;
			}
		}
		return '<' . self::$tag . $attributes . '>' . PHP_EOL;
	}
	
	public static function Close() {
		return PHP_EOL . '</' . self::$tag . '>' . PHP_EOL;
	}
	
	public static function Filter_XSS($str, $args) {
		while(list($name, $data) = each($args)) {
			$safe = false;
			$type = mb_substr($name, 0, 1);
			switch($type) {
				case '%':
					
					
					$safe = self::filter($data, 'strip');
					break;
				case '!':
					
					
					$safe = self::filter($data, 'escapeAll');
					break;
				case '@':
					$safe = self::filter($data, 'escape');
					break;
				case '&':
					$safe = self::filter($data, 'url');
					break;
				default:
					return null;
					break;
			}
			if ($safe !== false) {
				$str = str_replace($name, $safe, $str);
			}
		}
		return $str;
	}

	public static function Version() {
		return self::VERSION;
	}
}
?>

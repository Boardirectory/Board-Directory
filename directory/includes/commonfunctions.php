<?php

if(!defined('IN_DIRECTORY'))
	exit;

function requestVar($var, $default) {
	if($_POST[$var]) {
		$result = $_POST[$var];
	} else {
		$result = $_GET[$var];
	}
	settype($result, gettype($default));
	if(!$result) $result = $default;
	return utf8_encode(str_replace(array("\r\n", "\r"), array("\n", "\n"), $result));
}

function getCookie($cookie, $default) {
	$result = $_COOKIE[$cookie];
	settype($result, gettype($default));
	if(!$result) $result = $default;
	if(is_array($result)) {
		foreach($result as $key => $value) {
			$result[$key] = utf8_encode(str_replace(array("\r\n", "\r"), array("\n", "\n"), $value));
		}
		return $result;
	}
	return utf8_encode(str_replace(array("\r\n", "\r"), array("\n", "\n"), $result));
}
?>
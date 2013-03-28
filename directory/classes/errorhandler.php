<?php

class ErrorHandler {
	public static $log;
	public static function captureError($error, $message, $file, $line) {
		switch($error) {
			case E_USER_NOTICE;
				ErrorHandler::printLog($message, $file, $line);
				return true;
			case E_USER_WARNING;
				ErrorHandler::printLog($message, $file, $line);
				ErrorHandler::displayError();
				return true;
			case E_USER_ERROR;
				ErrorHandler::printLog($message, $file, $line);
				ErrorHandler::displayError();
		}
		return true;
	}
	
	public static function captureException(Exception $ex) {
		ErrorHandler::captureError(E_USER_ERROR, get_class($ex) . ': ' . $ex->getMessage(), $ex->getFile(), $ex->getLine());
		return true;
	}
	
	public static function setErrorHandler() {
		global $directory_root_path;
		ErrorHandler::$log = $directory_root_path . 'protected/log.html';
		set_error_handler(array('ErrorHandler', 'captureError'));
		set_exception_handler(array('ErrorHandler', 'captureException'));
	}
	
	public static function printLog($message, $file, $line) {
		$logh = fopen(ErrorHandler::$log, 'a');
		fwrite($logh, time() . ': ' . $message . ' - ' . $file . ':' . $line . PHP_EOL);
		fclose($logh);
	}
	
	public static function displayError() {
		global $template;
		if(!$template) {
			include_once($directory_root_path . 'classes/template.php');
			$template = new DirectoryTemplate();
		}
		try {
			$template->vars['error'] = 'An error occured. Please notify an administrator and try again later. ';
			$template->outputPage('error.html');
		} catch(Exception $ex) {
			ErrorHandler::printLog(get_class($ex) . ': ' . $ex->getMessage(), $ex->getFile(), $ex->getLine());
			die('An error occured. Please notify an administrator and try again later. ');
		}
		die('An error occured. Please notify an administrator and try again later. ');
	}
}
?>

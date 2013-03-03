<?php
/**
 *
 * @author Jeroen Bollen jbollensb@gmail.com
 * @package BIS
 * @version 3.1.0
 * @copyright (c) 2012 Jeroen Bollen
 * @license http://opensource.org/licenses/gpl-3.0.html GNU Public License
 *
 */
 
if(!defined('IN_DIRECTORY')) {
	exit;
}
 
class DirectoryUser {
	public $lang;
	public function DirectoryUser() {
		global $directory_root_path;
		include_once($directory_root_path . 'language/en/common.php');
		$this->lang = $lang;
	}
}
 
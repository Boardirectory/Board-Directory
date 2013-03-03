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

class BISDirectory {
	public $user;
	public $bis;
	
	public function BISDirectory() {
		global $directory_root_path;
		include_once($directory_root_path . 'classes/user.php');
		include_once($directory_root_path . 'classes/bis.php');
		include_once($directory_root_path . 'classes/template.php');
		$this->user = new DirectoryUser();
		$this->bis = new BIS();
		$this->template = new DirectoryTemplate();
	}
}

?>
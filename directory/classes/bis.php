<?php
if(!defined('IN_DIRECTORY'))
	exit;

class BIS {
	public $board;
	
	function BIS() {
		global $directory_root_path;
		include_once($directory_root_path . "classes/board.php");
		$this->board = new Board();
	}
}
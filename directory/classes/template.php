<?php 
if(!defined('IN_DIRECTORY'))
	exit;

class DirectoryTemplate {
	private $loader;
	private $twig;
	public $vars = Array();
	public $template;
	private $root;
	private $page = 'page.html';
	
	public function DirectoryTemplate() {
		global $directory_root_path;
		include_once($directory_root_path . 'Twig/Autoloader.php');
		Twig_Autoloader::register();
		$this->root = $diretory_root_path . 'templates';
	}
	
	public function setMode($mode) {
		global $directory_root_path;
		if($mode == 'theme') {
			$this->root = $diretory_root_path . 'themes';
			$this->page = 'default.css';
		}
	}
	public function outputPage($template = NULL) {
		$this->loader = new Twig_Loader_Filesystem($this->root);
		$this->twig = new Twig_Environment($this->loader, array(
			'cache'			=> $directory_root_path . 'cache/Twig',
			'auto_reload'	=> true,
		));
		if($template != NULL) {
			$this->template = $template;
		}
		$this->prepareVars();
		die($this->twig->loadTemplate($this->page)->render($this->vars));
	}
	private function prepareVars() {
		global $directory_root_path, $directory;
		$this->vars['lang'] = $directory->user->lang;
		$this->vars['template'] = $this->template;
		$this->vars['directory_root'] = $directory_root_path;
		$this->vars['style']['image_path'] = $directory_root_path . 'themes/images/default/';
		$this->vars['style']['name'] = 'default';
	}
}
?>
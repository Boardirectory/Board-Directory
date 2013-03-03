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


if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
	'directoryname'		=> 'Directory',
	'index'				=> 'Index',
	'site_description'	=> 'Indexing all boards under one directory!',
	'sitename'			=> 'Boardirectory Directory',
));

?>
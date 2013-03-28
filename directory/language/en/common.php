<?php
 
if(!defined('IN_DIRECTORY'))
	exit;


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
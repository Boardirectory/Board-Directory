<?php
define('IN_DIRECTORY', true);
header('Content-type: text/css; charset=UTF-8');
$directory_root_path = './';
if(!$_GET['theme']) die("* {color:#000000!important; background-color:#FFFFFF!important;font-size:100px!important;}");
include($directory_root_path . 'classes/template.php');
$template = new DirectoryTemplate();
$template->setMode('theme');
$template->outputPage($_GET['theme'] . '.css');
?>
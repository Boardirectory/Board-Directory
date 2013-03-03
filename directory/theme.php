<?php
define('IN_DIRECTORY', true);
header('Content-type: text/css; charset=UTF-8');
include_once($directory_root_path . 'classes/directory.php');
$directory = new BISDirectory();
include_once($directory_root_path . 'includes/constants.php');
if(!$_GET['theme']) die("* {color:#000000!important; background-color:#FFFFFF!important;font-size:100px!important;}");
$directory->template->setMode('theme');
$directory->template->outputPage($_GET['theme'] . '.css');
?>
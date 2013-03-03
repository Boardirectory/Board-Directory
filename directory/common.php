<?php
include_once($directory_root_path . 'includes/constants.php');
include_once($directory_root_path . 'classes/user.php');
include_once($directory_root_path . 'classes/bis.php');
include_once($directory_root_path . 'classes/template.php');
include_once($directory_root_path . 'classes/database.php');
$db = new Database();
$user = new DirectoryUser();
$bis = new BIS();
$template = new DirectoryTemplate();
?>

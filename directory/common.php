<?php
if(!defined('IN_DIRECTORY')) {
	exit;
}
session_name('bis');
$phpbb_root_path = './../';
include_once($directory_root_path . 'classes/errorhandler.php');
ErrorHandler::setErrorHandler();
include_once($directory_root_path . 'includes/constants.php');
include_once($directory_root_path . 'includes/commonfunctions.php');
include_once($directory_root_path . 'classes/user.php');
include_once($directory_root_path . 'classes/bis.php');
include_once($directory_root_path . 'classes/template.php');

$db = new PDO('mysql:host=localhost;dbname=bis', 'bis', base64_decode(file_get_contents($directory_root_path . 'protected/dbpass')), array(
	PDO::ATTR_PERSISTENT	=> true,
));
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$user = new User();
$bis = new BIS();
$template = new DirectoryTemplate();
$user->checkSession();
$user->getGroups();
?>

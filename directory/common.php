<?php
if(!defined('IN_DIRECTORY')) {
	exit;
}
session_name('bis');
$phpbb_root_path = './../';
include_once($directory_root_path . 'includes/constants.php');
include_once($directory_root_path . 'includes/commonfunctions.php');
include_once($directory_root_path . 'classes/user.php');
include_once($directory_root_path . 'classes/bis.php');
include_once($directory_root_path . 'classes/template.php');
try {
	$db = new PDO('mysql:host=localhost;dbname=bis', 'bis', base64_decode(file_get_contents($directory_root_path . 'includes/dbpass')), array(
		PDO::ATTR_PERSISTENT	=> true,
	));
	$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
} catch(PDOException $ex) {
	trigger_error($ex->getMessage(), E_USER_ERROR);
}
$user = new User();
$bis = new BIS();
$template = new DirectoryTemplate();
$user->checkSession();
?>

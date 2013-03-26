<?php
if(!defined('IN_DIRECTORY')) {
	exit;
}
try {
	global $phpbb_root_path;
	include($phpbb_root_path . 'config.php');
	$dbphpBB = new PDO('mysql:host=localhost;dbname=board', 'board', $dbpasswd, array(
		PDO::ATTR_PERSISTENT	=> true,
	));
	unset($dbpasswd);
	$dbphpBB->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
} catch(PDOException $ex) {
	trigger_error($ex->getMessage(), E_USER_ERROR);
}
?>

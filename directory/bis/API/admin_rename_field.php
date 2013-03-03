<?php
/**
 *
 * @author Jeroen Bollen jbollensb@gmail.com
 * @package Board Indexing Script
 * @version 3.0.0
 * @copyright (c) 2012 Jeroen Bollen
 * @license http://opensource.org/licenses/gpl-3.0.html GNU General Public License, version 3 (GPL-3.0)
 *
 */
 sleep(1);
header("cache-control: no-cache");
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './../../';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
require($phpbb_root_path . 'common.' . $phpEx);

// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup();

if(!$auth->acl_get('bis_da'))
{
	die('ERROR\:Authentication Failed');
}

include_once($phpbb_root_path . 'bis/constants.php');
include_once($phpbb_root_path . 'bis/bis.php');
$bis = new BIS;
die('SUCCESS\:TEST\-1\&TEST2\-2');
die("ERROR:Unknown Error Occured");
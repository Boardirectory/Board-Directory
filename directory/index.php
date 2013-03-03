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


/**
* @ignore
*/
define('IN_PHPBB', true);
define('IN_DIRECTORY', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './../';
$board_url_path = 'http://boardirectory.org/board/';
$directory_root_path = './';
$phpEx = substr(strrchr(__FILE__, '.'), 1);

include($phpbb_root_path . 'common.' . $phpEx);
// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup();

include_once($directory_root_path . 'classes/directory.php');
$directory = new BISDirectory();
include_once($directory_root_path . 'includes/constants.php');

if(!$auth->acl_get('bis_view_dir'))
{
	trigger_error('NOT_AUTHORISED');
}
$directory->template->outputPage('index.html');
?>
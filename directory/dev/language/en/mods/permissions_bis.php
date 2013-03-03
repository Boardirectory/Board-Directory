<?php
/**
 *
 * @author Jeroen Bollen jbollensb@gmail.com
 * @package
 * @version $Id$
 * @copyright (c) 2012 Jeroen Bollen
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 *
 */
 
/**
* DO NOT CHANGE
*/

if (!defined('IN_PHPBB'))
{
    exit;
}

if (empty($lang) || !is_array($lang))
{
    $lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine

// Adding the permissions
$lang['permission_type']['bis_'] = 'Board Index Script';
$lang['permission_cat']['bis_dir'] = 'Directory Permissions';
$lang['permission_cat']['bis_dir_mod'] = 'Directory Moderator Permissions';

$lang = array_merge($lang, array(
	'acl_bis_submit_board'	=> array('lang' => 'Can submit board', 'cat' => 'bis_dir'),
	'acl_bis_view_boards'	=> array('lang' => 'Can view boards', 'cat' => 'bis_dir'),
	'acl_bis_view_dir'		=> array('lang' => 'Can access Directory', 'cat' => 'bis_dir'),
	'acl_bis_own_board'		=> array('lang' => 'Can own a submitted board', 'cat' => 'bis_dir'),
	
	'acl_bis_view_dma'				=> array('lang' => 'Can access Directory Moderation Area', 'cat' => 'bis_dir_mod'),
	'acl_bis_approve_board'			=> array('lang' => 'Can approve submitted boards', 'cat' => 'bis_dir_mod'),
	'acl_bis_delete_boards'			=> array('lang' => 'Can delete submitted boards', 'cat' => 'bis_dir_mod'),
	'acl_bis_restore_board'			=> array('lang' => 'Can delete restore deleted boards', 'cat' => 'bis_dir_mod'),
	'acl_bis_view_trashcan'			=> array('lang' => 'Can access trashcan', 'cat' => 'bis_dir_mod'),
	'acl_bis_edit_board'			=> array('lang' => 'Can edit board data', 'cat' => 'bis_dir_mod'),
	'acl_bis_manage_occupy'			=> array('lang' => 'Can manage occupied jobs', 'cat' => 'bis_dir_mod'),
	'acl_bis_da'					=> array('lang' => 'Can manage administrative settings', 'cat' => 'bis_dir_mod'),
	'acl_bis_view_board_data_all'	=> array('lang' => 'Can see all board data', 'cat' => 'bis_dir_mod'),
	
	'ACL_TYPE_BIS_'			=> 'Board Index Permissions',
	'ACL_TYPE_GLOBAL_BIS_'	=> 'Board Index Permissions'

));

?>
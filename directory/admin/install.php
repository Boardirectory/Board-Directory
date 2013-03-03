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

/**
 * @ignore
 */
define('UMIL_AUTO', true);
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './../../board/';
$directory_root_path = './../';
$phpEx = substr(strrchr(__FILE__, '.'), 1);

include($phpbb_root_path . 'common.' . $phpEx);
$user->session_begin();
$auth->acl($user->data);
$user->setup();

// We only allow a founder install this MOD
if ($user->data['user_type'] != USER_FOUNDER)
{
    if ($user->data['user_id'] == ANONYMOUS)
    {
        login_box(NULL, 'LOGIN');
    }

    trigger_error('NOT_AUTHORISED');
}
if (!file_exists($phpbb_root_path . 'umil/umil_auto.' . $phpEx))
{
	trigger_error('Please download the latest UMIL (Unified MOD Install Library) from <a href="http://www.phpbb.com/mods/umil/">phpbb.com/mods/umil/</a>.', E_USER_WARNING);
}

// The name of the mod to be displayed during installation.
$mod_name = 'Board Indexing Script';

/*
* The name of the config variable which will hold the currently installed version
* UMIL will handle checking, setting, and updating the version itself.
*/
$version_config_name = 'bis_version';

@include $directory_root_path . '/includes/constants.php';
if (!defined('BIS_BOARDS_TABLE')) {
	trigger_error('Make sure you have uploaded all files before you install the script. ', E_USER_WARNING);
}



/*
* Optionally we may specify our own logo image to show in the upper corner instead of the default logo.
* $phpbb_root_path will get prepended to the path specified
* Image height should be 50px to prevent cut-off or stretching.
*/
$logo_img = 'styles/prosilver/imageset/site_logo.gif';

/*
* The array of versions and actions within each.
* You do not need to order it a specific way (it will be sorted automatically), however, you must enter every version, even if no actions are done for it.
*
* You must use correct version numbering.  Unless you know exactly what you can use, only use X.X.X (replacing X with an integer).
* The version numbering must otherwise be compatible with the version_compare function - http://php.net/manual/en/function.version-compare.php
*/

$versions = array(
	'3.1.0' => array(
		'permission_add' => array(
			array('a_bisauth', 1),
			
			array('bis_submit_board', 1),
			array('bis_view_boards', 1),
			array('bis_view_dir', 1),
			array('bis_own_board', 1),
			
			array('bis_view_dma', 1),
			array('bis_approve_board', 1),
			array('bis_delete_boards', 1),
			array('bis_restore_board', 1),
			array('bis_view_trashcan', 1),
			array('bis_edit_board', 1),
			array('bis_manage_occupy', 1),
			array('bis_da', 1),
			array('bis_view_board_data_all', 1),
		),
		
		'table_add' => array(
			array(BIS_BOARDS_TABLE, array(
				'COLUMNS' => array(
					'board_id'						=> array('UINT', NULL, 'auto_increment'),
					'submittor_id'					=> array('UINT', 0),
					'submittor_ip'					=> array('VCHAR:40', NULL),
					'owner_id'						=> array('UINT', NULL),
					'board_approved'				=> array('BOOL', 0),
					'board_deleted'					=> array('BOOL', 0),
					'board_owner'					=> array('VCHAR:255', NULL),
					
					'board_name'					=> array('VCHAR:100', NULL),
					'board_category'				=> array('VCHAR:255', NULL),
					'board_abr'						=> array('VCHAR:255', NULL),
					'board_url'						=> array('VCHAR:255', NULL),
					'home_url'						=> array('VCHAR:255', NULL),
					'board_slug'					=> array('VCHAR:255', NULL),
					'board_slogan'					=> array('VCHAR:255', NULL),
					'board_description'				=> array('MTEXT', NULL),
					'board_logo_url'				=> array('VCHAR:255', NULL),
					'board_software'				=> array('VCHAR:255', NULL),
					'board_creation_stamp'			=> array('TIMESTAMP', 0),
					'domain_registery_date_stamp'	=> array('TIMESTAMP', 0),
					'board_index_date_stamp'		=> array('TIMESTAMP', 0),
					
					'board_total_posts'				=> array('INT:9', NULL),
					'board_total_topics'			=> array('INT:9', NULL),
					'board_total_members'			=> array('INT:9', NULL),
					
					'alexa_rank'					=> array('INT:7', 0),
					'google_page_rank'				=> array('INT:2', 0),
				),
				'PRIMARY_KEY'	=> 'board_id',
			)),
			array(BIS_BOARD_SOFTWARES_TABLE, array(
				'COLUMNS' => array(
					'software_id'		=> array('UINT', NULL, 'auto_increment'),
					'software_lang'		=> array('VCHAR:255', NULL),
					'software_versions'	=> array('TEXT', NULL),
				),
				'PRIMARY_KEY'	=> 'software_id',
			)),
			array(BIS_CATEGORIES_TABLE, array(
				'COLUMNS' => array(
					'category_id'		=> array('UINT', NULL, 'auto_increment'),
					'category_lang'		=> array('VCHAR:255', NULL),
				),
				'PRIMARY_KEY'	=> 'category_id',
			)),
		),
	),
);
// Include the UMIL Auto file, it handles the rest
include($phpbb_root_path . 'umil/umil_auto.' . $phpEx);
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

if (!defined('IN_PHPBB'))
{
	exit;
}
switch($directory->mode) {
	case 'fields';
		die("NOT YET IMPLEMENTED");
		$bis->buildCategories();
		foreach($bis->categories as $id => $category) {
				$template->assign_block_vars('bis_categories', array(
				'NAME'	=> $category,
				'ID'	=> $id,
			));
		}
		$template->set_filenames(array(
			'body' => '/bis/bis_dir_admin_fields.html')
		);
		break;
	default;
		$directory->mode = 'index';
		/* Set page body */
		$template->set_filenames(array(
			'body' => '/bis/bis_dir_admin_index.html')
		);
	break;
}
<?php
/**
 *
 * @author Jeroen Bollen jbollensb@gmail.com
 * @package
 * @version $Id$
 * @copyright (c) 2012 Jeroen Bollen
 * @license http://opensource.org/licenses/gpl-3.0.html GNU Public License
 *
 */

 if (!defined('IN_PHPBB'))
{
	exit;
}
switch($directory->mode)
{
	case 'new';
		
		if(isset($_POST['submit']))
		{
			/* New board submitted, get data */
			$board->getDataNew();
			
			/* Validate Fields */
			$errors = $board->validateData('user_submit');
			
			/* Check for errors */
			if($errors) {
				foreach($errors as $data => $type)
				{
					$template->assign_block_vars('bis_submit_errors', array(
						'ERROR_MESSAGE'	=> sprintf($user->lang[$type], $user->lang[strtoupper('bis_field_' . $data)]),
					));
				}
			}
			elseif(!$board->isUnique())
			{
				$template->assign_block_vars('bis_submit_errors', array(
					'ERROR_MESSAGE'	=> $user->lang['BIS_BOARD_DATA_ERROR_COPY'],
				));
			}
			/* He didn't pass all our "test", so we send the template all values he entered */
			foreach($board->data as $key => $value)
			{
				$template->assign_var(strtoupper('bis_field_' . $key), $value);
			}
		}
		/* Template Stuff */
		$template->set_filenames(array(
			'body' => '/bis/bis_dir_submit_new.html')
		);		
		$template->assign_vars(array(
			'S_MODE'	=> 'submit_new',
			'S_ACTION'	=> append_sid("{$phpbb_root_path}dir.$phpEx", array('area' => $directory->area, 'mode' => $directory->mode)),
		));
		$bis->buildCategories();
		foreach($bis->categories as $id => $category) {
				$template->assign_block_vars('bis_categories', array(
				'L_NAME'	=> $user->lang['BIS_CATEGORY_' . $category],
				'ID'		=> $id,
			));
		}
	break;
	
	/* Index Page */
	default;
		$directory->mode = 'index';
		/* Set page body */
		$template->set_filenames(array(
			'body' => '/bis/bis_dir_submit_index.html')
		);
	break;
}
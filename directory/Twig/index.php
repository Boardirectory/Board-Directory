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
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : '../board/';
$directory_root_path = './';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);
include_once($directory_root_path . 'classes/directory.php');
include_once($directory_root_path . 'includes/constants.php');

// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup();

$directory = new BISDirectory();

$directory->user->add_lang('common');

if(!$auth->acl_get('bis_view_dir'))
{
	trigger_error('NOT_AUTHORISED');
}


/* Get location */
$directory->area = request_var('area', '', true);
$directory->mode = request_var('mode', '', true);
$action = request_var('action', '', true);
$id = request_var('id', 0);

/* Check if the user owns any boards */
if($auth->acl_get('bis_own_board'))
{
	$sql = "SELECT board_id, owner_id FROM " . BIS_BOARDS_TABLE . " WHERE owner_id = '{$user->data['user_id']}' LIMIT 0,1";
	$result = $db->sql_query($sql);
	while($row = $db->sql_fetchrow($result))
	{
		$owned_boards[$row['board_id']] = $row;
	}
	if($owned_boards)
	{
		$directory->tabs['bpp']['visible'] = true;
	}
}

if(!$directory->area)
{
	/* Seems like we don't have an area set. */
	$directory->area = 'submit';
}
if(!$directory->locationPermissions()) trigger_error('NOT_AUTHORISED');


if(file_exists("{$phpbb_root_path}bis/dir/area_$directory->area.$phpEx")) {
	include "{$phpbb_root_path}bis/dir/area_$directory->area.$phpEx";
} else {
	$message = $user->lang['BIS_AREA_INVALID'];
	$message .= '<br/><br/>' . sprintf($user->lang['BIS_RETURN_DIR'], '<a href="' . append_sid("{$phpbb_root_path}dir.$phpEx") . '">', '</a>');
	$message .= '<br/><br/>' . sprintf($user->lang['RETURN_INDEX'], '<a href="' . append_sid("{$phpbb_root_path}index.$phpEx") . '">', '</a>');
	trigger_error($message);	
}

$directory->page_title = $user->lang[$directory->mode] . ' &harr; ' . $directory->page_title;
$directory->generate_tabs();
page_header($directory->page_title, false);
page_footer();

/*	break;
	case 'admin';
		if(file_exists("{$phpbb_root_path}bis/dir/area_$directory->area.$phpEx")) {
			include "{$phpbb_root_path}bis/dir/area_$directory->area.$phpEx";
			$area_handled = true;
		}
	break;
	
	case 'moderate'; 
		if(!$auth->acl_get('m_view_moderate_area'))
		{
			/* We aren't authorised... *
			$message = $user->lang['NOT_AUTHORISED'];
			$message .= '<br/><br/>' . sprintf($user->lang['BCP_RETURN_HOME'], '<a href="' . append_sid("{$phpbb_root_path}bcp.$phpEx") . '">', '</a>');
			$message .= '<br/><br/>' . sprintf($user->lang['RETURN_INDEX'], '<a href="' . append_sid("{$phpbb_root_path}index.$phpEx") . '">', '</a>');
			trigger_error($message);
		}

		switch($directory->mode)
		{
			/* Approval Page *
			case 'approve';
				if(!$auth->acl_get('m_approve_board'))
				{
					/* We aren't authorised... *
					$message = $user->lang['NOT_AUTHORISED'];
					$message .= '<br/><br/>' . sprintf($user->lang['BCP_RETURN_HOME'], '<a href="' . append_sid("{$phpbb_root_path}bcp.$phpEx") . '">', '</a>');
					$message .= '<br/><br/>' . sprintf($user->lang['RETURN_INDEX'], '<a href="' . append_sid("{$phpbb_root_path}index.$phpEx") . '">', '</a>');
					trigger_error($message);
				}
				if(!$board->check_todo($id, $user->data['user_id'], 'approve'))
				{
					/* he didn't add it to his to-do *
					$message = $user->lang['BCP_NOT_ADDED_TODO'];
					$message .= '<br/><br/>' . sprintf($user->lang['BCP_RETURN_HOME'], '<a href="' . append_sid("{$phpbb_root_path}bcp.$phpEx") . '">', '</a>');
					$message .= '<br/><br/>' . sprintf($user->lang['RETURN_INDEX'], '<a href="' . append_sid("{$phpbb_root_path}index.$phpEx") . '">', '</a>');
					trigger_error($message);
				}
			case 'edit';
				if($directory->mode == "edit")
				{
					if(!$auth->acl_get('m_edit_board'))
					{
						/* We aren't authorised... *
						$message = $user->lang['NOT_AUTHORISED'];
						$message .= '<br/><br/>' . sprintf($user->lang['BCP_RETURN_HOME'], '<a href="' . append_sid("{$phpbb_root_path}bcp.$phpEx") . '">', '</a>');
						$message .= '<br/><br/>' . sprintf($user->lang['RETURN_INDEX'], '<a href="' . append_sid("{$phpbb_root_path}index.$phpEx") . '">', '</a>');
						trigger_error($message);
					}
					if(!$board->check_todo($id, $user->data['user_id'], 'edit'))
					{
						/* he didn't add it to his to-do *
						$message = $user->lang['BCP_NOT_ADDED_TODO'];
						$message .= '<br/><br/>' . sprintf($user->lang['BCP_RETURN_HOME'], '<a href="' . append_sid("{$phpbb_root_path}bcp.$phpEx") . '">', '</a>');
						$message .= '<br/><br/>' . sprintf($user->lang['RETURN_INDEX'], '<a href="' . append_sid("{$phpbb_root_path}index.$phpEx") . '">', '</a>');
						trigger_error($message);
					}
				}
				/* We are authorized. *
				$template->set_filenames(array(
					'body' => 'bcp_edit_board.html')
				);
				
				/* Get our board data *
				if(!$board->generate_data($id))
				{
					meta_refresh(3, append_sid("{$phpbb_root_path}bcp.$phpEx", array('area' => 'moderate')));
					$message = $user->lang['BCP_BOARD_NOT_EXIST'];
					$message .= '<br/><br/>' . sprintf($user->lang['BCP_RETURN_PREVIOUS_PAGE'], '<a href="' . append_sid("{$phpbb_root_path}bcp.$phpEx", array('area' => 'moderate')) . '">', '</a>');
					trigger_error($message);
				}
				$board_data = $board->data;
				if($_POST['submit'])
				{
					$old_board_data = $board_data;
					/* User is done! Lets get the fields and validate them*				
					if($directory->mode == "approve")
					{
						$board->get_fields('mod_approve');
						$errors = $board->validate_fields('mod_approve');
					}
					elseif($directory->mode == "edit")
					{
						$board->get_fields('mod_edit');
						$errors = $board->validate_fields('mod_edit');
						
					}
					
					/* Well, that was a lot of work already. ;) *
					/* Check for errors *
					if($errors === true)
					{
						/* We got an error, but a critical one... D: *
						add_log('critical', 'BD_LOG_FAIL_GET_CHECK_VALUES');
						trigger_error($user->lang['BD_ERROR_FATAL'], E_USER_ERROR);
					}
					elseif($errors)
					{
						/* There were some errors in the user's submitted values. *
						/* Lets trigger them *
						foreach($errors as $error)
						{
							$template->assign_block_vars('errors', array(
								'ERROR_MESSAGE'	=> $error,
							));
						}
					}
					else
					{						
						/* OMG - The user passed all our test! *
						/* Now the hardest part, updating the board. *
						if($directory->mode == "approve")
						{
							$board->data['approved'] = true;
						}
						
						if(((int) $old_board_data['board_total_posts'] !== (int) $board_data['board_total_posts']) || ((int) $old_board_data['board_total_topics'] !== (int) $board_data['board_total_topics']) || ((int) $old_board_data['board_total_members'] !== (int) $board_data['board_total_members']))
						{
							$board->updating = true;
						}
						
						$options = array();
						
						if($old_board_data['board_name'] !== (int) $board_data['board_name'])
						{
							$options['update_promo_title'] = true;
						}
						
						if($board->update($options) === false)
						{
							add_log('critical', 'BD_LOG_FAIL_UPDATING');
							trigger_error($user->lang['BD_ERROR_FATAL'], E_USER_ERROR);
						}
						/* Done! ;) *
						/* Now we've to remove the to-do. *
						$board->remove_todo(array($board->data['board_id']), $user->data['user_id']);
						
						if($directory->mode == "edit")
						{
							$message = $user->lang['BCP_BOARD_EDITED'];
							$message .= '<br/><br/>' . sprintf($user->lang['BCP_RETURN_BCP_MODERATE_HOME'], '<a href="' . append_sid("{$phpbb_root_path}bcp.$phpEx", array('area' => 'moderate')) . '">', '</a>');
							$message .= '<br/><br/>' . sprintf($user->lang['RETURN_INDEX'], '<a href="' . append_sid("{$phpbb_root_path}index.$phpEx") . '">', '</a>');
							trigger_error($message);
						}
						elseif($directory->mode == "approve")
						{
							/* Promo Topic... *
							$forum_id = array_search($board_data['board_category'], $settings['categories']);
							$promo_topic_url = $board->create_promo($forum_id);

							$sql = "SELECT user_lang as owner_lang, username as board_owner FROM " . USERS_TABLE . " WHERE user_id = " . $board->data['owner_id'];
							$result = $db->sql_query($sql);
							$user_pm_data = $db->sql_fetchrow($result);
							$sql = "SELECT user_lang, username FROM " . USERS_TABLE . " WHERE user_id = " . $board->data['user_id'];
							$result = $db->sql_query($sql);
							$user_pm_data += $db->sql_fetchrow($result);
							
							require_once($phpbb_root_path . 'includes/functions_privmsgs.' . $phpEx);
							$data = array( 
								'from_user_id'      => $settings['board_bot']['user_id'],
								'from_username'     => $settings['board_bot']['username'],
								'icon_id'           => 0,
								'from_user_ip'      => '0',
								 
								'enable_bbcode'     => true,
								'enable_smilies'    => true,
								'enable_urls'       => true,
								'enable_sig'        => true,
							);
							if($board->data['owner_id'] != $board->data['user_id'])
							{
								if($board->data['owner_id'])
								{
									/* Owner PM *
									$uid = $bitfield = $options = ''; 
									$pm = utf8_normalize_nfc(file_get_contents($phpbb_root_path . 'language/' . $user_pm_data['owner_lang'] . '/mods/PM/board_approved_owner'));
									$pm = str_replace('{BOARD_OWNER}', $user_pm_data['board_owner'], $pm);
									$pm = str_replace('{USERNAME}', $user_pm_data['username'], $pm);
									$pm = str_replace('{BOARD_NAME}', $board->data['board_name'], $pm);
									$pm = str_replace('{BOARD_URL}', $board->data['sub_board_url'], $pm);
									$pm = str_replace('{PROMO_TOPIC_URL}', $promo_topic_url, $pm);
									generate_text_for_storage($pm, $uid, $bitfield, $options, true, true, true);

									
									$data['address_list'] = array ('u' => array($board->data['owner_id'] => 'to'));
									$data['message']  =	$pm;
									$data['bbcode_bitfield']  =	$bitfield;
									$data['bbcode_uid']  =	$uid;
									submit_pm('post', 'Board Approved', $data, false);
								}
								
								/* Submitter PM *
								$uid = $bitfield = $options = ''; 
								$pm = utf8_normalize_nfc(file_get_contents($phpbb_root_path . 'language/' . $user_pm_data['user_lang'] . '/mods/PM/board_approved_user'));
								$pm = str_replace('{BOARD_OWNER}', $user_pm_data['board_owner'], $pm);
								$pm = str_replace('{USERNAME}', $user_pm_data['username'], $pm);
								$pm = str_replace('{BOARD_NAME}', $board->data['board_name'], $pm);
								$pm = str_replace('{BOARD_URL}', $board->data['sub_board_url'], $pm);
								$pm = str_replace('{PROMO_TOPIC_URL}', $promo_topic_url, $pm);
								generate_text_for_storage($pm, $uid, $bitfield, $options, true, true, true);
								
								$data['address_list'] = array ('u' => array($board->data['user_id'] => 'to'));
								$data['message']  = $pm;
								$data['bbcode_bitfield']  =	$bitfield;
								$data['bbcode_uid']  =	$uid;
								submit_pm('post', 'Board Approved', $data, false);
							}
							else
							{
								$uid = $bitfield = $options = ''; 
								$pm = utf8_normalize_nfc(file_get_contents($phpbb_root_path . 'language/' . $user_pm_data['user_lang'] . '/mods/PM/board_approved_both'));
								$pm = str_replace('{BOARD_OWNER}', $user_pm_data['board_owner'], $pm);
								$pm = str_replace('{USERNAME}', $user_pm_data['username'], $pm);
								$pm = str_replace('{BOARD_NAME}', $board->data['board_name'], $pm);
								$pm = str_replace('{BOARD_URL}', $board->data['sub_board_url'], $pm);
								$pm = str_replace('{PROMO_TOPIC_URL}', $promo_topic_url, $pm);
								generate_text_for_storage($pm, $uid, $bitfield, $options, true, true, true);

								$data['address_list'] = array ('u' => array($board->data['user_id'] => 'to'));
								$data['message']  = $pm;
								$data['bbcode_bitfield']  =	$bitfield;
								$data['bbcode_uid']  =	$uid;
								submit_pm('post', 'Board Approved', $data, false);
							}
							
							$message = $user->lang['BCP_BOARD_APPROVED'];
							$message .= '<br/><br/>' . sprintf($user->lang['BCP_RETURN_BCP_MODERATE_HOME'], '<a href="' . append_sid("{$phpbb_root_path}bcp.$phpEx", array('area' => 'moderate')) . '">', '</a>');
							$message .= '<br/><br/>' . sprintf($user->lang['RETURN_INDEX'], '<a href="' . append_sid("{$phpbb_root_path}index.$phpEx") . '">', '</a>');
							trigger_error($message);
						}
					}
				}
				
				/* Get it again, if the user hit submit some modifications may have been done to the data *
				$board_data = $board->data;
				$template->assign_vars(array(
					'S_MODE'			=> ($directory->mode == "approve") ? 'mod_approve' : 'mod_edit',
					'S_ACTION'			=> append_sid("{$phpbb_root_path}bcp.$phpEx", array('area' => $directory->area, 'mode' => $directory->mode, 'id' => $id)),
					'S_ACTION_REJECT'	=> ($directory->mode == "approve") ? append_sid("{$phpbb_root_path}bcp.$phpEx", array('area' => $directory->area, 'mode' => "reject", 'id' => $id)) : NULL,
					'S_ACTION_DELETE'	=> ($directory->mode == "edit") ? append_sid("{$phpbb_root_path}bcp.$phpEx", array('area' => $directory->area, 'mode' => "delete", 'id' => $id)) : NULL,
				));
				
				$directory->tabs[$directory->area]['children'][$directory->mode]['visible'] = true;

				/* Give the template the board data. *
				foreach($board_data as $key => $value)
				{
					$template->assign_var(strtoupper($key), $value);
				}
				
				/* Generate the list boxes. *
				$board->list_options();
			break;
			
			case "reject";
				if(!$auth->acl_get('m_approve_board'))
				{
					/* We aren't authorised... *
					$message = $user->lang['NOT_AUTHORISED'];
					$message .= '<br/><br/>' . sprintf($user->lang['BCP_RETURN_HOME'], '<a href="' . append_sid("{$phpbb_root_path}bcp.$phpEx") . '">', '</a>');
					$message .= '<br/><br/>' . sprintf($user->lang['RETURN_INDEX'], '<a href="' . append_sid("{$phpbb_root_path}index.$phpEx") . '">', '</a>');
					trigger_error($message);
				}
				
				if(!$board->check_todo($id, $user->data['user_id'], 'approve'))
				{
					/* he didn't add it to his to-do *
					$message = $user->lang['BCP_NOT_ADDED_TODO'];
					$message .= '<br/><br/>' . sprintf($user->lang['BCP_RETURN_HOME'], '<a href="' . append_sid("{$phpbb_root_path}bcp.$phpEx") . '">', '</a>');
					$message .= '<br/><br/>' . sprintf($user->lang['RETURN_INDEX'], '<a href="' . append_sid("{$phpbb_root_path}index.$phpEx") . '">', '</a>');
					trigger_error($message);
				}
				
				// Check confirm
				if(confirm_box(true))
				{

					$pm = request_var("pm", "", true);
					if(!$pm)
					{
						$message = $user->lang['BCP_NOT_REJECTED'];
						$message .= '<br/><br/>' . sprintf($user->lang['BCP_RETURN_HOME'], '<a href="' . append_sid("{$phpbb_root_path}bcp.$phpEx") . '">', '</a>');
						$message .= '<br/><br/>' . sprintf($user->lang['RETURN_INDEX'], '<a href="' . append_sid("{$phpbb_root_path}index.$phpEx") . '">', '</a>');
						trigger_error($message);
					}
					else
					{
						if(!$board->generate_data($id))
						{
							meta_refresh(3, append_sid("{$phpbb_root_path}bcp.$phpEx", array('area' => 'moderate')));
							$message = $user->lang['BCP_BOARD_NOT_EXIST'];
							$message .= '<br/><br/>' . sprintf($user->lang['BCP_RETURN_PREVIOUS_PAGE'], '<a href="' . append_sid("{$phpbb_root_path}bcp.$phpEx", array('area' => 'moderate')) . '">', '</a>');
							trigger_error($message);
						}
						
						require_once($phpbb_root_path . 'includes/functions_privmsgs.' . $phpEx);
						$uid = $bitfield = $options = ''; 
						generate_text_for_storage($pm, $uid, $bitfield, $options, true, true, true);

						$data = array( 
							'from_user_id'		=> $settings['board_bot']['user_id'],
							'from_username'		=> $settings['board_bot']['username'],
							'icon_id'			=> 0,
							'from_user_ip'		=> '0',				 
							'enable_bbcode'		=> true,
							'enable_smilies'	=> true,
							'enable_urls'		=> true,
							'enable_sig'		=> true,
							'address_list'		=> array ('u' => array($board->data['user_id'] => 'to')),
							'message'			=> $pm,
							'bbcode_bitfield'	=> $bitfield,
							'bbcode_uid'		=> $uid,
						);
						submit_pm('post', 'Board Rejected', $data, false);
						$board->delete($id);
						meta_refresh(7, append_sid("{$phpbb_root_path}bcp.$phpEx", array('area' => 'moderate')));
						$message = $user->lang['BCP_REJECTED'];
						$message .= '<br/><br/>' . sprintf($user->lang['BCP_RETURN_HOME'], '<a href="' . append_sid("{$phpbb_root_path}bcp.$phpEx") . '">', '</a>');
						$message .= '<br/><br/>' . sprintf($user->lang['RETURN_INDEX'], '<a href="' . append_sid("{$phpbb_root_path}index.$phpEx") . '">', '</a>');
						trigger_error($message);
					}
				}
				else
				{
					/* Get our board data *
					if(!$board->generate_data($id))
					{
						meta_refresh(3, append_sid("{$phpbb_root_path}bcp.$phpEx", array('area' => 'moderate')));
						$message = $user->lang['BCP_BOARD_NOT_EXIST'];
						$message .= '<br/><br/>' . sprintf($user->lang['BCP_RETURN_PREVIOUS_PAGE'], '<a href="' . append_sid("{$phpbb_root_path}bcp.$phpEx", array('area' => 'moderate')) . '">', '</a>');
						trigger_error($message);
					}
					
					$directory->tabs[$directory->area]['children'][$directory->mode]['visible'] = true;

					$pm = request_var("pm", "", true);
					if(!$pm)
					{
						$user_pm_data = array();
						$sql = "SELECT username FROM " . USERS_TABLE . " WHERE user_id = " . $board->data['user_id'];
						$result = $db->sql_query($sql);
						$user_pm_data += $db->sql_fetchrow($result);
						
						$pm = utf8_normalize_nfc(file_get_contents($phpbb_root_path . 'includes/board_directory/PM/board_rejected'));
						$pm = str_replace('{USERNAME}', $user_pm_data['username'], $pm);
						$pm = str_replace('{BOARD_NAME}', $board->data['board_name'], $pm);
						$pm = str_replace('{BOARD_URL}', $board->data['sub_board_url'], $pm);

						$template->set_filenames(array(
							'body' => 'bcp_reject_board.html')
						);
						
						$template->assign_var("PM", $pm);
						
						$directory->page_title = $directory->page_title . ' &harr; ' . $user->lang['BCP_REJECT_BOARD_TITLE'];
						$directory->generate_tabs();
						page_header($directory->page_title, false);
						page_footer();
					}
					else
					{
						$s_hidden_fields = build_hidden_fields(array(
							'submit'    => true,
							'id'		=> $id,
							'pm'		=> $pm,
							)
						);
						// Display confirm box
						confirm_box(false, $user->lang['BCP_CONFIRM_REJECT_BOARD'], $s_hidden_fields);
					}
					
				}
				meta_refresh(3, append_sid("{$phpbb_root_path}bcp.$phpEx", array('area' => 'moderate')));
				$message = $user->lang['BCP_NOT_REJECTED'];
				$message .= '<br/><br/>' . sprintf($user->lang['BCP_RETURN_HOME'], '<a href="' . append_sid("{$phpbb_root_path}bcp.$phpEx") . '">', '</a>');
				$message .= '<br/><br/>' . sprintf($user->lang['RETURN_INDEX'], '<a href="' . append_sid("{$phpbb_root_path}index.$phpEx") . '">', '</a>');
				trigger_error($message);
			break;
			
			/* Moderation Home Page *
			default;
				$directory->mode = 'index';
				$directory->page_title = $directory->page_title . ' &harr; ' . $user->lang['BCP_MODERATE_BOARDS_INDEX'];
				
				if($action)
				{
					/* Seems like we chose an action. *
					$boards = request_var('board_list', array(0));
					if(!$boards)
					{
						/* There are no boards selected. *
						$message = $user->lang['BCP_TODO_NO_SELECTED'];
						$message .= '<br/><br/>' . sprintf($user->lang['BCP_RETURN_PREVIOUS_PAGE'], '<a href="' . append_sid("{$phpbb_root_path}bcp.$phpEx", array('area' => 'moderate')) . '">', '</a>');
						trigger_error($message);
					}
					switch($action)
					{
						case 'todo-add';
							/* The user wants to add some boards to his to-do list. *
							$result = $board->add_todo($boards, $user->data['user_id']);
							if($result === 1)
							{
								meta_refresh(3, append_sid("{$phpbb_root_path}bcp.$phpEx", array('area' => 'moderate')));
								$message = $user->lang['BCP_TODO_ADDED_SOME_SELECTED'];
								$message .= '<br/><br/>' . sprintf($user->lang['BCP_RETURN_PREVIOUS_PAGE'], '<a href="' . append_sid("{$phpbb_root_path}bcp.$phpEx", array('area' => 'moderate')) . '">', '</a>');
								trigger_error($message);
							}
							elseif($result === 2)
							{
								meta_refresh(3, append_sid("{$phpbb_root_path}bcp.$phpEx", array('area' => 'moderate')));
								$message = $user->lang['BCP_TODO_ADDED_SELECTED'];
								$message .= '<br/><br/>' . sprintf($user->lang['BCP_RETURN_PREVIOUS_PAGE'], '<a href="' . append_sid("{$phpbb_root_path}bcp.$phpEx", array('area' => 'moderate')) . '">', '</a>');
								trigger_error($message);
							}
							elseif($result === 3)
							{
								meta_refresh(3, append_sid("{$phpbb_root_path}bcp.$phpEx", array('area' => 'moderate')));
								$message = $user->lang['BCP_TODO_NOT_ADDED_SELECTED'];
								$message .= '<br/><br/>' . sprintf($user->lang['BCP_RETURN_PREVIOUS_PAGE'], '<a href="' . append_sid("{$phpbb_root_path}bcp.$phpEx", array('area' => 'moderate')) . '">', '</a>');
								trigger_error($message);
							}
							else
							{
								add_log('critical', 'BD_LOG_FAIL_TODO');
								trigger_error($user->lang['BD_ERROR_FATAL'], E_USER_ERROR);
							}
						break;
						case 'todo-remove';
							/* The user wants to add some boards to his to-do list. *
							$board->remove_todo($boards, $user->data['user_id']);
							meta_refresh(3, append_sid("{$phpbb_root_path}bcp.$phpEx", array('area' => 'moderate')));
							$message = $user->lang['BCP_TODO_REMOVED_SELECTED'];
							$message .= '<br/><br/>' . sprintf($user->lang['BCP_RETURN_PREVIOUS_PAGE'], '<a href="' . append_sid("{$phpbb_root_path}bcp.$phpEx", array('area' => 'moderate')) . '">', '</a>');
							trigger_error($message);
						break;
					}
				}
				bcp_list_boards_moderate();
				
				/* Set out template *
				$template->set_filenames(array(
					'body' => 'bcp_moderate_index.html')
				);

				/* Assign some vars *
				$template->assign_vars(array(
					'S_MODERATE_INDEX'	=> true,
					'S_ACTION'	=> append_sid("{$phpbb_root_path}bcp.$phpEx", array('area' => $directory->area, 'mode' => $directory->mode)),
				));
				
				/* What actions can the user use? *
				if($auth->acl_get('m_approve_board') || $auth->acl_get('m_edit_board'))
				{
					$template->assign_block_vars("actions", array(
						'VALUE'		=> 'todo-add',
						'L_NAME'	=> $user->lang['BCP_TODO_ADD_SELECTED'],
					));
					$template->assign_block_vars("actions", array(
						'VALUE'		=> 'todo-remove',
						'L_NAME'	=> $user->lang['BCP_TODO_REMOVE_SELECTED'],
					));
				}
			break;
		}
	break;
	
	case "bpp";
		if(!$auth->acl_get("u_own_board"))
		{
			trigger_error('NOT_AUTHORISED');
		}
		switch($directory->mode)
		{
			default;
				if(!$id)
				{
					$directory->mode = 'overview';
					$directory->page_title = $directory->page_title . ' &harr; ' . $user->lang['BCP_BPP_OVERVIEW'];
					
					/* Set out template *
					$template->set_filenames(array(
						'body' => 'bcp_bpp_overview.html')
					);
					
					bcp_list_boards_bpp();
				}
				elseif($owned_boards[$id]['bpp_activated'])
				{
					
				}
				elseif($user->data['user_points'] >= $settings['ups']['cost_activate_bpp'])
				{
					// check mode
					if(confirm_box(true))
					{
						substract_points($user->data['user_id'], $settings['ups']['cost_activate_bpp']);
						
						$sql_ary = array(
							'bpp_activated'	=> false,
						);
						
						$sql = 'UPDATE ' . BD_INDEXED_VALUES_TABLE . '
								SET ' . $db->sql_build_array('UPDATE', $sql_ary) . '
								WHERE board_id = ' . (int) $id; 
						$db->sql_query($sql);

						$message = sprintf($user->lang['BCP_BPP_NOT_ACTIVATED_ACTIVATED'], $settings['ups']['cost_activate_bpp'] . ' ' . $config['points_name']);
						$message .= '<br/><br/>' . sprintf($user->lang['BCP_GO_PROMOTION_PANEL'], '<a href="' . append_sid("{$phpbb_root_path}bcp.$phpEx", array('area' => 'bpp', 'id' => $id)) . '">', '</a>');
						$message .= '<br/><br/>' . sprintf($user->lang['BCP_RETURN_PREVIOUS_PAGE'], '<a href="' . append_sid("{$phpbb_root_path}bcp.$phpEx", array('area' => 'bpp')) . '">', '</a>');
						trigger_error($message);
					}
					else
					{
						$s_hidden_fields = build_hidden_fields(array(
								'id'    => $id,
							)
						);
							//display mode
						confirm_box(false, sprintf($user->lang['BCP_BPP_NOT_ACTIVATED_ACTIVATE'], $settings['ups']['cost_activate_bpp'] . ' ' . $config['points_name']), $s_hidden_fields);
					}

					$message = sprintf($user->lang['BCP_BPP_NOT_ACTIVATED'], $settings['ups']['cost_activate_bpp'] . ' ' . $config['points_name']);
					$message .= '<br/><br/>' . sprintf($user->lang['BCP_RETURN_PREVIOUS_PAGE'], '<a href="' . append_sid("{$phpbb_root_path}bcp.$phpEx", array('area' => 'bpp')) . '">', '</a>');
					trigger_error($message);
				}
				else
				{
					$message = sprintf($user->lang['BCP_BPP_NOT_ACTIVATED_NO_POINTS'], $settings['ups']['cost_activate_bpp'] . ' ' . $config['points_name']);
					$message .= '<br/><br/>' . sprintf($user->lang['BCP_RETURN_PREVIOUS_PAGE'], '<a href="' . append_sid("{$phpbb_root_path}bcp.$phpEx", array('area' => 'bpp')) . '">', '</a>');
					trigger_error($message);
				
				}
			break;
		}
	break;
}*/
?>
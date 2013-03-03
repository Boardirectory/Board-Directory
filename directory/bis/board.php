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

 class board {
 	
 	/**
 	 * All board fields in one array
 	 */
 	public $data = array();
 	
 	/**
 	 * Get new user-submitted data from HTML form
 	 */
 	public function getDataNew() {
		global $db;
		/* Get the global values */
		$this->data = array_merge($this->data, array(
			'board_name'				=> trim(strip_tags(request_var('bis_field_board_name', '', true))),
			'board_category'			=> trim(strip_tags(request_var('bis_field_board_category', '', true))),
			'board_abr'					=> trim(strip_tags(request_var('bis_field_board_abr', '', true))),
			'board_url'					=> trim(strip_tags(request_var('bis_field_board_slug', '', true))),
			'home_url'					=> trim(strip_tags(request_var('bis_field_home_url', '', true))),
			'board_slug'				=> trim(strip_tags(request_var('bis_field_board_slug', '', true))),
			'board_slogan'				=> trim(strip_tags(request_var('bis_field_board_slogan', '', true))),
			'board_description'			=> trim(strip_tags(request_var('bis_field_board_description', '', true))),
			'board_logo_url'			=> trim(strip_tags(request_var('bis_field_board_logo', '', true))),
			'board_software'			=> trim(strip_tags(request_var('bis_field_board_software', '', true))),
			'board_software_version'	=> trim(strip_tags(request_var('bis_field_board_software_version', '', true))),
			'board_status'				=> trim(strip_tags(request_var('bis_field_board_status', '', true))),
			'board_creation_datetime'	=> trim(strip_tags(request_var('bis_field_board_creation_datatime', '', true))),
			'domain_registery_date'		=> trim(strip_tags(request_var('bis_field_domain_registery_date', '', true))),
			'board_total_posts'			=> trim(strip_tags(request_var('bis_field_board_total_posts', 0, true))),
			'board_total_topics'		=> trim(strip_tags(request_var('bis_field_board_total_topics', 0, true))),
			'board_total_members'		=> trim(strip_tags(request_var('bis_field_board_total_members', 0, true))),
		));
		return true;
	}
	
	/**
	 * Check if the board wasn't submitted in the past already
	 */
	public function isUnique()
	{
		return true;
		
	}
	/**
	 * Check if all values entered by the user are valid.
	 */
	public function validateData($mode)
	{
		$this->data;
		if(!is_array($this->data))
		{
			/* Critical Error */
			add_log('critical', 'BIS_LOG_ERROR_FATAL_BOARDCLASS');
			global $user;
			trigger_error($user->lang['BIS_ERROR_FATAL'], E_USER_WARNING);
		}
		
		global $settings, $db, $user;
		
		$settings['required_data'] = array(
			'board_name'				=> true,
			'board_category'			=> true,
			'board_url'					=> true,
			'board_slug'				=> true,
			'board_description'			=> true,
			'board_logo_url'			=> true,
			'board_software'			=> true,
			'board_software_version'	=> true,
			'board_status'				=> true,
		);
		$settings['regex'] = array(
			'board_name'				=> '/^.|\s{5,50}$/',
			'board_slug'				=> true,
			'board_description'			=> true,
			'board_logo_url'			=> true,
			'board_software'			=> true,
			'board_software_version'	=> true,
			'board_status'				=> true,
			'board_total_posts'			=> true,
			'board_total_topics'		=> true,
			'board_total_members'		=> true,
		);
		
		foreach($this->data as $key => $value)
		{
			/* Check if required fields arce filled in */
			if($settings['required_data'][$key] === true)
			{
				$errors[$key] = 'BIS_BOARD_DATA_ERROR_REQUIRED';
			}
			/* Check if all fields match their RegEx */
			elseif($settings['regex'][$key] && !preg_match($settings['regex'][$key], $value)) {
				$errors[$key] = 'BIS_BOARD_DATA_ERROR_WRONG_FORMAT';
			}
			if(true)
			return $errors;
			/* Check for dates */
			if(in_array($field, $settings['dates']))
			{
				$time_array = explode('-', $value);
				if(!is_numeric($time_array[0]) || !is_numeric($time_array[1]) || !is_numeric($time_array[2]) || sizeof($time_array) != 3)
				{
					$errors[] = sprintf($user->lang['BD_ERROR_DATE_SYNTAX'], $user->lang[strtoupper($field)]);
				}
				elseif(!checkdate($time_array[1], $time_array[2], $time_array[0]))
				{
					$errors[] = sprintf($user->lang['BD_ERROR_NOT_DATE'], $user->lang[strtoupper($field)]);
				}
				unset($time_array);
			}
				
			/* Check for colours */
			if(in_array($field, $settings['colours'])) {
				$value = str_replace('#', NULL, $value);
				if((strlen($value) != 6 && strlen($value) != 3) || !ctype_xdigit($value))
				{
					$errors[] = sprintf($user->lang['BD_ERROR_NOT_COLOUR'], $user->lang[strtoupper($field)]);
				}
			}
			
			/* Check for URLs */
			if(in_array($field, $settings['urls']))
			{
				if(!filter_var($value, FILTER_VALIDATE_URL))
				{
					$errors[] = sprintf($user->lang['BD_ERROR_NOT_URL'], $user->lang[strtoupper($field)]);
				}
			}
			
			/* Board Software Version */
			if($field == 'board_software_version')
			{
				if(isset($settings['software_versions'][$board_data['board_software']]))
				{
					if(!in_array($board_data[$field], $settings['software_versions'][$board_data['board_software']]) || !$board_data[$field])
					{
						$errors[] = sprintf($user->lang['BD_ERROR_SOFTWARE_VERSION'], $user->lang[strtoupper($field)]);
					}
				}
			}
			
			/* Numeric Fields */
			if(in_array($field, $settings['numbers']) && !is_numeric($value))
			{
				$errors[] = sprintf($user->lang['BD_ERROR_NOT_NUMERIC'], $user->lang[strtoupper($field)]);
			}
			
			/* Field lenghts */
			if($settings['lenghts'][$field])
			{
				if(strlen($value) > $settings['lenghts'][$field])
				{
					$errors[] = sprintf($user->lang['BD_ERROR_LENGHT'], $user->lang[strtoupper($field)]);
				}
			}
			
			/* Users */
			if(in_array($field, $settings['users']))
			{
				$sql = "SELECT user_id
						FROM " . USERS_TABLE . "
						WHERE username_clean = '" . $db->sql_escape(utf8_clean_string($value)) . "'";
				$result = $db->sql_query($sql);
				$row = $db->sql_fetchrow($result);
				if(!$row['user_id'])
				{
					$errors[] = sprintf($user->lang['BD_ERROR_USERNAME'], $user->lang[strtoupper($field)]);
				}
			}
			
			/* Board Status */
			if($field == 'board_status' && !in_array($value, $settings['statuses'])) {
				$errors[] = sprintf($user->lang['BD_ERROR_STATUS'], $user->lang[strtoupper($field)]);
			}
			
			$board_data[$field] = $value;
		}
		
		$this->data = $board_data;
		
		/* Return all occurred errors */
		return $errors;
	}
 }
 
 ?>
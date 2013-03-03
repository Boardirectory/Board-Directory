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

$lang = array_merge($lang, array(
	'BIS'				=> 'Board Index Script',
	'BIS_COPYRIGHT'		=> 'Board Indexing Script',
	'BIS_DIR'			=> 'Board Directory',
	
	'BIS_RETURN_DIR'				=> '%sReturn to the directory index page%s',
	'BIS_AJAX_REQUESTED'			=> 'Proccessing Request',
	'BIS_AREA_INVALID'				=> 'The area you are trying to visit doesn\'t exist. ',
	
	'BIS_FIELD_BOARD_NAME'						=> 'Board Name',
	'BIS_FIELD_BOARD_CATEGORY'					=> 'Board Category',
	'BIS_FIELD_BOARD_CATEGORY_EXPLAIN'			=> 'The category the board fits the best in',
	'BIS_FIELD_BOARD_URL'						=> 'Board URL',
	'BIS_FIELD_BOARD_URL_EXPLAIN'				=> 'The link to the board (e.g. http://boardirectory.org/board/)',
	'BIS_FIELD_BOARD_ABR'						=> 'Board Abbreviation',
	'BIS_FIELD_BOARD_ABR_EXPLAIN'				=> 'The boards abbreviation (e.g. BD)',
	'BIS_FIELD_HOME_URL'						=> 'Website Home URL',
	'BIS_FIELD_HOME_URL_EXPLAIN'				=> 'The URL to the website\'s home page (e.g. http://boardirectory.org)',
	'BIS_FIELD_BOARD_SLUG'						=> 'Board Slug',
	'BIS_FIELD_BOARD_SLUG_EXPLAIN'				=> 'The board\'s slug (a short description of the board, 1~2 sentences)',
	'BIS_FIELD_BOARD_SLOGAN'					=> 'Board Slogan',
	'BIS_FIELD_BOARD_DESCRIPTION'				=> 'Board Description',
	'BIS_FIELD_BOARD_DESCRIPTION_EXPLAIN'		=> 'Description of the board (no BBCode, no HTML)',
	'BIS_FIELD_BOARD_LOGO_URL'					=> 'The URL to the board\'s logo',
	'BIS_FIELD_BOARD_SOFTWARE'					=> 'Board Software',
	'BIS_FIELD_BOARD_SOFTWARE_EXPLAIN'			=> 'The software the board runs on',
	'BIS_FIELD_BOARD_SOFTWARE_VERSION'			=> 'Software Version',
	'BIS_FIELD_BOARD_SOFTWARE_VERSION_EXPLAIN'	=> 'The software version the board runs on (choose --- if you do not know)',
	'BIS_FIELD_BOARD_TOTAL_POSTS'				=> 'Total Posts',
	'BIS_FIELD_BOARD_TOTAL_TOPICS'				=> 'Total Topics',
	'BIS_FIELD_BOARD_TOTAL_MEMBERS'				=> 'Total Members',
	
	'BIS_SOFTWARE_PHPBB'		=> 'phpBB',
	'BIS_SOFTWARE_MYBB'			=> 'MyBB',
	'BIS_SOFTWARE_FREEFORUMS'	=> 'FreeForums.org',
	
	'BIS_CATEGORY_GAMING'			=> 'Gaming',
	'BIS_CATEGORY_OFFTOPIC'			=> 'Off-Topic',
	'BIS_CATEGORY_ENTERTAINEMENT'	=> 'Entertainement / Media',
	
	'BIS_SUBMIT_BOARD'				=> 'Submit Board',
	'BIS_SUBMIT_BOARD_INDEX'		=> 'Submission Index',
	'BIS_SUBMIT_BOARD_NEW'			=> 'Submit New',
	'BIS_SUBMIT_BOARD_TEXT'			=> 'Welcome to the Submittion area of the Directory. Here you can submit any boards to our directory. 
										<br/>
										<br/><strong>Do I need to own a board in order to submit it?</strong>
										<br/>No you don\'t, even if you do not own a board, you can still submit it into our directory. 
										<br/>
										<br/><strong>Are there any requirements a board must met in order to be submitted?</strong>
										<br/>Yes, a board must have at least 1500 posts, there must be posted frequently (at least once a day) and the board statistics must be displayed on the index page. The statistics must be visible for guests. Boards not meeting these requirements will be automatically rejected. 
										<br/>
										<br/><strong>So how do I submit a board?</strong>
										<br/>Just press the "Submit New" link on the left-hand side of the page and fill in all required fields.',
	'BIS_MARKED_REQUIRED'			=> 'Fields marked with an asterisk (*) are required. ',
	
	'BIS_MODERATION_AREA'			=> 'Moderation Panel',
	'BIS_MODERATION_AREA_INDEX'		=> 'Moderation Panel Index',
	'BIS_MODERATION_AREA_APPROVE'	=> 'Approve Board',
	'BIS_MODERATION_AREA_REJECT'	=> 'Reject Board',
	'BIS_MODERATION_AREA_EDIT'		=> 'Edit Board Data',
	
	'BIS_ADMINISTRATION_AREA'			=> 'Directory Administration Area',
	'BIS_ADMINISTRATION_AREA_INDEX'		=> 'Administration Index',
	'BIS_ADMINISTRATION_AREA_FIELDS'	=> 'Customize Fields',
	
	'BIS_CATEGORIES'		=> 'Categories',
	'BIS_NEW_CATEGORY'		=> 'New Category',
	
	'BIS_BOARD_DATA_ERROR_COPY'			=> 'The board you\'re trying to submit has already been indexed',
	'BIS_BOARD_DATA_ERROR_REQUIRED'		=> 'Missing required field: %s',
	'BIS_BOARD_DATA_ERROR_WRONG_FORMAT'	=> 'Field using wrong format: %s',
	
	'BIS_ERROR_FATAL'				=> 'A fatal error as occured. Please contact a board administrator. ',
));
 
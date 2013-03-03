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

class BIS {
	public $categories = array();
	
	/**
	* Build all categories and put them in the BIS::$categories array. No return values.
	*/
	public function buildCategories() {
		global $db;
		
		$result = $db->sql_query('SELECT * FROM ' . BIS_CATEGORIES_TABLE);
		$categories = array();
		while ($row = $db->sql_fetchrow($result))
		{
			$categories[$row['category_id']] = $row['category_lang'];
		}
		$db->sql_freeresult($result);
		$this->categories = $categories;
	}
}
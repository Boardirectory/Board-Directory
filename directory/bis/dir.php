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

if(!defined('IN_PHPBB'))
{
	exit;
}

class BoardDirectory
{
	public $tabs = array(
		'submit' => array(
			'title'		=> 'BIS_SUBMIT_BOARD',
			'visible'	=> true,
			'auth'		=> 'bis_submit_board',
			'children'	=> array(
				'index'		=> array(
					'title'		=> 'BIS_SUBMIT_BOARD_INDEX',
					'visible'	=> true,
					'clickable'	=> true,
				),
				'new'		=> array(
					'title'		=> 'BIS_SUBMIT_BOARD_NEW',
					'visible'	=> true,
					'clickable'	=> true,
				),
			),
		),
		'moderate' => array(
			'title'		=> 'BIS_MODERATION_AREA',
			'visible'	=> true,
			'auth'		=> 'bis_view_dma',
			'children'	=> array(
				'index'		=> array(
					'title'		=> 'BIS_MODERATION_AREA_INDEX',
					'visible'	=> true,
					'clickable'	=> true,
				),
				'approve'		=> array(
					'title'		=> 'BIS_MODERATION_AREA_APPROVE',
				),
				'reject'		=> array(
					'title'		=> 'BIS_MODERATION_AREA_REJECT',
				),
				'edit'		=> array(
					'title'		=> 'BIS_MODERATION_AREA_EDIT',
				),
			),
		),
		'bpp' => array(
			'title'		=> 'BCP_TAB_BPP',
			'visible'	=> false,
			'children'	=> array(
				'overview'		=> array(
					'title'		=> 'BCP_TAB2_BPP_OVERVIEW',
					'visible'	=> true,
					'clickable'	=> true,
				),
			),
		),
		'admin' => array(
			'title'		=> 'BIS_ADMINISTRATION_AREA',
			'visible'	=> true,
			'auth'		=> 'bis_da',
			'children'	=> array(
				'index'		=> array(
					'title'		=> 'BIS_ADMINISTRATION_AREA_INDEX',
					'visible'	=> true,
					'clickable'	=> true,
					'auth'		=> 'bis_da',
				),
				'fields'		=> array(
					'title'		=> 'BIS_ADMINISTRATION_AREA_FIELDS',
					'visible'	=> true,
					'clickable'	=> true,
					'auth'		=> 'bis_da',
				),
			),
		),
	);

	public $page_title;
	public $mode;
	public $area;
	
	public function locationPermissions() {
		global $auth;
		if(!$auth->acl_get($this->tabs[$this->area]['auth']) && $this->tabs[$this->area]['auth']) return false;
		if(!$auth->acl_get($this->tabs[$this->area][$this->mode]['auth']) && $this->tabs[$this->area][$this->mode]['auth']) return false;
		return true;
	}
	
	public function generate_tabs()
	{
		global $template, $user, $phpbb_root_path, $phpEx, $auth;
		$tabs = $this->tabs;
		/* Get all the areas. */
		foreach($tabs as $area => $areaData)	
		{
			/* Do we want the area to be displayed? */
			if($areaData['visible'])
			{
				if($areaData['auth'])
				{
					$permissions = $auth->acl_get($areaData['auth']);
				}
				else
				{
					/* We are authorised */
					$permissions = true;
				}
				
				if($permissions)	/* We only want to display if we've the permissions */
				{
					$template->assign_block_vars('l_block1', array(
						'S_SELECTED'		=> ($this->area == $area) ? true : false,
						'L_TITLE'			=> $user->lang[$areaData['title']],
						'U_TITLE'			=> append_sid("{$phpbb_root_path}dir.$phpEx", array('area' => $area)),
					));
				}
				
				/* Is this our current area? */
				if($area == $this->area)
				{
					/* Get all the modes of the area. */
					foreach($areaData['children'] as $mode => $modeData)
					{
						/* Do we want it to be displayed? */
						if($modeData['visible'])
						{
							if($modeData['auth'])
							{
								$permissions = $auth->acl_get($modeData['auth']);
							}
							else
							{
								/* We are authorised */
								$permissions = true;
							}
							if($permissions)
							{
								$template->assign_block_vars('l_block2', array(
									'S_SELECTED'		=> ($this->mode == $mode) ? true : false,
									'L_TITLE'			=> $user->lang[ $modeData['title'] ],	
									'U_TITLE'			=> ($modeData['clickable']) ? append_sid("{$phpbb_root_path}dir.$phpEx", array('area' => $area, 'mode' => $mode)) : false,
								));
							}
						}
					}
				}
			}
		}
	}
}
?>
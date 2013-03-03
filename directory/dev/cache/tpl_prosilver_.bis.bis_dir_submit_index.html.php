<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('bis/bis_dir_header.html'); ?>
<h2><?php echo ((isset($this->_rootref['L_BIS_SUBMIT_BOARD_INDEX'])) ? $this->_rootref['L_BIS_SUBMIT_BOARD_INDEX'] : ((isset($user->lang['BIS_SUBMIT_BOARD_INDEX'])) ? $user->lang['BIS_SUBMIT_BOARD_INDEX'] : '{ BIS_SUBMIT_BOARD_INDEX }')); ?></h2>
<div class="panel">
	<div class="inner">
		<span class="corners-top">
			<span></span>
		</span>
		<p><?php echo ((isset($this->_rootref['L_BIS_SUBMIT_BOARD_TEXT'])) ? $this->_rootref['L_BIS_SUBMIT_BOARD_TEXT'] : ((isset($user->lang['BIS_SUBMIT_BOARD_TEXT'])) ? $user->lang['BIS_SUBMIT_BOARD_TEXT'] : '{ BIS_SUBMIT_BOARD_TEXT }')); ?></p><br/>
		<span class="corners-bottom">
			<span></span>
		</span>
	</div>
</div>
<?php $this->_tpl_include('bis/bis_dir_footer.html'); ?>
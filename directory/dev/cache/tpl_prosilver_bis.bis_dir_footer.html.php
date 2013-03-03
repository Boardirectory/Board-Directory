<?php if (!defined('IN_PHPBB')) exit; ?><div style="font-size:95%;text-align:center;"><?php echo ((isset($this->_rootref['L_BIS_COPYRIGHT'])) ? $this->_rootref['L_BIS_COPYRIGHT'] : ((isset($user->lang['BIS_COPYRIGHT'])) ? $user->lang['BIS_COPYRIGHT'] : '{ BIS_COPYRIGHT }')); ?></div>
		</div>
	<div class="clear"></div>

	</div>
	<span class="corners-bottom"><span></span></span></div>
</div>

<?php $this->_tpl_include('overall_footer.html'); ?>
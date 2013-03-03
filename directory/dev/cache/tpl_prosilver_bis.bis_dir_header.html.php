<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('overall_header.html'); ?>

<h2><?php echo ((isset($this->_rootref['L_BIS_DIR'])) ? $this->_rootref['L_BIS_DIR'] : ((isset($user->lang['BIS_DIR'])) ? $user->lang['BIS_DIR'] : '{ BIS_DIR }')); ?></h2>

<div id="tabs">
	<ul>
		<?php $_l_block1_count = (isset($this->_tpldata['l_block1'])) ? sizeof($this->_tpldata['l_block1']) : 0;if ($_l_block1_count) {for ($_l_block1_i = 0; $_l_block1_i < $_l_block1_count; ++$_l_block1_i){$_l_block1_val = &$this->_tpldata['l_block1'][$_l_block1_i]; ?>
		<li<?php if ($_l_block1_val['S_SELECTED']) {  ?> class="activetab"<?php } ?>><a href="<?php echo $_l_block1_val['U_TITLE']; ?>"><span><?php echo $_l_block1_val['L_TITLE']; ?></span></a></li>
		<?php }} ?>
	</ul>
</div>

<div class="panel bg3">
	<div class="inner"><span class="corners-top"><span></span></span>

	<div style="width: 100%;">

	<div id="cp-menu">
		<div id="navigation">
			<ul>
				<?php $_l_block2_count = (isset($this->_tpldata['l_block2'])) ? sizeof($this->_tpldata['l_block2']) : 0;if ($_l_block2_count) {for ($_l_block2_i = 0; $_l_block2_i < $_l_block2_count; ++$_l_block2_i){$_l_block2_val = &$this->_tpldata['l_block2'][$_l_block2_i]; if ($_l_block2_val['S_SELECTED']) {  ?>
				<li id="active-subsection"><a <?php if ($_l_block2_val['U_TITLE']) {  ?>href="<?php echo $_l_block2_val['U_TITLE']; ?>"<?php } ?>><span><?php echo $_l_block2_val['L_TITLE']; if ($_l_block2_val['ADD_ITEM']) {  ?> (<?php echo $_l_block2_val['ADD_ITEM']; ?>)<?php } ?></span></a></li>
				<?php } else { ?>
				<li><a <?php if ($_l_block2_val['U_TITLE']) {  ?>href="<?php echo $_l_block2_val['U_TITLE']; ?>"<?php } ?>><span><?php echo $_l_block2_val['L_TITLE']; if ($_l_block2_val['ADD_ITEM']) {  ?> (<?php echo $_l_block2_val['ADD_ITEM']; ?>)<?php } ?></span></a></li>
				<?php } }} ?>
			</ul>
		</div>
	</div>

	<div id="cp-main" class="dir-main">
		<?php if ($this->_rootref['MESSAGE']) {  ?>
		<div class="content">
			<h2><?php echo ((isset($this->_rootref['L_MESSAGE'])) ? $this->_rootref['L_MESSAGE'] : ((isset($user->lang['MESSAGE'])) ? $user->lang['MESSAGE'] : '{ MESSAGE }')); ?></h2>
			<p class="error"><?php echo (isset($this->_rootref['MESSAGE'])) ? $this->_rootref['MESSAGE'] : ''; ?></p>
			<p><?php $_return_links_count = (isset($this->_tpldata['return_links'])) ? sizeof($this->_tpldata['return_links']) : 0;if ($_return_links_count) {for ($_return_links_i = 0; $_return_links_i < $_return_links_count; ++$_return_links_i){$_return_links_val = &$this->_tpldata['return_links'][$_return_links_i]; echo $_return_links_val['MESSAGE_LINK']; ?><br /><br /><?php }} ?></p>
		</div>
		<?php } if ($this->_rootref['CONFIRM_MESSAGE']) {  ?>
			<form id="confirm" method="post" action="<?php echo (isset($this->_rootref['S_CONFIRM_ACTION'])) ? $this->_rootref['S_CONFIRM_ACTION'] : ''; ?>"<?php echo (isset($this->_rootref['S_FORM_ENCTYPE'])) ? $this->_rootref['S_FORM_ENCTYPE'] : ''; ?>>

				<div class="content">
					<h2><?php echo ((isset($this->_rootref['L_PLEASE_CONFIRM'])) ? $this->_rootref['L_PLEASE_CONFIRM'] : ((isset($user->lang['PLEASE_CONFIRM'])) ? $user->lang['PLEASE_CONFIRM'] : '{ PLEASE_CONFIRM }')); ?></h2>
					<p><?php echo (isset($this->_rootref['CONFIRM_MESSAGE'])) ? $this->_rootref['CONFIRM_MESSAGE'] : ''; ?></p>
				
					<fieldset class="submit-buttons">
						<?php echo (isset($this->_rootref['S_HIDDEN_FIELDS'])) ? $this->_rootref['S_HIDDEN_FIELDS'] : ''; ?><input class="button1" type="submit" name="submit" value="<?php echo ((isset($this->_rootref['L_YES'])) ? $this->_rootref['L_YES'] : ((isset($user->lang['YES'])) ? $user->lang['YES'] : '{ YES }')); ?>" />&nbsp; 
						<input class="button2" type="cancel" value="<?php echo ((isset($this->_rootref['L_NO'])) ? $this->_rootref['L_NO'] : ((isset($user->lang['NO'])) ? $user->lang['NO'] : '{ NO }')); ?>" />
					</fieldset>
				</div>

			</form>
		<?php } ?>
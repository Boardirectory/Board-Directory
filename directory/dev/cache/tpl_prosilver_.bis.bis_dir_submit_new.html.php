<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('bis/bis_dir_header.html'); ?>

<form id="bis_dir" method="post" action="<?php echo (isset($this->_rootref['S_ACTION'])) ? $this->_rootref['S_ACTION'] : ''; ?>">
	<h2><?php echo ((isset($this->_rootref['L_BIS_SUBMIT_BOARD'])) ? $this->_rootref['L_BIS_SUBMIT_BOARD'] : ((isset($user->lang['BIS_SUBMIT_BOARD'])) ? $user->lang['BIS_SUBMIT_BOARD'] : '{ BIS_SUBMIT_BOARD }')); ?></h2>
	<div class="panel">
		<div class="inner"><span class="corners-top"><span></span></span>
		<p><?php echo ((isset($this->_rootref['L_BIS_MARKED_REQUIRED'])) ? $this->_rootref['L_BIS_MARKED_REQUIRED'] : ((isset($user->lang['BIS_MARKED_REQUIRED'])) ? $user->lang['BIS_MARKED_REQUIRED'] : '{ BIS_MARKED_REQUIRED }')); ?></p>
			<fieldset>
				<?php $_bis_submit_errors_count = (isset($this->_tpldata['bis_submit_errors'])) ? sizeof($this->_tpldata['bis_submit_errors']) : 0;if ($_bis_submit_errors_count) {for ($_bis_submit_errors_i = 0; $_bis_submit_errors_i < $_bis_submit_errors_count; ++$_bis_submit_errors_i){$_bis_submit_errors_val = &$this->_tpldata['bis_submit_errors'][$_bis_submit_errors_i]; ?><p class="bis_error"><?php echo $_bis_submit_errors_val['ERROR_MESSAGE']; ?></p><?php }} ?>
				<dl>
					<dt><label for="bis_field_board_name"><?php echo ((isset($this->_rootref['L_BIS_FIELD_BOARD_NAME'])) ? $this->_rootref['L_BIS_FIELD_BOARD_NAME'] : ((isset($user->lang['BIS_FIELD_BOARD_NAME'])) ? $user->lang['BIS_FIELD_BOARD_NAME'] : '{ BIS_FIELD_BOARD_NAME }')); ?>: *</label><br/></dt>
					<dd><input type="text" name="bis_field_board_name" required="required" id="bis_field_board_name" maxlength="30" value="<?php echo (isset($this->_rootref['BIS_FIELD_BOARD_NAME'])) ? $this->_rootref['BIS_FIELD_BOARD_NAME'] : ''; ?>" class="inputbox" /></dd>
				</dl>
				<dl>
					<dt><label for="bis_field_board_category"><?php echo ((isset($this->_rootref['L_BIS_FIELD_BOARD_CATEGORY'])) ? $this->_rootref['L_BIS_FIELD_BOARD_CATEGORY'] : ((isset($user->lang['BIS_FIELD_BOARD_CATEGORY'])) ? $user->lang['BIS_FIELD_BOARD_CATEGORY'] : '{ BIS_FIELD_BOARD_CATEGORY }')); ?>: *</label><br/><span><?php echo ((isset($this->_rootref['L_BIS_FIELD_BOARD_CATEGORY_EXPLAIN'])) ? $this->_rootref['L_BIS_FIELD_BOARD_CATEGORY_EXPLAIN'] : ((isset($user->lang['BIS_FIELD_BOARD_CATEGORY_EXPLAIN'])) ? $user->lang['BIS_FIELD_BOARD_CATEGORY_EXPLAIN'] : '{ BIS_FIELD_BOARD_CATEGORY_EXPLAIN }')); ?></span></dt>
					<dd><select name="bis_field_board_category" required="required" id="bis_field_board_category"><?php $_bis_categories_count = (isset($this->_tpldata['bis_categories'])) ? sizeof($this->_tpldata['bis_categories']) : 0;if ($_bis_categories_count) {for ($_bis_categories_i = 0; $_bis_categories_i < $_bis_categories_count; ++$_bis_categories_i){$_bis_categories_val = &$this->_tpldata['bis_categories'][$_bis_categories_i]; ?><option value="<?php echo $_bis_categories_val['ID']; ?>"<?php if ($this->_rootref['BIS_FIELD_BOARD_CATEGORY'] == $_bis_categories_val['ID']) {  ?> selected="selected"<?php } ?>><?php echo $_bis_categories_val['L_NAME']; ?></option><?php }} ?></select></dd>
				</dl>
				<dl>
					<dt><label for="bis_field_board_abr"><?php echo ((isset($this->_rootref['L_BIS_FIELD_BOARD_ABR'])) ? $this->_rootref['L_BIS_FIELD_BOARD_ABR'] : ((isset($user->lang['BIS_FIELD_BOARD_ABR'])) ? $user->lang['BIS_FIELD_BOARD_ABR'] : '{ BIS_FIELD_BOARD_ABR }')); ?>:</label><br/><span><?php echo ((isset($this->_rootref['L_BIS_FIELD_BOARD_ABR_EXPLAIN'])) ? $this->_rootref['L_BIS_FIELD_BOARD_ABR_EXPLAIN'] : ((isset($user->lang['BIS_FIELD_BOARD_ABR_EXPLAIN'])) ? $user->lang['BIS_FIELD_BOARD_ABR_EXPLAIN'] : '{ BIS_FIELD_BOARD_ABR_EXPLAIN }')); ?></span></dt>
					<dd><input type="text" name="bis_field_board_abr"" id="bis_field_board_abr" maxlength="5" value="<?php echo (isset($this->_rootref['BIS_FIELD_BOARD_ABR'])) ? $this->_rootref['BIS_FIELD_BOARD_ABR'] : ''; ?>" class="inputbox" /></dd>
				</dl>
				<dl>
					<dt><label for="bis_field_board_url"><?php echo ((isset($this->_rootref['L_BIS_FIELD_BOARD_URL'])) ? $this->_rootref['L_BIS_FIELD_BOARD_URL'] : ((isset($user->lang['BIS_FIELD_BOARD_URL'])) ? $user->lang['BIS_FIELD_BOARD_URL'] : '{ BIS_FIELD_BOARD_URL }')); ?>: *</label><br/><span><?php echo ((isset($this->_rootref['L_BIS_FIELD_BOARD_URL_EXPLAIN'])) ? $this->_rootref['L_BIS_FIELD_BOARD_URL_EXPLAIN'] : ((isset($user->lang['BIS_FIELD_BOARD_URL_EXPLAIN'])) ? $user->lang['BIS_FIELD_BOARD_URL_EXPLAIN'] : '{ BIS_FIELD_BOARD_URL_EXPLAIN }')); ?></span></dt>
					<dd><input type="url" name="bis_field_board_url" required="required" placeholder="http://" id="bis_field_board_url" maxlength="60" value="<?php echo (isset($this->_rootref['BIS_FIELD_BOARD_URL'])) ? $this->_rootref['BIS_FIELD_BOARD_URL'] : ''; ?>" class="inputbox" /></dd>
				</dl>
				<dl>
					<dt><label for="home_url"><?php echo ((isset($this->_rootref['L_BIS_FIELD_HOME_URL'])) ? $this->_rootref['L_BIS_FIELD_HOME_URL'] : ((isset($user->lang['BIS_FIELD_HOME_URL'])) ? $user->lang['BIS_FIELD_HOME_URL'] : '{ BIS_FIELD_HOME_URL }')); ?>:</label><br/><span><?php echo ((isset($this->_rootref['L_BIS_FIELD_HOME_URL_EXPLAIN'])) ? $this->_rootref['L_BIS_FIELD_HOME_URL_EXPLAIN'] : ((isset($user->lang['BIS_FIELD_HOME_URL_EXPLAIN'])) ? $user->lang['BIS_FIELD_HOME_URL_EXPLAIN'] : '{ BIS_FIELD_HOME_URL_EXPLAIN }')); ?></span></dt>
					<dd><input type="url" name="bis_field_home_url" placeholder="http://" id="bis_field_home_url" maxlength="60" value="<?php echo (isset($this->_rootref['BIS_HOME_URL'])) ? $this->_rootref['BIS_HOME_URL'] : ''; ?>" class="inputbox" /></dd>
				</dl>
				<dl>
					<dt><label for="bis_field_board_slug"><?php echo ((isset($this->_rootref['L_BIS_FIELD_BOARD_SLUG'])) ? $this->_rootref['L_BIS_FIELD_BOARD_SLUG'] : ((isset($user->lang['BIS_FIELD_BOARD_SLUG'])) ? $user->lang['BIS_FIELD_BOARD_SLUG'] : '{ BIS_FIELD_BOARD_SLUG }')); ?>: *</label><br/><span><?php echo ((isset($this->_rootref['L_BIS_FIELD_BOARD_SLUG_EXPLAIN'])) ? $this->_rootref['L_BIS_FIELD_BOARD_SLUG_EXPLAIN'] : ((isset($user->lang['BIS_FIELD_BOARD_SLUG_EXPLAIN'])) ? $user->lang['BIS_FIELD_BOARD_SLUG_EXPLAIN'] : '{ BIS_FIELD_BOARD_SLUG_EXPLAIN }')); ?></span></dt>
					<dd><input type="text" name="bis_field_board_slug" required="required" id="bis_field_board_slug" maxlength="250" value="<?php echo (isset($this->_rootref['BIS_FIELD_BOARD_SLUG'])) ? $this->_rootref['BIS_FIELD_BOARD_SLUG'] : ''; ?>" class="inputbox" /></dd>
				</dl>
				<dl>
					<dt><label for="bis_field_board_slogan"><?php echo ((isset($this->_rootref['L_BIS_FIELD_BOARD_SLOGAN'])) ? $this->_rootref['L_BIS_FIELD_BOARD_SLOGAN'] : ((isset($user->lang['BIS_FIELD_BOARD_SLOGAN'])) ? $user->lang['BIS_FIELD_BOARD_SLOGAN'] : '{ BIS_FIELD_BOARD_SLOGAN }')); ?>:</label><br/></dt>
					<dd><input type="text" name="bis_field_board_slogan" id="bis_field_board_slogan" maxlength="50" value="<?php echo (isset($this->_rootref['BOARD_SLOGAN'])) ? $this->_rootref['BOARD_SLOGAN'] : ''; ?>" class="inputbox" /></dd>
				</dl>
				<dl>
					<dt><label for="bis_field_board_description"><?php echo ((isset($this->_rootref['L_BIS_FIELD_BOARD_DESCRIPTION'])) ? $this->_rootref['L_BIS_FIELD_BOARD_DESCRIPTION'] : ((isset($user->lang['BIS_FIELD_BOARD_DESCRIPTION'])) ? $user->lang['BIS_FIELD_BOARD_DESCRIPTION'] : '{ BIS_FIELD_BOARD_DESCRIPTION }')); ?>: *</label><br/><span><?php echo ((isset($this->_rootref['L_BIS_FIELD_BOARD_DESCRIPTION_EXPLAIN'])) ? $this->_rootref['L_BIS_FIELD_BOARD_DESCRIPTION_EXPLAIN'] : ((isset($user->lang['BIS_FIELD_BOARD_DESCRIPTION_EXPLAIN'])) ? $user->lang['BIS_FIELD_BOARD_DESCRIPTION_EXPLAIN'] : '{ BIS_FIELD_BOARD_DESCRIPTION_EXPLAIN }')); ?></span></dt>
					<dd><textarea name="bis_field_board_description" id="bis_field_board_description" rows="8" style="width:85%;" value="" ><?php echo (isset($this->_rootref['BOARD_DESCRIPTION'])) ? $this->_rootref['BOARD_DESCRIPTION'] : ''; ?></textarea></dd>
				</dl>
				<dl>
					<dt><label for="bis_field_board_logo_url"><?php echo ((isset($this->_rootref['L_BIS_FIELD_BOARD_LOGO_URL'])) ? $this->_rootref['L_BIS_FIELD_BOARD_LOGO_URL'] : ((isset($user->lang['BIS_FIELD_BOARD_LOGO_URL'])) ? $user->lang['BIS_FIELD_BOARD_LOGO_URL'] : '{ BIS_FIELD_BOARD_LOGO_URL }')); ?>: *</label><br/><span></span></dt>
					<dd><input type="url" name="bis_field_board_logo_url" required="required" placeholder="http://" id="bis_field_board_logo_url" maxlength="70" value="<?php echo (isset($this->_rootref['BIS_FIELD_BOARD_LOGO_URL'])) ? $this->_rootref['BIS_FIELD_BOARD_LOGO_URL'] : ''; ?>" class="inputbox" /></dd>
				</dl>
				<dl>
					<dt><label for="bis_field_board_software"><?php echo ((isset($this->_rootref['L_BIS_FIELD_BOARD_SOFTWARE'])) ? $this->_rootref['L_BIS_FIELD_BOARD_SOFTWARE'] : ((isset($user->lang['BIS_FIELD_BOARD_SOFTWARE'])) ? $user->lang['BIS_FIELD_BOARD_SOFTWARE'] : '{ BIS_FIELD_BOARD_SOFTWARE }')); ?>: *</label><br/><span><?php echo ((isset($this->_rootref['L_BIS_FIELD_BOARD_SOFTWARE_EXPLAIN'])) ? $this->_rootref['L_BIS_FIELD_BOARD_SOFTWARE_EXPLAIN'] : ((isset($user->lang['BIS_FIELD_BOARD_SOFTWARE_EXPLAIN'])) ? $user->lang['BIS_FIELD_BOARD_SOFTWARE_EXPLAIN'] : '{ BIS_FIELD_BOARD_SOFTWARE_EXPLAIN }')); ?></span></dt>
					<dd><select name="bis_field_board_software" required="required" id="bis_field_board_software"><?php $_bis_software_count = (isset($this->_tpldata['bis_software'])) ? sizeof($this->_tpldata['bis_software']) : 0;if ($_bis_software_count) {for ($_bis_software_i = 0; $_bis_software_i < $_bis_software_count; ++$_bis_software_i){$_bis_software_val = &$this->_tpldata['bis_software'][$_bis_software_i]; ?><option value="<?php echo $_bis_software_val['ID']; ?>"<?php if ($this->_rootref['BIS_FIELD_BOARD_SOFTWARE'] == $_bis_software_val['ID']) {  ?> selected="selected"<?php } ?>><?php echo $_bis_software_val['L_NAME']; ?></option><?php }} ?></select></dd>
				</dl>
				<dl>
					<dt><label for="bis_field_board_total_posts"><?php echo ((isset($this->_rootref['L_BIS_FIELD_BOARD_TOTAL_POSTS'])) ? $this->_rootref['L_BIS_FIELD_BOARD_TOTAL_POSTS'] : ((isset($user->lang['BIS_FIELD_BOARD_TOTAL_POSTS'])) ? $user->lang['BIS_FIELD_BOARD_TOTAL_POSTS'] : '{ BIS_FIELD_BOARD_TOTAL_POSTS }')); ?>: *</label><br/></dt>
					<dd><input type="number" min="0" name="bis_field_board_total_posts" required="required" id="bis_field_board_total_posts" maxlength="9" value="<?php echo (isset($this->_rootref['BIS_FIELD_BOARD_TOTAL_POSTS'])) ? $this->_rootref['BIS_FIELD_BOARD_TOTAL_POSTS'] : ''; ?>" class="inputbox" /></dd>
				</dl>
				<dl>
					<dt><label for="board_total_topics"><?php echo ((isset($this->_rootref['L_BIS_FIELD_BOARD_TOTAL_TOPICS'])) ? $this->_rootref['L_BIS_FIELD_BOARD_TOTAL_TOPICS'] : ((isset($user->lang['BIS_FIELD_BOARD_TOTAL_TOPICS'])) ? $user->lang['BIS_FIELD_BOARD_TOTAL_TOPICS'] : '{ BIS_FIELD_BOARD_TOTAL_TOPICS }')); ?>: *</label><br/></dt>
					<dd><input type="number" min="0" name="bis_field_board_total_topics" required="required" id="bis_field_board_total_topics" maxlength="7" value="<?php echo (isset($this->_rootref['BIS_FIELD_BOARD_TOTAL_TOPICS'])) ? $this->_rootref['BIS_FIELD_BOARD_TOTAL_TOPICS'] : ''; ?>" class="inputbox" /></dd>
				</dl>
				<dl>
					<dt><label for="board_total_members"><?php echo ((isset($this->_rootref['L_BIS_FIELD_BOARD_TOTAL_MEMBERS'])) ? $this->_rootref['L_BIS_FIELD_BOARD_TOTAL_MEMBERS'] : ((isset($user->lang['BIS_FIELD_BOARD_TOTAL_MEMBERS'])) ? $user->lang['BIS_FIELD_BOARD_TOTAL_MEMBERS'] : '{ BIS_FIELD_BOARD_TOTAL_MEMBERS }')); ?>: *</label><br/></dt>
					<dd><input type="number" min="0" name="bis_field_board_total_members" required="required" id="bis_field_board_total_members" maxlength="8" value="<?php echo (isset($this->_rootref['BIS_FIELD_BOARD_TOTAL_MEMBERS'])) ? $this->_rootref['BIS_FIELD_BOARD_TOTAL_MEMBERS'] : ''; ?>" class="inputbox" /></dd>
				</dl>
			</fieldset>
			<br/>
		<span class="corners-bottom"><span></span></span></div>
	</div>

	<fieldset class="submit-buttons">
		<input type="submit" name="submit" value="<?php echo ((isset($this->_rootref['L_SUBMIT'])) ? $this->_rootref['L_SUBMIT'] : ((isset($user->lang['SUBMIT'])) ? $user->lang['SUBMIT'] : '{ SUBMIT }')); ?>" class="button1" />
	</fieldset>
</form>
<?php $this->_tpl_include('bis/bis_dir_footer.html'); ?>
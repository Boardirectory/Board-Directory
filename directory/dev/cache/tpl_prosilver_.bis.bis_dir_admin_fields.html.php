<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('bis/bis_dir_header.html'); ?>
<h2><?php echo ((isset($this->_rootref['L_BIS_ADMINISTRATION_AREA_FIELDS'])) ? $this->_rootref['L_BIS_ADMINISTRATION_AREA_FIELDS'] : ((isset($user->lang['BIS_ADMINISTRATION_AREA_FIELDS'])) ? $user->lang['BIS_ADMINISTRATION_AREA_FIELDS'] : '{ BIS_ADMINISTRATION_AREA_FIELDS }')); ?></h2>
<div class="panel">
	<div class="inner">
		<span class="corners-top">
			<span></span>
		</span>
		<h4><?php echo ((isset($this->_rootref['L_BIS_CATEGORIES'])) ? $this->_rootref['L_BIS_CATEGORIES'] : ((isset($user->lang['BIS_CATEGORIES'])) ? $user->lang['BIS_CATEGORIES'] : '{ BIS_CATEGORIES }')); ?></h4>
		<div class="bis_fields_categories">
			<?php $_bis_categories_count = (isset($this->_tpldata['bis_categories'])) ? sizeof($this->_tpldata['bis_categories']) : 0;if ($_bis_categories_count) {for ($_bis_categories_i = 0; $_bis_categories_i < $_bis_categories_count; ++$_bis_categories_i){$_bis_categories_val = &$this->_tpldata['bis_categories'][$_bis_categories_i]; ?>
				<div class="bis_dir_admin_fields_category" name="<?php echo $_bis_categories_val['ID']; ?>"><?php echo $_bis_categories_val['NAME']; ?></div>
			<?php }} ?>
			<div class="bis_dir_admin_fields_category"><?php echo ((isset($this->_rootref['L_BIS_NEW_CATEGORY'])) ? $this->_rootref['L_BIS_NEW_CATEGORY'] : ((isset($user->lang['BIS_NEW_CATEGORY'])) ? $user->lang['BIS_NEW_CATEGORY'] : '{ BIS_NEW_CATEGORY }')); ?></div>
		</div>
		<span class="corners-bottom">
			<span></span>
		</span>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
	$('div.bis_dir_admin_fields_category').dblclick(function () { 
		$(this).replaceWith('<input type="text" required="required" class="bis_dir_admin_fields_category" name="' + $(this).attr('name') + '" value="' + $(this).html() + '"/>');
    	$('input.bis_dir_admin_fields_category').select();
    	$('input.bis_dir_admin_fields_category').keypress(function(event) {
    		if(event.which == 13) {
    			$('.AJAXbody').fadeIn(700);
	    		$.ajax({
	  				type: "POST",
					url: "./bis/API/admin_rename_field.php",
					timeout: 15000,
					cache: false,
					data: { type: "category", action: "rename", value: $(this).attr('value'), id: $(this).attr('name') }
				}).done(function(msg) {
	  				var AJAXreturn = msg.split(":");
	  				if(AJAXreturn[0] == 'ERROR') {
						$('input.bis_dir_admin_fields_category').remove();
						$('.AJAXbody').animate({width:'100%', height:'100%', backgroundColor: "#000000", opacity: "1"},500);
						$('input.bis_dir_admin_fields_category').remove();
						$('div.AJAXrequested').remove();
						$('div.AJAXerror').html(AJAXreturn[1]).fadeIn(3000);
	  				} else {
	  					var categories = AJAXreturn[0].split("&");
	  					$('.bis_fields_categories').html("");
	  					categories.forEach(function(element, index, array) {
	  						var categoryData = element.split("-");
	  						categoryData.forEach(function(element, index, array) {
	  							
	  						})
	  					});
	  					$('.bis_ajaxBody').fadeOut(500);
	  				}
				}).fail(function() {
					$('input.bis_dir_admin_fields_category').remove();
					$('div.AJAXrequested').remove();
					$('.AJAXbody').animate({width:'100%', height:'100%', backgroundColor: "#000000", opacity: "1"},500);
					$('input.bis_dir_admin_fields_category').remove();
					$('div.AJAXerror').html("Connection Failed").fadeIn(3000);
				});
			}
    	})
    });
	
});
</script>
<div class="AJAXbody">
	<div class="AJAXrequested"><?php echo ((isset($this->_rootref['L_BIS_AJAX_REQUESTED'])) ? $this->_rootref['L_BIS_AJAX_REQUESTED'] : ((isset($user->lang['BIS_AJAX_REQUESTED'])) ? $user->lang['BIS_AJAX_REQUESTED'] : '{ BIS_AJAX_REQUESTED }')); ?></div>
	<div class="AJAXerror"></div>
</div>
<?php $this->_tpl_include('bis/bis_dir_footer.html'); ?>
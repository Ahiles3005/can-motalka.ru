<?php echo $header; ?>
<div id="content">
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
  <?php if ($error_warning) { ?>
  <div class="warning"><?php echo $error_warning; ?></div>
  <?php } ?>
    <?php if ($success) { ?>
  <div class="success"><?php echo $success; ?></div>
  <?php }  ?>
  <div class="box">
    <div class="heading">
      <h1><img src="view/image/module.png" alt="" /> <?php echo $heading_title; ?></h1>
      <div class="buttons"><a onclick="$('#apply').attr('value', '1'); $('#form').submit();" class="button"><span><?php echo $button_apply; ?></span></a><a onclick="$('#apply').attr('value', '0'); $('#form').submit();" class="button"><span><?php echo $button_save; ?></span></a><a onclick="location = '<?php echo $cancel; ?>';" class="button"><span><?php echo $button_cancel; ?></span></a></div>
    </div>
    <div class="content">
      <form action="<?php echo $action; ?>" method="post" autocomplete="off" enctype="multipart/form-data" id="form">
	  <input type="hidden" name="apply" id="apply" value="0">
        <div class="vtabs">
          <?php $module_row = 1; ?>
          <?php foreach ($modules as $module) { ?>
          <a href="#tab-module-<?php echo $module_row; ?>" modid="<?php echo $module_row; ?>" id="module-<?php echo $module_row; ?>"><?php echo $tab_module . ' ' . $module_row; ?>&nbsp;<img src="view/image/delete.png" alt="" onclick="$('.vtabs a:first').trigger('click'); $('#module-<?php echo $module_row; ?>').remove(); $('#tab-module-<?php echo $module_row; ?>').remove(); return false;" /></a>
          <?php $module_row++; ?>
          <?php } ?>
          <span id="module-add"><?php echo $button_add_module; ?>&nbsp;<img src="view/image/add.png" alt="" onclick="addModule();" /></span> </div>
        <?php $module_row = 1; ?>
        <?php foreach ($modules as $module) { ?>
        <div id="tab-module-<?php echo $module_row; ?>" class="vtabs-content">
          <div id="language-<?php echo $module_row; ?>" class="htabs">
            <?php foreach ($languages as $language) { ?>
            <a href="#tab-language-<?php echo $module_row; ?>-<?php echo $language['language_id']; ?>"><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?></a>
            <?php } ?>
          </div>	  
		    <table class="form">
			<tr style="background:#aaa;">
				<td align="center" colspan="2" style="color:#fff;font-weight:bold;"><?php echo $entry_main_options;?>
				</td>
			</tr>
            <tr>
              <td><?php echo $entry_layout; ?></td>
              <td><select name="reviewer_module[<?php echo $module_row; ?>][layout_id]">
                  <?php foreach ($layouts as $layout) { ?>
                  <?php if ($layout['layout_id'] == $module['layout_id']) { ?>
                  <option value="<?php echo $layout['layout_id']; ?>" selected="selected"><?php echo $layout['name']; ?></option>
                  <?php } else { ?>
                  <option value="<?php echo $layout['layout_id']; ?>"><?php echo $layout['name']; ?></option>
                  <?php } ?>
                  <?php } ?>
                </select></td>
            </tr>
            <tr>
              <td><?php echo $entry_position; ?></td>
              <td><select name="reviewer_module[<?php echo $module_row; ?>][position]">
                  <?php if ($module['position'] == 'content_top') { ?>
                  <option value="content_top" selected="selected"><?php echo $text_content_top; ?></option>
                  <?php } else { ?>
                  <option value="content_top"><?php echo $text_content_top; ?></option>
                  <?php } ?>
                  <?php if ($module['position'] == 'content_bottom') { ?>
                  <option value="content_bottom" selected="selected"><?php echo $text_content_bottom; ?></option>
                  <?php } else { ?>
                  <option value="content_bottom"><?php echo $text_content_bottom; ?></option>
                  <?php } ?>
				  <?php if ($module['position'] == 'column_left') { ?>
                  <option value="column_left" selected="selected"><?php echo $text_column_left; ?></option>
                  <?php } else { ?>
                  <option value="column_left"><?php echo $text_column_left; ?></option>
                  <?php } ?>
				  <?php if ($module['position'] == 'column_right') { ?>
                  <option value="column_right" selected="selected"><?php echo $text_column_right; ?></option>
                  <?php } else { ?>
                  <option value="column_right"><?php echo $text_column_right; ?></option>
                  <?php } ?>
                </select></td>
            </tr>
            <tr>
              <td><?php echo $entry_status; ?></td>
              <td><select name="reviewer_module[<?php echo $module_row; ?>][status]">
                  <?php if ($module['status']) { ?>
                  <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                  <option value="0"><?php echo $text_disabled; ?></option>
                  <?php } else { ?>
                  <option value="1"><?php echo $text_enabled; ?></option>
                  <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                  <?php } ?>
                </select></td>
            </tr>
            <tr>
              <td><?php echo $entry_sort_order; ?></td>
              <td><input type="text" name="reviewer_module[<?php echo $module_row; ?>][sort_order]" value="<?php echo $module['sort_order']; ?>" size="3" /></td>
            </tr>
		    </table>
			<?php foreach ($languages as $language) { ?>
            <div id="tab-language-<?php echo $module_row; ?>-<?php echo $language['language_id']; ?>">
            <table class="form">
				<tr style="background:#aaa;">
					<td align="center" colspan="2" style="color:#fff;font-weight:bold;"><?php echo $entry_scroller_options;?>
					</td>
				</tr>
				<tr>
					<td><?php echo $entry_title; ?></td>
					<td><input name="reviewer_module[<?php echo $module_row; ?>][title][<?php echo $language['language_id']; ?>]" size="40" id="title-<?php echo $module_row; ?>-<?php echo $language['language_id']; ?>" value="<?php echo isset($module['title'][$language['language_id']]) ? $module['title'][$language['language_id']] : ''; ?>"/></td>
              </tr>
            </table>
			</div>
			<?php } ?>
			<table class="form">
			<tr>
				<td><?php echo $entry_show_link?></td>
				<td><input id="yes_show_link" type="radio" name="reviewer_module[<?php echo $module_row; ?>][show_link]" value="1" <?php if(!isset($module['show_link']) || $module['show_link'] == '1') echo " checked='checked'"?>>
					<label for="yes_show_link"><?php echo $text_yes?></label>
					<input id="no_show_link" type="radio" name="reviewer_module[<?php echo $module_row; ?>][show_link]" value="0" <?php if(isset($module['show_link']) && $module['show_link'] == '0') echo " checked='checked'"?>>
					<label for="no_show_link"><?php echo $text_no?></label>
				</td>
			</tr>
			
			<tr>
			  <td><?php echo $entry_source; ?></td>
			  <td class="left"><select name="reviewer_module[<?php echo $module_row; ?>][category_id]" id ="select<?php echo $module_row; ?>">
				<option value="0" <?php if ($module['category_id']=='0') { ?>selected="selected"<?php } ?>><?php echo $text_root; ?></option>
                <?php foreach ($rootcats as $rootcat) { ?>
                <?php if ($rootcat['category_id'] == $module['category_id']) { ?>
                <option value="<?php echo $rootcat['category_id']; ?>" selected="selected"><?php echo $rootcat['name']; ?></option>
                <?php } else { ?>
                <option value="<?php echo $rootcat['category_id']; ?>"><?php echo $rootcat['name']; ?></option>
                <?php } ?>
                <?php } ?>
             </select></td>
			</tr>
			<table class="form" id="catonly<?php echo $module_row; ?>">
			<tr>
			<td><?php echo $entry_manufacturer; ?></td>
			<td class="left"><select name="reviewer_module[<?php echo $module_row; ?>][manufacturer_id]" id ="select<?php echo $module_row; ?>">
				<option value="0" <?php if ($module['manufacturer_id']=='0') { ?>selected="selected"<?php } ?>><?php echo $text_all_manufacturers; ?></option>
                <?php if (isset($manufacturers)){ 
					foreach ($manufacturers as $manufacturer) { ?>
                <?php if ($manufacturer['manufacturer_id'] == $module['manufacturer_id']) { ?>
                <option value="<?php echo $manufacturer['manufacturer_id']; ?>" selected="selected"><?php echo $manufacturer['name']; ?></option>
                <?php } else { ?>
                <option value="<?php echo $manufacturer['manufacturer_id']; ?>"><?php echo $manufacturer['name']; ?></option>
                <?php } ?>
                <?php } ?>
                <?php } ?>
             </select></td>
			</tr>
			<tr>
			  <td><?php echo $entry_sort; ?></td>
			  <td class="left"><select name="reviewer_module[<?php echo $module_row; ?>][sort]">
                <?php if ($module['sort'] == 'r.date_added') { ?>
                <option value="r.date_added" selected="selected"><?php echo $text_date_added; ?></option>
                <?php } else { ?>
                <option value="r.date_added"><?php echo $text_date_added; ?></option>
                <?php } ?>
				<?php if ($module['sort'] == 'rating') { ?>
                <option value="rating" selected="selected"><?php echo $text_rating; ?></option>
                <?php } else { ?>
                <option value="rating"><?php echo $text_rating; ?></option>
				<?php } ?>
				<?php if ($module['sort'] == 'textlenght') { ?>
                <option value="textlenght" selected="selected"><?php echo $text_textlenght; ?></option>
                <?php } else { ?>
                <option value="textlenght"><?php echo $text_textlenght; ?></option>
                <?php } ?>
				<?php if ($module['sort'] == 'random') { ?>
                <option value="random" selected="selected"><?php echo $text_random; ?></option>
                <?php } else { ?>
                <option value="random"><?php echo $text_random; ?></option>
                <?php } ?>
              </select></td>
			</tr>
			<tr>
			  <td><?php echo $entry_minrate; ?></td>
			  <td class="right"><input type="text" name="reviewer_module[<?php echo $module_row; ?>][minrate]" value="<?php echo $module['minrate']; ?>" size="3" /> <?php echo $stars; ?></td>
			</tr>
			<tr>
			  <td><?php echo $entry_minprice; ?></td>
			  <td class="right"><input type="text" name="reviewer_module[<?php echo $module_row; ?>][minprice]" value="<?php echo $module['minprice']; ?>" size="3" /> <span class="help" style="display: inline-block;"><?php echo $currency; ?></span></td>
			</tr>
		  	<tr>
			  <td><?php echo $entry_count; ?></td>
			  <td class="right"><input type="text" name="reviewer_module[<?php echo $module_row; ?>][count]" value="<?php echo $module['count']; ?>" size="3" /></td>
			</tr>
			</table>
			<table class="form">
			<tr>
			  <td><?php echo $entry_visible; ?></td>
			  <td class="right"><input type="text" name="reviewer_module[<?php echo $module_row; ?>][visible]" value="<?php echo $module['visible']; ?>" size="3" /></td>
			</tr>
			<tr>
			<tr>
			  <td><?php echo $entry_scroll; ?></td>
			  <td class="right"><input type="text" name="reviewer_module[<?php echo $module_row; ?>][scroll]" value="<?php echo $module['scroll']; ?>" size="3" /></td>
			</tr>
			<tr>
			  <td><?php echo $entry_autoscroll; ?></td>
			  <td class="right"><input type="text" name="reviewer_module[<?php echo $module_row; ?>][autoscroll]" value="<?php echo $module['autoscroll']; ?>" size="3" /></td>
			</tr>
			<tr>
			  <td><?php echo $entry_animationspeed; ?></td>
			  <td class="right"><input type="text" name="reviewer_module[<?php echo $module_row; ?>][animationspeed]" value="<?php echo $module['animationspeed']; ?>" size="5" /></td>
			</tr>
			<tr>
				<td><?php echo $entry_hoverpause?></td>
				<td><input id="yes_hoverpause" type="radio" name="reviewer_module[<?php echo $module_row; ?>][hoverpause]" value="1" <?php if(!isset($module['hoverpause']) || $module['hoverpause'] == '1') echo " checked='checked'"?>>
					<label for="yes_hoverpause"><?php echo $text_yes?></label>
					<input id="no_hoverpause" type="radio" name="reviewer_module[<?php echo $module_row; ?>][hoverpause]" value="0" <?php if(isset($module['hoverpause']) && $module['hoverpause'] == '0') echo " checked='checked'"?>>
					<label for="no_hoverpause"><?php echo $text_no?></label>
				</td>
			</tr>
			<tr>
				<td><?php echo $entry_disableauto?></td>
				<td><input id="yes_disableauto" type="radio" name="reviewer_module[<?php echo $module_row; ?>][disableauto]" value="1" <?php if(!isset($module['disableauto']) || $module['disableauto'] == '1') echo " checked='checked'"?>>
					<label for="yes_disableauto"><?php echo $text_yes?></label>
					<input id="no_disableauto" type="radio" name="reviewer_module[<?php echo $module_row; ?>][disableauto]" value="0" <?php if(isset($module['disableauto']) && $module['disableauto'] == '0') echo " checked='checked'"?>>
					<label for="no_disableauto"><?php echo $text_no?></label>
				</td>
			</tr>
			<tr style="background:#aaa;">
				<td align="center" colspan="2" style="color:#fff;font-weight:bold;"><?php echo $entry_product_options;?>
				</td>
			</tr>
			<tr>
				<td><?php echo $entry_show_nick?></td>
				<td><input id="yes_title" type="radio" name="reviewer_module[<?php echo $module_row; ?>][show_nick]" value="1" <?php if(!isset($module['show_nick']) || $module['show_nick'] == '1') echo " checked='checked'"?>>
					<label for="yes_title"><?php echo $text_yes?></label>
					<input id="no_title" type="radio" name="reviewer_module[<?php echo $module_row; ?>][show_nick]" value="0" <?php if(isset($module['show_nick']) && $module['show_nick'] == '0') echo " checked='checked'"?>>
					<label for="no_title"><?php echo $text_no?></label>
				</td>
			</tr>
			<tr>
				<td><?php echo $entry_show_date?></td>
				<td><input id="yes_title" type="radio" name="reviewer_module[<?php echo $module_row; ?>][show_date]" value="1" <?php if(!isset($module['show_date']) || $module['show_date'] == '1') echo " checked='checked'"?>>
					<label for="yes_title"><?php echo $text_yes?></label>
					<input id="no_title" type="radio" name="reviewer_module[<?php echo $module_row; ?>][show_date]" value="0" <?php if(isset($module['show_date']) && $module['show_date'] == '0') echo " checked='checked'"?>>
					<label for="no_title"><?php echo $text_no?></label>
				</td>
			</tr>
			<tr>
				<td><?php echo $entry_show_rate?></td>
				<td><input id="yes_rate" type="radio" name="reviewer_module[<?php echo $module_row; ?>][show_rate]" value="1" <?php if(!isset($module['show_rate']) || $module['show_rate'] == '1') echo " checked='checked'"?>>
					<label for="yes_rate"><?php echo $text_yes?></label>
					<input id="no_rate" type="radio" name="reviewer_module[<?php echo $module_row; ?>][show_rate]" value="0" <?php if(isset($module['show_rate']) && $module['show_rate'] == '0') echo " checked='checked'"?>>
					<label for="no_rate"><?php echo $text_no?></label>
				</td>
			</tr>
			<tr>
				<td><?php echo $entry_show_text?></td>
				<td><input id="yes_text" type="radio" name="reviewer_module[<?php echo $module_row; ?>][show_text]" value="1" <?php if(!isset($module['show_text']) || $module['show_text'] == '1') echo " checked='checked'"?>>
					<label for="yes_text"><?php echo $text_yes?></label>
					<input id="no_text" type="radio" name="reviewer_module[<?php echo $module_row; ?>][show_text]" value="0" <?php if(isset($module['show_text']) && $module['show_text'] == '0') echo " checked='checked'"?>>
					<label for="no_text"><?php echo $text_no?></label><br><br>
					<?php echo $entry_cut_text.'  ';?><input type="text" name="reviewer_module[<?php echo $module_row; ?>][words]" value="<?php echo $module['words']; ?>" size="2" />
				</td>
			</tr>
			<tr>
			  <td><?php echo $entry_image; ?></td>
			  <td class="right">
			  <input id="yes_image" type="radio" name="reviewer_module[<?php echo $module_row; ?>][show_image]" value="1" <?php if(!isset($module['show_image']) || $module['show_image'] == '1') echo " checked='checked'"?>>
					<label for="yes_image"><?php echo $text_yes?></label>
					<input id="no_image" type="radio" name="reviewer_module[<?php echo $module_row; ?>][show_image]" value="0" <?php if(isset($module['show_image']) && $module['show_image'] == '0') echo " checked='checked'"?>>
					<label for="_image"><?php echo $text_no?></label><br><br>
			  <?php echo $entry_image_size; ?><input type="text" name="reviewer_module[<?php echo $module_row; ?>][image_width]" value="<?php echo $module['image_width']; ?>" size="3" /> x <input type="text" name="reviewer_module[<?php echo $module_row; ?>][image_height]" value="<?php echo $module['image_height']; ?>" size="3" /></td>
			</tr>
          </table>
        </div>
        <?php $module_row++; ?>
        <?php } ?>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript" src="view/javascript/ckeditor/ckeditor.js"></script> 
<script type="text/javascript"><!--
<?php $module_row = 1; ?>
<?php foreach ($modules as $module) { ?>

<?php $module_row++; ?>
<?php } ?>
//--></script> 

<script type="text/javascript"><!--
var module_row = <?php echo $module_row; ?>;
function addModule() {	

	html  = '<div id="tab-module-' + module_row + '" class="vtabs-content">';
	html += '  <div id="language-' + module_row + '" class="htabs">';
    <?php foreach ($languages as $language) { ?>
    html += '    <a href="#tab-language-'+ module_row + '-<?php echo $language['language_id']; ?>"><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?></a>';
    <?php } ?>
	html += '  </div>';


	html += '  <table class="form">';
	html += '  <tr style="background:#aaa;">';
	html += '  <td align="center" colspan="2" style="color:#fff;font-weight:bold;"><?php echo $entry_main_options;?></td>';
	html += '  </tr>';
	html += '    <tr>';
	html += '      <td><?php echo $entry_layout; ?></td>';
	html += '      <td><select name="reviewer_module[' + module_row + '][layout_id]">';
	<?php foreach ($layouts as $layout) { ?>
	html += '           <option value="<?php echo $layout['layout_id']; ?>"><?php echo addslashes($layout['name']); ?></option>';
	<?php } ?>
	html += '      </select></td>';
	html += '    </tr>';
	html += '    <tr>';
	html += '      <td><?php echo $entry_position; ?></td>';
	html += '      <td><select name="reviewer_module[' + module_row + '][position]">';
	html += '        <option value="content_top"><?php echo $text_content_top; ?></option>';
	html += '        <option value="content_bottom"><?php echo $text_content_bottom; ?></option>';
	html += '        <option value="column_left"><?php echo $text_column_left; ?></option>';
	html += '        <option value="column_right"><?php echo $text_column_right; ?></option>';
	html += '      </select></td>';
	html += '    </tr>';
	html += '    <tr>';
	html += '      <td><?php echo $entry_status; ?></td>';
	html += '      <td><select name="reviewer_module[' + module_row + '][status]">';
	html += '        <option value="1"><?php echo $text_enabled; ?></option>';
	html += '        <option value="0"><?php echo $text_disabled; ?></option>';
	html += '      </select></td>';
	html += '    </tr>';
	html += '    <tr>';
	html += '      <td><?php echo $entry_sort_order; ?></td>';
	html += '      <td><input type="text" name="reviewer_module[' + module_row + '][sort_order]" value="" size="3" /></td>';
	html += '    </tr>';
	html += '  </table>'; 
				<?php foreach ($languages as $language) { ?>
	html += '    <div id="tab-language-'+ module_row + '-<?php echo $language['language_id']; ?>">';
	html += '      <table class="form">';
	html += '      <tr style="background:#aaa;">';
	html += '      <td align="center" colspan="2" style="color:#fff;font-weight:bold;"><?php echo $entry_scroller_options;?></td>';
	html += '        </tr>';
	html += '        <tr>';
	html += '          <td><?php echo $entry_title; ?></td>';
	html += '          <td><input name="reviewer_module[' + module_row + '][title][<?php echo $language['language_id']; ?>]" size="40" id="title-' + module_row + '-<?php echo $language['language_id']; ?>"></input></td>';
	html += '        </tr>';
	html += '      </table>';
	html += '    </div>';
	<?php } ?>
	html += '  <table class="form">';
	html += '    <tr>';
	html += '    <td><?php echo $entry_show_link;?></td>';
	html += '    <td><input id="yes_show_link" type="radio" name="reviewer_module[' + module_row + '][show_link]" value="1" checked=checked"><label for="yes_show_link"><?php echo $text_yes;?></label><input id="no_show_link" type="radio" name="reviewer_module[' + module_row + '][show_link]" value="0"><label for="no_show_link"><?php echo $text_no;?></label></td>';
	html += '    </tr>';
	html += '    <tr>';
	html += '      <td><?php echo $entry_source; ?></td>';
	html += '      <td><select name="reviewer_module[' + module_row + '][category_id]" id="select' + module_row + '">';
	html += '           <option value="0" selected="selected"><?php echo $text_root; ?></option>';
	<?php foreach ($rootcats as $rootcat) { ?>
	html += '           <option value="<?php echo $rootcat['category_id']; ?>"><?php echo addslashes($rootcat['name']); ?></option>';
	<?php } ?>
	html += '      </select></td>';
	html += '  </table>'; 
	
	html += ' 	<table class="form" id="catonly' + module_row + '">';
	
	html += '    <tr>';
	html += '      <td><?php echo $entry_manufacturer; ?></td>';
	html += '      <td><select name="reviewer_module[' + module_row + '][manufacturer_id]" id="select' + module_row + '">';
	html += '           <option value="0" selected="selected"><?php echo $text_all_manufacturers; ?></option>';
	<?php if (isset($manufacturers)){
			foreach ($manufacturers as $manufacturer) { ?>
	html += '           <option value="<?php echo $manufacturer['manufacturer_id']; ?>"><?php echo addslashes($manufacturer['name']); ?></option>';
	<?php } }?>
	html += '      </select></td>';
	html += '    </tr>';
	
	html += '    <tr>';
	html += '      <td><?php echo $entry_sort; ?></td>';
	html += '      <td><select name="reviewer_module[' + module_row + '][sort]">';
	html += '        <option value="r.date_added"><?php echo $text_date_added; ?></option>';
	html += '        <option value="rating"><?php echo $text_rating; ?></option>';
	html += '        <option value="textlenght"><?php echo $text_textlenght; ?></option>';
	html += '        <option value="random"><?php echo $text_random; ?></option>';
	html += '      </select></td>';
	html += '    </tr>';
		html += '    <tr>';
	html += '      <td><?php echo $entry_minrate; ?></td>';
	html += '      <td><input name="reviewer_module[' + module_row + '][minrate]" size="3"></input><?php echo $stars; ?>';
	html += '    </tr>';
		html += '    <tr>';
	html += '      <td><?php echo $entry_minprice; ?></td>';
	html += '      <td><input name="reviewer_module[' + module_row + '][minprice]" size="3"></input><span class="help" style="display: inline-block;"><?php echo $currency; ?></span>';
	html += '    </tr>';
	html += '    <tr>';
	html += '      <td><?php echo $entry_count; ?></td>';
	html += '      <td><input name="reviewer_module[' + module_row + '][count]" size="3" value="10"></input>';
	html += '    </tr>';
	html += '  </table>';
	
	html += '  <table class="form">';
	html += '    <tr>';
	html += '      <td><?php echo $entry_visible; ?></td>';
	html += '      <td><input name="reviewer_module[' + module_row + '][visible]" size="3" value="1"></input>';
	html += '    <tr>';
	html += '      <td><?php echo $entry_scroll; ?></td>';
	html += '      <td><input name="reviewer_module[' + module_row + '][scroll]" size="3" value="1"></input>';
	html += '    </tr>';

	html += '    <tr>';
	html += '      <td><?php echo $entry_autoscroll; ?></td>';
	html += '      <td><input name="reviewer_module[' + module_row + '][autoscroll]" size="3" ></input>';
	html += '    </tr>';
	html += '    <tr>';
	html += '      <td><?php echo $entry_animationspeed; ?></td>';
	html += '      <td><input name="reviewer_module[' + module_row + '][animationspeed]" size="5" value="1000"></input>';
	html += '    </tr>';
	html += '    <tr>';
	html += '    <td><?php echo $entry_hoverpause;?></td>';
	html += '    <td><input id="yes_hoverpause" type="radio" name="reviewer_module[' + module_row + '][hoverpause]" value="1" checked=checked"><label for="yes_hoverpause"><?php echo $text_yes;?></label><input id="no_hoverpause" type="radio" name="reviewer_module[' + module_row + '][hoverpause]" value="0"><label for="no_hoverpause"><?php echo $text_no;?></label></td>';
	html += '    </tr>';
	html += '    <tr>';
	html += '    <td><?php echo $entry_disableauto;?></td>';
	html += '    <td><input id="yes_disableauto" type="radio" name="reviewer_module[' + module_row + '][disableauto]" value="1" checked=checked"><label for="yes_disableauto"><?php echo $text_yes;?></label><input id="no_disableauto" type="radio" name="reviewer_module[' + module_row + '][disableauto]" value="0"><label for="no_disableauto"><?php echo $text_no;?></label></td>';
	html += '    </tr>';
	html += '    <tr style="background:#aaa;">';
	html += '    <td align="center" colspan="2" style="color:#fff;font-weight:bold;"><?php echo $entry_product_options;?></td>';
	html += '    </tr>';

	html += '    <td><?php echo $entry_show_nick;?></td>';
	html += '    <td><input id="yes_title" type="radio" name="reviewer_module[' + module_row + '][show_nick]" value="1" checked=checked"><label for="yes_title"><?php echo $text_yes;?></label><input id="no_title" type="radio" name="reviewer_module[' + module_row + '][show_nick]" value="0"><label for="no_title"><?php echo $text_no;?></label></td>';
	html += '    </tr>';
	html += '    <td><?php echo $entry_show_date;?></td>';
	html += '    <td><input id="yes_title" type="radio" name="reviewer_module[' + module_row + '][show_date]" value="1" checked=checked"><label for="yes_title"><?php echo $text_yes;?></label><input id="no_title" type="radio" name="reviewer_module[' + module_row + '][show_date]" value="0"><label for="no_title"><?php echo $text_no;?></label></td>';
	html += '    </tr>';
	html += '    <tr>';
	html += '    <td><?php echo $entry_show_rate;?></td>';
	html += '    <td><input id="yes_rate" type="radio" name="reviewer_module[' + module_row + '][show_rate]" value="1" checked=checked"><label for="yes_rate"><?php echo $text_yes;?></label><input id="no_rate" type="radio" name="reviewer_module[' + module_row + '][show_rate]" value="0"><label for="no_rate"><?php echo $text_no;?></label></td>';
	html += '    </tr>';
	html += '    <tr>';
	html += '    <td><?php echo $entry_show_text;?></td>';
	html += '    <td><input id="yes_text" type="radio" name="reviewer_module[' + module_row + '][show_text]" value="1" checked=checked"><label for="yes_text"><?php echo $text_yes;?></label><input id="no_text" type="radio" name="reviewer_module[' + module_row + '][show_text]" value="0"><label for="no_text"><?php echo $text_no;?></label><br><br>';
	html += '    <?php echo $entry_cut_text.'  ';?><input type="text" name="reviewer_module[' + module_row + '][words]" value="15" size="2" /></td>';
	html += '    </tr>';
	html += '    <tr>';
	html += '      <td><?php echo $entry_image; ?></td>';
	html += '      <td><input id="yes_image" type="radio" name="reviewer_module[' + module_row + '][show_image]" value="1" checked=checked"><label for="yes_image"><?php echo $text_yes;?></label><input id="no_image" type="radio" name="reviewer_module[' + module_row + '][show_image]" value="0"><label for="no_image"><?php echo $text_no;?></label><br><br>';
	html += '    <?php echo $entry_image_size.'  ';?><input type="text" name="reviewer_module[' + module_row + '][image_width]" value="150" size="3" /> x <input type="text" name="reviewer_module[' + module_row + '][image_height]" value="150" size="3" /></td>';
	html += '    </tr>';
	html += '  </table>'; 
	
	html += '</div>';
	
	$('#form').append(html);
	
	$('#language-' + module_row + ' a').tabs();
	
	$('#module-add').before('<a href="#tab-module-' + module_row + '" modid ="' + module_row + '" id="module-' + module_row + '"><?php echo $tab_module; ?> ' + module_row + '&nbsp;<img src="view/image/delete.png" alt="" onclick="$(\'.vtabs a:first\').trigger(\'click\'); $(\'#module-' + module_row + '\').remove(); $(\'#tab-module-' + module_row + '\').remove(); return false;" /></a>');
	
	$('.vtabs a').tabs();
	
	$('#module-' + module_row).trigger('click');
	
	module_row++;
}
//--></script> 

<script type="text/javascript"><!--
$('.vtabs a').tabs();
//--></script> 
<script type="text/javascript"><!--
<?php $module_row = 1; ?>
<?php foreach ($modules as $module) { ?>
$('#language-<?php echo $module_row; ?> a').tabs();
<?php $module_row++; ?>
<?php } ?> 
//--></script> 
<?php echo $footer; ?>
<?php echo $header; ?>
<div id="content">
<div class="breadcrumb">
<?php foreach ($breadcrumbs as $i=> $breadcrumb) { ?>
<?php if($i+1<count($breadcrumbs)) { ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a> <?php } else { ?><?php echo $breadcrumb['text']; ?><?php } ?>
<?php } ?>
</div>
  <?php if ($error_warning) { ?>
  <div class="warning"><?php echo $error_warning; ?></div>
  <?php } ?>
  <div class="box">
    <div class="heading">
      <h1><img src="view/image/m-menu.png" alt="" style="width:30px;margin:5px 10px 0 0" /> <?php echo $heading_title; ?></h1>
      <div class="buttons"><a onclick="$('#form').submit();" class="button"><?php echo $button_save; ?></a><a href="<?php echo $cancel; ?>" class="button rem"><?php echo $button_cancel; ?></a></div>
    </div>
    <div class="content">
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
		<table id="module" class="list m-menu">
          <thead>
            <tr>
			  <td class="left"><?php echo $entry_limit; ?></td>
			  <td class="left"><?php echo $entry_image; ?></td>
			  <td class="left"><?php echo $entry_image_size; ?></td>
			  <td class="left"><?php echo $entry_name; ?></td>
			  <td class="left"><?php echo $entry_description; ?></td>
              <td class="left"><?php echo $entry_layout; ?></td>
              <td class="left"><?php echo $entry_position; ?></td>
              <td class="left"><?php echo $entry_status; ?></td>
              <td class="right"><?php echo $entry_sort_order; ?></td>
              <td></td>
            </tr>
          </thead>
          <?php $module_row = 0; ?>
          <?php foreach ($modules as $module) { ?>
          <tbody id="module-row<?php echo $module_row; ?>">
            <tr>
              <td class="left"><input type="text" name="category_module[<?php echo $module_row; ?>][limit]" value="<?php echo $module['limit']; ?>" size="1" /></td>
			  <td class="left"><select name="category_module[<?php echo $module_row; ?>][image_on]">
                  <?php if ($module['image_on'] == '1') { ?>
                  <option value="1" selected="selected"><?php echo $text_yes; ?></option>
                  <?php } else { ?>
                  <option value="1"><?php echo $text_yes; ?></option>
                  <?php } ?>
				  <?php if ($module['image_on'] == '0') { ?>
                  <option value="0" selected="selected"><?php echo $text_no; ?></option>
                  <?php } else { ?>
                  <option value="0"><?php echo $text_no; ?></option>
                  <?php } ?>
                </select></td>
			  <td class="left"><input class="flt" type="text" name="category_module[<?php echo $module_row; ?>][image_width]" value="<?php echo $module['image_width']; ?>" size="1" />
                <input type="text" name="category_module[<?php echo $module_row; ?>][image_height]" value="<?php echo $module['image_height']; ?>" size="1" />
				<?php if (isset($error_image[$module_row])) { ?>
                <span class="error"><?php echo $error_image[$module_row]; ?></span>
                <?php } ?></td>
			  <td class="left"><input type="text" name="category_module[<?php echo $module_row; ?>][name_limit]" value="<?php echo $module['name_limit']; ?>" size="3" /></td>
              <td class="left"><input type="text" name="category_module[<?php echo $module_row; ?>][description_limit]" value="<?php echo $module['description_limit']; ?>" size="3" /></td>
              <td class="left"><select name="category_module[<?php echo $module_row; ?>][layout_id]">
                  <?php foreach ($layouts as $layout) { ?>
                  <?php if ($layout['layout_id'] == $module['layout_id']) { ?>
                  <option value="<?php echo $layout['layout_id']; ?>" selected="selected"><?php echo $layout['name']; ?></option>
                  <?php } else { ?>
                  <option value="<?php echo $layout['layout_id']; ?>"><?php echo $layout['name']; ?></option>
                  <?php } ?>
                  <?php } ?>
                </select></td>
              <td class="left"><select name="category_module[<?php echo $module_row; ?>][position]">
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
				   <?php if ($module['position'] == 'header') { ?> 
 <option value="header" selected="selected"><?php echo $text_header; ?></option>
 <?php } else { ?>
 <option value="header"><?php echo $text_header; ?></option>
 <?php } ?>
                </select></td>
              <td class="left"><select name="category_module[<?php echo $module_row; ?>][status]">
                  <?php if ($module['status']) { ?>
                  <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                  <option value="0"><?php echo $text_disabled; ?></option>
                  <?php } else { ?>
                  <option value="1"><?php echo $text_enabled; ?></option>
                  <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                  <?php } ?>
                </select></td>
              <td class="right"><input type="text" name="category_module[<?php echo $module_row; ?>][sort_order]" value="<?php echo $module['sort_order']; ?>" size="3" /></td>
              <td class="left p-0"><a onclick="$('#module-row<?php echo $module_row; ?>').remove();" class="button rem-mod tooltip" title="Удалить модуль"></a></td>
            </tr>
          </tbody>
          <?php $module_row++; ?>
          <?php } ?>
          <tfoot>
            <tr>
              <td colspan="9"></td>
              <td class="left p-0" style="height:43px;"><a onclick="addModule();" class="button add-mod tooltip" title="Добавить модуль"></a></td>
            </tr>
          </tfoot>
        </table>
      </form>
    </div>
  </div>
</div>
<style>.m-menu td{text-align:center!important;position:relative}.m-menu thead td{font-size:12px;font-weight:400;background:#FBB040;color:#000;border:none;padding:15px 7px!important}.p-0{padding:0!important;width:100px}.flt{display:inline-block;vertical-align:top}.rem-mod,.add-mod{position:absolute;background:#F34235!important;top:0;right:0;width:70px;height:100%;padding:0!important;-webkit-border-radius:0!important;-moz-border-radius:0!important;-khtml-border-radius:0!important;border-radius:0!important}.rem-mod:before,.add-mod:before{position:absolute;width:100%;height:100%;top:0;left:0;content:"х";color:#fff;text-align:center;font-size:16px;text-indent:0;line-height:42px}.add-mod{background:#9CCD0A!important}.add-mod:before{content:"+"}.rem-mod:hover,.add-mod:hover{opacity:.95;filter:alpha(opacity=95);width:75px}</style>
<script type="text/javascript"><!--
var module_row = <?php echo $module_row; ?>;

function addModule() {	
	html  = '<tbody id="module-row' + module_row + '">';
	html += '  <tr>';
	html += '    <td class="left"><input type="text" name="category_module[' + module_row + '][limit]" value="30" size="1" /></td>';
	html += '    <td class="left"><select name="category_module[' + module_row + '][image_on]">';
	html += '      <option value="1"><?php echo $text_yes; ?></option>';
	html += '      <option value="0"><?php echo $text_no; ?></option>';
	html += '    </select></td>';
	html += '    <td class="left"><input class="flt" type="text" name="category_module[' + module_row + '][image_width]" value="80" size="1" /> <input type="text" name="category_module[' + module_row + '][image_height]" value="80" size="1" /></td>'; 
	html += '    <td class="left"><input type="text" name="category_module[' + module_row + '][name_limit]" value="25" size="3" /></td>';
	html += '    <td class="left"><input type="text" name="category_module[' + module_row + '][description_limit]" value="150" size="3" /></td>';
	html += '    <td class="left"><select name="category_module[' + module_row + '][layout_id]">';
	<?php foreach ($layouts as $layout) { ?>
	html += '      <option value="<?php echo $layout['layout_id']; ?>"><?php echo addslashes($layout['name']); ?></option>';
	<?php } ?>
	html += '    </select></td>';
	html += '    <td class="left"><select name="category_module[' + module_row + '][position]">';
	html += '      <option value="content_top"><?php echo $text_content_top; ?></option>';
	html += '      <option value="content_bottom"><?php echo $text_content_bottom; ?></option>';
	html += '      <option value="column_left"><?php echo $text_column_left; ?></option>';
	html += '      <option value="column_right"><?php echo $text_column_right; ?></option>';
	html += '      <option value="header"><?php echo $text_header; ?></option>';
	html += '    </select></td>';
	html += '    <td class="left"><select name="category_module[' + module_row + '][status]">';
    html += '      <option value="1" selected="selected"><?php echo $text_enabled; ?></option>';
    html += '      <option value="0"><?php echo $text_disabled; ?></option>';
    html += '    </select></td>';
	html += '    <td class="right"><input type="text" name="category_module[' + module_row + '][sort_order]" value="" size="3" /></td>';
	html += '    <td class="left"><a onclick="$(\'#module-row' + module_row + '\').remove();" class="button rem-mod"></a></td>';
	html += '  </tr>';
	html += '</tbody>';
	
	$('#module tfoot').before(html);
	
	module_row++;
}
$(".tooltip").tooltip({
	track: true, 
    delay: 0, 
    showURL: false, 
    showBody: " - ", 
    fade: 150 
});
//--></script>
<?php echo $footer; ?>
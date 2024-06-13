<?php echo $header; ?>
<style type="text/css">
label:first-child {margin-left:0px !important;
}
label{margin-left:15px;
}
.vtabs {
width:215px;
}
.vtabs-content {
margin-left: 230px;
}
.vtabs a, .vtabs span {
width:185px;
}
</style>
<div id="content">
<div class="breadcrumb">
<?php foreach ($breadcrumbs as $i=> $breadcrumb) { ?>
<?php if($i+1<count($breadcrumbs)) { ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a> <?php } else { ?><?php echo $breadcrumb['text']; ?><?php } ?>
<?php } ?>
</div>
  <?php if ($error_warning) { ?>
  <div class="warning"><?php echo $error_warning; ?></div>
  <?php } ?>
  <?php 
	$curlang = $this->config->get('config_admin_language');
	$indexs = array_keys($languages);
	foreach ($indexs as $index) {
		if ($languages[$index]['code'] == $curlang) $curlang_id = $languages[$index]['language_id'];
	}
  ?>
  <div class="box">
    <div class="heading">
      <h1><?php echo $heading_title; ?></h1>
      <div class="buttons"><a onclick="$('#form').submit();" class="button"><?php echo $button_save; ?></a><a onclick="location = '<?php echo $cancel; ?>';" class="rem"><?php echo $button_cancel; ?></a></div>
    </div>
    <div class="content">
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
        <div class="vtabs">
          <?php $module_row = 1; ?>
          <?php foreach ($modules as $module) { ?>
      <?php $title = isset($module['module_title'][$curlang_id]) ? $module['module_title'][$curlang_id] : ''; ?>
          <a href="#tab-module-<?php echo $module_row; ?>" id="module-<?php echo $module_row; ?>" title="<?php echo $title ?>"><?php echo utf8_substr($title, 0, 40); ?>&nbsp;<img src="view/image/delete.png" alt="" onclick="$('.vtabs a:first').trigger('click'); $('#module-<?php echo $module_row; ?>').remove(); $('#tab-module-<?php echo $module_row; ?>').remove(); return false;" /></a>
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
          <?php foreach ($languages as $language) { ?>
          <div id="tab-language-<?php echo $module_row; ?>-<?php echo $language['language_id']; ?>">
            <table class="form">
              <tr>
                <td><?php echo $entry_title; ?></td>
                <td><input type="text" size="100" name="multiproduct_module[<?php echo $module_row; ?>][module_title][<?php echo $language['language_id']; ?>]" value="<?php echo $module['module_title'][$language['language_id']]; ?>" /></td>
              </tr>
			    <tr>
                <td><?php echo $entry_description; ?></td>
                <td><textarea name="multiproduct_module[<?php echo $module_row; ?>][description][<?php echo $language['language_id']; ?>]" id="description-<?php echo $module_row; ?>-<?php echo $language['language_id']; ?>"><?php echo isset($module['description'][$language['language_id']]) ? $module['description'][$language['language_id']] : ''; ?></textarea></td>
              </tr> 
            </table>
          </div>
          <?php } ?>
          <table class="form">
		 		 <tr>
	              <td><?php echo $entry_product; ?></td>
	              <td><input type="text" name="productfeatured-<?php echo $module_row; ?>" value="" /></td>
	            </tr>
	            <tr>
	              <td>&nbsp;</td>
	              <td><div id="product-featured-<?php echo $module_row; ?>" class="scrollbox">
	                  <?php $class = 'odd'; ?>
	                  <?php if(isset($featured_products[$module_row])) { foreach ($featured_products[$module_row] as $product) { ?>
	                  <?php $class = ($class == 'even' ? 'odd' : 'even'); ?>
	                  <div id="products-featureds-<?php echo $module_row; ?>-<?php echo $product['product_id']; ?>" class="<?php echo $class; ?>"> <?php echo $product['name']; ?><img src="view/image/delete.png" />
	                    <input type="hidden" name="multiproduct_module[<?php echo $module_row; ?>][product][]" value="<?php echo $product['product_id']; ?>" />
	                  </div>
	                  <?php }} ?>
	                </div></td>
	            </tr>
			  <tr>
              <td><?php echo $entry_style; ?></td>
              <td><select name="multiproduct_module[<?php echo $module_row; ?>][style]">
                  <?php if ($module['style'] == 'grid') { ?>
                  <option value="grid" selected="selected"><?php echo $text_grid; ?></option>
				  <?php } else { ?>
				  <option value="grid"><?php echo $text_grid; ?></option>
				  <?php } ?>
				  
				  <?php if ($module['style'] == 'list') { ?>
                  <option value="list" selected="selected"><?php echo $text_list; ?></option>
				  <?php } else { ?>
				  <option value="list"><?php echo $text_list; ?></option>
				  <?php } ?>
                  
                  <?php if ($module['style'] == 'carousel') { ?>
                  <option value="carousel" selected="selected"><?php echo $text_carousel; ?></option>
				  <?php } else { ?>
				  <option value="carousel"><?php echo $text_carousel; ?></option>
				  <?php } ?>				  
                </select></td>
            </tr>		
			<tr>
              <td><?php echo $entry_block; ?></td>
              <td><select name="multiproduct_module[<?php echo $module_row; ?>][block]">
                  <?php if ($module['block'] == '1') { ?>
                  <option value="0"><?php echo $text_disabled; ?></option>                  
				  <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                  <?php } else { ?>
                  <option value="0" selected="selected"><?php echo $text_disabled; ?></option>				  
                  <option value="1"><?php echo $text_enabled; ?></option>
                  <?php } ?>
                </select></td>
		</tr>
             <tr>
              <td><?php echo $entry_ds; ?></td>
              <td>
                 <select name="multiproduct_module[<?php echo $module_row; ?>][brand]">
                  <?php if ($module['brand'] == '1') { ?>
                  <option value="0"><?php echo $text_brand; ?> <?php echo $text_disabled; ?></option>                  
				  <option value="1" selected="selected"><?php echo $text_brand; ?> <?php echo $text_enabled; ?></option>
                  <?php } else { ?>
                  <option value="0" selected="selected"><?php echo $text_brand; ?> <?php echo $text_disabled; ?></option>				  
                  <option value="1"><?php echo $text_brand; ?> <?php echo $text_enabled; ?></option>
                  <?php } ?>
                </select>
                 <select name="multiproduct_module[<?php echo $module_row; ?>][model]">
                  <?php if ($module['model'] == '1') { ?>
                  <option value="0"><?php echo $text_model; ?> <?php echo $text_disabled; ?></option>                  
				  <option value="1" selected="selected"><?php echo $text_model; ?> <?php echo $text_enabled; ?></option>
                  <?php } else { ?>
                  <option value="0" selected="selected"><?php echo $text_model; ?> <?php echo $text_disabled; ?></option>				  
                  <option value="1"><?php echo $text_model; ?> <?php echo $text_enabled; ?></option>
                  <?php } ?>
                </select>
				<select name="multiproduct_module[<?php echo $module_row; ?>][sku]">
                  <?php if ($module['sku'] == '1') { ?>
                  <option value="0"><?php echo $text_sku; ?> <?php echo $text_disabled; ?></option>                  
				  <option value="1" selected="selected"><?php echo $text_sku; ?> <?php echo $text_enabled; ?></option>
                  <?php } else { ?>
                  <option value="0" selected="selected"><?php echo $text_sku; ?> <?php echo $text_disabled; ?></option>				  
                  <option value="1"><?php echo $text_sku; ?> <?php echo $text_enabled; ?></option>
                  <?php } ?>
                </select>
				 <select name="multiproduct_module[<?php echo $module_row; ?>][quantity]">
                  <?php if ($module['quantity'] == '1') { ?>
                  <option value="0"><?php echo $text_quantity; ?> <?php echo $text_disabled; ?></option>                  
				  <option value="1" selected="selected"><?php echo $text_quantity; ?> <?php echo $text_enabled; ?></option>
                  <?php } else { ?>
                  <option value="0" selected="selected"><?php echo $text_quantity; ?> <?php echo $text_disabled; ?></option>				  
                  <option value="1"><?php echo $text_quantity; ?> <?php echo $text_enabled; ?></option>
                  <?php } ?>
                </select>
				<select name="multiproduct_module[<?php echo $module_row; ?>][stockstatus]">
                  <?php if ($module['stockstatus'] == '1') { ?>
                  <option value="0"><?php echo $text_stockstatus; ?> <?php echo $text_disabled; ?></option>                  
				  <option value="1" selected="selected"><?php echo $text_stockstatus; ?> <?php echo $text_enabled; ?></option>
                  <?php } else { ?>
                  <option value="0" selected="selected"><?php echo $text_stockstatus; ?> <?php echo $text_disabled; ?></option>				  
                  <option value="1"><?php echo $text_stockstatus; ?> <?php echo $text_enabled; ?></option>
                  <?php } ?>
                </select>	
              </td>			  
             </tr>			
			<tr>
				<td><?php echo $entry_limit; ?></td>
				<td><input type="text" name="multiproduct_module[<?php echo $module_row; ?>][limit]" value="<?php echo $module['limit']; ?>" size="1" /></td>
			</tr>
			
			<tr>
				<td><?php echo $entry_image; ?></td>
				<td><input type="text" name="multiproduct_module[<?php echo $module_row; ?>][image_width]" value="<?php echo $module['image_width']; ?>" size="3" />
                <input type="text" name="multiproduct_module[<?php echo $module_row; ?>][image_height]" value="<?php echo $module['image_height']; ?>" size="3" />
                <?php if (isset($error_image[$module_row])) { ?>
                <span class="error"><?php echo $error_image[$module_row]; ?></span>
                <?php } ?></td>
			</tr>
			
			
            <tr>
              <td><?php echo $entry_layout; ?></td>
              <td><select name="multiproduct_module[<?php echo $module_row; ?>][layout_id]">
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
              <td><select name="multiproduct_module[<?php echo $module_row; ?>][position]">
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
              <td><select name="multiproduct_module[<?php echo $module_row; ?>][status]">
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
              <td><input type="text" name="multiproduct_module[<?php echo $module_row; ?>][sort_order]" value="<?php echo $module['sort_order']; ?>" size="3" /><input type="hidden" name="multiproduct_module[<?php echo $module_row; ?>][key]" value="<?php echo $module_row; ?>"  /></td>
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
<?php foreach ($languages as $language) { ?>
CKEDITOR.replace('description-<?php echo $module_row; ?>-<?php echo $language['language_id']; ?>', {
	filebrowserBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserImageBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserFlashBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserImageUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserFlashUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>'
});
<?php } ?>
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

	<?php foreach ($languages as $language) { ?>
	html += '    <div id="tab-language-'+ module_row + '-<?php echo $language['language_id']; ?>">';
	html += '      <table class="form">';
	html += '        <tr>';
	html += '          <td><?php echo $entry_title; ?></td>';
	html += '          <td><input type="text" size="100" name="multiproduct_module[' + module_row + '][module_title][<?php echo $language['language_id']; ?>]" /></td></td>';
	html += '        </tr>';
	html += '        <tr>';
	html += '          <td><?php echo $entry_description; ?></td>';
	html += '          <td><textarea name="multiproduct_module[' + module_row + '][description][<?php echo $language['language_id']; ?>]" id="description-' + module_row + '-<?php echo $language['language_id']; ?>"></textarea></td>';
	html += '        </tr>';
	html += '      </table>';
	html += '    </div>';
	<?php } ?>

	html += '  <table class="form">';
	html += ' <tr>';
	html += '              <td><?php echo $entry_product; ?></td>';
	html += '              <td><input type="text" name="productfeatured-' + module_row + '" value="" /></td>';
	html += '            </tr>';
	html += '            <tr>';
	html += '              <td>&nbsp;</td>';
	html += '              <td><div id="product-featured-' + module_row + '" class="scrollbox">';
	html += '                </div></td>';
	html += '            </tr>';
	html += '  <tr>';
	
	html += '    <tr>';
	html += '      <td><?php echo $entry_style; ?></td>';
	html += '      <td><select name="multiproduct_module[' + module_row + '][style]">';
	html += '        <option value="grid"><?php echo $text_grid; ?></option>';
	html += '        <option value="list"><?php echo $text_list; ?></option>';
	html += '        <option value="carousel"><?php echo $text_carousel; ?></option>';
	html += '      </select></td>';
	html += '    </tr>';
	
	html += '    <tr>';
	html += '      <td><?php echo $entry_block; ?></td>';
	html += '      <td><select name="multiproduct_module[' + module_row + '][block]">';
	html += '        <option value="0"><?php echo $text_disabled; ?></option>';
	html += '        <option value="1"><?php echo $text_enabled; ?></option>';	
	html += '      </select></td>';
	html += '    </tr>';	
	html += '    <tr>';
	html += '      <td><?php echo $entry_ds; ?></td>';
	html += '      <td><select name="multiproduct_module[' + module_row + '][brand]">';
	html += '        <option value="0"><?php echo $text_brand; ?> <?php echo $text_disabled; ?></option>';
	html += '        <option value="1"><?php echo $text_brand; ?> <?php echo $text_enabled; ?></option>';	
	html += '      </select>';
	html += '      <select name="multiproduct_module[' + module_row + '][model]">';
	html += '        <option value="0"><?php echo $text_model; ?> <?php echo $text_disabled; ?></option>';
	html += '        <option value="1"><?php echo $text_model; ?> <?php echo $text_enabled; ?></option>';	
	html += '      </select>';
	html += '      <select name="multiproduct_module[' + module_row + '][sku]">';
	html += '        <option value="0"><?php echo $text_sku; ?> <?php echo $text_disabled; ?></option>';
	html += '        <option value="1"><?php echo $text_sku; ?> <?php echo $text_enabled; ?></option>';	
	html += '      </select>';
	html += '      <select name="multiproduct_module[' + module_row + '][quantity]">';
	html += '        <option value="0"><?php echo $text_quantity; ?> <?php echo $text_disabled; ?></option>';
	html += '        <option value="1"><?php echo $text_quantity; ?> <?php echo $text_enabled; ?></option>';	
	html += '      </select>';
	html += '      <select name="multiproduct_module[' + module_row + '][stockstatus]">';
	html += '        <option value="0"><?php echo $text_stockstatus; ?> <?php echo $text_disabled; ?></option>';
	html += '        <option value="1"><?php echo $text_stockstatus; ?> <?php echo $text_enabled; ?></option>';	
	html += '      </select>';
	html += '      </td>';
	html += '      </tr>';
	html += '<tr>';
	html += '<td><?php echo $entry_limit; ?></td>';
	html += '    <td><input type="text" name="multiproduct_module[' + module_row + '][limit]" value="20" size="1" /></td>';
	html += '</tr>';
	html += '<tr>';
	html += '<td><?php echo $entry_image; ?></td>';
	html += '    <td><input type="text" name="multiproduct_module[' + module_row + '][image_width]" value="80" size="3" /> <input type="text" name="multiproduct_module[' + module_row + '][image_height]" value="80" size="3" /></td>';	
	html += '    </tr>';
	html += '    <tr>';
	html += '      <td><?php echo $entry_layout; ?></td>';
	html += '      <td><select name="multiproduct_module[' + module_row + '][layout_id]">';
	<?php foreach ($layouts as $layout) { ?>
	html += '           <option value="<?php echo $layout['layout_id']; ?>"><?php echo addslashes($layout['name']); ?></option>';
	<?php } ?>
	html += '      </select></td>';
	html += '    </tr>';
	html += '    <tr>';
	html += '      <td><?php echo $entry_position; ?></td>';
	html += '      <td><select name="multiproduct_module[' + module_row + '][position]">';
	html += '        <option value="content_top"><?php echo $text_content_top; ?></option>';
	html += '        <option value="content_bottom"><?php echo $text_content_bottom; ?></option>';
	html += '        <option value="column_left"><?php echo $text_column_left; ?></option>';
	html += '        <option value="column_right"><?php echo $text_column_right; ?></option>';
	html += '      </select></td>';
	html += '    </tr>';
	html += '    <tr>';
	html += '      <td><?php echo $entry_status; ?></td>';
	html += '      <td><select name="multiproduct_module[' + module_row + '][status]">';
	html += '        <option value="1"><?php echo $text_enabled; ?></option>';
	html += '        <option value="0"><?php echo $text_disabled; ?></option>';
	html += '      </select></td>';
	html += '    </tr>';	
	html += '    <tr>';
	html += '      <td><?php echo $entry_sort_order; ?></td>';
	html += '      <td><input type="text" name="multiproduct_module[' + module_row + '][sort_order]" value="" size="3" /><input type="hidden" name="multiproduct_module[' + module_row + '][key]" value="<?php echo $module_row; ?>"/></td>';
	html += '    </tr>';
	html += '  </table>'; 
	html += '</div>';
	
	$('#form').append(html);
		<?php foreach ($languages as $language) { ?>
	CKEDITOR.replace('description-' + module_row + '-<?php echo $language['language_id']; ?>', {
		filebrowserBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
		filebrowserImageBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
		filebrowserFlashBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
		filebrowserUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
		filebrowserImageUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
		filebrowserFlashUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>'
	});  
	<?php } ?>
	$('input[name=\'productfeatured-' + module_row + '\']').autocomplete({
	delay: 0,
	source: function(request, response) {
		$.ajax({
			url: 'index.php?route=catalog/product/autocomplete&token=<?php echo $token; ?>&filter_name=' +  encodeURIComponent(request.term),
			dataType: 'json',
			success: function(json) {		
				response($.map(json, function(item) {
					return {
						label: item.name,
						value: item.product_id
					}
				}));
			}
		});
		
	}, 
		select: function(event, ui) {
			
			$('#products-featureds-' + (module_row - 1) + '-' + ui.item.value).remove();
	
			$('#product-featured-' + (module_row - 1) + '').append('<div id="products-featureds-' + (module_row - 1) + '-' + ui.item.value + '">' + ui.item.label + '<img src="view/image/delete.png" /><input type="hidden" name="multiproduct_module[' + (module_row - 1) + '][product][]" value="' + ui.item.value + '" /></div>');
	
			$('#product-featured-' + (module_row - 1) + ' div:odd').attr('class', 'odd');
			$('#product-featured-' + (module_row - 1) + ' div:even').attr('class', 'even');
					
			return false;
		}
	});

	$('#product-featured-' + module_row + ' div img').live('click', function() {
		$(this).parent().remove();
		
		$('#product-featured-' + module_row + ' div:odd').attr('class', 'odd');
		$('#product-featured-' + module_row + ' div:even').attr('class', 'even');	
	});

	$('#language-' + module_row + ' a').tabs();
	
	$('#module-add').before('<a href="#tab-module-' + module_row + '" id="module-' + module_row + '"><?php echo $tab_module; ?> ' + module_row + '&nbsp;<img src="view/image/delete.png" alt="" onclick="$(\'.vtabs a:first\').trigger(\'click\'); $(\'#module-' + module_row + '\').remove(); $(\'#tab-module-' + module_row + '\').remove(); return false;" /></a>');
	
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
<script type="text/javascript"><!--
<?php $module_row = 1; ?>
<?php foreach ($modules as $module) { ?>
$('input[name=\'productfeatured-<?php echo $module_row; ?>\']').autocomplete({
	delay: 0,
	source: function(request, response) {
		$.ajax({
			url: 'index.php?route=catalog/product/autocomplete&token=<?php echo $token; ?>&filter_name=' +  encodeURIComponent(request.term),
			dataType: 'json',
			success: function(json) {		
				response($.map(json, function(item) {
					return {
						label: item.name,
						value: item.product_id
					}
				}));
			}
		});
		
	}, 
	select: function(event, ui) {
		$('#products-featureds-<?php echo $module_row; ?>-' + ui.item.value).remove();
		
		$('#product-featured-<?php echo $module_row; ?>').append('<div id="products-featureds-<?php echo $module_row; ?>-' + ui.item.value + '">' + ui.item.label + '<img src="view/image/delete.png" /><input type="hidden" name="multiproduct_module[<?php echo $module_row; ?>][product][]" value="' + ui.item.value + '" /></div>');

		$('#product-featured-<?php echo $module_row; ?> div:odd').attr('class', 'odd');
		$('#product-featured-<?php echo $module_row; ?> div:even').attr('class', 'even');
				
		return false;
	}
});

$('#product-featured-<?php echo $module_row; ?> div img').live('click', function() {
	$(this).parent().remove();
	
	$('#product-featured-<?php echo $module_row; ?> div:odd').attr('class', 'odd');
	$('#product-featured-<?php echo $module_row; ?> div:even').attr('class', 'even');	
});
<?php $module_row++; ?>
<?php } ?> 
//--></script>
<?php echo $footer; ?>
<?php echo $header; ?>
<style>
#module select {
	width:150px;
}

#module .image {
	min-width:130px;
	min-height:85px;
	text-align:center;
}

#module .image img {
	width:50px;
	height:auto;
}
#module .images div{
	display:inline-block;
	vertical-align:top;
}
#module .images span{
	display:inline-block;
	width:80px;
}
#module .images select{
	width:147px;
}

#module .images td, #module .product td{
	height:26px;
}

#module .product span{
	display:inline-block;
	width:49px;
}
</style>
<div id="content">
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
  <?php if ($error_warning) { ?>
  <div class="warning"><?php echo $error_warning; ?></div>
  <?php } ?>
  <div class="box">
    <div class="heading">
      <h1><img src="view/image/module.png" alt="" /> <?php echo $heading_title; ?></h1>
      <div class="buttons">
	  <a onclick="$('#form input[name=apply]').val(1); $('#form').submit();" class="button"><?php echo $button_apply; ?></a>
	  <a onclick="$('#form').submit();" class="button"><?php echo $button_save; ?></a><a href="<?php echo $cancel; ?>" class="button"><?php echo $button_cancel; ?></a></div>
    </div>
    <div class="content">
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
        <table id="module" class="list">
          <thead>
            <tr>
              <td class="left"><?php echo $entry_category; ?></td>
              <td class="left"><?php echo $entry_background_image; ?></td>
			  <td class="left"><?php echo $entry_product; ?></td>
              <td class="center"><?php echo $entry_status; ?></td>
              <td></td>
            </tr>
          </thead>
          <?php $module_row = 0; ?>
          <?php foreach ($modules as $module) { ?>
          <tbody id="module-row<?php echo $module_row; ?>">
            <tr>
            <td class="left">
			 <select name="custom_background_module[<?php echo $module_row; ?>][category_id]">
			 <option value="0" selected="selected"><?php echo $text_select; ?></option>
			 <?php foreach ($categories as $category) { ?>
				<?php if ($category['category_id'] == $module['category_id']) { ?>
					<option value="<?php echo $category['category_id']; ?>" selected="selected"><?php echo $category['name']; ?></option>
                <?php } else { ?>
					<option value="<?php echo $category['category_id']; ?>"><?php echo $category['name']; ?></option>
                <?php } ?>
			<?php } ?>
			</select>
			</td>
            <td class="left images">
			<div class="image">
			<img src="<?php if($module['background_image']) { echo $this->model_tool_image->resize($module['background_image'], 50, 50); } else { echo $no_image;} ?>" alt="" id="thumb_<?php echo $module_row; ?>" /><br />
            <input type="hidden" name="custom_background_module[<?php echo $module_row; ?>][background_image]" value="<?php echo $module['background_image']; ?>" id="image_<?php echo $module_row; ?>" />
            <a onclick="image_upload('image_<?php echo $module_row; ?>', 'thumb_<?php echo $module_row; ?>');"><?php echo $text_browse; ?></a>
			&nbsp;&nbsp;|&nbsp;&nbsp;
			<a onclick="$('#thumb_<?php echo $module_row; ?>').attr('src', '<?php echo $no_image; ?>'); $('#image_<?php echo $module_row; ?>').attr('value', '');"><?php echo $text_clear; ?></a>
			</div>
			<div>
			<table>
			<tr>
			<td><span>Состояние:</span></td>
			<td>
			<select name="custom_background_module[<?php echo $module_row; ?>][background_fixed]">
			<option <?php if ($module['background_fixed'] == 'scroll') { ?>selected="selected"<?php } ?> value="scroll">Обычное</option>
			<option <?php if ($module['background_fixed'] == 'fixed') { ?>selected="selected"<?php } ?> value="fixed">Зафиксированное</option>
			</select>
			</td>
			</tr>
			<tr>
			<td><span>Повтор:</span></td>
			<td>
			<select name="custom_background_module[<?php echo $module_row; ?>][background_repeat]">
			<option <?php if ($module['background_repeat'] == 'no-repeat') { ?>selected="selected"<?php } ?> value="no-repeat">Без повтора</option>
			<option <?php if ($module['background_repeat'] == 'repeat-x') { ?>selected="selected"<?php } ?> value="repeat-x">По горизонтали</option>
			<option <?php if ($module['background_repeat'] == 'repeat-y') { ?>selected="selected"<?php } ?> value="repeat-y">По вертикали</option>
			<option <?php if ($module['background_repeat'] == 'repeat') { ?>selected="selected"<?php } ?> value="repeat">Оба варианта</option>
			</select>
			</td>
			</tr>
			<tr>
			<td><span>Масштаб:</span></td>
			<td>
			<select name="custom_background_module[<?php echo $module_row; ?>][background_size]">
			<option <?php if ($module['background_size'] == 'auto') { ?>selected="selected"<?php } ?> value="auto">Auto</option>
			<option <?php if ($module['background_size'] == 'cover') { ?>selected="selected"<?php } ?> value="cover">Cover</option>
			<option <?php if ($module['background_size'] == 'contain') { ?>selected="selected"<?php } ?> value="contain">Contain</option>
			</select>
			</td>
			</tr>
			<tr>
			<td><span>Отступы:</span></td>
			<td>
			<span style="width:49px;">Сверху: </span><input type="text" size="2" name="custom_background_module[<?php echo $module_row; ?>][background_top]" value="<?php if ($module['background_top']) { echo $module['background_top']; }  ?>" /><br />
			<span style="width:49px;">Слева: </span><input type="text" size="2" name="custom_background_module[<?php echo $module_row; ?>][background_left]" value="<?php if ($module['background_left']) { echo $module['background_left']; }  ?>" />
			</td>
			</tr>
			</table>
			</div>
			<br />
			<div style="margin:6px 0 0;"><span style="width:auto;"><?php echo $entry_background_link; ?>:</span> <input type="text" size="35" name="custom_background_module[<?php echo $module_row; ?>][background_link]" value="<?php if ($module['background_link']) { echo $module['background_link']; }  ?>" /></div>
			 </td>
			<td class="left product">
			<table>
			<tr>
			<td><span style="width:auto;">Заголовок блока:</span></td>
			<td><input type="text" name="custom_background_module[<?php echo $module_row; ?>][product_header]" value="<?php echo $module['product_header']; ?>" /></td>
			</tr>
			<tr>
			<td><span style="width:auto;">Товар:</span></td>
			<td>
			<input type="text" name="custom_background_module[<?php echo $module_row; ?>][product_name]" oninput="product_autocomplete(<?php echo $module_row; ?>);" id="product_name_<?php echo $module_row; ?>" value="<?php echo $module['product_name']; ?>" />
			<input type="hidden" name="custom_background_module[<?php echo $module_row; ?>][product_id]" value="<?php echo $module['product_id']; ?>" id="product_id_<?php echo $module_row; ?>" />
			<img src="view/image/delete.png" style="padding:2px 2px 3px; vertical-align:middle; cursor:pointer;" alt="" title="Очистить" onclick="$('#product_name_<?php echo $module_row; ?>, #product_id_<?php echo $module_row; ?>').val('')" />
			</td>
			</tr>
			<tr>
			<td><span style="width:auto;">Состояние:</span></td>
			<td>
			<select name="custom_background_module[<?php echo $module_row; ?>][product_fixed]">
			<option <?php if ($module['product_fixed'] == 'absolute') { ?>selected="selected"<?php } ?> value="absolute">Обычное</option>
			<option <?php if ($module['product_fixed'] == 'fixed') { ?>selected="selected"<?php } ?> value="fixed">Зафиксированное</option>
			</select>
			</td>
			</tr>
			<tr>
			<td colspan="2"><span style="margin:2px 0 5px;">Позиционирование:</span></td>
			</tr>
			<tr>
			<td><span>Сверху: </span><input type="text" size="2" name="custom_background_module[<?php echo $module_row; ?>][product_top]" value="<?php if ($module['product_top']) { echo $module['product_top']; }  ?>" /></td>
			<td><span>Справа: </span><input type="text" size="2" name="custom_background_module[<?php echo $module_row; ?>][product_right]" value="<?php if ($module['product_right']) { echo $module['product_right']; }  ?>" /></td>
			</tr>
			<tr>
			<td><span>Снизу: </span><input type="text" size="2" name="custom_background_module[<?php echo $module_row; ?>][product_bottom]" value="<?php if ($module['product_bottom']) { echo $module['product_bottom']; }  ?>" /></td>
			<td><span>Слева: </span><input type="text" size="2" name="custom_background_module[<?php echo $module_row; ?>][product_left]" value="<?php if ($module['product_left']) { echo $module['product_left']; }  ?>" /></td>
			</tr>
			</table>
			</td>
            <td class="center"><input type="checkbox" name="custom_background_module[<?php echo $module_row; ?>][status]" <?php if (isset($module['status'])) { ?>checked="checked"<?php } ?> value="1" /></td>
            <td class="left"><a onclick="$('#module-row<?php echo $module_row; ?>').remove();" class="button"><?php echo $button_remove; ?></a></td>
            <input type="hidden" name="custom_background_module[<?php echo $module_row; ?>][position]" value="custom" />
			<input type="hidden" name="custom_background_module[<?php echo $module_row; ?>][layout_id]" value="custom" />
			</tr>
          </tbody>
          <?php $module_row++; ?>
          <?php } ?>
          <tfoot>
            <tr>
              <td colspan="4"></td>
              <td class="left"><a onclick="addModule();" class="button"><?php echo $button_add_module; ?></a></td>
            </tr>
          </tfoot>
        </table>
		<input type="hidden" name="apply" value="0" />
      </form>
    </div>
  </div>
</div>
<script type="text/javascript"><!--
var module_row = <?php echo $module_row; ?>;

function addModule() {	
	
	html  = '<tbody id="module-row' + module_row + '">';
    html += '       <tr>';
   	html += '  		<td class="left">';
	html += '		<select name="custom_background_module['+module_row+'][category_id]">';
	html += '		<option value="0" selected="selected"><?php echo $text_select; ?></option>';
	<?php foreach ($categories as $category) { ?>
	html += '		<option value="<?php echo $category['category_id']; ?>"><?php echo $category['name']; ?></option>';
	<?php } ?>
	html += '   	</select></td>';
    html += '   	<td class="left images">';
	html += '		<div class="image">';
	html += '		<img src="<?php echo $no_image; ?>" alt="" id="thumb_'+module_row+'" /><br />';
	html += '		<input type="hidden" name="custom_background_module['+module_row+'][background_image]" value="<?php echo $no_image; ?>" id="image_'+module_row+'" />';
	html += '		<a onclick="image_upload(\'image_' +module_row+ '\', \'thumb_' +module_row+ '\');"><?php echo $text_browse; ?></a>';
	html += '		</div>';
	html += '		<div>';
	html += '		<table>';
	html += '		<tr>';
	html += '		<td><span>Состояние:</span></td>';
	html += '		<td>';
	html += '		<select name="custom_background_module['+module_row+'][background_fixed]">';
	html += '		<option selected="selected" value="scroll">Обычное</option>';
	html += '		<option value="fixed">Зафиксированное</option>';
	html += '		</select>';
	html += '		</td>';
	html += '		</tr>';
	html += '		<tr>';
	html += '		<td><span>Повтор:</span></td>';
	html += '		<td>';
	html += '		<select name="custom_background_module['+module_row+'][background_repeat]">';
	html += '		<option selected="selected" value="no-repeat">Без повтора</option>';
	html += '		<option value="repeat-x">По горизонтали</option>';
	html += '		<option value="repeat-y">По вертикали</option>';
	html += '		<option value="repeat">Оба варианта</option>';
	html += '		</select>';
	html += '		</td>';
	html += '		</tr>';
	html += '		<tr>';
	html += '		<td><span>Масштаб:</span></td>';
	html += '		<td>';
	html += '		<select name="custom_background_module['+module_row+'][background_size]">';
	html += '		<option selected="selected" value="auto">Auto</option>';
	html += '		<option value="cover">Cover</option>';
	html += '		<option value="contain">Contain</option>';
	html += '		</select>';
	html += '		</td>';
	html += '		</tr>';
	html += '		<tr>';
	html += '		<td><span>Отступы:</span></td>';
	html += '		<td>';
	html += '		<span style="width:49px;">Сверху: </span><input type="text" size="2" name="custom_background_module['+module_row+'][background_top]" value="" /><br />';
	html += '		<span style="width:49px;">Слева: </span><input type="text" size="2" name="custom_background_module['+module_row+'][background_left]" value="" />';
	html += '		</td>';
	html += '		</tr>';
	html += '		</table>';
	html += '		</div>';
	html += '		<br />';
	html += '		<div style="margin:6px 0 0;"><span style="width:auto;"><?php echo $entry_background_link; ?>:</span> <input type="text" size="35" name="custom_background_module['+module_row+'][background_link]" value="" /></div>';
	html += '		 </td>';
	html += '		<td class="left product">';
	html += '		<table>';
	html += '		<tr>';
	html += '		<td><span style="width:auto;">Заголовок блока:</span></td>';
	html += '		<td><input type="text" name="custom_background_module['+module_row+'][product_header]" value="" /></td>';
	html += '		</tr>';
	html += '		<tr>';
	html += '		<td><span style="width:auto;">Товар:</span></td>';
	html += '		<td>';
	html += '		<input type="text" name="custom_background_module['+module_row+'][product_name]" oninput="product_autocomplete('+module_row+');" id="product_name_'+module_row+'" value="" />';
	html += '		<input type="hidden" name="custom_background_module['+module_row+'][product_id]" value="" id="product_id_'+module_row+'" />';
	html += '		<img src="view/image/delete.png" style="padding:2px 2px 3px; vertical-align:middle; cursor:pointer;" alt="" title="Очистить" onclick="$(\'#product_name_' +module_row+ '\', \'#product_id_' +module_row+ '\').val(\'\')" />';
	html += '		</td>';
	html += '		</tr>';
	html += '		<tr>';
	html += '		<td><span style="width:auto;">Состояние:</span></td>';
	html += '		<td>';
	html += '		<select name="custom_background_module['+module_row+'][product_fixed]">';
	html += '		<option selected="selected" value="absolute">Обычное</option>';
	html += '		<option value="fixed">Зафиксированное</option>';
	html += '		</select>';
	html += '		</td>';
	html += '		</tr>';
	html += '		<tr>';
	html += '		<td colspan="2"><span style="margin:2px 0 5px;">Позиционирование:</span></td>';
	html += '		</tr>';
	html += '		<tr>';
	html += '		<td><span>Сверху: </span><input type="text" size="2" name="custom_background_module['+module_row+'][product_top]" value="" /></td>';
	html += '		<td><span>Справа: </span><input type="text" size="2" name="custom_background_module['+module_row+'][product_right]" value="" /></td>';
	html += '		</tr>';
	html += '		<tr>';
	html += '		<td><span>Снизу: </span><input type="text" size="2" name="custom_background_module['+module_row+'][product_bottom]" value="" /></td>';
	html += '		<td><span>Слева: </span><input type="text" size="2" name="custom_background_module['+module_row+'][product_left]" value="" /></td>';
	html += '		</tr>';
	html += '		</table>';
	html += '		</td>';
    html += '       <td class="center"><input type="checkbox" name="custom_background_module['+module_row+'][status]" checked="checked" value="1" /></td>';
    html += '    	<td class="left"><a onclick="$(\'#module-row' + module_row + '\').remove();" class="button"><?php echo $button_remove; ?></a></td>';;
    html += '       <input type="hidden" name="custom_background_module['+module_row+'][position]" value="custom" />';
	html += '		<input type="hidden" name="custom_background_module['+module_row+'][layout_id]" value="custom" />';
	html += '		</tr>';
    html += '      </tbody>';
	
	$('#module tfoot').before(html);
	
	module_row++;
}
//--></script>

<script type="text/javascript" src="view/javascript/ckeditor/ckeditor.js"></script> 
<script type="text/javascript"><!--
function image_upload(field, thumb) {
	$('#dialog').remove();
	
	$('#content').prepend('<div id="dialog" style="padding: 3px 0px 0px 0px;"><iframe src="index.php?route=common/filemanager&token=<?php echo $token; ?>&field=' + encodeURIComponent(field) + '" style="padding:0; margin: 0; display: block; width: 100%; height: 100%;" frameborder="no" scrolling="auto"></iframe></div>');
	
	$('#dialog').dialog({
		title: '<?php echo $text_image_manager; ?>',
		close: function (event, ui) {
			if ($('#' + field).attr('value')) {
				$.ajax({
					url: 'index.php?route=common/filemanager/image&token=<?php echo $token; ?>&image=' + encodeURIComponent($('#' + field).attr('value')),
					dataType: 'text',
					success: function(text) {
						$('#' + thumb).replaceWith('<img src="' + text + '" alt="" id="' + thumb + '" />');
					}
				});
			}
		},	
		bgiframe: false,
		width: 800,
		height: 400,
		resizable: false,
		modal: false
	});
};

function product_autocomplete(row_id) {
$('#product_name_'+row_id).autocomplete({
	delay: 500,
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
		$('#product_name_'+row_id).val(ui.item.label);
		$('#product_id_'+row_id).val(ui.item.value);
		return false;
	},
	focus: function(event, ui) {
      return false;
   }
});
}

$('#product-related div img').live('click', function() {
	$(this).parent().remove();
	
	$('#product-related div:odd').attr('class', 'odd');
	$('#product-related div:even').attr('class', 'even');	
});
//--></script>  
<?php echo $footer; ?>
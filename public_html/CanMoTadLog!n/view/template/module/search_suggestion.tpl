<?php
echo $header; ?>
<script type="text/javascript" src="view/javascript/jquery/jquery-sortable.js"></script>
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
			<div class="buttons"><a onclick="$('#form').submit();" class="button"><?php echo $button_save; ?></a><a onclick="location = '<?php echo $cancel; ?>';" class="button"><?php echo $button_cancel; ?></a></div>
		</div>
		<div class="content">

			<div id="tabs" class="htabs">
				<a href="#tab-general"><?php echo $tab_general; ?></a>
				<a href="#tab-where"><?php echo $tab_where; ?></a>
				<a href="#tab-fields"><?php echo $tab_fields; ?></a>
				<a href="#tab-support"><?php echo $tab_support; ?></a>
			</div>

			<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">

				<div id="tab-general">  
          
          <br />
          <table id="general" class="list" style="width: 700px;">
              <tr>
                <td class="left"><?php echo $text_key; ?></td>              
                <td width="500" style="text-align: left;">
                  <input type="text" size="70" name="search_suggestion_options[key]" value="<?php echo isset($options['key']) ? $options['key'] : '';?>">
                </td>
              </tr>
          </table>          
          <br />

					<table id="general" class="list">
						<tbody >
							<tr>
								<td width="50"><?php echo $search_order; ?></td>
								<td class="left">
									<select name="search_suggestion_options[search_order]">
										<option value="name" <?php echo (isset($options['search_order']) && $options['search_order'] == 'name') ? 'selected="selected"' : "" ;?>><?php echo $search_order_name; ?></option>
										<option value="rating" <?php echo (isset($options['search_order']) && $options['search_order'] == 'rating') ? 'selected="selected"' : "" ;?>><?php echo $search_order_rating; ?></option>
										<option value="relevance" <?php echo (isset($options['search_order']) && $options['search_order'] == 'relevance') ? 'selected="selected"' : "" ;?>><?php echo $search_order_relevance; ?></option>
									</select>
									<select name="search_suggestion_options[search_order_dir]">
										<option value="asc" <?php echo (isset($options['search_order_dir']) && $options['search_order_dir'] == 'asc') ? 'selected="selected"' : "" ;?>><?php echo $search_order_dir_asc; ?></option>
										<option value="desc" <?php echo (isset($options['search_order_dir']) && $options['search_order_dir'] == 'desc') ? 'selected="selected"' : "" ;?>><?php echo $search_order_dir_desc; ?></option>
									</select>              
								</td>  
							</tr>

							<tr>
								<td class="left"><?php echo $search_limit; ?></td>              
								<td width="50">
									<input type="text" name="search_suggestion_options[search_limit]" value="<?php echo isset($options['search_limit']) ? $options['search_limit'] : 0;?>">
								</td>
							</tr>

							<tr>
								<td class="left"><?php echo $search_logic; ?></td>             
								<td width="50">
									<select name="search_suggestion_options[search_logic]">
										<option value="or" <?php echo (isset($options['search_logic']) && $options['search_logic'] == 'or') ? 'selected="selected"' : "" ;?>><?php echo $search_logic_or; ?></option>
										<option value="and" <?php echo (isset($options['search_logic']) && $options['search_logic'] == 'and') ? 'selected="selected"' : "" ;?>><?php echo $search_logic_and; ?></option>
									</select>              

								</td>
							</tr>

							<tr>
								<td class="left"><?php echo $search_cache; ?></td>              
								<td width="50">
									<input type="checkbox" name="search_suggestion_options[search_cache]" value="1" <?php echo isset($options['search_cache']) && $options['search_cache'] ? "checked=checked" : "" ;?> />
							</td>

							<tr>
								<td class="left"><?php echo $search_css; ?></td>              
								<td width="50">
                  <textarea name="search_suggestion_options[search_css]" rows="8" cols="60"><?php echo isset($options['search_css']) ? $options['search_css'] : '';?></textarea>
							</td>
						</tr>

					</tbody>
				</table>

				<table id="module" class="list">
					<thead>
						<tr>
							<td width="1" style="text-align: center;">
								<input type="checkbox" onclick="$('input[type=checkbox][name*=\'search_suggestion_module\']').attr('checked', this.checked);" />
							</td>
							<td class="left"><?php echo $entry_layout; ?></td>  
						</tr>
					</thead>
					<tbody >
						<?php foreach ($modules as $key => $module) { ?>          
						<?php foreach ($layouts as $layout) { ?>
						<?php if ($module['layout_id'] == $layout['layout_id']) { ?>
						<tr>
							<td style="text-align: center;">
								<input type="checkbox" name="search_suggestion_module[<?php echo $key; ?>][status]" value="1" <?php echo (isset($module['status']) && $module['status']) ? "checked=checked" : "" ;?> />
									   <input type="hidden" name="search_suggestion_module[<?php echo $key; ?>][layout_id]" value="<?php echo $module['layout_id']; ?>"/>
									<input type="hidden" name="search_suggestion_module[<?php echo $key; ?>][position]" value="<?php echo $module['position']; ?>"/>
									<input type="hidden" name="search_suggestion_module[<?php echo $key; ?>][sort_order]" value="<?php echo $module['sort_order']; ?>"/>
							</td>    
							<td class="left"><?php echo $layout['name']; ?></td>
						</tr>
						<?php } ?>  
						<?php } ?>
						<?php } ?>
					</tbody>
				</table>
			</div>

			<div id="tab-where">
				<table id="where" class="list">
					<thead>
						<tr>
							<td width="1" style="text-align: center;">
								<input type="checkbox" onclick="$('input[type=checkbox][name*=\'search_suggestion_options[searh_where]\']').attr('checked', this.checked);" />
							</td>
							<td class="left"><?php echo $search_where; ?></td>  
							<td class="left"><?php echo $relevance_weight; ?></td>
						</tr>
					</thead>
					<tbody >
						<tr>
							<td width="1" style="text-align: center;">
								<input type="checkbox" name="search_suggestion_options[search_where][name]" value="1" <?php echo (isset($options['search_where']['name']) && $options['search_where']['name']) ? "checked=checked" : "" ;?> />
						</td>
						<td class="left"><?php echo $search_where_name; ?></td>  
						<td class="left"><?php echo $relevance_weight_mr; ?></td>
					</tr>
					<tr>
						<td width="1" style="text-align: center;">
							<input type="checkbox" name="search_suggestion_options[search_where][tags]" value="1" <?php echo (isset($options['search_where']['tags']) && $options['search_where']['tags']) ? "checked=checked" : "" ;?> />
					</td>
					<td class="left"><?php echo $search_where_tags; ?></td>
					<td class="left"><?php echo $relevance_weight_mr; ?></td>
				</tr>
				<tr>
					<td width="1" style="text-align: center;">
						<input type="checkbox" name="search_suggestion_options[search_where][description]" value="1" <?php echo (isset($options['search_where']['description']) && $options['search_where']['description']) ? "checked=checked" : "" ;?> />
				</td>
				<td class="left"><?php echo $search_where_description; ?></td>  
				<td class="left"><?php echo $relevance_weight_mr; ?></td>
			</tr>
			<tr>
				<td width="1" style="text-align: center;">
					<input type="checkbox" name="search_suggestion_options[search_where][model]" value="1" <?php echo (isset($options['search_where']['model']) && $options['search_where']['model']) ? "checked=checked" : "" ;?> />
			</td>
			<td class="left"><?php echo $search_where_model; ?></td> 
			<td class="left"><?php echo $relevance_weight_mr; ?></td>              
		</tr>
		<tr>
			<td width="1" style="text-align: center;">
				<input type="checkbox" name="search_suggestion_options[search_where][sku]" value="1" <?php echo (isset($options['search_where']['sku']) && $options['search_where']['sku']) ? "checked=checked" : "" ;?> />
		</td>
		<td class="left"><?php echo $search_where_sku; ?></td>  
		<td class="left"><?php echo $relevance_weight_mr; ?></td>              
	</tr>

</tbody>
</table>
<?php echo $tab_where_help; ?>  
</div>

<div id="tab-fields">
	<table id="fields" class="list sorted_table">
		<thead>
			<tr>
				<td class="left"><?php echo $search_fields_show; ?></td>
				<td class="left"><?php echo $search_fields; ?></td>              
				<td class="left"><?php echo $search_fields_show_field_name; ?></td>  
				<td class="left"><?php echo $search_fields_settings; ?></td>  
        <td class="left"><?php echo $search_fields_location; ?></td>  
        <td class="left"><?php echo $search_fields_sort; ?></td>  
				<td class="left"><?php echo $search_fields_css; ?></td>  
			</tr>
		</thead>
		<tbody>

      <?php foreach ($options['search_field'] as $field_name => $field_options) { ?>
      <tr>
	      <td width="1" style="text-align: center;">
		      <input type="checkbox" name="search_suggestion_options[search_field][<?php echo $field_name ?>][show]" value="1" <?php echo (isset($field_options['show']) && $field_options['show']) ? "checked=checked" : "" ;?> />
        </td>
        <td class="left"><?php echo ${'search_field_' . $field_name}; ?></td>              
			  <td class="left">
				  <input type="checkbox" name="search_suggestion_options[search_field][<?php echo $field_name ?>][show_field_name]" value="1" <?php echo (isset($field_options['show_field_name']) && $field_options['show_field_name']) ? "checked=checked" : "" ;?> />
		    </td>
        <td class="left">
          <?php if ($field_name == 'attributes') { ?>
	          <?php echo $search_fields_cut; ?>: <input type="text" name="search_suggestion_options[search_field][attributes][cut]" value="<?php echo isset($field_options['cut']) ? $field_options['cut'] : 0;?>" size="4">
		        <?php echo $search_fields_separator; ?>: <input type="text" name="search_suggestion_options[search_field][attributes][separator]" value="<?php echo isset($field_options['separator']) ? $field_options['separator'] : '/';?>" size="2">
          <?php } elseif ($field_name == 'image') { ?>
            <?php echo $search_field_image_width; ?>: <input type="text" name="search_suggestion_options[search_field][image][width]" value="<?php echo isset($field_options['width']) ? $field_options['width'] : 0; ?>" size="3">  
            <?php echo $search_field_image_height; ?>: <input type="text" name="search_suggestion_options[search_field][image][height]" value="<?php echo isset($field_options['height']) ? $field_options['height'] : 0; ?>" size="3">                
          <?php } elseif ($field_name == 'description') { ?>
            <?php echo $search_fields_cut; ?>: <input type="text" name="search_suggestion_options[search_field][description][cut]" value="<?php echo isset($field_options['cut']) ? $field_options['cut'] : 0;?>" size="4">
          <?php } ?>
			  </td>  
        <td class="left">
          <select name="search_suggestion_options[search_field][<?php echo $field_name ?>][location]">
            <option value="newline" <?php echo (isset($field_options['location']) && $field_options['location'] == 'newline') ? "selected='selected'" : "" ;?>>
              <?php echo $search_field_location_newline; ?>
            </option>            
            <option value="inline" <?php echo (isset($field_options['location']) && $field_options['location'] == 'inline') ? "selected='selected'" : "" ;?>>
              <?php echo $search_field_location_inline; ?>
            </option>
          </select>  
        </td>  
        <td class="left">
          <input type="text" name="search_suggestion_options[search_field][<?php echo $field_name ?>][sort]" value="<?php echo isset($field_options['sort']) ? (int)$field_options['sort'] : 0; ?>" size="3" />
        </td>  
		    <td class="left">
          .<?php echo $field_name ?> {<br />
			    <textarea name="search_suggestion_options[search_field][<?php echo $field_name ?>][css]" rows="4" cols="40"><?php echo isset($field_options['css']) ? $field_options['css'] : '';?></textarea>}
		    </td>
		  </tr>      
      <?php } ?>
      
	  </tbody>
	</table>

		<table id="fields_attributes" class="list">
			<thead>
				<tr>
					<td class="left"><?php echo $search_field_attributes; ?></td>              
					<td class="left"><?php echo $search_fields_attributes_show; ?></td>
					<td class="left"><?php echo $search_fields_attributes_replace_text; ?></td>  
				</tr>
			</thead>
			<tbody>

				<?php foreach($attributes as $attribute) {?>
				<tr>
					<td class="left"><?php echo $attribute['name']; ?></td>              
					<td>

						<select name="search_suggestion_options[search_field][attributes][attributes][<?php echo $attribute['attribute_id']; ?>][show]">

							<option value="0" <?php echo (isset($options['search_field']['attributes']['attributes'][$attribute['attribute_id']]['show']) && $options['search_field']['attributes']['attributes'][$attribute['attribute_id']]['show'] == '0') ? 'selected="selected"' : "" ;?>><?php echo $search_fields_attributes_hide; ?></option>
							<option value="1" <?php echo (isset($options['search_field']['attributes']['attributes'][$attribute['attribute_id']]['show']) && $options['search_field']['attributes']['attributes'][$attribute['attribute_id']]['show'] == '1') ? 'selected="selected"' : "" ;?>><?php echo $search_fields_attributes_show; ?></option>
							<option value="2" <?php echo (isset($options['search_field']['attributes']['attributes'][$attribute['attribute_id']]['show']) && $options['search_field']['attributes']['attributes'][$attribute['attribute_id']]['show'] == '2') ? 'selected="selected"' : "" ;?>><?php echo $search_fields_attributes_replace; ?></option>

						</select>

					</td>

					<td class="left">
						<input type="text" name="search_suggestion_options[search_field][attributes][attributes][<?php echo $attribute['attribute_id']; ?>][replace]" value="<?php echo isset($options['search_field']['attributes']['attributes'][$attribute['attribute_id']]['replace']) ? $options['search_field']['attributes']['attributes'][$attribute['attribute_id']]['replace'] : '';?>">
					</td>  

				</tr>
				<?php } ?>
			</tbody>
		</table>
		</div>

		<div id="tab-support">
			<?php echo $support_text; ?>
		</div>

		</form>
		</div>
		</div>
		<div id="copyright"></div>
		</div>
    
    <style type="text/css">
      .sorted_table tbody tr {
        cursor: move;
      }
    </style>
		<script type="text/javascript"><!--
    // Sortable rows
    $('.sorted_table tbody').sortable({
      cursor: 'move',
      update: function( event, ui ) {
        ui.item.parent().find('tr').each(function (i, row) {
          $(row).find('input[name*="[sort]"]').val(i);
        });
      }
    });
      
		$('#tabs a').tabs();
			$(document).ready(function() {
				// Hide attributes
				if ($('input[name=\'search_suggestion_options[search_field][attributes][show]\']').is(':not(:checked)')) {
					$('#fields_attributes').hide();
				}
			});
			$('input[name=\'search_suggestion_options[search_field][attributes][show]\']').live('change', function() {
				if ($(this).is(':checked')) {
					$('#fields_attributes').show();
				}
				else {
					$('#fields_attributes').hide();
				}
			});

		//--></script> 
		<?php echo $footer; ?>
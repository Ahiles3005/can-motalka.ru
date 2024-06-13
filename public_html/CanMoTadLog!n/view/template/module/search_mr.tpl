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
  <div class="box">
    <div class="heading">
      <h1><img src="view/image/module.png" alt="" /> <?php echo $heading_title; ?></h1>
      <div class="buttons">
        <a onclick="$('#form').submit();" class="button"><?php echo $button_save; ?></a>
        <a onclick="location = '<?php echo $cancel; ?>';" class="button"><?php echo $button_cancel; ?></a>
      </div>
    </div>
    <div class="content">
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">

        <div id="tabs" class="htabs">
          <a href="#tab-general"><?php echo $tab_general; ?></a>
	  		  <a href="#tab-add-fields"><?php echo $tab_add_fields; ?></a>
          <a href="#tab-relevance"><?php echo $tab_relevance; ?></a>
				  <a href="#tab-exclude-words"><?php echo $tab_exclude_words; ?></a>
          <a href="#tab-replace-words"><?php echo $tab_replace_words; ?></a>
          <a href="#tab-support"><?php echo $tab_support; ?></a>
        </div>      

        <div id="tab-general" style="width: 1000px; margin: 0 auto;">
          
          <br />
          <table id="general" class="list" style="width: 700px;">
              <tr>
                <td class="left"><?php echo $entry_key; ?></td>              
                <td width="500" style="text-align: left;">
                  <input type="text" size="70" name="search_mr_options[key]" value="<?php echo isset($options['key']) ? $options['key'] : '';?>">
                </td>
              </tr>
          </table>          
          <br />

          <table id="general" class="list" style="width: 1000px; margin: 0 auto;">
            <thead>
              <tr height="25">
                <td><?php echo $entry_fields_name; ?></td>
                <td><?php echo $entry_search; ?></td>
                <td><?php echo $entry_phrase; ?></td>
                <td><?php echo $entry_use_morphology; ?></td>
                <td><?php echo $entry_use_relevance; ?></td>
                <td><?php echo $entry_exclude_characters; ?></td>
                <td><?php echo $entry_search_logic; ?></td> 
              </tr>
            </thead>

            <tbody >

              <?php foreach($fields as $field): ?>

              <tr>

                <td>
									<?php echo isset(${"field_" . $field}) ? ${"field_" . $field} : $field; ?>
                </td>

                <td>
                  <select name="search_mr_options[fields][<?php echo $field; ?>][search]">
                    <option value="0" <?php echo (isset($options['fields'][$field]['search']) && $options['fields'][$field]['search'] == '0') ? 'selected="selected"' : "" ;?>><?php echo $text_search_dont_search; ?></option>										
                    <option value="equally"  <?php echo (isset($options['fields'][$field]['search']) && $options['fields'][$field]['search'] == 'equally')  ? 'selected="selected"' : "" ;?>><?php echo $text_search_equally; ?></option>
                    <option value="contains" <?php echo (isset($options['fields'][$field]['search']) && $options['fields'][$field]['search'] == 'contains') ? 'selected="selected"' : "" ;?>><?php echo $text_search_contains; ?></option>
                    <option value="start"    <?php echo (isset($options['fields'][$field]['search']) && $options['fields'][$field]['search'] == 'start') ? 'selected="selected"' : "" ;?>><?php echo $text_search_start; ?></option>
                  </select>
                </td>

                <td>
                  <select name="search_mr_options[fields][<?php echo $field; ?>][phrase]">
                    <option value="cut"  <?php echo (isset($options['fields'][$field]['phrase']) && $options['fields'][$field]['phrase'] == 'cut')  ? 'selected="selected"' : "" ;?>><?php echo $text_phrase_cut; ?></option>
                    <option value="dont_cut"  <?php echo (isset($options['fields'][$field]['phrase']) && $options['fields'][$field]['phrase'] == 'dont_cut')  ? 'selected="selected"' : "" ;?>><?php echo $text_phrase_dont_cut; ?></option>
                  </select>
                </td>

                <td>
                  <input type="checkbox" name="search_mr_options[fields][<?php echo $field; ?>][use_morphology]" value="1" <?php echo isset($options['fields'][$field]['use_morphology']) && $options['fields'][$field]['use_morphology'] ? "checked=checked" : "" ;?> />
                </td>              

                <td>
                  <input type="checkbox" name="search_mr_options[fields][<?php echo $field; ?>][use_relevance]" value="1" <?php echo isset($options['fields'][$field]['use_relevance']) && $options['fields'][$field]['use_relevance'] ? "checked=checked" : "" ;?> />
                </td>              
                
                <td>
                  <input type="text" name="search_mr_options[fields][<?php echo $field; ?>][exclude_characters]" value="<?php echo isset($options['fields'][$field]['exclude_characters']) ? $options['fields'][$field]['exclude_characters'] : '';?>" size="10" />
                </td>                              
               
                <td>
                  <select name="search_mr_options[fields][<?php echo $field; ?>][logic]">
                    <option value="OR"   <?php echo (isset($options['fields'][$field]['logic']) && $options['fields'][$field]['logic'] == 'OR')   ? 'selected="selected"' : "" ;?>><?php echo $text_logic_or; ?></option>
                    <option value="AND"  <?php echo (isset($options['fields'][$field]['logic']) && $options['fields'][$field]['logic'] == 'AND')  ? 'selected="selected"' : "" ;?>><?php echo $text_logic_and; ?></option>
                  </select>
                </td>
                                							
              </tr>

              <?php endforeach; ?>

            </tbody>  

          </table>
          
          <br />          
          <table id="general" class="list" style="width: 500px;">
            <tr>
              <td><?php echo $entry_min_word_length; ?></td> 
              <td>
                <input type="text" name="search_mr_options[min_word_length]" value="<?php echo isset($options['min_word_length']) ? $options['min_word_length'] : '' ; ?>" size="7" />
              </td>              
            </tr>
            <tr>
              <td><?php echo $entry_cache_results; ?></td> 
              <td>
                <input type="checkbox" name="search_mr_options[cache_results]" value="1" <?php echo isset($options['cache_results']) && $options['cache_results'] ? "checked=checked" : ""; ?>/>
              </td>              
            </tr>
            <tr>
              <td><?php echo $entry_fix_keyboard_layout; ?></td> 
              <td>
                <select name="search_mr_options[fix_keyboard_layout]">
                  <option value="0"   <?php echo (isset($options['fix_keyboard_layout']) && $options['fix_keyboard_layout'] == '0') ? 'selected="selected"' : ""; ?>><?php echo $text_disabled; ?></option>
                  <option value="always"   <?php echo (isset($options['fix_keyboard_layout']) && $options['fix_keyboard_layout'] == 'always') ? 'selected="selected"' : ""; ?>><?php echo $text_always; ?></option>
                  <option value="nothing_found"   <?php echo (isset($options['fix_keyboard_layout']) && $options['fix_keyboard_layout'] == 'nothing_found') ? 'selected="selected"' : ""; ?>><?php echo $text_nothing_found; ?></option>
                </select>									
              </td>              
            </tr>
            <tr>
              <td><?php echo $entry_sort_order_stock; ?></td> 
              <td>
                <select name="search_mr_options[sort_order_stock]">
                  <option value="0"   <?php echo (isset($options['sort_order_stock']) && $options['sort_order_stock'] == '0') ? 'selected="selected"' : ""; ?>><?php echo $text_disabled; ?></option>
                  <option value="1"   <?php echo (isset($options['sort_order_stock']) && $options['sort_order_stock'] == '1') ? 'selected="selected"' : ""; ?>><?php echo $text_enabled; ?></option>
                </select>									
              </td>              
            </tr>
          </table>

          <?php echo $help_tab_general; ?>
        </div>

        <div id="tab-relevance">

          <table id="relevance" class="list" style="width: 1000px; margin: 0 auto;">
            <thead>
              <tr height="25">
                <td><?php echo $entry_fields_name; ?></td>
                <td><?php echo $entry_relevance_start; ?></td>
                <td><?php echo $entry_relevance_phrase; ?></td>
                <td><?php echo $entry_relevance_word; ?></td>
              </tr>
            </thead>

            <tbody >

              <?php foreach($fields as $field): ?>

              <tr>

                <td>
                  <?php echo isset(${"field_" . $field}) ? ${"field_" . $field} : $field; ?>
                </td>

                <td>
                  <input type="text" name="search_mr_options[fields][<?php echo $field; ?>][relevance][start]" value="<?php echo isset($options['fields'][$field]['relevance']['start']) ? $options['fields'][$field]['relevance']['start'] : 0; ?>" />
                </td>              

                <td>
                  <input type="text" name="search_mr_options[fields][<?php echo $field; ?>][relevance][phrase]" value="<?php echo isset($options['fields'][$field]['relevance']['phrase']) ? $options['fields'][$field]['relevance']['phrase'] : 0; ?>" />
                </td>              

                <td>
                  <input type="text" name="search_mr_options[fields][<?php echo $field; ?>][relevance][word]" value="<?php echo isset($options['fields'][$field]['relevance']['word']) ? $options['fields'][$field]['relevance']['word'] : 0; ?>" />
                </td>              

              </tr>

              <?php endforeach; ?>

            </tbody>  

          </table>
          <?php echo $help_tab_relevance; ?>
        </div>

				<div id="tab-add-fields">
          <table id="add-fields" class="list" style="width: 1000px; margin: 0 auto;">
            <thead>
              <tr height="25">
                <td class="left"><?php echo $entry_field; ?><span class="required">*</span></td>
  							<td class="left"><?php echo $entry_join; ?></td>
								<td class="left"><?php echo $entry_where; ?></td>
                <td></td>
              </tr>
            </thead>
            <tbody >
							<?php $fields_row = 0; ?>
							<?php if (!empty($options['new_fields'])) { ?>
								<?php foreach ($options['new_fields'] as $field) { ?>

									<tr id="fields-row<?php echo $fields_row; ?>">
										<td class="left">
											<input type="text" name="search_mr_options[new_fields][<?php echo $fields_row; ?>][field]" value="<?php echo $field['field']; ?>"/>
											<?php if (isset($error_new_fields[$field['field']])) { ?>
												<div class="error"><?php echo $error_new_fields[$field['field']]; ?></div>
											<?php } ?>
										</td>
										<td class="left"><input type="text" name="search_mr_options[new_fields][<?php echo $fields_row; ?>][join]" value="<?php echo $field['join']; ?>"/></td>
										<td class="left"><input type="text" name="search_mr_options[new_fields][<?php echo $fields_row; ?>][where]" value="<?php echo $field['where']; ?>"/></td>
										<td class="left">
											<a onclick="$('#fields-row<?php echo $fields_row; ?>').remove()" class="button"><?php echo $button_remove; ?></a>
										</td>
									</tr>
									<?php $fields_row++; ?>
								<?php } ?>
							<?php } ?>
						</tbody>
						<tfoot>
							<tr>
								<td colspan="3"></td>
								<td class="left"><a onclick="addField()" class="button"><?php echo $button_add_field; ?></a></td>
							</tr>
						</tfoot>
					</table>

          <?php echo $help_tab_add_fields; ?>
				
				</div>
				
        <div id="tab-exclude-words">

          <div id="exclude-words-languages" class="htabs">
            <?php foreach ($languages as $language) { ?>
            <a href="#exclude-words-language<?php echo $language['language_id']; ?>"><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?></a>
            <?php } ?>
          </div>
          
          <?php foreach ($languages as $language) { ?>
          <div id="exclude-words-language<?php echo $language['language_id']; ?>">
            <table class="form">
              <tr>
                <td>
                  <textarea name="search_mr_options[exclude_words][<?php echo $language['language_id']; ?>]" cols="80" rows="20"><?php echo isset($options['exclude_words'][$language['language_id']]) ? $options['exclude_words'][$language['language_id']] : ''; ?></textarea>
                </td>
              </tr>
              <tr>
                <td>
                  <?php echo $help_tab_exclude_words; ?>
                </td>
              </tr>
            </table>
          </div>
          <?php } ?>
          
        </div>

        <div id="tab-replace-words">
          
          <div id="replace-words-languages" class="htabs">
            <?php foreach ($languages as $language) { ?>
            <a href="#replace-words-language<?php echo $language['language_id']; ?>"><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?></a>
            <?php } ?>
          </div>
          
          <?php foreach ($languages as $language) { ?>
          <div id="replace-words-language<?php echo $language['language_id']; ?>">
            <table class="form">
              <tr>
                <td>
                  <textarea name="search_mr_options[replace_words][<?php echo $language['language_id']; ?>]" cols="80" rows="20"><?php echo isset($options['replace_words'][$language['language_id']]) ? $options['replace_words'][$language['language_id']] : ''; ?></textarea>
                </td>
              </tr>
              <tr>
                <td>
                  <?php echo $help_tab_replace_words; ?>
                </td>
              </tr>
            </table>
          </div>
          <?php } ?>
          
        </div>
        
        <div id="tab-support">
          <?php echo $help_support; ?>
        </div>

      </form>
    </div>
  </div>
  <div id="copyright"></div>
</div>

<script type="text/javascript"><!--
$('#tabs a').tabs();
$('#exclude-words-languages a').tabs();
$('#replace-words-languages a').tabs();  
//--></script>

<script type="text/javascript"><!--
var fields_row = <?php echo $fields_row; ?>;

function addField() {
	fields_row++;

	html  = '';
	html += '<tr id="fields-row' + fields_row + '">';
	html += '  <td class="left">';
	html += '    <input type="text" name="search_mr_options[new_fields][' + fields_row + '][field]" value="" class="form-control"/>';
	html += '  </td>';
	html += '  <td class="left">';
	html += '    <input type="text" name="search_mr_options[new_fields][' + fields_row + '][join]" value="" class="form-control"/>';
	html += '  </td>';
	html += '  <td class="left">';
	html += '    <input type="text" name="search_mr_options[new_fields][' + fields_row + '][where]" value="" class="form-control"/>';
	html += '  </td>';
	html += '  <td class="left">';
	html += '    <a onclick="$(\'#fields-row' + fields_row + '\').remove()" class="button"><?php echo $button_remove; ?></a>';
	html += '  </td>';
	html += '</tr>';

	$('#tab-add-fields table tbody').append(html);
}
//--></script>
<?php echo $footer; ?>
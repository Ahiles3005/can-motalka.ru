<div>
  <form action="POST" id="filter-form">
    <table class="form">
	  <tr>
        <td><span class="required">*</span> <?php echo $entry_group; ?></td>
        <td><?php foreach ($languages as $language) { ?>
          <input type="text" name="filter_group_description[<?php echo $language['language_id']; ?>][name]" value="<?php echo isset($filter_group_description[$language['language_id']]) ? $filter_group_description[$language['language_id']]['name'] : ''; ?>" />
          <img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /><br />
          <?php if (isset($error_name[$language['language_id']])) { ?>
          <span class="error"><?php echo $error_name[$language['language_id']]; ?></span><br />
          <?php } ?>
          <?php } ?></td>
      </tr>		  
      <tr>
        <td><?php echo $entry_sort_order; ?></td>
        <td><input type="text" name="sort_order" value="<?php echo $sort_order; ?>" size="1" /></td>
      </tr>
    </table>
    <table id="filter" class="list">
      <thead>
        <tr>
          <td class="left"><span class="required">*</span> <?php echo $entry_name ?></td>
          <td class="right"><?php echo $entry_sort_order; ?></td>
          <td></td>
        </tr>
      </thead>
      <?php $filter_row = 0; ?>
      <?php foreach ($filters as $filter) { ?>
      <tbody id="filter-row<?php echo $filter_row; ?>">
        <tr>
          <td class="left"><input type="hidden" name="filter[<?php echo $filter_row; ?>][filter_id]" value="<?php echo $filter['filter_id']; ?>" />
            <?php foreach ($languages as $language) { ?>
              <input type="text" name="filter[<?php echo $filter_row; ?>][filter_description][<?php echo $language['language_id']; ?>][name]" value="<?php echo isset($filter['filter_description'][$language['language_id']]) ? $filter['filter_description'][$language['language_id']]['name'] : ''; ?>" />
              <img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /><br />
              <?php if (isset($error_filter[$filter_row][$language['language_id']])) { ?>
                <span class="error"><?php echo $error_filter[$filter_row][$language['language_id']]; ?></span>
              <?php } ?>
              <?php } ?></td>
           <td class="right"><input type="text" name="filter[<?php echo $filter_row; ?>][sort_order]" value="<?php echo $filter['sort_order']; ?>" size="1" /></td>
           <td class="left"><a onclick="$('#filter-row<?php echo $filter_row; ?>').remove();" class="button"><?php echo $button_remove; ?></a></td>
         </tr>
       </tbody>
       <?php $filter_row++; ?>
       <?php } ?>
       <tfoot>
         <tr>
           <td colspan="2"></td>
           <td class="left"><a onclick="addFilter();" class="button"><?php echo $button_add_filter; ?></a></td>
         </tr>
       </tfoot>
	</table>
  </form>
</div>
<script type="text/javascript"><!--
var filter_row = <?php echo $filter_row; ?>;

function addFilter() {
	html  = '<tbody id="filter-row' + filter_row + '">';
	html += '  <tr>';	
    html += '    <td class="left"><input type="hidden" name="filter[' + filter_row + '][filter_id]" value="" />';
	<?php foreach ($languages as $language) { ?>
	html += '    <input type="text" name="filter[' + filter_row + '][filter_description][<?php echo $language['language_id']; ?>][name]" value="" /> <img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /><br />';
    <?php } ?>
	html += '    </td>';
	html += '    <td class="right"><input type="text" name="filter[' + filter_row + '][sort_order]" value="" size="1" /></td>';
	html += '     <td class="left"><a onclick="$(\'#filter-row' + filter_row + '\').remove();" class="button"><?php echo $button_remove; ?></a></td>';
	html += '  </tr>';	
    html += '</tbody>';
	
	$('#filter tfoot').before(html);
	
	filter_row++;
}
//--></script> 
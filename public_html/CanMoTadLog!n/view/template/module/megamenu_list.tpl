<?php echo $header; ?>
<div id="content">
<div class="breadcrumb">
<?php foreach ($breadcrumbs as $i=> $breadcrumb) { ?>
<?php if($i+1<count($breadcrumbs)) { ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a> <?php } else { ?><?php echo $breadcrumb['text']; ?><?php } ?>
<?php } ?>
</div>
  <?php if ($error) { ?>
  <div class="warning"><?php echo $error; ?></div>
  <?php } ?>
     <?php if ($success) { ?>
  <div class="success"><?php echo $success; ?></div>
  <?php } ?>
  <div class="box">
    <div class="heading">
      <h1><img src="view/image/module.png" alt="" /> <?php echo $heading_title; ?></h1>
      <div class="buttons">
	  <a onclick="$('#form-megamenu_status').submit();" class="button"><?php echo $button_save; ?></a>
	  <a href="<?php echo $add; ?>" class="button"><?php echo $button_add; ?></a>	
	  <a onclick="confirm('<?php echo $text_confirm; ?>') ? $('#form-megamenu').submit() : false;" class="button"><?php echo $button_delete; ?></a>
	  
       <a href="<?php echo $refresh; ?>" class="button"><?php echo $text_refresh; ?></a>
	
      
	   <a href="<?php echo $cancel; ?>" class="button"><?php echo $button_cancel; ?></a>
	
       
	 
	  
	  </div>
    </div>
    <div class="content">
	
	 <form id="form-megamenu_status" name="form-megamenu_status" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
      
			  
			  <table class="form">
            <tbody><tr>
              <td><?=$entry_status?>:</td>


              <td>
		<select name="megamenu_status" id="input-status" class="form-control">
                <?php if ($megamenu_status) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select>
													
													</td>
            </tr>
			      </table>
		  </form>

        <form action="<?php echo $delete; ?>" method="post" enctype="multipart/form-data" id="form-megamenu">
        <table id="module" class="list">
          <thead>
           <tr>
				  <td width="1" style="text-align: center;">
				  <input type="checkbox" onclick="if($(this).prop('checked')) $('input[name*=\'selected\']').prop('checked', true);else $('input[name*=\'selected\']').prop('checked', false);" /></td>
				  <td class="left"><?php echo $text_th_title; ?></td>			
				  <td class="left"><?php echo $text_th_link; ?></td>
				  <td class="left"><?php echo $text_th_sort_order; ?></td>				  
				  <td class="right"><?php echo $text_action; ?></td>
				</tr>
          </thead>
        
         	  <tbody>
				<?php if ($all_items) { ?>
				  <?php foreach ($all_items as $item) { ?>
				  <tr>
					<td width="1" style="text-align: center;"><input type="checkbox" name="selected[]" value="<?php echo $item['id']; ?>" /></td>
					<td class="left"><?php echo $item['title']; ?></td>				
					<td class="left"><?php echo $item['link']; ?></td>
					<td class="left"><?php echo $item['sort_order']; ?></td>
					<td class="right">
				
					  <a href="<?php echo $item['edit']; ?>" class="button"><?php echo $text_edit; ?></a>
					</td>
					
				  </tr>
				  <?php } ?>
				<?php } else { ?>
				  <tr>
					<td colspan="5" class="center"><?php echo $text_no_results; ?></td>
				  </tr>
				<?php } ?>
			  </tbody>
        
        
        </table>
      </form>
    </div>
  </div>
</div>
<?php echo $footer; ?>
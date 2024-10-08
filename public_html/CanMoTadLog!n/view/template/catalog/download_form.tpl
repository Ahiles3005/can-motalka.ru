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
      <h1><img src="view/image/download.png" alt="" /> <?php echo $heading_title; ?></h1>
      <div class="buttons"><a onclick="$('#form').submit();" class="button"><?php echo $button_save; ?></a><a href="<?php echo $cancel; ?>" class="button"><?php echo $button_cancel; ?></a></div>
    </div>
    <div class="contentes">
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
        <table class="form">
          <tr>
            <td><span class="required">*</span> <?php echo $entry_name; ?></td>
            <td><?php foreach ($languages as $language) { ?>
              <input type="text" name="download_description[<?php echo $language['language_id']; ?>][name]" value="<?php echo isset($download_description[$language['language_id']]) ? $download_description[$language['language_id']]['name'] : ''; ?>" />
              <img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /><br />
              <?php if (isset($error_name[$language['language_id']])) { ?>
              <span class="error"><?php echo $error_name[$language['language_id']]; ?></span><br />
              <?php } ?>
              <?php } ?></td>
          </tr>
          <tr>
            <td><?php echo $entry_filename; ?></td>
            <td><input type="text" name="filename" value="<?php echo $filename; ?>" /> <input type="button" value="<?php echo $button_upload; ?>" id="button-upload" class="button" onclick="$('input[name=\'file\']').click();" />
              <?php if ($error_filename) { ?>
              <span class="error"><?php echo $error_filename; ?></span>
              <?php } ?></td>
          </tr>
          <tr>
            <td><?php echo $entry_mask; ?></td>
            <td><input type="text" name="mask" value="<?php echo $mask; ?>" />
              <?php if ($error_mask) { ?>
              <span class="error"><?php echo $error_mask; ?></span>
              <?php } ?></td>
          </tr>
          <tr>
            <td><?php echo $entry_remaining; ?></td>
            <td><input type="text" name="remaining" value="<?php echo $remaining; ?>" size="6" /></td>
          </tr>
          <?php if ($download_id) { ?>
          <tr>
            <td><?php echo $entry_update; ?></td>
            <td><?php if ($update) { ?>
              <input type="checkbox" name="update" value="1" checked="checked" />
              <?php } else { ?>
              <input type="checkbox" name="update" value="1" />
              <?php } ?></td>
          </tr>
          <?php } ?>
        </table>
      </form>
    </div>
	<div class="foot_heading">
      <h1><img src="view/image/download.png" alt="" /> <?php echo $heading_title; ?></h1>
      <div class="buttons"><a onclick="$('#form').submit();" class="button"><?php echo $button_save; ?></a><a href="<?php echo $cancel; ?>" class="button"><?php echo $button_cancel; ?></a></div>
    </div>
  </div>
</div>
<div style="display: none;">
  <form enctype="multipart/form-data">
    <input type="file" name="file" id="file" />
  </form>
</div>
<script type="text/javascript"><!--
$('#file').on('change', function() {
    $.ajax({
        url: 'index.php?route=catalog/download/upload&token=<?php echo $token; ?>',
        type: 'post',		
		dataType: 'json',
		data: new FormData($(this).parent()[0]),
		beforeSend: function() {
			$('#button-upload').after('<img src="view/image/loading.gif" class="loading" style="padding-left: 5px;" />');
			$('#button-upload').attr('disabled', true);
		},	
		complete: function() {
			$('.loading').remove();
			$('#button-upload').attr('disabled', false);
		},		
		success: function(json) {
			if (json['error']) {
				alert(json['error']);
			}
						
			if (json['success']) {
				alert(json['success']);
				
				$('input[name=\'filename\']').attr('value', json['filename']);
				$('input[name=\'mask\']').attr('value', json['mask']);
			}
		},			
		error: function(xhr, ajaxOptions, thrownError) {
			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		},
        cache: false,
        contentType: false,
        processData: false
    });
});
//--></script> 
<?php echo $footer; ?>
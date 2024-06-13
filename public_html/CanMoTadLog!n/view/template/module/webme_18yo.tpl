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
		<a onclick="location='<?php echo $cancel; ?>';" class="button"><?php echo $button_cancel; ?></a>
<!-- [w] update checker data __DO_NOT_EDIT__ :: begin //-->
		<span style="padding: 0px 15px 0px 15px;">||</span>
		<a id="version_update_checker" class="button" style="margin-left:0px;"><img src="view/image/webme/check_updates.png" style="cursor:pointer; height:12px; padding-right:5px;"><?php echo $text_check_updates; ?></a>
<!-- [w] update checker data __DO_NOT_EDIT__ :: end //-->
	</div>
  </div>
  <div class="content">
    
    
<!-- [w] update checker data __DO_NOT_EDIT__ :: begin //-->
    <div id="ext_check_version_result"></div>
<!-- [w] update checker data __DO_NOT_EDIT__ :: end //-->
    
    
    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
      <table class="form">
        <tr>
          <td><span class="required">*</span> <?php echo $entry_agreement; ?></td>
          <td><textarea cols="60" rows="8" name="webme_18yo_agreement"><?php echo $webme_18yo_agreement; ?></textarea>
            <?php if ($error_agreement) { ?>
            <span class="error"><?php echo $error_agreement; ?></span>
            <?php } ?></td>
        </tr>
        <tr>
          <td><span class="required">*</span> <?php echo $entry_cookie_days_lifetime; ?></td>
          <td><input type="text" size="10" name="webme_18yo_cookie_days_lifetime" value="<?php echo $webme_18yo_cookie_days_lifetime; ?>" />
            <?php if ($error_cookie_days_lifetime) { ?>
            <span class="error"><?php echo $error_cookie_days_lifetime; ?></span>
            <?php } ?></td>
        </tr>
        <tr>
          <td><?php echo $entry_debug_mode; ?></td>
          <td><select name="webme_18yo_debug_mode">
              <?php if ($webme_18yo_debug_mode) { ?>
              <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
              <option value="0"><?php echo $text_disabled; ?></option>
              <?php } else { ?>
              <option value="1"><?php echo $text_enabled; ?></option>
              <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
              <?php } ?>
            </select></td>
        </tr>
        <tr>
          <td><span class="required">*</span> <?php echo $entry_disagreement_link; ?></td>
          <td><input type="text" size="60" name="webme_18yo_disagreement_link" value="<?php echo $webme_18yo_disagreement_link; ?>" />
            <?php if ($error_disagreement_link) { ?>
            <span class="error"><?php echo $error_disagreement_link; ?></span>
            <?php } ?></td>
        </tr>
        <tr>
          <td><?php echo $entry_status; ?></td>
          <td><select name="webme_18yo_status">
              <?php if ($webme_18yo_status) { ?>
              <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
              <option value="0"><?php echo $text_disabled; ?></option>
              <?php } else { ?>
              <option value="1"><?php echo $text_enabled; ?></option>
              <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
              <?php } ?>
            </select></td>
        </tr>
      </table>
    </form>
  </div>
</div>
</div>

<!-- [w] update checker data __DO_NOT_EDIT__ :: begin //-->
<style type="text/css">
.success .close, .warning .close, .attention .close, .information .close {
	float: right;
	padding-top: 4px;
	padding-right: 4px;
	cursor: pointer;
}
</style>

<script type="text/javascript"><!--
$('#version_update_checker').live('click', function(){
	$('#ext_check_version_result').html('');
	var close_image = '<img src="view/image/webme/close.png" alt="" class="close">';
	$.ajax({
			url: '<?php echo $updateCheckerUrl; ?>',
			dataType: 'json',
			success: function(data) {
				html = '<div class="error"><?php echo $error_check_update; ?>'+close_image+'</div>';
				if (data.error) {
					html = '';
					html += '<div class="warning">'+data.error+''+close_image+'</div>';
				}
				if (data.up_to_date) {
					html = '';
					html += '<div class="success">'+data.up_to_date+''+close_image+'</div>';
				}
				if (data.get_update) {
					html = '';
					html += '<div class="attention">'+data.get_update+''+close_image+'</div>';
				}
				
				$('#ext_check_version_result').html(html);
			}
		});
	return false;
});

$('.success img, .warning img, .attention img, .information img').live('click', function() {
	$(this).parent().fadeOut('slow', function() {
		$(this).remove();
	});
});
//--></script>
<!-- [w] update checker data __DO_NOT_EDIT__ :: end //-->

<?php echo $footer; ?>
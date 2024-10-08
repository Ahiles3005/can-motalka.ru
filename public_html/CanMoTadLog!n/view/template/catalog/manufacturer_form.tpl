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
      <h1><img src="view/image/shipping.png" alt="" /> <?php echo $heading_title; ?></h1>
      <div class="buttons"><a onclick="$('#form').submit();" class="button"><?php echo $button_save; ?></a><a href="<?php echo $cancel; ?>" class="button"><?php echo $button_cancel; ?></a></div>
    </div>
    <div class="contentes">
      <div id="tabs" class="htabs"><a href="#tab-general"><?php echo $tab_general; ?></a><a href="#tab-data"><?php echo $tab_data; ?></a></div>
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
        <div id="tab-general">
          <table class="form">
            <tr>
              <td><span class="required">*</span> <?php echo $entry_name; ?></td>
              <td><input type="text" name="name" value="<?php echo $name; ?>" size="103" />
                <?php if ($error_name) { ?>
                <span class="error"><?php echo $error_name; ?></span>
                <?php } ?></td>
            </tr>
			<tr>
              <td><?php echo $entry_keyword; ?></td>
              <td><input type="text" name="keyword" value="<?php echo $keyword; ?>" size="103" /></td>
            </tr>
            <tr>
		  </table>
		  <table class="form">
		    <tr>
			  <td>
				<div id="languages" class="htabs">
				  <?php foreach ($languages as $language) { ?>
					<a href="#language<?php echo $language['language_id']; ?>"><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?></a>
				  <?php } ?>
				</div>
				<?php foreach ($languages as $language) { ?>
				  <div id="language<?php echo $language['language_id']; ?>">
					<table class="form">
					  <tr>
						<td><?php echo $entry_seo_h1; ?></td>
						<td><input type="text" name="manufacturer_description[<?php echo $language['language_id']; ?>][seo_h1]" size="103" value="<?php echo isset($manufacturer_description[$language['language_id']]) ? $manufacturer_description[$language['language_id']]['seo_h1'] : ''; ?>" /></td>
					  </tr>
					  <tr>
						<td><?php echo $entry_seo_title; ?></td>
						<td><input type="text" name="manufacturer_description[<?php echo $language['language_id']; ?>][seo_title]" size="103" value="<?php echo isset($manufacturer_description[$language['language_id']]) ? $manufacturer_description[$language['language_id']]['seo_title'] : ''; ?>" /></td>
					  </tr>
					  <tr>
						<td><?php echo $entry_meta_keyword; ?></td>
						<td><input type="text" name="manufacturer_description[<?php echo $language['language_id']; ?>][meta_keyword]" size="103" value="<?php echo isset($manufacturer_description[$language['language_id']]) ? $manufacturer_description[$language['language_id']]['meta_keyword'] : ''; ?>" /></td>
					  </tr>
					  <tr>
						<td><?php echo $entry_meta_description; ?></td>
						<td><textarea name="manufacturer_description[<?php echo $language['language_id']; ?>][meta_description]" cols="100" rows="2"><?php echo isset($manufacturer_description[$language['language_id']]) ? $manufacturer_description[$language['language_id']]['meta_description'] : ''; ?></textarea></td>
					  </tr>
					  <tr>
						<td><?php echo $entry_description; ?></td>
						<td><textarea name="manufacturer_description[<?php echo $language['language_id']; ?>][description]" id="description<?php echo $language['language_id']; ?>"><?php echo isset($manufacturer_description[$language['language_id']]) ? $manufacturer_description[$language['language_id']]['description'] : ''; ?></textarea></td>
					  </tr>
					</table>
				  </div>
				<?php } ?>
			  </td>
			</tr>
		  </table>
		</div>
		<div id="tab-data">
          <table class="form">
		    <tr>
              <td><?php echo $entry_store; ?></td>
              <td>
			    <div class="scrollbox">
                  <?php $class = 'even'; ?>
                  <div class="<?php echo $class; ?>">
                    <?php if (in_array(0, $manufacturer_store)) { ?>
                      <input type="checkbox" name="manufacturer_store[]" value="0" checked="checked" />
                      <?php echo $text_default; ?>
                    <?php } else { ?>
                      <input type="checkbox" name="manufacturer_store[]" value="0" />
                      <?php echo $text_default; ?>
                    <?php } ?>
                  </div>
                  <?php foreach ($stores as $store) { ?>
                    <?php $class = ($class == 'even' ? 'odd' : 'even'); ?>
                    <div class="<?php echo $class; ?>">
                      <?php if (in_array($store['store_id'], $manufacturer_store)) { ?>
                        <input type="checkbox" name="manufacturer_store[]" value="<?php echo $store['store_id']; ?>" checked="checked" />
                        <?php echo $store['name']; ?>
                      <?php } else { ?>
                        <input type="checkbox" name="manufacturer_store[]" value="<?php echo $store['store_id']; ?>" />
                        <?php echo $store['name']; ?>
                      <?php } ?>
                    </div>
                  <?php } ?>
                </div>
			  </td>
            </tr>
            <tr>
              <td><?php echo $entry_image; ?></td>
              <td valign="top"><div class="image"><img src="<?php echo $thumb; ?>" alt="" id="thumb" />
                <input type="hidden" name="image" value="<?php echo $image; ?>" id="image" />
                <br /><a onclick="image_upload('image', 'thumb');"><?php echo $text_browse; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onclick="$('#thumb').attr('src', '<?php echo $no_image; ?>'); $('#image').attr('value', '');"><?php echo $text_clear; ?></a></div></td>
            </tr>
            <tr>
              <td><?php echo $entry_sort_order; ?></td>
              <td><input type="text" name="sort_order" value="<?php echo $sort_order; ?>" size="1" /></td>
            </tr>
          </table>
        </div>
      </form>
    </div>
	<div class="foot_heading">
      <h1><img src="view/image/shipping.png" alt="" /> <?php echo $heading_title; ?></h1>
      <div class="buttons"><a onclick="$('#form').submit();" class="button"><?php echo $button_save; ?></a><a href="<?php echo $cancel; ?>" class="button"><?php echo $button_cancel; ?></a></div>
    </div>
  </div>
</div>
<script type="text/javascript" src="view/javascript/ckeditor/ckeditor.js"></script> 
<script type="text/javascript"><!--
<?php foreach ($languages as $language) { ?>
CKEDITOR.replace('description<?php echo $language['language_id']; ?>', {
	filebrowserBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserImageBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserFlashBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserImageUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserFlashUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>'
});
<?php } ?>
//--></script> 
<script type="text/javascript"><!--
function image_upload(field, thumb) {
	$('#dialog').remove();
	
	$('#content').prepend('<div id="dialog" style="padding: 3px 0px 0px 0px;"><iframe src="index.php?route=common/filemanager&token=<?php echo $token; ?>&field=' + encodeURIComponent(field) + '" style="padding:0; margin: 0; display: block; width: 100%; height: 100%;" frameborder="no" scrolling="auto"></iframe></div>');
	
	$('#dialog').dialog({
		title: '<?php echo $text_image_manager; ?>',
		close: function (event, ui) {
			if ($('#' + field).attr('value')) {
				$.ajax({
					url: 'index.php?route=common/filemanager/image&token=<?php echo $token; ?>&image=' + encodeURIComponent($('#' + field).val()),
					dataType: 'text',
					success: function(data) {
						$('#' + thumb).replaceWith('<img src="' + data + '" alt="" id="' + thumb + '" />');
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
//--></script> 
<script type="text/javascript"><!--
$('#tabs a').tabs(); 
$('#languages a').tabs();
//--></script> 
<?php echo $footer; ?>
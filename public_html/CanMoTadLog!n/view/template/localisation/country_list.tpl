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
  <?php if ($success) { ?>
  <div class="success"><?php echo $success; ?></div>
  <?php } ?>
  <div class="box">
    <div class="heading">
      <h1 class="language-page"><?php echo $heading_title; ?></h1>
      <div class="buttons"><a href="<?php echo $insert; ?>" class="add"><?php echo $button_insert; ?></a><a onclick="$('form').submit();" class="rem"><?php echo $button_delete; ?></a></div>
    </div>
    <div class="contentes">
      <form action="<?php echo $delete; ?>" method="post" enctype="multipart/form-data" id="form">
        <table class="list">
          <thead>
            <tr>
              <td width="1" style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" /></td>
              <td class="left"><?php if ($sort == 'name') { ?>
                <a href="<?php echo $sort_name; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_name; ?></a>
                <?php } else { ?>
                <a href="<?php echo $sort_name; ?>"><?php echo $column_name; ?></a>
                <?php } ?></td>
              <td class="left"><?php if ($sort == 'iso_code_2') { ?>
                <a href="<?php echo $sort_iso_code_2; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_iso_code_2; ?></a>
                <?php } else { ?>
                <a href="<?php echo $sort_iso_code_2; ?>"><?php echo $column_iso_code_2; ?></a>
                <?php } ?></td>
              <td class="left"><?php if ($sort == 'iso_code_3') { ?>
                <a href="<?php echo $sort_iso_code_3; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_iso_code_3; ?></a>
                <?php } else { ?>
                <a href="<?php echo $sort_iso_code_3; ?>"><?php echo $column_iso_code_3; ?></a>
                <?php } ?></td>
			  <td class="center"><?php echo $column_status; ?></td>
              <td class="center"><?php echo $column_action; ?></td>
            </tr>
          </thead>
          <tbody>
            <?php if ($countries) { ?>
            <?php foreach ($countries as $country) { ?>
            <tr>
              <td style="text-align: center;"><?php if ($country['selected']) { ?>
                <input type="checkbox" name="selected[]" value="<?php echo $country['country_id']; ?>" checked="checked" />
                <?php } else { ?>
                <input type="checkbox" name="selected[]" value="<?php echo $country['country_id']; ?>" />
                <?php } ?></td>
              <td class="left"><?php echo $country['name']; ?></td>
              <td class="left"><?php echo $country['iso_code_2']; ?></td>
              <td class="left"><?php echo $country['iso_code_3']; ?></td>
			  <td align="center" width="100"><a class="ajax-status tooltip" id="status-<?php echo $country['country_id']; ?>" title="Вкл\Выкл страну"><?php echo $country['status']; ?></a></td>
              <td class="center" width="80">
			    <?php foreach ($country['action'] as $action) { ?>
				  <?php if ($this->config->get('config_buttons_apply') == 0) { ?>
					[ <a href="<?php echo $action['href']; ?>"><?php echo $action['text']; ?></a> ]
				  <?php } else { ?>
				    <a href="<?php echo $action['href']; ?>"><?php echo $action['text']; ?></a>
				  <?php } ?>
                <?php } ?>
			  </td>
            </tr>
            <?php } ?>
            <?php } else { ?>
            <tr>
              <td class="center" colspan="5"><?php echo $text_no_results; ?></td>
            </tr>
            <?php } ?>
          </tbody>
		  <tfoot>
            <tr>
              <td width="1" style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" /></td>
              <td class="left"><?php if ($sort == 'name') { ?>
                <a href="<?php echo $sort_name; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_name; ?></a>
                <?php } else { ?>
                <a href="<?php echo $sort_name; ?>"><?php echo $column_name; ?></a>
                <?php } ?></td>
              <td class="left"><?php if ($sort == 'iso_code_2') { ?>
                <a href="<?php echo $sort_iso_code_2; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_iso_code_2; ?></a>
                <?php } else { ?>
                <a href="<?php echo $sort_iso_code_2; ?>"><?php echo $column_iso_code_2; ?></a>
                <?php } ?></td>
              <td class="left"><?php if ($sort == 'iso_code_3') { ?>
                <a href="<?php echo $sort_iso_code_3; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_iso_code_3; ?></a>
                <?php } else { ?>
                <a href="<?php echo $sort_iso_code_3; ?>"><?php echo $column_iso_code_3; ?></a>
                <?php } ?></td>
			  <td class="center"><?php echo $column_status; ?></td>
              <td class="center"><?php echo $column_action; ?></td>
            </tr>
          </tfoot>
        </table>
      </form>
      <div class="pagination"><?php echo $pagination; ?></div>
    </div>
	<div class="foot_heading">
      <h1 class="language-page"><?php echo $heading_title; ?></h1>
      <div class="buttons"><a href="<?php echo $insert; ?>" class="add"><?php echo $button_insert; ?></a><a onclick="$('form').submit();" class="rem"><?php echo $button_delete; ?></a></div>
    </div>
  </div>
</div>
<script type="text/javascript"><!--
$('.ajax-status').click(function() {
	var object_id=$(this).attr('id');
	$.ajax({
		url: 'index.php?route=localisation/country/changeStatus&token=<?php echo $token; ?>',
		type: 'get',
		data: {object_id:object_id},
		dataType: 'html',
		success: function(html) {
			if(html!=''){				
				$('#'+object_id).html(html);
			}
		}
	});
});
//--></script>
<?php echo $footer; ?>
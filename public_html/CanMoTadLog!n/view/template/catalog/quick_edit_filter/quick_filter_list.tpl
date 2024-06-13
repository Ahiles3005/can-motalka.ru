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
      <h1 class="page-filter"><?php echo $heading_title; ?></h1>
      <div class="buttons"><a href="<?php echo $insert; ?>" class="add"><?php echo $button_insert; ?></a><a onclick="$('form').submit();" class="rem"><?php echo $button_delete; ?></a></div>
    </div>
    <div class="contentes">
      <form action="<?php echo $delete; ?>" method="post" enctype="multipart/form-data" id="form">
        <table class="list">
          <thead>
            <tr>
              <td width="1" style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" /></td>
              <td class="left"><?php if ($sort == 'fgd.name') { ?>
                <a href="<?php echo $sort_name; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_group; ?></a>
                <?php } else { ?>
                <a href="<?php echo $sort_name; ?>"><?php echo $column_group; ?></a>
                <?php } ?></td>
              <td class="right"><?php if ($sort == 'fg.sort_order') { ?>
                <a href="<?php echo $sort_sort_order; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_sort_order; ?></a>
                <?php } else { ?>
                <a href="<?php echo $sort_sort_order; ?>"><?php echo $column_sort_order; ?></a>
                <?php } ?></td>
              <td class="right"><?php echo $column_action; ?></td>
            </tr>
          </thead>
          <tbody>
            <?php if ($filters) { ?>
            <?php foreach ($filters as $filter) { ?>
            <tr>
              <td style="text-align: center;"><?php if ($filter['selected']) { ?>
                <input type="checkbox" name="selected[]" value="<?php echo $filter['filter_group_id']; ?>" checked="checked" />
                <?php } else { ?>
                <input type="checkbox" name="selected[]" value="<?php echo $filter['filter_group_id']; ?>" />
                <?php } ?></td>
              <td class="left"><?php echo $filter['name']; ?></td>
              <td class="right"><?php echo $filter['sort_order']; ?></td>
              <td class="center" width="60">
			    <div class="button-action">
				  <a style="text-decoration: none;" href="<?php echo $link;?>&filter_edit&filter_group_id=<?php echo $filter['filter_group_id'];?>" class="filter_dialog button_edites tooltip" title="<?php echo $text_edit; ?>" /></a>
                </div>
			  </td>
            </tr>
            <?php } ?>
            <?php } else { ?>
            <tr>
              <td class="center" colspan="4"><?php echo $text_no_results; ?></td>
            </tr>
            <?php } ?>
          </tbody>
		  <tfoot>
            <tr>
              <td width="1" style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" /></td>
              <td class="left"><?php if ($sort == 'fgd.name') { ?>
                <a href="<?php echo $sort_name; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_group; ?></a>
                <?php } else { ?>
                <a href="<?php echo $sort_name; ?>"><?php echo $column_group; ?></a>
                <?php } ?></td>
              <td class="right"><?php if ($sort == 'fg.sort_order') { ?>
                <a href="<?php echo $sort_sort_order; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_sort_order; ?></a>
                <?php } else { ?>
                <a href="<?php echo $sort_sort_order; ?>"><?php echo $column_sort_order; ?></a>
                <?php } ?></td>
              <td class="right"><?php echo $column_action; ?></td>
            </tr>
          </tfoot>
        </table>
      </form>
      <div class="pagination"><?php echo $pagination; ?></div>
    </div>
	<div class="foot_heading">
      <h1 class="page-filter"><?php echo $heading_title; ?></h1>
      <div class="buttons"><a href="<?php echo $insert; ?>" class="add"><?php echo $button_insert; ?></a><a onclick="$('form').submit();" class="rem"><?php echo $button_delete; ?></a></div>
    </div>
  </div>
</div>
<script type="text/javascript"><!--
$('a.filter_dialog').live('click', function(e){
    e.preventDefault();
    var link = $(this).attr('href');
    $('<div id="open-dialog" class="hidden"></div>').appendTo('body')
    .load(link,null, function(){
        $(this).dialog({
			title: '<?php echo $heading_title; ?>',
			modal: true,
			resizable: true,
			width: 900,
			height: 700,
			buttons: {
				'<?php echo $button_save; ?>': function() {
					$.post(link, $('#filter-form').serialize(), function(response){
					})
                $(this).dialog("close"); $(this).remove();
				},
				'<?php echo $button_cancel; ?>': function(){
					$(this).dialog("close"); $(this).remove();
				},
			},
			close: function(){
				$(this).remove();
			}
		});
    });
});
//--></script>
<?php echo $footer; ?>
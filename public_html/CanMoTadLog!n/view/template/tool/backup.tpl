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
      <h1 class="backup-page"><?php echo $heading_title; ?></h1>
      <div class="buttons"><a onclick="$('#restore').submit();" class="add"><?php echo $button_restore; ?></a><a onclick="$('#backup').submit();" class="button"><?php echo $button_backup; ?></a></div>
    </div>
    <div class="contentes">
      <form action="<?php echo $restore; ?>" method="post" enctype="multipart/form-data" id="restore">
        <table class="form">
          <tr>
            <td><?php echo $entry_restore; ?></td>
            <td><input type="file" name="import" /></td>
          </tr>
        </table>
      </form>
      <form action="<?php echo $backup; ?>" method="post" enctype="multipart/form-data" id="backup">
        <table class="form">
          <tr>
            <td><?php echo $entry_backup; ?></td>
            <td><div class="scrollbox" style="margin-bottom: 5px; height: 250px;">
                <?php $class = 'odd'; ?>
                <?php foreach ($tables as $table) { ?>
                <?php $class = ($class == 'even' ? 'odd' : 'even'); ?>
                <div class="<?php echo $class; ?>">
                  <input type="checkbox" name="backup[]" value="<?php echo $table; ?>" checked="checked" />
                  <?php echo $table; ?></div>
                <?php } ?>
              </div>
              <a onclick="$(this).parent().find(':checkbox').attr('checked', true);" class="add"><?php echo $text_select_all; ?></a> <a onclick="$(this).parent().find(':checkbox').attr('checked', false);" class="rem"><?php echo $text_unselect_all; ?></a></td>
          </tr>
        </table>
      </form>
    </div>
	<div class="foot_heading">
      <h1 class="backup-page"><?php echo $heading_title; ?></h1>
      <div class="buttons"><a onclick="$('#restore').submit();" class="add"><?php echo $button_restore; ?></a><a onclick="$('#backup').submit();" class="button"><?php echo $button_backup; ?></a></div>
    </div>
  </div>
</div>
<?php echo $footer; ?>
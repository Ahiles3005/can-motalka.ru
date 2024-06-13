<?php echo $header; ?>
<link rel="stylesheet" type="text/css" href="catalog/view/theme/default/stylesheet/simple.css" />
</div>
<div class="rast-heading"><div class="h1"><h1><?php echo $heading_title; ?></h1></div></div>
<div class="breadcrumb">
<div>
<?php foreach ($breadcrumbs as $i=> $breadcrumb) { ?>
<?php echo $breadcrumb['separator']; ?><?php if($i+1<count($breadcrumbs)) { ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a> <?php } else { ?><?php echo $breadcrumb['text']; ?><?php } ?>
<?php } ?>
</div>
</div>
<div id="wrapper">
<?php if ($success) { ?>
<div class="success"><?php echo $success; ?></div>
<?php } ?>
<?php if ($error_warning) { ?>
<div class="warning"><?php echo $error_warning; ?></div>
<?php } ?>
<?php echo $content_top; ?>
        <div class="simpleregister" style="text-align: left">
  <?php foreach ($addresses as $result) { ?>
  <div class="edit-addr-list">
    <table style="width: 90%;">
      <tr>
        <td><?php echo $result['address']; ?></td>
        <td style="text-align: right;"><a href="<?php echo $result['update']; ?>" class="button"><?php echo $button_edit; ?></a><a href="<?php echo $result['delete']; ?>" class="button red"><?php echo $button_delete; ?></a></td>
      </tr>
    </table>
  </div>
  <?php } ?>
<a href="<?php echo $back; ?>" class="button"><?php echo $button_back; ?></a>
<a href="<?php echo $insert; ?>" class="button"><?php echo $button_new_address; ?></a>
  </div>
  <div class="bottom"></div>
  <?php echo $content_bottom; ?>
<?php echo $footer; ?>
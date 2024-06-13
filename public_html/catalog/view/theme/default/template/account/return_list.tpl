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
<div id="content"><?php echo $content_top; ?>
  <div class="accountcont simple-white">
  <?php if ($returns) { ?>
  <?php foreach ($returns as $return) { ?>
  <div class="return-list">
    <div class="return-id"><b><?php echo $text_return_id; ?></b> <?php echo $return['return_id']; ?></div>
    <div class="return-status"><b><?php echo $text_status; ?></b> <?php echo $return['status']; ?></div>
    <div class="return-content">
      <div><b><?php echo $text_date_added; ?></b> <?php echo $return['date_added']; ?><br />
        <b><?php echo $text_order_id; ?></b> <?php echo $return['order_id']; ?></div>
      <div><b><?php echo $text_customer; ?></b> <?php echo $return['name']; ?></div>
      <div class="return-info"><a href="<?php echo $return['href']; ?>"><img align="absmiddle" src="catalog/view/theme/default/image/icon/info-icon.png" class="poshytips" alt="<?php echo $button_view; ?>" title="<?php echo $button_view; ?>" /></a></div>
    </div>
  </div>
  <?php } ?>
  <div class="pagination"><?php echo $pagination; ?></div>
  <?php } else { ?>
  <div style="text-align:left;font-size:16px"><?php echo $text_empty; ?></div>
    <a href="<?php echo $continue; ?>" class="button">Назад</a>
  <?php } ?>
  </div>
  <div class="bottom"></div>
  </div>
  <?php echo $content_bottom; ?></div>
<?php echo $footer; ?>
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
  <?php if ($orders) { ?>
  <?php foreach ($orders as $order) { ?>
  <div class="order-list">
    <div class="order-id"><b><?php echo $text_order_id; ?></b> <?php echo $order['order_id']; ?></div>
    <div class="order-status"><b><?php echo $text_status; ?></b> <?php echo $order['status']; ?></div>
    <div class="order-content">
      <div><b><?php echo $text_date_added; ?></b> <?php echo $order['date_added']; ?><br />
        <b><?php echo $text_products; ?></b> <?php echo $order['products']; ?></div>
      <div><b><?php echo $text_customer; ?></b> <?php echo $order['name']; ?><br />
        <b><?php echo $text_total; ?></b> <?php echo $order['total']; ?></div>
      <div class="order-info"><a href="<?php echo $order['href']; ?>"><img align="absmiddle" src="catalog/view/theme/default/image/icon/info-icon.png" alt="<?php echo $button_view; ?>" class="poshytips" title="<?php echo $button_view; ?>" /></a>&nbsp;&nbsp;<a href="<?php echo $order['reorder']; ?>"><img align="absmiddle" src="catalog/view/theme/default/image/icon/reorder-icon.png" alt="<?php echo $button_reorder; ?>" class="poshytips" title="<?php echo $button_reorder; ?>" /></a></div>
    </div>
  </div>
  <?php } ?>
  <div class="pagination"><?php echo $pagination; ?></div>
  <?php } else { ?>
  <div style="text-align:left;font-size:16px"><?php echo $text_empty; ?></div>
    <a href="<?php echo $continue; ?>" class="button">Назад</a>
  <?php } ?>
  <div class="bottom"></div>
  </div>
  <?php echo $content_bottom; ?></div>
<?php echo $footer; ?>
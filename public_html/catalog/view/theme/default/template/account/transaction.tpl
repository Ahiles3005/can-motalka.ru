<?php echo $header; ?>
<link rel="stylesheet" type="text/css" href="catalog/view/theme/default/stylesheet/simple.css" />
<link rel="stylesheet" type="text/css" href="catalog/view/theme/default/stylesheet/info-pages.css" />
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
  <p><?php echo $text_total; ?><b> <?php echo $total; ?></b></p>
  <table align="center" border="0" cellpadding="15" cellspacing="0" class="info-table" style="width:100%;">
      <tr class="t-head bold">
        <td class="left"><?php echo $column_date_added; ?></td>
        <td class="left"><?php echo $column_description; ?></td>
        <td class="right"><?php echo $column_amount; ?></td>
      </tr>
    <tbody>
      <?php if ($transactions) { ?>
      <?php foreach ($transactions  as $transaction) { ?>
      <tr>
        <td class="left"><?php echo $transaction['date_added']; ?></td>
        <td class="left"><?php echo $transaction['description']; ?></td>
        <td class="right"><?php echo $transaction['amount']; ?></td>
      </tr>
      <?php } ?>
      <?php } else { ?>
      <tr>
        <td class="center" colspan="5"><?php echo $text_empty; ?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  <div class="pagination"><?php echo $pagination; ?></div>
    <a href="<?php echo $continue; ?>" class="button"><?php echo $button_continue; ?></a>
  </div>
  <div class="bottom"></div>
  </div>
  <?php echo $content_bottom; ?></div>
<?php echo $footer; ?>
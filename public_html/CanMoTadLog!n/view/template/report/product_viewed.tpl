<?php echo $header; ?>
<div id="content">
<div class="breadcrumb">
<?php foreach ($breadcrumbs as $i=> $breadcrumb) { ?>
<?php if($i+1<count($breadcrumbs)) { ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a> <?php } else { ?><?php echo $breadcrumb['text']; ?><?php } ?>
<?php } ?>
</div>
  <?php if ($success) { ?>
  <div class="success"><?php echo $success; ?></div>
  <?php } ?>
  <div class="box">
    <div class="heading">
      <h1><img src="view/image/report.png" alt="" /> <?php echo $heading_title; ?></h1>
      <div class="buttons"><a href="<?php echo $reset; ?>" class="button"><?php echo $button_reset; ?></a></div>
    </div>
    <div class="contentes">
      <table class="list">
        <thead>
          <tr>
            <td class="left"><?php echo $column_name; ?></td>
            <td class="left"><?php echo $column_model; ?></td>
            <td class="right"><?php echo $column_viewed; ?></td>
            <td class="right"><?php echo $column_percent; ?></td>
          </tr>
        </thead>
        <tbody>
          <?php if ($products) { ?>
          <?php foreach ($products as $product) { ?>
          <tr>
            <td class="left"><?php echo $product['name']; ?></td>
            <td class="left"><?php echo $product['model']; ?></td>
            <td class="right"><?php echo $product['viewed']; ?></td>
            <td class="right"><?php echo $product['percent']; ?></td>
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
            <td class="left"><?php echo $column_name; ?></td>
            <td class="left"><?php echo $column_model; ?></td>
            <td class="right"><?php echo $column_viewed; ?></td>
            <td class="right"><?php echo $column_percent; ?></td>
          </tr>
        </tfoot>
      </table>
      <div class="pagination"><?php echo $pagination; ?></div>
    </div>
	<div class="foot_heading">
      <h1><img src="view/image/report.png" alt="" /> <?php echo $heading_title; ?></h1>
      <div class="buttons"><a href="<?php echo $reset; ?>" class="button"><?php echo $button_reset; ?></a></div>
    </div>
  </div>
</div>
<?php echo $footer; ?>
<?php echo $header; ?>
</div>
<div class="rast-heading">
<div class="breadcrumb">
<div>
<?php foreach ($breadcrumbs as $i=> $breadcrumb) { ?>
<?php echo $breadcrumb['separator']; ?><?php if($i+1<count($breadcrumbs)) { ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a> <?php } else { ?><?php echo $breadcrumb['text']; ?><?php } ?>
<?php } ?>
</div>
</div>
<div class="h1"><h1><?php echo $heading_title; ?></h1></div></div>
<div id="wrapper">
<?php echo $content_top; ?>
  <div class="main-content successcont white inform-page">
  <p><?php echo $order_text; ?></p><span class="deal"><span></span><span></span></span><span class="ok"></span>
    <a href="<?php echo $continue; ?>" class="button"><?php echo $button_continue; ?></a>
  </div>
  <div class="bottom"></div>
<?php echo $content_bottom; ?>
<script type="text/javascript">
$(window).ready(function(){
	setTimeout ("$('.successcont span.deal').addClass('cssload-container');$('.successcont span.deal > span').addClass('cssload-circle');",700);
	setTimeout ("$('.successcont span.ok').fadeIn('slow');",1700);
});
</script>
<?php echo $footer; ?>
<?php if(isset($order_id) && $order_id) { ?>
<script>
window.dataLayer = window.dataLayer || []
dataLayer.push({
   'transactionId': '<?php echo $order_id; ?>',
   'transactionAffiliation': '<?php echo $store_name; ?>',
   'transactionTotal': <?php echo $order_info["total"]; ?>,
   'transactionProducts': [
   <?php foreach ($order_products as $row) { ?>
   {
       'name': '<?php echo $row["name"]; ?>',
       'price': <?php echo $row["price"]; ?>,
       'quantity': <?php echo $row["quantity"]; ?>
   },
   <?php } ?>
   ]
});
</script>
<!-- Event snippet for Заказ conversion page -->
<script>
  gtag('event', 'conversion', {
      'send_to': 'AW-828840336/JcWgCI6buXoQkLOciwM',
      'transaction_id': ''
  });
</script>
<?php } ?>
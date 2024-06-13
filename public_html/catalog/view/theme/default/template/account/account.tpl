<?php echo $header; ?>
</div>
<div class="rast-heading"><div class="h1"><h1><?php echo $heading_title; ?></h1></div></div>
<div id="wrapper">
<?php if ($success) { ?>
<div class="success"><?php echo $success; ?></div>
<?php } ?>
<div class="breadcrumb">
<?php foreach ($breadcrumbs as $i=> $breadcrumb) { ?>
<?php echo $breadcrumb['separator']; ?><?php if($i+1<count($breadcrumbs)) { ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a> <?php } else { ?><?php echo $breadcrumb['text']; ?><?php } ?>
<?php } ?>
</div>
<div id="content"><?php echo $content_top; ?>
  <div class="main-content accountcont white">
  <div>
  <div class="title"><?php echo $text_my_account; ?></div>
  <div class="cont">
<a class="edit" href="<?php echo $edit; ?>"><?php echo $text_edit; ?></a>
<a class="password" href="<?php echo $password; ?>"><?php echo $text_password; ?></a>
<a class="address" href="<?php echo $address; ?>"><?php echo $text_address; ?></a>
<a class="wishlist" href="<?php echo $wishlist; ?>"><?php echo $text_wishlist; ?></a>
  </div>
  </div>
  <div>
  <div class="title"><?php echo $text_my_orders; ?></div>
  <div class="cont">
<a class="order" href="<?php echo $order; ?>"><?php echo $text_order; ?></a>
<!--<a class="download" href="<?php //echo $download; ?>"><?php //echo $text_download; ?></a>-->
      <?php if ($reward) { ?>
<a class="payment" href="<?php echo $reward; ?>"><?php echo $text_reward; ?></a>
      <?php } ?>
<a class="return" href="<?php echo $return; ?>"><?php echo $text_return; ?></a>
<a class="transaction" href="<?php echo $transaction; ?>"><?php echo $text_transaction; ?></a>
  </div>
  </div>
  <!--<div>
  <div class="title"><?php echo $text_my_newsletter; ?></div>
  <div class="cont">
<a class="newsletter" href="<?php //echo $newsletter; ?>"><?php //echo $text_newsletter; ?></a>
  </div>
  </div>-->
  </div>
  <div class="bottom"></div>
  <?php echo $content_bottom; ?></div>
<script type="text/javascript">setTimeout(function(){$('.success').fadeOut('slow')},4500);</script>
<?php echo $footer; ?> 
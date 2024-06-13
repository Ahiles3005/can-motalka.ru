<?php echo $header; ?>
</div>
<div class="m-fix-heading"></div><div class="rast-heading fix-heading" style="margin: 176px 0 50px 0">
<div class="breadcrumb">
<div>
<?php foreach ($breadcrumbs as $i=> $breadcrumb) { ?>
<?php echo $breadcrumb['separator']; ?><?php if($i+1<count($breadcrumbs)) { ?><a href="<?php echo $breadcrumb['href']; ?>"><span itemprop="name"><?php echo $breadcrumb['text']; ?></span></a> <?php } else { ?><span><?php echo $breadcrumb['text']; ?></span><?php } ?>
<?php } ?>
</div>
</div>
<div class="h1"><h1>Отзывы о подмотке can-motalka.ru</h1></div></div>
<?php echo $column_left; ?><?php echo $column_right; ?>
<div class="wrapper">
<div id="content" style="padding:30px 0;margin:0 0 30px;background:transparent;box-shadow:none"><?php echo $content_top; ?>
  <?php if ($reviews) { ?>
  <p class="sp1 l960">Отзывы реальных клиентов нашего магазина, которых мы всегда просим сообщить о получении и проверке устройства.</p>
  <div class="pagination" style="max-width:1000px;margin:30px auto"><?php echo $pagination; ?></div>
  <div class="product-list reviews-list">
    <?php foreach ($reviews as $review) { ?>
    <div class="scroller">
	<div class="product-image">
	<a href="<?php echo $review['href']; ?>"><img src="<?php echo $review['image']; ?>"></a>
	</div>
	<div class="review-text">
	<a href="<?php echo $review['href']; ?>"><?php echo $review['product_name']; ?></a>
		<span class="author"><?php echo $review['author']; ?></span>
		<span class="date"><?php echo $review['date']; ?></span>
		<div class="rating"><img src="catalog/view/theme/default/image/stars-<?php echo $review['rating']; ?>.png"/></div>
		<p><?php echo $review['text']; ?></p>
	</div>				
    </div>
    <?php } ?>
  </div>
  <div class="pagination" style="max-width:1000px;margin:30px auto"><?php echo $pagination; ?></div>
  <?php } ?>
  <?php if (!$reviews) { ?>
  <div class="content"><?php echo $no_reviews; ?></div>
  <div class="buttons">
    <div class="right"><a href="<?php echo $continue; ?>" class="button"><?php echo $button_continue; ?></a></div>
  </div>
  <?php } ?>
  <?php echo $content_bottom; ?></div>

<?php echo $footer; ?>
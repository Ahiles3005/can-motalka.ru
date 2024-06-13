<div class="box">
<div class="box-heading"><?php echo $heading_title; ?></div>
<div class="box-content">
<?php if ($arbitrages) { ?>
<?php foreach($arbitrages as $arbitrage) { ?>
<div class="review-list">
<div class="author"><b><?php echo $arbitrage['author']; ?></b> <?php echo $text_on; ?> <?php echo $arbitrage['date_added']; ?></div>
<div class="rating"><img src="catalog/view/theme/default/image/stars-<?php echo $arbitrage['rating']; ?>.png" alt="<?php echo $arbitrage['rating_author']; ?>" /></div>
<div class="text"><?php echo $arbitrage['description']; ?></div>
</div>
<?php } ?>
<?php } else { ?>
<div class="content">
<?php echo $text_no_arbitrages; ?>
</div>
<?php } ?>
</div>
</div>
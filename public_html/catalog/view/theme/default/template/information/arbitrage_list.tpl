<?php if ($arbitrages) { ?>
<?php foreach($arbitrages as $arbitrage) { ?>
<div class="review-list">
<div class="author"><b><?php echo $arbitrage['author']; ?></b> <?php echo $text_on; ?> <?php echo $arbitrage['date_added']; ?></div>
<div class="rating"><img src="catalog/view/theme/default/image/stars-<?php echo $arbitrage['rating']; ?>.png" alt="<?php echo $arbitrage['rating_author']; ?>" /></div>
<div class="text"><?php echo $arbitrage['description']; ?></div>
</div>
<?php } ?>
<div class="add-block"><a class="add-arb" href="otzyvy/#arbitrage">Добавить отзыв</a></div>
<?php if ($pagination) { ?>
<div class="pagination"><?php echo $pagination; ?></div>
<?php } ?>
<?php } else { ?>
<div class="no-arb">
<?php echo $text_no_arbitrages; ?>
<div class="add-block"><a class="add-arb" href="otzyvy/#arbitrage">Добавить отзыв</a></div>
</div>
<?php } ?>
<script>
$(function(){$('.add-block a').on('click',function(e){$('html,body').stop().animate({scrollTop:$('#arbitrage').offset().top},550);e.preventDefault()})});
</script>	
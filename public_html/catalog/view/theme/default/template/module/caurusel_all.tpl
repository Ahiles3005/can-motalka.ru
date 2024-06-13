<div class="owl-top-block"><h2><?php echo $heading_title; ?></h2><?php if(isset($category_href)): ?> <a href="<?=$category_href?>">смотреть все</a><?php else: ?><?php endif; ?></div>
<div id="owl-example<?php echo $module; ?>" class="owl-carousel owl-theme">
      <?php foreach ($products as $product) { ?>
       <div class="item">
        <?php if ($product['thumb']) { ?>
        <div class="image">
		<div class="stickers"><?php echo $product['sale']; ?><?php echo $product['new']; ?><?php echo $product['popular']; ?></div>
		<?php !$product['special'] ? $price_free_delivery = preg_replace("#[^\d]#", "", $product['price']) : $price_free_delivery = preg_replace("#[^\d]#", "", $product['special']); if($price_free_delivery >= 5000) { ?><div class="free-delivery">Бесплатная доставка</div><?php } else { ?><?php } ?>
		<a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" class="lazyOwl" data-src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" /></a>
		<a onclick="addToCompare('<?php echo $product['product_id']; ?>');" class="poshytips button-compares" title="<?php echo $button_compare; ?>"></a>
		<a onclick="addToWishList('<?php echo $product['product_id']; ?>');" class="poshytips button-wishlists" title="<?php echo $button_wishlist; ?>"></a>
		</div>
		<?php } else { ?>
		<div class="image">
		<div class="stickers"><?php echo $product['sale']; ?><?php echo $product['new']; ?><?php echo $product['popular']; ?></div>
		<?php !$product['special'] ? $price_free_delivery = preg_replace("#[^\d]#", "", $product['price']) : $price_free_delivery = preg_replace("#[^\d]#", "", $product['special']); if($price_free_delivery >= 5000) { ?><div class="free-delivery">Бесплатная доставка</div><?php } else { ?><?php } ?>
		<a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['no_image']; ?>" class="lazyOwl" data-src="<?php echo $product['no_image']; ?>" alt="<?php echo $product['name']; ?>" /></a>
		<a onclick="addToCompare('<?php echo $product['product_id']; ?>');" class="poshytips button-compares" title="<?php echo $button_compare; ?>"></a>
		<a onclick="addToWishList('<?php echo $product['product_id']; ?>');" class="poshytips button-wishlists" title="<?php echo $button_wishlist; ?>"></a>
		</div>
        <?php } ?>
        <div class="name"><a href="<?php echo $product['href']; ?>"><?php if( strlen( $product['name'] ) < 235 ) { echo $product['name']; } else { echo mb_substr( $product['name'],0,235,'utf-8' ).""; } ?></a></div>
<!-- Категория и производитель -->
      <div class="attr">
      <?php if ($product['brandlink']==1) { ?>
      <div><span>Бренд:</span> <a href="<?php echo $product['manufacturer_link']; ?>"><?php echo $product['manufacturer']; ?></a></div>
      <?php } ?>	  
      <?php if ($product['catname']==1) { ?>
      <div><span>Категория:</span> <?php echo $product['category_name']; ?></div>
      <?php } ?>
	  </div>
<!-- Категория и производитель -->		
        <?php if ($product['price']) { ?>
        <div class="price">
          <?php if (!$product['special']) { ?>
          <?php echo $product['price']; ?>
          <?php } else { ?>
          <span class="price-old"><?php echo $product['price']; ?></span> <span class="price-new"><?php echo $product['special']; ?></span>
          <?php } ?>
        </div>
        <?php } ?>
        <?php if ($product['rating']) { ?>
        <div class="rating"><img src="catalog/view/theme/default/image/stars-<?php echo $product['rating']; ?>.png" alt="<?php echo $product['reviews']; ?>" /></div>
        <?php } ?>
       <div class="cart"><input type="button" value="<?php echo $button_cart; ?>" onclick="addToCart('<?php echo $product['product_id']; ?>', '<?php echo $product['minimum']; ?>');" class="btns c-button" /></div>
       </div>
       <?php } ?>
</div>
<script>
$(document).ready(function($) {
	var scrolling = '<?php echo $use_scrolling_panel ?>'
		if (scrolling > 0) {
			$("#owl-example<?php echo $module; ?>").owlCarousel({
				navigation : true,
				items : <?php echo $visible ?>,
				paginationSpeed : <?php echo $scroll ?>,
                autoPlay : true,
                stopOnHover : true, 
			}); 
        } else {
            $("#owl-example<?php echo $module; ?>").owlCarousel({
                navigation : true,
				navigationText: false,
				lazyLoad: true,
				items : <?php echo $visible ?>,
				paginationSpeed : <?php echo $scroll ?>,
            });
		}
});
</script>
<script>$(document).ready(function() {
$('.colorbox').colorbox({overlayClose:true,opacity:0.7,width:"1050px",height:"85%",top:"50px",fixed:true,rel:"colorbox"});
});</script>
<?php if ($block == '0') { ?>
<div class="box">
<?php } else { ?>
<div class="fake-h2"><?php echo $heading_title; ?></div> 
<?php } ?>  
<div class="box-content">
<?php if ($style == 'grid') { ?>
 <div class="box-product">
<?php foreach ($products as $product) { ?>
<div>
<?php if ($product['thumb']) { ?>
<div class="image">
<a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" /></a><div class="stickers"><?php echo $product['sale']; ?><?php echo $product['new']; ?><?php echo $product['popular']; ?></div></div>
<?php } else { ?>
<div class="image"><a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['no_image']; ?>" alt="<?php echo $product['name']; ?>" /></a><div class="stickers"><?php echo $product['sale']; ?><?php echo $product['new']; ?><?php echo $product['popular']; ?></div></div>
<?php } ?>
<div class="rating"><img src="catalog/view/theme/default/image/stars-<?php echo $product['rating']; ?>.png" alt="<?php echo $product['reviews']; ?>" /></div>
<div class="name"><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></div>
<?php if ($brand == '1') { ?>
<?php if ($product['manufacturer']) { ?>
<div><b><?php echo $text_manufacturer; ?></b> <?php echo $product['manufacturer']; ?></div>
<?php } ?>
<?php } ?>
<?php if ($model == '1') { ?>		
<div><b><?php echo $text_model; ?></b> <?php echo $product['model']; ?></div>
<?php } ?>
<?php if ($sku == '1') { ?>				
<?php if ($product['sku']) { ?>		
<div><b><?php echo $text_sku; ?></b> <?php echo $product['sku']; ?></div>
<?php } ?>
<?php } ?>
<?php if ($stockstatus == '1') { ?>		
<div><b><?php echo $text_availability; ?></b> <?php echo $product['stockstatus']; ?></div>
<?php } ?>
<?php if ($quantity == '1') { ?>		
<div><b><?php echo $text_quantity; ?></b> <?php echo $product['quantity']; ?></div>
<?php } ?>	
<?php if ($product['price']) { ?>
<div class="price">
<?php if (!$product['special']) { ?>
<?php echo $product['price']; ?>
<?php } else { ?>
<span class="price-old"><?php echo $product['price']; ?></span> <span class="price-new"><?php echo $product['special']; ?></span>
<?php } ?>
</div>
<?php } ?>
<div class="cart"><input type="button" value="<?php echo $button_cart; ?>" onclick="addToCart('<?php echo $product['product_id']; ?>');" class="btns c-button" /></div>
</div>
<?php } ?>
</div>  
<?php } ?>  
<?php if ($style == 'list') { ?>
<div class="product-list">
<?php foreach ($products as $product) { ?>
<div>
<div class="right">
<div class="cart">
<input type="button" value="<?php echo $button_cart; ?>" onclick="addToCart('<?php echo $product['product_id']; ?>');" class="btns c-button" />
</div>
<div class="wishlist"><a onclick="addToWishList('<?php echo $product['product_id']; ?>');"><?php echo $button_wishlist; ?></a></div>
<div class="compare"><a onclick="addToCompare('<?php echo $product['product_id']; ?>');"><?php echo $button_compare; ?></a></div>	
</div>
<div class="left">
<?php if ($product['thumb']) { ?>
<div class="image">
<a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" /></a><div class="stickers"><?php echo $product['sale']; ?><?php echo $product['new']; ?><?php echo $product['popular']; ?></div></div>
<?php } else { ?>
<div class="image"><a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['no_image']; ?>" alt="<?php echo $product['name']; ?>" /></a><div class="stickers"><?php echo $product['sale']; ?><?php echo $product['new']; ?><?php echo $product['popular']; ?></div></div>
<?php } ?>
<?php if ($product['price']) { ?>
<div class="price">
<?php if (!$product['special']) { ?>
<?php echo $product['price']; ?>
<?php } else { ?>
<span class="price-old"><?php echo $product['price']; ?></span> <span class="price-new"><?php echo $product['special']; ?></span>
<?php } ?>
<?php if ($product['tax']) { ?>
<br />
<span class="price-tax"><?php echo $text_tax; ?> <?php echo $product['tax']; ?></span>
<?php } ?>
</div>
<?php } ?>
<div class="rating"><img src="catalog/view/theme/default/image/stars-<?php echo $product['rating']; ?>.png" alt="<?php echo $product['reviews']; ?>" /></div>
<div class="name"><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></div>
<div class="description"><?php echo $product['description']; ?></br>
<?php if ($brand == '1') { ?>
<?php if ($product['manufacturer']) { ?>
<div><b><?php echo $text_manufacturer; ?></b> <?php echo $product['manufacturer']; ?></div>
<?php } ?>
<?php } ?>
<?php if ($model == '1') { ?>		
<div><b><?php echo $text_model; ?></b> <?php echo $product['model']; ?></div>
<?php } ?>
<?php if ($sku == '1') { ?>				
<?php if ($product['sku']) { ?>		
<div><b><?php echo $text_sku; ?></b> <?php echo $product['sku']; ?></div>
<?php } ?>
<?php } ?>
<?php if ($stockstatus == '1') { ?>		
<div><b><?php echo $text_availability; ?></b> <?php echo $product['stockstatus']; ?></div>
<?php } ?>
<?php if ($quantity == '1') { ?>		
<div><b><?php echo $text_quantity; ?></b> <?php echo $product['quantity']; ?></div>
<?php } ?>	
</div>
</div>
</div>
<?php } ?>
</div>
<?php } ?> 
<?php if ($style == 'carousel') { ?>
<div class="box-product"> 
<section id="multicarousel<?php echo $key; ?>" class="multicarousel">
<h2><?php echo $heading_title; ?></h2>
<div class="carouselrelative">
<div class="topcarousel"><a id="prevcat<?php echo $key; ?>" class="prev" href="#"></a> <a id="nextcat<?php echo $key; ?>" class="next" href="#"></a></div>
<ul id="carousel<?php echo $key; ?>" class="carousel">
<?php foreach ($products as $product) { ?>
<li>        
<?php if ($product['thumb']) { ?>
<div class="image">
<?php !$product['special'] ? $price_free_delivery = preg_replace("#[^\d]#", "", $product['price']) : $price_free_delivery = preg_replace("#[^\d]#", "", $product['special']); if($price_free_delivery >= 3500) { ?><div class="free-delivery">Бесплатная доставка</div><?php } else { ?><?php } ?> 
<a onclick="addToCompare('<?php echo $product['product_id']; ?>');" class="poshytips button-compares" title="<?php echo $button_compare; ?>"></a>
<a onclick="addToWishList('<?php echo $product['product_id']; ?>');" class="poshytips button-wishlists" title="<?php echo $button_wishlist; ?>"></a>	
<a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" /></a><div class="stickers"><?php echo $product['sale']; ?><?php echo $product['new']; ?><?php echo $product['popular']; ?></div></div>
<?php } else { ?>
<div class="image">
<?php !$product['special'] ? $price_free_delivery = preg_replace("#[^\d]#", "", $product['price']) : $price_free_delivery = preg_replace("#[^\d]#", "", $product['special']); if($price_free_delivery >= 3500) { ?><div class="free-delivery">Бесплатная доставка</div><?php } else { ?><?php } ?> 
<a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['no_image']; ?>" alt="<?php echo $product['name']; ?>" /></a><div class="stickers"><?php echo $product['sale']; ?><?php echo $product['new']; ?><?php echo $product['popular']; ?></div>
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
<?php if ($model == '1') { ?><div><span><?php echo $text_model; ?></span> <?php echo $product['model']; ?></div><?php } ?>
<?php if ($sku == '1') { ?>
<?php if ($product['sku']) { ?><div><span><?php echo $text_sku; ?></span> <?php echo $product['sku']; ?></div><?php } ?>
<?php } ?>
<?php if ($stockstatus == '1') { ?><div><span><?php echo $text_availability; ?></span> <?php echo $product['stockstatus']; ?></div><?php } ?>
<?php if ($quantity == '1') { ?><div><span><?php echo $text_quantity; ?></span> <?php echo $product['quantity']; ?></div><?php } ?>
<?php if ($product['price']) { ?>
<div class="price">
<?php if (!$product['special']) { ?>
<?php echo $product['price']; ?>
<?php } else { ?>
<span class="price-old"><?php echo $product['price']; ?></span> <span class="price-new"><?php echo $product['special']; ?></span>
<?php } ?>
</div>
<?php } ?>
<div class="cart"><input type="button" value="<?php echo $button_cart; ?>" onclick="addToCart('<?php echo $product['product_id']; ?>');" class="btns c-button" /></div>
</li> 
<?php } ?>
</ul>
<?php echo $content; ?>
<div class="clearfix"></div>
</div>
</section>
<script type="text/javascript"><!--
$(window).load(function() {
$('#carousel<?php echo $key; ?>').carouFredSel({ width: '100%', scroll: 1, duration: 0, auto: false, prev: '#prevcat<?php echo $key; ?>', next: '#nextcat<?php echo $key; ?>', easing: 'linear',
swipe: {
onMouse: true,
onTouch: false
}
});
});
//--></script>
</div>
<?php } ?>
</div>
<?php if ($block == '0') { ?>  
</div>
<?php } ?>
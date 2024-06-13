<script>$(document).ready(function() {
$('.colorbox').colorbox({overlayClose:true,opacity:0.7,width:"1050px",height:"85%",top:"50px",fixed:true,rel:"colorbox"});
});</script>
<div class="box">
  <h2><?php echo $heading_title; ?></h2>
  <div class="box-content">
    <div class="box-product">
      <?php foreach ($products as $product) { ?>
      <div>
        <?php if ($product['thumb']) { ?>
          <div class="image">
			<?php if ($quick_view_special) { ?>
			  <a href="index.php?route=module/quick_view/&product_id=<?php echo $product['product_id']; ?>" class="colorbox button-quick-view" title="" /></a>
		    <?php } ?>		  
		  <a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" /></a><div class="stickers"><?php echo $product['sale']; ?><?php echo $product['new']; ?><?php echo $product['popular']; ?></div></div>
        <?php } else { ?>
		  <div class="image">
			<?php if ($quick_view_special) { ?>
			  <a href="index.php?route=module/quick_view/&product_id=<?php echo $product['product_id']; ?>" class="colorbox button-quick-view" title="" /></a>
		    <?php } ?>		  
		  <a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['no_image']; ?>" alt="<?php echo $product['name']; ?>" /></a><div class="stickers"><?php echo $product['sale']; ?><?php echo $product['new']; ?><?php echo $product['popular']; ?></div></div>
		<?php } ?>
          <div class="rating"><img src="catalog/view/theme/default/image/stars-<?php echo $product['rating']; ?>.png" alt="<?php echo $product['reviews']; ?>" /></div>
        <div class="name"><a href="<?php echo $product['href']; ?>"><?php if( strlen( $product['name'] ) < 35 ) { echo $product['name']; } else { echo mb_substr( $product['name'],0,35,'utf-8' )."..."; } ?></a></div>
      
      <!-- Категория и производитель -->
      <div class="attr">	  
      <?php if ($product['catname']==1) { ?>
      <div><span>Категория:</span> <?php echo $product['category_name']; ?></div>
      <?php } ?>
      <?php if ($product['brandlink']==1) { ?>
      <div><span>Производитель:</span> <a href="<?php echo $product['manufacturer_link']; ?>"><?php echo $product['manufacturer']; ?></a></div>
      <?php } ?>
	  </div>
      <!-- Категория и производитель -->
		<!--<div class="description-box"><?php echo $product['description']; ?></div>-->		
        <div class="box-bottom">
		  <?php if ($product['price']) { ?>
			<div class="price">
			  <?php if (!$product['special']) { ?>
			  <?php echo $product['price']; ?>
			  <?php } else { ?>
			  <span class="price-old"><?php echo $product['price']; ?></span> <span class="price-new"><?php echo $product['special']; ?></span>
			  <?php } ?>
			</div>
		  <?php } ?>
		  <div class="carts-box">
		    <!--<a onclick="addToCompare('<?php echo $product['product_id']; ?>');" class="poshytips button-compares" title="<?php echo $button_compare; ?>" /></a>
			<a onclick="addToWishList('<?php echo $product['product_id']; ?>');" class="poshytips button-wishlists" title="<?php echo $button_wishlist; ?>" /></a>-->
			<a onclick="addToCart('<?php echo $product['product_id']; ?>');" class="btns c-button" title="" /><?php echo $button_cart; ?></a>
		  </div>
		</div>
      </div>
      <?php } ?>
    </div>
  </div>
</div>
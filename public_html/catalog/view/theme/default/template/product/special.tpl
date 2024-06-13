<?php echo $header; ?>
</div>
<div class="filter-button">Фильтр</div><div class="overlay-column-left"></div><div class="close-column-left">Закрыть</div>
<div class="rast-heading"><div class="h1"><h1><?php echo $heading_title; ?></h1></div></div>
<script>$(document).ready(function() {
$('.colorbox').colorbox({overlayClose:true,opacity:0.7,width:"1050px",height:"85%",top:"50px",fixed:true,rel:"colorbox"});
});</script>
<div class="wrapper">
<div class="breadcrumb">
<div>
<?php foreach ($breadcrumbs as $i=> $breadcrumb) { ?>
<?php echo $breadcrumb['separator']; ?><?php if($i+1<count($breadcrumbs)) { ?><a href="<?php echo $breadcrumb['href']; ?>"><span itemprop="name"><?php echo $breadcrumb['text']; ?></span></a> <?php } else { ?><span><?php echo $breadcrumb['text']; ?></span><?php } ?>
<?php } ?>
</div>
</div>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
<?php foreach ($breadcrumbs as $key => $breadcrumb) { ?>
<?php if($key+1<count($breadcrumbs)) { ?> {
    "@type": "ListItem",
    "position": <?php echo $key+1; ?>,
    "name": "<?php echo $breadcrumb['text']; ?>",
    "item": "<?php echo $breadcrumb['href']; ?>"
  },<?php } else { ?> {
    "@type": "ListItem",
    "position": <?php echo $key+1; ?>,
    "name": "<?php echo $breadcrumb['text']; ?>"
<?php } ?>
<?php } ?>
}]
}
</script>
<?php echo $column_left; ?><?php echo $column_right; ?>
<div id="content" class="no-bg"><?php echo $content_top; ?>
  <div class="other-content">
  <?php if ($products) { ?>
  <div class="product-filter search-page-filter">
    <div class="display"></div>
	<div class="product-compare"><a href="<?php echo $compare; ?>" id="compare-total"><?php echo $text_compare; ?></a></div>
    <div class="limit"><?php echo $text_limit; ?>
      <select onchange="location = this.value;">
        <?php foreach ($limits as $limits) { ?>
        <?php if ($limits['value'] == $limit) { ?>
        <option value="<?php echo $limits['href']; ?>" selected="selected"><?php echo $limits['text']; ?></option>
        <?php } else { ?>
        <option value="<?php echo $limits['href']; ?>"><?php echo $limits['text']; ?></option>
        <?php } ?>
        <?php } ?>
      </select>
    </div>
    <div class="sort"><?php echo $text_sort; ?>
      <select onchange="location = this.value;">
        <?php foreach ($sorts as $sorts) { ?>
        <?php if ($sorts['value'] == $sort . '-' . $order) { ?>
        <option value="<?php echo $sorts['href']; ?>" selected="selected"><?php echo $sorts['text']; ?></option>
        <?php } else { ?>
        <option value="<?php echo $sorts['href']; ?>"><?php echo $sorts['text']; ?></option>
        <?php } ?>
        <?php } ?>
      </select>
    </div>
  </div>
  <div class="pagination"><?php echo $pagination; ?></div>
  <div class="product-list">
    <?php foreach ($products as $product) { ?>
    <div>
      <?php if ($product['thumb']) { ?>
      <div class="image">
	  <?php !$product['special'] ? $price_free_delivery = preg_replace("#[^\d]#", "", $product['price']) : $price_free_delivery = preg_replace("#[^\d]#", "", $product['special']); if($price_free_delivery >= 5000) { ?><div class="free-delivery">Бесплатная доставка</div><?php } else { ?><?php } ?>
		  <?php if ($quick_view_list_special) { ?>
		    <a href="index.php?route=module/quick_view/&product_id=<?php echo $product['product_id']; ?>" class="colorbox button-quick-view" title="<?php echo $button_quick_view; ?>" /></a>
	      <?php } ?>	  
	  <a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" title="<?php echo $product['name']; ?>" alt="<?php echo $product['name']; ?>" /></a>
	      <a onclick="addToCompare('<?php echo $product['product_id']; ?>');" class="poshytips button-compares" title="<?php echo $button_compare; ?>" /></a>
		  <a onclick="addToWishList('<?php echo $product['product_id']; ?>');" class="poshytips button-wishlists" title="<?php echo $button_wishlist; ?>" /></a>
	  <div class="stickers"><?php echo $product['sale']; ?><?php echo $product['new']; ?><?php echo $product['popular']; ?></div></div>
      <?php } else { ?>
	  <div class="image">
	  <?php !$product['special'] ? $price_free_delivery = preg_replace("#[^\d]#", "", $product['price']) : $price_free_delivery = preg_replace("#[^\d]#", "", $product['special']); if($price_free_delivery >= 5000) { ?><div class="free-delivery">Бесплатная доставка</div><?php } else { ?><?php } ?>
	  <a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['no_image']; ?>" title="<?php echo $product['name']; ?>" alt="<?php echo $product['name']; ?>" /></a><div class="stickers"><?php echo $product['sale']; ?><?php echo $product['new']; ?><?php echo $product['popular']; ?></div></div>
	  <?php } ?>
		<!--<div class="rating"><img src="catalog/view/theme/default/image/stars-<?php //echo $product['rating']; ?>.png" alt="<?php //echo $product['reviews']; ?>" /></div>-->
      <div class="name"><a href="<?php echo $product['href']; ?>"><?php if( strlen( $product['name'] ) < 235 ) { echo $product['name']; } else { echo mb_substr( $product['name'],0,235,'utf-8' )."..."; } ?></a></div>

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

      <!--<div class="description-list"><?php //echo $product['description_list']; ?></div>
	  <div class="description-grid"><?php //echo $product['description_grid']; ?></div>-->
	  <?php if ($product['price']) { ?>
		<div class="price">
		  <?php if (!$product['special']) { ?>
		    <?php echo $product['price']; ?>
		  <?php } else { ?>
			<span class="price-old"><?php echo $product['price']; ?></span> <span class="price-new"><?php echo $product['special']; ?></span>
		  <?php } ?>
		  <?php if ($product['tax']) { ?>
			<span class="price-tax"><?php echo $text_tax; ?> <?php echo $product['tax']; ?></span>
		  <?php } ?>
		</div>
      <?php } ?>
	  <div class="cart-box">
        <div class="cart-button">
		  <a onclick="addToCart('<?php echo $product['product_id']; ?>');" class="btns c-button" title="" /><?php echo $button_cart; ?></a>
	    </div>
	  </div>
    </div>
    <?php } ?>
  </div>
  <div class="pagination"><?php echo $pagination; ?></div>
  <?php } else { ?>
  <div class="content"><?php echo $text_empty; ?></div>
  <?php }?>
  </div>
  <div class="bottom"></div>
  </div>
  <?php echo $content_bottom; ?>
<script type="text/javascript"><!--
function display(view) {
	if (view == 'list') {
		$('.product-grid').attr('class', 'product-list');
		
		$('.product-list > div').each(function(index, element) {	
			html  = '';
			
			var image = $(element).find('.image').html();
			
			if (image != null) { 
				html += '<div class="image">' + image + '</div>';
			}
			
			var rating = $(element).find('.rating').html();
			
			if (rating != null) {
				html += '<div class="rating">' + rating + '</div>';
			}
			
			html += '  <div class="name">' + $(element).find('.name').html() + '</div>';
			html += '  <div class="attr">' + $(element).find('.attr').html() + '</div>';
			
			var price = $(element).find('.price').html();
			
			if (price != null) {
				html += '<div class="price">' + price  + '</div>';
				
			html += '<div class="cart-box">' + $(element).find('.cart-box').html() + '</div>';
			
			}
			
			//html += '  <div class="description-list">' + $(element).find('.description-list').html() + '</div>';
			//html += '  <div class="description-grid">' + $(element).find('.description-grid').html() + '</div>';
						
			$(element).html(html);
		});	
			
		$('.poshytips').poshytip({
			className: 'tip-twitter',
			showTimeout: 1,
			alignTo: 'target',
			alignX: 'center',
			offsetY: 5,
			allowTipHover: false
		});
		
		$('.colorbox').colorbox({
			overlayClose: true,
			opacity: 0.7,
			width:"1050px",
			height:"85%",
			top: "50px",
			fixed:true,
			rel: "colorbox"
		});
		
		$('.display').html('<img align="absmiddle" src="catalog/view/theme/default/image/icon/list-icon-active.png">&nbsp;<a onclick="display(\'grid\');"><img align="absmiddle" src="catalog/view/theme/default/image/icon/grid-icon.png" title="<?php echo $text_grid; ?>"></a>');
		
		$.totalStorage('display', 'list'); 
	} else {
		$('.product-list').attr('class', 'product-grid');
		
		$('.product-grid > div').each(function(index, element) {
			html = '';
			
			var image = $(element).find('.image').html();
			
			if (image != null) {
				html += '<div class="image">' + image + '</div>';
			}
			
			//html += '  <div class="description-list">' + $(element).find('.description-list').html() + '</div>';
			//html += '<div class="description-grid">' + $(element).find('.description-grid').html() + '</div>';
			
			var rating = $(element).find('.rating').html();
			
			if (rating != null) {
				html += '<div class="rating">' + rating + '</div>';
			}
			
			html += '<div class="name">' + $(element).find('.name').html() + '</div>';
			html += '  <div class="attr">' + $(element).find('.attr').html() + '</div>';
			
			var price = $(element).find('.price').html();
			
			if (price != null) {
				html += '<div class="price">' + price  + '</div>';
			}
			

			html += '<div class="cart-box">' + $(element).find('.cart-box').html() + '</div>';
			
			$(element).html(html);
		});	
		
		$('.poshytips').poshytip({
			className: 'tip-twitter',
			showTimeout: 1,
			alignTo: 'target',
			alignX: 'center',
			offsetY: 5,
			allowTipHover: false
		});
		
		$('.colorbox').colorbox({
			overlayClose: true,
			opacity: 0.7,
			width:"1050px",
			height:"85%",
			top: "50px",
			fixed:true,
			rel: "colorbox"
		});
					
		$('.display').html('<a onclick="display(\'list\');"><img align="absmiddle" src="catalog/view/theme/default/image/icon/list-icon.png" title="<?php echo $text_list; ?>"></a>&nbsp;<img align="absmiddle" src="catalog/view/theme/default/image/icon/grid-icon-active.png">');

		$.totalStorage('display', 'grid');
	}
}

view = $.totalStorage('display');

if (view) {
	display(view);
} else {
	display('grid');
}
//--></script>
<script type="text/javascript"><!--
$(".filter-button").click(function(){$('.overlay-column-left, .close-column-left').fadeIn(300);$('#column-left').css({'transform':'scale(1)','opacity':'1'});$('html').css({'overflow-y':'hidden'});return false});$('.overlay-column-left, .close-column-left').click(function(){$('.overlay-column-left, .close-column-left').delay(100).fadeOut(300);$('#column-left').css({'transform':'scale(0)','opacity':'0'});$('html').css({'overflow-y':'visible'})});
//--></script>
<?php echo $footer; ?>
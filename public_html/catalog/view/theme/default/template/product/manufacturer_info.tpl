<?php echo $header; ?>
</div>
<div class="filter-button">Фильтр</div><div class="overlay-column-left"></div><div class="close-column-left">Закрыть</div>
<div class="m-fix-heading"></div><div class="rast-heading fix-heading"><div class="h1"><h1><?php echo $heading_title; ?></h1></div></div>
<div class="wrapper">
<div class="breadcrumb">
<?php foreach ($breadcrumbs as $i=> $breadcrumb) { ?>
<?php echo $breadcrumb['separator']; ?><?php if($i+1<count($breadcrumbs)) { ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a> <?php } else { ?><?php echo $breadcrumb['text']; ?><?php } ?>
<?php } ?>
</div>
<?php echo $column_left; ?><?php echo $column_right; ?>
<div id="content" class="no-bg"><?php echo $content_top; ?>
  <div class="other-content">
  <?php if ($products) { ?>
  <div class="product-filter">
    <?php $detect = new Mobile_Detect(); { ?><?php if ($detect->isMobile() && !$detect->isTablet()){ ?><?php } else { ?><div class="display"></div><?php } ?><?php } ?>
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
		  <?php if ($quick_view_manufacturers) { ?>
		    <a href="index.php?route=module/quick_view/&product_id=<?php echo $product['product_id']; ?>" class="colorbox button-quick-view"></a>
	      <?php } ?>	  
	  <a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" /></a><div class="stickers"><?php echo $product['sale']; ?><?php echo $product['new']; ?><?php echo $product['popular']; ?></div>
          <a onclick="addToCompare('<?php echo $product['product_id']; ?>');" class="poshytips button-compares" title="<?php echo $button_compare; ?>"></a>
		  <a onclick="addToWishList('<?php echo $product['product_id']; ?>');" class="poshytips button-wishlists" title="<?php echo $button_wishlist; ?>"></a>	  
	  </div>
      <?php } else { ?>
	  <div class="image">
		  <?php if ($quick_view_manufacturers) { ?>
		    <a href="index.php?route=module/quick_view/&product_id=<?php echo $product['product_id']; ?>" class="colorbox button-quick-view"></a>
	      <?php } ?>	  
	  <a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['no_image']; ?>" alt="<?php echo $product['name']; ?>" /></a><div class="stickers"><?php echo $product['sale']; ?><?php echo $product['new']; ?><?php echo $product['popular']; ?></div>
          <a onclick="addToCompare('<?php echo $product['product_id']; ?>');" class="poshytips button-compares" title="<?php echo $button_compare; ?>"></a>
		  <a onclick="addToWishList('<?php echo $product['product_id']; ?>');" class="poshytips button-wishlists" title="<?php echo $button_wishlist; ?>"></a>	  
	  </div>
	  <?php } ?>
      <div class="name"><a href="<?php echo $product['href']; ?>"><?php if( strlen( $product['name'] ) < 35 ) { echo $product['name']; } else { echo mb_substr( $product['name'],0,235,'utf-8' ).""; } ?></a></div>

      <!-- Категория и производитель -->
      <div class="attr">	  
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
		  <?php if ($product['tax']) { ?>
			<span class="price-tax"><?php echo $text_tax; ?> <?php echo $product['tax']; ?></span>
		  <?php } ?>
		</div>
      <?php } ?>
	  <div class="cart-box">
        <div class="cart-button">
		  <input type="button" value="<?php echo $button_cart; ?>" onclick="addToCart('<?php echo $product['product_id']; ?>');" class="btns c-button" />
		</div>
	  </div>
    </div>
    <?php } ?>
  </div>
  <div class="pagination"><?php echo $pagination; ?></div>
  <?php if ($thumb || $description) { ?>
    <div class="main-content">
      <div class="category-info">
		<?php if ($thumb) { ?>
		  <div class="image"><img src="<?php echo $thumb; ?>" alt="<?php echo $heading_title; ?>" /></div>
		<?php } ?>
		<?php if ($description) { ?>
		  <?php echo $description; ?>
		<?php } ?>
	  </div>
	</div>
  <?php } ?>  
  <?php } else { ?>
  <div class="content"><?php echo $text_empty; ?></div>
  <div class="buttons">
    <div class="right"><a href="<?php echo $continue; ?>" class="button"><?php echo $button_continue; ?></a></div>
  </div>
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
			
			html += '<div class="cart-box">' + $(element).find('.cart-box').html() + '</div>';
			
			html += '  <div class="name">' + $(element).find('.name').html() + '</div>';
			html += '  <div class="attr">' + $(element).find('.attr').html() + '</div>';
			
			var price = $(element).find('.price').html();
			
			if (price != null) {
				html += '<div class="price">' + price  + '</div>';
			}
						
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
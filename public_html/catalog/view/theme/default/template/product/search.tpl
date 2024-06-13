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
<div class="h1"><h1><?php echo $heading_title; ?></h1></div></div>
<script>$(document).ready(function() {
$('.colorbox').colorbox({overlayClose:true,opacity:0.7,width:"1050px",height:"85%",top:"50px",fixed:true,rel:"colorbox"});
});</script>
<div class="wrapper">
<?php echo $column_left; ?><?php echo $column_right; ?>
<div id="content" class="no-bg"><?php echo $content_top; ?>
  <div class="main-content">
  <div class="ex-search">
    <div>
      <div class="ex-top">
      <?php if ($search) { ?>
      <input type="text" name="search" value="<?php echo $search; ?>" placeholder="<?php echo $entry_search; ?>" /><input type="button" value="<?php echo $button_search; ?>" id="button-search" />
      <?php } else { ?>
      <input type="text" name="search" value="<?php echo $search; ?>" placeholder="<?php echo $entry_search; ?>" onclick="this.value = '';" onkeydown="this.style.color = '000000'" style="color: #999;" /><input type="button" value="<?php echo $button_search; ?>" id="button-search" />
      <?php } ?>
	  </div>
	  
	  <div class="ex-bottom">
      <select name="category_id">
        <option value="0"><?php echo $text_category; ?></option>
        <?php foreach ($categories as $category_1) { ?>
        <?php if ($category_1['category_id'] == $category_id) { ?>
        <option value="<?php echo $category_1['category_id']; ?>" selected="selected"><?php echo $category_1['name']; ?></option>
        <?php } else { ?>
        <option value="<?php echo $category_1['category_id']; ?>"><?php echo $category_1['name']; ?></option>
        <?php } ?>
        <?php foreach ($category_1['children'] as $category_2) { ?>
        <?php if ($category_2['category_id'] == $category_id) { ?>
        <option value="<?php echo $category_2['category_id']; ?>" selected="selected">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $category_2['name']; ?></option>
        <?php } else { ?>
        <option value="<?php echo $category_2['category_id']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $category_2['name']; ?></option>
        <?php } ?>
        <?php foreach ($category_2['children'] as $category_3) { ?>
        <?php if ($category_3['category_id'] == $category_id) { ?>
        <option value="<?php echo $category_3['category_id']; ?>" selected="selected">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $category_3['name']; ?></option>
        <?php } else { ?>
        <option value="<?php echo $category_3['category_id']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $category_3['name']; ?></option>
        <?php } ?>
        <?php } ?>
        <?php } ?>
        <?php } ?>
      </select>
    <?php if ($description) { ?>
    <input type="checkbox" name="description" value="1" id="description" checked="checked" />
    <?php } else { ?>
    <input type="checkbox" name="description" value="1" id="description" />
    <?php } ?>
    <label for="description"><?php echo $entry_description; ?></label>
	</div>
    </div>
  </div>

  <?php if ($products) { ?>
  <div class="product-list">
    <?php foreach ($products as $product) { ?>
    <div class="search-box">
     <?php if ($product['thumb']) { ?>
      <div class="image">
	  <?php !$product['special'] ? $price_free_delivery = preg_replace("#[^\d]#", "", $product['price']) : $price_free_delivery = preg_replace("#[^\d]#", "", $product['special']); if($price_free_delivery >= 5000) { ?><div class="free-delivery">Бесплатная доставка</div><?php } else { ?><?php } ?> 
		  <?php if ($quick_view_search) { ?>
		    <a href="index.php?route=module/quick_view/&product_id=<?php echo $product['product_id']; ?>" class="colorbox button-quick-view" title="<?php echo $button_quick_view; ?>"></a>
	      <?php } ?>	  
	  <a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" title="<?php echo $product['name']; ?>" alt="<?php echo $product['name']; ?>" /></a><div class="stickers"><?php echo $product['sale']; ?><?php echo $product['new']; ?><?php echo $product['popular']; ?></div>
          <a onclick="addToCompare('<?php echo $product['product_id']; ?>');" class="poshytips button-compares" title="<?php echo $button_compare; ?>"></a>
		  <a onclick="addToWishList('<?php echo $product['product_id']; ?>');" class="poshytips button-wishlists" title="<?php echo $button_wishlist; ?>"></a>	  
	  </div>
      <?php } else { ?>
	  <div class="image">
	  <?php !$product['special'] ? $price_free_delivery = preg_replace("#[^\d]#", "", $product['price']) : $price_free_delivery = preg_replace("#[^\d]#", "", $product['special']); if($price_free_delivery >= 5000) { ?><div class="free-delivery">Бесплатная доставка</div><?php } else { ?><?php } ?> 
		  <?php if ($quick_view_search) { ?>
		    <a href="index.php?route=module/quick_view/&product_id=<?php echo $product['product_id']; ?>" class="colorbox button-quick-view" title="<?php echo $button_quick_view; ?>"></a>
	      <?php } ?>		  
	  <a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['no_image']; ?>" title="<?php echo $product['name']; ?>" alt="<?php echo $product['name']; ?>" /></a><div class="stickers"><?php echo $product['sale']; ?><?php echo $product['new']; ?><?php echo $product['popular']; ?></div>
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

      <!--<div class="description-list"><?php echo $product['description_list']; ?></div>
	  <div class="description-grid"><?php echo $product['description_grid']; ?></div>-->
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
		  <a onclick="addToCart('<?php echo $product['product_id']; ?>');" class="btns c-button"><?php echo $button_cart; ?></a>
	    </div>
	  </div>
    </div>
    <?php } ?>
  </div>
  <div class="pagination"><?php echo $pagination; ?></div>
  <?php } else { ?>
  <div class="zero"><?php echo $text_empty; ?></div>
  <?php }?>
  </div>
  <div class="bottom"></div>
  <?php echo $content_bottom; ?></div>
<script type="text/javascript"><!--
$('#content input[name=\'search\']').keydown(function(e) {
	if (e.keyCode == 13) {
		$('#button-search').trigger('click');
	}
});

$('select[name=\'category_id\']').bind('change', function() {
	if (this.value == '0') {
		$('input[name=\'sub_category\']').attr('disabled', 'disabled');
		$('input[name=\'sub_category\']').removeAttr('checked');
	} else {
		$('input[name=\'sub_category\']').removeAttr('disabled');
	}
});

$('select[name=\'category_id\']').trigger('change');

$('#button-search').bind('click', function() {
	url = 'index.php?route=product/search';
	
	var search = $('#content input[name=\'search\']').attr('value');
	
	if (search) {
		url += '&search=' + encodeURIComponent(search);
	}

	var category_id = $('#content select[name=\'category_id\']').attr('value');
	
	if (category_id > 0) {
		url += '&category_id=' + encodeURIComponent(category_id);
	}
	
	var sub_category = $('#content input[name=\'sub_category\']:checked').attr('value');
	
	if (sub_category) {
		url += '&sub_category=true';
	}
		
	var filter_description = $('#content input[name=\'description\']:checked').attr('value');
	
	if (filter_description) {
		url += '&description=true';
	}

	location = url;
});

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
			}
			
			html += '<div class="cart-box">' + $(element).find('.cart-box').html() + '</div>';
			
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
<?php if (isset($remarketing_code) && $remarketing_code) echo $remarketing_code; ?>
<?php echo $footer; ?>
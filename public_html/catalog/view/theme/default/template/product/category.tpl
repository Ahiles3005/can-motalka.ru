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
<div id="content" class="no-bg"><?php if ($categories) { ?><?php echo $content_top; ?><?php } ?>
  <div class="main-content">
  <?php if ($categories) { ?>
  <?php if ($view_subcategories == 'images') { ?>
    <div class="category-list">
<?php function translit($s) {
  $s = (string) $s;
  $s = strip_tags($s);
  $s = str_replace(array("\n", "\r"), " ", $s);
  $s = preg_replace("/\s+/", ' ', $s);
  $s = trim($s);
  $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s);
  $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>'',' '=>'','  '=>'','   '=>''));
  $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s);
  $s = str_replace(" ", "-", $s);
  return $s;
} ?>
	  <p class="fake-h2"><?php echo $text_refine; ?></p>
	    <?php foreach ($categories as $category) { ?>
		    <?php if ($category['thumb']) { ?>
			<div class="<?php echo translit($category['name']) ?>">
			<a href="<?php echo $category['href']; ?>"></a>
			  <div class="left"><img src="<?php echo $category['thumb']; ?>" alt="<?php echo $category['name']; ?>" /></div><div class="right"><img src="image/data/cars/subcat/<?php echo translit($category['name']) ?>.jpg" alt="<?php echo $category['name']; ?>" /><span><?php echo $category['name']; ?></span></div>
			</div>
		    <?php } else { ?>
			  <div class="image"><a href="<?php echo $category['href']; ?>"><img src="<?php echo $category['no_image']; ?>" alt="<?php echo $category['name']; ?>" /><span><?php echo $category['name']; ?></span></a></div>
		    <?php } ?>
		<?php } ?>
    </div>
  <?php } ?>
  <?php if ($view_subcategories == 'default') { ?>
    <div class="category-list">
	    <p class="fake-h2"><?php echo $text_refine; ?></p>
		<?php if (count($categories) <= 5) { ?>
		  <ul>
           <?php foreach ($categories as $category) { ?>
              <li><a href="<?php echo $category['href']; ?>"><?php echo $category['name']; ?></a></li>
            <?php } ?>
		  </ul>
	    <?php } else { ?>
		  <?php for ($i = 0; $i < count($categories);) { ?>
		    <ul>
			  <?php $j = $i + ceil(count($categories) / 4); ?>
			  <?php for (; $i < $j; $i++) { ?>
			    <?php if (isset($categories[$i])) { ?>
				  <li><a href="<?php echo $categories[$i]['href']; ?>"><?php echo $categories[$i]['name']; ?></a></li>
			    <?php } ?>
			  <?php } ?>
		    </ul>
		  <?php } ?>
	    <?php } ?>
	</div>
  <?php } ?>
  <?php } ?>
  <?php if ($products) { ?>
  <div class="product-list" itemtype="https://schema.org/ItemList" itemscope>
    <?php foreach ($products as $product) { ?>
    <div itemtype="https://schema.org/Product" itemprop="itemListElement" itemscope>
      <?php if ($product['thumb']) { ?>
      <div class="image">
	  <meta itemprop="image" content="<?php echo $product['thumb']; ?>">
      <?php !$product['special'] ? $price_free_delivery = preg_replace("#[^\d]#", "", $product['price']) : $price_free_delivery = preg_replace("#[^\d]#", "", $product['special']); if($price_free_delivery >= 5000) { ?><div class="free-delivery">Бесплатная доставка</div><?php } else { ?><?php } ?>
		  <?php if ($quick_view_categories) { ?>
		    <a href="index.php?route=module/quick_view/&product_id=<?php echo $product['product_id']; ?>" class="colorbox button-quick-view"></a>
	      <?php } ?>	  
	  <a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" /></a><div class="stickers"><?php echo $product['sale']; ?><?php echo $product['new']; ?><?php echo $product['popular']; ?></div>		  
	  </div>
      <?php } else { ?>
	  <div class="image">
	  <meta itemprop="image" content="<?php echo $product['no_image']; ?>">
	  <?php !$product['special'] ? $price_free_delivery = preg_replace("#[^\d]#", "", $product['price']) : $price_free_delivery = preg_replace("#[^\d]#", "", $product['special']); if($price_free_delivery >= 5000) { ?><div class="free-delivery">Бесплатная доставка</div><?php } else { ?><?php } ?>
		  <?php if ($quick_view_categories) { ?>
		    <a href="index.php?route=module/quick_view/&product_id=<?php echo $product['product_id']; ?>" class="colorbox button-quick-view"></a>
	      <?php } ?>	  
	  <a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['no_image']; ?>" alt="<?php echo $product['name']; ?>" /></a><div class="stickers"><?php echo $product['sale']; ?><?php echo $product['new']; ?><?php echo $product['popular']; ?></div>	  
	  </div>
	  <?php } ?>
      <div class="name">
	  <meta itemprop="name" content="<?php if( strlen( $product['name'] ) < 235 ) { echo $product['name']; } else { echo mb_substr( $product['name'],0,235,'utf-8' ).""; } ?>">
	  <link itemprop="url" href="<?php echo $product['href']; ?>">
	  <a href="<?php echo $product['href']; ?>"><?php if( strlen( $product['name'] ) < 235 ) { echo $product['name']; } else { echo mb_substr( $product['name'],0,235,'utf-8' ).""; } ?></a></div>
	  <div class="description-list"><?php echo $product['description_list']; ?>
	  <meta itemprop="description" content="<?php echo $product['description_list']; ?>">
	  </div>
	  <?php if ($product['price']) { ?>
		<div class="price" itemscope itemprop="offers" itemtype="https://schema.org/Offer">
		<meta itemprop="price" content="<?php echo rtrim(preg_replace("/[^0-9\.]/", "", ($product['special'] ? $product['special'] : $product['price'])), '.'); ?>">
		<meta itemprop="priceCurrency" content="<?php echo $this->currency->getCode(); ?>">
		<link itemprop="availability" href="https://schema.org/<?php echo ($product['availability'] ? "InStock" : "OutOfStock") ?>" />
		  <?php if (!$product['special']) { ?>
		    <?php echo $product['price']; ?>
		  <?php } else { ?>
			<span class="price-old"><?php echo $product['price']; ?></span> <span class="price-new"><?php echo $product['special']; ?></span>
		  <?php } ?>
		  <?php if ($product['tax']) { ?>
			<span class="price-tax"><?php echo $text_tax; ?> <?php echo $product['tax']; ?></span>
		  <?php } ?>
		  <p>- Доставка бесплатно</p>
		</div>
      <?php } ?>
	  <div itemscope itemprop="aggregateRating" itemtype="http://schema.org/AggregateRating" class="rating">
	  <meta itemprop="reviewCount" content="<?php echo preg_replace("/[^0-9]/", "", $product['reviews']); ?>">
	  <meta itemprop="ratingValue" content="<?php echo $product['rating']; ?>">
	  <meta itemprop="bestRating" content="5">
	  <meta itemprop="worstRating" content="1">
	  <img src="catalog/view/theme/default/image/stars-<?php echo $product['rating']; ?>.png" alt="<?php echo $product['reviews']; ?>" /></div>
	  <div class="cart-box">
        <div class="cart-button" style="display:flex;flex-direction:row;align-items:flex-start;flex-wrap:wrap">
		  <input type="button" value="<?php echo $button_cart; ?>" onclick="addToCart('<?php echo $product['product_id']; ?>');" class="btns c-button" style="flex-basis:35%" />
			  <?php if ($product['upc']) { ?><a href="<?php echo $product['upc']; ?>" class="btns prod-cart ali" target="_blank" rel="noopener noreferrer" style="display: block;width: auto;height:35px;line-height:35px;padding: 0 10px!important;">Заказать с AliExpress</a><?php } ?>
			  <?php if ($product['ozon']) { ?><a href="<?php echo $product['ozon']; ?>" class="btns prod-cart ozon" target="_blank" rel="noopener noreferrer" style="display: block;width: auto;height:35px;line-height:35px;padding: 0 10px!important;text-align: center;">Заказать на OZON</a><?php } ?>
		</div>
	  </div>
	  <div class="units_sold"><p><?php echo $text_units_sold; ?> <span class="bold"><?php if ($product['units_sold'] < 1) { ?>0<?php } else { ?><?php echo $product['units_sold']; ?><?php } ?></span></p></div>
    </div>
    <?php } ?>
  </div>
  <?php } ?>
  <?php if (!$categories && !$products) { ?>
  <div class="content"><?php echo $text_empty; ?></div>
  <div class="buttons">
    <div class="right"><a href="<?php echo $continue; ?>" class="button"><?php echo $button_continue; ?></a></div>
  </div>
  <?php } ?>
  </div>
<?php if ($description) { ?>
  <div class="category-info">
    <?php if ($description) { ?>
    <?php echo $description; ?>
    <?php } ?>
  </div>
  <?php } ?>  
  <div class="bottom"></div>
  </div>
  <?php echo $content_bottom; ?>
<script><!--
function display(view) {
	if (view == 'list') {
		$('.product-grid').attr('class', 'product-list');
		
		$('.product-list > div').each(function(index, element) {	
			html  = '';
			
			var image = $(element).find('.image').html();
			
			if (image != null) { 
				html += '<div class="image">' + image + '</div>';
			}
			
			html += '  <div class="name">' + $(element).find('.name').html() + '</div>';
			
			html += '  <div class="description-list">' + $(element).find('.description-list').html() + '</div>';
			
			var price = $(element).find('.price').html();
			
			if (price != null) {
				html += '<div class="price">' + price  + '</div>';

			var rating = $(element).find('.rating').html();
			
			if (rating != null) {
				html += '<div class="rating">' + rating + '</div>';
			}

			html += '<div class="cart-box">' + $(element).find('.cart-box').html() + '</div>';
			html += '<div class="units_sold">' + $(element).find('.units_sold').html() + '</div>';			
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
		
		$('.display').html('<?php echo $text_display; ?>&nbsp;<img align="absmiddle" src="catalog/view/theme/default/image/icon/list-icon-active.png">&nbsp;<a onclick="display(\'grid\');"><img align="absmiddle" src="catalog/view/theme/default/image/icon/grid-icon.png" title="<?php echo $text_grid; ?>"></a>');
		
		$.totalStorage('display', 'list'); 
	} else {
		$('.product-list').attr('class', 'product-grid');
		
		$('.product-grid > div').each(function(index, element) {
			html = '';
			
			var image = $(element).find('.image').html();
			
			if (image != null) {
				html += '<div class="image">' + image + '</div>';
			}
			
			html += '<div class="name">' + $(element).find('.name').html() + '</div>';
			
			var price = $(element).find('.price').html();
			
			if (price != null) {
				html += '<div class="price">' + price  + '</div>';
			}
			
			var rating = $(element).find('.rating').html();
			
			if (rating != null) {
				html += '<div class="rating">' + rating + '</div>';
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
					

		$.totalStorage('display', 'list');
	}
}

view = $.totalStorage('display');

if (view) {
	display(view);
} else {
	display('list');
}
//--></script>
<?php if (isset($remarketing_code) && $remarketing_code) echo $remarketing_code; ?>
<?php echo $footer; ?>
<?php echo $header; ?>
</div>
<div class="rast-heading" style="<?php //echo $cat_id; ?>">
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
<div class="wrapper">
<?php echo $column_left; ?>
<div id="content"><?php echo $content_top; ?>
<div class="my_floating_buttons">
	<div class="cart-box-action">
		<input type="button" value="Заказать на сайте" class="btns prod-cart" onclick="addToCart('<?=$product_id?>');" title="" />
		<input type="hidden" name="product_id" value="<?php echo $product_id; ?>" />
		<?php if ($ozon) { ?><a href="<?php echo $ozon; ?>" class="btns prod-cart ozon<?if ($upc) {?> my_half<?}?>" target="_blank" rel="noopener noreferrer">Заказать на OZON</a><?php } ?>
		<?php if ($upc) { ?><a href="<?php echo $upc; ?>" class="btns prod-cart ali<?if ($ozon) {?> my_half<?}?>" target="_blank" rel="noopener noreferrer">Заказать на AliExpress</a><?php } ?>
	</div>
</div>
<style type="text/css">
	.cart-box-action {
		display: flex;
		justify-content: space-around;
		align-items: center;
	}
	.cart-box-action > a, .cart-box-action > input {
		margin: 8px 0 !important;
		display: flex !important;
		justify-content: center;
		align-items: center;
		padding: 1rem !important;
		width: auto;
	}
	.my_floating_buttons {
		display: none;
		position: fixed;
		z-index: 10;
		width: 100vw;
		left: 0;
		background-color: #f0f0f0;
		top: 3rem;
	}
	.my_floating_buttons > .cart-box-action {
		width: 914px;
		margin: auto;
		display: flex;
		justify-content: space-around;
		align-items: center;
	}
	.my_floating_buttons > .cart-box-action > a {
		margin: 8px 0 !important;
		display: flex !important;
		justify-content: center;
		align-items: center;
		padding: 0 !important;
	}
	@media (max-width: 1170px) {
		.my_floating_buttons > .cart-box-action {
			width: 100vw;
		}
		.my_floating_buttons > .cart-box-action > a.my_half {
			width: 432px !important;
		}
	}
	@media (max-width: 768px) {
		.my_floating_buttons > .cart-box-action > input {
			display: none !important;
		}
		.my_floating_buttons > .cart-box-action > a {
			width: 95vw !important;
			flex-basis: auto !important;
			font-size: 12px !important;
			text-transform: none !important;
			height: 33px;
		}
		.my_floating_buttons > .cart-box-action > a.my_half {
			width: 45vw !important;
			font-size: 12px !important;
		}
		.my_floating_buttons > .cart-box-action > a.ozon {
			border-radius: 6px;
			background: #005AF9;
		}
		.my_floating_buttons > .cart-box-action > a.ali {
			background: #FF532D !important;
			border-radius: 6px;
			line-height: normal;
		}
	}
	@media (max-width: 410px) {
		.my_floating_buttons {
			top: 45px;
		}
	}
</style>
  <div class="main-content white">
  <div class="product-info" itemscope itemtype="https://schema.org/Product"> 
  <meta itemprop="name" content="<?php echo $heading_title; ?>">
  <meta itemprop="description" content="<?php echo str_replace("\"", "&quot;", utf8_substr(trim(strip_tags(html_entity_decode($description, ENT_QUOTES, 'UTF-8') ), " \t\n\r"), 0, 555) . '..'); ?>">
  <link itemprop="url" href="<?php echo $url; ?>">
    <?php if ($config_zoom) { ?>
	  <div class="left">
        <?php if ($thumb) { ?>
          <?php foreach ($images as $image) { ?>
            <div class="view-images"><a href="<?php echo $image['popup']; ?>" title="<?php echo $heading_title; ?>" data-gal="prettyPhoto[gallery]"><img src="<?php echo $image['thumb']; ?>" title="<?php echo $heading_title; ?>" alt="<?php echo $heading_title; ?>" id="image" /></a>			
			</div>
          <?php } ?>
          <?php if ($thumb) { ?>
            <div class="image"> 
              <a href="<?php echo $popup; ?>" title="<?php echo $heading_title; ?>" class = 'cloud-zoom' id='zoom1' rel="position: 'right' ,showTitle:false, adjustX:-0, adjustY:-4" data-gal="prettyPhoto[gallery]"><img src="<?php echo $thumb; ?>" title="<?php echo $heading_title; ?>" alt="<?php echo $heading_title; ?>" /></a>
              <div class="stickers"><?php echo $sale; ?><?php echo $new; ?><?php echo $popular; ?></div>	  
			</div>
          <?php } ?>	  
		<?php } ?>
        <?php if ($images) { ?>
          <div class="image-additional">
            <?php foreach ($images as $image) { ?>
              <a href="<?php echo $image['popup']; ?>" title="<?php echo $heading_title; ?>" class="cloud-zoom-gallery" rel="useZoom: 'zoom1', smallImage: '<?php echo $image['thumb_zoom']; ?>' "><img src="<?php echo $image['small']; ?>" title="<?php echo $heading_title; ?>" alt="<?php echo $heading_title; ?>" /></a>
            <?php } ?>
          </div>
        <?php } ?>    
      </div>
	<?php } else { ?>
	  <div class="left">
		<?php if ($thumb) { ?>
		  <div class="image">
		  <meta itemprop="image" content="<?php echo $thumb; ?>">
		  <a href="<?php echo $popup; ?>" title="<?php echo $heading_title; ?>" data-gal="prettyPhoto[gallery]"><img src="<?php echo $thumb; ?>" title="<?php echo $heading_title; ?>" alt="<?php echo $heading_title; ?>" id="image" /></a>
              <div class="stickers"><?php echo $sale; ?><?php echo $new; ?><?php echo $popular; ?></div>
		  </div>
		  <?php } ?>
		<?php if ($images) { ?>
		  <div class="image-additional">
			<?php foreach ($images as $image) { ?>
			  <a href="<?php echo $image['popup']; ?>" title="<?php echo $heading_title; ?>" data-gal="prettyPhoto[gallery]"><img src="<?php echo $image['thumb']; ?>" title="<?php echo $heading_title; ?>" alt="<?php echo $heading_title; ?>" /></a>
			<?php } ?>
		  </div>
		<?php } ?>
	  </div>
	<?php } ?>
    <div class="right">	
        <div class="instock"><?php echo $text_stock; ?></div><?php echo $stock; ?>
      <div class="description">
		<span><?php echo $text_model; ?></span> <?php echo $model; ?><br />
		<?php if ($sku) { ?><span><?php echo $text_sku; ?></span><?php } ?> <?php echo $sku; ?><br />
		<?php if ($ean) { ?>
		  <span><?php echo $text_ean; ?></span> <?php echo $ean; ?><br />
        <?php } ?>
		<?php if ($jan) { ?>
		  <span><?php echo $text_jan; ?></span> <?php echo $jan; ?><br />
        <?php } ?>
		<?php if ($isbn) { ?>
		  <span><?php echo $text_isbn; ?></span> <?php echo $isbn; ?><br />
        <?php } ?>
		<?php if ($mpn) { ?>
		  <span><?php echo $text_mpn; ?></span> <?php echo $mpn; ?><br />
        <?php } ?>
		<?php if ($display_weight) { ?>
		  <?php if ($weight) { ?>
		    <span><?php echo $text_weight; ?> </span> <?php echo $weight; ?><br />
		  <?php } ?>
		<?php } ?>
		<?php if ($location) { ?>
		  <span><?php echo $text_location; ?></span> <?php echo $location; ?><br />
        <?php } ?>
        <?php if ($reward) { ?>
        <span><?php echo $text_reward; ?></span> <?php echo $reward; ?><br />
        <?php } ?>
      <?php if ($options) { ?>
      <div class="options">
        <?php foreach ($options as $option) { ?>
        <?php if ($option['type'] == 'select') { ?>
        <div id="option-<?php echo $option['product_option_id']; ?>" class="option">
          <?php if ($option['required']) { ?>
          <span class="required">*</span>
          <?php } ?>
          <b><?php echo $option['name']; ?>:</b><br />
          <select name="option[<?php echo $option['product_option_id']; ?>]">
            <option value=""><?php echo $text_select; ?></option>
            <?php foreach ($option['option_value'] as $option_value) { ?>
            <option value="<?php echo $option_value['product_option_value_id']; ?>"><?php echo $option_value['name']; ?>
            <?php if ($option_value['price']) { ?>
            (<?php echo $option_value['price_prefix']; ?><?php echo $option_value['price']; ?>)
            <?php } ?>
            </option>
            <?php } ?>
          </select>
        </div>

        <?php } ?>
        <?php if ($option['type'] == 'radio') { ?>
        <div id="option-<?php echo $option['product_option_id']; ?>" class="option">
          <?php if ($option['required']) { ?>
          <span class="required">*</span>
          <?php } ?>
          <b><?php echo $option['name']; ?>:</b><br />
          <?php foreach ($option['option_value'] as $option_value) { ?>
          <input type="radio" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option_value['product_option_value_id']; ?>" id="option-value-<?php echo $option_value['product_option_value_id']; ?>" />
          <label for="option-value-<?php echo $option_value['product_option_value_id']; ?>"><?php echo $option_value['name']; ?>
            <?php if ($option_value['price']) { ?>
            (<?php echo $option_value['price_prefix']; ?><?php echo $option_value['price']; ?>)
            <?php } ?>
          </label>
          <br />
          <?php } ?>
        </div>

        <?php } ?>
        <?php if ($option['type'] == 'checkbox') { ?>
        <div id="option-<?php echo $option['product_option_id']; ?>" class="option">
          <?php if ($option['required']) { ?>
          <span class="required">*</span>
          <?php } ?>
          <b><?php echo $option['name']; ?>:</b><br />
          <?php foreach ($option['option_value'] as $option_value) { ?>
          <input type="checkbox" name="option[<?php echo $option['product_option_id']; ?>][]" value="<?php echo $option_value['product_option_value_id']; ?>" id="option-value-<?php echo $option_value['product_option_value_id']; ?>" />
          <label for="option-value-<?php echo $option_value['product_option_value_id']; ?>"><?php echo $option_value['name']; ?>
            <?php if ($option_value['price']) { ?>
            (<?php echo $option_value['price_prefix']; ?><?php echo $option_value['price']; ?>)
            <?php } ?>
          </label>
          <br />
          <?php } ?>
        </div>

        <?php } ?>
        <?php if ($option['type'] == 'image') { ?>
        <div id="option-<?php echo $option['product_option_id']; ?>" class="option">
          <?php if ($option['required']) { ?>
          <span class="required">*</span>
          <?php } ?>
          <b><?php echo $option['name']; ?>:</b><br />
          <table class="option-image">
            <?php foreach ($option['option_value'] as $option_value) { ?>
            <tr>
              <td style="width: 1px;"><input type="radio" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option_value['product_option_value_id']; ?>" id="option-value-<?php echo $option_value['product_option_value_id']; ?>" /></td>
              <td><label for="option-value-<?php echo $option_value['product_option_value_id']; ?>"><img src="<?php echo $option_value['image']; ?>" alt="<?php echo $option_value['name'] . ($option_value['price'] ? ' ' . $option_value['price_prefix'] . $option_value['price'] : ''); ?>" /></label></td>
              <td><label for="option-value-<?php echo $option_value['product_option_value_id']; ?>"><?php echo $option_value['name']; ?>
                  <?php if ($option_value['price']) { ?>
                  (<?php echo $option_value['price_prefix']; ?><?php echo $option_value['price']; ?>)
                  <?php } ?>
                </label></td>
            </tr>
            <?php } ?>
          </table>
        </div>

        <?php } ?>
        <?php if ($option['type'] == 'text') { ?>
        <div id="option-<?php echo $option['product_option_id']; ?>" class="option">
          <?php if ($option['required']) { ?>
          <span class="required">*</span>
          <?php } ?>
          <b><?php echo $option['name']; ?>:</b><br />
          <input type="text" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option['option_value']; ?>" />
        </div>

        <?php } ?>
        <?php if ($option['type'] == 'textarea') { ?>
        <div id="option-<?php echo $option['product_option_id']; ?>" class="option">
          <?php if ($option['required']) { ?>
          <span class="required">*</span>
          <?php } ?>
          <b><?php echo $option['name']; ?>:</b><br />
          <textarea name="option[<?php echo $option['product_option_id']; ?>]" cols="40" rows="5"><?php echo $option['option_value']; ?></textarea>
        </div>

        <?php } ?>
        <?php if ($option['type'] == 'file') { ?>
        <div id="option-<?php echo $option['product_option_id']; ?>" class="option">
          <?php if ($option['required']) { ?>
          <span class="required">*</span>
          <?php } ?>
          <b><?php echo $option['name']; ?>:</b><br />
          <input type="button" value="<?php echo $button_upload; ?>" id="button-option-<?php echo $option['product_option_id']; ?>" class="button">
          <input type="hidden" name="option[<?php echo $option['product_option_id']; ?>]" value="" />
        </div>

        <?php } ?>
        <?php if ($option['type'] == 'date') { ?>
        <div id="option-<?php echo $option['product_option_id']; ?>" class="option">
          <?php if ($option['required']) { ?>
          <span class="required">*</span>
          <?php } ?>
          <b><?php echo $option['name']; ?>:</b><br />
          <input type="text" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option['option_value']; ?>" class="date" />
        </div>

        <?php } ?>
        <?php if ($option['type'] == 'datetime') { ?>
        <div id="option-<?php echo $option['product_option_id']; ?>" class="option">
          <?php if ($option['required']) { ?>
          <span class="required">*</span>
          <?php } ?>
          <b><?php echo $option['name']; ?>:</b><br />
          <input type="text" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option['option_value']; ?>" class="datetime" />
        </div>

        <?php } ?>
        <?php if ($option['type'] == 'time') { ?>
        <div id="option-<?php echo $option['product_option_id']; ?>" class="option">
          <?php if ($option['required']) { ?>
          <span class="required">*</span>
          <?php } ?>
          <b><?php echo $option['name']; ?>:</b><br />
          <input type="text" name="option[<?php echo $option['product_option_id']; ?>]" value="<?php echo $option['option_value']; ?>" class="time" />
        </div>

        <?php } ?>
        <?php } ?>
      </div>
      <?php } ?>
	  </div>
		<?php if ($quantity < 1) { ?><p class="quantity0">Нет в наличии</p><?php } else { ?><div class="cart">
		  <div>	  
		    <div class="cart-box-bottom">
		  <?php if ($price) { ?>
		    <div class="price" itemscope itemprop="offers" itemtype="https://schema.org/Offer">
			<meta itemprop="price" content="<?php echo rtrim(preg_replace("/[^0-9\.]/", "", ($special ? $special : $price)), '.'); ?>">
			<meta itemprop="priceCurrency" content="<?php echo $this->currency->getCode(); ?>">
			<link itemprop="availability" href="https://schema.org/<?php echo (($availability) ? 'InStock' : 'OutOfStock') ?>" />
			<?php echo $text_price; ?>
			  <?php if (!$special) { ?>
			    <?php echo $price; ?>
			  <?php } else { ?>
			    <span class="price-old"><?php echo $price; ?></span> <span class="price-new"><?php echo $special; ?></span>
			  <?php } ?>
		    </div>
			<p>В стоимость прибора уже включена стоимость пересылки почтой и комиссия почты за денежный перевод. <span class="bold">Оплата при получении</span></p>
			<?php echo $column_right; ?>
		  <?php } ?>
		    </div>
			<div class="cart-box-action">
			<input type="button" value="Заказать на сайте<?//php echo $button_cart; ?>" id="button-cart" class="btns prod-cart" title="" />
			<input type="hidden" name="product_id" value="<?php echo $product_id; ?>" />
      <?php if ($ozon) { ?><a href="<?php echo $ozon; ?>" class="btns prod-cart ozon" target="_blank" rel="noopener noreferrer">Заказать на OZON</a><?php } ?>
      <?php if ($upc) { ?><a href="<?php echo $upc; ?>" class="btns prod-cart ali" target="_blank" rel="noopener noreferrer">Заказать с AliExpress</a><?php } ?>
			<?//<a href="javascript:void(0);" data-modal="cback-id" class="cback-form-open" onclick="return false;">Заказать консультацию</a>?>
			</div>
		  </div>
		    <?php if ($minimum > 1) { ?>
			  <div class="minimum">*<?php echo $text_minimum; ?></div>
		    <?php } ?>		  
	    </div><?php } ?>
		<p class="sp2"><?php echo $text_units_sold; ?> <span class="bold"><?php if ($units_sold < 1) { ?>0<?php } else { ?><?php echo $units_sold; ?><?php } ?></span></p>
		    <div class="priceadd">	
        <?php if ($tax) { ?>
        <span class="price-tax"><?php echo $text_tax; ?> <?php echo $tax; ?></span><br />
        <?php } ?>
        <?php if ($points) { ?>
        <?php echo $text_points; ?> <?php echo $points; ?><br />
        <?php } ?>
        <?php if ($discounts) { ?>
        <div class="discount">
          <?php foreach ($discounts as $discount) { ?>
          <?php echo sprintf($text_discount, $discount['quantity'], $discount['price']); ?><br />
          <?php } ?>
        </div>
        <?php } ?>	
		    </div>
		<div class="review">
		</div>
      <?php if ($review_status) { ?>
      <div class="review">
			<span itemscope itemprop="aggregateRating" itemtype="https://schema.org/AggregateRating">
				<meta itemprop="reviewCount" content="<?php echo $reviewCount; ?>">
				<meta itemprop="ratingValue" content="<?php echo $ratingValue; ?>">
				<meta itemprop="bestRating" content="5">
				<meta itemprop="worstRating" content="1">
			</span>  
        <div><img src="catalog/view/theme/default/image/stars-<?php echo $rating; ?>.png" alt="<?php echo $reviews; ?>" />&nbsp;&nbsp;<a onclick="$('a[href=\'#tab-review\']').trigger('click');" class="all-reviews"><?php echo $reviews; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onclick="$('a[href=\'#tab-review\']').trigger('click');" class="add-review"><?php echo $text_write; ?></a>
		<script>
		$(function(){$('.product-info .review > div a.all-reviews').on('click',function(e){$('html,body').stop().animate({scrollTop:$('#tab-review').offset().top},600);e.preventDefault()})});
		$(function(){$('.product-info .review > div a.add-review').on('click',function(e){$('html,body').stop().animate({scrollTop:$('#addreview').offset().top},600);e.preventDefault()})});
		</script>
		</div>
      </div>
      <?php } ?>
	  </div>
    </div><!--end-product-info-->
  </div>
  <div id="tabs" class="htabs white">
    <a href="#tab-attribute"><?php echo $tab_attribute; ?></a>
	<?php if ($products) { ?>
    <a href="#tab-related"><?php echo $tab_related; ?> (<?php echo count($products); ?>)</a>
    <?php } ?>
	<a href="#tab-info">Доставка/оплата</a>
    <?php if ($review_status) { ?>
    <a href="#tab-review"><?php echo $tab_review; ?></a>
    <?php } ?>
  </div>
  <div id="tab-attribute" class="tab-content white">
  <div class="attribute-content">
  <?php if ($attribute_groups) { ?>
    <table class="attribute" <?php if ($attribute_groups) { ?>style="display:inline-block;vertical-align:top;width:35%"<?php } ?>>
      <?php foreach ($attribute_groups as $attribute_group) { ?>
      <tbody>
        <?php foreach ($attribute_group['attribute'] as $attribute) { ?>
        <tr>
          <td><?php echo $attribute['name']; ?></td>
          <td><?php echo $attribute['text']; ?></td>
        </tr>
        <?php } ?>
      </tbody>
      <?php } ?>
    </table>
  <?php } ?>
  <div id="tab-description" class="tab-content white" <?php if ($attribute_groups) { ?>style="display:inline-block;vertical-align:top;width:60%"<?php } ?>>
<?php echo $description; ?>
<script>
function youTubes_makeDynamic() {
var $ytIframes = $('iframe[src*="youtube.com"]');
$ytIframes.each(function (i,e) {
var $ytFrame = $(e);
var ytKey; var tmp = $ytFrame.attr('src').split(/\//); tmp = tmp[tmp.length - 1]; tmp = tmp.split('?'); ytKey = tmp[0];
var $ytLoader = $('<div class="ytLoaders">');
$ytLoader.append($('<img src="https://i.ytimg.com/vi/'+ytKey+'/hqdefault.jpg">'));
$ytLoader.append($('<div class="play-containers"><a href="javascript:void(0);"class="playBut"></a></div>'));
$ytLoader.data('$ytFrame',$ytFrame);
$ytFrame.replaceWith($ytLoader);
$ytLoader.click(function () {
var $ytFrame = $ytLoader.data('$ytFrame');
$ytFrame.attr('src',$ytFrame.attr('src')+'?autoplay=1');
$ytLoader.replaceWith($ytFrame);
});
});
};
$(document).ready(function () {youTubes_makeDynamic()});
</script>
<style type="text/css">.ytLoaders{width:100%;position:relative;overflow:hidden;text-align:center}#tab-description .ytLoaders{width:480px}.ytLoaders>img{transition:all .5s linear;transform:scale(1.02)}.ytLoaders:hover >img{transform:scale(1.03)}.play-containers{position:absolute;top:0;left:0;width:100%;height:100%;text-align:center;z-index:2}.playBut{position:absolute;top:0;left:0;right:0;bottom:0;width:100%;height:100%;margin:auto;display:block;transition:all .5s ease}
</style>
  </div>
  </div>
  </div>
  <div id="tab-info" class="tab-content white">
<p class="sp2">Для нас важно, чтобы Вы могли совершить покупку в нашем магазине комфортно быстро и безопасно. Обращаясь к нам, Вы можете купить крутилку спидометра без предоплаты, а оплатить покупку уже непосредственно при получении.</p>

<p class="sp2">Для удобства мы уже включили в стоимость крутилки спидометра все расходы, связанные с доставкой, в том числе и комиссию за наложенный платеж. Т.е. если крутилка спидометра стоит 3000р - то это та сумма, которую Вы заплатите на кассе при получении в почтовом отделении. Никаких скрытых платежей и переплат!</p>

<p class="sp2">Мы отправляем заказы в любую точку РФ. Большая часть заказов отправляется Почтой России, почтовым отправлением первого класса.</p>

<h2>Почему почта?</h2>

<ul class="arr">
	<li>отделение почты есть в любом населенном пункте;</li>
	<li>фиксированная стоимость пересылки в любой регион;</li>
	<li>есть возможность оплатить покупку при получении;</li>
	<li>приемлемые сроки доставки. По опыту (несколько тысяч посылок) посылка доходит в любой региот РФ в течении недели. Т.е. в среднем 5-7 дней;</li>
	<li>сохранность посылок - все посылки первого класса имеют вес не более 2 кг, что исключает механические повреждения при пересылки. Случая механического повреждения крутилки не было ни одного!;</li>
</ul>

<h3>Другие способы доставки</h3>

<p class="sp2">Так же мы можем отправить посылку транспортной компанией СДЭК. Ее терминалы есть почти во всех крупных городах. Однако следует учитывать, что такой способ доставки возможен только при 100% предоплате за товар (чего не требуется при доставке почтой). Срок доставки таким способом 3-4 дня. Стоимость доставки, учитывая вес нашей посылки - около 500р, и здесь уже стоимость зависит от региона.</p>

<h3>Другие способы оплаты</h3>

<p class="sp2">Если Вы хотите сразу же оплатить заказ, то сделать это можно совершив перевод на карту сбербанка. Для этого необходимо связаться с нами - предоставим реквизиты.</p>

<p class="sp2">Так же есть возможность оплатить заказ с кредитной карты. Для этого так же свяжитесь с менеджером.</p>

<p class="sp2">Мы так же можем принять оплату на Яндекс кошелек или Киви кошелек. Свяжитесь с нами для уточнения деталей.</p>

<h2>Информация о самовывозе</h2>

<div class="attention-i l960">
<p class="sp4">Уточнить время работы и номера телефонов можно в разделе <a href="<?php echo $contact; ?>">"<?php echo $text_contact; ?>"</a>.</p>

<p class="sp4 bold">*ВНИМАНИЕ! Возможность самовывоза товара уточняйте у менеджера.</p>
</div>
  </div>
  <?php if ($review_status) { ?>
  <div id="tab-review" class="tab-content white">
    <div id="review"></div>
	<div id="addreview">
    <div id="review-title"><?php echo $text_write; ?></div>
    <?php if ($guest_review) { ?>
	
	<div class="form-data">
	<input type="text" name="name" value="<?php echo $customer_name; ?>" placeholder="Ваше имя" autocomplete="off" />

    <textarea name="text" cols="40" rows="8" placeholder="Ваш отзыв"></textarea>
	<span><?php echo $entry_rating; ?></span>
	
	<div id="rating-updated" class="icon-large-stars-5">
        <input type="radio" name="rating" value="1" class="rating-hide" />
        <input type="radio" name="rating" value="2" class="rating-hide" />
        <input type="radio" name="rating" value="3" class="rating-hide" />
        <input type="radio" name="rating" value="4" class="rating-hide" />
        <input type="radio" name="rating" value="5" class="rating-hide" checked="checked" />
	</div>	
	
	</div>
	<div class="form-data2">

    <input type="text" name="captcha" value="" class="w50" placeholder="Код с картинки" autocomplete="off" /><img src="index.php?route=product/product/captcha" alt="" id="captcha" />
	
	<a id="button-review" class="button">Добавить</a>
	</div>
	</div>
	<?php } else { ?>
	  
	<?php } ?>
  </div>
  </div>
  <?php } ?>
  <?php if ($products) { ?>
  <div id="tab-related" class="tab-content white">
    <div class="related-box-product">
	  <?php foreach ($products as $product) { ?>
		<div>
		  <?php if ($product['thumb']) { ?>
			<div class="image-related"><a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" /></a><div class="stickers"><?php echo $product['sale']; ?><?php echo $product['new']; ?><?php echo $product['popular']; ?></div></div>
		  <?php } else { ?>
			<div class="image-related"><a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['no_image']; ?>" alt="<?php echo $product['name']; ?>" /></a><div class="stickers"><?php echo $product['sale']; ?><?php echo $product['new']; ?><?php echo $product['popular']; ?></div></div>
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

		  <?php if ($product['price']) { ?>
			<div class="price-related">
			  <?php if (!$product['special']) { ?>
			  <?php echo $product['price']; ?>
			  <?php } else { ?>
			  <span class="price-old-related"><?php echo $product['price']; ?></span> <span class="price-new-related"><?php echo $product['special']; ?></span>
			  <?php } ?>
			</div>
		  <?php } ?>
		  <div class="cart-related">
			<a onclick="addToCart('<?php echo $product['product_id']; ?>');" class="btns c-button"><?php echo $button_cart; ?></a>
		  </div>
		</div>
	  <?php } ?>
	</div>
  </div>
  <?php } ?>
  <?php echo $content_bottom; ?>
  <?php if ($tags) { ?>
  <div class="tags m-t-b"><span><?php echo $text_tags; ?></span>
    <?php for ($i = 0; $i < count($tags); $i++) { ?>
    <?php if ($i < (count($tags) - 1)) { ?>
    <a href="<?php echo $tags[$i]['href']; ?>"><?php echo $tags[$i]['tag']; ?></a>
    <?php } else { ?>
    <a href="<?php echo $tags[$i]['href']; ?>"><?php echo $tags[$i]['tag']; ?></a>
    <?php } ?>
    <?php } ?>
  </div>
  <?php } ?>
  </div>
  <div class="bottom"></div></div>
<script type="text/javascript"><!--
$('#button-cart').bind('click', function() {
	$.ajax({
		url: 'index.php?route=checkout/cart/add',
		type: 'post',
		data: $('.product-info input[type=\'text\'], .product-info input[type=\'hidden\'], .product-info input[type=\'radio\']:checked, .product-info input[type=\'checkbox\']:checked, .product-info select, .product-info textarea'),
		dataType: 'json',
		success: function(json) {
			$('.success, .warning, .attention, information, .error').remove();
			
			if (json['error']) {
				if (json['error']['option']) {
					for (i in json['error']['option']) {
						$('#option-' + i).after('<span class="error">' + json['error']['option'][i] + '</span>');
					}
				}
			} 
			
			if (json['success']) {
				$('#notification').html('<div class="success" style="display: none;">' + json['success'] + '<img src="catalog/view/theme/default/image/close.png" alt="" class="close" /></div>');
					
				$('.success').fadeIn('slow');
					
				$('#cart-total').html(json['total']);
				
				setTimeout(function(){$('.success').fadeOut('slow')},4500);
				window.location.href = 'index.php?route=checkout/simplecheckout';
			}	
		}
	});
});
//--></script>
<?php if ($options) { ?>
<script type="text/javascript" src="catalog/view/javascript/jquery/ajaxupload.js"></script>
<?php foreach ($options as $option) { ?>
<?php if ($option['type'] == 'file') { ?>
<script type="text/javascript"><!--
new AjaxUpload('#button-option-<?php echo $option['product_option_id']; ?>', {
	action: 'index.php?route=product/product/upload',
	name: 'file',
	autoSubmit: true,
	responseType: 'json',
	onSubmit: function(file, extension) {
		$('#button-option-<?php echo $option['product_option_id']; ?>').after('<img src="catalog/view/theme/default/image/loading.gif" class="loading" style="padding-left: 5px;" />');
		$('#button-option-<?php echo $option['product_option_id']; ?>').attr('disabled', true);
	},
	onComplete: function(file, json) {
		$('#button-option-<?php echo $option['product_option_id']; ?>').attr('disabled', false);
		
		$('.error').remove();
		
		if (json['success']) {
			alert(json['success']);
			
			$('input[name=\'option[<?php echo $option['product_option_id']; ?>]\']').attr('value', json['file']);
		}
		
		if (json['error']) {
			$('#option-<?php echo $option['product_option_id']; ?>').after('<span class="error">' + json['error'] + '</span>');
		}
		
		$('.loading').remove();	
	}
});
//--></script>
<?php } ?>
<?php } ?>
<?php } ?>
<script type="text/javascript"><!--
$('#review .pagination a').live('click', function() {
	$('#review').fadeOut('slow');
		
	$('#review').load(this.href);
	
	$('#review').fadeIn('slow');
	
	return false;
});			

$('#review').load('index.php?route=product/product/review&product_id=<?php echo $product_id; ?>');

$('#button-review').bind('click', function() {
	$.ajax({
		url: 'index.php?route=product/product/write&product_id=<?php echo $product_id; ?>',
		type: 'post',
		dataType: 'json',
		data: 'name=' + encodeURIComponent($('input[name=\'name\']').val()) + '&text=' + encodeURIComponent($('textarea[name=\'text\']').val()) + '&rating=' + encodeURIComponent($('input[name=\'rating\']:checked').val() ? $('input[name=\'rating\']:checked').val() : '') + '&captcha=' + encodeURIComponent($('input[name=\'captcha\']').val()),
		beforeSend: function() {
			$('.success, .warning').remove();
			$('#button-review').attr('disabled', true);
			$('#review-title').after('<div class="attention"><img src="catalog/view/theme/default/image/loading.gif" alt="" /> <?php echo $text_wait; ?></div>');
		},
		complete: function() {
			$('#button-review').attr('disabled', false);
			$('.attention').remove();
		},
		success: function(data) {
			if (data['error']) {
				$('#review-title').after('<div class="warning">' + data['error'] + '</div>');
			}
			
			if (data['success']) {
				$('#review-title').after('<div class="success">' + data['success'] + '</div>');
								
				$('input[name=\'name\']').val('');
				$('textarea[name=\'text\']').val('');
				$('input[name=\'rating\']:checked').attr('checked', '');
				$('input[name=\'captcha\']').val('');
				
				setTimeout(function(){$('.success').fadeOut('fast')},3500);
			}
		}
	});
});
//--></script> 
<script type="text/javascript"><!--
$('#tabs a').tabs();
//--></script> 
<script type="text/javascript" src="catalog/view/javascript/jquery/ui/jquery-ui-timepicker-addon.js"></script>
<script><!--
$(document).ready(function() {
	if ($.browser.msie && $.browser.version == 6) {
		$('.date, .datetime, .time').bgIframe();
	}

	$('.date').datepicker({dateFormat: 'yy-mm-dd'});
	$('.datetime').datetimepicker({
		dateFormat: 'yy-mm-dd',
		timeFormat: 'h:m'
	});
	$('.time').timepicker({timeFormat: 'h:m'});
});
//--></script> 
<script><!--
$(document).ready(function() {
    $('.minus').click(function () {
        var $input = $(this).parent().find('#quantity');
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
        return false;
    });
    $('.plus').click(function () {
        var $input = $(this).parent().find('#quantity');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        return false;
    });
});
//--></script>
<script>
    /*stars rating*/
    jQuery('.rating-hide').hover(
            /*навел*/
            function(){
                var stars = jQuery(this).val();
                jQuery('#rating-updated').attr('class','icon-large-stars-'+ stars);
            },
            /*убрал*/
            function(){
                var start = jQuery('input:radio[name=rating]:checked').val()
                if(typeof  start == 'undefined' ){start = 5; }
                    jQuery('#rating-updated').attr('class','icon-large-stars-'+ start)

            })
    jQuery('.rating-hide').click(function(){
        /*убираем checked у всех элементов*/
        jQuery('.rating-hide').each(function(){
            jQuery(this).attr( 'checked', false )
        });

        /*добавляем checked необходимому элементу*/
        jQuery(this).attr( 'checked', true );
    });
</script>
<style>.cssload-jar {display: inline-block !important;}</style>
<?php if (isset($remarketing_code) && $remarketing_code) echo $remarketing_code; ?>
<?php echo $footer; ?>
<script>
window.dataLayer = window.dataLayer || [];

dataLayer.push({
 "ecommerce": {
 "detail": {
 "products": [
 {
 "id": "<?php echo $sku; ?>",
 "name" : "<?php echo $heading_title; ?>",
 "price": "<?php if (!$special) { ?><?php echo preg_replace("#[^\d]#", "", $price); ?><?php } else { ?><?php echo preg_replace("#[^\d]#", "", $special); ?><?php } ?>",
 "brand": "<?php echo $manufacturer; ?>"
 }
 ]
 }
 }
});
</script>
<script>
	var $element = $('#button-cart');
	$(window).scroll(function() {
	  var scroll = $(window).scrollTop();
	  //Если скролл до конца елемента
	  var offset = $element.offset().top + $element.height();
	  //Если скролл до начала елемента
	  //var offset = $element.offset().top
	  if (scroll > offset) {
		$('.my_floating_buttons').fadeIn(500);
	  } else {
		$('.my_floating_buttons').fadeOut(500);
	  }
	});
</script>
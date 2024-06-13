<div id="quick-view-content">
  <div id="message-success"></div>
  <h1><?php echo $heading_title; ?></h1>
  <div class="product-info quick-view-product-info">
	<div class="left">
      <?php if ($thumb) { ?>
        <div class="image">
			<a onclick="addToCompareQuick('<?php echo $product_id; ?>');" class="poshytips button-compares" title="<?php echo $button_compare; ?>" /></a>
			<a onclick="addToWishListQuick('<?php echo $product_id; ?>');" class="poshytips button-wishlists" title="<?php echo $button_wishlist; ?>" /></a>		
	  <div class="cart">
		<div>
		  <div class="cart-box-bottom" style="text-align:center">
			<!--<div class="quantity-input">
			  <span class="minus"></span>
			  <input id="cont" type="text" name="quantity" size="2" value="<?php echo $minimum; ?>" />
			  <span class="plus"></span>
			  
			</div>-->
			<input type="hidden" name="product_id" size="2" value="<?php echo $product_id; ?>" />
			<input type="button" value="<?php echo $button_cart; ?>" id="button-cart" class="btns" title="<?php echo $button_cart; ?>" />
		  </div>
		  <?php if ($minimum > 1) { ?>
			<div class="minimum"><?php echo $text_minimum; ?></div>
		  <?php } ?>
		</div>
	  </div>		
		<a href="<?php echo $product_link; ?>"><img src="<?php echo $thumb; ?>" title="<?php echo $heading_title; ?>" alt="<?php echo $heading_title; ?>" id="images" /></a><div class="stickers"><?php echo $sale; ?><?php echo $new; ?><?php echo $popular; ?></div>
		<div class="stocks">
        <?php if (($stock == $this->language->get('text_instock')) || ($stock >= 1) ) { ?>
        <?php echo $stock; ?>
        <?php }    else { ?>
        <span style="background: #D9534F; color: #fff; font-size: 14px; padding: 8px; position: absolute; top: 0; right: 0;z-index: 5;"><?php echo $stock; ?></span>
        <?php } ?>
        </div>
		</div>
      <?php } ?>

      <?php if ($images) { ?>
        <div class="image-additional">
          <?php foreach ($images as $image) { ?>
            <a clickimage="<?php echo $image['popup']; ?>" title="<?php echo $heading_title; ?>"><img src="<?php echo $image['thumb']; ?>" title="<?php echo $heading_title; ?>" alt="<?php echo $heading_title; ?>" /></a>
          <?php } ?>
		  <a clickimage="<?php echo $thumb; ?>" title="<?php echo $heading_title; ?>"><img src="<?php echo $small; ?>" alt="<?php echo $heading_title; ?>" title="<?php echo $heading_title; ?>" /></a>
        </div>
      <?php } ?>
	  
	</div>
    <div class="right">
	  <div id="quick-tabs" class="htabs"><a href="#tab-main"><?php echo $tab_general; ?></a><!--<a href="#tab-quick-description"><?php echo $tab_description; ?></a>-->
		<?php if ($attribute_groups) { ?>
		  <a href="#tab-quick-attribute"><?php echo $tab_attribute; ?></a>
		<?php } ?>
		<!--<?php if ($review_status) { ?>
		  <a href="#tab-quick-review"><?php echo $tab_review; ?></a>
		<?php } ?>-->
		<?php if ($products) { ?>
		  <a href="#tab-quick-related"><?php echo $tab_related; ?> (<?php echo count($products); ?>)</a>
		<?php } ?>
	  </div>
	  <div id="tab-main" class="tab-contents">
		  <?php if ($manufacturer) { ?>
		    <div class="manufacturer-image"><img src="<?php echo $brand_image; ?>" title="<?php echo $manufacturer; ?>" alt="<?php echo $manufacturer; ?>" /></div>
          <?php } ?>
		  <?php if ($price) { ?>
		    <div class="price"><?php echo $text_price; ?>
			  <?php if (!$special) { ?>
			    <?php echo $price; ?>
			  <?php } else { ?>
			    <span class="price-old"><?php echo $price; ?></span> <span class="price-new"><?php echo $special; ?></span>
			  <?php } ?>
		    </div>
		  <?php } ?>
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
		
        <div class="share">
		  <script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>
		  <div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="big" data-yashareQuickServices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus"></div>
        </div>
	  
		<div class="description">
		  <?php if ($manufacturer) { ?>
			<span><?php echo $text_manufacturer; ?> <a href="<?php echo $manufacturers; ?>"></span> <?php echo $manufacturer; ?></a><br />
          <?php } ?>
		  <span><?php echo $text_model; ?></span> <?php echo $model; ?><br />
		  <!--<?php if ($sku) { ?>
			<span><?php echo $text_sku; ?></span> <?php echo $sku; ?><br />
          <?php } ?>-->
		  <?php if ($upc) { ?>
			<span><?php echo $text_upc; ?></span> <?php echo $upc; ?><br />
          <?php } ?>
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
 </div>	  
		  <?php if ($options) { ?>
		  <div class="options">
			<h2><?php echo $text_option; ?></h2>
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
		  <?php if ($review_status) { ?>
		  <div class="review">
			<div><img src="catalog/view/theme/default/image/stars-<?php echo $rating; ?>.png" alt="<?php echo $reviews; ?>" /><!--&nbsp;&nbsp;<a onclick="$('a[href=\'#tab-quick-review\']').trigger('click');"><?php echo $reviews; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<?php if ($guest_review) { ?><a onclick="$('a[href=\'#tab-quick-review\']').trigger('click');"><?php echo $text_write; ?></a><?php } else { echo $text_login_write; } ?>--></div>
		  </div>
		  <?php } ?>
		  <?php if ($tags) { ?>
		  <div class="tags"><span><?php echo $text_tags; ?></span>
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
	  <!--<div id="tab-quick-description" class="tab-contents"><?php echo $description; ?></div>-->
	  <?php if ($attribute_groups) { ?>
	  <div id="tab-quick-attribute" class="tab-contents">
		<table class="attribute">
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
	  </div>
	  <?php } ?>
	  <!--<?php if ($review_status) { ?>
	  <div id="tab-quick-review" class="tab-contents">
		<div id="review"></div>
		<h2 id="review-title"><?php echo $text_write; ?></h2>
		<?php if ($guest_review) { ?>
		<b><?php echo $entry_name; ?></b><br />
		<input type="text" name="name" value="<?php echo $customer_name; ?>" />
		<br />
		<br />
		<b><?php echo $entry_review; ?></b>
		<textarea name="text" cols="40" rows="8" style="width: 98%;"></textarea>
		<span style="font-size: 11px;"><?php echo $text_note; ?></span><br />
		<br />
		<b><?php echo $entry_rating; ?></b> <span><?php echo $entry_bad; ?></span>&nbsp;
		<input type="radio" name="rating" value="1" />
		&nbsp;
		<input type="radio" name="rating" value="2" />
		&nbsp;
		<input type="radio" name="rating" value="3" />
		&nbsp;
		<input type="radio" name="rating" value="4" />
		&nbsp;
		<input type="radio" name="rating" value="5" />
		&nbsp;<span><?php echo $entry_good; ?></span><br />
		<br />
		<b><?php echo $entry_captcha; ?></b><br />
		<input type="text" name="captcha" value="" />
		<br />
		<img src="index.php?route=product/product/captcha" alt="" id="captcha" /><br />
		<br />
		<div class="buttons">
		  <div class="right"><a id="button-review" class="button"><?php echo $button_continue; ?></a></div>
		</div>
		<?php } else { ?>
		  <?php echo $text_login_write; ?>
		<?php } ?>
	  </div>
	  <?php } ?>-->
	  <?php if ($products) { ?>
	  <div id="tab-quick-related" class="tab-contents">
		<div class="related-box-product">
		  <?php foreach ($products as $product) { ?>
		  <div>
			<?php if ($product['thumb']) { ?>
			  <div class="image-related"><a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" /></a><div class="stickers"><?php echo $product['sale']; ?><?php echo $product['new']; ?><?php echo $product['popular']; ?></div></div>
			<?php } else { ?>
			  <div class="image-related"><a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['no_image']; ?>" alt="<?php echo $product['name']; ?>" /></a><div class="stickers"><?php echo $product['sale']; ?><?php echo $product['new']; ?><?php echo $product['popular']; ?></div></div>
			<?php } ?>
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
			  <a onclick="addToCartQuick('<?php echo $product['product_id']; ?>');" class="btns c-button"><?php echo $button_cart; ?></a>
			</div>
		  </div>
		  <?php } ?>
	    </div>
	  </div>
	  <?php } ?>
	</div>
  </div>
</div>
<link rel="stylesheet" type="text/css"href="catalog/view/theme/default/stylesheet/quick_view.css" />
<link rel="stylesheet" type="text/css" href="catalog/view/javascript/jquery/jscrollpane/jquery.jscrollpane.css" />
<script type="text/javascript" src="catalog/view/javascript/jquery/jscrollpane/jquery.mousewheel.js"></script>
<script type="text/javascript" src="catalog/view/javascript/jquery/jscrollpane/jquery.jscrollpane.min.js"></script>
<link rel="stylesheet" type="text/css" href="catalog/view/theme/default/stylesheet/jquery.formstyler.css" />
<script type="text/javascript" src="catalog/view/javascript/jquery/jquery.formstyler.min.js"></script>
<script type="text/javascript">(function($){$(function(){$('input[type=checkbox], input[type=radio], select').styler();$('#rating-updated input').styler('destroy');})})(jQuery);</script>
<script type="text/javascript"><!--
$('#quick-button-cart').bind('click', function() {
	$.ajax({
		url: 'index.php?route=checkout/cart/add',
		type: 'post',
		data: $('.quick-view-product-info input[type=\'text\'], .quick-view-product-info input[type=\'hidden\'], .quick-view-product-info input[type=\'radio\']:checked, .quick-view-product-info input[type=\'checkbox\']:checked, .quick-view-product-info select, .quick-view-product-info textarea'),
		dataType: 'json',
		success: function(json) {
			$('.message-success, .message-warning, .message-attention, .message-information, .message-error').remove();
			
			if (json['error']) {
				if (json['error']['option']) {
					for (i in json['error']['option']) {
						$('#option-' + i).after('<span class="error">' + json['error']['option'][i] + '</span>');
					}
				}
			} 	
			
			if (json['success']) {
				$('#message-success').after('<div class="message-success" style="display: none;">' + json['success'] + '</div>');

				$('.message-success').fadeIn(500).delay(4000).fadeOut(1000);

				$('#cart-total').html(json['total']);
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
			}
		}
	});
});
//--></script> 
<script type="text/javascript"><!--
$('#quick-tabs a').tabs();
$('.tab-contents').jScrollPane({autoReinitialise: true});
$("#cboxOverlay, #cboxContent").on("mousewheel DOMMouseScroll",function(l){var e=l.originalEvent,o=e.wheelDelta||-e.detail;this.scrollTop+=30*(0>o?1:-1),l.preventDefault()});

	//--></script>
<script type="text/javascript" src="catalog/view/javascript/jquery/ui/jquery-ui-timepicker-addon.js"></script> 
<script type="text/javascript"><!--
$(document).ready(function() {
	if ($.browser.msie && $.browser.version == 6) {
		$('#quick-view-content .date, #quick-view-content .datetime, #quick-view-content .time').bgIframe();
	}

	$('#quick-view-content .date').datepicker({dateFormat: 'yy-mm-dd'});
	$('#quick-view-content .datetime').datetimepicker({
		dateFormat: 'yy-mm-dd',
		timeFormat: 'h:m'
	});
	$('#quick-view-content .time').timepicker({timeFormat: 'h:m'});
	
	var img = $('#images').attr('src');
	if (img != undefined) {
		var imgWidth = img.substring(img.lastIndexOf('-') + 1, img.lastIndexOf('x'));
		var imgHeight = img.substring(img.lastIndexOf('x') + 1, img.lastIndexOf('.'));
	}
    $('.image-additional img').click(function() {
		var newsrc = $(this).parent().attr('clickimage');
	    $('#images').attr({
			src: newsrc,
			title: $(this).attr('title'),
			alt: $(this).attr('alt'),
			width: imgWidth,
			height: imgHeight
	    });
	    $('#images').parent().attr('clickimage', newsrc);
	});
});
//--></script> 
<script type="text/javascript" ><!--
$(document).ready(function() {
    $('.minus').click(function () {
        var $input = $(this).parent().find('#cont');
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
        return false;
    });
    $('.plus').click(function () {
        var $input = $(this).parent().find('#cont');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        return false;
    });	
});
//--></script>
<script type="text/javascript" >
		$('.poshytips').poshytip({
			className: 'tip-twitter',
			showTimeout: 1,
			alignTo: 'target',
			alignX: 'center',
			offsetY: 5,
			allowTipHover: false
		});
</script>
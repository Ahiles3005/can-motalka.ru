<style>#fixpan, #header, #menu, #footer .columns, .cback-form-open {display:none}#footer{padding:0}.rast-heading{margin:0}.breadcrumb{margin:0 20px 0}</style>
<?php if ($attention) { ?>
    <div class="simplecheckout-warning-block"><?php echo $attention; ?></div>
<?php } ?>    
<?php if ($error_warning) { ?>
    <div class="simplecheckout-warning-block"><?php echo $error_warning; ?></div>
<?php } ?>
<a class="bts" href="/">вернуться в магазин</a>
<div class="accordio">
<div class="accordio-item"><a class="heading" href="javascript:void(0);">Состав заказа</a>

<div class="acc-content">
    <table class="simplecheckout-cart">
        <colgroup>
            <col class="image">
            <col class="name">
            
            <col class="quantity">
            <col class="price">
            <col class="total">
            <col class="remove">
        </colgroup>
        <thead>
            <tr>
                <th class="image"><?php echo $column_image; ?></th>
                <th class="name"><?php echo $column_name; ?></th>
                
                <th class="quantity"><?php echo $column_quantity; ?></th>
                <th class="price"><?php echo $column_price; ?></th>
                <th class="total"><?php echo $column_total; ?></th>
                <th class="remove"></th>        
            </tr>
        </thead>
    <tbody>
    <?php foreach ($products as $product) { ?>
        <?php if (!empty($product['recurring'])) { ?>
            <tr>
                <td class="simplecheckout-recurring-product" style="border:none;"><image src="catalog/view/theme/default/image/reorder.png" alt="" title="" style="float:left;" /><span style="float:left;line-height:18px; margin-left:10px;"> 
                    <strong><?php echo $text_recurring_item ?></strong>
                    <?php echo $product['profile_description'] ?>
                </td>
            </tr>
        <?php } ?>
        <tr>
            <td class="image">
                <?php if ($product['thumb']) { ?>
                    <a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" title="<?php echo $product['name']; ?>" /></a>
                <?php } ?>
            </td> 
            <td class="name">
                <a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a>
                <?php if (!$product['stock'] && ($config_stock_warning || !$config_stock_checkout)) { ?>
                    <span class="product-warning">***</span>
                <?php } ?>
                <div class="options">
                <?php foreach ($product['option'] as $option) { ?>
                &nbsp;<small> - <?php echo $option['name']; ?>: <?php echo $option['value']; ?></small><br />
                <?php } ?>
                <?php if (!empty($product['recurring'])) { ?>
                - <small><?php echo $text_payment_profile ?>: <?php echo $product['profile_name'] ?></small>
                <?php } ?>
                </div>
                <?php if ($product['reward']) { ?>
                <small><?php echo $product['reward']; ?></small>
                <?php } ?>
            </td>
            
            <td class="quantity">
                <input type="text" name="quantity[<?php echo $product['key']; ?>]" value="<?php echo $product['quantity']; ?>" size="1" onchange="simplecheckout_reload('cart_value_changed')" />
            </td>
            <td class="price"><nobr><?php echo $product['price']; ?></nobr></td>
            <td class="total"><nobr><?php echo $product['total']; ?></nobr></td>
            <td class="remove">
            <img style="cursor:pointer;" src="<?php echo $simple->tpl_joomla_path() ?>catalog/view/theme/default/image/remove.png" onclick="jQuery('#simplecheckout_remove').val('<?php echo $product['key']; ?>');simplecheckout_reload('product_removed');" />
            </td>        
            </tr>
            <?php } ?>
            <?php foreach ($vouchers as $voucher_info) { ?>
                <tr>
                    <td class="image"></td>  
                    <td class="name"><?php echo $voucher_info['description']; ?></td>
                    <td class="model"></td>
                    <td class="quantity">1</td>
                    <td class="price"><nobr><?php echo $voucher_info['amount']; ?></nobr></td>
                    <td class="total"><nobr><?php echo $voucher_info['amount']; ?></nobr></td>
                    <td class="remove">
                    <img style="cursor:pointer;" src="<?php echo $simple->tpl_joomla_path() ?>catalog/view/image/close.png" onclick="jQuery('#simplecheckout_remove').val('<?php echo $voucher_info['key']; ?>');simplecheckout_reload('product_removed');" />
                    </td>
                </tr>
            <?php } ?>
    </tbody>
</table>

</div>

</div>

</div>

<script type="text/javascript">
$('.accordio-item .heading').on('click', function(e) {
    e.preventDefault();
    if($(this).closest('.accordio-item').hasClass('active')) {
        $('.accordio-item').removeClass('active');
    } else {
        $('.accordio-item').removeClass('active');
        $(this).closest('.accordio-item').addClass('active');
    }
    var $content = $(this).next();
    $content.slideToggle(100);
    $('.accordio-item .acc-content').not($content).slideUp('fast');
});
</script>
    
<?php foreach ($totals as $total) { ?>
    <div class="simplecheckout-cart-total" id="total_<?php echo $total['code']; ?>">
        <span><?php echo $total['title']; ?>:</span>
        <span class="simplecheckout-cart-total-value"><nobr><?php echo $total['text']; ?></nobr></span>
        <span class="simplecheckout-cart-total-remove">
            <?php if ($total['code'] == 'coupon') { ?>
            <img src="<?php echo $simple->tpl_joomla_path() ?>catalog/view/image/close.png" onclick="jQuery('input[name=coupon]').val('');simplecheckout_reload('coupon_removed');" />
            <?php } ?>
            <?php if ($total['code'] == 'voucher') { ?>
            <img src="<?php echo $simple->tpl_joomla_path() ?>catalog/view/image/close.png" onclick="jQuery('input[name=voucher]').val('');simplecheckout_reload('voucher_removed');" />
            <?php } ?>
            <?php if ($total['code'] == 'reward') { ?>
            <img src="<?php echo $simple->tpl_joomla_path() ?>catalog/view/image/close.png" onclick="jQuery('input[name=reward]').val('');simplecheckout_reload('reward_removed');" />
            <?php } ?>
        </span>
    </div>
<?php } ?>
<p class="sp2">Доставка бесплатно</p>
<?php if (isset($modules['coupon'])) { ?>
    <div class="simplecheckout-cart-total">
        <span class="inputs"><?php echo $entry_coupon; ?>&nbsp;<input type="text" name="coupon" value="<?php echo $coupon; ?>" onchange="simplecheckout_reload('coupon_changed')"  /></span>
    </div>
<?php } ?>
<?php if (isset($modules['reward']) && $points > 0) { ?>
    <div class="simplecheckout-cart-total">
        <span class="inputs"><?php echo $entry_reward; ?>&nbsp;<input type="text" name="reward" value="<?php echo $reward; ?>" onchange="simplecheckout_reload('reward_changed')"  /></span>
    </div>
<?php } ?>
<?php if (isset($modules['voucher'])) { ?>
    <div class="simplecheckout-cart-total">
        <span class="inputs"><?php echo $entry_voucher; ?>&nbsp;<input type="text" name="voucher" value="<?php echo $voucher; ?>" onchange="simplecheckout_reload('voucher_changed')"  /></span>
    </div>
<?php } ?>
<?php if (isset($modules['coupon']) || isset($modules['reward']) || isset($modules['voucher'])) { ?>
    <div class="simplecheckout-cart-total simplecheckout-cart-buttons">
        <span class="inputs buttons"><a id="simplecheckout_button_cart" onclick="simplecheckout_reload('cart_changed');" class="button btn"><span><?php echo $button_update; ?></span></a></span>
    </div>
<?php } ?>
    
<input type="hidden" name="remove" value="" id="simplecheckout_remove">
<div style="display:none;" id="simplecheckout_cart_total"><?php echo $cart_total ?></div>
<script type="text/javascript">
    jQuery(function(){
        jQuery('#cart_total').html('<?php echo $cart_total ?>');
        jQuery('#cart-total').html('<?php echo $cart_total ?>');
        jQuery('#cart_menu .s_grand_total').html('<?php echo $cart_total ?>');
        <?php if ($simple_show_weight) { ?>
        jQuery('#weight').text('<?php echo $weight ?>');
        <?php } ?>
        <?php if ($template == 'shoppica2') { ?>
        jQuery('#cart_menu div.s_cart_holder').html('');
        $.getJSON('index.php?<?php echo $simple->tpl_joomla_route() ?>route=tb/cartCallback', function(json) {
            if (json['html']) {
                jQuery('#cart_menu span.s_grand_total').html(json['total_sum']);
                jQuery('#cart_menu div.s_cart_holder').html(json['html']);
            }
        });
        <?php } ?>
        <?php if ($template == 'shoppica') { ?>
            jQuery('#cart_menu div.s_cart_holder').html('');
            jQuery.getJSON('index.php?<?php echo $simple->tpl_joomla_route() ?>route=module/shoppica/cartCallback', function(json) {
                if (json['output']) {
                    jQuery('#cart_menu span.s_grand_total').html(json['total_sum']);
                    jQuery('#cart_menu div.s_cart_holder').html(json['output']);
                }
            });
        <?php } ?>
    });
</script>
<?php if ($simple->get_simple_steps() && $simple->get_simple_steps_summary()) { ?>
<div id="simple_summary" style="display: none;margin-bottom:15px;">
    <table class="simplecheckout-cart">
        <colgroup>
            <col class="image">
            <col class="name">
            <col class="model">
            <col class="quantity">
            <col class="price">
            <col class="total">
        </colgroup>
        <thead>
            <tr>
                <th class="image"><?php echo $column_image; ?></th>
                <th class="name"><?php echo $column_name; ?></th>
                <th class="model"><?php echo $column_sku; ?></th>
                <th class="quantity"><?php echo $column_quantity; ?></th>
                <th class="price"><?php echo $column_price; ?></th>
                <th class="total"><?php echo $column_total; ?></th>
            </tr>
        </thead>
    <tbody>
    <?php foreach ($products as $product) { ?>
        <tr>
            <td class="image">
                <?php if ($product['thumb']) { ?>
                    <a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" title="<?php echo $product['name']; ?>" /></a>
                <?php } ?>
            </td> 
            <td class="name">
                <a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a>
                <?php if (!$product['stock'] && ($config_stock_warning || !$config_stock_checkout)) { ?>
                    <span class="product-warning">***</span>
                <?php } ?>
                <div class="options">
                <?php foreach ($product['option'] as $option) { ?>
                &nbsp;<small> - <?php echo $option['name']; ?>: <?php echo $option['value']; ?></small><br />
                <?php } ?>
                </div>
                <?php if ($product['reward']) { ?>
                <small><?php echo $product['reward']; ?></small>
                <?php } ?>
            </td>
            <td class="model"><?php echo $product['model']; ?></td>
            <td class="quantity"><?php echo $product['quantity']; ?></td>
            <td class="price"><nobr><?php echo $product['price']; ?></nobr></td>
            <td class="total"><nobr><?php echo $product['total']; ?></nobr></td>
            </tr>
            <?php } ?>
            <?php foreach ($vouchers as $voucher_info) { ?>
                <tr>
                    <td class="image"></td>  
                    <td class="name"><?php echo $voucher_info['description']; ?></td>
                    <td class="model"></td>
                    <td class="quantity">1</td>
                    <td class="price"><nobr><?php echo $voucher_info['amount']; ?></nobr></td>
                    <td class="total"><nobr><?php echo $voucher_info['amount']; ?></nobr></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
        
    <?php foreach ($totals as $total) { ?>
        <div class="simplecheckout-cart-total" id="total_<?php echo $total['code']; ?>">
            <span><?php echo $total['title']; ?>:</span>
            <span class="simplecheckout-cart-total-value"><nobr><?php echo $total['text']; ?></nobr></span>
        </div>
    <?php } ?>

    <?php if ($summary_comment) { ?>
    <table class="simplecheckout-cart simplecheckout-summary-info">
      <thead>
        <tr>
          <th class="name"><?php echo $text_summary_comment; ?></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?php echo $summary_comment; ?></td>
        </tr>
      </tbody>
    </table>
    <?php } ?>
    <?php if ($summary_payment_address || $summary_shipping_address) { ?>
    <table class="simplecheckout-cart simplecheckout-summary-info">
      <thead>
        <tr>
          <th class="name"><?php echo $text_summary_payment_address; ?></th>
          <?php if ($summary_shipping_address) { ?>
          <th class="name"><?php echo $text_summary_shipping_address; ?></th>
          <?php } ?>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?php echo $summary_payment_address; ?></td>
          <?php if ($summary_shipping_address) { ?>
          <td><?php echo $summary_shipping_address; ?></td>
          <?php } ?>
        </tr>
      </tbody>
    </table>
    <?php } ?>
</div>
<?php } ?>
<script type="text/javascript">(function($){$(function(){$('input[type=checkbox], input[type=radio], select').styler();})})(jQuery);</script>
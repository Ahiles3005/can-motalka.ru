<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/1999/REC-html401-19991224/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $title; ?></title>
</head>
<body style="font-family:'Trebuchet MS',Helvetica,sans-serif;font-size:16px;font-weight:400;color:#000">
  <table style="border-collapse:collapse;width:100%;border:none;margin-bottom:20px">
    <tbody>
      <tr>
        <td style="width:50%;text-align:center;padding:10px 15px;border-right:none;border-left:1px solid #333;border-top:1px solid #333;border-bottom:1px solid #333">
		<a href="<?php echo $store_url; ?>" title="<?php echo $store_name; ?>"><img src="https://can-motalka.ru/image/data/logo.png" alt="<?php echo $store_name; ?>" style="border:none" /></a>
        </td>
        <td style="width:50%;font-size:16px;line-height:24px;text-align:left;padding:10px 15px;background:#333;border:1px solid #333;color:#fff">
		<?php echo $order_text; ?>
		</td>
      </tr>
    </tbody>
  </table>
  <table style="border-collapse:collapse;width:100%;border:none;margin-bottom:20px">
    <tbody>
      <tr>
        <td style="width:30%;font-size:20px;line-height:24px;text-align:left;padding:10px 15px;background:#333;border:1px solid #333;color:#fff"><?php echo $text_order_detail; ?>
		</td>
        <td style="font-size:16px;line-height:24px;text-align:left;padding:10px 15px;border:1px solid #333">
          <b><?php echo $text_order_id; ?></b> <?php echo $order_id; ?><br />
          <b><?php echo $text_date_added; ?></b> <?php echo $date_added; ?><br />
          <b><?php echo $text_payment_method; ?></b> <?php echo $payment_method; ?><br />
          <?php if ($shipping_method) { ?>
          <b><?php echo $text_shipping_method; ?></b> <?php echo $shipping_method; ?>
          <?php } ?>
		  <span style="display:none"><b><?php echo $text_ip; ?></b> <?php echo $ip; ?></span><br />
        </td>
      </tr>
    </tbody>
  </table>
  
  <table style="border-collapse:collapse;width:100%;border:none;margin-bottom:20px">
    <tbody>
      <tr>
        <td style="width:30%;font-size:20px;line-height:24px;text-align:left;padding:10px 15px;background:#333;border:1px solid #333;color:#fff"><?php echo $text_shipping_address; ?>
		</td>
        <td style="font-size:16px;line-height:24px;text-align:left;padding:10px 15px;border:1px solid #333">
          <b><?php echo $text_email; ?></b> <?php echo $email; ?><br />
          <?php if ($telephone) { ?>
		    <b><?php echo $text_telephone; ?></b> <?php echo $telephone; ?><br />
		  <?php } ?>
          <?php echo $shipping_address; ?>
        </td>
      </tr>
    </tbody>
  </table>
  <?php if ($download) { ?>
  <p style="margin-top: 0px; margin-bottom: 20px;"><?php echo $text_download; ?></p>
  <p style="margin-top: 0px; margin-bottom: 20px;"><a href="<?php echo $download; ?>"><?php echo $download; ?></a></p>
  <?php } ?>
  
  <?php if ($comment) { ?>
  <table style="border-collapse:collapse;width:100%;border:none;margin-bottom:20px">
    <tbody>
      <tr>
        <td style="width:30%;font-size:20px;line-height:24px;text-align:left;padding:10px 15px;background:#333;border:1px solid #333;color:#fff"><?php echo $text_instruction; ?>
		</td>
		<td style="font-size:16px;line-height:24px;text-align:left;padding:10px 15px;border:1px solid #333"><?php echo $comment; ?></td>
      </tr>
    </tbody>
  </table>
  <?php } ?>
  
  <table style="border-collapse: collapse; width: 100%; border-top: 1px solid #DDDDDD; border-left: 1px solid #DDDDDD; margin-bottom: 20px;">
    <thead>
      <tr>
        <td style="font-size: 16px;background-color: #000;font-weight: normal;text-align: left;padding: 10px 15px;color: #fff;"><?php echo $text_product; ?></td>
		<td style="font-size: 16px;background-color: #000;font-weight: normal;text-align: left;padding: 10px 15px;color: #fff;"><?php echo $text_sku; ?></td>
        <td style="font-size: 16px;background-color: #000;font-weight: normal;text-align: left;padding: 10px 15px;color: #fff;"><?php echo $text_quantity; ?></td>
        <td style="font-size: 16px;background-color: #000;font-weight: normal;text-align: left;padding: 10px 15px;color: #fff;"><?php echo $text_price; ?></td>
        <td style="font-size: 16px;background-color: #000;font-weight: normal;text-align: left;padding: 10px 15px;color: #fff;"><?php echo $text_total; ?></td>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($products as $product) { ?>
      <tr>
        <td style="font-size: 12px;	border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; text-align: left; padding: 7px;"><img src="<?php echo $product['thumb']; ?>" title="<?php echo $product['name']; ?>" style="float:left;vertical-align:middle;margin:0 10px 0 0" /><br /><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a>
          <?php foreach ($product['option'] as $option) { ?>
          <br />
          &nbsp;<small> - <?php echo $option['name']; ?>: <?php echo $option['value']; ?></small>
          <?php } ?>
        </td>
        <td style="font-size: 12px;	border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; text-align: left; padding: 7px;"><?php echo $product['sku']; ?></td>
        <td style="font-size: 12px;	border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; text-align: right; padding: 7px;"><?php echo $product['quantity']; ?></td>
        <td style="font-size: 12px;	border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; text-align: right; padding: 7px;"><?php echo $product['price']; ?></td>
        <td style="font-size: 12px;	border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; text-align: right; padding: 7px;"><?php echo $product['total']; ?></td>
      </tr>
      <?php } ?>
      <?php foreach ($vouchers as $voucher) { ?>
      <tr>
        <td style="font-size: 12px;	border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; text-align: left; padding: 7px;"><?php echo $voucher['description']; ?></td>
        <td style="font-size: 12px;	border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; text-align: left; padding: 7px;"></td>
        <td style="font-size: 12px;	border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; text-align: right; padding: 7px;">1</td>
        <td style="font-size: 12px;	border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; text-align: right; padding: 7px;"><?php echo $voucher['amount']; ?></td>
        <td style="font-size: 12px;	border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; text-align: right; padding: 7px;"><?php echo $voucher['amount']; ?></td>
      </tr>
      <?php } ?>
    </tbody>
    <tfoot>
      <?php foreach ($totals as $total) { ?>
      <tr>
        <td style="font-size: 12px;	border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; text-align: right; padding: 7px;" colspan="4"><b><?php echo $total['title']; ?>:</b></td>
        <td style="font-size: 12px;	border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; text-align: right; padding: 7px;"><?php echo $total['text']; ?></td>
      </tr>
      <?php } ?>
    </tfoot>
  </table>
  <p style="margin-top: 0px; margin-bottom: 20px;"><?php echo $text_footer; ?></p>
  <?php if ($customer_id) { ?>
		<a href="<?php echo $link; ?>"><?php echo $text_link; ?> <?php echo $link; ?></a>
  <?php } ?>
</body>
</html>

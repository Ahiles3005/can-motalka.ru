<!DOCTYPE html>
<html dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>">
<head>
<meta charset="UTF-8" />
<title><?php echo $title; ?></title>
<base href="<?php echo $base; ?>" />
<?php if ($description) { ?>
<meta name="description" content="<?php echo $description; ?>" />
<?php } ?>
<?php if ($keywords) { ?>
<meta name="keywords" content="<?php echo $keywords; ?>" />
<?php } ?>
<meta name="robots" content="noindex" />
<?php foreach ($links as $link) { ?>
<link href="<?php echo $link['href']; ?>" rel="<?php echo $link['rel']; ?>" />
<?php } ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,300i,400,400i,500,600,600i,700,800" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="view/stylesheet/stylesheet.css?v=<?php echo time();?>" />
<link rel="stylesheet" type="text/css" href="view/stylesheet/quick-edit.css?v=<?php echo time();?>" />
<link rel="stylesheet" type="text/css" href="/catalog/view/theme/default/stylesheet/fonts/Material-Design-Iconic-Font.css?v=<?php echo time();?>" />
<?php foreach ($styles as $style) { ?>
<link rel="<?php echo $style['rel']; ?>" type="text/css" href="<?php echo $style['href']; ?>" media="<?php echo $style['media']; ?>" />
<?php } ?>
<script type="text/javascript" src="view/javascript/jquery/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="view/javascript/jquery/ui/jquery-ui-1.8.16.custom.min.js"></script>
<link type="text/css" href="view/javascript/jquery/ui/themes/ui-lightness/jquery-ui-1.8.16.custom.css" rel="stylesheet" />
<script type="text/javascript" src="view/javascript/jquery-tooltip/jquery.tooltip.min.js"></script>
<link type="text/css" href="view/javascript/jquery-tooltip/jquery.tooltip.css" rel="stylesheet" />
<script type="text/javascript" src="view/javascript/jquery/tabs.js"></script>
<script type="text/javascript" src="view/javascript/placeholder.js"></script>
<script type="text/javascript" src="view/javascript/common.js"></script>
<?php foreach ($scripts as $script) { ?>
<script type="text/javascript" src="<?php echo $script; ?>"></script>
<?php } ?>
<script type="text/javascript">
//-----------------------------------------
// Confirm Actions (delete, uninstall)
//-----------------------------------------
$(document).ready(function(){
    // Confirm Delete
    $('#form').submit(function(){
        if ($(this).attr('action').indexOf('delete',1) != -1) {
            if (!confirm('<?php echo $text_confirm; ?>')) {
                return false;
            }
        }
    });
    	
    // Confirm Uninstall
    $('a').click(function(){
        if ($(this).attr('href') != null && $(this).attr('href').indexOf('uninstall', 1) != -1) {
            if (!confirm('<?php echo $text_confirm; ?>')) {
                return false;
            }
        }
    });
});
</script>
<script language="JavaScript" type="text/javascript">
function clock() {
	var d = new Date();
	var month = d.getMonth()
	var day = d.getDate();
	var hours = d.getHours();
	var minutes = d.getMinutes();
	var seconds = d.getSeconds();

	if (month == 0) month = "<?php echo $text_january; ?>"
	else if (month == 1) month = "<?php echo $text_february; ?>"
	else if (month == 2) month = "<?php echo $text_march; ?>"
	else if (month == 3) month = "<?php echo $text_april; ?>"
	else if (month == 4) month = "<?php echo $text_may; ?>"
	else if (month == 5) month = "<?php echo $text_june; ?>"
	else if (month == 6) month = "<?php echo $text_july; ?>"
	else if (month == 7) month = "<?php echo $text_august; ?>"
	else if (month == 8) month = "<?php echo $text_september; ?>"
	else if (month == 9) month = "<?php echo $text_october; ?>"
	else if (month == 10) month = "<?php echo $text_november; ?>"
	else if (month == 11) month = "<?php echo $text_december; ?>";

	if (day <= 9) day = "0" + day;
	if (hours <= 9) hours = "0" + hours;
	if (minutes <= 9) minutes = "0" + minutes;
	if (seconds <= 9) seconds = "0" + seconds;

	date_time =+ hours + ":" + minutes + "<br />" + day + " " + month + " " + d.getFullYear() +
	"<?php echo $text_year; ?><br />";
	if (document.layers) {
	 document.layers.doc_time.document.write(date_time);
	 document.layers.doc_time.document.close();
	}
	else document.getElementById("doc_time").innerHTML = date_time;
	setTimeout("clock()", 1000);
}
</script>
</head>
<body>
<div id="container">
<?php if ($logged) { ?>
<div id="header">
  <div id="menu">
    <ul>
	<li id="logo"><a class="logo tooltip" href="/" target="_blank" rel="noopener noreferrer" title="Перейти в магазин"><img src="/image/data/logo.png" alt="крутилка спидометра моталка спидометра"></a></li>
      <li id="dashboard"><a href="<?php echo $home; ?>" class="top dashboard-home tooltip" title="На главную"></a></li>
      <li id="catalog"><a class="top"><?php echo $text_catalog; ?></a>
        <ul>
          <li><a href="<?php echo $category; ?>"><?php echo $text_category; ?></a></li>
          <li><a href="<?php echo $product; ?>"><?php echo $text_product; ?></a></li>
          <li><a href="<?php echo $filter; ?>"><?php echo $text_filter; ?></a></li>
          <li><a class="parent"><?php echo $text_attribute; ?></a>
            <ul>
              <li><a href="<?php echo $attribute; ?>"><?php echo $text_attribute; ?></a></li>
              <li><a href="<?php echo $attribute_group; ?>"><?php echo $text_attribute_group; ?></a></li>
            </ul>
          </li>
          <li><a href="<?php echo $option; ?>"><?php echo $text_option; ?></a></li>
          <li><a href="<?php echo $manufacturer; ?>"><?php echo $text_manufacturer; ?></a></li> 
		  <li><a href="<?php echo $suppler; ?>"><?php echo $text_suppler; ?></a></li> <!--*suppler*-->
 
          <li><a href="<?php echo $download; ?>"><?php echo $text_download; ?></a></li>
          <li><a href="<?php echo $review; ?>"><?php echo $text_review; ?></a></li>
		  <li><a href="<?php echo $arbitrage; ?>"><?php echo $text_arbitrage; ?></a></li>
          <li><a href="<?php echo $information; ?>"><?php echo $text_information; ?></a></li>
        </ul>
      </li>
      <li id="extension"><a class="top"><?php echo $text_extension; ?></a>
        <ul>
          <li><a href="<?php echo $module; ?>"><?php echo $text_module; ?></a></li>
          <li><a href="<?php echo $shipping; ?>"><?php echo $text_shipping; ?></a></li>
          <li><a href="<?php echo $payment; ?>"><?php echo $text_payment; ?></a></li>
          <li><a href="<?php echo $total; ?>"><?php echo $text_total; ?></a></li>
          <li><a href="<?php echo $feed; ?>"><?php echo $text_feed; ?></a></li>
        </ul>
      </li>
      <li id="sale"><a class="top"><?php echo $text_sale; ?></a>
        <ul>
          <li><a href="<?php echo $order; ?>"><?php echo $text_order; ?></a></li>
          <li><a href="<?php echo $return; ?>"><?php echo $text_return; ?></a></li>
          <li><a class="parent"><?php echo $text_customer; ?></a>
            <ul>
              <li><a href="<?php echo $customer; ?>"><?php echo $text_customer; ?></a></li>
              <li><a href="<?php echo $customer_group; ?>"><?php echo $text_customer_group; ?></a></li>
              <li><a href="<?php echo $customer_ban_ip; ?>"><?php echo $text_customer_ban_ip; ?></a></li>
            </ul>
          </li>
          <li><a href="<?php echo $affiliate; ?>"><?php echo $text_affiliate; ?></a></li>
          <li><a href="<?php echo $coupon; ?>"><?php echo $text_coupon; ?></a></li>
          <li><a class="parent"><?php echo $text_voucher; ?></a>
            <ul>
              <li><a href="<?php echo $voucher; ?>"><?php echo $text_voucher; ?></a></li>
              <li><a href="<?php echo $voucher_theme; ?>"><?php echo $text_voucher_theme; ?></a></li>
            </ul>
          </li>
          <li><a href="<?php echo $contact; ?>"><?php echo $text_contact; ?></a></li>
        </ul>
      </li>
      <li id="system"><a class="top"><?php echo $text_system; ?></a>
        <ul>
          <li><a href="<?php echo $setting; ?>"><?php echo $text_setting; ?></a></li>
          <li><a class="parent"><?php echo $text_design; ?></a>
            <ul>
              <li><a href="<?php echo $layout; ?>"><?php echo $text_layout; ?></a></li>
              <li><a href="<?php echo $banner; ?>"><?php echo $text_banner; ?></a></li>
            </ul>
          </li>
          <li><a class="parent"><?php echo $text_users; ?></a>
            <ul>
              <li><a href="<?php echo $user; ?>"><?php echo $text_user; ?></a></li>
              <li><a href="<?php echo $user_group; ?>"><?php echo $text_user_group; ?></a></li>
            </ul>
          </li>
          <li><a class="parent"><?php echo $text_localisation; ?></a>
            <ul>
              <li><a href="<?php echo $language; ?>"><?php echo $text_language; ?></a></li>
              <li><a href="<?php echo $currency; ?>"><?php echo $text_currency; ?></a></li>
              <li><a href="<?php echo $stock_status; ?>"><?php echo $text_stock_status; ?></a></li>
              <li><a href="<?php echo $order_status; ?>"><?php echo $text_order_status; ?></a></li>
              <li><a class="parent"><?php echo $text_return; ?></a>
                <ul>
                  <li><a href="<?php echo $return_status; ?>"><?php echo $text_return_status; ?></a></li>
                  <li><a href="<?php echo $return_action; ?>"><?php echo $text_return_action; ?></a></li>
                  <li><a href="<?php echo $return_reason; ?>"><?php echo $text_return_reason; ?></a></li>
                </ul>
              </li>
              <li><a href="<?php echo $country; ?>"><?php echo $text_country; ?></a></li>
              <li><a href="<?php echo $zone; ?>"><?php echo $text_zone; ?></a></li>
              <li><a href="<?php echo $geo_zone; ?>"><?php echo $text_geo_zone; ?></a></li>
              <li><a class="parent"><?php echo $text_tax; ?></a>
                <ul>
                  <li><a href="<?php echo $tax_class; ?>"><?php echo $text_tax_class; ?></a></li>
                  <li><a href="<?php echo $tax_rate; ?>"><?php echo $text_tax_rate; ?></a></li>
                </ul>
              </li>
              <li><a href="<?php echo $length_class; ?>"><?php echo $text_length_class; ?></a></li>
              <li><a href="<?php echo $weight_class; ?>"><?php echo $text_weight_class; ?></a></li>
            </ul>
          </li>
		  <li><a href="<?php echo $control_unit ?>"><?php echo $text_control_unit; ?></a></li>
		  <li><a href="<?php echo $seo_manager ?>"><?php echo $text_seo_manager; ?></a></li>
          <li><a href="<?php echo $error_log; ?>"><?php echo $text_error_log; ?></a></li>
          <li><a href="<?php echo $backup; ?>"><?php echo $text_backup; ?></a></li>
        </ul>
      </li>
      <li id="reports"><a class="top"><?php echo $text_reports; ?></a>
        <ul>
          <li><a class="parent"><?php echo $text_sale; ?></a>
            <ul>
              <li><a href="<?php echo $report_sale_order; ?>"><?php echo $text_report_sale_order; ?></a></li>
              <li><a href="<?php echo $report_sale_tax; ?>"><?php echo $text_report_sale_tax; ?></a></li>
              <li><a href="<?php echo $report_sale_shipping; ?>"><?php echo $text_report_sale_shipping; ?></a></li>
              <li><a href="<?php echo $report_sale_return; ?>"><?php echo $text_report_sale_return; ?></a></li>
              <li><a href="<?php echo $report_sale_coupon; ?>"><?php echo $text_report_sale_coupon; ?></a></li>
            </ul>
          </li>
          <li><a class="parent"><?php echo $text_product; ?></a>
            <ul>
              <li><a href="<?php echo $report_product_viewed; ?>"><?php echo $text_report_product_viewed; ?></a></li>
              <li><a href="<?php echo $report_product_purchased; ?>"><?php echo $text_report_product_purchased; ?></a></li>
            </ul>
          </li>
          <li><a class="parent"><?php echo $text_customer; ?></a>
            <ul>
              <li><a href="<?php echo $report_customer_online; ?>"><?php echo $text_report_customer_online; ?></a></li>
              <li><a href="<?php echo $report_customer_order; ?>"><?php echo $text_report_customer_order; ?></a></li>
              <li><a href="<?php echo $report_customer_reward; ?>"><?php echo $text_report_customer_reward; ?></a></li>
              <li><a href="<?php echo $report_customer_credit; ?>"><?php echo $text_report_customer_credit; ?></a></li>
            </ul>
          </li>
          <li><a class="parent"><?php echo $text_affiliate; ?></a>
            <ul>
              <li><a href="<?php echo $report_affiliate_commission; ?>"><?php echo $text_report_affiliate_commission; ?></a></li>
            </ul>
          </li>
        </ul>
      </li>
    <li id="news"><a class="top"><?php echo $text_news; ?></a>
        <ul>
      <li><a href="<?php echo $news; ?>"><?php echo $text_news; ?></a></li>
          <li><a href="<?php echo $news_category; ?>"><?php echo $text_news_category; ?></a></li>
      <li><a href="<?php echo $news_comment; ?>"><?php echo $text_news_comments; ?></a></li>
        </ul>
      </li>
    <li><a href="<?php echo $info; ?>" class="top"><?php echo $text_info; ?></a></li>
	  <li id="clear-caches"><a class="top"><?php echo $text_clear_cache; ?></a>
        <ul>
		  <li><a href="<?php echo $clear_seo_cache ?>"><?php echo $text_clear_seo_cache; ?></a></li>
		  <li><a href="javascript:void(0);" data-modal="clear-cache" class="open-cache-modal"><?php echo $text_clear_all_cache; ?></a></li>
		  <!--<li><a href="<?php //echo $clear_image_cache ?>"><?php //echo $text_clear_image_cache; ?></a></li>-->
        </ul>
      </li>
      <li id="user"><a class="top"><?php echo $logged; ?></a>
        <ul>
		  <li><a href="<?php echo $user; ?>"><?php echo $text_user; ?></a></li>
		  <li><a href="<?php echo $user_group; ?>"><?php echo $text_user_group; ?></a></li>
		  <li><a href="<?php echo $logout; ?>"><?php echo $text_logout; ?></a></li>
        </ul>
      </li>
	  <li id="doc_time"></li>
    </ul>
  </div>
</div>
<script language="JavaScript" type="text/javascript">clock();</script>
<div id="cache-modal-overlay" data-overlay=""></div>
<div id="clear-cache" class="cache-modal-box">
<p>Вы уверены, что хотите удалить весь системный кэш?</p>
<div><a href="<?php echo $clear_all_cache ?>" class="clear-cache">Да</a>
<a href="javascript:void(0);" class="close-cache-modal">Отмена</a></div>
</div>
<?php } ?>

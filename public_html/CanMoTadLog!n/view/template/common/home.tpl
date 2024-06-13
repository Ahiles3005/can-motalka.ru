<?php echo $header; ?>
<div id="content">
<div class="breadcrumb hidden">
<?php foreach ($breadcrumbs as $i=> $breadcrumb) { ?>
<?php if($i+1<count($breadcrumbs)) { ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a> <?php } else { ?><?php echo $breadcrumb['text']; ?><?php } ?>
<?php } ?>
</div>
  <?php if ($error_install) { ?>
  <div class="warning"><?php echo $error_install; ?></div>
  <?php } ?>
  <?php if ($error_image) { ?>
  <div class="warning"><?php echo $error_image; ?></div>
  <?php } ?>
  <?php if ($error_image_cache) { ?>
  <div class="warning"><?php echo $error_image_cache; ?></div>
  <?php } ?>
  <?php if ($error_cache) { ?>
  <div class="warning"><?php echo $error_cache; ?></div>
  <?php } ?>
  <?php if ($error_download) { ?>
  <div class="warning"><?php echo $error_download; ?></div>
  <?php } ?>
  <?php if ($error_logs) { ?>
  <div class="warning"><?php echo $error_logs; ?></div>
  <?php } ?>
  <?php if ($success_all_cache) { ?>
  <div class="success"><?php echo $success_all_cache; ?></div>
  <?php } ?>
  <?php if ($success_image_cache) { ?>
  <div class="success"><?php echo $success_image_cache; ?></div>
  <?php } ?>
  <?php if ($success_seo_cache) { ?>
  <div class="success"><?php echo $success_seo_cache; ?></div>
  <?php } ?>
  <?php if ($success) { ?>
  <div class="success"><?php echo $success; ?></div>
  <?php } ?>
  <div class="box">
    <div class="heading">
      <h1 class="quick-start"><?php echo $heading_title; ?></h1>
    </div>
    <div class="content">
	  <?php if ($items) { ?>
      <div class="control-unit d-none">
        <div class="dashboard-content" style="min-height: 103px; overflow: auto;">
		  <ul>
		    <?php foreach ($items as $item) { ?>
			  <?php if (($item['status']) == 1) { ?>
                <li><img src="<?php echo $item['thumb']; ?>" /><a href="<?php echo $item['href']; ?>"></a><h6><?php echo $item['name']; ?></h6></li>
			  <?php } ?>
            <?php } ?>
		  </ul>
        </div>
      </div>
	  <div class="clear"></div>
      <?php } ?>
	  <div style="text-align: center;">
      <div class="overview">
        <div class="dashboard-heading"><?php echo $text_overview; ?></div>
        <div class="dashboard-content">
		
<div>
<span><?php echo $text_total_sale; ?></span>
<span><?php echo $total_sale; ?></span>
</div>

<div>
<p class="year-sale"><?php echo date('y'); ?></p>
<span><?php echo $text_total_sale_year; ?></span>
<span><?php echo $total_sale_year; ?></span>
</div>

<div>
<p class="year-sale"><?php echo date('M'); ?></p>
<span><?php echo $text_total_sale_month; ?></span>
<span><?php echo $total_sale_month; ?></span>
</div>

<div>
<p class="year-sale"><?php echo date('D'); ?></p>
<span><?php echo $text_total_sale_day; ?></span>
<span><?php echo $total_sale_day; ?></span>
</div>

<div>
<span><?php echo $text_total_product; ?></span>
<span><?php echo $total_product; ?></span>
<a href="<?php echo $view_total_product; ?>">Подробнее</a>
</div>

<div>
<span><?php echo $text_total_order; ?></span>
<span><?php echo $total_order; ?></span>
<a href="<?php echo $view_order; ?>">Подробнее</a>
</div>

<div>
<span><?php echo $text_abandoned_orders; ?></span>
<span><?php echo $total_abandoned_orders; ?></span>
<a href="<?php echo $view_abandoned_orders; ?>">Подробнее</a>
</div>

        </div>
      </div>
	  <div class="customer">
        <div class="dashboard-heading"><?php echo $text_customers; ?></div>
        <div class="dashboard-content dashboard-2">

<div>
<span><?php echo $text_total_administrators; ?></span>
<span><?php echo $total_admin; ?></span>
<a href="<?php echo $view_users; ?>">Подробнее</a>
</div>

<div>
<span><?php echo $text_total_users; ?></span>
<span><?php echo $total_users; ?></span>
<a href="<?php echo $view_users; ?>">Подробнее</a>
</div>

<div>
<span><?php echo $text_total_customer; ?></span>
<span><?php echo $total_customer; ?></span>
<a href="<?php echo $view_customer; ?>">Подробнее</a>
</div>

<div>
<span><?php echo $text_total_customer_approval; ?></span>
<span><?php echo $total_customer_approval; ?></span>
<a href="<?php echo $view_customer; ?>">Подробнее</a>
</div>

<div>
<span><?php echo $text_total_banned_ip; ?></span>
<span><?php echo $total_banned_ip; ?></span>
<a href="<?php echo $view_banned_ip; ?>">Подробнее</a>
</div>

<div>
<span><?php echo $text_total_affiliate; ?></span>
<span><?php echo $total_affiliate; ?></span>
<a href="<?php echo $view_affiliate; ?>">Подробнее</a>
</div>

<div>
<span><?php echo $text_total_affiliate_approval; ?></span>
<span><?php echo $total_affiliate_approval; ?></span>
<a href="<?php echo $view_affiliate; ?>">Подробнее</a>
</div>

        </div>
      </div>
	  <div class="overview-news">
        <div class="dashboard-heading"><?php echo $text_other; ?></div>
        <div class="dashboard-content dashboard-3">

<div>
<span><?php echo $text_total_news; ?></span>
<span><?php echo $total_news; ?></span>
<a href="<?php echo $view_total_news; ?>">Подробнее</a>
</div>

<div>
<span><?php echo $text_total_news_comments; ?></span>
<span><?php echo $total_news_comments; ?></span>
<a href="<?php echo $view_total_news_comments; ?>">Подробнее</a>
</div>

<div>
<span><?php echo $text_news_comments_approval; ?></span>
<span><?php echo $total_news_comments_approval; ?></span>
<a href="<?php echo $view_total_news_comments; ?>">Подробнее</a>
</div>

<div>
<span><?php echo $text_total_review_approval; ?></span>
<span><?php echo $total_review_approval; ?></span>
<a href="<?php echo $view_review; ?>">Подробнее</a>
</div>

<div>
<span><?php echo $text_total_informations; ?></span>
<span><?php echo $total_informations; ?></span>
<a href="<?php echo $view_total_informations; ?>">Подробнее</a>
</div>

<div>
<span><?php echo $text_total_manufacturers; ?></span>
<span><?php echo $total_manufacturers; ?></span>
<a href="<?php echo $view_total_manufacturers; ?>">Подробнее</a>
</div>

<div>
<span><?php echo $text_total_returns; ?></span>
<span><?php echo $total_returns; ?></span>
<a href="<?php echo $view_total_returns; ?>">Подробнее</a>
</div>

        </div>
      </div>
	  </div>
      <!--<div class="statistic">
        <div class="range"><?php //echo $entry_range; ?>
          <select id="range" onchange="getSalesChart(this.value)">
            <option value="day"><?php //echo $text_day; ?></option>
            <option value="week"><?php //echo $text_week; ?></option>
            <option value="month"><?php //echo $text_month; ?></option>
            <option value="year"><?php //echo $text_year; ?></option>
          </select>
        </div>
        <div class="dashboard-heading"><?php //echo $text_statistics; ?></div>
        <div class="dashboard-content">
          <div id="report" style="width: 390px; height: 170px; margin: auto;"></div>
        </div>
      </div>-->
      <div class="latest">
        <div class="dashboard-heading"><?php echo $text_latest_10_orders; ?></div>
        <div class="dashboard-content">
          <table class="list">
            <thead>
              <tr>
                <td class="right"><?php echo $column_order; ?></td>
                <td class="left"><?php echo $column_customer; ?></td>
                <td class="left"><?php echo $column_status; ?></td>
                <td class="left"><?php echo $column_date_added; ?></td>
                <td class="right"><?php echo $column_total; ?></td>
                <td class="right"><?php echo $column_action; ?></td>
              </tr>
            </thead>
            <tbody>
              <?php if ($orders) { ?>
              <?php foreach ($orders as $order) { ?>
              <tr>
                <td class="right"><?php echo $order['order_id']; ?></td>
                <td class="left"><?php echo $order['customer']; ?></td>
                <td class="left"><?php echo $order['status']; ?></td>
                <td class="left"><?php echo $order['date_added']; ?></td>
                <td class="right"><?php echo $order['total']; ?></td>
                <td class="right quick-buttons">
				  <?php foreach ($order['action'] as $action) { ?>
				    <?php if ($this->config->get('config_buttons_apply') == 0) { ?>
					  [ <a href="<?php echo $action['href']; ?>"><?php echo $action['text']; ?></a> ]
				    <?php } else { ?>
					  <a href="<?php echo $action['href']; ?>"><?php echo $action['text']; ?></a>
					<?php } ?>
                  <?php } ?>
				</td>
              </tr>
              <?php } ?>
              <?php } else { ?>
              <tr>
                <td class="center" colspan="6"><?php echo $text_no_results; ?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!--[if IE]>
<script type="text/javascript" src="view/javascript/jquery/flot/excanvas.js"></script>
<![endif]--> 
<script type="text/javascript" src="view/javascript/jquery/flot/jquery.flot.js"></script> 
<script type="text/javascript"><!--
function getSalesChart(range) {
	$.ajax({
		type: 'get',
		url: 'index.php?route=common/home/chart&token=<?php echo $token; ?>&range=' + range,
		dataType: 'json',
		async: false,
		success: function(json) {
			var option = {	
				shadowSize: 0,
				lines: { 
					show: true,
					fill: true,
					lineWidth: 1
				},
				grid: {
					backgroundColor: '#FFFFFF'
				},	
				xaxis: {
            		ticks: json.xaxis
				}
			}

			$.plot($('#report'), [json.order, json.customer], option);
		}
	});
}

getSalesChart($('#range').val());
//--></script> 
<?php echo $footer; ?>